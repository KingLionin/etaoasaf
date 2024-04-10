<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
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

        // Attempt to authenticate the user using the provided credentials
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            // Authentication successful, regenerate session and redirect to dashboard
            $request->session()->regenerate();
            return redirect()->route('dashboard');
        }

        // Authentication failed, check if a user with the provided email exists
        $user = User::where('email', $request->email)->first();

        if (!$user) {
            // No user with provided email exists
            return redirect()->back()->withInput()->withErrors(['email' => 'Email does not exist!']);
        }

        // A user with provided email exists, but authentication failed
        return redirect()->back()->withInput()->withErrors(['password' => 'Incorrect Password']);
    }
}
