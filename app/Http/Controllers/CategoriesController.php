<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class CategoriesController extends Controller
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
            'title' => 'Create Category | Admin Portal MI',
        ];
        return view('pages/admin/categories/create', $data);
    }



    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|unique:categories,name|min:2',
            'image' => 'required|image|mimes:jpeg,png,jpg,svg,webp|max:2048',
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

        Category::create([
            'name' => $request->name,
            'slug' => $slug,
            'logo' => $imageName,
            'color' => $request->color,
            'description' => $request->description,
        ]);

        return redirect('/admin/categories')->with('success', 'Category created successfully.');
    }

    public function edit(Category $category)
    {
        $data = [
            'title' => 'Edit Category | Admin Portal MI',
            'category' => $category,

        ];
        return view('pages/admin/categories/edit', $data);
    }

    public function update(Request $request, Category $category)
    {
        $request->validate([
            'name' => 'required|string|unique:categories,name,' . $category->slug . ',slug|min:2',
            'image' => 'image|mimes:jpeg,png,jpg,svg,webp|max:2048',
            'color' => 'required|string',
            'description' => 'required|string|min:3'
        ]);

        // Membuat slug dari title
        $slug = Str::slug($request->name, '-');
        $imageName = '';
        // Periksa apakah ada file image yang baru di-upload
        if ($request->hasFile('image')) {
            // Generate nama unik untuk file baru
            $newImageName = $category->slug . '-' . time() . '.' . $request->image->extension();

            // Hapus image lama jika ada
            if ($category->logo && file_exists(public_path('assets/category/' . $category->logo))) {
                unlink(public_path('assets/category/' . $category->logo));
            }

            // Upload image baru
            $request->image->move(public_path('assets/category'), $newImageName);
            // Update nama image di database
            $imageName = $newImageName;
        } else {
            $imageName = $category->logo;
        }


        Category::where('slug', $category->slug)->update([
            'name' => $request->name,
            'slug' => $slug,
            'logo' => $imageName,
            'color' => $request->color,
            'description' => $request->description,
        ]);

        return redirect()->route('categories.index')->with('success', 'category updated successfully.');
    }

    public function destroy(Category $category)
    {
        // Hapus image lama jika ada
        $image = public_path('assets/category/' . $category->logo);
        if ($category->logo !== 'helloTech.webp') {
            if (file_exists($image)) {
                unlink($image);
            }
        }

        Category::destroy($category->id);
        return redirect()->route('categories.index')->with('success', 'Category deleted successfully.');
    }
}
