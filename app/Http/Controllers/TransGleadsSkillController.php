<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TransGleadsSkill;
use DataTables;
use Auth;
use Carbon;
use App\Models\TransGleadsProgram;
use App\Models\JobFamily;
use App\Models\JenisTraining;

class TransGleadsSkillController extends Controller
{

    public function TransGleadsSkill()
    {
        // $programs = TransGleadsProgram::distinct()->get(['program_name']);
        $programs = TransGleadsProgram::where('valid','=','Y')->get();
        $jobFamily = JobFamily::all();
        $jenisTraining = JenisTraining::all();
        
        return view('admin.gleads.transgleadsskill',
        ['program'=>$programs,'jobFamily'=>$jobFamily,'jenisTraining'=>$jenisTraining]);
    }


    public function getTransGleadsSkillbyProgram($programName)
    {
        // dd($programName);
        if($programName=="ALL" ){
            return Datatables::of(TransGleadsSkill::all())
            ->addColumn('action', function ($row) {
            $btn = '<a href="#" onclick="viewFunction(\'' . $row->id . '\');" class="edit btn btn-info btn-sm">View</a> ';
            $btn = $btn . ' <a href="#" onclick="editFunction(\'' . $row->id . '\');" class="edit btn btn-primary btn-sm">Edit</a>';
            $btn = $btn . ' <a href="/delTransGleadsSkill/' . $row->id . '" class="edit btn btn-danger btn-sm" onclick="return confirm(\'Yakin mau dihapus\');">Delete</a>';
            return $btn;
        })
        ->rawColumns(['action'])
        ->make(true);
        }else{
            return Datatables::of(TransGleadsSkill::where('program_name','=',$programName))
            ->addColumn('action', function ($row) {
                $btn = '<a href="#" onclick="viewFunction(\'' . $row->id . '\');" class="edit btn btn-info btn-sm">View</a> ';
                $btn = $btn . ' <a href="#" onclick="editFunction(\'' . $row->id . '\');" class="edit btn btn-primary btn-sm">Edit</a>';
                $btn = $btn . ' <a href="/delTransGleadsSkill/' . $row->id . '" class="edit btn btn-danger btn-sm" onclick="return confirm(\'Yakin mau dihapus\');">Delete</a>';
                return $btn;
            })
            ->rawColumns(['action'])
            ->make(true);
        }
    }
    public function allTransGleadsSkill()
    {
        return Datatables::of(TransGleadsSkill::all())
            ->addColumn('action', function ($row) {
                $btn = '<a href="#" onclick="viewFunction(\'' . $row->id . '\');" class="edit btn btn-info btn-sm">View</a> ';
                $btn = $btn . ' <a href="#" onclick="editFunction(\'' . $row->id . '\');" class="edit btn btn-primary btn-sm">Edit</a>';
                $btn = $btn . ' <a href="/delTransGleadsSkill/' . $row->id . '" class="edit btn btn-danger btn-sm" onclick="return confirm(\'Yakin mau dihapus\');">Delete</a>';
                return $btn;
            })
            ->rawColumns(['action'])
            ->make(true);
    }

    public function addTransGleadsSkill(Request $request)
    {
        $model = new TransGleadsSkill;
        if ($request->id == null) {
            $model->program_name = $request->program_name;
            $model->skill_name = $request->skill_name;
            $model->valid = $request->valid;
            $model->deskripsi = $request->deskripsi;
            $model->job_family = $request->job_family;
            $model->tot_jam = $request->tot_jam;

            $model->jenis = $request->jenis;
            $model->fasilitator = $request->fasilitator;
            $model->tot_hari = $request->tot_hari;
            $model->mulai = $request->mulai;
            $model->selesai = $request->selesai;
            $model->venue = $request->venue;
            $model->tot_peserta = $request->tot_peserta;
            $model->nama_training = $request->nama_training;
            // $model-> = $request->;
            

            $model->create_by = Auth::user()->user_id;
            $model->save();
            return redirect('/transgleadsskill')->with('sukses', 'Data Berhasil di Simpan');
        } else {
            $modelUpdate = TransGleadsSkill::find($request->id);
            $modelUpdate->update_by = Auth::user()->user_id;
            $modelUpdate->update($request->all());
            return redirect('/transgleadsskill')->with('sukses', 'Update Berhasil di Simpan');
        }
    }

    public function getTransGleadsSkillById($id)
    {
        $model = TransGleadsSkill::find($id);
        return $model;
    }

    public function delTransGleadsSkill($id)
    {
        $model = TransGleadsSkill::find($id);
        $model->delete();
        return redirect('/transgleadsskill')->with('sukses', 'Data Berhasil dihapus');
    }
}
