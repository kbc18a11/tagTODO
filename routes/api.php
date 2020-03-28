<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group(['middleware' => ['api']], function () {
    //ユーザー登録
    Route::post('/createuser', 'UsersController@create');
    //ユーザー情報の更新
    Route::post('/updateuser', 'UsersController@update');

    //ログイン
    Route::post('/login', 'Auth\AuthController@login');

    //トップページ
    Route::get('/', function () {
        return response()->json('go_top');
    })->name('login');

    //認証必須
    Route::group(['middleware' => ['jwt.auth']], function () {
        Route::post('/logout', 'Auth\AuthController@logout');
        Route::post('/refresh', 'Auth\AuthController@refresh');
        Route::post('/me', 'Auth\AuthController@me');
    });
});

Route::group([

    'middleware' => 'api',
    'prefix' => 'auth'

], function ($router) {
});
