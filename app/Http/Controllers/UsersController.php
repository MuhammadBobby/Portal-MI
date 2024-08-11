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
}
