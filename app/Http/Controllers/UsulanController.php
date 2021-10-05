<?php

namespace App\Http\Controllers;

use App\Models\Departement;
use Illuminate\Http\Request;
// use App\Http\Controllers\ProjectController;

use App\Models\Usulan;
use App\Models\Divisi;
use App\Models\Project;
use DataTables;
use Auth;
use Carbon;

// model
// Model
// 'no_srt','deskripsi','unit_usul','status','file_usul','file_usul_link','file_dispo',
// 'file_dispo_link','comment','deadline','jenis_usul','pic_usul','no_pic_usul',
// 'asign_to','pic_asign_to','asign_desc','create_by','update_by',   

class UsulanController extends Controller
{
public function usulan()
    {
        $divisi = Divisi::all();
        $user = Auth::user();
        $departemen = Departement::where('divisi_kode','=',$user->divisi)->get();
        return view('usulan',['divisi'=>$divisi,'departemen'=>$departemen]);
    }

public function allUsulan()
    {        
        // return DataTables::of(Usulan::where('status','=','Usul')->get())
        return DataTables::of(Usulan::all())
        ->addColumn('divisi', function($row){
            $divisi = Divisi::where('kode','=',$row->unit_usul)->first();
            return $divisi->nama;
        })
        
        ->addColumn('action', function($row){       
            $btn = '<a href="#" onclick="viewFunction(\''.$row->id.'\');" class="edit btn btn-info btn-sm">View</a> ';
            if ($row->status == "Usul" ) {
                $btn = $btn.' <a href="#" onclick="editFunction(\''.$row->id.'\');" class="edit btn btn-primary btn-sm">Edit</a>';
                $btn = $btn.' <a href="/delUsulan/'.$row->id.'" class="edit btn btn-danger btn-sm" onclick="return confirm(\'Yakin mau dihapus\');">Delete</a>';
            };
            if ($row->status == "OnProgress" ) {
                $btn = $btn.' <a href="#" onclick="editFunction(\''.$row->id.'\');" class="edit btn btn-primary btn-sm">Edit</a>';
                // $btn = $btn.' <a href="/delUsulan/'.$row->id.'" class="edit btn btn-danger btn-sm" onclick="return confirm(\'Yakin mau dihapus\');">Delete</a>';
            };
            
            // $btn = $btn.' <a href="#" onclick="prosesFunction(\''.$row->id.'\');" class="edit btn btn-primary btn-sm">Proses</a>';
            return $btn;        })
        ->rawColumns(['action','divisi'])
        ->make(true);
    }


public function addUsulan(Request $request)
    {
            $usulan = new Usulan;
            $usulan->no_srt = $request->no_srt;
            $usulan->deskripsi = $request->deskripsi;
            $usulan->unit_usul = $request->unit_usul;
           
            $usulan->file_usul_link = $request->file_usul_link;
            $usulan->tgl_surat = $request->tgl_surat;
            $usulan->file_dispo_link = $request->file_dispo_link;
            if($request->comment != '' || $request->comment != null){
                $usulan->comment = Carbon\Carbon::now().CHR(13).CHR(10).
                $request->comment. CHR(13).CHR(10).' '. CHR(13).CHR(10).$request->comment1;
            }
            // dd($usulan->comment);
                $usulan->mulai = $request->mulai;
                $usulan->selesai = $request->selesai;
            
            $usulan->jenis_usul ="Training" ;//$request->jenis_usul;
            $usulan->pic_usul = $request->pic_usul;
            $usulan->no_pic_usul = $request->no_pic_usul;
            $usulan->asign_to = $request->asign_to;
            $usulan->pic_asign_to = $request->pic_asign_to;
            $usulan->asign_desc = $request->asign_desc;
            // $usulan->status ='Usul' ;
            $usulan->status = $request->status;

            if($request->project_yn == "Y" && $request->project_id ==""){
                $project = new Project();
                // $usulan->status = $request->status;
                $usulan->project_yn = $request->project_yn;
                $usulan->project_id = Carbon\Carbon::now()->timestamp;
                $usulan->status ="OnProgress";

                // persiapan insert project ya 
                $project->kd_project = Carbon\Carbon::now()->timestamp;
                $project->nm_project = $usulan->deskripsi;
                $project->descripsi = $usulan->deskripsi;
                $project->divisi = '00001';
                $project->departement = $usulan->asign_to;
                $project->jenis = $usulan->jenis_usul;
                //carinama departement dan nama divisi ya
                $divisix = Divisi::where('kode', '=', $project->divisi)->get()->first();
                $project->nm_divisi = $divisix->nama;
                $project->nm_departement = (Departement::where('kode', '=', $project->departement)->get()->first())->nama;;
                $project->status='Not Start';
                $project->mulai =$usulan->mulai;
                $project->selesai=$usulan->selesai;
                $project->save();
            }

            if($request->hasfile('file_usul')){
                $request->file('file_usul')
                ->move('images/usul/',Carbon\Carbon::now()->timestamp.'_'.($request->file('file_usul')->getClientOriginalName()));
                $usulan->file_usul =Carbon\Carbon::now()->timestamp.'_'.($request->file('file_usul')->getClientOriginalName());//$request->file1;
            }
            
            if($request->hasfile('file_dispo')){
                $request->file('file_dispo')
                ->move('images/usul/',Carbon\Carbon::now()->timestamp.'_'.($request->file('file_dispo')->getClientOriginalName()));
                $usulan->file_dispo =Carbon\Carbon::now()->timestamp.'_'.($request->file('file_dispo')->getClientOriginalName());//$request->file1;
            }

            if($request->id == null ){   //baru 
                $usulan->create_by = Auth::user()->user_id;
                $usulan->status ='Usul' ;
                $usulan->save();
                // projectactivity                
                return redirect('/usulan')->with('sukses','Data Berhasil di Simpan');
            }else{//update
                $usulanUpdate = Usulan::find($request->id);
                $usulanUpdate->update_by = Auth::user()->user_id;
                // rubah --- biar didak tambah project untuk yg update



                // 
                $usulanUpdate->update($usulan->toArray());
                return redirect('/usulan')->with('sukses','Update Berhasil di Simpan');
            }
    }

