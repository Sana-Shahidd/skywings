<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    | This controller handles new user registration.
    | After registration user is automatically logged in
    | and sent to the user dashboard.
    */

    use RegistersUsers;

    /**
     * After registration send user to user dashboard.
     */
    protected $redirectTo = '/user/dashboard';

    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Validate registration form fields.
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name'     => ['required', 'string', 'max:255'],
            'email'    => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create new user in database.
     * Role is set to 'user' by default for all registrations.
     */
    protected function create(array $data)
    {
        return User::create([
            'name'     => $data['name'],
            'email'    => $data['email'],
            'password' => Hash::make($data['password']),
            'role'     => 'user', // All new registrations are passengers
        ]);
    }
}