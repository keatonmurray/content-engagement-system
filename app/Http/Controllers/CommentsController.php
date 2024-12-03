<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Comment;
use App\Models\Post;

class CommentsController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'comment' => 'required|string|max:255', 
        ]);

        $fk_user_id = Auth::id();
        $fk_post_id = $request->input('post_id');
        $comment = $request->input('comment');
        $comment_count = 1;

        $data = [
            'comment' => $comment,
            'fk_user_id' => $fk_user_id,
            'fk_post_id' => $fk_post_id,
            'comment_count' => $comment_count,
        ];

        Comment::create($data);
        return response()->json([
            'data' => $data,
        ]);
    }

    public function show(Request $request)
    {   
        $post_id = $request->input('post_id');
        $comments = Comment::where('fk_post_id', $post_id)->with('user')->get();
        
        return response()->json($comments);
    }

    public function get_comment_count(Request $request)
    {
        $post_id = $request->input('post_id');
        $post = Post::find($post_id);

        if ($post) {
            $comment_count = Comment::where('fk_post_id', $post_id)->count();
            return response()->json(['comment_count' => $comment_count]);
        } 
    }


}
