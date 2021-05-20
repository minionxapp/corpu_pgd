<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\JenisTraining;
use DataTables;
use Auth;
use Carbon;

class JenisTrainingController extends Controller
{

    public function JenisTraining()
    {
        return view('training.jenis');
    }
    public function allJenisTraining()
    {
        return Datatables::of(JenisTraining::all())
            ->addColumn('action', function ($row) {
                $btn = '<a href="#" onclick="viewFunction(\'' . $row->id . '\');" class="edit btn btn-info btn-sm">View</a> ';
                $btn = $btn . ' <a href="#" onclick="editFunction(\'' . $row->id . '\');" class="edit btn btn-primary btn-sm">Edit</a>';
                $btn = $btn . ' <a href="/delJenisTraining/' . $row->id . '" class="edit btn btn-danger btn-sm" onclick="return confirm(\'Yakin mau dihapus\');">Delete</a>';
                return $btn;
            })
            ->rawColumns(['action'])
            ->make(true);
    }

    public function addJenisTraining(Request $request)
    {
        $model = new JenisTraining;
        if ($request->id == null) {
            $model->kode = $request->kode;
            $model->nama = $request->nama;

            $model->create_by = Auth::user()->user_id;
            $model->save();
            return redirect('/jenistraining')->with('sukses', 'Data Berhasil di Simpan');
        } else {
            $modelUpdate = JenisTraining::find($request->id);
            $modelUpdate->update_by = Auth::user()->user_id;
            $modelUpdate->update($request->all());
            return redirect('/jenistraining')->with('sukses', 'Update Berhasil di Simpan');
        }
    }

    public function getJenisTrainingById($id)
    {
        $model = JenisTraining::find($id);
        return $model;
    }

    public function delJenisTraining($id)
    {
        $model = JenisTraining::find($id);
        $model->delete();
        return redirect('/jenistraining')->with('sukses', 'Data Berhasil dihapus');
    }
}
