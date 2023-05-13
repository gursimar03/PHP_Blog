<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

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

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);
    $user->name = $request->input('name');
    $user->save();

    return redirect()->route('user.profile');
    }

    public function userProfile()
    {
        $user = auth()->user();
    return view('auth.profile', compact('user'));
    }

    public function distroy($id)
    {
        $user = User::findOrFail($id);
    $user->delete();

    return redirect()->route('admin.userboard');
    }

    public function updateRole(Request $request, $id)
    {
        $user = User::findOrFail($id);
    
        $user->level = $request->input('level');
        $user->save();
    
        return redirect()->route('admin.userboard', $user->id);
    }
    
    public function updatePass(Request $request)
    {
        if (!(Hash::check($request->get('current-password'), Auth::user()->password))) {
            // The passwords matches
            return redirect()->back()->with("error", "Your current password does not matches with the password you provided. Please try again.");
        }
    
        if(strcmp($request->get('current-password'), $request->get('new-password')) == 0){
            //Current password and new password are same
            return redirect()->back()->with("error", "New Password cannot be same as your current password. Please choose a different password.");
        }
    
        $validatedData = $request->validate([
            'current-password' => 'required',
            'new-password' => 'required|string|min:6|confirmed',
        ]);
    
        //Change Password
        $user = Auth::user();
        $user->password = bcrypt($request->get('new-password'));
        $user->save();
    
        return redirect()->back()->with("success", "Password changed successfully !");
    }

    
}
