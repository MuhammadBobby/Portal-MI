<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Redirect;


class AuthController extends Controller
{
    public function showLoginForm()
    {
        $data = [
            'title' => 'Login | Admin Portal MI',
        ];
        return view('auth/login', $data);
    }



    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');
        $remember = $request->has('remember');

        // cek kredential
        if (auth()->attempt($credentials, $remember)) {
            $request->session()->regenerate();
            return redirect()->route('home');
        }

        // Jika gagal, kembalikan ke halaman login dengan error
        return Redirect::back()->with('error', 'Invalid email or password! Please input correct email and password.');
    }


    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('home');
    }


    public function showRegistrationForm()
    {
        $data = [
            'title' => 'Register | Admin Portal MI',
        ];
        return view('auth/register', $data);
    }


    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'nim' => 'required|numeric|unique:users|min:8',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|confirmed|min:8',
        ]);

        $user = User::create([
            'name' => $request->name,
            'nim' => $request->nim,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'member',
            'remember_token' => Str::random(10),
        ]);

        // otomatis login
        Auth::login($user);
        return redirect()->route('home');
    }
}
