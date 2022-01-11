<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Peminjaman;
use App\Models\PeminjamanBarang;
use App\Models\Barang;
use Carbon\Carbon;
use Exception;
use Validator;

class HistoryController extends Controller
{
    //
    public function index()
    {
        $barang = Barang::orderBy('nama', 'asc')->get();
        $peminjaman = Peminjaman::with(['user', 'user.profile'])
                    ->where('user_id', Auth::user()->id)
                    ->orderBy('id', 'desc')
                    ->get();

        return view('history.history', compact(['barang', 'peminjaman']));
    }

    public function show($id)
    {
        try {
            $p = Peminjaman::with(['user', 'user.profile', 'peminjaman_barang', 'peminjaman_barang.barang'])->where('id', $id)->first();
    
            return view('history.detail', compact('p'));
        } catch (Exceptio $e) {
            return view('error');
        }
    }

    public function kembalikan($id)
    {
        try {
            $p = Peminjaman::find($id);
            $p->update([
                'status_kembali' => 'meminta'
            ]);

            return redirect('/history')->with('status', 'Meminta persetujuan pengembalian barang, sudah dikirim.');
        } catch (Exceptio $e) {
            return view('error');
        }
    }

    public function list_pengembalian()
    {
        try {
            $barang = Barang::orderBy('nama', 'asc')->get();
            $peminjaman = Peminjaman::with(['user', 'user.profile'])
                        ->where('status_kembali', 'meminta')
                        ->orderBy('id', 'desc')
                        ->get();

            return view('history.pengembalian', compact(['barang', 'peminjaman']));

        } catch (Exception $e) {
            return view('error');
        }
    }

    public function detail($id)
    {
        try {
            $p = Peminjaman::with(['user', 'user.profile', 'peminjaman_barang', 'peminjaman_barang.barang'])->where('id', $id)->first();
    
            return view('history.detail', compact('p'));
        } catch (Exceptio $e) {
            return view('error');
        }
    }

    public function selesai($id)
    {
        try {
            $p = Peminjaman::with(['peminjaman_barang', 'peminjaman_barang.barang'])->where('id', $id)->first();

            if($p) {
                $p->update([
                    'status_kembali' => 'selesai'
                ]);

                foreach($p->peminjaman_barang as $pb) {
                    $pb->barang->update([
                        'tersedia' => $pb->barang->tersedia + $pb->jumlah
                    ]);
                }

                return redirect('/pengembalian')->with('status', 'Konfirmasi pengembalian berhasil.');
            }

        } catch (Exception $e) {
            return view('error');
        }
    }
}
