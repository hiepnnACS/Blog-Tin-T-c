<?php


// Route::get('/', function () {
//     return view('admin.pages.index');
// });

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/{slugPost}', 'HomeController@detailPost')->name('post.detail');
Route::get('/cate/{slugCate}', 'HomeController@listPostCategory')->name('post.cate');
Route::post('/comment/{idPost}', 'HomeController@Comment')->name('post.comment');

// Route::get('admin', function() {
//     return view('admin.master');
// })
