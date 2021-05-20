<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DokumenLink;
use DataTables;
use Auth;
use Carbon;
use App\Models\Departement;
use App\Models\User;
use Illuminate\Support\Facades\Storage;
class DokumenLinkController extends Controller
{

    public function DokumenLink()
    {
        $userid = Auth::user();
        $departemen = Departement::where('kode','=',$userid->departemen)->get();
        return view('dokumen.dokumenlink',
        ['departemen'=>$departemen,'departemen_user'=>$userid]);
    }
    public function allDokumenLink()
    {
        $user = Auth::user();
        // return Datatables::of(DokumenLink::all())
        return Datatables::of(DokumenLink::where('pemilik','=',$user->departemen)
        ->orWhere('akses','=','all')
        ->orWhere('akses','=','All')
        ->orWhere('akses','=',null)
        ->orWhere('akses','=',$user->departemen)->get())
            ->addColumn('file', function($row){  
                $btn = '<a href="'.$row->linkdok.'"  class="edit btn btn-info btn-sm" target="_blank">Dokumen</a> ';
                return $btn;
            })
            ->addColumn('action', function ($row) {
                $btn = '<a href="#" onclick="viewFunction(\'' . $row->id . '\');" class="edit btn btn-info btn-sm">View</a> ';
                $btn = $btn . ' <a href="#" onclick="editFunction(\'' . $row->id . '\');" class="edit btn btn-primary btn-sm">Edit</a>';
                $btn = $btn . ' <a href="/delDokumenLink/' . $row->id . '" class="edit btn btn-danger btn-sm" onclick="return confirm(\'Yakin mau dihapus\');">Delete</a>';
                return $btn;
            })
            ->rawColumns(['action','file'])
            ->make(true);
    }
    public function dokumenLinkByCriteria($criteria)
    {
       
        $user = Auth::user();
        $col = 'akses';
        $param =array();
        if ($criteria == 'All') {
            array_push($param,"All");
            array_push($param,$user->departemen);
        } 
        if ($criteria == $user->departemen) {
            array_push($param,$user->departemen);
        } 
        if ($criteria == $user->user_id) {
            array_push($param,$user->user_id);
        } 
        // array_push($param,"dev");

        $data = Datatables::of(DokumenLink::// where('pemilik','=',$user->departemen)
            whereIn($col,$param)
            // ->orWhere($col,'=','All')
            // ->orWhere($col,'=',$user->departemen)
            ->get()
        )
            ->addColumn('file', function($row){  
                $btn = '<a href="'.$row->linkdok.'"  class="edit btn btn-info btn-sm" target="_blank">Dokumen</a> ';
                return $btn;
            })
            ->addColumn('action', function ($row) {
                $btn = '<a href="#" onclick="viewFunction(\'' . $row->id . '\');" class="edit btn btn-info btn-sm">View</a> ';
                $btn = $btn . ' <a href="#" onclick="editFunction(\'' . $row->id . '\');" class="edit btn btn-primary btn-sm">Edit</a>';
                $btn = $btn . ' <a href="/delDokumenLink/' . $row->id . '" class="edit btn btn-danger btn-sm" onclick="return confirm(\'Yakin mau dihapus\');">Delete</a>';
                return $btn;
            })
            ->rawColumns(['action','file'])
            ->make(true);
            return $data;
    }

    public function addDokumenLink(Request $request)
    {
        $model = new DokumenLink;
        if($request->hasfile('filename')){
            $fileName = Carbon\Carbon::now()->timestamp."_".$request->file('filename')->getClientOriginalName(); //Get Image Name
            $path = Storage::putFileAs(config('constant.uploadDoc'), $request->file('filename') , $fileName);
            $model->filename =Carbon\Carbon::now()->timestamp.'_'.($request->file('filename')->getClientOriginalName());//$request->file1;
            $model->filename_real = ($request->file('filename')->getClientOriginalName());
        }

        $model->nama = $request->nama;
        $model->jenis = $request->jenis;
        $model->deskripsi = $request->deskripsi;
        $model->pencarian = $request->pencarian;
        $model->status = $request->status;
        $model->tgl = $request->tgl;
        $model->linkdok = $request->linkdok;
        $model->pemilik = $request->pemilik;
        $model->akses = $request->akses;
        // $model->filename = $request->filename;
        
        $model->create_by = Auth::user()->user_id;
        if ($request->id == null) {
            $model->save();
            return redirect('/dokumenlink')->with('sukses', 'Data Berhasil di Simpan');
        } else {
            $modelUpdate = DokumenLink::find($request->id);
            $modelUpdate2 = DokumenLink::find($request->id);
            $modelUpdate->update_by = Auth::user()->user_id;
            if($request->hasfile('filename')){
                //bila ada file update 2 kali, update data dan update file
                $fileName = Carbon\Carbon::now()->timestamp."_".$request->file('filename')->getClientOriginalName(); //Get Image Name
                $path = Storage::putFileAs(config('constant.uploadDoc'), $request->file('filename') , $fileName);
                $modelUpdate->filename =$fileName;//Carbon\Carbon::now()->timestamp.'_'.($request->file('filename')->getClientOriginalName());//$request->file1;
                $modelUpdate->filename_real = ($request->file('filename')->getClientOriginalName());

                $userid = Auth::user();
                if ($modelUpdate->create_by == $userid->user_id){

                    $modelUpdate2->update($request->all());   //update data dari form
                    $modelUpdate->update(array($modelUpdate)); //update untuk nama filenya

                    return redirect('/dokumenlink')->with('sukses', 'Update Berhasil di Simpan');
                }else{
                    return redirect('/dokumenlink')->with('sukses', 'Update Gagal, Anda tidak berhak....');
                }
            }else{
                $userid = Auth::user();
                if ($modelUpdate->create_by == $userid->user_id){                    
                    $modelUpdate2->update($request->all());
                    return redirect('/dokumenlink')->with('sukses', 'Update Berhasil di Simpan');
                }else{
                    return redirect('/dokumenlink')->with('sukses', 'Update Gagal, Anda tidak berhak....');
                }
            }
            return redirect('/dokumenlink')->with('sukses', 'Update Berhasil di Simpan');
        }
    }

    public function getDokumenLinkById($id)
    {
        $model = DokumenLink::find($id);
        return $model;
    }

    public function delDokumenLink($id)
    {
        $userid = Auth::user();
        $model = DokumenLink::find($id);
        if ($model->create_by == $userid->user_id){
            $model->delete();
            return redirect('/dokumenlink')->with('sukses', 'Data Berhasil dihapus');
        }else{
            return redirect('/dokumenlink')->with('sukses', 'Hapus Gagal');
        }
    }
}
