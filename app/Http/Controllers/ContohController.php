<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\Gambar;
use Illuminate\Support\Facades\Mail;
use App\Mail\ModelEmail;
// use League\Flysystem\File;
use Illuminate\Support\Facades\File;

class ContohController extends Controller
{
    public function autocomplete()
    {
        return view('example.autocomplete'); //,['program'=>$programs]);
    }
    //cari data user
    public function cariData(Request $request)
    {
        if ($request->has('q')) {
            $cari = $request->q;
            $data = DB::table('users')->select('id', 'email')
                ->where('email', 'LIKE', '%' . $cari . '%')->get();
            return response()->json($data);
        }
    }




    public function uploadfile()
    {
        $gambar = Gambar::get();
		return view('example.uploadfile',['gambar' => $gambar]);
    }

    public function uploadfileProses(Request $request)
    {
        $this->validate($request, [
			// 'file' => 'required|file|image|mimes:jpeg,png,jpg|max:2048',
			'keterangan' => 'required',
		]);
 
		// menyimpan data file yang diupload ke variabel $file
		$file = $request->file('file'); 
		$nama_file = time()."_".$file->getClientOriginalName(); 
      	// isi dengan nama folder tempat kemana file diupload
		$tujuan_upload = 'data_file';
		$file->move($tujuan_upload,$nama_file);
 
		Gambar::create([
			'file' => $nama_file,
			'keterangan' => $request->keterangan,
		]); 
		return redirect()->back();
    }

    public function deletefile($id){
        $gambar = Gambar::find($id);
        // dd("hapuuusss ".$gambar);
        File::delete('data_file/'.$gambar->file);
        $gambar->delete();
        return redirect('/uploadfile')->with('sukses','Data Berhasil dihapus');   

    }



    public function email()
    {
        return view('example.email'); //,['program'=>$programs]);
    }

    public function kirimemail(Request $request){
        $file = $request->file('file');
 
        $data = [
            'title' => 'Selamat Pagi',
            'url' => 'https://aantamim.id',
            'judul' => $request->judul,//pake inputan ya....
            'file' => $file,
            'pesan' => $request->pesan,
        ];
        Mail::to($request->penerima)
               ->send(new ModelEmail($data));

    	// return "Email telah dikirim";
        return redirect('/email')->with('sukses','Email telah dikirim');
    }


    public function kirimemail2(Request $request)
    {
        try {
            Mail::send('example/isiemail', 
            array('pesan' => $request->pesan,'penerima' => $request->penerima),
             function ($pesan) use ($request) {
                $pesan->to($request->penerima, 'Verifikasi')->subject('Verifikasi Email');
                $pesan->from(env('MAIL_USERNAME', 'Mugi'), 'Pengirim Mugi');
            });
            return "Email telah dikirim";
        } catch (Exception $e) {
            return response(['status' => false, 'errors' => $e->getMessage()]);
        }
    }



}
