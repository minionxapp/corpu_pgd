<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MakeTable;
use DataTables;
use Auth;
use Carbon;

class MakeTableController extends Controller
{

    public function MakeTable()
    {
        return view('admin.maketable');
    }
    public function allMakeTable()
    {
        return Datatables::of(MakeTable::all())
            ->addColumn('action', function ($row) {
                $btn = '<a href="#" onclick="viewFunction(\'' . $row->id . '\');" class="edit btn btn-info btn-sm">View</a> ';
                $btn = $btn . ' <a href="#" onclick="editFunction(\'' . $row->id . '\');" class="edit btn btn-primary btn-sm">Edit</a>';
                $btn = $btn . ' <a href="/delMakeTable/' . $row->id . '" class="edit btn btn-danger btn-sm" onclick="return confirm(\'Yakin mau dihapus\');">Delete</a>';
                return $btn;
            })
            ->rawColumns(['action'])
            ->make(true);
    }

    public function addMakeTable(Request $request)
    {
        $model = new MakeTable;
        if ($request->id == null) {
            $model->nama_table = $request->nama_table;
            $model->col1 = $request->col1;

            $model->create_by = Auth::user()->user_id;
            $model->save();
            return redirect('/maketable')->with('sukses', 'Data Berhasil di Simpan');
        } else {
            $modelUpdate = MakeTable::find($request->id);
            $modelUpdate->update_by = Auth::user()->user_id;
            $modelUpdate->update($request->all());
            return redirect('/maketable')->with('sukses', 'Update Berhasil di Simpan');
        }
    }

    public function getMakeTableById($id)
    {
        $model = MakeTable::find($id);
        return $model;
    }

    public function delMakeTable($id)
    {
        $model = MakeTable::find($id);
        $model->delete();
        return redirect('/maketable')->with('sukses', 'Data Berhasil dihapus');
    }
}
