@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
    <!-- Page Header -->
    <div class="text-center mb-16">
        <h1 class="text-5xl font-extrabold text-gray-900 mb-4 leading-normal">
            Contact Us
        </h1>
        <p class="text-xl text-gray-600 max-w-3xl mx-auto leading-relaxed">
            Have a question or feedback? We'd love to hear from you. Fill out the form below and we'll get back to you as soon as possible.
        </p>
    </div>

    <!-- Contact Content -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-10 mb-16">
        <!-- Contact Form -->
        <div class="bg-white shadow-lg rounded-lg overflow-hidden">
            <div class="p-8">
                <h2 class="text-2xl font-bold text-gray-900 mb-6 leading-normal">
                    Send Us a Message
                </h2>

                @if(session('success'))
                    <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-6" role="alert">
                        <p>{{ session('success') }}</p>
                    </div>
                @endif

                <form action="{{ route('contact.submit') }}" method="POST">
                    @csrf
                    <div class="mb-6">
                        <label for="name" class="block text-gray-700 font-medium mb-2">Your Name</label>
                        <input type="text" name="name" id="name" class="w-full px-4 py-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" placeholder="John Doe" required value="{{ old('name') }}">
                        @error('name')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-6">
                        <label for="email" class="block text-gray-700 font-medium mb-2">Your Email</label>
                        <input type="email" name="email" id="email" class="w-full px-4 py-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" placeholder="john@example.com" required value="{{ old('email') }}">
                        @error('email')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-6">
                        <label for="subject" class="block text-gray-700 font-medium mb-2">Subject</label>
                        <input type="text" name="subject" id="subject" class="w-full px-4 py-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" placeholder="How can we help you?" required value="{{ old('subject') }}">
                        @error('subject')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-6">
                        <label for="message" class="block text-gray-700 font-medium mb-2">Your Message</label>
                        <textarea name="message" id="message" rows="6" class="w-full px-4 py-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" placeholder="Write your message here..." required>{{ old('message') }}</textarea>
                        @error('message')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <button type="submit" class="w-full bg-blue-600 text-white font-medium py-3 px-4 rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition duration-150 ease-in-out">
                            Send Message
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <!-- Contact Information -->
        <div>
            <div class="bg-white shadow-lg rounded-lg overflow-hidden mb-10">
                <div class="p-8">
                    <h2 class="text-2xl font-bold text-gray-900 mb-6 leading-normal">
                        Contact Information
                    </h2>
                    <div class="space-y-6">
                        <div class="flex items-start">
                            <div class="flex-shrink-0">
                                <svg class="h-6 w-6 text-blue-600 mt-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                </svg>
                            </div>
                            <div class="ml-4">
                                <h3 class="text-lg font-medium text-gray-900 leading-normal">Our Address</h3>
                                <p class="mt-2 text-gray-600 leading-relaxed">
                                    123 Blog Street<br>
                                    Dublin, D01 ABC<br>
                                    Ireland
                                </p>
                            </div>
                        </div>
                        
                        <div class="flex items-start">
                            <div class="flex-shrink-0">
                                <svg class="h-6 w-6 text-blue-600 mt-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                                </svg>
                            </div>
                            <div class="ml-4">
                                <h3 class="text-lg font-medium text-gray-900 leading-normal">Phone Number</h3>
                                <p class="mt-2 text-gray-600 leading-relaxed">
                                    +353 (01) 123 4567
                                </p>
                            </div>
                        </div>
                        
                        <div class="flex items-start">
                            <div class="flex-shrink-0">
                                <svg class="h-6 w-6 text-blue-600 mt-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                </svg>
                            </div>
                            <div class="ml-4">
                                <h3 class="text-lg font-medium text-gray-900 leading-normal">Email Address</h3>
                                <p class="mt-2 text-gray-600 leading-relaxed">
                                    <a href="mailto:info@yourblog.com" class="text-blue-600 hover:underline">info@yourblog.com</a>
                                </p>
                            </div>
                        </div>
                        
                        <div class="flex items-start">
                            <div class="flex-shrink-0">
                                <svg class="h-6 w-6 text-blue-600 mt-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                            </div>
                            <div class="ml-4">
                                <h3 class="text-lg font-medium text-gray-900 leading-normal">Office Hours</h3>
                                <p class="mt-2 text-gray-600 leading-relaxed">
                                    Monday - Friday: 9:00 AM - 5:00 PM<br>
                                    Saturday & Sunday: Closed
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Map -->
            <div class="bg-white shadow-lg rounded-lg overflow-hidden">
                <div class="p-8">
                    <h2 class="text-2xl font-bold text-gray-900 mb-6 leading-normal">
                        Find Us
                    </h2>
                    <div class="aspect-w-16 aspect-h-9 rounded-lg overflow-hidden">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d152515.98633920033!2d-6.385786299650342!3d53.32444313899469!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x48670e80ea27ac2f%3A0xa00c7a9973171a0!2sDublin%2C%20Ireland!5e0!3m2!1sen!2sus!4v1616510306115!5m2!1sen!2sus" 
                            width="100%" height="300" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- FAQ Section -->
    <div class="bg-white shadow-lg rounded-lg overflow-hidden mb-16">
        <div class="p-8">
            <h2 class="text-2xl font-bold text-gray-900 mb-8 leading-normal text-center">
                Frequently Asked Questions
            </h2>
            <div class="space-y-6">
                <div>
                    <h3 class="text-lg font-medium text-gray-900 leading-normal">How quickly will you respond to my message?</h3>
                    <p class="mt-2 text-gray-600 leading-relaxed">
                        We aim to respond to all inquiries within 24-48 business hours. For urgent matters, please call our office directly.
                    </p>
                </div>
                
                <div>
                    <h3 class="text-lg font-medium text-gray-900 leading-normal">I'd like to write for your blog. How can I apply?</h3>
                    <p class="mt-2 text-gray-600 leading-relaxed">
                        We're always looking for talented writers! Please use the contact form and include "Writer Application" in the subject line, along with samples of your work or a link to your portfolio.
                    </p>
                </div>
                
                <div>
                    <h3 class="text-lg font-medium text-gray-900 leading-normal">Do you offer advertising opportunities?</h3>
                    <p class="mt-2 text-gray-600 leading-relaxed">
                        Yes, we offer various advertising and partnership opportunities. Please contact us with details about your company and goals, and our marketing team will get back to you with available options.
                    </p>
                </div>
                
                <div>
                    <h3 class="text-lg font-medium text-gray-900 leading-normal">How can I report a technical issue with the website?</h3>
                    <p class="mt-2 text-gray-600 leading-relaxed">
                        If you encounter any technical problems while using our website, please use the contact form and provide as much detail as possible about the issue, including screenshots if available. Our development team will investigate promptly.
                    </p>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Newsletter Signup -->