    public function getUsulanById($id){
        $usulan = Usulan::find($id);
        return $usulan;
    }


    public function delUsulan($id)
    {
        $usulan = Usulan::find($id);
        $usulan->delete();
        return redirect('/usulan')->with('sukses','Data Berhasil dihapus');
        
    }
    

    public function usulanByStatus($status)
    {        
        
        return DataTables::of(Usulan::where('status','=',$status)->get())
        // return DataTables::of(Usulan::all())
        ->addColumn('divisi', function($row){
            $divisi = Divisi::where('kode','=',$row->unit_usul)->first();
            return $divisi->nama;
        })
        
        ->addColumn('action', function($row){       
            $btn = '<a href="#" onclick="viewFunction(\''.$row->id.'\');" class="edit btn btn-info btn-sm">View</a> ';
            if ($row->status == "Usul" ) {
                $btn = $btn.' <a href="#" onclick="editFunction(\''.$row->id.'\');" class="edit btn btn-primary btn-sm">Edit</a>';
                $btn = $btn.' <a href="/delUsulan/'.$row->id.'" class="edit btn btn-danger btn-sm" onclick="return confirm(\'Yakin mau dihapus\');">Delete</a>';
            };
            if ($row->status == "OnProgress" ) {
                $btn = $btn.' <a href="#" onclick="editFunction(\''.$row->id.'\');" class="edit btn btn-primary btn-sm">Edit</a>';
                // $btn = $btn.' <a href="/delUsulan/'.$row->id.'" class="edit btn btn-danger btn-sm" onclick="return confirm(\'Yakin mau dihapus\');">Delete</a>';
            };
            
            // $btn = $btn.' <a href="#" onclick="prosesFunction(\''.$row->id.'\');" class="edit btn btn-primary btn-sm">Proses</a>';
            return $btn;        })
        ->rawColumns(['action','divisi'])
        ->make(true);
    }


}
