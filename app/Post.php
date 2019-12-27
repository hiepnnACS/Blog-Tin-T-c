<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Post extends Model
{
    protected $table = 'posts';

    protected $fillable = [
        'title',
        'content',
        'image',
        'cate_id',
        'user_id',
        'publish_date',
        'slug',
    ];
    protected $appends = ['url_slug'];

    public function category()
    {
        return $this->belongsTo(Category::class, 'cate_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    /**
     * Defined Accessor
     */
    public function getUrlSlugAttribute()
    {
        return Str::slug($this->title);
    }

    public function getContentLimitAttribute()
    {
        return Str::limit(strip_tags($this->content), 200);
    }   
}
