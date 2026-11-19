<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EnsureAccountIsActive
{
    /**
     * Stop an authenticated user immediately when their account is inactive.
     *
     * This is intentionally enforced on every web request rather than only on
     * dashboard pages, so an existing session cannot keep using protected
     * features after an administrator deactivates the account.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $guard = Auth::guard('web');

        if ($guard->check()) {
            $user = $guard->user();

            if (!$user || !$user->isActive()) {
                $guard->logout();

                if ($request->hasSession()) {
                    $request->session()->invalidate();
                    $request->session()->regenerateToken();
                }

                if ($request->expectsJson()) {
                    return response()->json([
                        'message' => 'Your account has been deactivated. Please contact support.',
                    ], 403);
                }

                return redirect()->route('login')->withErrors([
                    'email' => 'Your account has been deactivated. Please contact support.',
                ]);
            }
        }

        return $next($request);
    }
}
