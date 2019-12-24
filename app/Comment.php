<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = [
        'content',
        'post_id',
        'user_id'
    ];

    public function post()
    {
        return $this->belongsToMany(Post::class);
    }

    public function user()
    {
        return $this->hasMany(User::class);
    }
}
