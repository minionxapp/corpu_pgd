<?php
namespace App\Http\Controllers;

    use Illuminate\Http\Request;
    use App\Models\ItemsAction;
    use App\Models\Item;
    use DataTables;
    use Auth;
    use Carbon;
    class ItemsActionController extends Controller
    {

    public function ItemsAction()
    {
        $userid = Auth::user()->user_id;
        $items = Item::where('user_id','=',$userid)->get();
        return view('itemsaction.itemsaction',['items'=>$items]);

    }
    public function allItemsAction()
    {        
        // $userid = Auth::user()->user_id;
        // $items = Item::where('user_id','=',$userid)->get(['id']);
        // query ambil data parennya juga
        // $itemsaction = ItemsAction::with('item')->whereIn('item_id',$items)->get();
        
        // return Datatables::of(ItemsAction::with('item')->whereIn('item_id',$items)->get())
        // item   'user_id','jenis','nama','ket','status'
         return Datatables::of(ItemsAction::with(['item'=>function($query){
            $userid = Auth::user()->user_id;
            $query->select('id','ket','status','nama');//id penghubung dengan itemAction harus ada
            $query->where('user_id','=',$userid);
         }])->select('id','action_desc','item_id','tgl_action')->get())//item_id penghubung dengan item harus ada
        ->addColumn('action', function($row){       
            $btn = '<a href="#" onclick="viewFunction(\''.$row->id.'\');" class="edit btn btn-info btn-sm">View</a> ';
            $btn = $btn.' <a href="#" onclick="editFunction(\''.$row->id.'\');" class="edit btn btn-primary btn-sm">Edit</a>';
            $btn = $btn.' <a href="/delItemsAction/'.$row->id.'" class="edit btn btn-danger btn-sm" onclick="return confirm(\'Yakin mau dihapus\');">Delete</a>';
            return $btn;        })
        // ->addColumn('nama_item', function($row){  
        //     $namaitem =$row->item->nama;
        //     return $namaitem;
        // })
        ->rawColumns(['action'])
        ->make(true);
    }

    public function addItemsAction(Request $request)
    {
        $model = new ItemsAction;
        if($request->id == null ){
            $model->item_id = $request->item_id;
            $model->action_desc = $request->action_desc;
            $model->tgl_action = $request->tgl_action;
            $model->create_by = Auth::user()->user_id;
            $model->save();
            return redirect('/itemsaction')->with('sukses','Data Berhasil di Simpan');
        }else{
            $model->id = $request->id;
            $modelUpdate = ItemsAction::find($request->id);
            $modelUpdate->update_by = Auth::user()->user_id;
            $modelUpdate->update($request->all());
            return redirect('/itemsaction')->with('sukses','Update Berhasil di Simpan');
        }
    }

    public function getItemsActionById($id){
        $model = ItemsAction::find($id);
        return $model;
    }

    public function delItemsAction($id)
    {
        $model = ItemsAction::find($id);
        $model->delete();
        return redirect('/itemsaction')->with('sukses','Data Berhasil dihapus');
        
    }
}

        