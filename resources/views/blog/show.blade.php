@extends('layouts.app')

@section('content')
<div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="py-15">
        <h1 class="text-4xl md:text-6xl font-extrabold tracking-tight text-gray-900">
            {{ $post->title }}
        </h1>
    </div>
    <div class="mt-8 md:mt-12 xl:mt-16 flex justify-center">
        <div class="w-full max-w-3xl">
            <img src="{{ asset('images/' . $post->image_path) }}" alt="" class="rounded-lg object-cover object-center w-full h-64 md:h-96">
        </div>
    </div>
    <div class="mt-8 md:mt-12 xl:mt-16">
        <span class="text-gray-500">
            By <span class="font-bold italic text-gray-800">{{ $post->user->name }}</span>, Created on {{ date('jS M Y', strtotime($post->updated_at)) }}
        </span>
        <p class="text-base text-gray-700 pt-8 pb-10 leading-8 font-light">
            {{ $post->description }}
        </p>
        <!-- tags -->
        <div class="text-gray-500 text-xs pb-10">
            @foreach ($post->tags as $tag)
                <div class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2">
                    {{ $tag->name }}
                </div> 
            @endforeach
        </div>
    </div>
</div>
@endsection
