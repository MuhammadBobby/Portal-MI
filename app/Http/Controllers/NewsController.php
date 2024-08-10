<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\News;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

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


    public function show(News $news)
    {
        $data = [
            'title' => $news->title,
            'news' => $news,
        ];
        return view('pages/news/detail', $data);
    }



    public function create()
    {
        $data = [
            'title' => 'Create News | Admin Portal MI',
            'categories' => Category::all(),
            'authors' => User::all(),
        ];
        return view('pages/admin/news/create', $data);
    }


    public function store(Request $request)
    {
        // Membuat slug dari title
        $slug = Str::slug($request->title, '-');

        // Memproses gambar jika ada
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = $slug . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploads/news'), $imageName);
        } else {
            $imageName = null;
        }


        News::insert([
            'title' => $request->title,
            'slug' => $slug,
            'image' => $imageName,
            'location' => $request->location,
            'category_id' => $request->category_id ?? '1',
            'author_id' => $request->author_id ?? '1',
            'top' => $request->top ?? 'no',
            'content' => $request->content,
            'content_2' => $request->content_2,
            'content_3' => $request->content_3,
            'content_4' => $request->content_4 ?? null,
            'content_5' => $request->content_5 ?? null,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);

        return redirect()->route('news.index')->with('success', 'News created successfully.');
    }
}
