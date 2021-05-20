<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MakeTable extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama_table','col1'
    ];
}
