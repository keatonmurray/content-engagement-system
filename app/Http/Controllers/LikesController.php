<?php

    namespace App\Http\Controllers;

    use Illuminate\Http\Request;
    use App\Models\Like;

    class LikesController extends Controller
    {
        public function like_count(Request $request) 
        {
            $post_id = $request->post_id;
            $fk_like_id = $request->fk_like_id;

            $like = Like::where('fk_post_id', $post_id)->first();
            if (!$like) {
                $like = Like::create([
                    'like_count' => 1,
                    'fk_post_id' => $post_id,
                    'fk_like_id' => $fk_like_id
                ]);
            } else {
                $like->increment('like_count');
                $like->refresh();
            }
            return response()->json([
                'like_count' => $like->like_count,  
                'fk_post_id' => $post_id,  
            ]);
        }
    }
