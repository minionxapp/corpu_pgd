<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use HasFactory;
    protected $fillable = [
      "no_tiket","nik","nama","email","notelp","kategori","judul","detail","model_id","status","tgl_selesai","prioritas","tindakan",
      "file_sisip"
    ];
}