<!-- Newsletter Signup -->
<div class="bg-blue-700 rounded-lg shadow-lg overflow-hidden">
    <div class="px-8 py-12 text-center">
        <h2 class="text-3xl font-bold text-white mb-4 leading-normal">
            Stay Connected
        </h2>
        <p class="text-blue-100 text-lg mb-8 max-w-3xl mx-auto leading-relaxed">
            Join our newsletter to receive updates, new article notifications, and exclusive content directly in your inbox.
        </p>
        
        @if(session('newsletter_success'))
            <div class="bg-blue-800 text-blue-100 p-4 rounded-md mb-6 max-w-md mx-auto">
                <p>{{ session('newsletter_success') }}</p>
            </div>
        @endif
        
        <form action="{{ route('newsletter.subscribe') }}" method="POST" class="max-w-md mx-auto flex flex-col sm:flex-row gap-4">
            @csrf
            <input type="email" name="email" placeholder="Your email address" class="px-4 py-3 rounded-md flex-grow focus:outline-none focus:ring-2 focus:ring-blue-500" required>
            <button type="submit" class="bg-white text-blue-700 font-medium px-6 py-3 rounded-md hover:bg-blue-50 focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-blue-700 transition duration-150 ease-in-out">
                Subscribe
            </button>
        </form>
        @error('email')
            <p class="text-red-300 text-sm mt-2 max-w-md mx-auto">{{ $message }}</p>
        @enderror
    </div>
</div>
</div>
@endsection