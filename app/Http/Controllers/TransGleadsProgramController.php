<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TransGleadsProgram;
use DataTables;
use Auth;
use Carbon;

class TransGleadsProgramController extends Controller
{

    public function TransGleadsProgram()
    {
        return view('admin.gleads.transgleadsprogram');
    }
    public function allTransGleadsProgram()
    {
        return Datatables::of(TransGleadsProgram::all())
            ->addColumn('action', function ($row) {
                $btn = '<a href="#" onclick="viewFunction(\'' . $row->id . '\');" class="edit btn btn-info btn-sm">View</a> ';
                $btn = $btn . ' <a href="#" onclick="editFunction(\'' . $row->id . '\');" class="edit btn btn-primary btn-sm">Edit</a>';
                $btn = $btn . ' <a href="/delTransGleadsProgram/' . $row->id . '" class="edit btn btn-danger btn-sm" onclick="return confirm(\'Yakin mau dihapus\');">Delete</a>';
                return $btn;
            })
            ->rawColumns(['action'])
            ->make(true);
    }

    public function addTransGleadsProgram(Request $request)
    {
        $model = new TransGleadsProgram;
        if ($request->id == null) {
            $model->program_name = $request->program_name;
            $model->valid = $request->valid;

            $model->create_by = Auth::user()->user_id;
            $model->save();
            return redirect('/transgleadsprogram')->with('sukses', 'Data Berhasil di Simpan');
        } else {
            $modelUpdate = TransGleadsProgram::find($request->id);
            $modelUpdate->update_by = Auth::user()->user_id;
            $modelUpdate->update($request->all());
            return redirect('/transgleadsprogram')->with('sukses', 'Update Berhasil di Simpan');
        }
    }

    public function getTransGleadsProgramById($id)
    {
        $model = TransGleadsProgram::find($id);
        return $model;
    }

    public function delTransGleadsProgram($id)
    {
        $model = TransGleadsProgram::find($id);
        $model->delete();
        return redirect('/transgleadsprogram')->with('sukses', 'Data Berhasil dihapus');
    }
}
