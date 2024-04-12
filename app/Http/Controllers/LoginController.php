<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;


class LoginController extends Controller
{
     /**
     * Show the login form.
     *
     * @return \Illuminate\View\View
     */
    public function loginpage()
    {
        return view('auth/login');
    }

    /**
     * Validate and process the login request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function loginValidation(Request $request)
    {
        $request->validate([
            'username' => [
                'required',
                function ($attribute, $value, $fail) {
                    if (!User::where('username', $value)->exists()) {
                        $fail('User does not exist!');
                    }
                }
            ],
            'password' => 'required',
        ]);
        
        $credentials = $request->only('username', 'password');

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect(RouteServiceProvider::HOME); // Redirect to the HOME route
        }

        // Check if user exists with the provided username
        $userExists = User::where('username', $request->username)->exists();

        if (!$userExists) {
            // User with the provided username doesn't exist
            return redirect()->back()->withInput()->withErrors(['username' => 'User does not exist']);
        }

        // Username exists but password is incorrect
        return redirect()->back()->withInput()->withErrors(['password' => 'Incorrect password']);
    }
}
