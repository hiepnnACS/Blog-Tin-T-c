<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\PostRequest;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Auth;
use App\Post;
use Helper;
use App\Category;

class PostController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $pagesize = $request->pagesize == null ? 10 : $request->pagesize;

        $fullUrl = $request->fullUrl();

        $keyword = $request->keyword;

        $addPath = "";

        if(!$keyword) {
            $post = Post::latest()->with('category')->paginate($pagesize);
            $addPath .= "?pagesize=$pagesize";
        } else {
            $post = Post::latest()
                        ->where('title', 'like', "%$keyword%")
                        ->orWhereHas('category', function($query) use ($keyword) {
                            $query->where('name', 'like', "%$keyword%");
                        })
                        ->paginate($pagesize);
            $addPath .= "?keyword=$keyword&pagesize=$pagesize";
        }

        return view('admin.pages.post.list', compact('post', 'keyword'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(Auth::user()->can('posts.create')) {
            $categories = Category::orderBy('name', 'ASC')->with('categories')->get();

             return view('admin.pages.post.add', compact('categories'));
        } 
        return view('err.403');
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostRequest $request)
    {   $status = $request->status == 1 ? $request->status : '0';
        $data_post = [
            'title' => $request->title,
            'content' => $request->content,
            'slug' => Str::slug($request->title),
            'publish_date' => date('Y-m-d H:i:s'),
            'user_id' => Auth::id(),
            'cate_id' => $request->cate_id,
            'status' => $status,
        ];
        $path = 'img/upload/post';

        if($request->hasFile('image')) {
            $img = $request->file('image');
            $img_post = Helper::checkImage($img, $path);

            $data_post['image'] = $img_post;
        } 
        
        Post::create($data_post);

        return redirect()->route('post.index')->with('success', 'Add Post Successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if(Auth::user()->can('posts.update')) {

            $post = Post::with('category')->findOrFail($id);
            $cate = Category::orderBy('name', 'ASC')->get();
            return view('admin.pages.post.edit', compact('post', 'cate'));
        }

        return view('err.403');

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PostRequest $request, $id)
    {
        if(Auth::user()->can('posts.update')) {

            $post = Post::findOrFail($id);
            $status = $request->status == 1 ? $request->status : 0;

            $attrubutes = [
                'title' => $request->title,
                'content' => $request->content,
                'cate_id' => $request->category,
                'slug' => Str::slug($request->title),
                'publish_date' => date('Y-m-d H:i:s'),
                'user_id' => Auth::id(),
                'status' => $status,
            ];

            $path = 'img/upload/post';
            if($request->hasFile('image')) {
                $img_post = Helper::checkImage($request->file('image'), $path);
                $attrubutes['image'] = $img_post;
            } 

            $post->update($attrubutes);

            return redirect(route('post.index'))->with('success' , 'Edit Posts Successfully');
        }

        return view('err.403');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(Auth::user()->can('posts.delete')) {

             $post = Post::findOrFail($id)->delete();

            if($post) {
                return response(['success' => 'Delete Post Successfully']);
            } 
            return response(['error' => 'Delete fail']);
        }

        return view('err.403');
    }
}
