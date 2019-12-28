<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CategoryRequest;
use Illuminate\Support\Str;
use App\Category;

class CategoryController extends Controller
{
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
        return view('admin.pages.cate.add');
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
            'is_menu' => $is_menu
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

        if(!$cate) {
            return '404';
        }

        return view('admin.pages.cate.edit', compact('cate'));
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
        ]);

        return redirect()->route('cate.index')->with('success' , 'Ban da sua thanh cong');
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

        return back()->with('success', 'Ban da xoa thanh cong');
    }
}
