<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use DataTables;
use Auth;
use Carbon;

use Spatie\Permission\Models\Role;
// use Spatie\Permission\Models\Permission;



class PermissionController extends Controller
{

    public function Permission()
    {
        return view('admin.permission');
    }
    public function allPermission()
    {
        return Datatables::of(Permission::all())
            ->addColumn('action', function ($row) {
                $btn = '<a href="#" onclick="viewFunction(\'' . $row->id . '\');" class="edit btn btn-info btn-sm">View</a> ';
                // $btn = $btn . ' <a href="#" onclick="editFunction(\'' . $row->id . '\');" class="edit btn btn-primary btn-sm">Edit</a>';
                $btn = $btn . ' <a href="/delPermission/' . $row->id . '" class="edit btn btn-danger btn-sm" onclick="return confirm(\'Yakin mau dihapus\');">Delete</a>';
                return $btn;
            })
            ->rawColumns(['action'])
            ->make(true);
    }

    public function addPermission(Request $request)
    {
        // $model = new Permission;
        if ($request->id == null) {
            // $model->name = $request->name;
            // $model->guard_name = $request->guard_name;

            // $model->create_by = Auth::user()->user_id;
            // $model->save();

            $permission = Permission::create(['name' => $request->name]);
            return redirect('/permission')->with('sukses', 'Data Berhasil di Simpan');
        } else {
            $modelUpdate = Permission::find($request->id);
            $modelUpdate->update_by = Auth::user()->user_id;
            $modelUpdate->update($request->all());
            return redirect('/permission')->with('sukses', 'Update Berhasil di Simpan');
        }
    }

    public function getPermissionById($id)
    {
        $model = Permission::find($id);
        return $model;
    }

    public function delPermission($id)
    {
        $model = Permission::find($id);
        // $permission->removeRole($model->name);
        $model->delete();
        return redirect('/permission')->with('sukses', 'Data Berhasil dihapus');
    }
}
