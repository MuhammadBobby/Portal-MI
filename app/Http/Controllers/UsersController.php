<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Users Resource | Admin Portal MI',
            'users' => User::latest()->paginate(10),
            'field' => ['No.', 'Name', 'Email', 'Class', 'Year', 'Role'],
        ];
        return view('pages/admin/users/index', $data);
    }

    public function destroy(User $user)
    {
        // Cek apakah user ini terdaftar sebagai author di table news
        $newsCount = $user->news()->count();

        if ($newsCount > 0) {
            // Redirect kembali dengan pesan error jika masih ada kaitan dengan news
            return redirect()->back()->with('error', 'User ini masih terdaftar sebagai author di beberapa berita dan tidak dapat dihapus.');
        }


        User::destroy($user->id);
        return redirect()->route('users.index')->with('success', 'User deleted successfully.');
    }
}
