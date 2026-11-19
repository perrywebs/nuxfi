<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Settings;
use App\Models\Plans;
use App\Models\Agent;
use App\Models\User_plans;
use App\Models\Deposit;
use App\Models\Withdrawal;
use App\Models\Tp_Transaction;
use App\Models\Activity;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Mail\NewNotification;
use App\Models\Kyc;
use App\Models\Bid;
use App\Models\Loan;
use App\Models\NFT;
use App\Models\SignalSubscription;
use App\Models\Trade;
use App\Models\User_Signal_Subscription;
use App\Models\Mt4Details;
use App\Models\Wallets;
use App\Traits\PingServer;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;
use App\Services\NotificationService;

class ManageUsersController extends Controller
{
    use PingServer;

    /**
     * Handle bulk actions (delete, clear, topup, addRoi) from the manage-users page.
     */
    public function bulkAction(Request $request)
    {
        $data = $request->validate([
            'bulk_action' => 'required|in:Delete,Clear,Topup,AddRoi,Activate,Deactivate',
            'user_ids'    => 'required|array|min:1',
            'user_ids.*'  => 'integer|exists:users,id',
            'plan'        => 'nullable|integer|exists:plans,id',
            'datecreated' => 'nullable|date',
            'topamount'   => 'nullable|numeric',
            'topcolumn'   => 'nullable|in:Bonus,balance',
            'toptype'     => 'nullable|in:Credit,Debit',
        ]);

        $ids = collect($data['user_ids'])
            ->map(fn ($id) => (int) $id)
            ->filter(fn ($id) => $id !== User::PROTECTED_ID)
            ->values()
            ->all();

        if (empty($ids)) {
            return redirect()->route('manageusers')->with('error', 'No valid users selected.');
        }

        switch ($data['bulk_action']) {
            case 'Delete':
                $this->bulkDeleteUsers($this->withoutCurrentWebUser($ids));
                break;
            case 'Clear':
                $this->bulkClearUsers($ids);
                break;
            case 'Topup':
                if (empty($data['topamount']) || empty($data['topcolumn']) || empty($data['toptype'])) {
                    return redirect()->route('manageusers')->with('error', 'Topup amount, column and type are required.');
                }
                $this->bulkTopup($ids, (float) $data['topamount'], $data['topcolumn'], $data['toptype']);
                break;
            case 'AddRoi':
                if (empty($data['plan']) || empty($data['datecreated'])) {
                    return redirect()->route('manageusers')->with('error', 'Plan and date are required for ROI.');
                }
                $this->bulkAddRoi($ids, (int) $data['plan'], $data['datecreated']);
                break;
            case 'Activate':
                User::whereIn('id', $ids)->update(['status' => 'active']);
                break;
            case 'Deactivate':
                // Never deactivate the account currently running this session.
                $ids = $this->withoutCurrentWebUser($ids);
                if (!empty($ids)) {
                    User::whereIn('id', $ids)->update(['status' => 'inactive']);
                    // Drop any active sessions immediately so every device is
                    // signed out rather than waiting for its next request.
                    if (config('session.driver') === 'database') {
                        DB::table('sessions')->whereIn('user_id', $ids)->delete();
                    }
                }
                break;
        }

        return redirect()->route('manageusers')->with('success', 'Action successful!');
    }

    /**
     * Remove the currently signed-in web user from a destructive bulk action.
     */
    private function withoutCurrentWebUser(array $ids): array
    {
        $currentId = (int) Auth::guard('web')->id();

        return array_values(array_filter($ids, function ($id) use ($currentId) {
            return (int) $id !== $currentId;
        }));
    }

    private function bulkDeleteUsers(array $ids): void
    {
        Deposit::whereIn('user', $ids)->delete();
        Withdrawal::whereIn('user', $ids)->delete();
        User_plans::whereIn('user', $ids)->delete();
        Mt4Details::whereIn('client_id', $ids)->delete();
        Kyc::whereIn('user_id', $ids)->delete();
        User::whereIn('id', $ids)->delete();
    }

