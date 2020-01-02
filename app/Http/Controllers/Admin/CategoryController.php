<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\CategoryRequest;
use Illuminate\Support\Str;
use App\Category;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cate = Category::paginate(10);

        return view('admin.pages.cate.list', compact('cate'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::orderBy('name', 'ASC')->get();
        
        return view('admin.pages.cate.add', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryRequest $request)
    {
        $is_menu = $request->is_menu ?? '0';
        $data_cate = [
            'name' => $request->category,
            'slug' => Str::slug($request->category),
            'is_menu' => $is_menu,
            'parent_id' => $request->parent_id,
        ];
        Category::create($data_cate);

        return redirect()->route('cate.index')->with('success' , 'Add Category Successfully');
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
        $cate = Category::find($id);
        $categories = Category::orderBy('name', 'ASC')->where('id', '!=', $cate->id)->get();

        if(!$cate) {
            return '404';
        }

        return view('admin.pages.cate.edit', compact('cate', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryRequest $request, $id)
    {
        
        $is_menu = $request->is_menu ?? '0';
        $cate = Category::find($id);
        if(!$cate) {
            return '404';
        }
        $cate->update([
            'name' => $request->category,
            'slug' => Str::slug($request->category, '-'),
            'is_menu' => $is_menu,
            'parent_id' => $request->parent_id,
        ]);

        return redirect()->route('cate.index')->with('success' , 'Bạn đã sửa thành công!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cate = Category::find($id);
     
        if(!$cate) {    
            return '404';
        }
        $cate->delete();

        return back()->with('success', 'Bạn đã xóa thành công');
    }
}
