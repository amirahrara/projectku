<?php

namespace App\Exports;

use App\Models\Form;
use App\Models\Pengguna;
use Illuminate\Support\Facades\DB;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;

class DataExport implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        // return Pengguna::all();
    }
    public function view(): View
    {
        $data = DB::table('pengguna')
        ->join('forms', 'forms.pengguna_id', '=', 'pengguna.id')->latest('forms.created_at')->get();
        return view('excel',[
            'export' => $data
       
        ]);
       
        
    }
}
