<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    | This controller handles logging users into the system.
    | After login it checks the user's role and sends them to
    | the correct dashboard.
    | - admin → goes to admin dashboard
    | - staff → goes to staff dashboard
    | - user  → goes to user dashboard
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect after login.
     * We override this with redirectTo() method below
     * so each role goes to their own dashboard.
     */
    protected $redirectTo = '/home';

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        $this->middleware('web');
    }

    /**
     * After login check the role and redirect accordingly.
     * This is the most important method in this file.
     */
    protected function redirectTo()
    {
        // Get the currently logged in user's role
        $role = auth()->user()->role;

        // Send to correct dashboard based on role
        if ($role === 'admin') {
            return '/admin/dashboard';
        } elseif ($role === 'staff') {
            return '/staff/dashboard';
        } else {
            // Default - regular user goes to user dashboard
            return '/user/dashboard';
        }
    }
}