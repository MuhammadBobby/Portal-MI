<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;

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
        die($request);
        $request->fulfill();

        // set email verified
        $request->user()->email_verified_at = now();

        return redirect()->route('/')->with('success', 'Your email has been verified!');
    }


    public function resend(Request $request)
    {
        // Pastikan user terautentikasi
        if ($request->user()) {
            $request->user()->sendEmailVerificationNotification();
            return back()->with('message', 'Verification link sent!');
        }

        // Jika tidak ada user yang terautentikasi, redirect dengan pesan error
        return redirect()->route('login')->with('error', 'Please log in to resend the verification email.');
    }
}
