<?php

use App\Models\Barang;
use App\Models\Peminjaman;
use App\Imports\SiswaImport;
use App\Imports\GuruImport;
use App\Imports\BarangImport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\PeminjamanController;
use App\Http\Controllers\HistoryController;
use App\Http\Controllers\LaporanController;
use Illuminate\Support\Facades\DB;

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
        $total = Barang::count();
        $tersedia = Barang::sum('tersedia');
        $dipinjam = Peminjaman::from('peminjaman as p')
                ->select('pb.jumlah')
                ->leftJoin('peminjaman_barang as pb', 'p.id', '=', 'pb.peminjaman_id')
                ->where([
                    ['persetujuan', 'disetujui'],
                    ['status_kembali', '!=', 'selesai']
                ])
                ->sum('pb.jumlah');

        $data_gf = DB::table('barang as b')
                    ->selectRaw(
                        'barang_id, b.jumlah, b.tersedia, b.nama, (b.jumlah - b.tersedia) dipinjam'
                    )
                    ->leftJoin('peminjaman_barang as pb', 'pb.barang_id', '=', 'b.id')
                    ->leftJoin('peminjaman as p', 'p.id', '=', 'pb.peminjaman_id')
                    ->where([
                        ['p.persetujuan', 'disetujui'],
                        ['p.status_kembali', '!=', 'selesai']
                    ])
                    ->groupBy('barang_id', 'b.nama', 'b.jumlah', 'b.tersedia', 'dipinjam')
                    ->get();

        // dd($data_gf);
        return view('dashboard', compact(['total', 'tersedia', 'dipinjam', 'data_gf']));
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

        Route::post('/data-user/siswa/import', function () {
            Excel::import(new SiswaImport, request()->file('file'));
            return back()->with('status', 'Data user siswa berhasil diimport!');
        })->name('import-siswa');

        Route::post('/data-user/guru/import', function () {
            Excel::import(new GuruImport, request()->file('file'));
            return back()->with('status', 'Data user guru berhasil diimport!');
        })->name('import-guru');

        Route::post('/data-barang/import', function () {
            Excel::import(new BarangImport, request()->file('file'));
            return back()->with('status', 'Data barang berhasil diimport!');
        })->name('import-barang');
    });
    
});
