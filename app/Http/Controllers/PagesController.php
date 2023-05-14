<?php

namespace App\Http\Controllers;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index()
    {
        // Get all tags
        $tags = Tag::all();

        

        return view('index')
            ->with('posts', Post::orderBy('updated_at', 'DESC')->get())
            ->with('tags', $tags);
    }

    public function show(Post $post)
    {
        return view('blog.show')->with('post', $post);
    }
}
