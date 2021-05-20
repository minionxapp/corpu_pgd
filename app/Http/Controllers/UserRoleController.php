<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\UserRole;
use Spatie\Permission\Models\Role;
use DataTables;
// use Spatie\Permission\Contracts\Role;
use Auth;
use Carbon;

class UserRoleController extends Controller
{

    public function UserRole()
    {
        // dd(Auth::user()->roles->pluck('name','id')) ;
        $role = Role::all();
        $users = User::all();
        return view('admin.userrole',["roles"=>$role,"users"=>$users]);
    }
    public function allUserRole()
    {
        return Datatables::of(UserRole::all())//with('Role')->get())
        ->addColumn('rolename',function($row){
            $role = Role::find($row->role_id);
            return $role->name;
        })
        ->addColumn('userId',function($row){
            $userid = User::find($row->model_id);
            return $userid->user_id;
        })
            ->addColumn('action', function ($row) {
                $btn = '<a href="#" onclick="viewFunction(\'' . $row->id . '\');" class="edit btn btn-info btn-sm">View</a> ';
                $btn = $btn . ' <a href="#" onclick="editFunction(\'' . $row->id . '\');" class="edit btn btn-primary btn-sm">Edit</a>';
                $btn = $btn . ' <a href="/delUserRole/' . $row->role_id . '/'.$row->model_id.'" class="edit btn btn-danger btn-sm" onclick="return confirm(\'Yakin mau dihapus\');">Delete</a>';
                return $btn;
            })
            ->rawColumns(['rolename','userId','action'])
            ->make(true);
    }



    public function roleByUserId($userId)
    {
        return Datatables::of(UserRole::where('model_id','=',$userId)->get())//with('Role')->get())
        ->addColumn('rolename',function($row){
            $role = Role::find($row->role_id);
            if ($role != null){
                return $role->name;

            }else{return "";}
        })
        ->addColumn('userId',function($row){
            $userid = User::find($row->model_id);
            if ($userid != null){
                return $userid->user_id;

            }else{return "";}
        })
            ->addColumn('action', function ($row) {
                $btn = '<a href="#" onclick="viewFunction(\'' . $row->id . '\');" class="edit btn btn-info btn-sm">View</a> ';
                $btn = $btn . ' <a href="#" onclick="editFunction(\'' . $row->id . '\');" class="edit btn btn-primary btn-sm">Edit</a>';
                $btn = $btn . ' <a href="/delUserRole/' . $row->role_id .'/'.$row->model_id. '" class="edit btn btn-danger btn-sm" onclick="return confirm(\'Yakin mau dihapus\');">Delete</a>';
                return $btn;
            })
            ->rawColumns(['action','userId','rolename'])
            ->make(true);
    }
    public function addUserRole(Request $request)
    {
        $model = new UserRole;
        if ($request->id == null) {
            $model->role_id = $request->role_id;
            $model->model_type = "App\Models\User";//$request->model_type;
            $model->model_id = $request->model_id;

            $user = User::find($request->model_id);
            $role = Role::find($request->role_id);
            $user->assignRole($role->name);
            // $model->save();
            return redirect('/userrole')->with('sukses', 'Data Berhasil di Simpan');
        } else {
            $modelUpdate = UserRole::find($request->id);
            $modelUpdate->update_by = Auth::user()->user_id;
            $modelUpdate->update($request->all());
            return redirect('/userrole')->with('sukses', 'Update Berhasil di Simpan');
        }
    }

    public function getUserRoleById($id)
    {
        $model = UserRole::find($id);
        return $model;
    }

    public function delUserRole($role_id,$model_id)
    {
        // $model = UserRole::find($id);
        // $model = UserRole::where("role_id","=",$role_id)->where("model_id","=",$model_id)->first();
        // UserRole::where('model_id','=',$userId)->get()
        $user = User::find($model_id);
        $role = Role::find($role_id);
        $user->removeRole($role->name);
        // dd($user);

        // $model->delete();
        return redirect('/userrole')->with('sukses', 'Data Berhasil dihapus');
    }
}
