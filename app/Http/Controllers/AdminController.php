<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Post;
use Illuminate\Http\Request;

class AdminController extends Controller
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

    public function index()
    {
        $numArticles = Post::count();
        $numUsers = User::count();
        
        return view('admin.dashboard', [
            'numArticles' => $numArticles,
            'numUsers' => $numUsers,
        ]);
    }

    public function postboard()
    {
        $posts = Post::all();
        return view('admin.postboard', compact('posts'));
    }

    public function userboard()
    {
        $users = User::all();
        // count the number of posts for each user
        foreach ($users as $user) {
            $user->post_count = $user->post()->count();
        }

        return view('admin.userboard', compact('users'));
    }

}

