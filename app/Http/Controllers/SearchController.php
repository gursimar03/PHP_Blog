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
    
        return view('layouts.search')->with('posts', $posts)->with('tags', $tags);
    }
    

    public function byTag($tag)
    {
       // join tags and posts table 
        $posts = Post::join('post_tag', 'posts.id', '=', 'post_tag.post_id')
                     ->join('tags', 'post_tag.tag_id', '=', 'tags.id')
                     ->where('tags.name', '=', $tag)
                     ->get();

           //adding tags to post
           foreach ($posts as $post) {
            $post->tags = $post->tags()->get();
        }
    

        return view('layouts.search')->with('posts', $posts)
                                     ->with('tags', Tag::all());
    }
}
