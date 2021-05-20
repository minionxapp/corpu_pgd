<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Models\Role;

class UserRole extends Model
{
    use HasFactory;
    protected $table ="model_has_roles";



    // public function role()
    // {
    //     return $this->belongsTo('Spatie\Permission\Models\Role','role_id','role_id');
    // }

}
