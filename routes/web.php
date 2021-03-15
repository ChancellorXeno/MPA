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
})->name('home');

Route::get('/register', 'App\Http\Controllers\UserController@getRegister');
Route::get('/login', 'App\Http\Controllers\UserController@getLogin');

Route::get('/products-page/{category}', 'App\Http\Controllers\CategoryController@index')->name('productspage');
Route::get('/cart', [
    'uses' => 'App\Http\Controllers\CartController@index',
    'as' => 'color.shoppingCart'
]);

// test in progress
Route::get('/add-to-cart/{id}', [
    'uses' => 'App\Http\Controllers\CartController@Store',
    'as' => 'color.addToCart'
]);

Route::get('/quantity-up/{id}', 'App\Http\Controllers\CartController@increase');
Route::get('/quantity-down/{id}', 'App\Http\Controllers\CartController@decrease');
