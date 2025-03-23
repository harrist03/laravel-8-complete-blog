@extends('layouts.app')

@section('content')
<div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
    <div class="mb-10">
        <h1 class="text-4xl font-bold text-gray-900 tracking-tight sm:text-5xl">
            Create New Article
        </h1>
        <p class="mt-3 text-lg text-gray-500">
            Share your insights and expertise with our community of readers.
        </p>
    </div>

    @if ($errors->any())
        <div class="mb-8 bg-red-50 border-l-4 border-red-500 p-4 rounded-md">
            <div class="flex items-center mb-2">
                <svg class="h-5 w-5 text-red-500 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                </svg>
                <span class="text-red-700 font-medium">Please correct the following errors:</span>
            </div>
            <ul class="list-disc pl-5 text-sm text-red-700">
                @foreach ($errors->all() as $error)
                    <li class="mt-1">{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="bg-white shadow-lg rounded-lg overflow-hidden">
        <div class="p-6 sm:p-8">
            <form 
                action="/blog"
                method="POST"
                enctype="multipart/form-data"
                class="space-y-8">
                @csrf

                <!-- Title Input -->
                <div>
                    <label for="title" class="block text-sm font-medium text-gray-700 mb-1">Article Title</label>
                    <input 
                        type="text"
                        name="title"
                        id="title"
                        placeholder="Enter a compelling title..."
                        value="{{ old('title') }}"
                        class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-lg py-3 px-4">
                    <p class="mt-1 text-sm text-gray-500">Make it clear and engaging to attract readers.</p>
                </div>

                <div>
                    <label for="category_id" class="block text-sm font-medium text-gray-700 mb-1">Category</label>
                    <select 
                        name="category_id" 
                        id="category_id" 
                        class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500 sm:text-lg py-3 px-4">
                        <option value="">Select a category</option>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                    <p class="mt-1 text-sm text-gray-500">Categorizing your article helps readers find relevant content.</p>
                </div>

                <!-- Image Upload -->
                <div>
                    <label for="image" class="block text-sm font-medium text-gray-700 mb-1">Featured Image</label>
                    <div class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-md">
                        <div class="space-y-1 text-center">
                            <svg class="mx-auto h-12 w-12 text-gray-400" stroke="currentColor" fill="none" viewBox="0 0 48 48">
                                <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                            <div class="flex text-sm text-gray-600">
                                <label for="image" class="relative cursor-pointer bg-white rounded-md font-medium text-blue-600 hover:text-blue-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-blue-500">
                                    <span>Upload an image</span>
                                    <input id="image" name="image" type="file" class="sr-only">
                                </label>
                                <p class="pl-1">or drag and drop</p>
                            </div>
                            <p class="text-xs text-gray-500">
                                PNG, JPG, GIF up to 10MB
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Content Textarea -->
                <div>
                    <label for="description" class="block text-sm font-medium text-gray-700 mb-1">Article Content</label>
                    <textarea 
                        name="description"
                        id="description"
                        placeholder="Write your article content here..."
                        rows="12"
                        class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-base py-3 px-4">{{ old('description') }}</textarea>
                    <p class="mt-1 text-sm text-gray-500">Provide valuable, well-structured content for your readers.</p>
                </div>



                <!-- Submit Button -->
                <div class="pt-4">
                    <div class="flex justify-end">
                        <a href="/blog" class="bg-white py-3 px-6 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 mr-4">
                            Cancel
                        </a>
                        <button type="submit" class="bg-blue-600 py-3 px-6 border border-transparent rounded-md shadow-sm text-sm font-medium text-white hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                            Publish Article
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- Writing Tips Section -->
    <div class="mt-10 bg-blue-50 rounded-lg p-6">
        <h3 class="text-lg font-medium text-blue-800">Tips for Writing Great Articles</h3>
        <ul class="mt-3 list-disc pl-5 space-y-1 text-sm text-blue-700">
            <li>Use clear, concise language that your audience will understand</li>
            <li>Include relevant statistics and cite your sources</li>
            <li>Break up text with subheadings for better readability</li>
            <li>Add a compelling featured image that represents your content</li>
            <li>Proofread your article before publishing to catch any errors</li>
        </ul>
    </div>
</div>

@endsection

@section('scripts')
<script>
    // Preview image when selected
    document.getElementById('image').addEventListener('change', function(e) {
        const file = e.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                // If preview container doesn't exist, create it
                let previewContainer = document.querySelector('.image-preview-container');
                if (!previewContainer) {
                    const uploadContainer = document.querySelector('.border-dashed');
                    previewContainer = document.createElement('div');
                    previewContainer.className = 'image-preview-container mt-3';
                    uploadContainer.parentNode.appendChild(previewContainer);
                }
                
                previewContainer.innerHTML = `
                    <div class="relative">
                        <img src="${e.target.result}" class="mx-auto h-40 object-cover rounded-md" />
                        <button type="button" class="absolute top-0 right-0 -mt-2 -mr-2 bg-red-500 text-white rounded-full p-1" onclick="removePreview()">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                            </svg>
                        </button>
                    </div>
                    <p class="text-sm text-center mt-2 text-gray-600">Selected: ${file.name}</p>
                `;
            }
            reader.readAsDataURL(file);
        }
    });
    
    function removePreview() {
        const previewContainer = document.querySelector('.image-preview-container');
        if (previewContainer) {
            previewContainer.remove();
            document.getElementById('image').value = '';
        }
    }
</script>
@endsection