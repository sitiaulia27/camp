<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\login;

class RegisterController extends Controller
{
    public function index()
    {
        return view('register.index', [
            'title' => 'Register',
            'active' => 'register'
        ]);
    }

    public function buat(Request $request){
        $penyewa = new login;
        $penyewa->nama = $request->name;
        $penyewa->username = $request->username;
        $penyewa->password = $request->password;
        $penyewa->email = $request->email;
        $penyewa->alamat = $request->alamat;
        $penyewa->telp = $request->telp;
        $penyewa->role = 2;
        $penyewa->save();
        return redirect('/login')->with('message', "<script>alert('Berhasil Registrasi')</script>");
    }

}
