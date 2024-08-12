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


    public function edit(User $user)
    {
        $data = [
            'title' => 'Edit User | Admin Portal MI',
            'user' => $user,
        ];
        return view('pages/admin/users/edit', $data);
    }


    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required|string|min:3',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'role' => 'required|string',
        ]);



        User::where('id', $user->id)->update([
            'name' => $request->name,
            'role' => $request->role,
            'email' => $request->email,
            'updated_at' => now(),
        ]);
        return redirect()->route('users.index')->with('success', 'User updated successfully.');
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
