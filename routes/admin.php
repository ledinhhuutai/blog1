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

Route::get('/','Admin\HomepageController@index');

/* Products */
Route::prefix('/products')->group(function () {
    $ctr = "Admin\ProductController@";
    Route::get('/', $ctr . 'index')->name('products.list');
    Route::get('/create', $ctr . 'create')->name('products.create');
    Route::post('/create', $ctr . 'saveCreate')->name('products.create');
    Route::get('/edit/{id}', $ctr . 'edit')->where('id', '[0-9]+')->name('products.edit');
    Route::post('/edit/{id}', $ctr . 'saveEdit')->where('id','[0-9]+')->name('products.edit');;
});
