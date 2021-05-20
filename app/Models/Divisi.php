<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Departement;

class Divisi extends Model
{
    use HasFactory;
    protected $fillable = [
        'kode','nama','nik_kadiv','nama_kadiv','create_by','update_by'
    ];

    // dari divisi  //Parent (One)
    public function departement()
    {
        return $this->hasMany('App\Models\Departement','divisi_kode','kode');
        // // FK-->divisi_kode pada table Chlid tablenya divisi-kolomnya kode, kode -->PK dari divisi
    }

    // dari departementnya  //Child (Many)
    // public function divisi()
    // {
    //     return $this->belongsTo('App\Models\Divisi','divisi_kode','kode');
    // }
}
