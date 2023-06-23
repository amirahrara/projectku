<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Pengguna;
use App\Models\Form;
use DataTables;
use DB;
use Illuminate\Support\Facades\Hash;

class DataAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {

            $dataRole = User::leftJoin('model_has_roles', 'model_has_roles.model_id', '=', 'users.id')
            ->leftJoin('roles', 'roles.id', '=', 'model_has_roles.role_id')
            ->select('users.*', 'roles.name', 'model_has_roles.*')
            ->get();

            // dd($dataRole);

            $users = User::all();
            // dd($users);
            return DataTables::of($dataRole)
                ->addColumn('nama_lengkap', function ($dataRole) {
                    return $dataRole->nama_lengkap;
                })
                ->addColumn('email', function ($dataRole) {
                    return $dataRole->email;
                })
                ->addColumn('jabatan', function ($dataRole) {
                    // dd($dataRole);
                    return $dataRole->jabatan;
                })
                // ->addColumn('action', function (){
                //     return 
                // })
                ->addColumn('action', function ($dataRole) {
                    
                        $btn = '<button type="button" name="delete" data-toggle="modal" data-target="#DeleteArticleModal" data-id="'.$dataRole->id.'" class="btn btn-danger btn-sm" id="getDeleteId">Hapus</button>';
                        // dd($dataRole->id);
                        return $btn;
                 })
                ->rawColumns(['action'])
                ->addIndexColumn()
                ->make(true);
        }

        $dataRoles = DB::table('model_has_roles')->select('*')->get();

        return view('admin.data.data-admin', compact('dataRoles'));

    }

    public function getDataAdmin(Request $request, User $user)
    {

        if ($request->ajax()) {
            $data = User::select('*');
            // $data = Form::leftJoin('pengguna', 'pengguna.id', 'forms.pengguna_id')
            //     ->select('forms.*', 'pengguna.nama', 'pengguna.nik', 'pengguna.no_telp')
            //     ->get();

            // dd($data);
            return Datatables::of($data)
                // ->addColumn('status', function ($row) {
                //     if ($row->status == '0') {
                //         $status = '<button style="pointer-events:none" class="btn btn-warning btn-sm">Belum Diproses</button>';
                //     } else {
                //         $status = '<button style="pointer-events:none" class="btn btn-info btn-sm">Sudah Diproses</button>';
                //     }
                //     return $status;
                // })
                ->addColumn('action', function ($data) {
                    return '<button type="button" class="btn btn-success btn-sm" id="getEditArticleData" data-id="' . $data->id . '">Tampilkan</button>';
                })
                ->editColumn('created_at', function ($data) {
                    return date('d-M-Y', strtotime($data->created_at));
                })
                ->rawColumns(['action'])
                // ->addIndexColumn()
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
    public function store(Request $request, User $user)
    {

        $data = $request->all();
       

        $objects = $user;
        $objects->nama_lengkap = $request->nama_lengkap;
        $objects->username = $request->username;
        $objects->jabatan = $request->jabatan;
        $objects->email = $request->email;
        $objects->password = Hash::make($request->password);
       

        // dd($request->all());
        $objects->save();
        $objects->assignRole($request->role_id);

        return response()->json([
            'success' => true,
            'message' => 'Data Berhasil Disimpan!',
            
        ]);

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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    
    // public function softDelete($id)
    // {
    //     $data= User::withTrashed()->findOrFail($id);
    //     // dd($id);
    //     $data->delete($id);
    //     return response()->json([
    //     'success' => 'Data deleted successfully!'
    // ]);
    // }
    public function destroy($id)
    {
        $data= User::find($id);
        // dd($id);
        $data->delete();
    return response()->json([
        'success' => 'Data deleted successfully!'
    ]);
    }
}
