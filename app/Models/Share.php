<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Share extends Model
{
    protected $fillable = [
        'fk_post_id', 
        'fk_user_id',
        'share_count',
        'body',
        'image',
    ];

    public function posts()
    {
        return $this->belongsTo(Post::class, 'fk_post_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'fk_user_id');
    }

    public function likes()
    {
        return $this->hasMany(Like::class, 'fk_like_id', 'fk_post_id');
    }
}
