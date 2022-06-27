<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Route::get('/webapp', 'GraphController@languages');
Route::get('/webapp', 'WebappController@languages');
Route::get('/webapp', 'WebappController@index');
Route::post('/webapp', 'WebappController@index');
Route::get('/webapp', 'WebappController@index')
      ->middleware('auth');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');




Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
