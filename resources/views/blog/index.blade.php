@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
    <!-- Header Section -->
    <div class="text-center mb-10">
        <h1 class="text-5xl font-extrabold text-gray-900 mb-4">
            Blog Posts
        </h1>
        <p class="text-lg text-gray-600 max-w-3xl mx-auto">
            Explore our collection of thoughtfully written articles on various topics
        </p>
    </div>

    <!-- Notification Message -->
    @if (session()->has('message'))
        <div class="mb-8 flex justify-center">
            <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 rounded shadow-md max-w-lg" role="alert">
                <div class="flex">
                    <div class="flex-shrink-0">
                        <svg class="h-5 w-5 text-green-500" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                        </svg>
                    </div>
                    <div class="ml-3">
                        <p class="text-sm">{{ session()->get('message') }}</p>
                    </div>
                </div>
            </div>
        </div>
    @endif

    <!-- Filtering Options -->
    <!-- Simplified Filtering Options -->
<div class="bg-white shadow rounded-lg p-4 mb-8">
    <div class="flex justify-left items-center flex-wrap gap-2">
        <a href="{{ (request('sort') == 'latest') ? request()->url() : request()->url() . '?sort=latest' }}" 
           class="inline-flex items-center px-3 py-2 border shadow-sm text-sm leading-4 font-medium rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-colors duration-200
                  {{ request('sort') == 'latest' ? 'bg-blue-50 text-blue-700 border-blue-300' : 'border-gray-300 text-gray-700 bg-white hover:bg-gray-50' }}">
            <svg class="mr-2 h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
            Latest
        </a>
        <a href="{{ (request('sort') == 'oldest') ? request()->url() : request()->url() . '?sort=oldest' }}" 
           class="inline-flex items-center px-3 py-2 border shadow-sm text-sm leading-4 font-medium rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-colors duration-200
                  {{ request('sort') == 'oldest' ? 'bg-blue-50 text-blue-700 border-blue-300' : 'border-gray-300 text-gray-700 bg-white hover:bg-gray-50' }}">
            <svg class="mr-2 h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
            </svg>
            Oldest
        </a>
        <a href="{{ (request('sort') == 'most_viewed') ? request()->url() : request()->url() . '?sort=most_viewed' }}" 
           class="inline-flex items-center px-3 py-2 border shadow-sm text-sm leading-4 font-medium rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-colors duration-200
                  {{ request('sort') == 'most_viewed' ? 'bg-blue-50 text-blue-700 border-blue-300' : 'border-gray-300 text-gray-700 bg-white hover:bg-gray-50' }}">
            <svg class="mr-2 h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
            </svg>
            Most Viewed
        </a>
        <a href="{{ (request('sort') == 'most_liked') ? request()->url() : request()->url() . '?sort=most_liked' }}" 
           class="inline-flex items-center px-3 py-2 border shadow-sm text-sm leading-4 font-medium rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-colors duration-200
                  {{ request('sort') == 'most_liked' ? 'bg-blue-50 text-blue-700 border-blue-300' : 'border-gray-300 text-gray-700 bg-white hover:bg-gray-50' }}">
            <svg class="mr-2 h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
            </svg>
            Most Liked
        </a>
    </div>
</div>

    <!-- Blog Posts Grid -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
        @forelse ($posts as $post)
            <div class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-xl transition-shadow duration-300">
                <div class="post-image-container relative h-48 overflow-hidden">
                    <img src="{{ asset('images/' . $post->image_path) }}" alt="{{ $post->title }}" class="w-full h-full object-cover transition-transform duration-500 hover:scale-110">
                    <div class="absolute top-0 right-0 mt-2 mr-2 bg-black bg-opacity-70 text-white text-xs px-2 py-1 rounded-md flex items-center">
                        <svg class="h-3 w-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                        </svg>
                        {{ $post->views }}
                    </div>
                </div>
                <div class="p-6">
                    <h2 class="text-2xl font-bold text-gray-900 mb-2 hover:text-blue-600 transition-colors duration-200">
                        <a href="/blog/{{ $post->slug }}">{{ $post->title }}</a>
                    </h2>
                    <div class="flex items-center text-sm text-gray-500 mb-4">
                        <span>{{ date('M d, Y', strtotime($post->created_at)) }}</span>
                        <span class="mx-2"></span>
                        <div class="flex items-center">
                            <svg class="h-4 w-4 text-red-500 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z" clip-rule="evenodd" />
                            </svg>
                            {{ $post->likes }}
                        </div>
                    </div>
                    <p class="text-gray-600 mb-4 line-clamp-3">
                        {{ \Str::limit($post->description, 150, '...') }}
                    </p>
                    <a href="/blog/{{ $post->slug }}" class="inline-flex items-center text-blue-600 hover:text-blue-800 font-medium">
                        Read more
                        <svg class="ml-1 w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                        </svg>
                    </a>
                </div>
            </div>
        @empty
            <div class="col-span-full">
                <div class="bg-white rounded-lg shadow-md p-8 text-center">
                    <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z" />
                    </svg>
                    <h3 class="mt-2 text-lg font-medium text-gray-900">No posts found</h3>
                    <p class="mt-1 text-gray-500">Check back later for new content or try a different filter.</p>
                </div>
            </div>
        @endforelse
    </div>

    <!-- Pagination Links -->
    <div class="mt-8">
        {{ $posts->appends(request()->query())->links() }}
    </div>
</div>
@endsection