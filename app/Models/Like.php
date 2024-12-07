<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Post;

class Like extends Model
{
    protected $fillable = ['fk_post_id', 'like_count'];

    public function user()
    {
        return $this->belongsTo(User::class, 'fk_user_id');
    }

    public function post()
    {
        return $this->belongsTo(Post::class, 'fk_post_id');
    }

}
