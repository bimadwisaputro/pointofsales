<?php

use App\Http\Controllers\BelajarController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\RolesController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\UsersController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('login');
});


Route::get('belajar', [BelajarController::class, 'index']);
Route::get('tambah', [BelajarController::class, 'tambah']);
Route::get('kurang', [BelajarController::class, 'kurang']);

Route::post('action-tambah', [BelajarController::class, 'actionTambah']);
Route::get('login', [LoginController::class, 'login'])->name('login');
Route::post('action-login', [LoginController::class, 'actionLogin']);
Route::get('action-logout', [LoginController::class, 'logout']);

Route::group(['middleware' => 'auth'], function () {
    Route::resource('dashboard', DashboardController::class);
    Route::resource('users', UsersController::class);
    Route::resource('categories', CategoriesController::class);
    Route::resource('roles', RolesController::class);
    Route::resource('product', ProductController::class);
    Route::post('get-product', [ProductController::class, 'getproduct']);
    Route::post('insert-transaction', [TransactionController::class, 'insertTransaction']);
    Route::post('process-submit', [TransactionController::class, 'KasirProcess']);
    Route::get('print/{id}', [TransactionController::class, 'print'])->name('print');
    Route::get('kasir', [TransactionController::class, 'kasir']);
    // Route::get('get-product/{id}', [ProductController::class, 'getproduct']); //kalo page get
    Route::resource('pos', TransactionController::class);

    Route::get('laporan-penjualan', [ReportController::class, 'laporan_penjualan']);
    Route::post('laporan-penjualan-loaddata', [ReportController::class, 'laporan_penjualan_load']);
    Route::get('laporan-stokbarang', [ReportController::class, 'laporan_stokbarang']);
    Route::get('laporan-summary', [ReportController::class, 'laporan_summary']);
});
