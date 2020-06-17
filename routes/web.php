<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/','Client\HomeController@index')->name('home');

Route::get('/category/{id}', 'Client\CategoryController@index')->name('client.cate');

Auth::routes();

Route::get('/home', 'HomeController@index');
Route::get('/test', function () {
   return view('client.index');
});
