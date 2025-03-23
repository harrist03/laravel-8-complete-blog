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
<div class="bg-white shadow rounded-lg p-4 mb-8">
    <form action="{{ route('blog.index') }}" method="GET" class="flex flex-wrap gap-4">
        <div class="flex flex-wrap items-center gap-4">
            <div>
                <label for="sort" class="sr-only">Sort by</label>
                <select name="sort" id="sort" onchange="this.form.submit()" class="bg-white border border-gray-300 rounded-md px-4 py-2">
                    <option value="latest" {{ request('sort') == 'latest' ? 'selected' : '' }}>Latest</option>
                    <option value="oldest" {{ request('sort') == 'oldest' ? 'selected' : '' }}>Oldest</option>
                    <option value="most_viewed" {{ request('sort') == 'most_viewed' ? 'selected' : '' }}>Most Viewed</option>
                    <option value="most_liked" {{ request('sort') == 'most_liked' ? 'selected' : '' }}>Most Liked</option>
                </select>
            </div>
            
            <div>
                <label for="category" class="sr-only">Filter by category</label>
                <select name="category" id="category" onchange="this.form.submit()" class="bg-white border border-gray-300 rounded-md px-4 py-2">
                    <option value="">All Categories</option>
                    <option value="betting-strategies" {{ request('category') == 'betting-strategies' ? 'selected' : '' }}>Betting Strategies</option>
                    <option value="responsible-gambling" {{ request('category') == 'responsible-gambling' ? 'selected' : '' }}>Responsible Gambling</option>
                    <option value="sports-analysis" {{ request('category') == 'sports-analysis' ? 'selected' : '' }}>Sports Analysis</option>
                    <option value="casino-games" {{ request('category') == 'casino-games' ? 'selected' : '' }}>Casino Games</option>
                </select>
            </div>
            
            @if(request('category') || request('sort') != 'latest')
            <a href="{{ route('blog.index') }}" class="inline-flex items-center px-4 py-2 border border-gray-300 rounded-md text-blue-600 bg-white hover:bg-blue-50 transition-colors">
                <svg class="h-4 w-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                </svg>
                Clear filters
            </a>
            @endif
        </div>
    </form>
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