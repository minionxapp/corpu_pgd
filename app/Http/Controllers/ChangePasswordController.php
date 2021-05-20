<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ChangePassword;
use App\Models\User;
use DataTables;
use Auth;
use Carbon;

class ChangePasswordController extends Controller
{

    public function changepassword()
    {
        return view('changepassword');
    }
    public function allChangePassword()
    {
        return Datatables::of(User::where('user_id','=',Auth::user()->user_id)->get())
            ->addColumn('action', function ($row) {
                // $btn = '<a href="#" onclick="viewFunction(\'' . $row->id . '\');" class="edit btn btn-info btn-sm">View</a> ';
                $btn =  ' <a href="#" onclick="editFunction(\'' . "" . '\');" class="edit btn btn-primary btn-sm">Change Password</a>';
                // $btn = $btn . ' <a href="/delChangePassword/' . $row->id . '" class="edit btn btn-danger btn-sm" onclick="return confirm(\'Yakin mau dihapus\');">Delete</a>';
                return $btn;
            })
            ->rawColumns(['action'])
            ->make(true);
    }


    public function getUserlogin()
    {
        $user = Auth::user();
        return $user;
    }


    public function addChangePassword(Request $request)
    {
        $model = new User();
        if ($request->id == null) {
            // $model->user_id = $request->user_id;
            // $model->password = $request->password;

            // $model->create_by = Auth::user()->user_id;
            // $model->save();
            // return redirect('/changepassword')->with('sukses', 'Data Berhasil di Simpan');
        } else {
            $modelUpdate = User::find($request->id);
            $modelUpdate->update_by = Auth::user()->user_id;
            $modelUpdate->password = bcrypt($request->password);
            $modelUpdate->update(array($modelUpdate));
            return redirect('/changepassword')->with('sukses', 'Update Berhasil di Simpan');
        }
    }

    public function getChangePasswordById($id)
    {
        $model = ChangePassword::find($id);
        return $model;
    }

    public function delChangePassword($id)
    {
        $model = ChangePassword::find($id);
        $model->delete();
        return redirect('/changepassword')->with('sukses', 'Data Berhasil dihapus');
    }
}
