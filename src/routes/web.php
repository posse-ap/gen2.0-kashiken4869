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

// 管理者
Route::group(['prefix' => 'admin', 'as' => 'admin.'], function () {
      // ユーザー管理
      Route::get('/manageusers', 'UserController@index');
      // ユーザー追加
      Route::get('/adduser', 'UserController@create');
      Route::post('/adduser', 'UserController@add');
      // ユーザー編集
      Route::get('/edituser/{id}', 'UserController@edit');
      Route::post('/edituser/{id}', 'UserController@update');
      Route::get('/deleteuser/{id}', 'UserController@delete');

      // 学習コンテンツ管理
      Route::get('/managecontent', 'ContentController@index');
      // 学習コンテンツ追加
      Route::get('/addcontent', 'ContentController@create');
      Route::post('/addcontent', 'ContentController@add');
      // 学習コンテンツ編集
      Route::get('/editcontent/{id}', 'ContentController@edit');
      Route::post('/editcontent/{id}', 'ContentController@update');
      Route::get('/deletecontent/{id}', 'ContentController@delete');

      // 学習言語管理
      Route::get('/managelanguages', 'LanguageController@index');
      // 学習言語追加
      Route::get('/addlanguage', 'LanguageController@create');
      Route::post('/addlanguage', 'LanguageController@add');
      // 学習言語編集
      Route::get('/editlanguage/{id}', 'LanguageController@edit');
      Route::post('/editlanguage/{id}', 'LanguageController@update');
      Route::get('/deletelanguage/{id}', 'LanguageController@delete');
});


// ユーザー
Route::get('/top', 'WebappController@index')
      ->middleware('auth');
Route::post('/top', 'WebappController@create')->name('add_record');

Auth::routes();
Route::get('/logout', 'Auth\LoginController@logout');


Route::get('/home', 'HomeController@index')->name('home');
