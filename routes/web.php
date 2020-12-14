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
    return view('welcome');
});

Route::group(['prefix' => 'admin', 'middleware' => 'auth'],function(){
    Route::get('news/create', 'Admin\NewsController@add')->middleware('auth');
    //PHP｜Laravel 12 ユーザー認証 課題２・３(->middleware('auth'))を追記
    Route::get('profile/create', 'Admin\ProfileController@add')->middleware('auth');
    Route::get('profile/edit', 'Admin\ProfileController@edit')->middleware('auth');
     //Laravel１３のRoutingを編集の追記分
    Route::post('news/create', 'Admin\NewsController@create'); # 追記部分
    //Laravel13  ニュース投稿画面を作成しよう  課題３
    Route::post('profile/create','Admin\ProfileController@create');
    //Laravel１３   課題６
    Route::post('profile/edit','Admin\ProfileController@update');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
