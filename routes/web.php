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

Auth::routes(['register' => false,]);

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/customer/add', 'CustomerController@add')->name('customer.add');
Route::post('/customer/add', 'CustomerController@create')->name('customer.create');
Route::get('/customer/edit/{id}', 'CustomerController@edit')->name('customer.edit');
Route::post('/customer/edit/{id}', 'CustomerController@update')->name('customer.edit');