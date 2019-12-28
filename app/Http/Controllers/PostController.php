<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\PostRequest;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Auth;
use App\Post;
use Helper;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $post = Post::with('category')->paginate(10);

        return view('admin.pages.post.list', compact('post'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('admin.pages.post.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostRequest $request)
    {   
        $data_post = [
            'title' => $request->title,
            'content' => $request->content,
            'cate_id' => $request->category,
            'slug' => Str::slug($request->title),
            'publish_date' => date('Y-m-d H:i:s'),
            'user_id' => Auth::id(),
        ];
        $path = 'img/upload/post';

        if($request->hasFile('image')) {
            $img = $request->file('image');
            $img_post = Helper::checkImage($img, $path);

            $data_post['image'] = $img_post;
        } 
        
    
        Post::create($data_post);

        return redirect()->route('post.index')->with('success', 'Them post thanh cong');
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
        $post = Post::findOrFail($id);

        return view('admin.pages.post.edit', compact('post'));
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
        $post = Post::findOrFail($id);

        $attrubutes = [
            'title' => $request->title,
            'content' => $request->content,
            'cate_id' => $request->category,
            'slug' => Str::slug($request->title),
            'publish_date' => date('Y-m-d H:i:s'),
            'user_id' => Auth::id(),
        ];

        $path = 'img/upload/post';
        if($request->hasFile('image')) {
            $img_post = Helper::checkImage($request->file('image'), $path);
            $attrubutes['image'] = $img_post;
        } 

        $post->update($attrubutes);

        return redirect()->route('post.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::findOrFail($id)->delete();

        if($post) {
            return response(['success' => 'Delete Successfully']);
        } 
        return response(['error' => 'Delete fail']);
    }
}
