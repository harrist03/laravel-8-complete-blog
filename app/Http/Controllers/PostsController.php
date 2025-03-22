<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Cviebrock\EloquentSluggable\Services\SlugService;

class PostsController extends Controller
{
 
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $query = Post::with('user'); // Eager load users
        
        // Apply sorting based on request
        switch ($request->sort) {
            case 'oldest':
                $query->oldest('created_at');
                break;
                
            case 'most_viewed':
                $query->orderBy('views', 'desc');
                break;
                
            case 'most_liked':
                $query->orderBy('likes', 'desc');
                break;
                
            case 'latest':
            default:
                $query->latest('created_at');
                break;
        }
        
        $posts = $query->paginate(9); // Show 9 posts per page for a 3x3 grid
        
        return view('blog.index', [
            'posts' => $posts
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('blog.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'image' => 'required|mimes:jpg,png,jpeg|max:5048'
        ]);

        $newImageName = uniqid() . '-' . $request->title . '.' . $request->image->extension();

        $request->image->move(public_path('images'), $newImageName);

        Post::create([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'slug' => SlugService::createSlug(Post::class, 'slug', $request->title),
            'image_path' => $newImageName,
            'user_id' => auth()->user()->id
        ]);

        return redirect('/blog')
            ->with('message', 'Your post has been added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  string  $slug
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $post = Post::where('slug', $slug)
        ->with(['user', 'likes'])
        ->firstOrFail();
        
        $post->increment('views');
        
        return view('blog.show', [
            'post' => $post
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  string  $slug
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        return view('blog.edit')
            ->with('post', Post::where('slug', $slug)->first());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  string  $slug
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request, $slug)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:5048'
        ]);
    
        $post = Post::where('slug', $slug)->first();
        
        // Handle image upload if there's a new image
        if ($request->hasFile('image')) {
            // Delete the old image if it exists
            if ($post->image_path && file_exists(public_path('images/' . $post->image_path))) {
                unlink(public_path('images/' . $post->image_path));
            }
            
            // Generate a unique image name
            $newImageName = uniqid() . '-' . $request->title . '.' . 
                $request->image->extension();
                
            // Save the image
            $request->image->move(public_path('images'), $newImageName);
            
            // Update post with new image path
            $post->image_path = $newImageName;  
        }
        
        // Update other fields
        $post->title = $request->input('title');
        $post->description = $request->input('description');
        
        $post->save();
        
        return redirect('/blog')
            ->with('message', 'Your post has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($slug)
    {
        $post = Post::where('slug', $slug);
        $post->delete();

        return redirect('/user-dashboard')
            ->with('message', 'Your post has been deleted!');
    }

    /**
     * Like the post.
     *
     * @param  string  $slug
     * @return \Illuminate\Http\Response
     */
    public function like($slug)
    {
        $post = Post::where('slug', $slug)->firstOrFail();
        $user = auth()->user();

        // user must be signed in to like a post
        if (!$user) {
            return redirect()->back()->with('error', 'You must be logged in to like posts.');
        }

        // check if user has already liked the post
        if ($post->likedBy($user))
        {
            // unlike the post
            $post->likes()->where('user_id', $user->id)->delete();
            $message = 'Post unliked';
        } else {
            // like the post
            $post->likes()->create([
                'user_id' => $user->id,
            ]);
            $message = 'Post liked!';
        }

        // update post's like count
        $post->likes = $post->likes()->count();
        $post->save();

        return redirect()->back()->with('message', $message);
    }
}

