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

if (config('app.env') == 'production') {
    URL::forceScheme('https');
}

Route::group(['middleware' => 'auth'], function () {
    // ホーム
    Route::get('/', 'HomeController@index');

    // 出席
    Route::prefix('attendance')->group(function () {
        Route::post('store', 'AttendanceController@store');
        Route::post('store_multiple', 'AttendanceController@storeMultiple');
    });

    // 会員
    Route::prefix('user')->group(function () {
        Route::get('/', 'UserController@index');
        Route::get('show/{user}', 'UserController@show')->middleware('can:view,user');
    });

    // ランキング
    Route::get('rank', 'UserController@rank');

    // お知らせ
    Route::prefix('news')->group(function () {
        Route::get('/', 'NewsController@index');
        Route::get('show/{news}', 'NewsController@show')->middleware('can:view,news');
    });
});

// 組織管理者以上
Route::group(['middleware' => ['auth', 'can:organization-admin-higher']], function () {
    // 管理画面
    Route::prefix('admin')->group(function () {
        // ホーム
        Route::get('/', 'Admin\UserController@rank');

        // 会員
        Route::prefix('user')->group(function () {
            Route::get('/', 'Admin\UserController@index');
            Route::get('create', 'Admin\UserController@create');
            Route::post('store', 'Admin\UserController@store');
            Route::get('show/{user}', 'Admin\UserController@show')->middleware('can:anyAdmin,user');
            Route::get('edit/{user}', 'Admin\UserController@edit')->middleware('can:anyAdmin,user');
            Route::post('update/{user}', 'Admin\UserController@update')->middleware('can:anyAdmin,user');
            Route::get('delete/{user}', 'Admin\UserController@delete')->middleware('can:anyAdmin,user');
            // 出席
            Route::prefix('attendance')->group(function () {
                Route::get('/{attendance}', 'Admin\UserController@attendanceEdit')->middleware('can:anyAdmin,attendance');
                Route::post('update/{attendance}', 'Admin\UserController@attendanceUpdate')->middleware('can:anyAdmin,attendance');
                Route::get('delete/{attendance}', 'Admin\UserController@attendanceDelete')->middleware('can:anyAdmin,attendance');
            });
        });

        // プレミアム
        Route::get('premium', 'Admin\SubscriptionController@index');
        Route::post('subscription/subscribe', 'Admin\SubscriptionController@subscribe');
        Route::post('subscription/cancel', 'Admin\SubscriptionController@cancel');

        // 店舗
        Route::prefix('store')->group(function () {
            Route::get('/', 'Admin\StoreController@index');
            Route::get('create', 'Admin\StoreController@create');
            Route::post('store', 'Admin\StoreController@store');
            Route::get('edit/{store}', 'Admin\StoreController@edit')->middleware('can:anyAdmin,store');
            Route::post('update/{store}', 'Admin\StoreController@update')->middleware('can:anyAdmin,store');
            Route::get('delete/{store}', 'Admin\StoreController@delete')->middleware('can:anyAdmin,store');
        });

        // カテゴリー
        Route::prefix('category')->group(function () {
            Route::get('/', 'Admin\CategoryController@index');
            Route::get('create', 'Admin\CategoryController@create');
            Route::post('store', 'Admin\CategoryController@store');
            Route::get('edit/{category}', 'Admin\CategoryController@edit')->middleware('can:anyAdmin,category');
            Route::post('update/{category}', 'Admin\CategoryController@update')->middleware('can:anyAdmin,category');
            Route::get('delete/{category}', 'Admin\CategoryController@delete')->middleware('can:anyAdmin,category');
        });

        // クラス
        Route::prefix('class')->group(function () {
            Route::get('/', 'Admin\ClassworkController@index');
            Route::get('create', 'Admin\ClassworkController@create');
            Route::post('store', 'Admin\ClassworkController@store');
            Route::get('edit/{classwork}', 'Admin\ClassworkController@edit')->middleware('can:anyAdmin,classwork');
            Route::post('update/{classwork}', 'Admin\ClassworkController@update')->middleware('can:anyAdmin,classwork');
            Route::get('delete/{classwork}', 'Admin\ClassworkController@delete')->middleware('can:anyAdmin,classwork');
        });

        // スケジュール
        Route::prefix('schedule')->group(function () {
            Route::get('/', 'Admin\ScheduleController@index');
            Route::get('create', 'Admin\ScheduleController@create');
            Route::post('store', 'Admin\ScheduleController@store');
            Route::get('edit/{schedule}', 'Admin\ScheduleController@edit')->middleware('can:anyAdmin,schedule');
            Route::post('update/{schedule}', 'Admin\ScheduleController@update')->middleware('can:anyAdmin,schedule');
            Route::get('delete/{schedule}', 'Admin\ScheduleController@delete')->middleware('can:anyAdmin,schedule');
        });

        // お知らせ
        Route::prefix('news')->group(function () {
            Route::get('/', 'Admin\NewsController@index');
            Route::get('create', 'Admin\NewsController@create');
            Route::post('store', 'Admin\NewsController@store');
            Route::get('show/{news}', 'Admin\NewsController@show')->middleware('can:anyAdmin,news');
            Route::get('edit/{news}', 'Admin\NewsController@edit')->middleware('can:anyAdmin,news');
            Route::post('update/{news}', 'Admin\NewsController@update')->middleware('can:anyAdmin,news');
            Route::get('delete/{news}', 'Admin\NewsController@delete')->middleware('can:anyAdmin,news');
        });
    });
});

Auth::routes([
    'register' => false,
    'verify' => false,
    'confirm' => false
]);
Route::get('guest', 'Auth\LoginController@guestLogin')->name('guest.login');
