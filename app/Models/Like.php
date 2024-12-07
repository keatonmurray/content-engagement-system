<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Post;
use App\Models\Share;

class Like extends Model
{
    protected $fillable = ['fk_like_id', 'fk_post_id', 'like_count'];

    public function user()
    {
        return $this->belongsTo(User::class, 'fk_user_id');
    }

    public function post()
    {
        return $this->belongsTo(Post::class, 'fk_post_id');
    }

    public function share()
    {
        return $this->belongsTo(Share::class, 'fk_like_id', 'fk_post_id');
    }
}
