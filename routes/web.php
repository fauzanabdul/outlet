<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminAuthController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

//
// ======================
// PUBLIC (USER / VISITOR)
// ======================
//
Route::get('/', function () {
    return view('dashboard'); // beranda
});

Route::get('/produk', fn () => view('produk'));
Route::get('/service', fn () => view('service'));
Route::get('/outlet', fn () => view('outlet'));


//
// ======================
// ADMIN ONLY
// ======================
//
Route::prefix('admin')->group(function () {

    // LOGIN ADMIN
    Route::get('/login', [AdminAuthController::class, 'showLogin'])
        ->name('admin.login');

    Route::post('/login', [AdminAuthController::class, 'login']);

    // LOGOUT ADMIN
    Route::post('/logout', [AdminAuthController::class, 'logout'])
        ->name('admin.logout');

    // DASHBOARD ADMIN (PROTECTED)
    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    })
    ->middleware('auth:admin')
    ->name('admin.dashboard');

});
    // REGISTER ADMIN
    Route::get('/register', [AdminAuthController::class, 'showRegister'])
        ->name('admin.register');

    Route::post('/register', [AdminAuthController::class, 'register']);   