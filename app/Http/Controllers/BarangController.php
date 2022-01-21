<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Barang;
use Exception;
use Validator;

class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $barang = Barang::orderBy('id', 'desc')->get();
        return view('barang.list-barang', compact('barang'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('barang.tambah');
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
                    'kode' => 'required|unique:barang',
                    'nama' => 'required',
                    'merk' => 'required',
                    'kondisi' => 'required',
                    'harga' => 'required|numeric',
                    'jumlah' => 'required|numeric',
                    'foto' => 'required|max:2048',
                ]
            );

            if ($validator->fails()) {  
                return back()->withErrors($validator); 
            }
    
            $input = $request->all();
            $input['tersedia'] = $request->jumlah;
    
            if ($request->hasFile('foto')) {
                $barang = $request->file('foto');
                $destinationPath = 'image/barang/';
                $namaBarang = date('YmdHis').".".$barang->getClientOriginalExtension();
                $barang->move($destinationPath, $namaBarang);
                $input['foto'] = "$namaBarang";
            }
    
            Barang::create($input);
    
            return back()->with('status', 'Data Barang berhasil ditambahkan!');

        } catch (Exception $e) {
            return view('error')->with('e', $e);
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
        $b = Barang::find($id);
        return view('barang.edit', compact('b'));
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
        try {
            $validator = Validator::make($request->all(), 
                [ 
                    'kode' => 'required',
                    'nama' => 'required',
                    'merk' => 'required',
                    'kondisi' => 'required',
                    'harga' => 'required|numeric',
                    'jumlah' => 'required|numeric',
                    'tersedia' => 'required|numeric',
                    'foto' => 'nullable|max:2048',
                ]
            );

            
            if ($validator->fails()) {  
                return back()->withErrors($validator); 
            }

            $barang = Barang::find($id);
            $input = $request->all();
    
            if ($request->hasFile('foto')) {
                $fotoBarang = $request->file('foto');
                $destinationPath = 'image/barang/';
                $namaBarang = date('YmdHis').".".$fotoBarang->getClientOriginalExtension();
                $fotoBarang->move($destinationPath, $namaBarang);
                $barang->delete_image();
                $input['foto'] = "$namaBarang";
            }
    
            $barang->update($input);
    
            return redirect('/data-barang')->with('status', 'Data Barang berhasil diperbarui!');

        } catch (Exception $e) {
            return view('error')->with('e', $e);
        }
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
        try {
            $barang = Barang::find($id);
            $barang->delete_image();
            $barang->destroy($id);
            
            return response()->json(['success'=>'Berhasil dihapus.']);
        } catch (Exception $e) {
            return response()->json(['failed'=>'Error.']);
        }
    }
}
