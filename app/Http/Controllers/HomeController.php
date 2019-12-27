<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CommentRequest;
use App\Post;
use App\Category;
use App\Comment;
use Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'detailPost', 'listPostCategory']]);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $data_product = Post::latest()->with('category', 'user')->paginate(10);
        
        return view('home', compact('data_product'));
    }

    /**
     * Show post and comment
     */
    public function detailPost($slugPost)
    {        
        $post = Post::with('comments.user')->where('slug', $slugPost)->first();
        $post->increment("views");

        return view('client.pages.detailPost', compact('post'));
    }

    /**
     * Get list post by 1 Category
     */
    public function listPostCategory($slugCate) 
    {
        $listPost = Post::with('category', 'user')
                        ->whereHas('category', function ($query) use ($slugCate) {
                            $query->where('categories.slug','like', $slugCate);
                        })->paginate(10);

        return view('client.pages.list-post-category', compact('listPost'));
    }

    /**
     * Save comment by id
     */
    public function Comment(CommentRequest $request, $idPost)
    {
        $id_user = Auth::id();

        $content = $request->comment;

        Comment::create([
            'content' => $content,
            'user_id' => $id_user,
            'post_id' => $idPost
        ]);

        return back();
    }
}
