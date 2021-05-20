<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ItemsAction extends Model
{
    use HasFactory;

    protected $fillable = [
        'item_id','tgl_action','action_desc'
    ];

    // dari departementnya  //Child (Many)
    public function item()
    {
        return $this->belongsTo('App\Models\Item','item_id','id');
    }

    // dari departementnya  //Child (Many)
    // public function divisi()
    // {
    //     return $this->belongsTo('App\Models\Divisi','divisi_kode','kode');
    // }
}
