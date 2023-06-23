<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;


class LoginController extends Controller
{
    public function index()
    {
        return view('user.authen.login', [
            'title'=>'Login'
        ]); 
    }
    public function authenticate(Request $request)
    {
        $credentials = $request->validate([

            'nik'=> 'required',
            'password'=>'required'

        ]);
        if (Auth::guard('pengguna')->attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended('/hasil-pengaduan');
        }
        return back()->with('gagal', 'Masuk gagal!');
    }
    
    public function logout(Request $request)
    {
        // dd('a');
        Auth::logout();
 
        request()->session()->invalidate();
     
        request()->session()->regenerateToken();
     
        return redirect('/login/user');
    }

}
