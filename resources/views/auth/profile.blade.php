@extends('layouts.app')

@section('content')
        @auth
            @if (auth()->user()->level === 'admin')
                <div class="pt-15 w-4/5 m-auto">
                    <a 
                        href="/admin"
                        class="bg-blue-500 uppercase bg-transparent text-gray-100 text-xs font-extrabold py-3 px-5 rounded-3xl">
                        Admin Dashboard
                    </a>
                </div>
            @endif
        @endauth
    <div class="container mx-auto py-8">
        <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
            <h1 class="text-gray-700 font-bold text-2xl pb-4">{{ Auth::user()->name }}</h1>
            <p class="text-gray-700 pb-4">{{ Auth::user()->email }}</p>
        </div>

        <form method="POST" action="{{ route('users.update', $user->id) }}">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label class="block text-gray-700 font-bold mb-2" for="name">
                    Name
                </label>
                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="name" type="text" name="name" value="{{ old('name', $user->name) }}" required autofocus>
            </div>
            <div class="flex items-center justify-between">
                <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
                    Update
                </button>
            </div>
        </form>
    </div>
@endsection
