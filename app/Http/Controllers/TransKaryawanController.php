<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TransKaryawan;
use DB;

class TransKaryawanController extends Controller
{
    function carikaryawan($nik){
        $karyawan = DB::table('trans_karyawan')->select('NIP', 'NAMA_KARYAWAN','EMAIL_1')
        ->where('NIP', '=', $nik)->first();
        // dd($karyawan);
        return response()->json($karyawan);
    }
}
