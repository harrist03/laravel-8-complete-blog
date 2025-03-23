@extends('layouts.app')

@section('content')
<div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
    <div class="mb-10">
        <h1 class="text-4xl font-bold text-gray-900 tracking-tight sm:text-5xl">
            Update Article
        </h1>
        <p class="mt-3 text-lg text-gray-500">
            Improve your article with updates and refinements.
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
                action="/blog/{{ $post->slug }}"
                method="POST"
                enctype="multipart/form-data"
                class="space-y-8">
                @csrf
                @method('PUT')

                <!-- Title Input -->
                <div>
                    <label for="title" class="block text-sm font-medium text-gray-700 mb-1">Article Title</label>
                    <input 
                        type="text"
                        name="title"
                        id="title"
                        value="{{ $post->title }}"
                        class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500 sm:text-lg py-3 px-4">
                    <p class="mt-1 text-sm text-gray-500">Make it clear and engaging to attract readers.</p>
                </div>

                <!-- Category Selection -->
                <div>
                    <label for="category_id" class="block text-sm font-medium text-gray-700 mb-1">Category</label>
                    <select 
                        name="category_id" 
                        id="category_id" 
                        class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500 sm:text-lg py-3 px-4">
                        <option value="">Select a category</option>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}" {{ (old('category_id') ?? $post->category_id) == $category->id ? 'selected' : '' }}>
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                    <p class="mt-1 text-sm text-gray-500">Categorizing your article helps readers find relevant content.</p>
                </div>

                <!-- Image Upload -->
                <div>
                    <label for="image" class="block text-sm font-medium text-gray-700 mb-1">Featured Image</label>
                    
                    <!-- Upload Interface -->
                    <div id="image-upload-interface" class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-md">
                        <div class="space-y-1 text-center">
                            <svg class="mx-auto h-12 w-12 text-gray-400" stroke="currentColor" fill="none" viewBox="0 0 48 48">
                                <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                            <div class="flex text-sm text-gray-600">
                                <label for="image" class="relative cursor-pointer bg-white rounded-md font-medium text-blue-600 hover:text-blue-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-blue-500">
                                    <span>Upload a new image</span>
                                    <input id="image" name="image" type="file" class="sr-only" accept="image/*">
                                </label>
                                <p class="pl-1">or drag and drop</p>
                            </div>
                            <p class="text-xs text-gray-500">
                                PNG, JPG, GIF up to 10MB
                            </p>
                        </div>
                    </div>
                    
                    <!-- Image Preview Container -->
                    <div id="image-preview-container" class="mt-4 hidden">
                        <div class="flex items-center p-4 bg-blue-50 rounded-lg">
                            <div class="flex-shrink-0 mr-4">
                                <img id="preview-image" src="#" alt="Preview" class="h-24 w-24 object-cover rounded-md border-2 border-blue-200">
                            </div>
                            <div class="flex-1">
                                <div class="flex justify-between">
                                    <div>
                                        <p class="text-sm font-medium text-blue-800" id="filename-display">image.jpg</p>
                                        <p class="text-xs text-blue-600" id="filesize-display">Size: 0 KB</p>
                                    </div>
                                    <div class="flex space-x-2">
                                        <button type="button" id="change-image-btn" class="inline-flex items-center px-2.5 py-1.5 border border-blue-300 text-xs font-medium rounded text-blue-700 bg-blue-50 hover:bg-blue-100 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                                            Change
                                        </button>
                                        <button type="button" id="remove-image-btn" class="inline-flex items-center px-2.5 py-1.5 border border-red-300 text-xs font-medium rounded text-red-700 bg-red-50 hover:bg-red-100 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500">
                                            Remove
                                        </button>
                                    </div>
                                </div>
                                <div class="mt-1">
                                    <div class="bg-blue-200 h-1.5 rounded-full overflow-hidden">
                                        <div id="upload-progress" class="bg-blue-600 h-full rounded-full w-full"></div>
                                    </div>
                                    <p class="text-xs text-blue-700 mt-1" id="upload-status">
                                        @if($post->image_path)
                                            Current image will be preserved unless changed
                                        @else
                                            New image will be uploaded
                                        @endif
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    @if($post->image_path)
                        <div class="mt-4 p-4 bg-gray-50 rounded-lg" id="current-image-container">
                            <div class="flex items-center">
                                <div class="flex-shrink-0 mr-4">
                                    <img src="{{ asset('images/' . $post->image_path) }}" alt="{{ $post->title }}" class="h-24 w-24 object-cover rounded-md border border-gray-200">
                                </div>
                                <div>
                                    <p class="text-sm font-medium text-gray-900">Current Image</p>
                                    <p class="text-xs text-gray-500 mt-1">Upload a new image to replace this one</p>
                                </div>
                            </div>
                        </div>
                    @endif
                    
                    <p class="mt-2 text-sm text-gray-500">Adding a high-quality image will make your article more engaging.</p>
                </div>

                <!-- Content Textarea -->
                <div>
                    <label for="description" class="block text-sm font-medium text-gray-700 mb-1">Article Content</label>
                    <textarea 
                        name="description"
                        id="description"
                        rows="12"
                        class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500 sm:text-base py-3 px-4">{{ $post->description }}</textarea>
                    <p class="mt-1 text-sm text-gray-500">Provide valuable, well-structured content for your readers.</p>
                </div>

                <!-- Submit Button -->
                <div class="pt-4">
                    <div class="flex justify-end">
                        <a href="/user-dashboard" class="bg-white py-3 px-6 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 mr-4">
                            Cancel
                        </a>
                        <button type="submit" class="bg-blue-600 py-3 px-6 border border-transparent rounded-md shadow-sm text-sm font-medium text-white hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                            Update Article
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- Tips Section -->
    <div class="mt-10 bg-blue-50 rounded-lg p-6">
        <h3 class="text-lg font-medium text-blue-800">Tips for Improving Your Article</h3>
        <ul class="mt-3 list-disc pl-5 space-y-1 text-sm text-blue-700">
            <li>Review for spelling and grammar errors</li>
            <li>Make sure all facts and figures are accurate and up-to-date</li>
            <li>Check if the article flow is logical and easy to follow</li>
            <li>Consider adding more examples or case studies to strengthen your points</li>
            <li>Add a clear call-to-action at the end of your article</li>
        </ul>
    </div>
