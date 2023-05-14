@extends('layouts.app')

@section('content')
<br><br><br>
<div class=" m-20 py-8">
    <h1 class="text-gray-700 font-bold text-2xl pb-4">All Posts</h1>

    <div class="overflow-x-auto">
        <table class="table-auto w-full border-collapse">
            <thead>
                <tr class="text-left  bg-orange-300 border-t font-bold">
                    <th class="px-4 py-2">Image</th>
                    <th class="px-4 py-2">Title</th>
                    <th class="px-4 py-2">Created By</th>
                    <th class="px-4 py-2">Comments</th>
                    <th class="px-4 py-2">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($posts as $post)
                    <tr class="border-t hover:bg-gray-100 bg-white">
                        <td class="px-4 py-2">
                            <img class="h-12 w-12 object-cover" src="{{ asset('images/' . $post->image_path) }}" alt="{{ $post->title }}">
                        </td>
                        <td class="px-4 py-2">
                            <a href="{{ route('blog.show', $post->slug) }}" class=" hover:text-pink-700">{{ $post->title }}</a>
                        </td>
                        <td class="px-4 py-2">{{ $post->user->name }}</td>
                        <td class="px-4 py-2">{{ $post->comments->count() }}</td>
                        <td class="px-4 py-2">
                            <form method="POST" action="{{ route('posts.destroy', $post->id) }}" class="inline-block">
                                @csrf
                                @method('DELETE')
                                <button class="text-red-500 hover:text-red-700 font-medium focus:outline-none" type="submit">
                                    Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>


@endsection