    private function bulkClearUsers(array $ids): void
    {
        Deposit::whereIn('user', $ids)->delete();
        Withdrawal::whereIn('user', $ids)->delete();
        User::whereIn('id', $ids)->update([
            'account_bal' => 0,
            'roi'         => 0,
            'bonus'       => 0,
            'ref_bonus'   => 0,
        ]);
    }

    private function bulkTopup(array $ids, float $amount, string $column, string $type): void
    {
        $users = User::whereIn('id', $ids)->get();
        foreach ($users as $user) {
            if ($type === 'Credit') {
                if ($column === 'Bonus') {
                    $user->bonus       = $user->bonus + $amount;
                    $user->account_bal = $user->account_bal + $amount;
                } else { // balance
                    $user->account_bal = $user->account_bal + $amount;
                }
                $user->save();

                Tp_Transaction::create([
                    'user'   => $user->id,
                    'plan'   => 'Credit',
                    'amount' => $amount,
                    'type'   => $column,
                ]);
            } else { // Debit
                if ($column === 'Bonus' && $user->bonus >= $amount) {
                    $user->bonus       = $user->bonus - $amount;
                    $user->account_bal = $user->account_bal - $amount;
                    $user->save();
                } elseif ($column === 'balance' && $user->account_bal >= $amount) {
                    $user->account_bal = $user->account_bal - $amount;
                    $user->save();
                } else {
                    continue;
                }

                Tp_Transaction::create([
                    'user'   => $user->id,
                    'plan'   => 'Credit reversal',
                    'amount' => $amount,
                    'type'   => $column,
                ]);
            }
        }
    }

    private function bulkAddRoi(array $ids, int $planId, string $dateCreated): void
    {
        $plan = Plans::find($planId);
        if (!$plan) {
            return;
        }
        $when = \Carbon\Carbon::parse($dateCreated);

        User::whereIn('id', $ids)->chunkById(100, function ($users) use ($plan, $when) {
            foreach ($users as $user) {
                $userplans = User_plans::where('user', $user->id)
                    ->where('plan', $plan->id)
                    ->where('active', 'yes')
                    ->get();

                foreach ($userplans as $uplan) {
                    $amount = $uplan->amount * $plan->increment_amount / 100;

                    $newt = new Tp_Transaction();
                    $newt->user         = $user->id;
                    $newt->plan         = $plan->name;
                    $newt->amount       = $amount;
                    $newt->type         = 'ROI';
                    $newt->user_plan_id = $uplan->id;
                    $newt->created_at   = $when;
                    $newt->updated_at   = $when;
                    $newt->save();

                    User::where('id', $user->id)->update([
                        'roi'         => $user->roi + $amount,
                        'account_bal' => $user->account_bal + $amount,
                    ]);

                    $uplan->profit_earned = $uplan->profit_earned + $amount;
                    $uplan->save();
                }
            }
        });
    }

    // See user wallet balances
    public function loginactivity($id)
    {

        $user = User::where('id', $id)->first();

        return view('admin.Users.loginactivity', [
            'activities' => Activity::where('user', $id)->orderByDesc('id')->get(),
            'title' => "$user->name login activities",
            'user' => $user,
        ]);
    }

    public function showUsers($id)
    {
        $user = User::where('id', $id)->first();
        $ref = User::whereNull('ref_by')->where('id', '!=', $id)->get();

        return view('admin.Users.referral', [
            'title' => "Add users to $user->name referral list",
            'user' => $user,
            'ref' => $ref,
        ]);
    }

    public function fetchUsers()
    {
        $users = User::orderByDesc('id')->get();
        return response()->json([
            'message' => 'Success',
            'data' => $users,
            'code' => 200
        ]);
    }


    public function addReferral(Request $request)
    {
        $user = User::where('id', $request->user_id)->first();
        $ref = User::where('id', $request->ref_id)->first();

        $ref->ref_by = $user->id;
        $ref->save();
        return redirect()->back()
            ->with('success', "$ref->name is now referred by $user->name successfully");
    }

