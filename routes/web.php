<?php

use App\Http\Controllers\BelajarController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('login');
});

//Belajar
Route::get('belajar', [BelajarController::class, 'index']);
Route::get('tambah', [BelajarController::class, 'tambah']);
Route::get('kurang', [BelajarController::class, 'kurang']);
Route::get('kali', [BelajarController::class, 'kali']);
Route::get('bagi', [BelajarController::class, 'bagi']);

Route::post('action-operator', [BelajarController::class, 'actionOperator']);

//Login
Route::get('login', [LoginController::class, 'index']);
Route::post('action-login', [LoginController::class, 'login']);

//dashboard
Route::get('dashboard', [DashboardController::class, 'index']);
