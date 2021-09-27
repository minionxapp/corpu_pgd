<?php
namespace App\Http\Controllers;

            use Illuminate\Http\Request;
            use App\Models\ProjectActivity;
            use DataTables;
            use Auth;
            use Carbon;
            class ProjectActivityController extends Controller
            {

            public function ProjectActivity()
            {
                return view('projectactivity');
            }
            public function allProjectActivity()
            {        
                return Datatables::of(ProjectActivity::all())
                ->addColumn('action', function($row){       
                    $btn = '<a href="#" onclick="viewFunction(\''.$row->id.'\');" class="edit btn btn-info btn-sm">View</a> ';
                    $btn = $btn.' <a href="#" onclick="editFunction(\''.$row->id.'\');" class="edit btn btn-primary btn-sm">Edit</a>';
                    $btn = $btn.' <a href="/delProjectActivity/'.$row->id.'" class="edit btn btn-danger btn-sm" onclick="return confirm(\'Yakin mau dihapus\');">Delete</a>';
                    return $btn;        })
                ->rawColumns(['action'])
                ->make(true);
            }
            public function projectActivityByProject($project_Id)
            {        
                return Datatables::of(ProjectActivity::where('kd_project','=',$project_Id)->get())
                ->addColumn('action', function($row){       
                    $btn = '<a href="#" onclick="viewFunctionAct(\''.$row->id.'\');" class="edit btn btn-info btn-sm">View</a> ';
                    $btn = $btn.' <a href="#" onclick="editFunctionAct(\''.$row->id.'\');" class="edit btn btn-primary btn-sm">Edit</a>';
                    $btn = $btn.' <a href="/delProjectActivityAct/'.$row->id.'" class="edit btn btn-danger btn-sm" onclick="return confirm(\'Yakin mau dihapus\');">Delete</a>';
                    return $btn;        })
                ->rawColumns(['action'])
                ->make(true);
            }

            public function addProjectActivity(Request $request)
            {
                $model = new ProjectActivity;
                $model->kd_activity  = Carbon\Carbon::now()->timestamp;;//$request->kd_activity;
                $model->nm_activity = $request->nm_activity;
                $model->desc_activity = $request->desc_activity;
                $model->status = $request->status;
                $model->kd_project = $request->kd_project_act;
                $model->jenis = $request->jenis;
                $model->nm_project = $request->nm_project;
                $model->descripsi = $request->descripsi;
                $model->divisi = $request->divisi;
                $model->departement = $request->departement;
                $model->file1 = $request->file1;
                $model->file1_desc = $request->file1_desc;
                $model->file2 = $request->file2;
                $model->file2_desc = $request->file2_desc;
                $model->file3 = $request->file3;
                $model->file3_desc = $request->file3_desc;
                $model->create_by = Auth::user()->user_id;
                $model->mulai = $request->mulai;
                $model->selesai = $request->selesai;
                // $model->catatan = $request->catatan;
                
                if($request->id == null ){
                
                if($request->catatan != '' || $request->catatan != null){
                    $model->catatan = Carbon\Carbon::now().CHR(13).CHR(10).$request->catatan.
                     CHR(13).CHR(10).' '. CHR(13).CHR(10).$request->catatan1;
                }
                    $model->save();
                    // addProjectActivity
                    //return redirect('/projectactivity')->with('sukses','Data Berhasil di Simpan');
                    return redirect('/project')->with('sukses','Data Activity Berhasil di Simpan');
                }else{
                    $modelUpdate = ProjectActivity::find($request->id);
                    $modelUpdate->update_by = Auth::user()->user_id;


                    if($request->catatan != '' || $request->catatan != null){
                        // $modelUpdate->catatan = Carbon\Carbon::now().CHR(13).CHR(10).
                        //                         $request->catatan. CHR(13).CHR(10).' '. 
                        //                         CHR(13).CHR(10).$request->catatan1;
                        $catat_old = $request->catatan1;
                        $catat_new = $request->catatan;
                        $request->merge(['catatan' => Carbon\Carbon::now().CHR(13).CHR(10).
                                                      $catat_new.CHR(13).CHR(10).$catat_old.CHR(13).CHR(10).' ']);
                    }
                    // $request->catatan =$modelUpdate->catatan;
                    // dd($request->all());
                    $modelUpdate->update($request->all());
                    return redirect('/project')->with('sukses','Update Berhasil di Simpan');
                }
            }

            public function getProjectActivityById($id){
                $model = ProjectActivity::find($id);
                return $model;
            }

            public function delProjectActivity($id)
            {
                $model = ProjectActivity::find($id);
                $model->delete();
                return redirect('/projectactivity')->with('sukses','Data Berhasil dihapus');
                
            }
            public function delProjectActivityAct($id)
            {
                $model = ProjectActivity::find($id);
                $model->delete();
                return redirect('/project')->with('sukses','Data Berhasil dihapus');
                
            }


        }

        