<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\JobFamily;
use DataTables;
use Auth;
use Carbon;

class JobFamilyController extends Controller
{

    public function JobFamily()
    {
        return view('admin.jobfamily');
    }
    public function allJobFamily()
    {
        return Datatables::of(JobFamily::all())
            ->addColumn('action', function ($row) {
                $btn = '<a href="#" onclick="viewFunction(\'' . $row->id . '\');" class="edit btn btn-info btn-sm">View</a> ';
                $btn = $btn . ' <a href="#" onclick="editFunction(\'' . $row->id . '\');" class="edit btn btn-primary btn-sm">Edit</a>';
                $btn = $btn . ' <a href="/delJobFamily/' . $row->id . '" class="edit btn btn-danger btn-sm" onclick="return confirm(\'Yakin mau dihapus\');">Delete</a>';
                return $btn;
            })
            ->rawColumns(['action'])
            ->make(true);
    }

    public function addJobFamily(Request $request)
    {
        $model = new JobFamily;
        if ($request->id == null) {
            $model->kode = $request->kode;
            $model->nama = $request->nama;

            $model->create_by = Auth::user()->user_id;
            $model->save();
            return redirect('/jobfamily')->with('sukses', 'Data Berhasil di Simpan');
        } else {
            $modelUpdate = JobFamily::find($request->id);
            $modelUpdate->update_by = Auth::user()->user_id;
            $modelUpdate->update($request->all());
            return redirect('/jobfamily')->with('sukses', 'Update Berhasil di Simpan');
        }
    }

    public function getJobFamilyById($id)
    {
        $model = JobFamily::find($id);
        return $model;
    }

    public function delJobFamily($id)
    {
        $model = JobFamily::find($id);
        $model->delete();
        return redirect('/jobfamily')->with('sukses', 'Data Berhasil dihapus');
    }
}
