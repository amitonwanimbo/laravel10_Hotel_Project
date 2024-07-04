<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

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
use App\Http\Controllers\AdminController;
use App\Http\Controllers\StafController;
use App\Http\Controllers\KepalaController;

use App\Http\Controllers\PenggunaController;
use App\Http\Controllers\LaporanController;

Route::middleware(['auth'])->group(function ()
{
    // untuk auth Admin
        Route::middleware(['auth', 'role:admin'])->group(function () {
            Route::get('/admin', [AdminController::class, 'index'])->name('admin.dashboard');
            Route::resource('/pengguna', PenggunaController::class);
            Route::get('/admin/lapor', [LaporanController::class, 'adminIndex'])->name('admin.Laporan.index');
            // Route::get('profile', [ProfileController::class, 'show'])->name('profile.show');
            Route::patch('/laporan/{laporan}/update-status/{status}', [LaporanController::class, 'updateStatus'])->name('laporan.updateStatus');


        });
        // untuk auth Kepala
        Route::middleware(['auth', 'role:kepala'])->group(function () {
            Route::get('/kepala', [KepalaController::class, 'index'])->name('kepala.dashboard');

        });
        // untuk Auth staf
        Route::middleware(['auth', 'role:staf'])->group(function () {
            Route::get('/staf', [StafController::class, 'index'])->name('staf.dashboard');
            Route::resource('lapor', LaporanController::class);
        });    
});

// Untuk Alaman pertama

Route::get('/', function () {
    return view('auth.login');
});


// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('profile', [ProfileController::class, 'show'])->name('profile.show');

});

require __DIR__.'/auth.php';
