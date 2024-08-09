<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\News;
use App\Models\User;
use Illuminate\View\View;

class LandingPageController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Welcome to the Portal MI',
            'news' => News::latest()->with('author', 'category')->take(6)->get(),
            'topNews' => News::latest()->with('author', 'category')->where('top', 'yes')->take(3)->get(),
            'categories' => Category::all(),
        ];
        return view('home', $data);
    }
}
