<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PanelController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BabysitterController;
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
})->name('index');

Route::get('/panel', [PanelController::class, 'index'])->name('panel');
Route::get('/getRole/{id}', [PanelController::class, 'getRole'])->name('getRole');

Auth::routes();
Route::get('/logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');
Route::delete('/delete/user/{id}', [UserController::class, 'delete'])->name('delete.user');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Babysitter
Route::post('/store-babysitter', [App\Http\Controllers\BabysitterController::class, 'store'])->name('store-babysitter');
Route::get('/create-babysitter', function () {return view('/babysitter/create');});