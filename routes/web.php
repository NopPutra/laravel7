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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


// https://www.youtube.com/watch?v=yQHCTD1ML18&list=PLIeKz8l1eVaP4A4rN129dUqKhBAeBvN3z&index=3
Route::resource('/orders', 'OrderController');   // orders index

Route::resource('/products', 'ProductController');

Route::resource('/supplires', 'SupplireController');

Route::resource('/users', 'UserController');

Route::resource('/companies', 'CompanyController');

Route::resource('/transactions', 'TransactionController');
