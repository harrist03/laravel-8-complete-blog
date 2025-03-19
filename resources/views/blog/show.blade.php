@extends('layouts.app')

@section('content')
<div class="w-4/5 m-auto pt-20">
    <span class="text-gray-500">
        By <span class="font-bold italic text-gray-800">{{ $post->user->name }}</span>, Created on {{ date('jS M Y', strtotime($post->updated_at)) }}
    </span>

    <p class="text-xl text-gray-700 pt-8 pb-10 leading-8 font-light">
        {{ $post->description }}
    </p>
    
    @auth
    <form action="{{ route('blog.like', $post->slug) }}" method="POST">
        @csrf
        <button type="submit" class="flex items-center {{ $post->likedBy(Auth::user()) ? 'text-red-600' : 'text-gray-500' }} hover:text-red-700">
            <svg class="h-5 w-5 mr-1" fill="{{ $post->likedBy(Auth::user()) ? 'currentColor' : 'none' }}" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
            </svg>
            {{ $post->likedBy(Auth::user()) ? 'Unlike' : 'Like' }} ({{ $post->likes()->count() }})
        </button>
    </form>
@else
    <div class="flex items-center text-gray-500">
        <svg class="h-5 w-5 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
        </svg>
        {{ $post->likes()->count() }} likes
    </div>
@endauth
</div>

@endsection 