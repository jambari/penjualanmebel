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

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';


Route::get('/', 'App\Http\Controllers\HomeController@index'); //home
Route::get('/dashboard', 'App\Http\Controllers\HomeController@dashboard')->middleware(['auth'])->name('dashboard'); //home

//Order
Route::resource('orders', App\Http\Controllers\OrderController::class);

Route::get('orders/confirmation/{id}','App\Http\Controllers\OrderController@confirmation')->name('confirmation');

Route::get('/admin/dashboard', 'App\Http\Controllers\DashboardController@index'); //Dashboard
