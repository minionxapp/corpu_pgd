<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DokumenLink extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama',
        'jenis',
        'deskripsi',
        'pencarian',
        'status',
        'linkdok',
        'pemilik',
        'akses',
        'filename',
        'filename_real',
    ];

    
}
 