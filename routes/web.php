<?php


// Route::get('/', function () {
//     return view('admin.pages.index');
// });
define('LEVEL', 0);
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/{slugPost}', 'HomeController@detailPost')->name('post.detail');
Route::get('/cate/{slugCate}', 'HomeController@listPostCategory')->name('post.cate');
Route::post('/comment/{idPost}', 'HomeController@Comment')->name('post.comment');

Route::get('/home/checksubmenu', 'HomeController@subMenu');

