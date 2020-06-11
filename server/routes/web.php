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

Route::group(['middleware' => 'auth'], function() {
    // トップ
    Route::get('/', 'HomeController@index');

    // 会員
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

    // 管理画面
    Route::prefix('admin')->group(function () {
        // 会員
        Route::prefix('user')->group(function () {
            Route::get('aggregate', 'Admin\UserController@aggregate');
            Route::get('index', 'Admin\UserController@index');
            Route::get('create', 'Admin\UserController@create');
            Route::post('store', 'Admin\UserController@store');
            Route::get('show', 'Admin\UserController@show');
            Route::get('edit', 'Admin\UserController@edit');
        });

        // クラス
        Route::get('class', 'Admin\ClassworkController@index');

        // 店舗
        Route::get('store', 'Admin\StoreController@index');

        // カテゴリー
        Route::get('category', 'Admin\CategoryController@index');

        // お知らせ
        Route::prefix('news')->group(function () {
            Route::get('/', 'Admin\NewsController@index');
            Route::get('create', 'Admin\NewsController@create');
            Route::get('show', 'Admin\NewsController@show');
            Route::get('edit', 'Admin\NewsController@edit');
        });

        // プレミアム会員
        Route::get('premium', 'Admin\UserController@premium');
    });
});
Auth::routes();
