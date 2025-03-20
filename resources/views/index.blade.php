@extends('layouts.app')

@section('content')

<!-- Hero Section with Video Background -->
<div class="relative bg-black overflow-hidden">
    <!-- Video Background -->
    <video 
        class="absolute inset-0 w-full h-full object-cover opacity-60 z-0" 
        autoplay 
        loop 
        muted 
        playsinline
    >
        <source src="{{ asset('videos/betting-background.mp4') }}" type="video/mp4">
        <!-- Fallback image if video doesn't load -->
        <img src="{{ asset('images/fallback-background.jpg') }}" alt="Background" class="absolute inset-0 w-full h-full object-cover">
    </video>
    
    <!-- Dark overlay with blue accent -->
    <div class="absolute inset-0 bg-gradient-to-br from-blue-900/85 to-black/70 z-0"></div>
    
    <div class="relative z-10 max-w-7xl mx-auto px-4 py-48 sm:py-56 lg:py-64 sm:px-6 lg:px-8 text-center flex flex-col h-full justify-center">
        <h1 class="text-6xl md:text-7xl lg:text-8xl font-extrabold text-white mb-8 animate-fadeIn">
            <span class="block">The Daily Wager</span>
        </h1>
        <p class="mt-6 max-w-lg mx-auto text-xl md:text-2xl text-blue-100 sm:max-w-3xl animate-fadeIn animation-delay-300">
            Insights, analysis, and expert advice on responsible gambling and sports betting
        </p>
        <div class="mt-12 flex justify-center space-x-6 animate-fadeIn animation-delay-500">
            <a href="/blog" class="px-8 py-4 border-2 border-blue-500 text-blue-400 bg-transparent rounded-lg text-lg font-medium hover:bg-blue-600 hover:text-white hover:border-blue-600 transition duration-300">
                Browse Articles
            </a>
            @auth
            <!-- User is logged in -->
            <a href="/user-dashboard" class="px-8 py-4 bg-green-600 text-white rounded-lg text-lg font-medium hover:bg-green-800 transition duration-300 shadow-lg flex items-center">
                Dashboard
            </a>
        @else
            <!-- User is not logged in -->
            <a href="/register" class="px-8 py-4 bg-blue-600 text-white rounded-lg text-lg font-medium hover:bg-blue-700 transition duration-300 shadow-lg">
                Join Us
            </a>
        @endauth
        </div>
    </div>
    
    <!-- Scroll indicator -->
    <div class="absolute bottom-8 left-1/2 transform -translate-x-1/2 z-10 animate-bounce">
        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
        </svg>
    </div>
</div>

<!-- Latest Articles Section -->
<div class="bg-white py-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center">
            <h2 class="text-3xl font-extrabold text-gray-900 sm:text-4xl">
                Latest Articles
            </h2>
            <div class="w-16 h-1 bg-blue-600 mx-auto my-4"></div>
            <p class="max-w-2xl mx-auto text-gray-500 text-xl">
                Stay updated with our most recent insights and analysis
            </p>
        </div>

        <div class="mt-12 grid gap-8 md:grid-cols-2 lg:grid-cols-3">
            @foreach(\App\Models\Post::latest()->take(3)->get() as $post)
                <div class="bg-white rounded-lg overflow-hidden shadow-lg border border-gray-100 hover:shadow-xl transition duration-300">
                    <div class="h-48 overflow-hidden">
                        <img class="w-full h-full object-cover" src="{{ asset('images/' . $post->image_path) }}" alt="{{ $post->title }}">
                    </div>
                    <div class="p-6">
                        <div class="flex items-center">
                            <span class="text-blue-600 text-sm font-medium">{{ date('F j, Y', strtotime($post->created_at)) }}</span>
                        </div>
                        <h3 class="mt-2 text-xl font-bold text-gray-900">
                            {{ $post->title }}
                        </h3>
                        <p class="mt-3 text-gray-500 line-clamp-3">
                            {{ \Str::limit($post->description, 120) }}
                        </p>
                        <div class="mt-6 flex items-center">
                            <div class="ml-auto">
                                <a href="/blog/{{ $post->slug }}" class="text-blue-600 hover:text-blue-800 font-medium flex items-center">
                                    Read More
                                    <svg class="ml-1 w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        
        <div class="mt-12 text-center">
            <a href="/blog" class="inline-flex items-center px-6 py-3 border border-blue-600 text-blue-600 font-medium rounded hover:bg-blue-600 hover:text-white transition duration-300">
                View All Articles
            </a>
        </div>
    </div>
</div>

<!-- Features Section -->
<div class="bg-gray-900 py-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center">
            <h2 class="text-3xl font-extrabold text-white sm:text-4xl">
                Why The Daily Wager?
            </h2>
            <div class="w-16 h-1 bg-blue-500 mx-auto my-4"></div>
        </div>
        
        <div class="mt-12 grid gap-8 md:grid-cols-3">
            <div class="bg-black/50 p-8 rounded-lg">
                <div class="inline-flex items-center justify-center p-3 bg-blue-600 rounded-md shadow-lg">
                    <svg class="h-6 w-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"></path>
                    </svg>
                </div>
                <h3 class="mt-4 text-xl font-medium text-white">Expert Analysis</h3>
                <p class="mt-2 text-gray-400">
                    In-depth reviews and expert opinions from industry professionals with years of experience.
                </p>
            </div>
            
            <div class="bg-black/50 p-8 rounded-lg">
                <div class="inline-flex items-center justify-center p-3 bg-blue-600 rounded-md shadow-lg">
                    <svg class="h-6 w-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                    </svg>
                </div>
                <h3 class="mt-4 text-xl font-medium text-white">Latest Trends</h3>
                <p class="mt-2 text-gray-400">
                    Stay updated with the newest developments and trends in the betting industry.
                </p>
            </div>
            
            <div class="bg-black/50 p-8 rounded-lg">
                <div class="inline-flex items-center justify-center p-3 bg-blue-600 rounded-md shadow-lg">
                    <svg class="h-6 w-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                    </svg>
                </div>
                <h3 class="mt-4 text-xl font-medium text-white">Responsible Gaming</h3>
                <p class="mt-2 text-gray-400">
                    Guidance on responsible betting practices to ensure a safe and enjoyable experience.
                </p>
            </div>
        </div>
    </div>