    public function clearactivity($id)
    {
        $activities = Activity::where('user', $id)->get();

        if (count($activities) > 0) {
            foreach ($activities as $act) {
                Activity::where('id', $act->id)->delete();
            }
            return redirect()->back()
                ->with('success', 'Activity Cleared Successfully!');
        }
        return redirect()->back()
            ->with('message', 'No Activity to clear!');
    }

    public function markplanas($status, $id)
    {
        User_plans::where('id', $id)->update([
            'active' => $status,
        ]);
        return redirect()->back()
            ->with('success', "Plan Active state changed to $status");
    }

    public function viewuser($id)
    {
        $user = User::where('id', $id)->first();
        if (!$user) {
            return redirect()->route('musers')->with('message', 'User not found or has been deleted.');
        }
        return view('admin.Users.userdetails', [
            'user' => $user,
            'pl' => Plans::orderByDesc('id')->get(),
            'wallets' => Wallets::where('user', $id)->orderByDesc('id')->get(),
            'title' => "Manage $user->name",
        ]);
    }
    /**
     * Deactivate a user account.
     *
     * Deactivation is intentionally separate from deletion: the account and all
     * of its records stay intact, but the user is signed out and blocked from
     * logging in again until an administrator activates the account.
     */
    public function ublock($id)
    {
        $user = User::find($id);

        if (!$user) {
            return redirect()->back()->with('error', 'User not found or has been deleted.');
        }

        if ($user->isProtectedAccount()) {
            return redirect()->back()->with('error', 'This protected account cannot be deactivated.');
        }

        if (Auth::guard('web')->check() && (int) Auth::guard('web')->id() === (int) $user->id) {
            return redirect()->back()->with('error', 'You cannot deactivate the account you are currently signed in as.');
        }

        if ($user->isInactive()) {
            return redirect()->back()->with('message', "$user->name is already inactive.");
        }

        $user->status = 'inactive';
        $user->save();

        // Drop active database sessions so the account is signed out on every
        // device immediately (the global middleware is the backstop otherwise).
        if (config('session.driver') === 'database') {
            DB::table('sessions')->where('user_id', $user->id)->delete();
        }

        return redirect()->back()->with('success', "$user->name has been deactivated and can no longer sign in.");
    }

    /**
     * Reactivate a previously deactivated user account.
     */
    public function unblock($id)
    {
        $user = User::find($id);

        if (!$user) {
            return redirect()->back()->with('error', 'User not found or has been deleted.');
        }

        if ($user->isActive()) {
            return redirect()->back()->with('message', "$user->name is already active.");
        }

        $user->status = 'active';
        $user->save();

        return redirect()->back()->with('success', "$user->name has been activated and can sign in again.");
    }

    //Turn on/off user trade
    public function usertrademode($id, $action)
    {
        if ($action == "on") {
            $action = "on";
        } elseif ($action == "off") {
            $action = "off";
        } else {
            return redirect() - back()->with('message', "Unknown action!");
        }

        User::where('id', $id)->update([
            'trade_mode' => $action,
        ]);
        return redirect()->back()->with('success', "User trade mode has been turned $action.");
    }

    public function userwalletstatus($id, $action)
    {
        if ($action !== 'on' && $action !== 'off') {
            return redirect()->back()->with('message', 'Unknown action!');
        }

        User::where('id', $id)->update([
            'wallet_connect_status' => $action,
        ]);
        return redirect()->back()->with('success', "User wallet connect has been turned $action.");
    }

    //Manually Verify users email
    public function emailverify($id)
    {
        User::where('id', $id)->update([
            'email_verified_at' => \Carbon\Carbon::now(),
        ]);
        return redirect()->back()->with('success', 'User Email have been verified');
    }

    //Reset Password
    public function resetpswd($id)
    {
        User::where('id', $id)
            ->update([
                'password' => Hash::make('user01236'),
            ]);
        return redirect()->back()->with('success', 'Password has been reset to default');
    }

