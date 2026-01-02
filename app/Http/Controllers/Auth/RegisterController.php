<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\RegisterRequest;

class RegisterController extends Controller
{
     public function index()
     {
        return view('auth.register');
     }

     public function register(RegisterRequest $request)
     {
        if (User::where('email', '=', $request->email)->count() > 0) {
            return back()->with('error', 'Email alreday exist')->withInput();
        }

        if($request->password !== $request->confirm) {
            return back()->with('error', 'Enter the confirm password corretcly')->withInput();
        }

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'borrower'
        ]);

        Auth::login($user);
        return redirect()->route('borrower');
     }
}
