<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Profile;
use Exception;
use Validator;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function teknisi()
    {
        //
        $user = User::where('role', 'teknisi')->orderBy('nik_nis', 'asc')->get();
        return view('user.teknisi', compact('user'));
    }

    public function guru()
    {
        //
        $user = User::where('role', 'guru')->orderBy('nik_nis', 'asc')->get();
        return view('user.guru', compact('user'));
    }

    public function siswa()
    {
        //
        $user = User::where('role', 'siswa')->orderBy('nik_nis', 'asc')->get();
        return view('user.siswa', compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('user.tambah');
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
                    'nik_nis' => 'required|unique:users',
                    'email' => 'required|email|unique:users',
                    'role' => 'required',
                ]
            );  

            if ($validator->fails()) {  
                return back()->withErrors($validator); 
            }  

            $user = User::create([
                'nik_nis' => $request->input('nik_nis'),
                'email' => $request->input('email'),
                'password' => Hash::make($request->input('nik_nis')),
                'role' => $request->input('role'),
            ]);

            if ($user) {
                $profile = Profile::create([
                    'user_id' => $user->id,
                ]);

                if ($profile) {
                    return back()->with('status', 'Data User berhasil ditambahkan!');
                }
            }

            return back();

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
        try {
            User::destroy($id);
            return response()->json(['success'=>'Berhasil dihapus.']);
        } catch (Exception $e) {
            return response()->json(['failed'=>'Error.']);
        }
    }

    public function status(Request $request)
    {
        try {
            $user = User::find($request->user_id);
            $user->aktif = $request->status;
            $user->save();
    
            return response()->json(['success'=>'Status berhasil diubah.']);
            
        } catch (Exceptio $e) {
            return response()->json(['failed'=>'Error.']);
        }
    }
}
