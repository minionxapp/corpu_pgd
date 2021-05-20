<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id','jenis','nama','ket','status'
    ];

    //Parent (One)
    public function itemsaction()
    {
        return $this->hasMany('App\Models\ItemsAction','item_id','id');
        // // FK-->divisi_kode pada table Chlid tablenya divisi-kolomnya kode, kode -->PK dari divisi
    }


    // dari divisi  //Parent (One)
    // public function departement()
    // {
    //     return $this->hasMany('App\Models\Departement','divisi_kode','kode');
    //     // // FK-->divisi_kode pada table Chlid tablenya divisi-kolomnya kode, kode -->PK dari divisi
    // }

    // dari departementnya  //Child (Many)
    // public function divisi()
    // {
    //     return $this->belongsTo('App\Models\Divisi','divisi_kode','kode');
    // }
}
