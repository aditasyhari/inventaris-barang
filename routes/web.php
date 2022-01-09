<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BarangController;

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

Route::get('/login', function () {
    return view('auth.login');
})->name('login');

Route::post('/login', [AuthController::class, 'login']);

Route::get('/', function () {
    return redirect()->route('login');
});

Route::middleware('auth')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    Route::get('/dashboard', function () {
        return view('dashboard');
    });
    
    Route::get('/data-barang', [BarangController::class, 'index']);
    
    Route::get('/peminjaman', function () {
        return view('peminjaman.peminjaman');
    });
    
    
    Route::middleware('anggota')->group(function () {
        Route::get('/history', function () {
            return view('history.history');
        });

    });
    
    Route::middleware('teknisi')->group(function () {
        Route::get('/data-barang/tambah', [BarangController::class, 'create']);
        Route::get('/data-barang/edit/{id}', [BarangController::class, 'edit']);
        Route::post('/data-barang/tambah', [BarangController::class, 'store']);
        Route::put('/data-barang/update/{id}', [BarangController::class, 'update']);
        Route::delete('/data-barang/hapus/{id}', [BarangController::class, 'destroy']);   

        Route::get('/peminjaman/durasi-pinjam', function () {
            return view('peminjaman.durasi-pinjam');
        });

        Route::get('/laporan', function () {
            return view('laporan.laporan');
        });
        
        Route::get('/data-user/teknisi', [UserController::class, 'teknisi']);
        Route::get('/data-user/guru', [UserController::class, 'guru']);
        Route::get('/data-user/siswa', [UserController::class, 'siswa']);
        Route::get('/data-user/tambah', [UserController::class, 'create']);
        Route::post('/data-user/tambah', [UserController::class, 'store']);
        Route::get('/data-user/ganti-status', [UserController::class, 'status']);
        Route::delete('/data-user/hapus/{id}', [UserController::class, 'destroy']);
    });
    
});
