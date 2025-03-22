<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    
    <!-- Styles -->
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
    <!-- Add Font Awesome if you need icons (recommended) -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
</head>
<body class="bg-gray-100 min-h-screen antialiased leading-none font-sans">
    <div id="app">
        <header class="bg-black shadow-md sticky top-0 z-50">
            <div class="container mx-auto">
                <div class="flex justify-between items-center py-4 px-6 lg:px-8">
                    <!-- Logo Area -->
                    <div class="flex-shrink-0 flex items-center">
                        <a href="{{ url('/') }}" class="flex items-center">
                            <!-- Optional Logo Image -->
                            <!-- <img class="h-8 w-auto mr-2" src="{{ asset('images/logo.png') }}" alt="Logo"> -->
                            <span class="text-xl font-bold text-white">The <span class="text-blue-500">Daily</span> Wager</span>
                        </a>
                    </div>

                    <!-- Mobile Menu Button -->
                    <div class="flex md:hidden">
                        <button type="button" class="text-gray-300 hover:text-white focus:outline-none" id="mobile-menu-button">
                            <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"></path>
                            </svg>
                        </button>
                    </div>

                    <!-- Desktop Navigation -->
                    <nav class="sticky top-0 z-50 hidden md:flex items-center space-x-8 text-gray-300 h-8">
                        <a href="/" class="text-gray-300 hover:text-blue-400 hover:underline ">Home</a>
                        <a href="/blog" class="text-gray-300 hover:text-blue-400 hover:underline ">Articles</a>
                        <a href="/about" class="text-gray-300 hover:text-blue-400 hover:underline ">About</a>
                        <a href="/contact" class="text-gray-300 hover:text-blue-400 hover:underline ">Contact</a>
                        
                        @guest
                            <a href="{{ route('login') }}" class="text-gray-300 hover:text-blue-400 hover:underline">
                                {{ __('Login') }}
                            </a>
                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="text-gray-300 hover:text-blue-400 hover:underline">
                                    {{ __('Register') }}
                                </a>
                            @endif
                        @else
                            <div class="relative" x-data="{ open: false }" @click.away="open = false">
                                <button @click="open = !open" class="flex items-center text-sm font-medium text-white hover:text-blue-300 focus:outline-none transition duration-150 ease-in-out">
                                    <span>{{ Auth::user()->name }}</span>
                                    <svg class="ml-1 h-5 w-5" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                                    </svg>
                                </button>

                                <div x-show="open" class="absolute right-0 mt-2 w-48 bg-white py-2 rounded-md shadow-lg z-50" x-transition:enter="transition ease-out duration-100" x-transition:enter-start="transform opacity-0 scale-95" x-transition:enter-end="transform opacity-100 scale-100">
                                    <a href="/user-dashboard" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Dashboard</a>
                                    <a href="/profile" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Profile</a>
                                    <a href="{{ route('logout') }}"
                                       onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                                       class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                        {{ __('Logout') }}
                                    </a>
                                </div>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                                    {{ csrf_field() }}
                                </form>
                            </div>
                        @endguest
                    </nav>
                </div>

                <!-- Mobile Navigation -->
                <div class="hidden md:hidden" id="mobile-menu">
                    <div class="px-2 pt-2 pb-4 space-y-1">
                        <a href="/" class="block px-3 py-2 text-white font-medium hover:bg-gray-700 rounded-md">Home</a>
                        <a href="/blog" class="block px-3 py-2 text-white font-medium hover:bg-gray-700 rounded-md">Articles</a>
                        <a href="/about" class="block px-3 py-2 text-white font-medium hover:bg-gray-700 rounded-md">About</a>
                        <a href="/contact" class="block px-3 py-2 text-white font-medium hover:bg-gray-700 rounded-md">Contact</a>
                        
                        @guest
                            <a href="{{ route('login') }}" class="block px-3 py-2 text-white font-medium hover:bg-gray-700 rounded-md">{{ __('Login') }}</a>
                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="block px-3 py-2 text-white font-medium hover:bg-gray-700 rounded-md">{{ __('Register') }}</a>
                            @endif
                        @else
                            <span class="block px-3 py-2 text-white font-medium">{{ Auth::user()->name }}</span>
                            <a href="/blog" class="block px-3 py-2 text-white font-medium hover:bg-gray-700 rounded-md">Dashboard</a>
                            <a href="/profile" class="block px-3 py-2 text-white font-medium hover:bg-gray-700 rounded-md">Profile</a>
                            <a href="{{ route('logout') }}" 
                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                                class="block px-3 py-2 text-white font-medium hover:bg-gray-700 rounded-md">
                                {{ __('Logout') }}
                            </a>
                        @endguest
                    </div>
                </div>
            </div>
        </header>

        <main>
            @yield('content')
        </main>

        <div>
            @include('layouts.footer')
        </div>
    </div>

    <script>
        // Mobile menu toggle
        document.getElementById('mobile-menu-button').addEventListener('click', function() {
            const menu = document.getElementById('mobile-menu');
            menu.classList.toggle('hidden');
        });
    </script>

    <!-- Add Alpine.js for dropdown functionality -->
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.8.2/dist/alpine.min.js" defer></script>
</body>
</html>