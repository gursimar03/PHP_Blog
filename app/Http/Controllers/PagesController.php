<?php

namespace App\Http\Controllers;
use App\Models\Post;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index()
    {
        return view('index')->with('posts', Post::orderBy('updated_at', 'DESC')->get());
    }
}
