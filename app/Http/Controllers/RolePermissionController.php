<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RolePermission;
use DataTables;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Auth;
use Carbon;

class RolePermissionController extends Controller
{

    public function RolePermission()
    {
        $role = Role::all();
        $permission = Permission::all();
        return view('admin.rolepermission',["roles"=>$role,'permissions'=>$permission]);
    }
    public function allRolePermission()
    {
        return Datatables::of(RolePermission::all())
        ->addColumn('rolename', function ($row) {
            $role = Role::find($row->role_id);
            return $role->name;
        })
        ->addColumn('permissionname', function ($row) {
            $permission = Permission::find($row->permission_id);
            return $permission->name;
        })
            ->addColumn('action', function ($row) {
                $btn = '<a href="#" onclick="viewFunction(\'' . $row->id . '\');" class="edit btn btn-info btn-sm">View</a> ';
                // $btn = $btn . ' <a href="#" onclick="editFunction(\'' . $row->id . '\');" class="edit btn btn-primary btn-sm">Edit</a>';
                // $btn = $btn . ' <a href="/delRolePermission/' . $row->id . '" class="edit btn btn-danger btn-sm" onclick="return confirm(\'Yakin mau dihapus\');">Delete</a>';
                $btn = $btn . ' <a href="/delRolePermission/' . $row->role_id .'/'.$row->permission_id .'" class="edit btn btn-danger btn-sm" onclick="return confirm(\'Yakin mau dihapus\');">Delete</a>';

                return $btn;
            })
            ->rawColumns(['action','rolename','permissionname'])
            ->make(true);
    }

    public function allPermissionByRole($role)
    {
        return Datatables::of(RolePermission::where('role_id','=',$role)->get())
        ->addColumn('rolename', function ($row) {
            $role = Role::find($row->role_id);
            return $role->name;
        })
        ->addColumn('permissionname', function ($row) {
            $permission = Permission::find($row->permission_id);
            return $permission->name;
        })
            ->addColumn('action', function ($row) {
                $btn = '<a href="#" onclick="viewFunction(\'' . $row->id . '\');" class="edit btn btn-info btn-sm">View</a> ';
                // $btn = $btn . ' <a href="#" onclick="editFunction(\'' . $row->id . '\');" class="edit btn btn-primary btn-sm">Edit</a>';
                $btn = $btn . ' <a href="/delRolePermission/' . $row->role_id .'/'.$row->permission_id .'" class="edit btn btn-danger btn-sm" onclick="return confirm(\'Yakin mau dihapus\');">Delete</a>';
                return $btn;
            })
            ->rawColumns(['action','rolename','permissionname'])
            ->make(true);
    }

    public function addRolePermission(Request $request)
    {
        $model = new RolePermission;
        if ($request->id == null) {
            $model->permission_id = $request->permission_id;
            $model->role_id = $request->role_id;

            $model->create_by = Auth::user()->user_id;

            // $user->assignRole('writer', 'admin');
            $role = Role::find($request->role_id);
            $permission = Permission::find($request->permission_id);
            $role->givePermissionTo($permission->name);
            // $model->save();
            return redirect('/rolepermission')->with('sukses', 'Data Berhasil di Simpan');
        } else {
            $modelUpdate = RolePermission::find($request->id);
            $modelUpdate->update_by = Auth::user()->user_id;
            $modelUpdate->update($request->all());
            return redirect('/rolepermission')->with('sukses', 'Update Berhasil di Simpan');
        }
    }

    public function getRolePermissionById($id)
    {
        $model = RolePermission::find($id);
        return $model;
    }

    public function delRolePermission($role_id,$permission_id)
    {
        $permission = Permission::find($permission_id);
        $role = Role::find($role_id);
          $role->revokePermissionTo($permission->name);
          
        return redirect('/rolepermission')->with('sukses', 'Data Berhasil dihapus');
    }
}
