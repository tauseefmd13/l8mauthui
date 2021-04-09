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

/* ----------------------- Admin Routes START -------------------------------- */
Route::group(['prefix'=>'admin'], function() {

	Route::group(['middleware'=>'admin.guest'], function() {
		Route::get('/login', [App\Http\Controllers\Admin\AuthController::class, 'index'])->name('admin.login');
		Route::post('/login', [App\Http\Controllers\Admin\AuthController::class, 'login'])->name('admin.login');
	});

	Route::group(['middleware'=>'admin.auth'], function() {
		Route::get('/dashboard', [App\Http\Controllers\Admin\HomeController::class, 'index'])->name('admin.dashboard');
		Route::post('/logout', [App\Http\Controllers\Admin\AuthController::class, 'logout'])->name('admin.logout');
	});

});
/* ----------------------- Admin Routes END -------------------------------- */