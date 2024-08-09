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
            'title' => 'News Resource | Admin Portal MI',
            'news' => News::latest()->with('author', 'category')->paginate(10),
            'field' => ['No.', 'Title', 'Author', 'Category', 'Created At'],
        ];
        return view('pages/admin/news/index', $data);
    }

    public function create()
    {
        $data = [
            'title' => 'Create News | Admin Portal MI',
        ];
        return view('pages/admin/news/create', $data);
    }
}
