<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Settings;
use App\Models\Wdmethod;
use App\Models\Withdrawal;
use App\Models\WithdrawalBrokerCommissionPayment;
use App\Mail\WithdrawalStatus;
use App\Mail\NewNotification;
use App\Services\NotificationService;
use App\Traits\PingServer;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class ManageWithdrawalController extends Controller
{
    use PingServer;

    //process withdrawals
    public function pwithdrawal(Request $request)
    {
        $withdrawal=Withdrawal::where('id',$request->id)->first();
        if (!$withdrawal) {
            return redirect()->route('mwithdrawals')->with('error', 'Withdrawal request not found.');
        }
        if ($request->action === 'Paid' && $withdrawal->status === 'Processed') {
            return redirect()->back()->with('error', 'This withdrawal has already been processed.');
        }
        if (
            $request->action === 'Paid'
            && (float) $withdrawal->broker_commission_amount > 0
            && (
                !$withdrawal->broker_commission_confirmed
                || $withdrawal->broker_commission_status !== 'approved'
            )
        ) {
            return redirect()->back()->with('error', 'Approve the broker commission payment before processing this withdrawal.');
        }
        $user=User::where('id',$withdrawal->user)->first();
         $settings=Settings::where('id', '=', '1')->first();


        if ($request->action == "Paid") {
            Withdrawal::where('id',$request->id)
            ->update([
                'status' => 'Processed',
            ]);
            
            //settings



//deduting user balance   if its on admin Admin Aprove          
        if ($settings->deduction_option == "AdminApprove") {
            //debit user
            User::where('id', $user->id)->update([
                'account_bal' => $user->account_bal -  $withdrawal->to_deduct,
                'withdrawotp' => NULL,
            ]);
        }

  
         //sending mail to user  
            
      $withdrawal=Withdrawal::where('id',$request->id)->first();
            
                 //send notification to user
     try {
         Mail::to($user->email)->send(new WithdrawalStatus( $withdrawal, $user, 'Withdrawal Approved'));
     } catch (\Exception $e) {
         Log::error('Withdrawal approved email failed: ' . $e->getMessage());
     }

     NotificationService::notifyUser($user, 'withdrawal', 'Withdrawal Approved', 'Your withdrawal of $' . number_format($withdrawal->amount, 2) . ' has been processed and approved.', url('dashboard/withdrawals'));
     
        }else {

            if($withdrawal->user==$user->id){
                
                 if ($settings->deduction_option == "userRequest") {
                User::where('id',$user->id)
                ->update([
                    'account_bal' => $user->account_bal+$withdrawal->to_deduct,
                ]);
                 }
                // Withdrawal::where('id',$request->id)->delete();

                 Withdrawal::where('id',$request->id)
            ->update([
                'status' => 'Rejected',
            ]);
                if ($request->emailsend == "true") {
                    try {
                        Mail::to($user->email)->send(new NewNotification($request->reason,$request->subject, $user->name));
                    } catch (\Exception $e) {
                        Log::error('Withdrawal rejected email failed: ' . $e->getMessage());
                    }
                }

                NotificationService::notifyUser($user, 'withdrawal', 'Withdrawal Declined', 'Your withdrawal request has been declined. Please contact support for details.', url('dashboard/withdrawals'));

              }

        }

        return redirect()->route('mwithdrawals')->with('success', 'Action Sucessful!');
    }

    /**
     * Manually verify the payment reference submitted for a withdrawal's
     * broker commission. The user cannot mark this requirement as paid.
     */
    public function verifyBrokerCommission(int $id)
    {
        $result = DB::transaction(function () use ($id) {
            $withdrawal = Withdrawal::where('id', $id)->lockForUpdate()->firstOrFail();

            if ((float) $withdrawal->broker_commission_amount <= 0) {
                return ['error' => 'This withdrawal has no broker commission requirement.'];
            }
            if ($withdrawal->status !== 'Pending') {
                return ['error' => 'Only a pending withdrawal can have its commission payment verified.'];
            }
            if ($withdrawal->broker_commission_status !== 'submitted') {
                return ['error' => 'There is no submitted commission payment awaiting review.'];
            }
            $payment = WithdrawalBrokerCommissionPayment::where('withdrawal_id', $withdrawal->id)
                ->where('status', 'submitted')
                ->orderByDesc('id')
                ->lockForUpdate()
                ->first();
            if (!$payment) {
                return ['error' => 'The commission payment request could not be found.'];
            }

            $admin = Auth::guard('admin')->user();
            $adminName = trim($admin->firstName . ' ' . $admin->lastName);
            $payment->status = 'approved';
            $payment->reviewed_by = $admin->id;
            $payment->reviewed_by_name = $adminName;
            $payment->reviewed_at = now();
            $payment->save();

            $withdrawal->broker_commission_confirmed = true;
            $withdrawal->broker_commission_status = 'approved';
            $withdrawal->broker_commission_verified_by = $admin->id;
            $withdrawal->broker_commission_confirmed_at = now();
            $withdrawal->verification = 'Completed';
            $withdrawal->save();

            return ['withdrawal' => $withdrawal, 'payment' => $payment];
        });

        if (isset($result['error'])) {
            return redirect()->back()->with('error', $result['error']);
        }

        $withdrawal = $result['withdrawal'];
        $user = User::find($withdrawal->user);
        if ($user) {
            NotificationService::notifyUser(
                $user,
                'withdrawal',
                'Broker Commission Verified',
                'Your broker commission payment for withdrawal #' . $withdrawal->id . ' has been approved. Your withdrawal is now in final processing.',
                url('dashboard/withdraw-funds')
            );
        }

        return redirect()->back()->with('success', 'Broker commission payment approved. The withdrawal is ready for final processing.');
    }

    public function rejectBrokerCommission(Request $request, int $id)
    {
        $validated = $request->validate([
            'reason' => 'required|string|max:1000',
        ]);

        $result = DB::transaction(function () use ($id, $validated) {
            $withdrawal = Withdrawal::where('id', $id)->lockForUpdate()->firstOrFail();
            if ((float) $withdrawal->broker_commission_amount <= 0 || $withdrawal->status !== 'Pending') {
                return ['error' => 'This pending withdrawal has no reviewable broker commission payment.'];
            }
            if ($withdrawal->broker_commission_status !== 'submitted') {
                return ['error' => 'There is no submitted commission payment awaiting review.'];
            }

            $payment = WithdrawalBrokerCommissionPayment::where('withdrawal_id', $withdrawal->id)
                ->where('status', 'submitted')
                ->orderByDesc('id')
                ->lockForUpdate()
                ->first();
            if (!$payment) {
                return ['error' => 'The commission payment request could not be found.'];
            }

            $admin = Auth::guard('admin')->user();
            $adminName = trim($admin->firstName . ' ' . $admin->lastName);
            $payment->status = 'rejected';
            $payment->rejection_reason = $validated['reason'];
            $payment->reviewed_by = $admin->id;
            $payment->reviewed_by_name = $adminName;
            $payment->reviewed_at = now();
            $payment->save();

            $withdrawal->broker_commission_status = 'rejected';
            $withdrawal->broker_commission_confirmed = false;
            $withdrawal->broker_commission_rejection_reason = $validated['reason'];
            $withdrawal->save();

            return ['withdrawal' => $withdrawal];
        });

        if (isset($result['error'])) {
            return redirect()->back()->with('error', $result['error']);
        }

        $withdrawal = $result['withdrawal'];
        $user = User::find($withdrawal->user);
        if ($user) {
            NotificationService::notifyUser(
                $user,
                'withdrawal',
                'Broker Commission Payment Rejected',
                'The broker commission payment for withdrawal #' . $withdrawal->id . ' was not approved. Reason: ' . $validated['reason'] . ' You may submit a corrected payment reference.',
                url('dashboard/withdraw-funds')
            );
        }

        return redirect()->back()->with('success', 'Commission payment rejected. The user can submit a corrected payment reference.');
    }


    public function processwithdraw($id){
         $with = Withdrawal::where('id',$id)->first();
         if (!$with) {
             return redirect()->route('mwithdrawals')->with('message', 'Withdrawal request not found.');
         }
         $method = Wdmethod::where('name', $with->payment_mode)->first();
         $user = User::where('id', $with->user)->first();
        return view('admin.Withdrawals.pwithrdawal',[
            'withdrawal' => $with,
            'commissionPayments' => $with->brokerCommissionPayments,
            'method' => $method,
            'user' => $user,
            'title'=>'Process withdrawal Request',
        ]);
    }

    // Edit withdrawal (backdate + edit amount/status)
    public function edit(int $id)
    {
        $withdrawal = Withdrawal::findOrFail($id);
        $title = 'Edit Withdrawal #' . $id;
        return view('admin.Withdrawals.edit', compact('withdrawal', 'title'));
    }

    public function editWithdrawal(Request $request, int $id)
    {
        $request->validate([
            'amount'       => 'required|numeric|min:0',
            'payment_mode' => 'nullable|string|max:255',
            'status'       => 'required|in:Pending,Processed,Rejected',
            'created_at'   => 'nullable|date',
        ]);

        $withdrawal = Withdrawal::findOrFail($id);
        if (
            $request->status === 'Processed'
            && (float) $withdrawal->broker_commission_amount > 0
            && $withdrawal->broker_commission_status !== 'approved'
        ) {
            return redirect()->back()->with('error', 'Approve the broker commission payment before marking this withdrawal processed.');
        }

        $data = [
            'amount'       => $request->amount,
            'payment_mode' => $request->payment_mode ?? $withdrawal->payment_mode,
            'status'       => $request->status,
            'updated_at'   => now(),
        ];
        if ($request->filled('created_at')) {
            $data['created_at'] = Carbon::parse($request->created_at);
        }
        DB::table('withdrawals')->where('id', $withdrawal->id)->update($data);

        return redirect()->back()->with('success', 'Withdrawal updated successfully!');
    }
}
