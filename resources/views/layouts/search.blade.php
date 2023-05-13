@extends('layouts.app')

@section('content')

@if($posts->count() > 0)

<div class="w-full sm:w-4/5 m-auto text-left">
 
    @foreach ($posts as $post )
        
        <div class="w-full bg-white rounded-lg shadow-lg mb-10">
            <div class="p-6">
                <h1 class="text-3xl sm:text-4xl font-bold mb-2">{{ $post->title }}</h1>
                <div class="text-gray-500 text-sm sm:text-base mb-4">
                    By <span class="font-bold italic text-gray-800">{{ $post->user->name }}</span>, Created on {{ date('jS M Y', strtotime($post->updated_at)) }}
                </div>
                <p class="text-gray-700 leading-8 font-light">{{ $post->description }}</p>
                <div class="flex flex-wrap mt-4">
                    @foreach ($post->tags as $tag)
                        <div class="bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">{{ $tag->name }}</div> 
                    @endforeach
                </div>
            </div>
        </div>

    @endforeach

</div>
@else
    <div class="w-4/5 m-auto text-center">
        <div class="py-15">
            <h1 class="text-5xl">
                No Posts Found
            </h1>
        </div>
    </div>

@endif

@endsection
