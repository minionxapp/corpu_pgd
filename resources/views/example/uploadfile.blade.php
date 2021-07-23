@extends('adminlte::page')
@section('title', 'Dashboard')

@section('content_header')

    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    {{-- <h1>Judul</h1> --}}
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
                {{ session('sukses') }}
            </div>
        @endif
    </div>

    <div class="row text-nowrap">
        <div class="col-12" style="padding-top: 5px;">
            <button type="button" class="btn btn-primary btn-sm float-left"
             data-toggle="modal" onclick="addFunction();">Upload
            </button>
        </div>
    </div>
    <div class="modal fade" id="formData" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="addDataLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Contoh Upload File</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="/uploadfile_proses" method="POST"
                        enctype="multipart/form-data">
                        {{ csrf_field() }}
                    	<div class="form-group">
                            <b>File Gambar</b><br/>
                            <input type="file" name="file">
                        </div>
     
                        <div class="form-group">
                            <b>Keterangan</b>
                            <textarea class="form-control" name="keterangan"></textarea>
                        </div>


                       <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" id="btnsubmit" class="btn btn-primary">Upload</button>
                        </div>
                    </form>

                    <h4 class="my-5">Data</h4>
 
				<table class="table table-bordered table-striped">
					<thead>
						<tr>
							<th width="1%">File</th>
							<th>Keterangan</th>
							<th width="1%">OPSI</th>
						</tr>
					</thead>
					<tbody>
						@foreach($gambar as $g)
						<tr>
							<td><img width="150px" src="{{ url('/data_file/'.$g->file) }}"></td>
							<td><a href="{{ url('/data_file/'.$g->file) }}" target=”_blank”  >{{$g->keterangan}} </a></td>
							<td><a class="btn btn-danger" href="/deletefile/{{ $g->id }}">HAPUS</a></td>
						</tr>
						@endforeach
					</tbody>
				</table>
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

        // function awal() {
        //     $('#myTable').DataTable({
        //         rowReorder: {
        //             selector: 'td:nth-child(2)'
        //         },
        //         responsive: true,
        //         processing: true,
        //         serverSide: true,
        //         ajax: '/allTestScrip',
        //         columns: [{
        //                 data: 'id',
        //                 name: 'id'
        //             },
        //             {
        //                 data: 'kode',
        //                 name: 'kode'
        //             },
        //             {
        //                 data: 'nama',
        //                 name: 'nama'
        //             },
        //             {
        //                 data: 'action',
        //                 name: 'action',
        //                 orderable: false,
        //                 searchable: false
        //             }
        //         ]
        //     });
        // }

        function addFunction() {
            // $('#id').attr('readonly', true);
            // $('#kode').attr('readonly', true);
            // $('#nama').attr('readonly', true);
            // $('#id').val('');
            // $('#kode').val('');
            // $('#nama').val('');
            $('#formData').modal('show');
            // readonly(false);
        }
        async function viewFunction($id) {
            readonly(true);
            $.ajax({
                type: 'GET',
                async: false,
                url: '/getTestScripById/' + $id,
                success: function(data) {
                    $('#id').val(data.id);
                    $('#kode').val(data.kode);
                    $('#nama').val(data.nama);
                    $('#btnsubmit').prop("disabled", true);

                }

            });

            $('#formData').modal('show');
        }

        async function editFunction($id) {
            await viewFunction($id);
            $('#id').attr('readonly', true);
            $('#btnsubmit').prop("disabled", false);
            readonly(false);
        }

        function readonly(params) {
            $('#id').attr('readonly', params);
            $('#kode').attr('readonly', params);
            $('#nama').attr('readonly', params);
        }

    </script>

@stop
