<?php


Route::resource('/cate', 'CategoryController', [
    'middleware' => 'auth'
]);
Route::resource('/post', 'PostController', [
    'middleware' => 'auth'
]);