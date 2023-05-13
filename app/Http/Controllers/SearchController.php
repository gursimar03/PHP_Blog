<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class SearchController extends Controller
{
    public function index(Request $request)
    {
        $query = $request->input('query');
        $posts = Post::where('title', 'like', "%$query%")
                     ->orWhere('content', 'like', "%$query%")
                     ->get();

        return view('search_results', ['posts' => $posts]);
    }
}
