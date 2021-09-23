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

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/form', [App\Http\Controllers\FrontController::class, 'form'])->name('form');

Route::get('/test', [App\Http\Controllers\FrontController::class, 'test'])->name('test');

Route::group(['middleware' => 'admin','middleware' => 'auth','prefix' => 'admin'], function(){

	Route::get('/', [App\Http\Controllers\backend\AdminController::class, 'index'])->name('admin');
	Route::resource('profile', App\Http\Controllers\backend\ProfileController::class);
	Route::get('get-pages', [App\Http\Controllers\backend\PageController::class, 'getPages'])->name('get-pages');
	Route::resource('pages', App\Http\Controllers\backend\PageController::class);
	Route::resource('service', App\Http\Controllers\backend\ServiceController::class);

});



