<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\News;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(Category $categories)
    {
        $data = [
            'title' => 'Category Portal MI',
            'category' => $categories,
            'news' => News::latest()->with('author', 'category')->where('category_id', $categories->id)->paginate(10),
        ];
        return view('pages/category/index', $data);
    }
}
