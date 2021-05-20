<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ticket;
use DataTables;
use Auth;
use Carbon\Carbon;


class TicketController extends Controller
{

    public function Ticket()
    {
        return view('helpdesk/ticket');
    }
    public function allTicket()
    {
        return Datatables::of(Ticket::where('status','!=','SLS')->get())
            ->addColumn('action', function ($row) {
                $btn = '<a href="#" onclick="viewFunction(\'' . $row->id . '\');" class="edit btn btn-info btn-sm">View</a> ';
                if (Auth::user() != null){
                    $btn = $btn . ' <a href="#" onclick="editFunction(\'' . $row->id . '\');" class="edit btn btn-primary btn-sm">Handle</a>';
                    // $btn = $btn . ' <a href="/delTicket/' . $row->id . '" class="edit btn btn-danger btn-sm" onclick="return confirm(\'Yakin mau dihapus\');">Delete</a>';
                } ;
                return $btn;
            })
            ->rawColumns(['action'])
            ->make(true);
    }

    public function addTicket(Request $request)
    {
        $model = new Ticket;
        if ($request->id == null) {
           
            $model->nik = $request->nik;
            $model->nama = $request->nama;
            $model->email = $request->email;
            $model->notelp = $request->notelp;
            $model->kategori = $request->kategori;
            $model->judul = $request->judul;
            $model->detail = $request->detail;
            // $model->model_id = $request->model_id;
            $model->status = "AJU";
            // $model->tgl_selesai = $request->tgl_selesai;
            // $model->prioritas = $request->prioritas;
            $model->create_by =$request->nik ;//Auth::user()->user_id;
            //simpan file 
            if($request->hasfile('file_sisipan')){
                $request->file('file_sisipan')
                ->move('images/ticket/',Carbon::now()->timestamp.'_'.($request->file('file_sisipan')->getClientOriginalName()));
                $model->file_sisipan =Carbon::now()->timestamp.'_'.($request->file('file_sisipan')->getClientOriginalName());//$request->file1;
            }
            $model->save();

            $model->no_tiket = $model->nik."-".$model->id;
            $model->update(array($model));
            return redirect('/ticket')->with('sukses', 'Data Berhasil di Simpan. Nomor Ticket ::'.$model->no_tiket);
        } else {
            $modelUpdate = Ticket::find($request->id);
            $modelUpdate->update_by = Auth::user()->user_id;
            if($request->status =='SLS'){
                $request->request->add(['tgl_selesai' => Carbon::now()]); //add request
            }
            $modelUpdate->update($request->all());
            return redirect('/tickethandle')->with('sukses', 'Update Berhasil di Simpan');
        }
    }

    public function getTicketById($id)
    {
        $model = Ticket::find($id);
        return $model;
    }

    public function delTicket($id)
    {
        $model = Ticket::find($id);
        $model->delete();
        return redirect('/ticket')->with('sukses', 'Data Berhasil dihapus');
    }

    public function TicketHadle()
    {
        return view('helpdesk/tickethandle');
    }
}
