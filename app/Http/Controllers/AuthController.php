<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class AuthController extends Controller
{
    public function showLoginForm()
    {
        $data = [
            'title' => 'Login | Admin Portal MI',
        ];
        return view('auth.login', $data);
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // cek kredential
        if (auth()->attempt($credentials = $request->only('email', 'password'))) {
            $request->session()->regenerate();
            return redirect()->route('home');
        }

        // Jika gagal, kembalikan ke halaman login dengan error
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }


    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('home');
    }
}
