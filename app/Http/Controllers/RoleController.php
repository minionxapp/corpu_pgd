<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use DataTables;
use Auth;
use Carbon;

class RoleController extends Controller
{

    public function Role()
    {
        return view('admin.role');
    }
    public function allRole()
    {
        return Datatables::of(Role::all())
            ->addColumn('action', function ($row) {
                $btn = '<a href="#" onclick="viewFunction(\'' . $row->id . '\');" class="edit btn btn-info btn-sm">View</a> ';
                // $btn = $btn . ' <a href="#" onclick="editFunction(\'' . $row->id . '\');" class="edit btn btn-primary btn-sm">Edit</a>';
                $btn = $btn . ' <a href="/delRole/' . $row->id . '" class="edit btn btn-danger btn-sm" onclick="return confirm(\'Yakin mau dihapus\');">Delete</a>';
                return $btn;
            })
            ->rawColumns(['action'])
            ->make(true);
    }

    public function addRole(Request $request)
    {
        // $model = new Role;
        if ($request->id == null) {
            // $model->name = $request->name;
            // $model->guard_name = $request->guard_name;
            // $model->create_by = Auth::user()->user_id;
            // $model->save();
            $role1 = Role::create(['name' => $request->name]);
            return redirect('/role')->with('sukses', 'Data Berhasil di Simpan');
        } else {
            // $modelUpdate = Role::find($request->id);
            // $modelUpdate->update_by = Auth::user()->user_id;
            // $modelUpdate->update($request->all());
            return redirect('/role')->with('sukses', 'Update Berhasil di Simpan');
        }
    }

    public function getRoleById($id)
    {
        $model = Role::find($id);
        return $model;
    }

    public function delRole($id)
    {
        $model = Role::find($id);
        $model->delete();
        return redirect('/role')->with('sukses', 'Data Berhasil dihapus');
    }
}
