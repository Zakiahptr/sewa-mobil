<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CarController;
use App\Http\Controllers\HistoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RentController;

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


Auth::routes();

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::middleware(['auth'])->group(function () {
        Route::prefix('menejemen-mobil')->controller(CarController::class)->name('cars.')->group(function () {
            Route::get('/', 'index')->name('index');
            Route::get('/tambah', 'create')->name('create');
            Route::post('/store', 'store')->name('store');
            Route::get('/{car}/edit', 'edit')->name('edit');
            Route::patch('/{car}/update', 'update')->name('update');
            // Route::get('/{car}/detail', 'show')->name('detail');
            Route::delete('/{car}', 'destroy')->name('destroy');
        });

        Route::prefix('peminjaman')->controller(RentController::class)->name('rent.')->group(function () {
            Route::get('/', 'index')->name('index');
            Route::get('/{car}', 'create')->name('create');
            Route::post('/store', 'store')->name('store');
            // Route::patch('/{car}/update', 'update')->name('update');
            // // Route::get('/{car}/detail', 'show')->name('detail');
            // Route::delete('/{car}', 'destroy')->name('destroy');
        });

        Route::prefix('riwayat-peminjaman')->controller(HistoryController::class)->name('rentsHistory.')->group(function () {
            Route::get('/', 'index')->name('index');
            Route::get('/{rent}/detail', 'detail')->name('detail');
            Route::patch('/{rent}/return', 'return')->name('return');
            // Route::get('/{car}', 'create')->name('create');
            // Route::post('/store', 'store')->name('store');
            // Route::get('/{car}/edit', 'edit')->name('edit');
            // Route::patch('/{car}/update', 'update')->name('update');
            // // Route::get('/{car}/detail', 'show')->name('detail');
            // Route::delete('/{car}', 'destroy')->name('destroy');
        });



});


