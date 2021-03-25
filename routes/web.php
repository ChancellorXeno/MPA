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

Route::get('/register', [
    'uses' => 'App\Http\Controllers\UserController@getRegister',
    'as' => 'user.register'
]);
Route::post('/register', [
    'uses' => 'App\Http\Controllers\UserController@postRegister',
    'as' => 'user.register'
]);
Route::get('/login', [
    'uses' => 'App\Http\Controllers\UserController@getLogin',
    'as' => 'user.login'
]);
Route::post('/login', [
    'uses' => 'App\Http\Controllers\UserController@postLogin',
    'as' => 'user.login'
]);
Route::get('/logout', [
    'uses' => 'App\Http\Controllers\UserController@logout',
    'as' => 'user.logout'
]);

Route::get('/products-page/all', 'App\Http\Controllers\CategoryController@getAll');
Route::get('/products-page/{category}', 'App\Http\Controllers\CategoryController@index')->name('productspage');

Route::get('/product/{id}', [
    'uses' => 'App\Http\Controllers\CategoryController@getOne',
    'as' => 'product.product'
]);

Route::get('/cart', [
    'uses' => 'App\Http\Controllers\CartController@index',
    'as' => 'product.shoppingCart'
]);
Route::get('/add-to-cart/{id}', [
    'uses' => 'App\Http\Controllers\CartController@Store',
    'as' => 'product.addToCart'
]);
Route::get('/decrease/{id}', [
    'uses' => 'App\Http\Controllers\CartController@Decrease',
    'as' => 'product.decrease'
]);
Route::get('/remove-from-cart/{id}', [
    'uses' => 'App\Http\Controllers\CartController@Destroy',
    'as' => 'product.destroy'
]);
Route::get('/checkout', [
    'uses' => 'App\Http\Controllers\CartController@Checkout',
    'as' => 'cart.checkout'
]);

Route::get('/history', [
    'uses' => 'App\Http\Controllers\userController@History',
    'as' => 'user.history'
]);