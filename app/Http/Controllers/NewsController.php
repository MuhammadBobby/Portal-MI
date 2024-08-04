<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'News Portal MI',
            'news' => News::latest()->with('author', 'category')->paginate(10),
            'categories' => Category::all(),
        ];
        return view('pages/news', $data);
    }
}
