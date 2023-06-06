<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

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

Route::get('/', [\App\Http\Controllers\Controller::class, 'create'])->name('dashboard');
Route::get('/login', [\App\Http\Controllers\SessionController::class, 'create'])->name('sessCreate');
Route::post('/login', [\App\Http\Controllers\SessionController::class, 'store'])->name('sessStore');
Route::get('/logout', [\App\Http\Controllers\SessionController::class, 'destroy'])->name('sessDestroy');

Route::prefix('/admin')->group(function () {
    Route::get('/', [\App\Http\Controllers\AdminController::class, 'create'])->name('adminCreate');
    Route::prefix('/mobil')->group(function () {
        Route::get('/', [\App\Http\Controllers\AdminController::class, 'carmgmt'])->name('adminCreateMobil');
        Route::patch('/', [\App\Http\Controllers\AdminController::class, 'carup'])->name('adminPatchMobil');
        Route::delete('/', [\App\Http\Controllers\AdminController::class, 'cardel'])->name('adminDelMobil');
        Route::post('/', [\App\Http\Controllers\AdminController::class, 'caradd'])->name('adminAddMobil');
    });
    Route::prefix('/pesanan')->group(function () {
        Route::get('/', [\App\Http\Controllers\AdminController::class, 'ordermgmt'])->name('adminCreatePesanan');
        Route::post('/order', [\App\Http\Controllers\AdminController::class, 'orderorder'])->name('adminEditPesanan');
    });
    Route::prefix('/cek')->group(function () {
        Route::get('/', [\App\Http\Controllers\AdminController::class, 'cekmgmt'])->name('adminCreateCek');
        Route::post('/', [\App\Http\Controllers\AdminController::class, 'cekorder'])->name('adminPesananCek');
    });
});

Route::prefix('/mobil')->group(function () {
    Route::get('/', [\App\Http\Controllers\CarController::class, 'create'])->name('carView');
    Route::post('/', [\App\Http\Controllers\CarController::class, 'store'])->name('carRent');
});

Route::prefix('/user')->group(function () {
    Route::get('/register', [\App\Http\Controllers\RegisterController::class, 'create'])->name('regsCreate');
    Route::post('/register', [\App\Http\Controllers\RegisterController::class, 'store'])->name('regsStore');



    Route::get('/', [\App\Http\Controllers\ProfileController::class, 'create'])->name('profView');
    Route::post('/', [\App\Http\Controllers\ProfileController::class, 'update'])->name('profUpdate');

    Route::prefix('/riwayat')->group(function () {
        Route::get('/', [\App\Http\Controllers\TransactionController::class, 'histmgmt'])->name('userCreateHist');
        Route::post('/', [\App\Http\Controllers\TransactionController::class, 'histhist'])->name('userHistHist');

        Route::post('/bayar', [\App\Http\Controllers\TransactionController::class, 'histpay'])->name('userPayHist');
    });
    Route::get('/formulir', [\App\Http\Controllers\TransactionController::class, 'formmgmt'])->name('formulir');
    Route::post('/formulir', [\App\Http\Controllers\TransactionController::class, 'formstore'])->name('formulirPost');
});