</div>

<!-- Newsletter Section -->
<div class="bg-white py-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="px-6 py-10 bg-gradient-to-r from-blue-600 to-blue-800 rounded-xl shadow-xl sm:px-12">
            <div class="text-center">
                <h2 class="text-3xl font-extrabold text-white">
                    Get Weekly Betting Insights
                </h2>
                <p class="mt-4 text-lg leading-6 text-blue-100">
                    Join our newsletter and receive expert betting tips, exclusive offers, and industry insights every week.
                </p>
            </div>
            <form class="mt-8 sm:flex justify-center">
                <div class="min-w-0 flex-1">
                    <label for="email" class="sr-only">Email address</label>
                    <input id="email" type="email" placeholder="Enter your email" class="block w-full px-4 py-3 rounded-md border-0 text-base text-gray-900 placeholder-gray-500">
                </div>
                <div class="mt-3 sm:mt-0 sm:ml-3">
                    <button type="submit" class="block w-full px-4 py-3 rounded-md shadow bg-black text-white font-medium hover:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-blue-300">
                        Subscribe
                    </button>
                </div>
            </form>
            <p class="mt-3 text-sm text-blue-100 text-center">
                We respect your privacy. Unsubscribe at any time.
            </p>
        </div>
    </div>
</div>

<!-- Popular Categories Section -->
<div class="bg-gray-100 py-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center">
            <h2 class="text-3xl font-extrabold text-gray-900 sm:text-4xl">
                Popular Categories
            </h2>
            <div class="w-16 h-1 bg-blue-600 mx-auto my-4"></div>
        </div>
        
        <div class="mt-12 grid gap-6 grid-cols-2 md:grid-cols-4">
            <a href="/blog?category=sports-betting" class="group">
                <div class="bg-white p-6 rounded-lg shadow-md hover:shadow-lg transition duration-300 text-center">
                    <div class="text-blue-600 mb-4">
                        <svg class="h-10 w-10 mx-auto" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 8v8m-4-5v5m-4-2v2m-2 4h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                        </svg>
                    </div>
                    <h3 class="text-lg font-medium text-gray-900 group-hover:text-blue-600">
                        Sports Betting
                    </h3>
                </div>
            </a>
            
            <a href="/blog?category=casino-games" class="group">
                <div class="bg-white p-6 rounded-lg shadow-md hover:shadow-lg transition duration-300 text-center">
                    <div class="text-blue-600 mb-4">
                        <svg class="h-10 w-10 mx-auto" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z"></path>
                        </svg>
                    </div>
                    <h3 class="text-lg font-medium text-gray-900 group-hover:text-blue-600">
                        Casino Games
                    </h3>
                </div>
            </a>
            
            <a href="/blog?category=betting-strategies" class="group">
                <div class="bg-white p-6 rounded-lg shadow-md hover:shadow-lg transition duration-300 text-center">
                    <div class="text-blue-600 mb-4">
                        <svg class="h-10 w-10 mx-auto" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"></path>
                        </svg>
                    </div>
                    <h3 class="text-lg font-medium text-gray-900 group-hover:text-blue-600">
                        Betting Strategies
                    </h3>
                </div>
            </a>
            
            <a href="/blog?category=responsible-gambling" class="group">
                <div class="bg-white p-6 rounded-lg shadow-md hover:shadow-lg transition duration-300 text-center">
                    <div class="text-blue-600 mb-4">
                        <svg class="h-10 w-10 mx-auto" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
                        </svg>
                    </div>
                    <h3 class="text-lg font-medium text-gray-900 group-hover:text-blue-600">
                        Responsible Gambling
                    </h3>
                </div>
            </a>
        </div>
    </div>
</div>

<!-- Featured Article Section -->
<div class="bg-black py-16">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="lg:flex lg:items-center lg:space-x-8">
            <div class="lg:w-1/2">
                <span class="text-blue-400 font-semibold">FEATURED ARTICLE</span>
                <h2 class="mt-2 text-3xl font-extrabold text-white">
                    Understanding Odds: A Beginner's Guide to Sports Betting
                </h2>
                <div class="w-16 h-1 bg-blue-500 my-4"></div>
                <p class="mt-4 text-gray-300 text-lg">
                    Navigating the complex world of sports betting starts with understanding how odds work. Our comprehensive guide breaks down different formats, calculations, and what they mean for your potential returns.
                </p>
                <div class="mt-8">
                    <a href="/blog/understanding-odds" class="px-6 py-3 bg-blue-600 text-white rounded-md font-medium hover:bg-blue-700 transition duration-300">
                        Read Full Article
                    </a>
                </div>
            </div>
            <div class="mt-10 lg:mt-0 lg:w-1/2">
                <div class="relative rounded-lg overflow-hidden">
                    <img src="https://images.unsplash.com/photo-1567427017947-545c5f8d16ad?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1350&q=80" alt="Featured Article" class="w-full h-auto">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/70 to-transparent"></div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection