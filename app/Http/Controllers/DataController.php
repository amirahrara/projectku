<?php

namespace App\Http\Controllers;

use App\Models\Form;
use App\Models\User;
use App\Models\Pengguna;
use DataTables;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\DataExport;
use App\Models\TandaTangan;
use Barryvdh\DomPDF\Facade\Pdf as FacadePdf;
use Illuminate\Support\Facades\Validator;


class DataController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function indexadmin()
    {
        return view('admin.dashboard');
    }

    public function index()
    {
        $form = Form::all();
        $pengguna = Pengguna::all();
        $user = User::all();
        // $datapdf = Form::where('pengguna_id', '=', Auth)->first();
        // dd($datapdf);
        // $pdf = Pengguna::all();

        // $pdf = Form::find($id);
        // dd($pdf);

        return view('admin.data.formulir', compact('form', 'pengguna', 'user'));
    }

    public function exportExcel()
    {

        return Excel::download(new DataExport, 'Data-Registrasi.xlsx');
    }

    public function getDataForm(Request $request, Form $form)
    {

        if ($request->ajax()) {
            // $data = Form::select('*');
            $data = Form::leftJoin('pengguna', 'pengguna.id', 'forms.pengguna_id')
                ->select('forms.*', 'pengguna.nama', 'pengguna.nik', 'pengguna.no_telp')
                ->latest('forms.created_at')
                ->get();

            // dd($data);

            return Datatables::of($data)
                ->addColumn('status', function ($data) {
                    return '<button type="button" class="btn btn-info btn-sm" id="getEditArticleData2" data-id="' . $data->id . '">Lihat</button>';
                })
                ->addColumn('Actions', function ($data) {
                    return '<button type="button" class="btn btn-success btn-sm" id="getEditArticleData" data-id="' . $data->id . '">Tampilkan</button>';
                })
                ->editColumn('created_at', function ($data) {
                    return date('d-M-Y', strtotime($data->created_at));
                })
                ->rawColumns(['Actions', 'status'])
                ->addIndexColumn()
                ->make(true);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Form::leftJoin('pengguna', 'pengguna.id', 'forms.pengguna_id')
            ->select('forms.*', 'pengguna.nama', 'pengguna.nik', 'pengguna.no_telp')
            ->where('forms.id', $id)
            ->first();
            

        $html = '
                 <div class="form-group">
                     <label for="rincian">Rincian Informasi Yang Dibutuhkan:</label>
                     <input type="text" class="form-control" name="rincian" id="rincian" value="' . $data->rincian . '"disabled>
                 </div>
                 <div class="form-group">
                     <label for="tujuan">Tujuan Penggunaan Informasi:</label>
                     <input type="text" class="form-control" name="tujuan" id="tujuan" value="' . $data->tujuan . '"disabled>
                 </div>
                 <div class="form-group">
                     <label for="memperoleh_informasi">Cara Memperoleh Informasi:</label>
                     <input type="text" class="form-control" name="memperoleh_informasi" id="memperoleh_informasi" value="' . $data->memperoleh_informasi . '"disabled>
                 </div>
                 <div class="form-group">
                     <label for="mendapat_salinan">Cara Mendapatkan Salinan Informasi:</label>
                     <input type="text" class="form-control" name="mendapat_salinan" id="mendapat_salinan" value="' . $data->mendapat_salinan . '"disabled>
                 </div>
                 <div class="form-group">
                     <label for="petugas_penerima">Petugas Penerima:</label>
                     <input type="text" class="form-control" name="petugas_penerima" id="petugas_penerima" value="' . $data->petugas_penerima . '"disabled>
                 </div>
                 <div class="form-group">
                     <label for="status">Status Permohonan:</label>
                     <input type="text" class="form-control" name="status" id="status" value="' . $data->status . '"disabled>
                     </div>
                     
                <div class="form-group">
                     <a href="/formulir-pdf/' . $data->id . '" class="btn btn-primary">Unduh PDF</a>
</div>
                 ';

        return response()->json(['html' => $html]);
    }

    public function status($id)
    {
        $data = Form::leftJoin('pengguna', 'pengguna.id', 'forms.pengguna_id')
            ->select('forms.*', 'pengguna.nama', 'pengguna.nik', 'pengguna.no_telp')
            ->where('forms.id', $id)
            ->first();
        // dd($data);
        $html = '<div class="form-group">
                <label for="status">Pilih Status</label>
                <select class="form-control" name="status" id="editStatus" onchange="showReason()" >
                            <option selected>Pilih Status</option>
                            <option>--------------------------------</option>
                            <option value="Register">Register</option>
                            <option value="Penyiapan Data">Penyiapan Data</option>
                            <option value="Ditolak">Ditolak</option>
                            <option value="Data Siap Diserahkan">Data Siap Diserahkan</option>
                            <option value="Data Telah Diserahkan">Data Telah Diserahkan</option>
                </select>
                </div>
               <div class="form-group">
                     
                     <input type="hidden" class="form-control" name="user_id" id="user_id" value="' . auth()->user()->id . '"disabled>
                </div>
                <div class="form-group">
                    <label for="petugas_penerima">Petugas Penerima:</label>
                     <input type="text" class="form-control" name="petugas_penerima" id="editPetugas" value="' . auth()->user()->nama_lengkap . '"disabled>
                </div>
                <div class="form-group" id="reasonDiv" style="display:none;">
                    <label for="reason">Alasan Penolakan:</label>
                    <select class="form-control" name="status" id="editAlasan">
                    <option value="Informasi Dikecualikan" selected>Informasi Dikecualikan</option>
                    <option value="Informasi Tidak Dibawah Penguasaan" selected>Informasi Tidak Dibawah Penguasaan</option>
                    <option value="Informasi Belum Di Dokumentasikan" selected>Informasi Belum Di Dokumentasikan</option>
    
        </select>
                </div>
                 ';

        return response()->json(['html' => $html]);
    }


    public function unduhpdf($id)
    {

        // $id = $request->input('id');

        // dd($id);
        // $ttd = TandaTangan::find('user_id','=', );

        $pdf = Form::find($id);
        // dd($pdf);
        $datapdf = FacadePdf::loadView('formulirpdf', [
            'pdf' => $pdf
        ]);
        return $datapdf->stream('formulir-permohonan-informasi.pdf');
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // dd($request->all());
        $validator = Validator::make($request->all(), [
            'status' => 'required',
            'petugas_penerima' => 'required',
            'alasan' => '',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()->all()]);
        }

        $post = $request->all();
        
        if ($post['status'] !== "Ditolak"){
            $post["alasan"] = "";
        };

        // dd($post);
        $dataform = new Form;
        $dataform->updateData($id, $post);

        return response()->json(['success' => 'Article updated successfully']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
