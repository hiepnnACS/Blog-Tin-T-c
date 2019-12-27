<?php
namespace App\Events;

use App\Post;

class ViewPostHandler
{
    public function handle(Post $post)
    {
        $post->increment('views');
    }
}