<?php
namespace App\Http\Controllers;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Request $request)
    {
        $comment = new Comment;
        $comment->user_id = auth()->id();
        $comment->body = $request->comment;
    
        $post = Post::findOrFail($request->post_id);
        $post->comments()->save($comment);
    
        return back();
    }
    

    public function destroy(Comment $comment)
    {
        $comment->delete();

        return back();
    }
}
