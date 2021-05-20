<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DesainTraining extends Model
{
    protected $fillable = [
        "id",
        "kode",
        "nama",
        "jenis_taining",
        "kelompok",
        "latar_tujuan",
        "deskripsi",
        "kriteria_peserta",
        "fasilitator",
        "jml_hari",
        "jml_jamlat",
        "tempat",
        "tgl_mulai",
        "tgl_selesai",
        "metode",
        "jml_peserta",
        "penilaian",
        "investasi",
        "pre_class",
        "post_class",
        "pengusul",
        "approval",
        "created_at",
        "updated_at",
        "create_by",
        "update_by",

    ];
    use HasFactory;
}
