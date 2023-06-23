<?php

namespace App\Models;

use App\Models\User;
//use Carbon\Carbon;
use App\Models\Pengguna;
use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Form extends Model
{
    use HasFactory;

    protected $table = 'forms';

    protected $guarded =['id'];

    public function getData()
    {
        return static::orderBy('created_at', 'desc')->get();
    }

    public function storeData($input)
    {
        return static::create($input);
    }

    public function findData($id)
    {
        return static::find($id);
    }

    public function updateData($id, $input)
    {
        return static::find($id)->update($input);
    }

    public function deleteData($id)
    {
        return static::find($id)->delete();
    }

    // protected static function boot()
    // {
    //     parent::boot();
    //     static::created(function ($surat) {
    //         $surat->nomor_surat = 'SUR/' . str_pad($surat->id, 5, '0', STR_PAD_LEFT);
    //         $surat->save();
    //     });
    // }

    public function pengguna(){
        return $this->belongsTo(Pengguna::class);
    }
    public function user(){
        return $this->belongsTo(User::class , 'user_id');
    }
    // protected $guarded =['id'];


    // public function getCreatedAttribute()
    // {
    //     return Carbon::parse($this->attributes['created_at'])->translatedFormat('l, d F Y');
    // }

}
