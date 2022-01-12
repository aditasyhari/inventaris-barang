<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Peminjaman;
use Exception;

class LaporanController extends Controller
{
    //
    public function index()
    {
        return view('laporan.laporan');
    }

    public function lihat(Request $request)
    {
        try {
            $laporan = Peminjaman::with(['user', 'user.profile'])
                    ->whereMonth('tgl_pinjam', $request->bulan)
                    ->whereYear('tgl_pinjam', $request->tahun)
                    ->where('status_kembali', 'selesai')
                    ->where('status_kembali', 'belum')
                    ->orderBy('id', 'desc')
                    ->get();

            return redirect()->route('laporan')->with(['laporan' => $laporan]);
        } catch (Exception $e) {
            return view('error');
        }
    }
}