    //Clear user Account
    public function clearacct(Request $request, $id)
    {
        $settings = Settings::where('id', 1)->first();

        $deposits = Deposit::where('user', $id)->get();
        if (!empty($deposits)) {
            foreach ($deposits as $deposit) {
                Deposit::where('id', $deposit->id)->delete();
            }
        }

        $withdrawals = Withdrawal::where('user', $id)->get();
        if (!empty($withdrawals)) {
            foreach ($withdrawals as $withdrawal) {
                Withdrawal::where('id', $withdrawal->id)->delete();
            }
        }

        User::where('id', $id)->update([
            'account_bal' => '0',
            'roi' => '0',
            'bonus' => '0',
            'ref_bonus' => '0',
        ]);
        return redirect()->back()->with('success', "Account cleared to $settings->currency 0.00");
    }

    //Access users account
    public function switchuser($id)
    {
        $user = User::where('id', $id)->first();

        if (!$user) {
            return redirect()->back()->with('error', 'User not found or has been deleted.');
        }

        if ($user->isInactive()) {
            return redirect()->back()->with('error', 'Activate this account before logging in as the user.');
        }

        Auth::loginUsingId($user->id, true);
        return redirect()->route('dashboard')->with('success', "You are logged in as $user->name !");
    }

    //Manually Add Trading History to Users Route
    public function addHistory(Request $request)
    {
        Tp_Transaction::create([
            'user' => $request->user_id,
            'plan' => $request->plan,
            'amount' => $request->amount,
            'type' => $request->type,
        ]);
        $user = User::where('id', $request->user_id)->first();
        $user_bal = $user->account_bal;

        if (isset($request['amount']) > 0) {
            User::where('id', $request->user_id)
                ->update([
                    'account_bal' => $user_bal + $request->amount,
                ]);
        }
        $user_roi = $user->roi;
        if (isset($request['type']) == "ROI") {
            User::where('id', $request->user_id)
                ->update([
                    'roi' => $user_roi + $request->amount,
                ]);
        }

        $user->refresh();
        NotificationService::notifyUser($user, 'account', 'Account Credited', 'Your account has been credited with $' . number_format($request->amount, 2) . ' (' . ($request->type ?? 'Manual') . ').', url('dashboard/accounthistory'));

        return redirect()->back()
            ->with('success', 'Action Sucessful!');
    }


    //Delete user
    public function delsystemuser($id)
    {
        $target = User::find($id);

        if (!$target) {
            return redirect()->route('manageusers')->with('error', 'User not found or has already been deleted.');
        }

        if ($target->isProtectedAccount()) {
            return redirect()->route('manageusers')->with('error', 'This protected account cannot be deleted.');
        }

        if (Auth::guard('web')->check() && (int) Auth::guard('web')->id() === (int) $target->id) {
            return redirect()->route('manageusers')->with('error', 'You cannot delete the account you are currently signed in as.');
        }

        //delete the user's withdrawals and deposits
        $deposits = Deposit::where('user', $id)->get();
        if (!empty($deposits)) {
            foreach ($deposits as $deposit) {
                Deposit::where('id', $deposit->id)->delete();
            }
        }
        $withdrawals = Withdrawal::where('user', $id)->get();
        if (!empty($withdrawals)) {
            foreach ($withdrawals as $withdrawal) {
                Withdrawal::where('id', $withdrawal->id)->delete();
            }
        }
        //delete the user plans
        $userp = User_plans::where('user', $id)->get();
        if (!empty($userp)) {
            foreach ($userp as $p) {
                //delete plans that their owner does not exist
                User_plans::where('id', $p->id)->delete();
            }
        }
        //delete the user from agent model if exists
        $agent = Agent::where('agent', $id)->first();
        if (!empty($agent)) {
            Agent::where('id', $agent->id)->delete();
        }


         //delete the user from Bid model if exists
         $Bid = Bid::where('user_id', $id)->first();
         if (!empty($Bid)) {
            Bid::where('id', $Bid->id)->delete();
         }


         //delete the user from Loan model if exists
         $Loan = Loan::where('user_id', $id)->first();
         if (!empty($Loan)) {
            Loan::where('id', $Loan->id)->delete();
         }


         //delete the user from Nft model if exists
         $Nft = NFT::where('user_id', $id)->first();
         if (!empty($Loan)) {
            Nft::where('id', $Nft->id)->delete();
         }


         //delete the user from Trade model if exists
         $Trade = Trade::where('user_id', $id)->first();
         if (!empty($Loan)) {
            Trade::where('id', $Trade->id)->delete();
         }




         //delete the user from SignalSubscription model if exists
         $SignalSubscription = SignalSubscription::where('user_id', $id)->first();
         if (!empty($SignalSubscription)) {
            Trade::where('id', $SignalSubscription->id)->delete();
         }


        if (DB::table('mt4_details')->where('client_id', $id)->exists()) {
            Mt4Details::where('client_id', $id)->delete();
        }

        // delete user from verification list
        if (DB::table('kycs')->where('user_id', $id)->exists()) {
            Kyc::where('user_id', $id)->delete();
        }

        User::where('id', $id)->delete();
        return redirect()->route('manageusers')
            ->with('success', 'User Account deleted successfully!');
    }

