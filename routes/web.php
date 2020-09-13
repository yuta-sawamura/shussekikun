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
        Route::get('show/{id}', 'UserController@show');
    });

    // ランキング
    Route::get('rank', 'UserController@rank');

    // お知らせ
    Route::prefix('news')->group(function () {
        Route::get('/', 'NewsController@index');
        Route::get('show/{id}', 'NewsController@show');
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
            Route::get('show/{id}', 'Admin\UserController@show');
            Route::get('edit/{id}', 'Admin\UserController@edit');
            Route::post('update/{id}', 'Admin\UserController@update');
            Route::post('delete/{id}', 'Admin\UserController@delete');
        });

        // 出席
        Route::prefix('attendance')->group(function () {
            Route::post('update/{id}', 'Admin\AttendanceController@update');
            Route::post('delete/{id}', 'Admin\AttendanceController@delete');
        });

        // プレミアム
        Route::get('premium', 'Admin\SubscriptionController@index');
        Route::post('subscription/subscribe', 'Admin\SubscriptionController@subscribe');
        Route::post('subscription/cancel', 'Admin\SubscriptionController@cancel');

        // 店舗
        Route::prefix('store')->group(function () {
            Route::get('/', 'Admin\StoreController@index');
            Route::post('store', 'Admin\StoreController@store');
            Route::post('update/{id}', 'Admin\StoreController@update');
            Route::post('delete/{id}', 'Admin\StoreController@delete');
        });

        // カテゴリー
        Route::prefix('category')->group(function () {
            Route::get('/', 'Admin\CategoryController@index');
            Route::post('store', 'Admin\CategoryController@store');
            Route::post('update/{id}', 'Admin\CategoryController@update');
            Route::post('delete/{id}', 'Admin\CategoryController@delete');
        });

        // クラス
        Route::prefix('class')->group(function () {
            Route::get('/', 'Admin\ClassworkController@index');
            Route::post('store', 'Admin\ClassworkController@store');
            Route::post('update/{id}', 'Admin\ClassworkController@update');
            Route::post('delete/{id}', 'Admin\ClassworkController@delete');
        });

        // スケジュール
        Route::prefix('schedule')->group(function () {
            Route::get('/', 'Admin\ScheduleController@index');
            Route::post('store', 'Admin\ScheduleController@store');
            Route::post('update/{id}', 'Admin\ScheduleController@update');
            Route::post('delete/{id}', 'Admin\ScheduleController@delete');
        });

        // お知らせ
        Route::prefix('news')->group(function () {
            Route::get('/', 'Admin\NewsController@index');
            Route::get('create', 'Admin\NewsController@create');
            Route::post('store', 'Admin\NewsController@store');
            Route::get('show/{id}', 'Admin\NewsController@show');
            Route::get('edit/{id}', 'Admin\NewsController@edit');
            Route::post('update/{id}', 'Admin\NewsController@update');
            Route::post('delete/{id}', 'Admin\NewsController@delete');
        });
    });
});

Auth::routes([
    'register' => false,
    'verify' => false,
    'confirm' => false
]);
