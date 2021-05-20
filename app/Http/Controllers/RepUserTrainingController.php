<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DataTables;
use App\Models\GleadsModul;
use App\Models\GleadsModulMember;


class RepUserTrainingController extends Controller
{
    public function repUserTraining()
    {
        // $programs = GleadsModul::distinct()->get(['program_name']);
        // ,['divisi'=>$divisi]
        return view('report.repusertraining');//,['program'=>$programs]);
    }
    public function getTrainingByUser($nik)
    {        
        return Datatables::of(GleadsModulMember::where('user_id','=',$nik)->orderBy('program_name', 'DESC')
        ->orderBy('skill_name', 'DESC')
        ->orderBy('module_name', 'DESC'))
        ->addColumn('action', function($row){       
            $btn = '<a href="#" onclick="viewFunction(\''.$row->id.'\');" class="edit btn btn-info btn-sm">View</a> ';
            // $btn = $btn.' <a href="#" onclick="editFunction(\''.$row->id.'\');" class="edit btn btn-primary btn-sm">Edit</a>';
            // $btn = $btn.' <a href="/delDivisi/'.$row->id.'" class="edit btn btn-danger btn-sm" onclick="return confirm(\'Yakin mau dihapus\');">Delete</a>';
            return $btn;
        })
        ->rawColumns(['action'])
        ->make(true);
    }



    // =========================================
    public function getTrainingByNama($nama)
    {        
        return Datatables::of(GleadsModulMember::where('user_id','LIKE',"%"+$nama+"%")->orderBy('program_name', 'DESC')
        ->orderBy('skill_name', 'DESC')
        ->orderBy('module_name', 'DESC'))
        ->addColumn('action', function($row){       
            $btn = '<a href="#" onclick="viewFunction(\''.$row->id.'\');" class="edit btn btn-info btn-sm">View</a> ';
            // $btn = $btn.' <a href="#" onclick="editFunction(\''.$row->id.'\');" class="edit btn btn-primary btn-sm">Edit</a>';
            // $btn = $btn.' <a href="/delDivisi/'.$row->id.'" class="edit btn btn-danger btn-sm" onclick="return confirm(\'Yakin mau dihapus\');">Delete</a>';
            return $btn;
        })
        ->rawColumns(['action'])
        ->make(true);
    }
}
