<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Categories Resource | Admin Portal MI',
            'categories' => Category::all(),
            'field' => ['No.', 'Name', 'Description'],
        ];
        return view('pages/admin/categories/index', $data);
    }


    public function create()
    {
        $data = [
            'title' => 'Create Categiry | Admin Portal MI',
        ];
        return view('pages/admin/categories/create', $data);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|unique:category,name|min:1',
            'image' => 'image|mimes:jpeg,png,jpg,svg,webp|max:2048',
            'color' => 'required|string',
            'description' => 'required|string|min:3'
        ]);

        // Membuat slug dari name
        $slug = Str::slug($request->name, '-');

        // Memproses gambar jika ada
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = $slug . '-' . time() . '.' . $request->image->extension();
            $image->move(public_path('assets/category'), $imageName);
        } else {
            $imageName = null;
        }


        Category::insert([
            'name' => $request->name,
            'slug' => $slug,
            'image' => $imageName,
            'color' => $request->color,
            'description' => $request->description,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);

        return redirect()->route('category.index')->with('success', 'Category created successfully.');
    }

    public function edit(Category $category)
    {
        $data = [
            'title' => 'Edit Category | Admin Portal MI',
            'categories' => $category,

        ];
        return view('pages/admin/categories/edit', $data);
    }
}
