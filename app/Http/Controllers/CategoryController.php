<?php

namespace App\Http\Controllers;

use App\Models\Category;
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
}
