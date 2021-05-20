<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DataTables;
use App\Models\GleadsModul;
use App\Models\GleadsModulMember;

class Rep01Controller extends Controller
{
    public function rep01()
    {
        $programs = GleadsModul::distinct()->get(['program_name']);
        return view('rep01',['program'=>$programs]);
    }

    public function getProgram(){
        $programs = GleadsModul::distinct()->get(['program_name']);
        dd($programs);
        return $programs;
    }

    public function getSkillByProgram($program,$tahun){
        $skills = GleadsModul::where('program_name','=',$program)
        ->where('tahun','=',$tahun)
        ->distinct()->get(['skill_name']);
        return $skills;
    }

    public function getmodulBySkill($program,$skill){
        $modul = GleadsModul::where('program_name','=',$program)
        ->where('skill_name','=',$skill)
        ->distinct()->get(['modul_name']);
        return $modul;
    }

    public function getUserByModul($program,$skill,$modul)
    {        
        return Datatables::of(GleadsModulMember::where('program_name','=',$program)
        ->where('skill_name','=',$skill)
        ->where('module_name','=',$modul)
        )
        ->addColumn('action', function($row){       
            $btn = '<a href="#" onclick="viewFunction(\''.$row->id.'\');" class="edit btn btn-info btn-sm">View</a> ';
            $btn = $btn.' <a href="#" onclick="editFunction(\''.$row->id.'\');" class="edit btn btn-primary btn-sm">Edit</a>';
            $btn = $btn.' <a href="/delDivisi/'.$row->id.'" class="edit btn btn-danger btn-sm" onclick="return confirm(\'Yakin mau dihapus\');">Delete</a>';
            return $btn;
        })
        ->rawColumns(['action'])
        ->make(true);
    }
}
