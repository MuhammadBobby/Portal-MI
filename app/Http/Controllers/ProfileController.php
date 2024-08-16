<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\URL;

class ProfileController extends Controller
{

    public function profile()
    {
        $data = [
            'title' => 'Profile | Portal MI',
        ];
        return view('pages/profile/index', $data);
    }

    public function editProfile()
    {
        // Encrypt the user's email
        $encryptedEmail = Crypt::encryptString(auth()->user()->email);

        $data = [
            'title' => 'Edit Profile | Portal MI',
            'encryptedEmail' => $encryptedEmail
        ];
        return view('pages/profile/edit-profile', $data);
    }
}
