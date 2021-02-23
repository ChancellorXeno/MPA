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

Route::get('/', function () {
    return view('index');
});
Route::get('/home', function () {
    return view('index');
});

Route::get('/products-page/{category}', 'App\Http\Controllers\CategoryController@index');
Route::get('/cart', 'App\Http\Controllers\CartController@index');

// test in progress
Route::get('/add-to-cart/{id}', 'App\Http\Controllers\CartController@store');

Route::get('/quantity-up/{id}', 'App\Http\Controllers\CartController@increase');
Route::get('/quantity-down/{id}', 'App\Http\Controllers\CartController@decrease');
