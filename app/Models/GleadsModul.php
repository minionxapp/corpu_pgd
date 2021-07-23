<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\GleadsModulMember;

class GleadsModul extends Model
{
    use HasFactory;
    protected $table ="trans_gleads_module";
    //"gleads_modul";
    protected $fillable=["program_name","skill_name","modul_name","jamlat",
    "hitung","enrolled","selesai","progress","belum","modul_type","tahun",
    "type_enroll","modul_as_training","nama_training"];

    public function gleadsModulMember()
    {
        return $this->hasMany('App\Models\GleadsModulMember','modul_id','modul_id');
        // // FK-->divisi_kode pada table Chlid tablenya divisi-kolomnya kode, kode -->PK dari divisi
    }

}



