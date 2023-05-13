@extends('layouts.app')

@section('content')
    <div class="container mx-auto py-8">
        <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
            <h1 class="text-gray-700 font-bold text-2xl pb-4">{{ Auth::user()->name }}</h1>
            <p class="text-gray-700 pb-4">{{ Auth::user()->email }}</p>
            <form method="POST" action="{{ route('user.rename') }}">
                @csrf
                <div class="mb-4">
                    <label for="name" class="block text-gray-700 font-bold mb-2">Rename:</label>
                    <input type="text" name="name" id="name" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" value="{{ Auth::user()->name }}" required>
                </div>
                <div class="mb-4">
                    <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Save</button>
                </div>
            </form>
            <form method="POST" action="{{ route('user.changepassword') }}">
                @csrf
                <div class="mb-4">
                    <label for="current_password" class="block text-gray-700 font-bold mb-2">Current Password:</label>
                    <input type="password" name="current_password" id="current_password" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                </div>
                <div class="mb-4">
                    <label for="new_password" class="block text-gray-700 font-bold mb-2">New Password:</label>
                    <input type="password" name="new_password" id="new_password" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                </div>
                <div class="mb-4">
                    <label for="new_password_confirmation" class="block text-gray-700 font-bold mb-2">Confirm New Password:</label>
                    <input type="password" name="new_password_confirmation" id="new_password_confirmation" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                </div>
                <div class="mb-4">
                    <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Change Password</button>
                </div>
            </form>
            <form method="POST" action="{{ route('user.deleteaccount') }}">
                @csrf
                <div class="mb-4">
                    <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Delete Account</button>
                </div>
            </form>
        </div>
    </div>
@endsection
