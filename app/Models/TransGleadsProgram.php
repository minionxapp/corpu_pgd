<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransGleadsProgram extends Model
{
    use HasFactory;
    protected $table ="trans_gleads_program";
    protected $fillable = ['program_name','valid'];
}
