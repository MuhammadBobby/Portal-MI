<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VerificationController extends Controller
{

    public function notice()
    {

        $data = [
            'title' => 'Verify Email | Portal MI',
        ];
        return view('auth.verify-email', $data);
    }


    public function verify(EmailVerificationRequest $request)
    {
        $request->fulfill();

        return redirect()->route('home')->with('success', 'Your email has been verified!');
    }


    public function resend(Request $request)
    {
        // Pastikan user terautentikasi
        if (Auth::check()) {
            $user = Auth::user();
            if ($user) {
                $user->sendEmailVerificationNotification();
                return back()->with('success', 'Verification link sent!');
            }
        }

        // Jika tidak ada user yang terautentikasi, redirect dengan pesan error
        return redirect()->route('login')->with('error', 'Please log in to resend the verification email.');
    }
}
