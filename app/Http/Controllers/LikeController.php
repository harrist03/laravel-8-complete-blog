<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class LikeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function like($slug)
    {
        $post = Post::where('slug', $slug)->first();
        $post->increment('likes');
        
        return redirect()->back()->with('message', 'Post liked!');
    }
}