<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Session;
use Exception;

class AuthController extends Controller
{
    //
    public function login(Request $request)
    {
        try {
            $nik = $request->username;
            $password = $request->password;

            if (Auth::attempt(['nik/nis' => $nik, 'password' => $password])) {
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
