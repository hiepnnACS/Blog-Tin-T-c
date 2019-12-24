<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        'name',
        'parent_id',
        'lever',
        'deleted_at'
    ];

    public function posts()
    {
        $this->hasMany('App\Post');
    }
    
}
