<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CommentRequest;
use App\Post;
use App\Category;
use App\Comment;
use App\User;
use Auth;
use Socialite;

class HomeController extends Controller
{
    
    public function redirectProvider()
    {
        return Socialite::driver('facebook')->redirect();
    }

    public function handelProviderCallback()
    {
        $user = Socialite::driver('facebook')->user();

        $authUser = $this->findOrCreateUser($user);
        Auth::login($authUser);
        return redirect('/home');
    }

    /**
     * nếu chưa tồn tại tài khoản thì tạo mới
     */
    private function findOrCreateUser($user)
    {
        $authUser = User::where('social_id', $user->id)->first();
        if($authUser) {
            return $authUser;
        } else {
            return User::create([
                'name' => $user->name,
                'email' => $user->email,
                'password' => '',
                'social_id' => $user->id,
                'status' => 0,
            ]);
        }
    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $data_posts = Post::latest()->with('category', 'user')
                        ->where('status', 1)
                        ->paginate(10);

        $highlight_post = Post::where('status', 1)
                         ->orderBy('views', 'DESC')
                         ->with('category', 'user')
                         ->limit(3)
                         ->get();
        
        return view('home', compact('data_posts', 'highlight_post'));
    }

    /**
     * Show post and comment
     */
    public function detailPost($slugPost)
    {        
        $post = Post::with('comments.user')
                ->where('slug', $slugPost)
                ->where('status', 1)
                ->first();
        $post->increment("views");

        return view('client.pages.detailPost', compact('post'));
    }

    /**
     * Get list post by 1 Category
     */
    public function listPostCategory($slugCate) 
    {
        $listPost = Post::with('category', 'user')
                        ->where('status', 1)
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

    public function subMenu()
    {
        $category = Category::whereNull('parent_id')
                    ->with('childrenCategory')
                    ->get();
        return view('test', compact('category'));
    }
}
