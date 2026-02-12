<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\OutletController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;


/*
|--------------------------------------------------------------------------
| PUBLIC (USER)
|--------------------------------------------------------------------------
*/
Route::get('/', [UserController::class, 'dashboard'])->name('dashboard');
Route::get('/produk', [UserController::class, 'produk'])->name('produk');
Route::get('/outlet', [UserController::class, 'outlet'])->name('outlet');
Route::get('/kategori/{id}', [KategoriController::class, 'show']);
/*
|--------------------------------------------------------------------------
| ADMIN AUTH (LOGIN, REGISTER, LOGOUT)
|--------------------------------------------------------------------------
*/
Route::prefix('admin')->name('admin.')->group(function () {

    // LOGIN
    Route::get('/login', [AdminAuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AdminAuthController::class, 'login']);

    // REGISTER
    Route::get('/register', [AdminAuthController::class, 'showRegister'])->name('register');
    Route::post('/register', [AdminAuthController::class, 'register']);

    // LOGOUT ✅ (SATU KALI SAJA)
    Route::post('/logout', [AdminAuthController::class, 'logout'])->name('logout');
});

Route::get('/detail/produk/{id}', [ProdukController::class, 'detail'])
    ->name('produk.detail');

/*
|--------------------------------------------------------------------------
| ADMIN PROTECTED
|--------------------------------------------------------------------------
*/
Route::prefix('admin')
    ->name('admin.')
    ->middleware('auth:admin')
    ->group(function () {

        Route::get('/dashboard', [DashboardController::class, 'index'])
            ->name('dashboard');

        Route::resource('kategori', KategoriController::class);
        Route::resource('produk', ProdukController::class);
        Route::resource('outlet', OutletController::class);
        Route::resource('admin/kategori', KategoriController::class)->except('show');

    });
