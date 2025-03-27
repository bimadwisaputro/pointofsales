<?php

use App\Http\Controllers\BelajarController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UsersController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('login');
});
Route::post('action-login', [LoginController::class, 'login']);
Route::get('action-logout', [LoginController::class, 'logout']);
Route::get('login', [LoginController::class, 'index'])->name('login');

//Belajar
Route::get('belajar', [BelajarController::class, 'index']);
Route::get('tambah', [BelajarController::class, 'tambah']);
Route::get('kurang', [BelajarController::class, 'kurang']);
Route::get('kali', [BelajarController::class, 'kali']);
Route::get('bagi', [BelajarController::class, 'bagi']);

Route::post('action-operator', [BelajarController::class, 'actionOperator']);

//Login

//dashboard
//resource = get ,post, put, delete
Route::group(['middleware' => 'auth'], function () {
    Route::resource('dashboard', DashboardController::class);
    Route::resource('categories', CategoriesController::class);
    Route::resource('users', UsersController::class);
});
