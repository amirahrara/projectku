<?php

namespace App\Http\Controllers;

use App\Models\Form;
use App\Models\TandaTangan;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf as FacadePdf;
use Barryvdh\DomPDF\PDF as DomPDFPDF;
use Illuminate\Http\Request;
use Illuminate\Auth\Events\Validated;
use Illuminate\Support\Carbon;
use PDF;

class PermohonanController extends Controller
{
    public function index()
    {
        $pdf = Form::where('pengguna_id', '=', auth()->user()->id)->get();
        //  dd($pdf);
        return view('permohonan', compact('pdf'));
    }

    public function ajukan(Request $request)
    {
        //  dd($request->all());

        $folderPath = public_path('upload/');

        $image_parts = explode(";base64,", $request->ttd);

        $image_type_aux = explode("image/", $image_parts[0]);

        $image_type = $image_type_aux[1];

        $image_base64 = base64_decode($image_parts[1]);

        $nama = uniqid();

        $file = $folderPath . $nama . '.' . $image_type;
        file_put_contents($file, $image_base64);

        $ttd = 'upload/' . $nama . '.' . $image_type;

        // dd($ttd);



        $validatedData = $request->validate([
            'rincian' => 'required',
            'tujuan' => 'required',
            'memperoleh_informasi' => 'required',
            'mendapat_salinan' => 'required',
            'ttd' => 'required',
            'user_id' => 'required'
        ]);
        // dd($validatedData);

        $validatedData['pengguna_id'] = auth()->user()->id;

        $validatedData['ttd'] = $ttd;
        Form::create($validatedData);
        // dd($validatedData);
        return redirect('/hasil-pengaduan')->with('success', 'post baru telah ditambahkan!');
    }


    public function eksporpdf($id){

        // dd('a');
        $pdf =  Form::with('user')->find($id);
        // $petugas = $id
        // dd($pdf);

        $dataJabatan = User::where('username', '=', $pdf->petugas_penerima)->get();
        // dd($dataJabatan);
        $dataAdmin = User::all();
        // $ttd = TandaTangan::where('user_id', '=', $dataJabatan[0]->id)->get();
        // dd($ttd);
        // $jabatan = $dataJabatan->jabatan;
        // dd($pdf);
        // $today = Carbon::now()->isoFormat('D MMMM Y');

        // dd($pdf);
        $datapdf = FacadePdf::loadView('bukti',[
            'pdf' => $pdf,
            'dataAdmin'=> $dataAdmin,
            'dataJabatan' => $dataJabatan,
            // 'ttd' => $ttd
        ]);

        // dd($datapdf);
    	return $datapdf->stream('Bukti-Permohonan.pdf');
    }
    

}
