<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\User;
use Illuminate\Http\Request;

class SearchController extends Controller
{
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


    public function adminSearch(Request $request)
    {
        $request->validate([
            'search' => 'required|string|min:1'
        ]);


        $search = $request->input('search');
        $results = News::latest()
            ->where('title', 'like', "%{$search}%")
            ->with('author', 'category')
            ->paginate(10);

        $data = [
            'title' => 'News Resource | Admin Portal MI',
            'news' => $results,
            'field' => ['No.', 'Title', 'Author', 'Category', 'Created At'],
        ];
        return view('pages/admin/news/index', $data);
    }


    public function adminUsersSearch(Request $request)
    {
        $request->validate([
            'search' => 'required|string|min:1'
        ]);

        $search = $request->input('search');
        $results = User::latest()
            ->where('name', 'like', "%{$search}%")
            ->paginate(10);

        $data = [
            'title' => 'Users Resource | Admin Portal MI',
            'users' => $results,
            'field' => ['No.', 'Name', 'Email', 'Class', 'Year', 'Role'],
        ];
        return view('pages/admin/users/index', $data);
    }
}
