<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /**
     * Show the login form.
     *
     * @return \Illuminate\View\View
     */
    public function login()
    {
        return view('auth/login');
    }

     /**
     * Get the guard to be used during authentication.
     *
     * @return \Illuminate\Contracts\Auth\StatefulGuard
     */

    /**
     * Validate and process the login request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function loginValidation(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->route('dashboard');

        } else {

            // Check if user exists with provided email
            $userExists = User::where('email', $credentials['email'])->exists();

            if ($userExists) {
                return redirect()->back()->withInput()->withErrors(['password' => 'Incorrect Password']);
            } else {
                return redirect()->back()->withInput()->withErrors(['email' => 'Email does not exist!']);
            }
        }
    }
}
