<?php

namespace App\Http\Controllers;

use App\Models\Usulan;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use DataTables;
use Auth;
use Carbon;
class RepUsulanController extends Controller
{
    public function RepUsulan()
    {
        $user = Auth::user();
        // dd($user);
        $usulan = Usulan::join('divisis','usulans.unit_usul','=','divisis.kode')
        ->where("asign_to","=",$user->departemen)->get();
        // join('trans_gleads_skill','trans_data_gleads_temp.skill_name',
        // '=','trans_gleads_skill.skill_name')
   


        return view('report.rep_usulan',['repusul'=>$usulan]);
    }
}
