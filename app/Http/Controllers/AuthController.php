<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }

    public function dashboard()
    {
        $page = 'dashboard';
        return view('dashboard', compact('page'));
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }

    public function loginSubmit(Request $request)
    {
        $request->validate([
            'pin' => 'required',
        ]);

        $user = User::where('pin', $request->pin)->first();
        if ($user) {
            Auth::login($user);
            return redirect()->route('dashboard')->with('success', 'Login Success!');
        } else {
            return redirect()->back()->withErrors('Invalid pin.');
        }
    }
}
