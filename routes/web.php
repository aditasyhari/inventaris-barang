<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\PeminjamanController;
use App\Http\Controllers\HistoryController;
use App\Http\Controllers\LaporanController;

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
    return view('home');
});

Route::middleware('auth')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    Route::get('/dashboard', function () {
        return view('dashboard');
    });
    
    Route::get('/profile', [AuthController::class, 'profile']);
    Route::post('/profile/ubah-profile', [AuthController::class, 'ubah_profile']);
    Route::post('/profile/ubah-password', [AuthController::class, 'ubah_password']);

    Route::get('/data-barang', [BarangController::class, 'index']);
    
    Route::get('/peminjaman', [PeminjamanController::class, 'index']);
    
    Route::middleware('anggota')->group(function () {
        Route::post('/peminjaman/anggota/pinjam', [PeminjamanController::class, 'store']);
        Route::get('/history', [HistoryController::class, 'index']);
        Route::get('/history/detail/{id}', [HistoryController::class, 'show']);
        Route::put('/history/kembalikan/{id}', [HistoryController::class, 'kembalikan']);
    });
    
    Route::middleware('teknisi')->group(function () {
        Route::get('/data-barang/tambah', [BarangController::class, 'create']);
        Route::get('/data-barang/edit/{id}', [BarangController::class, 'edit']);
        Route::post('/data-barang/tambah', [BarangController::class, 'store']);
        Route::put('/data-barang/update/{id}', [BarangController::class, 'update']);
        Route::delete('/data-barang/hapus/{id}', [BarangController::class, 'destroy']);   
        
        Route::get('/peminjaman/detail/{id}', [PeminjamanController::class, 'show']);
        Route::put('/peminjaman/persetujuan/setuju/{id}', [PeminjamanController::class, 'setuju']);
        Route::put('/peminjaman/persetujuan/tolak/{id}', [PeminjamanController::class, 'tolak']);

        Route::get('/pengembalian', [HistoryController::class, 'list_pengembalian']);
        Route::get('/pengembalian/detail/{id}', [HistoryController::class, 'detail']);
        Route::put('/pengembalian/{id}', [HistoryController::class, 'selesai']);

        Route::get('/laporan', [LaporanController::class, 'index'])->name('laporan');
        Route::post('/laporan', [LaporanController::class, 'lihat']);
        
        Route::get('/data-user/teknisi', [UserController::class, 'teknisi']);
        Route::get('/data-user/guru', [UserController::class, 'guru']);
        Route::get('/data-user/siswa', [UserController::class, 'siswa']);
        Route::get('/data-user/tambah', [UserController::class, 'create']);
        Route::post('/data-user/tambah', [UserController::class, 'store']);
        Route::get('/data-user/ganti-status', [UserController::class, 'status']);
        Route::delete('/data-user/hapus/{id}', [UserController::class, 'destroy']);
    });
    
});
