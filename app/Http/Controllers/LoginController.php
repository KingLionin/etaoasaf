<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class LoginController extends Controller
{
    /**
     * Show the login form.
     *
     * @return \Illuminate\View\View
     */
    public function login()
    {
        return view('auth.login');
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

        // Retrieve employee record with the provided email
        $employee = DB::connection('main')
            ->table('employees')
            ->where('email', $request->email)
            ->first();

        // Check if employee exists
        if (!$employee) {
            return redirect()->back()->withInput()->withErrors(['email' => 'Email does not exist!']);
        }

        // Retrieve user record with the corresponding employee_id
        $user = User::where('employee_id', $employee->id)->first();

        // Check if user and password match
        if ($user && Hash::check($request->password, $user->password)) {
            // Authentication successful, log in the user
            Auth::login($user);
            // Regenerate session and redirect to dashboard
            $request->session()->regenerate();
            return redirect()->intended('dashboard');
        }

        // Authentication failed
        return redirect()->back()->withInput()->withErrors(['password' => 'Incorrect Password']);
    }
}
