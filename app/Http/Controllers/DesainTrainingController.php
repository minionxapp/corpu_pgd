<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DesainTraining;
use App\Models\Departement;
use App\Models\JenisTraining;
use App\Models\JobFamily;
use DataTables;
use Auth;
use Carbon;

class DesainTrainingController extends Controller
{

    public function DesainTraining()
    {
        $departemen = Departement::all();
        $jenistraining = JenisTraining::all();
        $jobfamily = JobFamily::all();
        // return view('dokumen.dokumenlink',['departemen'=>$departemen,'departemen_user'=>$userid]);
        return view('training.desain',['jenistraining'=>$jenistraining,
                    'departemen'=>$departemen,
                    'jobfamily'=>$jobfamily]);
    }



    public function allDesainTraining()
    {
        return Datatables::of(DesainTraining::all())
            ->addColumn('action', function ($row) {
                $btn = '<a href="#" onclick="viewFunction(\'' . $row->id . '\');" class="edit btn btn-info btn-sm">View</a> ';
                $btn = $btn . ' <a href="#" onclick="editFunction(\'' . $row->id . '\');" class="edit btn btn-primary btn-sm">Edit</a>';
                $btn = $btn . ' <a href="/delDesainTraining/' . $row->id . '" class="edit btn btn-danger btn-sm" onclick="return confirm(\'Yakin mau dihapus\');">Delete</a>';
                return $btn;
            })
            ->addColumn('deptnamen', function ($row) {
                $dept = Departement:: where("kode","=",$row->pengusul)->first();
                return $dept->nama;
            })
            ->rawColumns(['action','deptnamen'])
            ->make(true);
    }

    public function addDesainTraining(Request $request)
    {
        $model = new DesainTraining;
        if ($request->id == null) {
            $model->kode = $request->kode;
            $model->nama = $request->nama;
            $model->jenis_taining = $request->jenis_taining;
            $model->kelompok = $request->kelompok;
            $model->latar_tujuan = $request->latar_tujuan;
            $model->deskripsi = $request->deskripsi;
            $model->kriteria_peserta = $request->kriteria_peserta;
            $model->fasilitator = $request->fasilitator;
            $model->jml_hari = $request->jml_hari;
            $model->jml_jamlat = $request->jml_jamlat;
            $model->tempat = $request->tempat;
            $model->tgl_mulai = $request->tgl_mulai;
            $model->tgl_selesai = $request->tgl_selesai;
            $model->metode = $request->metode;
            $model->jml_peserta = $request->jml_peserta;
            $model->penilaian = $request->penilaian;
            $model->investasi = $request->investasi;
            $model->pre_class = $request->pre_class;
            $model->post_class = $request->post_class;
            $model->pengusul = $request->pengusul;
            $model->approval = $request->approval;

            $model->create_by = Auth::user()->user_id;
            $model->save();
            return redirect('/desaintraining')->with('sukses', 'Data Berhasil di Simpan');
        } else {
            $modelUpdate = DesainTraining::find($request->id);
            $modelUpdate->update_by = Auth::user()->user_id;
            $modelUpdate->update($request->all());
            return redirect('/desaintraining')->with('sukses', 'Update Berhasil di Simpan');
        }
    }

    public function getDesainTrainingById($id)
    {
        $model = DesainTraining::find($id);
        return $model;
    }

    public function delDesainTraining($id)
    {
        $model = DesainTraining::find($id);
        $model->delete();
        return redirect('/desaintraining')->with('sukses', 'Data Berhasil dihapus');
    }

    public function cetakDesainTraining($id)
    {
        $departemen = Departement::all();
        $jenistraining = JenisTraining::all();
        $desain = DesainTraining::find($id);
        // return view('dokumen.dokumenlink',['departemen'=>$departemen,'departemen_user'=>$userid]);
        // return view('training.cetakdesain',['jenistraining'=>$jenistraining,'departemen'=>$departemen]);
        return view('training.cetakdesain',['desain'=>$desain]);
    }




}
