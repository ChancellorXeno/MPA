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
Route::get('/cart', function () {
    return view('cart');
});
Route::get('/products-page', function () {
    return view('products-page');
});

Route::get('/products-page/{color}', 'App\Http\Controllers\CategoryController@show');

Route::get('/welcome', function () {
    return view('welcome');
});