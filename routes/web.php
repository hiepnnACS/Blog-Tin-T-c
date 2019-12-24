<?php


Route::get('/', function () {
    return view('client.pages.index');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/{slugPost}', 'HomeController@detailPost')->name('post.detail');
Route::get('/cate/{slugCate}', 'HomeController@listPostCategory')->name('post.cate');
