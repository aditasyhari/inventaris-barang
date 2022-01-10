<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Profile;
use Validator;
use Exception;

class AuthController extends Controller
{
    //
    public function profile()
    {
        try {
            $user = User::with('profile')->where('id', Auth::user()->id)->first();
            return view('auth.profile', compact('user'));
        } catch (Exception $e) {
            return view('error');
        }
    }

    public function ubah_password(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), 
                [ 
                    'password_lama' => 'required',
                    'password' => 'required|confirmed',
                ]
            );

            if ($validator->fails()) {  
                return back()->withErrors($validator); 
            }
            
            if(Hash::check($request->password_lama, Auth::user()->password)) {
                $user = User::find(Auth::user()->id);
                $user->update([
                    'password' => Hash::make($request->password)
                ]);

                return back()->with('status', 'Password berhasil diperbarui!');
            }

        } catch (Exception $e) {
            return view('error');
        }
    }

    public function ubah_profile(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), 
                [ 
                    'nama' => 'required',
                    'no_telp' => 'required',
                    'nik_nis' => 'required',
                    'email' => 'required|email',
                    'foto' => 'nullable|max:2048',
                ]
            );

            if ($validator->fails()) {  
                return back()->withErrors($validator); 
            }

            $user = User::find(Auth::user()->id);
            $profile = Profile::where('user_id', $user->id)->first();

            $user->update([
                'nik_nis' => $request->nik_nis,
                'email' => $request->email
            ]);
        
            if ($request->hasFile('foto')) {
                $profile->delete_image();
                $foto = $request->file('foto');
                $destinationPath = 'image/profile/';
                $namaFoto = date('YmdHis').".".$foto->getClientOriginalExtension();
                $foto->move($destinationPath, $namaFoto);
                
                $profile->update([
                    'nama' => $request->nama,
                    'no_telp' => $request->no_telp,
                    'foto' => "$namaFoto",
                ]);
            } else {
                $profile->update([
                    'nama' => $request->nama,
                    'no_telp' => $request->no_telp,
                ]);
            }
    
            return back()->with('status', 'Profile berhasil diperbarui!');

        } catch (Exception $e) {
            return view('error');
        }
    }

    public function login(Request $request)
    {
        try {
            $nik = $request->username;
            $password = $request->password;

            if (Auth::attempt(['nik_nis' => $nik, 'password' => $password])) {
                if(Auth::user()->aktif != 1) {
                    return back()->with('error', 'Akun anda tidak aktif');
                }
                return redirect('/dashboard');
            }else{
                return back()->with('error', 'Username atau Password Salah');
            }
        } catch (Exception $e) {
            return view('error')->with('e', $e);
        }
    }

    public function logout()
    {
        try {
            Auth::logout();
            return redirect('/login');
        } catch (Exception $e) {
            return view('error')->with('e', $e);
        }
    }
}
