<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the user profile.
     *
     * @return \Illuminate\View\View
     */
    public function userProfile()
    {
        return view('auth.profile', ['user' => Auth::user()]);
    }

    public function showRenameForm()
    {
        return view('auth.rename');
    }

    public function updateName(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255', Rule::unique('users')->ignore(Auth::user())],
        ]);

        $user = Auth::user();
        $user->name = $request->name;
        $user->save();

        return redirect()->route('user.profile')->with('success', 'Your name has been updated.');
    }

    public function showChangePasswordForm()
    {
        return view('auth.change-password');
    }

    public function updatePassword(Request $request)
    {
        $request->validate([
            'current_password' => ['required', 'string'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        $user = Auth::user();
        $currentPassword = $user->password;

        if (Hash::check($request->current_password, $currentPassword)) {
            $user->password = Hash::make($request->password);
            $user->save();

            return redirect()->route('user.profile')->with('success', 'Your password has been updated.');
        } else {
            return back()->withErrors(['current_password' => 'The current password you entered is incorrect.']);
        }
    }

    public function deleteAccount()
    {
        Auth::user()->delete();

        return redirect()->route('home')->with('success', 'Your account has been deleted.');
    }

    
}
