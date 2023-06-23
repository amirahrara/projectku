<?php

namespace App\Http\Controllers;

use App\Models\Pengguna;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;


class RegisterController extends Controller
{
    public function index()
    {
        return view('user.authen.register', [
            'title'=>'Register',
            'active'=>'register'
        ]); 
    }

    public function store(Request $request)
    {
        $validatedData = $request ->validate([
            'nik'=>'required|max:16|min:16|unique:pengguna',
            'nama'=>'required|max:255',
            'email'=>'required|email:dns|unique:pengguna',
            'no_telp'=>'required|max:255',
            'alamat'=>'required|max:255',
            'pekerjaan'=>'required|max:255',
            'foto_ktp' =>'required',
            'password'=>'required|min:5|max:255'
            
        ]);
        if ($request->hasFile('foto_ktp')) {
            $file = $request->file('foto_ktp');
            $filename = time() . '_' . $file->getClientOriginalName();
            $path = $file->storeAs('public/fotoKTP', $filename);
            $validatedData['foto_ktp']=$filename;
        }
        $validatedData['no_telp'] = '+62' . $validatedData['no_telp'];


        // $validatedData['password']= bcrypt($validatedData['password']);
        $validatedData['password']= Hash::make($validatedData['password']);


        Pengguna::create($validatedData);
    
        return redirect('/login/user')->with('berhasil', 'Daftar akun berhasil!!');
    }
}