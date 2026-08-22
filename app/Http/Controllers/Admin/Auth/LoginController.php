<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Models\Admin;
use App\Models\Settings;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Mail\NewNotification;
use App\Mail\Twofa;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class LoginController extends Controller
{
   // use AuthenticatesUsers;
/*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating admin users for the application and
    | redirecting them to your admin dashboard.
    |
    */

    /**
     * This trait has all the login throttling functionality.
     */
    // use ThrottlesLogins;




    /**
     * Show the login form.
     * 
     * @return \Illuminate\Http\Response
     */
    public function showLoginForm()
    {
        return view('auth.adminlogin', [
            'title' => 'Admin Login',
            'settings' => Settings::where('id', '=', '1')->first(),
        ]);
    }

    /**
     * Login the admin.
     * 
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function adminlogin(Request $request)
    {
        $request->validate([
            'email' => 'required|email|max:191',
            'password' => 'required|string|min:4|max:255',
        ]);

        $user = Admin::where('email', $request->email)
            ->where('status', 'active')
            ->first();

        // User doesn't exist or is not active
        if (!$user) {
            return back()
                ->withInput($request->only('email'))
                ->withErrors([
                    'email' => 'The provided credentials do not match our records.',
                ]);
        }

        // Check password
        if (!\Hash::check($request->password, $user->password)) {
            return back()
                ->withInput($request->only('email'))
                ->withErrors([
                    'email' => 'The provided credentials do not match our records.',
                ]);
        }

        // Login manually
        Auth::guard('admin')->login($user);

        $request->session()->regenerate();

        // 2FA
        if ($user->enable_2fa === 'enabled') {

            $token = mt_rand(10000, 99999);

            $user->update([
                'token_2fa' => $token,
                'pass_2fa' => 'false',
            ]);

            $settings = Settings::where('id', 1)->first();

            $objDemo = new \stdClass();
            $objDemo->message = $token;
            $objDemo->sender = $settings?->site_name ?? config('app.name');
            $objDemo->subject = 'Two Factor Code';
            $objDemo->date = now();

            Mail::bcc($user->email)->send(new Twofa($objDemo));

            return redirect()->intended('/admin/2fa');
        }

        return redirect()->intended('/admin/dashboard');
    }


    public function validate_admin()
    {
        if (Auth::guard('admin')->check()) {
            return redirect()
                ->intended(route('admin.dashboard'))
                ->with('message', 'You are Logged in as Admin!');
        } else {
            return redirect()
                ->route('adminloginform')
                ->with('message', 'Not allowed');
        }
    }

    /**
     * Logout the admin.
     * 
     * @return \Illuminate\Http\RedirectResponse
     */
    public function adminlogout(Request $request)
    {
        Auth::guard('admin')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()
            ->route('adminloginform')
            ->with('status', 'Admin has been logged out!');
    }
}
