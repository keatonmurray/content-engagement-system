<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Post;
use App\Models\Share;

class SharesController extends Controller
{
    public function share_post(Request $request)
    {   
        $post_id = $request->post_id; 
        $body = $request->body;
        $get_post = Post::find($post_id);
        $user = Auth::id(); 

        $data = [
            "fk_user_id" => $user,
            "fk_post_id" => $post_id,
            "share_count" => 1,
            "body" => $body,
            "image" => $get_post['image'],
            "created_at" => $get_post['created_at'],
            "updated_at" => $get_post['updated_at']
        ];

        Share::create($data);
         
    }
}