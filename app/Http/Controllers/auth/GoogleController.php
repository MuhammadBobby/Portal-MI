<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class GoogleController extends Controller
{
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback()
    {
        try {
            $googleUser = Socialite::driver('google')->user();
            $user = User::where('email', $googleUser->getEmail())->first();

            if ($user) {
                Auth::login($user, true);
            } else {
                // Jika user belum ada, buat user baru
                $user = User::create([
                    'name' => $googleUser->getName(),
                    'email' => $googleUser->getEmail(),
                    'password' => bcrypt(Str::random(24)),
                    'google_id' => $googleUser->getId(), // Jika Anda menambahkan field google_id di tabel users
                    'image' => $googleUser->getAvatar(),
                    'nim' => 0,
                    'role' => 'member',
                    'remember_token' => Str::random(10),
                    'email_verified_at' => now(),
                ]);

                Auth::login($user, true);
            }

            return redirect()->route('home'); // Sesuaikan route tujuan setelah login
        } catch (\Exception $e) {
            return redirect()->route('login')->with('error', 'Error logging in with Google.');
        }
    }
}
