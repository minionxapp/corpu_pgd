<?php

namespace App\Http\Controllers;

use App\Models\Departement;
use Illuminate\Http\Request;
use App\Models\Event;
use DataTables;
use App\Models\Divisi;
use App\Models\JenisTraining;
use Auth;
use Carbon;

class EventController extends Controller
{

    public function Event()
    {
        $user = Auth::user();
    //    dd($this->isAdmin('admin'));
        if($this->isAdmin('admin')){
            $divisis = Divisi::all();
            $depatements = Departement::all();
        }else{
            $divisis = Divisi::where('kode','=',$user->divisi)->get();
            $depatements = Departement::where('kode','=',$user->departemen)->get();
        }


        $jenistrainings = JenisTraining::all();
        
        return view('training.event',['divisis'=>$divisis,
        'departements'=>$depatements,'jenistrainings'=>$jenistrainings]);
    }


    public function isAdmin($role) {

        return Auth::user()->hasRole($role);
    }



    
    public function allEvent()
    {
        return Datatables::of(Event::all())
            ->addColumn('action', function ($row) {
                $btn = '<a href="#" onclick="viewFunction(\'' . $row->id . '\');" class="edit btn btn-info btn-sm">View</a> ';
                $btn = $btn . ' <a href="#" onclick="editFunction(\'' . $row->id . '\');" class="edit btn btn-primary btn-sm">Edit</a>';
                $btn = $btn . ' <a href="/delEvent/' . $row->id . '" class="edit btn btn-danger btn-sm" onclick="return confirm(\'Yakin mau dihapus\');">Delete</a>';
                return $btn;
            })
            ->addColumn('divisi_name', function ($row) {
                $divisi = Divisi::where('kode','=',$row->divisi_kode)->first();
                return $divisi->nama;
            })
            ->addColumn('departement_name', function ($row) {
                $departement = Departement::where('kode','=',$row->departement_kode)->first();
                return $departement->nama;
            })
            ->rawColumns(['action','divisi_name','departement_name'])
            ->make(true);
    }

    public function addEvent(Request $request)
    {
        $model = new Event;
        if ($request->id == null) {
            $model->jenis = $request->jenis;
            $model->divisi_kode = $request->divisi_kode;
            $model->departement_kode = $request->departement_kode;
            $model->judul = $request->judul;
            $model->deskripsi = $request->deskripsi;
            $model->mulai = $request->mulai;
            $model->selesai = $request->selesai;
            $model->tahun = $request->tahun;

            $model->create_by = Auth::user()->user_id;
            $model->save();
            return redirect('/event')->with('sukses', 'Data Berhasil di Simpan');
        } else {
            $modelUpdate = Event::find($request->id);
            if($modelUpdate->create_by == Auth::user()->user_id){
                $modelUpdate->update_by = Auth::user()->user_id;
                $modelUpdate->update($request->all());
                return redirect('/event')->with('sukses', 'Update Berhasil di Simpan');
            }else{
                return redirect('/event')->with('sukses', 'Edit Gagal, anda tidak punya hak');
            }
        }
    }

    public function getEventById($id)
    {
        $model = Event::find($id);
        return $model;
    }

    public function delEvent($id)
    {
        $model = Event::find($id);
        if($model->create_by == Auth::user()->user_id){
            $model->delete();
            return redirect('/event')->with('sukses', 'Data Berhasil dihapus');

        }else{
            return redirect('/event')->with('sukses', 'Hapus Gagal, anda tidak punya hak');
        }
    }
}
