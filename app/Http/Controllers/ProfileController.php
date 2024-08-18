<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Str;


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


    public function updateProfile(Request $request)
    {
        $request->validate([
            'image' => 'image|mimes:jpeg,png,jpg,svg,webp|max:2048',
            'name' => 'required|string|min:3',
            'nim' => 'required|numeric|unique:users,nim,' . auth()->user()->id,
            'email' => 'required|email|unique:users,email,' . auth()->user()->id,
            'class' => 'required|string',
            'year' => 'required',
        ]);

        $slug = Str::slug($request->name, '-');
        $imageName = '';
        // Periksa apakah ada file image yang baru di-upload
        if ($request->hasFile('image')) {
            // Generate nama unik untuk file baru
            $newImageName = $slug . '-' . time() . '.' . $request->image->extension();

            // Hapus image lama jika ada, namun  jgn default.svg
            if (auth()->user()->image && auth()->user()->image !== 'default.svg') {
                if (file_exists(public_path('uploads/users/' . auth()->user()->image))) {
                    unlink(public_path('uploads/users/' . auth()->user()->image));
                }
            }

            // Upload image baru
            $request->image->move(public_path('uploads/users'), $newImageName);
            // Update nama image di database
            $imageName = $newImageName;
        } else {
            $imageName = auth()->user()->image;
        }


        User::where('id', auth()->user()->id)->update([
            'name' => $request->name,
            'nim' => $request->nim,
            'email' => $request->email,
            'class' => $request->class,
            'year_of_entry' => $request->year,
            'image' => $imageName,
            'remember_token' => Str::random(10),
        ]);

        return redirect()->route('profile')->with('success', 'Profile updated successfully.');
    }
}
