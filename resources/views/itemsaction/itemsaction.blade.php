
        @extends('adminlte::page')
        @section('title', 'Dashboard') 
            
        @section('content_header')
        
        <section class="content-header">
        <div class="container-fluid">
        <div class="row mb-2">
        <div class="col-sm-6">
        <h1>Judul</h1>
        </div>
        <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">User Profile</li>
        </ol>
        </div>
            </div>
            </div><!-- /.container-fluid -->
        </section>
        @stop
        @section('content')
            <div>
                @if (session('sukses'))
                <div class="alert alert-primary" role="alert">
                    {{session('sukses')}}
                </div>
                @endif
            </div>

        <div class="row text-nowrap">
            <div class="col-12" style="padding-top: 5px;">
                <button type="button" class="btn btn-primary btn-sm float-left"  
                    data-toggle="modal" onclick="addFunction();" >Add
                </button>
            </div>
        </div>

        <div>  
            <table id="myTable" class="display nowrap" style="width:100%">
                <thead>                
            <th> Id</th>
<th> Id Item</th>
<th> Nama Item</th>
<th> Tindakan</th>
<th> Tgl</th>
<th>Action</th>
</table>
</div>    <div class="modal fade" id="formData" data-backdrop="static" tabindex="-1" role="dialog"
        aria-labelledby="addDataLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Data User</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
                </div>
                <div class="modal-body">
                    <form action="/addItemsAction" method="POST">
                        {{ csrf_field() }}
<div class="form-group">
            {{-- <label for="id">id</label> --}}
            <input type="hidden" name="id" class="form-control" id="id">
            </div>
<div class="form-group">
            <label for="item_id">item_id</label>
            {{-- <input type="text" name="item_id" class="form-control" id="item_id"> --}}
            <select name="item_id" class="form-control" id="item_id">
                <option value="">Item</option>
                @foreach ($items as $item)
                    <option value={{$item->id}}>{{$item->nama}}</option>
                @endforeach
            </select>
            </div>
<div class="form-group">
            <label for="action_desc">action_desc</label>
            <input type="text" name="action_desc" class="form-control" id="action_desc">
            </div>
<div class="form-group">
            <label for="tgl_action">tgl_action</label>
            <input type="date" name="tgl_action" class="form-control" id="tgl_action">
            </div>
 <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" id="btnsubmit" class="btn btn-primary">Submit</button>
        </div>
        </form>
        </div>
        </div>
        </div>
        </div>
        @stop

        @section('css')
            <link rel="stylesheet" href="/css/app.css">
        @stop
        @section('js')
        <script>
        $(document).ready(function() {
            awal();
        });
        function awal() {
            $('#myTable').DataTable({
                rowReorder: {
                    selector: 'td:nth-child(2)'
                },
                responsive: true,
                processing: true,
                serverSide: true,
                ajax: '/allItemsAction',
                columns: [
                    { data: 'id', name: 'id' },  
                    { data: 'item_id', name: 'item_id' },  
                    { data: 'item.nama', name: 'nama_item' }, 
                    { data: 'action_desc', name: 'action_desc' },  
                    { data: 'tgl_action', name: 'tgl_action' },  
                    {data: 'action', name: 'action', orderable: false, searchable: false}
                ]});}
                function addFunction() {
                    $('#id').attr('readonly', true); 
                    $('#item_id').attr('readonly', true); 
                    $('#action_desc').attr('readonly', true); 
                    $('#tgl_action').attr('readonly', true); 
                    $('#id').val(''); 
                    $('#item_id').val(''); 
                    $('#action_desc').val(''); 
                    $('#tgl_action').val(''); 
                    $('#formData').modal('show'); 
                    readonly(false)      ; 
                    $('#btnsubmit').prop("disabled",false); 
                }
                async function viewFunction($id) {
        readonly(true)      ;  
        $.ajax({
       type:'GET',
       async: false,
       url:'/getItemsActionById/'+$id, 
       success:function(data) {$('#id').val(data.id); 
        $('#item_id').val(data.item_id); 
        $('#action_desc').val(data.action_desc); 
        $('#tgl_action').val(data.tgl_action); 
        $('#btnsubmit').prop("disabled",true); 

            }

        }); 

        $('#formData').modal('show'); 
}

        async function editFunction($id) {    
            await viewFunction($id);
            $('#id').attr('readonly', true);        
            $('#btnsubmit').prop("disabled",false); 
            readonly(false)      ; 
        }

        function readonly(params) {
          $('#id').attr('readonly', params); $('#item_id').attr('readonly', params); $('#action_desc').attr('readonly', params); $('#tgl_action').attr('readonly', params);  }

          </script>

      @stop