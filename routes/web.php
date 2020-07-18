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
   return view('client.layouts.master');
});

Route::get('/cart', 'Client\CartController@cart')->name('cart');
Route::get('/add-to-cart/{id}', 'Client\CartController@addToCard')->name('addCart')->middleware('auth');
Route::delete('/delete-from-cart', 'Client\CartController@delete')->name('delete.item');
Route::patch('/update-from-cart','Client\CartController@update')->name('update.item');
Route::get('/delcart', function (){
    session()->flush();
});
Route::get('cartd', function () {
   $arr = session()->get('cart');
   dd($arr);
});
