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


<!-- comments section -->
<div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 mt-8">
    <!-- comments header -->
    <div class="flex items-center justify-between border-b-2 border-gray-300 pb-4">
        <h2 class="text-xl font-medium text-gray-900">Comments ({{ $comments->count() }})</h2>
        @auth
            <button class="bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded" id="show-comment-form">Add Comment</button>
        @endauth
    </div>
    <!-- comments form (hidden by default) -->
    @auth
        <div id="comment-form" class="hidden mt-4">
            <form action="{{ route('comments.store') }}" method="POST" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
                @csrf
                <input type="hidden" name="post_id" value="{{ $post->id }}">
                <div class="mb-4">
                    <label class="block text-gray-700 font-bold mb-2" for="comment">Comment:</label>
                    <textarea name="comment" id="comment" rows="4" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Enter your comment here..." required></textarea>
                </div>
                <div class="flex items-center justify-end">
                    <button class="bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded" type="submit">Submit</button>
                </div>
            </form>
        </div>
    @else
        <div class="mt-4">
            <p class="text-gray-600">Please <a href="{{ route('login') }}" class="font-medium  hover:text-pink-600 underline">sign in</a> or <a href="{{ route('register') }}" class="font-medium hover:text-pink-600 underline">register</a> to leave a comment.</p>
        </div>
    @endauth
    <!-- comments list -->
    <div class="mt-4">

        @isset($comments)
        @foreach ($comments as $comment)
            <div class="bg-gray-100 rounded-lg px-4 py-3 mt-4">
                <div class="flex items-center mb-2">
                    <div class="h-8 w-8 rounded-full bg-gray-400 mr-2"></div>
                    <p class="text-gray-700 font-bold">{{ $comment->user->name }}</p>
                </div>
                <p class="text-gray-700">{{ $comment->body }}</p>
                <p class="text-gray-600 text-sm mt-2">{{ date('jS M Y', strtotime($comment->created_at)) }}</p>
                @can('delete', $comment)
                    <form action="{{ route('comments.destroy', $comment->id) }}" method="POST" class="mt-2">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-sm text-red-600 font-medium">Delete</button>
                    </form>
                @endcan
            </div>
        @endforeach
        @endisset
       
    </div>
</div>



<script>

    const addbtn = document.getElementById('show-comment-form');

    addbtn.addEventListener('click', () => {
        const commentForm = document.getElementById('comment-form');
        commentForm.classList.toggle('hidden');
    });

    </script>

@endsection
