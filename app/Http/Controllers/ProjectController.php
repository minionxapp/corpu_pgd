<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\Departement;
use App\Models\Divisi;
use DataTables;
use Auth;
use Carbon;

class ProjectController extends Controller
{

    public function Project()
    {
        return view('project');
    }

    public function projectByDivAndDept()
    {
        $user =  Auth::user();
        if ($user->hasRole('admin') == true){
            // dd('admin');
            return $this->allProject();
        }else{

            return Datatables::of(Project::where('divisi','=',$user->divisi)
            ->where('departement','=',$user->departemen)->get())
            ->addColumn('action', function ($row) {
                $btn = '<a href="#" onclick="viewFunction(\'' . $row->id . '\');" class="edit btn btn-info btn-sm">View</a> ';
                if ($row->status == 'Selesai') {                    
                }else{
                    $btn = $btn . ' <a href="#" onclick="editFunction(\'' . $row->id . '\');" class="edit btn btn-primary btn-sm">Edit</a>';
                    $btn = $btn . ' <a href="/delProject/' . $row->id . '" class="edit btn btn-danger btn-sm" onclick="return confirm(\'Yakin mau dihapus\');">Delete</a>';

                }
                return $btn;
            })
            ->addColumn('task', function ($row) {
                $task = '<a href="#" onclick="taskFunction(\'' . $row->id . '\');" class="edit btn btn-warning btn-sm">Task</a> ';
                return $task;
            })
            ->rawColumns(['action', 'task'])
            ->make(true);
        }
    }


    public function allProject()
    {
        return Datatables::of(Project::all())
            ->addColumn('action', function ($row) {
                $btn = '<a href="#" onclick="viewFunction(\'' . $row->id . '\');" class="edit btn btn-info btn-sm">View</a> ';
                $btn = $btn . ' <a href="#" onclick="editFunction(\'' . $row->id . '\');" class="edit btn btn-primary btn-sm">Edit</a>';
                $btn = $btn . ' <a href="/delProject/' . $row->id . '" class="edit btn btn-danger btn-sm" onclick="return confirm(\'Yakin mau dihapus\');">Delete</a>';
                return $btn;
            })
            ->addColumn('task', function ($row) {
                $task = '<a href="#" onclick="taskFunction(\'' . $row->id . '\');" class="edit btn btn-warning btn-sm">Task</a> ';
                return $task;
            })
            ->rawColumns(['action', 'task'])
            ->make(true);
    }
    //  btn-warning,danger,info
    public static  function addProject(Request $request)
    {
        $model = new Project;
        if ($request->id == null) {
            $model->kd_project = Carbon\Carbon::now()->timestamp;
            $model->nm_project = $request->nm_project;
            $model->descripsi = $request->descripsi;
            $model->divisi = $request->divisi;
            $model->departement = $request->departement;
            $model->jenis = $request->jenis;
            $model->pic = $request->pic;
            $model->mulai = $request->mulai;
            $model->selesai = $request->selesai;
            $model->status = $request->status;
            $divisix = Divisi::where('kode', '=', $request->divisi)->get()->first();
            $model->nm_divisi = $divisix->nama;
            $model->nm_departement = (Departement::where('kode', '=', $request->departement)->get()->first())->nama;;

            $model->create_by = Auth::user()->user_id;
            $model->save();
            return redirect('/project')->with('sukses', 'Data Berhasil di Simpan');
        } else {
            $modelUpdate = Project::find($request->id);
            $modelUpdate->update_by = Auth::user()->user_id;
            $modelUpdate->update($request->all());
            return redirect('/project')->with('sukses', 'Update Berhasil di Simpan');
        }
    }

    public function getProjectById($id)
    {
        $model = Project::find($id);
        return $model;
    }

    public function delProject($id)
    {
        $model = Project::find($id);
        if($model->status == 'Selesai'){
            return redirect('/project')->with('sukses', 'Data tidak bisa  dihapus');
        }
        $model->delete();
        return redirect('/project')->with('sukses', 'Data Berhasil dihapus');
    }

    public function projectByDivAndDeptAndStatus($status)
    {
        $user =  Auth::user();
        if ($user->hasRole('admin') == true){
            // dd('admin');
            return $this->allProject();
        }else{

            return Datatables::of(Project::where('divisi','=',$user->divisi)
            ->where('status','=',$status)
            ->where('departement','=',$user->departemen)->get())
            ->addColumn('action', function ($row) {
                $btn = '<a href="#" onclick="viewFunction(\'' . $row->id . '\');" class="edit btn btn-info btn-sm">View</a> ';
                if ($row->status == 'Selesai') {                    
                }else{
                    $btn = $btn . ' <a href="#" onclick="editFunction(\'' . $row->id . '\');" class="edit btn btn-primary btn-sm">Edit</a>';
                    $btn = $btn . ' <a href="/delProject/' . $row->id . '" class="edit btn btn-danger btn-sm" onclick="return confirm(\'Yakin mau dihapus\');">Delete</a>';

                }
                return $btn;
            })
            ->addColumn('task', function ($row) {
                $task = '<a href="#" onclick="taskFunction(\'' . $row->id . '\');" class="edit btn btn-warning btn-sm">Task</a> ';
                return $task;
            })
            ->rawColumns(['action', 'task'])
            ->make(true);
        }
    }

    
}
