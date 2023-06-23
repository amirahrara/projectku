<?php

namespace App\Http\Controllers;

use App\Models\TandaTangan;
use App\Models\User;
use Illuminate\Http\Request;

class TandaTanganController extends Controller
{
    public function index(){
        $ttd =User::where('id', auth()->user()->id)->get();
        // $validasiTtd = User::where('tanda_tangan', '=', auth()->user()->tanda_tangan)->get();

        // dd($validasiTtd->tanda_tangan);
        return view('admin.data.tanda-tangan',[
            'ttd' => $ttd,
            // 'valid'=> $validasiTtd
        ]);
    }

    // public function simpanTtd(Request $request){
    //     $request->validate([
    //         'tanda_tangan' => 'required|mimes:jpeg,jpg,png|max:5000',
            
    //     ]);
    
    //     if ($request->hasFile('tanda_tangan')) {
    //         $file = $request->file('tanda_tangan');
    //         $filename = time() . '_' . $file->getClientOriginalName();
    //         $path = $file->storeAs('public/tandatangan', $filename);
    //     }
        
    //    User::create([
    //         'tanda_tangan' => $filename
            
    //     ]);
    
    //     return redirect('/tanda-tangan')->with('success', 'Tanda tangan berhasil diupload!');
    // }
    public function simpanTtd(Request $request)
{
    $request->validate([
        'tanda_tangan' => 'required|mimes:jpeg,jpg,png|max:5000',
    ]);

    if ($request->hasFile('tanda_tangan')) {
        $file = $request->file('tanda_tangan');
        $filename = time() . '_' . $file->getClientOriginalName();
        $path = $file->storeAs('public/tandatangan', $filename);
    }

    // Ambil data user yang ingin diupdate
    $user = User::find($request->user_id);

    // Perbarui data tanda tangan
    $user->tanda_tangan = $filename;
    $user->save();

    return redirect('/tanda-tangan')->with('success', 'Tanda tangan berhasil diupload!');
}
}
