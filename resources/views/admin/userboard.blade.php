@extends('layouts.app')

@section('content')
    <div class="container mx-auto py-8">
        <h1 class="text-gray-700 font-bold text-2xl pb-4">All Users</h1>

        <div class="flex flex-wrap -mx-4">
            @foreach ($users as $user)
                <div class="w-full sm:w-1/2 md:w-1/3 lg:w-1/4 xl:w-1/5 px-4 mb-8">
                    <div class="bg-white shadow-md rounded overflow-hidden">
                        <div class="px-6 py-4">
                            <div class="font-bold text-xl mb-2">{{ $user->name }}</div>
                            <p class="text-gray-700 text-base">{{ $user->email }}</p>
                            <!-- only if admin show number of posts -->
                            @if ($user->level === 'admin')
                                <p class="text-red-800 ">Posts: {{ $user->post_count }}</p>
                                    
                            @endif

                        </div>
                        <div class="px-6 py-4">

                        <!-- if admin greyed out , admin cant be deleted but change role -->
                        @if ($user->level === 'admin')
                            <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2">{{ $user->level }}</span>
                            

                             <form method="POST" action="{{ route('users.role', $user->id) }}" class="float-right py-3">
                                @csrf
                                
                                <label for="role-select">Role:</label>
                                <select id="role-select" name="level" class="bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2" onchange="this.form.submit()">
                                    <option value="user" {{ $user->level === 'user' ? 'selected' : '' }}>User</option>
                                    <option value="admin" {{ $user->level === 'admin' ? 'selected' : '' }}>Admin</option>
                                </select>
                            </form>
                        @else
                            <form method="POST" action="{{ route('users.destroy', $user->id) }}" class="float-right py-3">
                                @csrf
                                @method('DELETE')
                                <button class="bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-2 rounded focus:outline-none focus:shadow-outline" type="submit">
                                    Delete
                                </button>
                            </form>
                            <form method="POST" action="{{ route('users.role', $user->id) }}" class="float-left py-3">
                                @csrf
                                <label for="role-select">Role:</label>
                                <select id="role-select" name="level" class="bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2" onchange="this.form.submit()">
                                    <option value="user" {{ $user->level === 'user' ? 'selected' : '' }}>User</option>
                                    <option value="admin" {{ $user->level === 'admin' ? 'selected' : '' }}>Admin</option>
                                </select>
                            </form>
                        @endif
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
