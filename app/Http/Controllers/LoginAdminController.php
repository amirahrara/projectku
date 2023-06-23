<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;


class LoginAdminController extends Controller
{
    public function indexadmin(){
        return view('admin.login.login');
    
    }
    
    
    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            
            'username' => ['required'],
            'password' => ['required']
        ]);
 
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('/dashboard');
        }
 
        return back()->with('loginError', 'Login failed');
    }

}
