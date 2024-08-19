<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\News;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function admin()
    {
        $data = [
            'title' => 'Admin Portal MI',
            'users' => User::all(),
            'news' => News::latest()->with('author', 'category')->get(),
            'categories' => Category::all(),
        ];
        return view('pages/admin/index', $data);
    }
}
