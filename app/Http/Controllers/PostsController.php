<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Tag;
use Cviebrock\EloquentSluggable\Services\SlugService;



class PostsController extends Controller
{
 
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tags = Tag::all();

        return view('blog.index')
            ->with('posts', Post::orderBy('updated_at', 'DESC')->get())
            ->with('tags', $tags);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        //send tags to the view
        return view('blog.create')->with('tags', Tag::all());

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'image' => 'required|mimes:jpg,png,jpeg|max:5048'
        ]);
    
        $newImageName = uniqid() . '-' . $request->title . '.' . $request->image->extension();
    
        $request->image->move(public_path('images'), $newImageName);
    
        $post = Post::create([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'slug' => SlugService::createSlug(Post::class, 'slug', $request->title),
            'image_path' => $newImageName,
            'user_id' => auth()->user()->id
        ]);
    
        // Get the selected tags and attach them to the new post
        $tags = $request->input('tags');
        $post->tags()->attach($tags);
    
        return redirect('/blog')
            ->with('message', 'Your post has been added!');
    }
    

    /**
     * Display the specified resource.
     *
     * @param  string  $slug
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        // get tags and comments for the post
        $post = Post::where('slug', $slug)->first();
    
        if (!$post) {
            abort(404); // or throw new Exception('Post not found')
        }
    
        $tags = $post->tags;
        $comments = $post->comments;
       
        return view('blog.show')
            ->with('post', $post)
            ->with('tags', $tags)
            ->with('comments', $comments);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  string  $slug
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        $alltags = Tag::all();
        $post = Post::where('slug', $slug)->with('tags')->first();
        $tags = $post->tags;
    
        return view('blog.edit')
            ->with('post', $post)
            ->with('alltags', $alltags)
            ->with('tags', $tags);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  string  $slug
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $slug)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'image' => 'mimes:jpg,png,jpeg|max:5048'
        ]);

        if ($request->image) {
            $newImageName = uniqid() . '-' . $request->title . '.' . $request->image->extension();

            $request->image->move(public_path('images'), $newImageName);

            Post::where('slug', $slug)
                ->update([
                    'title' => $request->input('title'),
                    'description' => $request->input('description'),
                    'slug' => SlugService::createSlug(Post::class, 'slug', $request->title),
                    'image_path' => $newImageName,
                    'user_id' => auth()->user()->id
                ]);
        }
        else{
            Post::where('slug', $slug)
                ->update([
                    'title' => $request->input('title'),
                    'description' => $request->input('description'),
                    'slug' => SlugService::createSlug(Post::class, 'slug', $request->title),
                    'user_id' => auth()->user()->id
                ]);
        }



        return redirect('/blog')
            ->with('message', 'Your post has been updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($slug)
    {
        $post = Post::where('slug', $slug);
        $post->delete();

        return redirect('/blog')
            ->with('message', 'Your post has been deleted!');
    }
}

