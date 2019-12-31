<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories';
    protected $fillable = [
        'name',
        'slug',
        'parent_id',
        'is_menu'
    ];

    public function posts()
    {
        return $this->hasMany(Post::class, 'cate_id', 'id');
    }

    public function categories()
    {
        return $this->hasMany(Category::class, 'parent_id', 'id');
    }

    public function childrenCategory()
    {
        return $this->hasMany(Category::class, 'parent_id', 'id');
    }

    public function getShowMenuAttribute() {
        return $this->is_menu == 1 ? 'Hiển Thị' : 'Không ';
    }
    
}
