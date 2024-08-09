<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\News;
use App\Models\User;
use Illuminate\View\View;
use Illuminate\Http\Request;

class PageController extends Controller
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


    public function news()
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


    public function category(Category $categories)
    {
        $data = [
            'title' => 'Category Portal MI',
            'category' => $categories,
            'news' => News::latest()->with('author', 'category')->where('category_id', $categories->id)->paginate(10),
        ];
        return view('pages/category/index', $data);
    }


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
