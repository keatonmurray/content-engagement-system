<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Like;
use App\Models\Comment;
use App\Models\Share;

class Post extends Model
{
    protected $fillable = ['fk_user_id', 'body'];

    public function user()
    {
        return $this->belongsTo(User::class, 'fk_user_id');
    }

    public function likes()
    {
        return $this->hasMany(Like::class, 'fk_post_id');
    }

    public function comments()
    {
        return $this->hasMany(Comment::class, 'fk_post_id');
    }

    public function shares()
    {
        return $this->hasMany(Share::class, 'fk_post_id');
    }
}
