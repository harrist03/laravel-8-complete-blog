@extends('layouts.app')

@section('content')
<div class="w-4/5 m-auto text-left">
    <div class="py-15">
        <h1 class="text-6xl">
            Create Post
        </h1>
    </div>
</div>

@if ($errors->any())
    <div class="w-4/5 m-auto">
        <ul>
            @foreach ($errors->all() as $error)
                <li class="w-1/5 mb-4 text-gray-50 bg-red-700 rounded-2xl py-4 px-4">
                    {{ $error }}
                </li>
            @endforeach
        </ul>
    </div>
@endif

<div class="w-4/5 m-auto pt-20">
    <form 
        action="/blog"
        method="POST"
        enctype="multipart/form-data">
        @csrf

        <input 
            type="text"
            name="title"
            placeholder="Title..."
            class="bg-transparent block border-b-2 w-full h-20 text-6xl outline-none mb-10 p-2">

        <textarea 
            name="description"
            placeholder="Description..."
            class="py-20 bg-transparent block border-b-2 w-full h-60 text-xl outline-none mb-10 p-2"></textarea>

        <div class="bg-grey-lighter mb-10">
            <label class="w-44 flex flex-col items-center px-3 py-2 bg-transparent border-b-2 rounded-lg tracking-wide cursor-pointer hover:bg-gray-100 transition duration-300 ease-in-out">
            <span class="text-base">
            Select a file
            </span>
            <input 
            type="file"
            name="image"
            class="hidden">
            </label>
        </div>

        <button    
            type="submit"
            class="uppercase mt-15 bg-blue-500 text-gray-100 text-lg font-extrabold py-4 px-8 rounded-3xl hover:bg-blue-700 transition duration-300 ease-in-out">
            Submit Post
        </button>
    </form>
</div>

@endsection