</div>

@endsection

@section('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const imageInput = document.getElementById('image');
        const uploadInterface = document.getElementById('image-upload-interface');
        const previewContainer = document.getElementById('image-preview-container');
        const currentImageContainer = document.getElementById('current-image-container');
        const previewImage = document.getElementById('preview-image');
        const filenameDisplay = document.getElementById('filename-display');
        const filesizeDisplay = document.getElementById('filesize-display');
        const changeImageBtn = document.getElementById('change-image-btn');
        const removeImageBtn = document.getElementById('remove-image-btn');
        const uploadProgress = document.getElementById('upload-progress');
        const uploadStatus = document.getElementById('upload-status');
        
        // Handle drag and drop events
        uploadInterface.addEventListener('dragover', function(e) {
            e.preventDefault();
            uploadInterface.classList.add('border-blue-500', 'bg-blue-50');
        });
        
        uploadInterface.addEventListener('dragleave', function() {
            uploadInterface.classList.remove('border-blue-500', 'bg-blue-50');
        });
        
        uploadInterface.addEventListener('drop', function(e) {
            e.preventDefault();
            uploadInterface.classList.remove('border-blue-500', 'bg-blue-50');
            
            if (e.dataTransfer.files.length) {
                imageInput.files = e.dataTransfer.files;
                handleImageSelect(e.dataTransfer.files[0]);
            }
        });
        
        // Handle file selection via input
        imageInput.addEventListener('change', function() {
            if (this.files.length) {
                handleImageSelect(this.files[0]);
            }
        });
        
        // Change image button
        changeImageBtn.addEventListener('click', function() {
            imageInput.click();
        });
        
        // Remove image button
        removeImageBtn.addEventListener('click', function() {
            imageInput.value = '';
            uploadInterface.classList.remove('hidden');
            previewContainer.classList.add('hidden');
            
            // Show current image container if it exists
            if (currentImageContainer) {
                currentImageContainer.classList.remove('hidden');
            }
            
            uploadStatus.textContent = 'Image selection removed';
        });
        
        // Handle image selection
        function handleImageSelect(file) {
            if (!file.type.match('image.*')) {
                alert('Please select an image file (JPG, PNG, GIF)');
                return;
            }
            
            const reader = new FileReader();
            
            reader.onload = function(e) {
                // Show preview
                previewImage.src = e.target.result;
                
                // Show file info
                filenameDisplay.textContent = file.name;
                filesizeDisplay.textContent = `Size: ${formatFileSize(file.size)}`;
                
                // Show success state
                uploadStatus.textContent = 'New image ready to upload';
                uploadProgress.style.width = '100%';
                
                // Show preview container and hide upload interface
                uploadInterface.classList.add('hidden');
                previewContainer.classList.remove('hidden');
                
                // Hide current image container if it exists
                if (currentImageContainer) {
                    currentImageContainer.classList.add('hidden');
                }
                
                // Simulate upload progress (for a better UX)
                simulateUploadProgress();
            };
            
            reader.readAsDataURL(file);
        }
        
        // Format file size in KB or MB
        function formatFileSize(bytes) {
            if (bytes < 1024) {
                return bytes + ' bytes';
            } else if (bytes < 1048576) {
                return (bytes / 1024).toFixed(1) + ' KB';
            } else {
                return (bytes / 1048576).toFixed(1) + ' MB';
            }
        }
        
        // Simulate upload progress (just for UX, not real uploading)
        function simulateUploadProgress() {
            // Reset progress bar
            uploadProgress.style.width = '0%';
            uploadStatus.textContent = 'Processing image...';
            
            let progress = 0;
            const interval = setInterval(function() {
                progress += 10;
                uploadProgress.style.width = progress + '%';
                
                if (progress >= 100) {
                    clearInterval(interval);
                    uploadStatus.textContent = 'New image ready to upload';
                } else {
                    uploadStatus.textContent = `Processing image... ${progress}%`;
                }
            }, 100);
        }
        
        // If we're in edit mode and there's an existing image, adjust the UI accordingly
        const existingImage = "{{ $post->image_path }}";
        if (existingImage) {
            // Already showing the current image in the dedicated section
            // uploadInterface is visible by default, which is what we want
        }
    });
</script>
@endsection