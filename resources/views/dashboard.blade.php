<!-- filepath: c:\Users\Harris\Documents\Studies\YEAR2 SEM2\Server side Development\CA2\laravel-8-complete-blog\resources\views\dashboard.blade.php -->
@extends('layouts.app')

@section('content')
@php
    // Fallback variables if not provided by controller
    $posts = isset($posts) ? $posts : collect();
    $totalViews = isset($totalViews) ? $totalViews : 0;
    $totalLikes = isset($totalLikes) ? $totalLikes : 0;
@endphp

<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
    <!-- Dashboard Header -->
    <div class="pb-8">
        <h1 class="text-3xl font-bold text-gray-900">Welcome, {{ Auth::user()->name }}</h1>
        <p class="mt-2 text-gray-600">Manage your blog posts and view analytics</p>
    </div>
    
    <!-- Stats Overview Cards -->
    <div class="grid grid-cols-1 gap-5 sm:grid-cols-2 lg:grid-cols-4 mb-8">
        <!-- Total Posts -->
        <div class="bg-white overflow-hidden shadow rounded-lg">
            <div class="p-5">
                <div class="flex items-center">
                    <div class="flex-shrink-0 bg-blue-500 rounded-md p-3">
                        <svg class="h-6 w-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z" />
                        </svg>
                    </div>
                    <div class="ml-5 w-0 flex-1">
                        <dl>
                            <dt class="text-sm font-medium text-gray-500 truncate">
                                Total Posts
                            </dt>
                            <dd>
                                <div class="text-lg font-medium text-gray-900">
                                    {{ $posts->count() }}
                                </div>
                            </dd>
                        </dl>
                    </div>
                </div>
            </div>
        </div>

        <!-- Total Views -->
        <div class="bg-white overflow-hidden shadow rounded-lg">
            <div class="p-5">
                <div class="flex items-center">
                    <div class="flex-shrink-0 bg-green-500 rounded-md p-3">
                        <svg class="h-6 w-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                        </svg>
                    </div>
                    <div class="ml-5 w-0 flex-1">
                        <dl>
                            <dt class="text-sm font-medium text-gray-500 truncate">
                                Total Views
                            </dt>
                            <dd>
                                <div class="text-lg font-medium text-gray-900">
                                    {{ $totalViews }}
                                </div>
                            </dd>
                        </dl>
                    </div>
                </div>
            </div>
        </div>

        <!-- Total Likes -->
        <div class="bg-white overflow-hidden shadow rounded-lg">
            <div class="p-5">
                <div class="flex items-center">
                    <div class="flex-shrink-0 bg-red-500 rounded-md p-3">
                        <svg class="h-6 w-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                        </svg>
                    </div>
                    <div class="ml-5 w-0 flex-1">
                        <dl>
                            <dt class="text-sm font-medium text-gray-500 truncate">
                                Total Likes
                            </dt>
                            <dd>
                                <div class="text-lg font-medium text-gray-900">
                                    {{ $totalLikes }}
                                </div>
                            </dd>
                        </dl>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="flex justify-left items-center">
        <a href="/blog/create"
            class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
            </svg>
            Create New Post
        </a>
    </div>

    <!-- Top Performing Posts -->
<div class="bg-white shadow overflow-hidden sm:rounded-md mt-8">
    <div class="px-4 py-5 border-b border-gray-200 sm:px-6">
        <h3 class="text-xl font-medium text-gray-900">Top Performing Posts</h3>
    </div>
    <div class="px-4 py-3">
        <ul class="divide-y divide-gray-200">
            @forelse($posts->sortByDesc('views')->take(3) as $post)
                <li class="py-3">
                    <div class="flex items-center space-x-4">
                        <div class="flex-shrink-0">
                            @if ($loop->iteration == 1)
                                <span class="inline-flex items-center justify-center h-8 w-8 rounded-full bg-yellow-300">
                                    <span class="text-xs font-medium text-white">{{ $loop->iteration }}</span>
                                </span>
                            @elseif($loop->iteration == 2)
                                <span class="inline-flex items-center justify-center h-8 w-8 rounded-full bg-gray-400">
                                    <span class="text-xs font-medium text-white">{{ $loop->iteration }}</span>
                                </span>
                            @else
                                <span class="inline-flex items-center justify-center h-8 w-8 rounded-full bg-yellow-700">
                                    <span class="text-xs font-medium text-white">{{ $loop->iteration }}</span>
                                </span>
                            @endif
                        </div>
                        <div class="min-w-0 flex-1">
                            <p class="text-sm font-medium text-gray-900 truncate">
                                {{ $post->title }}
                            </p>
                            <p class="text-sm text-gray-500">
                                {{ $post->views }} views • {{ $post->likes }} likes
                            </p>
                        </div>
                        <div>
                            <a href="/blog/{{ $post->slug }}" class="inline-flex items-center shadow-sm px-2.5 py-0.5 border border-gray-300 text-sm leading-5 font-medium rounded-full text-gray-700 bg-white hover:bg-gray-50">
                                View
                            </a>
                        </div>
                    </div>
                </li>
            @empty
                <li class="py-4 text-center">
                    <p class="text-sm text-gray-500">No posts available</p>
                </li>
            @endforelse
        </ul>
    </div>
</div>
    
    <!-- Posts List -->
    <div class="bg-white shadow overflow-hidden sm:rounded-md mt-8">
        <div class="px-4 py-5 border-b border-gray-200 sm:px-6">
            <h3 class="text-xl leading-6 font-medium text-gray-900">
                Your Posts
            </h3>
        </div>
        <ul class="divide-y divide-gray-200">
            @forelse ($posts as $post)
                <li>
                    <a href="/blog/{{ $post->slug }}" class="block hover:bg-gray-50">
                        <div class="px-4 py-4 sm:px-6">
                            <div class="flex items-center justify-between">
                                <p class="text-sm font-medium text-blue-600 truncate">
                                    {{ $post->title }}
                                </p>
                                <div class="ml-2 flex-shrink-0 flex">
                                    <p class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                        {{ $post->views }} views
                                    </p>
                                    <p class="ml-2 px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">
                                        {{ $post->likes }} likes
                                    </p>
                                </div>
                            </div>
                            <div class="mt-2 sm:flex sm:justify-between">
                                <div class="sm:flex">
                                    <p class="flex items-center text-sm text-gray-500">
                                        <svg class="flex-shrink-0 mr-1.5 h-5 w-5 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"/>
                                        </svg>
                                        Created on {{ date('jS M Y', strtotime($post->created_at)) }}
                                    </p>
                                </div>
                                <div class="mt-2 flex items-center text-sm text-gray-500 sm:mt-0">
                                    <a href="/blog/{{ $post->slug }}/edit" class="text-blue-600 hover:text-blue-900 mr-4">Edit</a>
                                    
                                    <form action="/blog/{{ $post->slug }}" method="POST" class="inline-block">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="text-red-600 hover:text-red-900">Delete</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </a>
                </li>
            @empty
                <li class="px-4 py-6 sm:px-6">
                    <p class="text-center text-gray-500">
                        You haven't created any posts yet.
                        <a href="/blog/create" class="text-blue-600 hover:text-blue-900">Create your first post</a>
                    </p>
                </li>
            @endforelse
        </ul>
    </div>
</div>
@endsection