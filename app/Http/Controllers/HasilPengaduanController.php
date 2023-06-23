<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Form;

class HasilPengaduanController extends Controller
{
    public function datauser(){

        $datauser = Form::where('pengguna_id', '=', auth()->user()->id)
        ->latest()
        ->get();
        

        return view('hasilpengaduan', compact('datauser'));

    }



    public function store(Request $request)
    {
        // $validatedData = $re
    }
   
}
