<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index()
    {
        // Get the most liked post
        $featuredPost = \App\Models\Post::withCount('likes')
        ->orderBy('likes_count', 'desc')
        ->first();

        return view('index', compact('featuredPost'));
    }

    public function about()
    {
        return view('about');
    }

    public function contact()
    {
        return view('contact');
    }
}
