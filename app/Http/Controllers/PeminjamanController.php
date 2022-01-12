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

class PeminjamanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $barang = Barang::orderBy('nama', 'asc')->get();
        $peminjaman = Peminjaman::with(['user', 'user.profile'])->orderBy('id', 'desc')->get();

        return view('peminjaman.peminjaman', compact(['barang', 'peminjaman']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        try {
            $validator = Validator::make($request->all(), 
                [ 
                    'kelas' => 'required',
                    'mapel' => 'required',
                    'jam' => 'required',
                    'tgl_pinjam' => 'required',
                    'tgl_kembali' => 'required',
                    'keterangan' => 'required',
                    'peminjaman_barang' => 'required',
                ]
            );  

            if ($validator->fails()) {  
                return back()->withErrors($validator); 
            }  

            $input = $request->except('peminjaman_barang');
            $input['user_id'] = Auth::user()->id;

            $peminjaman = Peminjaman::create($input);

            foreach($request->peminjaman_barang as $p) {
                $a = str_replace("['", '', $p);
                $a = str_replace("']", '', $a);
                $b = explode("', '", $a);

                // dd($b);
    
                PeminjamanBarang::create([
                    'jumlah' => $b[1],
                    'peminjaman_id' => $peminjaman->id,
                    'barang_id' => $b[0],
                ]);
            }

            return back()->with('status', 'Berhasil diajukan peminjaman, tunggu persetujuan!');

        } catch (Exception $e) {
            return view('error');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $p = Peminjaman::with(['user', 'user.profile', 'peminjaman_barang', 'peminjaman_barang.barang'])->where('id', $id)->first();
        return view('peminjaman.detail', compact('p'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function getDateAttribute($value)
    {
        return Carbon::parse($value)->format('Y-m-d H:i:00');
    }

    public function setuju($id)
    {
        try {
            $p = Peminjaman::with(['peminjaman_barang', 'peminjaman_barang.barang'])->where('id', $id)->first();

            $p->update([
                'persetujuan' => 'disetujui',
                'status_kembali' => 'belum'
            ]);

            if($p) {
                foreach($p->peminjaman_barang as $pb) {
                    if($pb->jumlah <= $pb->barang->tersedia) {
                        $pb->barang->update([
                            'tersedia' => $pb->barang->tersedia - $pb->jumlah
                        ]);
                    }
                }

                return redirect('/peminjaman')->with('status', 'Status persetujuan berhasil diperbarui.');
            }

        } catch (Exception $e) {
            return view('error');
        }
    }

    public function tolak($id)
    {
        try {
            $peminjaman = Peminjaman::find($id);
            $peminjaman->update([
                'persetujuan' => 'ditolak'
            ]);

            return redirect('/peminjaman')->with('status', 'Status persetujuan berhasil diperbarui.');
        } catch (Exception $e) {
            return view('error');
        }
    }
}
