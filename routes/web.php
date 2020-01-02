<?php


// Route::get('/', function () {
//     return view('admin.pages.index');
// });
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/{slugPost}', 'HomeController@detailPost')->name('post.detail');
Route::get('/cate/{slugCate}', 'HomeController@listPostCategory')->name('post.cate');
Route::post('/comment/{idPost}', 'HomeController@Comment')->name('post.comment');

Route::get('/home/checksubmenu', 'HomeController@subMenu');

Route::group(['namespace' => 'Admin'], function() {
    Route::resource('admin/cate', 'CategoryController');
    Route::resource('admin/post', 'PostController');
    Route::resource('admin/user', 'UserController');
    Route::resource('admin/role', 'RoleController');
    Route::resource('admin/permission', 'PermissionController');

    Route::get('admin/admin-login', 'Auth\LoginController@showLoginForm')->name('admin.login');
    Route::post('admin/admin-login', 'Auth\LoginController@login');
});
