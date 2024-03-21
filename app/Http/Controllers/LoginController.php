<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\login;
use Illuminate\support\Facades\session;

class LoginController extends Controller
{
    public function index()
    {
        // login::where('username', Session::get('logged_in')['username'])->first();
        return view('login.index', [
            'title' => 'Login',
            'active' => 'login',
        ]);
    }

    public function penyewa(Request $request){
        $user = login::where(["username" =>$request->name, "password" => $request->password])->get();
        return redirect('/keranjang')->with('user', $user);
    }

    public function login(Request $request){
        $username = $request->username;
        $password = $request->password;

        $login = login::where('username', $username)->first();

        if($login){
            if($login->password == $password){
                Session::put('logged_in', $login);
                if ($login->role == 1) {
                    return redirect('/home');
                } else {
                    return redirect('/keranjang')->with('message', "<script>alert('login sukses')</script>");
                }
            }else{
                return redirect('/login')->with('message', "<script>alert('login gagal')</script>");
            }
            }else{
            return redirect('/login')->with('message', "<script>alert('login gagal')</script>");
        }

    }

    public function logout(){
        Session::flush();
        return redirect('/')->with('message', "<script>alert('logout sukses')</script>");
    }
}
