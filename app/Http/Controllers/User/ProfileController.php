<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Settings;
use App\Models\ExchangeRate;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    //Updating Profile Route
    public function updateprofile(Request $request)
    {
        $request->validate([
            'name' => 'nullable|string|max:255',
            'country' => 'nullable|string|max:255',
            'state' => 'nullable|string|max:255',
            'zipcode' => 'nullable|string|max:50',
            'address' => 'nullable|string|max:500',
            'currency_code' => 'nullable|string|max:10',
        ]);

        // Only update fields that were actually submitted. This prevents
        // accidentally wiping columns (e.g. dob) that are not part of the form.
        $updateData = [];
        foreach (['name', 'country', 'state', 'zipcode', 'address'] as $field) {
            if ($request->has($field)) {
                $updateData[$field] = $request->input($field);
            }
        }

        // Update currency if provided and valid
        if ($request->filled('currency_code')) {
            $exists = ExchangeRate::where('currency_code', $request->currency_code)
                ->where('is_active', true)
                ->exists();
            if ($exists) {
                $updateData['currency_code'] = $request->currency_code;
                // Clear cached rate for this user
                ExchangeRate::clearCache($request->currency_code);
            }
        }

        if (!empty($updateData)) {
            User::where('id', Auth::user()->id)->update($updateData);
        }

        return redirect()->back()
            ->with('success', 'Profile Information Updated Successfully.');
    }

    //update account and contact info
    public function updateacct(Request $request)
    {
        User::where('id', Auth::user()->id)
            ->update([
                'bank_name' => $request['bank_name'],
                'account_name' => $request['account_name'],
                'account_number' => $request['account_no'],
                'swift_code' => $request['swiftcode'],
                'btc_address' => $request['btc_address'],
                'eth_address' => $request['eth_address'],
                'ltc_address' => $request['ltc_address'],
                'usdt_address' => $request['usdt_address'],
            ]);
        return response()->json(['status' => 200, 'success' => 'Withdrawal Info updated Sucessfully']);
    }

    //Update Password
    public function updatepass(Request $request)
    {
        $request->validate([
            'current_password' => 'required',
            'password' => 'required|string|min:6|confirmed',
            'password_confirmation' => 'required',
        ]);

        $user = User::find(Auth::user()->id);

        if (!Hash::check($request->current_password, $user->password)) {
            return back()->with('message', 'Current password does not match!');
        }
        $user->password = Hash::make($request->password);
        $user->save();
        return back()->with('success', 'Password updated successfully');
    }

    // Update email preference logic
    public function updateemail(Request $request)
    {
        $user = User::find(Auth::user()->id);

        $user->sendotpemail = $request->otpsend;
        $user->sendroiemail = $request->roiemail;
        $user->sendinvplanemail = $request->invplanemail;
        $user->save();
        return response()->json(['status' => 200, 'success' => 'Email Preference updated']);
    }




     //Updating Profile Route
     public function updateprofileimage(Request $request)
     {
         $this->validate($request, [
             'profileimage' => 'required|image|mimes:jpg,jpeg,png|max:4096',
         ], [
             'profileimage.required' => 'Please choose an image to upload.',
             'profileimage.image' => 'The file must be a valid image.',
             'profileimage.mimes' => 'Only JPG and PNG images are allowed.',
             'profileimage.max' => 'The image must not be larger than 4MB.',
         ]);

         $user = User::find(Auth::user()->id);

         $document1 = $request->file('profileimage');
         // Use content-based extension detection, not client-supplied filename
         $ext = $document1->extension();
         $whitelist = array('jpeg', 'jpg', 'png');

         if (!in_array($ext, $whitelist)) {
             return redirect()->back()
                 ->with('message', 'Unaccepted image type uploaded.');
         }

         $strtxt = $this->RandomStringGenerator(6);
         // Use a random name to prevent filename-based attacks
         $cardname = $strtxt . time() . '.' . $ext;

         // Remove the user's previous photo (if any) so we don't leave orphans
         if ($user->profile_photo_path) {
             $oldPath = storage_path('app/public/' . $user->profile_photo_path);
             if (file_exists($oldPath)) {
                 @unlink($oldPath);
             }
         }

         // Store to the public disk: storage/app/public/photos/<name>
         $document1->storeAs('public/photos', $cardname);

         // Save the path relative to the public disk (e.g. photos/<name>)
         User::where('id', $user->id)->update([
             'profile_photo_path' => 'photos/' . $cardname,
         ]);

         return redirect()->back()
             ->with('success', 'Profile Photo Updated Successfully.');
     }

// for front end content management
private function RandomStringGenerator($n) 
{ 
    $generated_string = ""; 
    $domain = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890"; 
    $len = strlen($domain); 
    for ($i = 0; $i < $n; $i++) 
    { 
        $index = rand(0, $len - 1); 
        $generated_string = $generated_string . $domain[$index]; 
    } 
    // Return the random generated string 
    return $generated_string; 
} 

}