    //update users info
    public function edituser(Request $request)
    {

        User::where('id', $request['user_id'])
            ->update([
                'name' => $request['name'],
                'email' => $request['email'],
                'country' => $request['country'],
                'username' => $request['username'],
                'phone' => $request['phone'],
                'win_rate' => $request->win_rate,
                'ref_link' => $request['ref_link'],
            ]);
        return redirect()->back()->with('success', 'User details updated Successfully!');
    }


 public function notify(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'banner_type' => 'required|in:success,warning,danger',
        ]);

        $user = User::find($request['user_id']);
        if ($user) {
            $user->update([
                'dashboard_banner_message' => $request['notify'],
                'dashboard_banner_type' => $request['banner_type'],
                'dashboard_banner_enabled' => $request->has('banner_enabled') ? true : false,
            ]);
        }

        return redirect()->back()->with('success', 'Dashboard banner updated successfully!');
    }


    public function winRate(Request $request)
    {

        User::where('id', $request['user_id'])
            ->update([
                'win_rate' => $request['winrate'],



            ]);
        return redirect()->back()->with('success', 'Win Rate Updated Successfully!');
    }

    public function signalStrength(Request $request)
    {
        $request->validate([
            'signal_strength_score' => 'required|integer|min:0|max:100',
            'user_id' => 'required|exists:users,id',
        ]);

        User::where('id', $request['user_id'])
            ->update([
                'signal_strength_enabled' => $request->has('signal_strength_enabled') ? true : false,
                'signal_strength_score' => $request['signal_strength_score'],
            ]);

        return redirect()->back()->with('success', 'Signal Strength Updated Successfully!');
    }

    public function tradeSignal(Request $request)
    {
        $request->validate([
            'trade_signal' => 'required|integer|min:0|max:100',
            'user_id' => 'required|exists:users,id',
        ]);

        User::where('id', $request['user_id'])
            ->update([
                'trade_signal' => $request['trade_signal'],
            ]);

        return redirect()->back()->with('success', 'Trade Signal Updated Successfully!');
    }





    public function withdrawalcode(Request $request)
    {
        $data = [];

        for ($i = 1; $i <= 5; $i++) {
            $enabled = $request->has("code{$i}_enabled");
            $data["code{$i}_enabled"] = $enabled;
            $data["code{$i}"] = $request->input("code{$i}");
            $data["code{$i}_label"] = $request->input("code{$i}_label") ?: $this->defaultCodeLabel($i);

            // If enabled, code value must not be empty
            if ($enabled && empty($request->input("code{$i}"))) {
                return redirect()->back()->with('message', "Code {$i} is enabled but has no value set.");
            }
        }

        User::where('id', $request['user_id'])->update($data);

        return redirect()->back()->with('success', 'Withdrawal Code Updated Successfully!');
    }

    private function defaultCodeLabel($step)
    {
        $labels = [
            1 => 'Broker Commission Fee Code',
            2 => 'Anti-Theft Security Code',
            3 => 'IMF Code',
            4 => 'Cost of Transfer Code',
            5 => 'Taxation Code',
        ];
        return $labels[$step] ?? "Code {$step}";
    }

    //Send mail to one user
    public function sendmailtooneuser(Request $request)
    {

        $mailduser = User::where('id', $request->user_id)->first();
        try {
            Mail::to($mailduser->email)->send(new NewNotification($request->message, $request->subject, $mailduser->name));
        } catch (\Exception $e) {
            Log::error('Send mail to user failed: ' . $e->getMessage());
        }

        NotificationService::notifyUser($mailduser, 'account', $request->subject, $request->message, url('dashboard'));

        return redirect()->back()->with('success', 'Your message was sent successfully!');
    }

    // Send Mail to all users
    public function sendmailtoall(Request $request)
    {

        if ($request->category == "All") {
            User::select(['email', 'id'])->chunkById(100, function ($users) use ($request) {
                foreach ($users as $user) {
                    try {
                        Mail::to($user->email)->send(new NewNotification($request->message, $request->subject, $request->title, null, null, $request->greet));
                    } catch (\Exception $e) {
                        Log::error('Bulk mail to ' . $user->email . ' failed: ' . $e->getMessage());
                    }
                }
            });
        } elseif ($request->category == "No active plans") {
            User::whereDoesntHave('plans', function (Builder $query) {
                $query->where('active', '!=', 'yes');
            })->select(['email', 'id'])->chunkById(100, function ($users) use ($request) {
                foreach ($users as $user) {
                    try {
                        Mail::to($user->email)->send(new NewNotification($request->message, $request->subject, $request->title, null, null, $request->greet));
                    } catch (\Exception $e) {
                        Log::error('Bulk mail to ' . $user->email . ' failed: ' . $e->getMessage());
                    }
                }
            });
        } elseif ($request->category == "No deposit") {
            User::doesntHave('dp')->select(['email', 'id'])->chunkById(100, function ($users) use ($request) {
                foreach ($users as $user) {
                    try {
                        Mail::to($user->email)->send(new NewNotification($request->message, $request->subject, $request->title, null, null, $request->greet));
                    } catch (\Exception $e) {
                        Log::error('Bulk mail to ' . $user->email . ' failed: ' . $e->getMessage());
                    }
                }
            });
        } elseif ($request->category == "Select Users") {
            DB::table('users')
                ->whereIn('id', array_column($request->users, null))
                ->select(['email', 'id'])
                ->chunkById(100, function ($users) use ($request) {
                    foreach ($users as $user) {
                        try {
                            Mail::to($user->email)->send(new NewNotification($request->message, $request->subject, $request->title, null, null, $request->greet));
                        } catch (\Exception $e) {
                            Log::error('Bulk mail to ' . $user->email . ' failed: ' . $e->getMessage());
                        }
                    }
                });
        }

        return redirect()->back()->with('success', 'Your message was sent successfully!');
    }

    // Delete User investment Plan
    public function deleteplan($id)
    {
        User_plans::where('id', $id)->delete();
        return redirect()->back()->with('success', 'User Plan deleted successfully!');
    }

    public function saveuser(Request $request)
    {

        $request->validate([
            'name' => 'required|max:255',
            'username' => 'required|unique:users,username',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6',
        ]);

        $thisid = DB::table('users')->insertGetId([
            'name' => $request['name'],
            'email' => $request['email'],
            'ref_by' => NULL,
            'username' => $request['username'],
            'password' => Hash::make($request->password),
            'status' => 'active',
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
        ]);

        //assign referal link to user
        $settings = Settings::where('id', '=', '1')->first();
        $user = User::where('id', $thisid)->first();

        User::where('id', $thisid)
            ->update([
                'ref_link' => $settings->site_address . '/ref/' . $user->username,
            ]);
        return redirect()->back()->with('success', 'User created Sucessfully!');
    }
}
