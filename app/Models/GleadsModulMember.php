<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\GleadsModul;

class GleadsModulMember extends Model
{
    use HasFactory;
    protected $table ='trans_data_gleads_temp';

    public function gleadsModul()
    {
        return $this->belongsTo('App\Models\GleadsModul','modul_id','modul_id');
    }
}
