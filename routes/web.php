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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', 'App\Http\Controllers\HomeController@index'); //home

//Order
Route::resource('orders', App\Http\Controllers\OrderController::class);

Route::get('orders/confirmation/{id}','App\Http\Controllers\OrderController@confirmation')->name('confirmation');

Route::get('/admin/dashboard', 'App\Http\Controllers\DashboardController@index'); //Dashboard

