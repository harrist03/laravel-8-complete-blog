<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;

class UserDashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        // Get user posts
        $userId = auth()->id();
        $posts = Post::where('user_id', $userId)->get();
        
        // Get stats
        $totalViews = $posts->sum('views');
        $totalLikes = $posts->sum('likes');
        
        return view('dashboard', [
            'posts' => $posts,
            'totalViews' => $totalViews,
            'totalLikes' => $totalLikes
        ]);
    }
}