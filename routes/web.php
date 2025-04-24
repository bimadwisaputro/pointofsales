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

Route::get('login', [LoginController::class, 'login']);
Route::post('action-login', [LoginController::class, 'actionLogin']);
Route::get('action-logout', [LoginController::class, 'logout']);

Route::middleware(['checkAuth'])->group(
    function () {
        Route::resource('dashboard', DashboardController::class);
    }
);

Route::middleware(['checkAuth', 'role:Administrator,Kasir'])->group(
    function () {
        Route::resource('product', ProductController::class);
        Route::post('get-product', [ProductController::class, 'getproduct']);
    }
);
Route::middleware(['checkAuth', 'role:Administrator'])->group(
    function () {
        Route::resource('users', UsersController::class);
        Route::resource('categories', CategoriesController::class);
        Route::resource('roles', RolesController::class);
    }
);
Route::middleware(['checkAuth', 'role:Kasir'])->group(
    function () {
        Route::resource('pos', TransactionController::class);
        Route::post('insert-transaction', [TransactionController::class, 'insertTransaction']);
        Route::post('process-submit', [TransactionController::class, 'KasirProcess']);
        Route::get('kasir', [TransactionController::class, 'kasir']);
        Route::get('print/{id}', [TransactionController::class, 'print'])->name('print');
    }
);
Route::middleware(['checkAuth', 'role:Pimpinan'])->group(
    function () {
        Route::get('laporan-penjualan', [ReportController::class, 'laporan_penjualan']);
        Route::post('laporan-penjualan', [ReportController::class, 'laporan_penjualan_load']);
        Route::get('laporan-stokbarang', [ReportController::class, 'laporan_stokbarang']);
        Route::post('laporan-stokbarang', [ReportController::class, 'laporan_stokbarang_load']);
        Route::get('laporan-summary', [ReportController::class, 'laporan_summary']);
        Route::post('laporan-summary', [ReportController::class, 'laporan_summary_load']);
    }
);


// Route::group(['middleware' => 'checkAuth'], function () {
//     Route::resource('dashboard', DashboardController::class);
//     Route::resource('users', UsersController::class);
//     Route::resource('categories', CategoriesController::class);
//     Route::resource('roles', RolesController::class);
//     Route::resource('product', ProductController::class);
//     Route::post('get-product', [ProductController::class, 'getproduct']);
//     Route::post('insert-transaction', [TransactionController::class, 'insertTransaction']);
//     Route::post('process-submit', [TransactionController::class, 'KasirProcess']);
//     Route::get('print/{id}', [TransactionController::class, 'print'])->name('print');
//     Route::get('kasir', [TransactionController::class, 'kasir']);
//     // Route::get('get-product/{id}', [ProductController::class, 'getproduct']); //kalo page get
//     Route::resource('pos', TransactionController::class);

//     Route::get('laporan-penjualan', [ReportController::class, 'laporan_penjualan']);
//     Route::post('laporan-penjualan-loaddata', [ReportController::class, 'laporan_penjualan_load']);
//     Route::get('laporan-stokbarang', [ReportController::class, 'laporan_stokbarang']);
//     Route::get('laporan-summary', [ReportController::class, 'laporan_summary']);
// });
