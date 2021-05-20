<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use DataTables;
use App\Models\Divisi;
use App\Models\Departement;
use Auth;
class UserController extends Controller
{
    public function user()
      {
         $divisi = Divisi::all();
         return view('user',['divisis'=>$divisi]);
      }
   
   public function allUser()
   {
      {        
          return Datatables::of(User::all())
          ->addColumn('action', function($row){       
              $btn = '<a href="#" onclick="viewFunction(\''.$row->id.'\');" class="edit btn btn-info btn-sm">View</a> ';
              $btn = $btn.' <a href="#" onclick="editFunction(\''.$row->id.'\');" class="edit btn btn-primary btn-sm">Edit</a>';
              $btn = $btn.' <a href="/delDivisi/'.$row->id.'" class="edit btn btn-danger btn-sm" onclick="return confirm(\'Yakin mau dihapus\');">Delete</a>';
              return $btn;
          })
          ->rawColumns(['action'])
          ->make(true);
      }


   }

   public function addUser(Request $request)
   {
       $user = new User; 
       $user->user_id = $request->userid;     
       $user->name =$request->name;
       $user->email =$request->email;
       $user->bank =$request->bank;
       $user->norek =$request->norek;
       $user->divisi =$request->divisi;
       $user->departemen =$request->departemen;
       $user->password =bcrypt('12345678');
       $user->nama_divisi =(Divisi::where('kode','=',$request->divisi)->first())->nama;
       $user->nama_departemen =(Departement::where('kode','=',$request->departemen)->first())->nama;
       
       if($request->id == null ){
      
         $user->create_by = Auth::user()->user_id;
         $user->assignRole('user');
         $user->save();
         return redirect('/user')->with('sukses','Data Berhasil di Simpan');
     }else{
         $user->id = $request->id;
         $modelUpdate = User::find($request->id);
         $modelUpdate->update_by = Auth::user()->user_id;
         $request->merge(['nama_divisi'=>$user->nama_divisi]);
         $request->merge(['nama_departemen'=>$user->nama_departemen]);
        //  dd($request);
         $modelUpdate->update($request->all());
         return redirect('/user')->with('sukses','Update Berhasil di Simpan');
     }




      return redirect('user')->with('sukses','Data Berhasil di Simpan');
   }

   public function getUserById($id)
   {
       $user = User::find($id);
       return $user;
   }

   public function getUserByUserId($id)
   {
       $user = User::where("user_id","=",$id)->first();
       return $user;
   }

}
