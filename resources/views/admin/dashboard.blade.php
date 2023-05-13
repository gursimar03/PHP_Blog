@extends('layouts.app')

@section('content')
<div class="container mx-auto py-8">
    <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
        <h1 class="text-gray-700 font-bold text-2xl pb-4">Admin Dashboard</h1>
            <div class="flex justify-between">
                <a href="{{ route('admin.postboard') }}" class="block hover:text-blue-500 focus:outline-none">
                    <div class="bg-blue-500 text-white font-bold py-4 px-8 rounded-lg">
                        <div class="text-3xl">{{ $numArticles }}</div>
                        <div class="text-sm">Articles</div>
                    </div>
                </a>
                <a href="{{ route('admin.userboard') }}" class="block hover:text-blue-500 focus:outline-none">
                    <div class="bg-blue-500 text-white font-bold py-4 px-8 rounded-lg">
                        <div class="text-3xl">{{ $numUsers }}</div>
                        <div class="text-sm">Users</div>
                    </div>
                </a>
            </div>
       
    </div>
</div>
@endsection
