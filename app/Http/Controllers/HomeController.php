<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Category;
use App\Comment;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $data_product = Post::with('category', 'user')->paginate(10);
        
        return view('home', compact('data_product'));
    }

    public function detailPost($slugPost)
    {        
        $post = Post::with('comments.user')->where('slug', $slugPost)->first();
    
        return view('client.pages.detailPost', compact('post'));

    }

    public function listPostCategory($slugCate) 
    {
        $listPost = Category::where('slug', $slugCate)->with('posts')->get();

        dd($listPost);
    }

    
}
