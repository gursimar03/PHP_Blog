<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tag;
use App\Models\Post;

class SearchController extends Controller
{
    public function index(Request $request)
    {
        $query = $request->input('query');
        $posts = Post::where('title', 'like', "%$query%")
                     ->get();
    
        // Get all the tags
        $tags = Tag::all();
    
        //adding tags to post
        foreach ($posts as $post) {
            $post->tags = $post->tags()->get();
        }
    
        return view('layouts.search')->with('posts', $posts)->with('tags', $tags)
                                     ->with('query', $query);
    }
    

    public function byTag($tag)
    {
        $posts = Post::whereHas('tags', function ($query) use ($tag) {
            $query->where('name', $tag);
        })->get();
        
        // Add tags to each post
        foreach ($posts as $post) {
            $post->tags = $post->tags()->get();
        }
    
        // Get all the tags
        $tags = Tag::all();
        
        return view('layouts.search')->with('posts', $posts)->with('tags', $tags) 
                                     ->with('query', $tag);
    }
}
