<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Share;

class SharesController extends Controller
{
    public function share_post(Request $request)
    {   
        $post_id = $request->post_id; 
        $get_post = Post::find($post_id);

        $data = [
            "id" => $get_post['id'],
            "fk_user_id" => $get_post['fk_user_id'],
            "fk_post_id" => $post_id,
            "share_count" => 1,
            "body" => $get_post['body'],
            "image" => $get_post['image'],
            "created_at" => $get_post['created_at'],
            "updated_at" => $get_post['updated_at']
        ];

        Share::create($data);

        // return response()->json([
        //     'data' => $data
        // ]);
    }
}
