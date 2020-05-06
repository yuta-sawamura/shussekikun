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

// トップ
Route::get('/', 'HomeController@index');

// ユーザー
Route::prefix('user')->group(function() {
    Route::get('/', 'UserController@index');
    Route::get('show', 'UserController@show');
    Route::view('login', 'user.login');
    Route::view('reset_pass', 'user.reset_pass');
});

// ランキング
Route::get('rank', 'UserController@rank');

// お知らせ
Route::prefix('news')->group(function() {
    Route::get('/', 'NewsController@index');
    Route::get('show', 'NewsController@show');
});
