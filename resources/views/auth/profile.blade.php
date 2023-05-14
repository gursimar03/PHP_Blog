@extends('layouts.app')

@section('content')
        @auth
            @if (auth()->user()->level === 'admin')
                <div class="pt-15 w-4/5 m-auto">
                    <a 
                        href="/admin"
                        class="bg-blue-500 uppercase  text-gray-100 text-xs font-extrabold py-3 px-5 rounded-3xl">
                        Admin Dashboard
                    </a>
                </div>
            @endif
        @endauth
    <div class=" mx-auto py-8">
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

        <button id="btn" class="bg-blue-500 my-4 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="button" data-toggle="modal" data-target="#changePasswordModal">
            Change Password
        </button>

        <!-- Change Password Modal -->
        <div id="chng-pass"   class="fixed w-full h-full top-0 left-0  items-center justify-center hidden" style="z-index: 9999;">
            <div class="modal-overlay absolute w-full h-full bg-gray-900 opacity-50"></div>
            <div class="modal-container bg-white w-11/12 md:max-w-md mx-auto rounded shadow-lg z-50 overflow-y-auto">
                <div class="modal-content py-4 text-left px-6">
                    <div class="flex justify-between items-center pb-3">
                        <p class="text-2xl font-bold">Change Password</p>
                        <div class="modal-close cursor-pointer z-50">
                            <i class="fa fa-times"></i>
                        </div>
                    </div>
                    <form method="POST" class="modal" action="{{ route('change.password') }}">
                        @csrf
                        <div class="mb-4">
                            <label class="block text-gray-700 font-bold mb-2" for="current_password">
                                Current Password
                            </label>
                            <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="current_password" type="password" name="current_password" required>
                        </div>
                        <div class="mb-4">
                            <label class="block text-gray-700 font-bold mb-2" for="new_password">
                                New Password
                            </label>
                            <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="new_password" type="password" name="new_password" required>
                        </div>
                        <div class="mb-4">
                            <label class="block text-gray-700 font-bold mb-2 " for="new_password_confirmation">
                                Confirm New Password
                            </label>
                            <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="new_password_confirmation" type="password" name="new_password_confirmation" required>
                        </div>
                        <div class="flex justify-end pt-2">
                            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline mr-2">
                                Save Changes
                            </button>
                           
                        </div>
                    </form>
                    <button id="cln-btn" class="modal-close float-right m-4 bg-gray-400 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                                Cancel
                    </button>
                </div>
            </div>
        </div>

        <!-- script -->
        <script>
            // Get the modal
            let modal = document.getElementById('chng-pass');

            // Get the button that opens the modal
            let btn = document.getElementById("btn");

                    // Get the button that closes the modal
            let cancelButton = document.getElementById("cln-btn");

            // When the user clicks on the button or <span> (x), close the modal
            cancelButton.addEventListener('click', function() {
                // add class flex and remove hidden
                modal.classList.remove('flex');
                modal.classList.add('hidden');
            });

            window.addEventListener('keydown', function(event) {
                if (event.key === 'Escape') {
                    modal.classList.remove('flex');
                    modal.classList.add('hidden');
                }
            });

            // use event listener to listen for click
            btn.addEventListener('click', function() {
                // add class flex and remove hidden
                modal.classList.remove('hidden');
                modal.classList.add('flex');
            });

    
        </script>
@endsection
