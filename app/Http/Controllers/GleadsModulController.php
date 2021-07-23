<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\GleadsModul;
use App\Models\TransGleadsProgram;
use DataTables;
use Auth;
use Carbon;

class GleadsModulController extends Controller
{

    public function GleadsModul()
    {
        // $programs = GleadsModul::distinct()->get(['program_name']); 
        $programs = TransGleadsProgram::
        where('valid','=','Y')
        ->orderBy('program_name', 'ASC')
        ->get();      
        return view('training.modul',['program'=>$programs,'programName'=>'']);
    }

    public function GleadsModulProgram($program)
    {
        $programs = TransGleadsProgram::
        where('valid','=','Y')
        ->orderBy('program_name', 'ASC')
        ->get();      
        // GleadsModul::distinct()
        // ->orderBy('program_name', 'ASC')
        // ->get(['program_name']);       
        return view('training.modul',['program'=>$programs,'programName'=>$program]);
    }
    public function allGleadsModul()
    {
        return Datatables::of(GleadsModul::all())
            ->addColumn('action', function ($row) {
                $btn = '<a href="#" onclick="viewFunction(\'' . $row->id . '\');" class="edit btn btn-info btn-sm">View</a> ';
                $btn = $btn . ' <a href="#" onclick="editFunction(\'' . $row->id . '\');" class="edit btn btn-primary btn-sm">Edit</a>';
                $btn = $btn . ' <a href="/delGleadsModul/' . $row->id . '" class="edit btn btn-danger btn-sm" onclick="return confirm(\'Yakin mau dihapus\');">Delete</a>';
                return $btn;
            })
            ->rawColumns(['action'])
            ->make(true);
    }

    //untuk by skill
    public function getModulByProgram($skillNama)
    {
        if ($skillNama =='all'){
            return Datatables::of(GleadsModul::where('skill_name','=',$skillNama)->get())
            ->addColumn('action', function ($row) {
                $btn = '<a href="#" onclick="viewFunction(\'' . $row->id . '\');" class="edit btn btn-info btn-sm">View</a> ';
                $btn = $btn . ' <a href="#" onclick="editFunction(\'' . $row->id . '\');" class="edit btn btn-primary btn-sm">Edit</a>';
                $btn = $btn . ' <a href="/delGleadsModul/' . $row->id . '" class="edit btn btn-danger btn-sm" onclick="return confirm(\'Yakin mau dihapus\');">Delete</a>';
                return $btn;
            })
            ->rawColumns(['action'])
            ->make(true);
        }else{
            // disertakan detail pesertanya return Datatables::of(GleadsModul::with(['gleadsModulMember'])->where('program_name','=',$program))
            return Datatables::of(GleadsModul::where('skill_name','=',$skillNama))
            ->addColumn('action', function ($row) {
                $btn = '<a href="#" onclick="viewFunction(\'' . $row->id . '\');" class="edit btn btn-info btn-sm">View</a> ';
                $btn = $btn . ' <a href="#" onclick="editFunction(\'' . $row->id . '\');" class="edit btn btn-primary btn-sm">Edit</a>';
                $btn = $btn . ' <a href="/delGleadsModul/' . $row->id . '" class="edit btn btn-danger btn-sm" onclick="return confirm(\'Yakin mau dihapus\');">Delete</a>';
                return $btn;
            })
            ->rawColumns(['action'])
            ->make(true);
        }
    }

// 




    public function addGleadsModul(Request $request)
    {
        $model = new GleadsModul;
        if ($request->id == null) {
            $model->modul_id = $request->modul_id;
            $model->program_name = $request->program_name;
            $model->skill_name = $request->skill_name;
            $model->modul_name = $request->modul_name;
            $model->jamlat = $request->jamlat;
            $model->hitung = $request->hitung;
            $model->enrolled = $request->enrolled;
            $model->selesai = $request->selesai;
            $model->progress = $request->progress;
            $model->belum = $request->belum;
            $model->modul_type = $request->modul_type;
            $model->tahun = $request->tahun;
            $model->type_enroll = $request->type_enroll;
            $model->modul_id = $request->program_name.$request->skill_name.$request->modul_name;
            $model->create_by = Auth::user()->user_id;
            $model->modul_as_training = $request->modul_as_training;
            $model->nama_training = $request->nama_training;
            
            $model->save();
            return redirect('/gleadsmodul')->with('sukses', 'Data Berhasil di Simpan');
        } else {
            $modelUpdate = GleadsModul::find($request->id);
            $modelUpdate->update_by = Auth::user()->user_id;
            if($request->modul_as_training =='Ya'){
                $modelUpdate->nama_training = $modelUpdate->modul_name;
            }
            // modul_as_training
            $modelUpdate->update($request->all());
            return redirect('/gleadsmodul'."/".$modelUpdate->program_name)->with('sukses', 'Update Berhasil di Simpan');
        }
    }

    public function getGleadsModulById($id)
    {
        $model = GleadsModul::find($id);
        return $model;
    }

    public function delGleadsModul($id)
    {
        $model = GleadsModul::find($id);
        $model->delete();
        return redirect('/gleadsmodul')->with('sukses', 'Data Berhasil dihapus');
    }
}
