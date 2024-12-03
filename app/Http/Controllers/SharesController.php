<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class SharesController extends Controller
{
    public function share_post(Request $request)
    {   
        $post_id = $request->post_id; 
        $get_post = Post::find($post_id);

        return response()->json([
            'get_post' => $get_post
        ]);

    }
}
