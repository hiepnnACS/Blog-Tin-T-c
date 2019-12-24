<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('client.pages.index');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// use App\User;
// Route::get('/insert', function() {
//     User::create([
//         'name' => 'hiep',
//         'email' => 'hiepg198@gmail.com',
//         'password' => Hash::make('123456'),
//     ]);
// });