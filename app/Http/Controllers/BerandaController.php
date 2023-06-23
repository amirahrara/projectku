<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Admin;
// use App\Models\User;
use App\Models\Form;
use Illuminate\Http\Request;
// use App\Models\Form;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Facade;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\DataExport;
use App\Models\TandaTangan;

class BerandaController extends Controller
{
    public function indexadmin(){

        $user = User::all();
        $ttd = TandaTangan::all();
        $userID = TandaTangan::where('user_id', '=', Auth()->user()->id)->get();
        // $us = Auth()->user()->id;
        // dd($us);
        
        return view('admin.dashboard', compact('user', 'ttd', 'userID'));
        

        // $data = DB::table('pengguna')
        // ->join('forms', 'forms.pengguna_id', '=', 'pengguna.id')->latest('forms.created_at')->get();
        // return view('admin.dashboard',[
        //     'data' => $data
        // ]);
    }

    public function cari(Request $request){
        $cari = $request->cari;
        $data = DB::table('pengguna')
        ->join('forms', 'forms.pengguna_id', '=', 'pengguna.id')
        ->where('nama','like',"%".$cari."%")
        ->orWhere('nik', 'like',"%".$cari."%")
        ->latest('forms.created_at')
                    ->paginate();
        return view('admin.dashboard',[
            'data' => $data
        ]);
    }

    public function tambahAdmin()
    {
        return view('admin.tambahAdmin', [
            'title'=>'Tambahkan',
            'active'=>'tambahkan'
        ]);
    }

    public function store(Request $request)
    {
        $validatedData= $request ->validate([
            'namalengkap'=>'required|max:255',
            'username'=>'required|unique:users',
            'jabatan'=>'required',
            'password'=>'required|min:5|max:255',
        ]);
        $validatedData['password']= Hash::make($validatedData['password']);

        User::create($validatedData);

        return redirect('/admin/tambah-admin')->with('berhasil', 'Admin berhasil ditambahkan!!');
    }


    public function dataAdmin(){
        return view('admin.dataAdmin');
    }

   

}
// public function getDataUser(Request $request)
// {
//     if ($request->ajax()) {

//         $dataUser =DB::table('forms')->leftJoin('users', 'users.id', '=', 'forms.user_id')
//         ->select('*')
//         ->get();

//         // dd($dataUser);

//         // $data = User::latest()->get();
//         return DataTables::of($dataUser)
//             ->addIndexColumn()
//             ->addColumn('nama', function($dataUser){
//                 $nama = $dataUser->nama;
//                 // dd($nama);
//                 return $nama;
//             })
//             ->addColumn('no_telp', function($dataUser){
//                 $no_telp = $dataUser->no_telp;
//                 // dd($no_telp);
//                 return $no_telp;
//             })
//             ->addColumn('action', function($row){
//                 $actionBtn = '<a href="javascript:void(0)" class="edit btn btn-success btn-sm">Edit</a> <a href="javascript:void(0)" class="delete btn btn-danger btn-sm">Delete</a>';
//                 return $actionBtn;
//             })
//             ->rawColumns(['action'])
//             ->make(true);
//     }
// }
