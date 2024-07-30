<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\View\View;

class LandingPageController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Welcome to the Portal MI',
        ];
        return view('home', $data);
    }
}
