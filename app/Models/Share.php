<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Share extends Model
{
    protected $fillable = ['fk_post_id', 'fk_share_count'];

    public function posts()
    {
        return $this->belongsTo(Post::class, 'fk_post_id');
    }
}
