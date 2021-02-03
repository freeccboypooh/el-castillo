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

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
//
Route::get('/user', [App\Http\Controllers\HomeController::class, 'getUser'])->name('user');
//
Route::get('/moderador', [App\Http\Controllers\ModeradorController::class, 'index'])->name('moderador');
//
Route::get('/superAdmin', [App\Http\Controllers\SuperController::class, 'index'])->name('super');


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
