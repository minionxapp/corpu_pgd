<?php
    namespace App\Http\Controllers;

    use Illuminate\Http\Request;
    use App\Models\Item;
    use DataTables;
    use Auth;
    use Carbon;
        class ItemController extends Controller
        {

            public function Item()
            {
                $userid = Auth::user()->user_id;
                return view('items.item',['userid'=>$userid]);
            }
            public function allItem()
            {        
                return Datatables::of(Item::all())
                ->addColumn('action', function($row){       
                    $btn = '<a href="#" onclick="viewFunction(\''.$row->id.'\');" class="edit btn btn-info btn-sm">View</a> ';
                    $btn = $btn.' <a href="#" onclick="editFunction(\''.$row->id.'\');" class="edit btn btn-primary btn-sm">Edit</a>';
                    $btn = $btn.' <a href="/delItem/'.$row->id.'" class="edit btn btn-danger btn-sm" onclick="return confirm(\'Yakin mau dihapus\');">Delete</a>';
                    return $btn;        })
                ->rawColumns(['action'])
                ->make(true);
            }

            public function addItem(Request $request)
            {
                $model = new Item;
                if($request->id == null ){
                    $model->user_id = $request->user_id;
                    $model->jenis = $request->jenis;
                    $model->nama = $request->nama;
                    $model->ket = $request->ket;
                    $model->status = $request->status;
                    $model->create_by = Auth::user()->user_id;
                    $model->user_id = Auth::user()->user_id;
                    $model->save();
                    return redirect('/item')->with('sukses','Data Berhasil di Simpan');
                }else{
                    $modelUpdate = Item::find($request->id);
                    $modelUpdate->update_by = Auth::user()->user_id;
                    $modelUpdate->update($request->all());
                    return redirect('/item')->with('sukses','Update Berhasil di Simpan');
                }
            }

            public function getItemById($id){
                $model = Item::find($id);
                return $model;
            }

            public function delItem($id)
            {
                $model = Item::find($id);
                $model->delete();
                return redirect('/item')->with('sukses','Data Berhasil dihapus');
                
            }

            public function getItemByUser($user)
            {        
                return Datatables::of(Item::where('user_id','=',$user)->get())
                ->addColumn('action', function($row){       
                    $btn = '<a href="#" onclick="viewFunction(\''.$row->id.'\');" class="edit btn btn-info btn-sm">View</a> ';
                    $btn = $btn.' <a href="#" onclick="editFunction(\''.$row->id.'\');" class="edit btn btn-primary btn-sm">Edit</a>';
                    $btn = $btn.' <a href="/delItem/'.$row->id.'" class="edit btn btn-danger btn-sm" onclick="return confirm(\'Yakin mau dihapus\');">Delete</a>';
                    return $btn;        })
                ->rawColumns(['action'])
                ->make(true);
            }
        }

        
