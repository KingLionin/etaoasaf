<?php

namespace App\Http\Controllers;

use App\Models\EmployeeInfo\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
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
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            $user->token = Str::random(60); // Generate a new token
            $user->save();

            $request->session()->regenerate();
            return redirect(RouteServiceProvider::HOME); // Redirect to the HOME route
        }

        // Authentication failed
        return redirect()->back()->withInput()->withErrors(['email' => 'These credentials do not match our records']);
    }
}
