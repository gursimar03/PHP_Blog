<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
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
    
    public function getPostCount($id)
{
    $user = User::find($id);
    if (!$user) {
        return abort(404);
    }
    $count = $user->posts()->count();
    return view('users.postcount', ['count' => $count, 'user' => $user]);
}


    
}
