@extends('layouts.app')

@section('content')
<div class="flex m-24 justify-center">
    <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
        <h1 class="text-gray-700 font-bold text-2xl pb-4">Admin Dashboard</h1>
        <div class="flex justify-between">
            <a href="{{ route('admin.postboard') }}" class="block  hover:text-blue-500 focus:outline-none">
                <div class="bg-blue-500 text-white font-bold py-3 px-5  m-6 rounded-lg flex items-center">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-9 h-9 m-2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M9 8.25H7.5a2.25 2.25 0 00-2.25 2.25v9a2.25 2.25 0 002.25 2.25h9a2.25 2.25 0 002.25-2.25v-9a2.25 2.25 0 00-2.25-2.25H15m0-3l-3-3m0 0l-3 3m3-3V15" />
                </svg>
                    <div class="hover:text-pink-500">
                        <div class="text-3xl">{{ $numArticles }}</div>
                        <div class="text-sm">Articles</div>
                    </div>
                </div>
            </a>
            <a href="{{ route('admin.userboard') }}" class="block hover:text-blue-500 focus:outline-none">
                <div class="bg-blue-500 text-white font-bold py-3 px-5 m-6 rounded-lg flex items-center">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"  stroke-width="1.5" stroke="currentColor" class="w-9 h-9 m-2">
  <path stroke-linecap="round" stroke-linejoin="round" d="M15 19.128a9.38 9.38 0 002.625.372 9.337 9.337 0 004.121-.952 4.125 4.125 0 00-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 018.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0111.964-3.07M12 6.375a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zm8.25 2.25a2.625 2.625 0 11-5.25 0 2.625 2.625 0 015.25 0z" />
</svg>

                    <div class="hover:text-pink-500">
                        <div class="text-3xl">{{ $numUsers }}</div>
                        <div class="text-sm">Users</div>
                    </div>
                </div>
            </a>
        </div>
    </div>
</div>

@endsection
