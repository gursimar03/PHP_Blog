@extends('layouts.app')

@section('content')
    <div class="container mx-auto py-8">
        <h1 class="text-gray-700 font-bold text-2xl pb-4">All Posts</h1>

        <div class="flex flex-wrap -mx-4">
            @foreach ($posts as $post)
                <div class="w-full sm:w-1/2 md:w-1/3 lg:w-1/4 xl:w-1/5 px-4 mb-8">
                    <div class="bg-white shadow-md rounded overflow-hidden">
                        <img class="w-full h-64 object-cover" src="{{ asset('images/' . $post->image_path) }}" alt="{{ $post->title }}">
                        <div class="px-6 py-4">
                            <div class="font-bold text-xl mb-2">{{ $post->title }}</div>
                            <p class="text-gray-700 text-base">{{ Str::limit($post->body, 100) }}</p>
                        </div>
                        <div class="px-6 py-4">
                            <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2">{{ $post->created_at->format('d M Y') }}</span>
                            <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700">{{ $post->user->name }}</span>
                            <form method="POST" action="{{ route('posts.destroy', $post->id) }}" class="float-right">
                                @csrf
                                @method('DELETE')
                                <button class="bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-2 rounded focus:outline-none focus:shadow-outline" type="submit">
                                    Delete
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
