<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }

    public function store(Request $request)
    {
        $request->validate([
            'email' => 'email|required',
            'password' => 'required'
        ]);

        if (Auth::attempt($request->only('email', 'password'), $request->remember)) {
            $request->session()->regenerate();

            if(auth()->user()->role == 'borrower') {
                return redirect()->route('borrower');
            }
            
            return redirect()->route('dashboard');
        }

        return back()->with('error', 'Email or password incorrect')->withInput();
    }

    public function logout ()
    {
        Auth::logout();
        session()->invalidate();
        session()->regenerateToken();
        return redirect()->route('login');
    }
}
