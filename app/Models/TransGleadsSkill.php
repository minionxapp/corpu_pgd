<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransGleadsSkill extends Model
{
    use HasFactory;
    protected $table ="trans_gleads_skill";
    protected $fillable = ['program_name','skill_name','valid',
    'deskripsi','job_family','tot_jam',
    'jenis','fasilitator','tot_hari','mulai','selesai','venue','tot_peserta','nama_training',
    
];
}
