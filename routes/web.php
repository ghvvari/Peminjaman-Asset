<?php

use App\Http\Controllers\authentications\LoginAdminConntroller;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\language\LanguageController;
use App\Http\Controllers\pages\HomePage;
use App\Http\Controllers\pages\Page2;
use App\Http\Controllers\pages\MiscError;
use App\Http\Controllers\authentications\LoginBasic;
use App\Http\Controllers\authentications\LoginKaryawanConntroller;
use App\Http\Controllers\authentications\RegisterBasic;
use App\Http\Controllers\Belakang\AdminController;
use App\Http\Controllers\Belakang\DashboardAdminController;
use App\Http\Controllers\Belakang\KaryawanController;
use App\Http\Controllers\Belakang\AssetController;
use App\Http\Controllers\DepanController\DashboardController;
use App\Http\Controllers\DepanController\PeminjamanAssetController;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

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



// Main Page Route

// locale
Route::get('lang/{locale}', [LanguageController::class, 'swap']);

// pages
Route::get('/pages/misc-error', [MiscError::class, 'index'])->name('pages-misc-error');

// authentication
Route::get('/', [LoginKaryawanConntroller::class, 'index'])->name('auth-login-karyawan');
Route::POST('/login-karyawan', [LoginKaryawanConntroller::class, 'loginKaryawan'])->name('login-karyawan');
Route::get('/login-admin', [LoginAdminConntroller::class, 'index'])->name('auth-login-admin');
Route::POST('/login-admin', [LoginAdminConntroller::class, 'loginAdmin'])->name('login-admin');

//belakang dashboard

// Route::middleware(['auth:admin'])->group(function(){
    Route::prefix('belakang')->group(function () {
      //dashboard
      Route::get('/dashboard', [DashboardAdminController::class, 'index'])->name('dashboard-admin');

      //karyawan
      Route::prefix('karyawan')->group(function () {
        Route::get('/', [KaryawanController::class, 'index'])->name('karyawan.index');
        Route::get('/addkaryawan', [KaryawanController::class, 'create'])->name('karyawan.add');
        Route::post('/addkaryawan/store', [KaryawanController::class, 'store'])->name('karyawan.store');
        Route::get('/edit/{id}', [KaryawanController::class, 'edit'])->name('karyawan.edit');
        Route::post('update/{id}', [KaryawanController::class, 'update'])->name('karyawan.update');
        Route::delete('/delete/{id}', [KaryawanController::class, 'destroy'])->name('karyawan.delete');
        Route::get('/indexJsonKaryawan', [KaryawanController::class, 'indexJson'])->name('data-karyawan.indexJSON');
      });
      Route::prefix('admin')->group(function () {
        Route::get('/', [AdminController::class, 'index'])->name('admin.index');
        Route::get('/addadmin', [AdminController::class, 'create'])->name('admin.add');
        Route::post('/storeadmin', [AdminController::class, 'store'])->name('admin.store');
        Route::get('/edit/{id}', [AdminController::class, 'edit'])->name('admin.edit');
        Route::post('/update/{id}', [AdminController::class, 'update'])->name('admin.update');
        Route::get('/delete/{id}', [AdminController::class, 'destroy'])->name('admin.delete');
        Route::get('/getKaryawanDetails', [AdminController::class, 'getDetails'])->name('getData');
      });

      Route::prefix('data-aset')->group(function () {
        Route::get('/', [AssetController::class, 'index'])->name('asset.index');
        Route::get('/addasset', [AssetController::class, 'create'])->name('asset.add');
        Route::post('/store', [AssetController::class, 'store'])->name('asset.store');
        Route::get('/edit/{id}', [AssetController::class, 'edit'])->name('asset.edit');
        Route::post('/update/{id}', [AssetController::class, 'update'])->name('asset.update');
        Route::delete('/delete/{id}', [AssetController::class, 'destroy'])->name('aset.delete');
        Route::get('/show/{id}', [AssetController::class, 'show'])->name('asset.show');
        Route::get('/indexJsonAsset', [AssetController::class, 'indexJson'])->name('data-asset.indexJSON');
      });
    });
// });

Route::middleware(['auth:web'])->group(function(){
  Route::get('/Dashboard', [DashboardController::class, 'index'])->name('dashboard-karyawan');
  Route::get('/peminjaman Asset', [PeminjamanAssetController::class, 'index'])->name('peminjaman.index');
  Route::get('/logout', [LoginKaryawanConntroller::class, 'logout'])->name('logout');
});
