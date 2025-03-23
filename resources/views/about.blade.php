@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12 leading-relaxed">
    <!-- Page Header -->
    <div class="text-center mb-16">
        <h1 class="text-5xl font-extrabold text-gray-900 mb-4 leading-normal">
            About Our Blog
        </h1>
    </div>

    <!-- Our Story Section -->
    <div class="overflow-hidden mb-16">
        <div class="md:flex">
            <div class="p-4">
                <div class="uppercase tracking-wide text-sm text-blue-600 font-semibold">Our Story</div>
                <h2 class="mt-1 text-4xl font-bold text-gray-900 leading-normal">
                    How It All Began
                </h2>
                <p class="mt-4 text-gray-700">
                    Founded in 2023, our blog emerged from a simple observation: there was a gap in accessible, well-written content that bridged technical knowledge with practical application. What started as a personal project quickly evolved into a platform where experts and enthusiasts alike could share insights and learn from each other.
                </p>
                <p class="mt-4 text-gray-700">
                    Today, we pride ourselves on delivering content that is thoroughly researched, clearly presented, and immediately applicable to our readers' lives and work. Our commitment to quality over quantity has helped us build a loyal community of readers who trust our platform for reliable information.
                </p>
            </div>
        </div>
    </div>

    <!-- Our Mission and Values -->
    <div class="grid md:grid-cols-2 gap-8 mb-16">
        <div class="bg-white shadow-lg rounded-lg overflow-hidden">
            <div class="p-8">
                <div class="uppercase tracking-wide text-sm text-blue-600 font-semibold">Our Mission</div>
                <h2 class="mt-1 text-2xl font-bold text-gray-900 leading-normal">
                    Why We Do What We Do
                </h2>
                <p class="mt-4 text-gray-700 leading-relaxed">
                    Our mission is to democratize knowledge by creating a platform where ideas can be shared freely, discussions can flourish, and everyone has the opportunity to both teach and learn. We believe that accessible, high-quality content can transform lives, spark innovation, and foster understanding across diverse backgrounds and perspectives.
                </p>
                <div class="mt-6">
                    <div class="flex items-center mb-3">
                        <svg class="h-5 w-5 text-green-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                        </svg>
                        <p class="text-gray-700 leading-relaxed">Provide reliable, fact-checked information</p>
                    </div>
                    <div class="flex items-center mb-3">
                        <svg class="h-5 w-5 text-green-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                        </svg>
                        <p class="text-gray-700 leading-relaxed">Make complex topics accessible to everyone</p>
                    </div>
                    <div class="flex items-center">
                        <svg class="h-5 w-5 text-green-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                        </svg>
                        <p class="text-gray-700 leading-relaxed">Build a supportive community of knowledge-seekers</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="bg-white shadow-lg rounded-lg overflow-hidden">
            <div class="p-8">
                <div class="uppercase tracking-wide text-sm text-blue-600 font-semibold">Our Values</div>
                <h2 class="mt-1 text-2xl font-bold text-gray-900">
                    Principles That Guide Us
                </h2>
                <p class="mt-4 text-gray-700 leading-relaxed">
                    At the core of our work are a set of fundamental values that guide every article we publish, every community interaction we facilitate, and every decision we make about our platform's future.
                </p>
                <div class="mt-6 space-y-6">
                    <div>
                        <h3 class="text-lg font-medium text-gray-900 leading-normal">Accuracy & Integrity</h3>
                        <p class="mt-2 text-gray-700 leading-relaxed">We're committed to thorough research and fact-checking, ensuring our content is trustworthy and accurate.</p>
                    </div>
                    <div>
                        <h3 class="text-lg font-medium text-gray-900 leading-normal">Inclusivity & Respect</h3>
                        <p class="mt-2 text-gray-700 leading-relaxed">We welcome diverse voices and perspectives, creating content that's accessible and relevant to readers from all backgrounds.</p>
                    </div>
                    <div>
                        <h3 class="text-lg font-medium text-gray-900 leading-normal">Continuous Learning</h3>
                        <p class="mt-2 text-gray-700 leading-relaxed">We believe in constantly improving, staying curious, and embracing new ideas and feedback.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Join Us CTA -->
    <div class="bg-blue-700 rounded-lg shadow-lg overflow-hidden">
        <div class="px-8 py-12 text-center">
            <h2 class="text-3xl font-bold text-white mb-4">
                Join Our Community
            </h2>
            <p class="text-blue-100 text-lg mb-8 max-w-3xl mx-auto">
                Whether you're here to learn, share your expertise, or simply explore new ideas, we welcome you to our growing community of curious minds.
            </p>
            <div class="flex flex-wrap justify-center gap-4">
                @guest
                    <a href="/register" class="inline-flex items-center px-6 py-3 border border-transparent text-base font-medium rounded-md text-blue-700 bg-white hover:bg-blue-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-white">
                        Create an Account
                    </a>
                @endguest
                <a href="/blog" class="inline-flex items-center px-6 py-3 border border-white text-base font-medium rounded-md text-white hover:bg-blue-800 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-white">
                    Explore Articles
                </a>
            </div>
        </div>
    </div>
</div>
@endsection