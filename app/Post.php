<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'title',
        'content',
        'short_desc', 
        'image', 
        'slug', 
        'highlight', 
        'views', 
        'status', 
        'cate_id',
        'user_id'
    ];

    public function category()
    {
        return $this->belongsToMany(Category::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
