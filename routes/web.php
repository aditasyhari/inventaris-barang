<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

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
    
    Route::get('/data-barang', function () {
        return view('barang.list-barang');
    });
    
    Route::get('/peminjaman', function () {
        return view('peminjaman.peminjaman');
    });
    
    
    Route::middleware('anggota')->group(function () {
        Route::get('/history', function () {
            return view('history.history');
        });

    });
    
    Route::middleware('teknisi')->group(function () {
        Route::get('/peminjaman/durasi-pinjam', function () {
            return view('peminjaman.durasi-pinjam');
        });

        Route::get('/laporan', function () {
            return view('laporan.laporan');
        });
        
        Route::get('/data-user/teknisi', function () {
            return view('user.teknisi');
        });
        
        Route::get('/data-user/guru', function () {
            return view('user.guru');
        });
        
        Route::get('/data-user/siswa', function () {
            return view('user.siswa');
        });
    });
    
});
