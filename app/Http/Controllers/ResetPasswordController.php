<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Redirect;

class ResetPasswordController extends Controller
{
    public function showResetForm($token)
    {
        $data = [
            'title' => 'Reset Password | Portal MI',
            'token' => $token
        ];
        return view('auth.reset-password', $data);
    }


    public function reset(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|confirmed|min:8',
            'token' => 'required'
        ]);

        $response = Password::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function ($user, $password) {
                $user->password = bcrypt($password);
                $user->save();
            }
        );

        return $response == Password::PASSWORD_RESET
            ? Redirect::route('login')->with('success', __('Your password has been reset! Please login with your new password.'))
            : Redirect::route('password.reset', ['token' => $request->token])->withErrors(['email' => __($response)]);
    }
}
