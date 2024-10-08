<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Redirect;

class ForgotPasswordController extends Controller
{
    public function showForgotPasswordForm()
    {
        $data = [
            'title' => 'Forgot Password',
        ];
        return view('auth.forgot-password', $data);
    }


    public function sendResetLinkEmail(Request $request)
    {
        $request->validate(['email' => 'required|email']);

        $response = Password::sendResetLink($request->only('email'));

        return $response == Password::RESET_LINK_SENT
            ? Redirect::route('password.request')->with('success', __('We have emailed your password reset link!'))
            : Redirect::route('password.request')->withErrors(['email' => __($response)]);
    }
}
