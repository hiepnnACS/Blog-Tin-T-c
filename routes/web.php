<?php

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/{slugPost}', 'HomeController@detailPost')->name('post.detail');

Route::get('/cate/{slugCate}', 'HomeController@listPostCategory')->name('post.cate');

Route::post('/comment/{idPost}', 'HomeController@Comment')->name('post.comment')->middleware('auth');

Route::get('/home/checksubmenu', 'HomeController@subMenu');

Route::get('logout', 'HomeController@logout')->name('logout');

Route::get('callback/facebook', 'HomeController@handelProviderCallback');

Route::get('/login/facebook', 'HomeController@redirectProvider')->name('login.social');

// Admin
Route::group(['namespace' => 'Admin', 'prefix' => 'admin'], function() {
	Route::get('/dashboard', 'DashboardController@index')->name('admin.home');

    Route::resource('/cate', 'CategoryController');

    Route::resource('/post', 'PostController');

    Route::resource('/user', 'UserController');

    Route::resource('/role', 'RoleController');

    Route::resource('/permission', 'PermissionController');

    Route::get('/admin-login', 'Auth\LoginController@showLoginForm')->name('admin.login');
    Route::post('/admin-login', 'Auth\LoginController@login');
    Route::get('/logout', 'Auth\LoginController@logout');
});
