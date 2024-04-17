<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PetugasController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});
Route::get('/login', [AuthController::class, 'index'])->name('auth.login');
Route::post('proses_login', [AuthController::class, 'proses_login'])->name('proses_login');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

Route::group(['middleware' => ['auth']], function () {
    Route::group(['middleware' => ['Cek_login:admin']], function () {
        Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
        Route::get('/admin/User', [AdminController::class, 'User'])->name('User');
        Route::get('/admin/Penjualan', [AdminController::class, 'Penjualan'])->name('Penjualan');
        Route::post('proses_CreateUser', [AdminController::class, 'proses_CreateUser'])->name('proses_CreateUser');
        Route::get('/admin/Product', [AdminController::class, 'Product'])->name('Product');
        Route::post('proses_TambahProduk', [AdminController::class, 'proses_TambahProduk'])->name('proses_TambahProduct');
        Route::put('/proses_EditProduct/{id}', [AdminController::class, 'proses_EditProduct'])->name('proses_EditProduct');
        Route::put('/proses_EditUser/{id}', [AdminController::class, 'proses_EditUser'])->name('proses_EditUser');
        Route::put('/proses_UpdateStok/{id}', [AdminController::class, 'proses_UpdateStok'])->name('proses_UpdateStok');
        Route::delete('/proses_DeleteProduct/{id}', [AdminController::class, 'proses_DeleteProduct'])->name('proses_DeleteProduct');
        Route::delete('/proses_DeleteUser/{id}', [AdminController::class, 'proses_DeleteUser'])->name('proses_DeleteUser');
        Route::resource('admin', AdminController::class);
    });
    Route::group(['middleware' => ['Cek_login:petugas']], function () {
        Route::get('/petugas/dashboard', [PetugasController::class, 'index'])->name('petugas.dashboard');
        Route::get('/petugas/PendataanBarang', [PetugasController::class, 'PendataanBarang'])->name('PendataanBarang');
        Route::get('/petugas/StokBarang', [PetugasController::class, 'StokBarang'])->name('StokBarang');
        Route::resource('petugas', PetugasController::class);
    });
});
