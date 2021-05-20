<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Departement;
class Event extends Model
{
    use HasFactory;
    // protected $table='corpu_events';
    protected $fillable = ['id','jenis', 'divisi_kode','departement_kode','judul','deskripsi','mulai','selesai','tahun' ];
    public function departement()
    {
        return $this->belongsTo('App\Models\Departement','departement_kode','kode');
    }

    public function divisi()
    {
        return $this->belongsTo('App\Models\Divisi','divisi_kode','kode');
    }
}
