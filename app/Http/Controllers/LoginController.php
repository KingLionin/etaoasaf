<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    // For Login
    public function login() {
        return view('auth/login');
    }
    public function loginvalidation(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
    
        $credentials = $request->only('email', 'password');
    
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->route('etao.dashboard');
            
        }else {
            $userExists = User::where('email', $credentials['email'])->exists();

            if ($userExists) {
             return redirect()->back()->withInput()->withErrors(['password' => 'Incorrect Password']);
            } else {
            return redirect()->back()->withInput()->withErrors(['email' => 'Email does not exist!']);
            }
        }
    }
}
