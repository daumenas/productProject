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

/*Route::get('/', function () {
    return view('welcome');
});
*/

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => ['auth']], function () {
    Route::get('/', 'ProductController@index')->name('productTable');
    Route::get('edit-product/{id}', 'ProductController@editProduct')->name('edit-product');
    Route::post('update-product/{id}/save', 'ProductController@edit')->name('update-product');
    Route::get('delete-product/{id}', 'ProductController@delete')->name('delete-product');
    Route::get('deleted-products', 'ProductController@indexDeleted')->name('deletedProducts');
    Route::get('bar-chart/{id}', 'ProductController@createPriceChart')->name('barChart');
    Route::get('quantity-chart/{id}', 'ProductController@createQuantityChart')->name('quantityChart');
    Route::get('more-info-product/{id}', 'ProductController@displayProduct')->name('more-info-product');
});