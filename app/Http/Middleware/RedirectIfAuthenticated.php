<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RedirectIfAuthenticated
{
    /*
    |--------------------------------------------------------------------------
    | Redirect If Authenticated Middleware
    |--------------------------------------------------------------------------
    | This middleware checks if user is already logged in.
    | If they are logged in and try to visit login/register page
    | it redirects them to their correct dashboard based on role.
    */

    public function handle(Request $request, Closure $next, string ...$guards): Response
    {
        $guards = empty($guards) ? [null] : $guards;

        foreach ($guards as $guard) {
            if (Auth::guard($guard)->check()) {

                // Get logged in user role
                $role = Auth::user()->role;

                // Redirect to correct dashboard based on role
                if ($role === 'admin') {
                    return redirect('/admin/dashboard');
                } elseif ($role === 'staff') {
                    return redirect('/staff/dashboard');
                } else {
                    return redirect('/user/dashboard');
                }
            }
        }

        return $next($request);
    }
}