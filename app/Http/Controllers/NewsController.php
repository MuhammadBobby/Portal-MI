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
        return view('pages/news/index', $data);
    }

    public function detail(News $news)
    {
        $data = [
            'title' => $news->title,
            'news' => $news,
        ];
        return view('pages/news/detail', $data);
    }

    public function search(Request $request)
    {
        // Validasi input pencarian
        $request->validate([
            'search' => 'required|string|min:1'
        ]);

        // Ambil input pencarian
        $search = $request->input('search');

        // Lakukan pencarian di database
        $results = News::latest()
            ->where('title', 'like', "%{$search}%")
            ->with('author', 'category')
            ->paginate(10);

        $data = [
            'title' => 'Search Results',
            'mini_title' =>  $search,
            'news' => $results,
            'categories' => [],
        ];

        // Kembalikan hasil pencarian ke view
        return view('pages/news/index', $data);
    }
}
