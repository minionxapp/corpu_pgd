<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use DataTables;
use App\Models\GleadsModul;
use App\Models\GleadsModulMember;
use App\Models\TransKaryawan;
use App\Models\TransModulPegawai;
use App\Models\User;
use GleadsModul as GlobalGleadsModul;
use Illuminate\Foundation\Auth\User as IlluminateUser;

// use GleadsModul as GlobalGleadsModul;


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
        return Datatables::of(GleadsModulMember::where('user_id','=',$nik)
        ->orderBy('program_name', 'DESC')
        ->orderBy('skill_name', 'DESC')
        ->orderBy('module_name', 'DESC'))
        ->addColumn('action', function($row){       
            $btn = '<a href="#" onclick="viewFunction(\''.$row->id.'\');" class="edit btn btn-info btn-sm">View</a> ';
            // $btn = $btn.' <a href="#" onclick="editFunction(\''.$row->id.'\');" class="edit btn btn-primary btn-sm">Edit</a>';
            // $btn = $btn.' <a href="/delDivisi/'.$row->id.'" class="edit btn btn-danger btn-sm" onclick="return confirm(\'Yakin mau dihapus\');">Delete</a>';
            return $btn;
        })
        ->addColumn('nama_training', function($row){    
            $modul = GleadsModul::where('modul_name','=',$row->module_name)->first();
            // dd($row->module_name); 
            return $modul->nama_training;
        })


       
        ->rawColumns(['action','nama_training'])
        ->make(true);
    }



    // =========================================
    public function getTrainingByNama($nama)
    {        
        return Datatables::of(GleadsModulMember::where('user_id','LIKE',"%"+$nama+"%")
        ->orderBy('program_name', 'DESC')
        ->orderBy('skill_name', 'DESC')
        ->orderBy('module_name', 'DESC'))
        ->addColumn('action', function($row){       
            $btn = '<a href="#" onclick="viewFunction(\''.$row->id.'\');" class="edit btn btn-info btn-sm">View</a> ';
            return $btn;
        })
        ->rawColumns(['action'])
        ->make(true);
    }


    public function cetakUserTraining($nik){
// // JOIN 3 TABLE
    $userTraining =  GleadsModulMember::
    join('trans_gleads_skill','trans_data_gleads_temp.skill_name','=','trans_gleads_skill.skill_name')
    ->join('trans_gleads_module','trans_data_gleads_temp.modul_id','=','trans_gleads_module.modul_id')
    ->where('user_id','=',$nik)
    ->where('trans_gleads_skill.valid','=','Y')
    ->where('trans_gleads_module.valid','=','Y')
    ->orderBy('jenis', 'DESC')
    ->orderBy('trans_data_gleads_temp.completed_on', 'ASC')
    ->get(['trans_data_gleads_temp.user_id',
            'trans_data_gleads_temp.user_name',
            'trans_gleads_skill.skill_name',
            'trans_gleads_module.nama_training',
            'trans_gleads_skill.mulai',
            'trans_gleads_skill.selesai',
            'trans_gleads_skill.jenis',
            'trans_gleads_module.modul_name',
            'trans_gleads_skill.program_name',
            'trans_data_gleads_temp.completed_on',
            'trans_gleads_skill.nama_training as skill_training'
        ]);
       //Table pegawai belum ada
       $karyawan = TransKaryawan::where('NIP','=',$nik)->first();
       
       $trainingAll =  GleadsModulMember::all();
       $no = 0;
       Log::debug('Mulai...........');
        foreach ($trainingAll as $item) {
            $records = json_decode($item, true);
            $modulPegawai = new TransModulPegawai($records);
            // dd($item);
            // $modulPegawai = $item;
            // $modulPegawai->user_id=$item->user_id;
            // $modulPegawai->user_name=$item->user_name;
            // $modulPegawai->email=$item->email;
            // $modulPegawai->mobile_number=$item->mobile_number;
            // $modulPegawai->user_status=$item->user_status;
            // $modulPegawai->module_name=$item->module_name;
            // $modulPegawai->module_type=$item->module_type;
            // $modulPegawai->primary_tag=$item->primary_tag;
            // $modulPegawai->secondary_tag=$item->secondary_tag;
            // $modulPegawai->estimated_duration=$item->estimated_duration;
            // $modulPegawai->time_spent=$item->time_spent;
            // $modulPegawai->enrollment_type=$item->enrollment_type;
            // $modulPegawai->module_status=$item->module_status;
            // $modulPegawai->completion_percentage=$item->completion_percentage;
            // $modulPegawai->enrolled_on=$item->enrolled_on;
            // $modulPegawai->started_on=$item->started_on;
            // $modulPegawai->completed_on=$item->completed_on;
            // $modulPegawai->last_accessed_on=$item->last_accessed_on;
            // $modulPegawai->is_complete=$item->is_complete;
            // $modulPegawai->program_name=$item->program_name;
            // $modulPegawai->skill_name=$item->skill_name;
            // $modulPegawai->assessment_count=$item->assessment_count;
            // $modulPegawai->pass_count=$item->pass_count;
            // $modulPegawai->average_score=$item->average_score;
            // $modulPegawai->designation=$item->designation;
            // $modulPegawai->department=$item->department;
            // $modulPegawai->sub_department=$item->sub_department;
            // $modulPegawai->location=$item->location;
            // $modulPegawai->grade=$item->grade;
            // $modulPegawai->change_agent=$item->change_agent;
            // $modulPegawai->created_at=$item->created_at;
            // $modulPegawai->updated_at=$item->updated_at;
            // $modulPegawai->create_by=$item->create_by;
            // $modulPegawai->update_by=$item->update_by;
            // $modulPegawai->modul_id=$item->modul_id;
            // $modulPegawai->last_update=$item->last_update;
            
            $modulPegawai->save();
            $no++;
        }
        Log::debug($no.'  '.$item->user_id.' '.$item->user_name);


        Log::debug('Selesai...............');
        return view('report/repusertrainingcetak',['karyawan'=>$karyawan,'nik'=>$nik,'usertraining'=>$userTraining]);
        // return view('report.repusertraining');//,['program'=>$programs]);
    }
}
