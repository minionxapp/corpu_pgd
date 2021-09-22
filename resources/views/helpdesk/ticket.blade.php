@extends('adminlte::page')
{{-- @section('title', 'Dashboard') --}}

@section('content_header')

    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Ticket</h1>
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
            <button type="button" class="btn btn-primary btn-sm float-left" data-toggle="modal" onclick="addFunction();">Add
            </button>
        </div>
    </div>

    {{-- <div>
        <table id="myTable" class="display nowrap" style="width:100%">
            <thead>
                <th> Id</th>
                <th> Nik</th>
                <th> Nama</th>
                <th> Judul</th>
                <th> Detail</th>
                <th>Status</th>
                <th>Action</th>
        </table>
    </div> --}}
    <div>
        <form action="/addTicket" method="POST" autocomplete="off" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="form-group">
                {{-- <label for="id">id</label> --}}
                {{-- <input type="text" name="id" class="form-control" id="id"> --}}
            </div>
            {{-- <div class="form-group">
                <label for="no_tiket">no_tiket</label>
                <input type="text" name="no_tiket" class="form-control" id="no_tiket">
            </div> --}}
            <div class="row">
                <div class="form-group col-md-3">
                    <label for="nik">Nik</label>
                    <input type="text" name="nik" class="form-control" id="nik">
                </div>
                <div class="form-group col-md-9">
                    <label for="nama">Nama</label>
                    <input type="text" name="nama" class="form-control" id="nama">
                </div>
            </div>
            <div class="form-group">
                <label for="email">E-mail</label>
                <input type="email" name="email" class="form-control" id="email">
            </div>
            <div class="row">
                <div class="form-group col-md-6">
                    <label for="notelp">No Telp/HP</label>
                    <input type="text" name="notelp" class="form-control" id="notelp">
                </div>
                <div class="form-group col-md-6">
                    <label for="kategori">Kategori</label>
                    {{-- <input type="text" name="kategori" class="form-control" id="kategori"> --}}
                    <select name="kategori" class="form-control" id="kategori">
                        <option value="">--Pilih--</option>
                        <option value="TR">Training</option>
                        <option value="EL">E-Learning</option>
                        <option value="GL">G-Leads</option>
                        <option value="KMS">KMS</option>
                        <option value="LL">Lain-lain</option>
                        {{-- @foreach ($jobfamily as $item)
                            <option value={{$item->kode}}>{{$item->nama}}</option>
                        @endforeach --}}
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label for="judul">Judul</label>
                <input type="text" name="judul" class="form-control" id="judul">
            </div>
            <div class="form-group">
                <label for="detail">Detail</label>
                <textarea type="text" rows="3" name="detail" class="form-control" id="detail"></textarea>
            </div>
            {{-- <div class="form-group">
                <label for="status">status</label>
                <input type="text" name="status" class="form-control" id="status">
            </div> --}}
            {{-- <div class="form-group">
                <label for="tgl_selesai">tgl_selesai</label>
                <input type="text" name="tgl_selesai" class="form-control" id="tgl_selesai">
            </div> --}}
            {{-- <div class="form-group">
                <label for="prioritas">prioritas</label>
                <input type="text" name="prioritas" class="form-control" id="prioritas">
            </div> --}}
            <div class="form-group">
                <label for="lbl_file_dispo" id="lbl_file_dispo">File :</label>
                <input type="file" name="file_sisipan" class="form-control" id="file_sisipan">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" id="btnsubmit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>
    {{-- <div class="modal fade" id="formData" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="addDataLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Ticket</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                   
                </div>
            </div>
        </div>
    </div> --}}
@stop

@section('css')
    <link rel="stylesheet" href="/css/app.css">
@stop
@section('js')
    <script>
        $(document).ready(function() {
            awal();
            $('#nama').attr('readonly', true);
            $('#email').attr('readonly', true);
        });


        $("#nik" ).focusout(function() {
            $.ajax({
                type: 'GET',
                async: false,
                url: '/carikaryawan/' + $("#nik" ).val(),
                success: function(data) {
                    $("#nama").val(data['NAMA_KARYAWAN']);
                    $("#email").val(data['EMAIL_1'])
                }
            });

         });
        function awal() {
            $('#myTable').DataTable({
                rowReorder: {
                    selector: 'td:nth-child(2)'
                },
                responsive: true,
                processing: true,
                serverSide: true,
                ajax: '/allTicket',
                columns: [{
                        data: 'id',
                        name: 'id'
                    },
                    // {
                    //     data: 'no_tiket',
                    //     name: 'no_tiket'
                    // },
                    {
                        data: 'nik',
                        name: 'nik'
                    },
                    {
                        data: 'nama',
                        name: 'nama'
                    },
                    // {
                    //     data: 'email',
                    //     name: 'email'
                    // },
                    // {
                    //     data: 'notelp',
                    //     name: 'notelp'
                    // },
                    // {
                    //     data: 'kategori',
                    //     name: 'kategori'
                    // },
                    {
                        data: 'judul',
                        name: 'judul'
                    },
                    {
                        data: 'detail',
                        name: 'detail'
                    },
                    {
                        data: 'status',
                        name: 'status'
                    },
                    // {
                    //     data: 'tgl_selesai',
                    //     name: 'tgl_selesai'
                    // },
                    // {
                    //     data: 'prioritas',
                    //     name: 'prioritas'
                    // },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false
                    }
                ]
            });
        }

        function addFunction() {
            $('#id').attr('readonly', true);
            $('#no_tiket').attr('readonly', true);
            $('#nik').attr('readonly', true);
            $('#nama').attr('readonly', true);
            $('#email').attr('readonly', true);
            $('#notelp').attr('readonly', true);
            $('#kategori').attr('readonly', true);
            $('#judul').attr('readonly', true);
            $('#detail').attr('readonly', true);
            $('#status').attr('readonly', true);
            $('#tgl_selesai').attr('readonly', true);
            $('#prioritas').attr('readonly', true);
            $('#id').val('');
            $('#no_tiket').val('');
            $('#nik').val('');
            $('#nama').val('');
            $('#email').val('');
            $('#notelp').val('');
            $('#kategori').val('');
            $('#judul').val('');
            $('#detail').val('');
            $('#status').val('');
            $('#tgl_selesai').val('');
            $('#prioritas').val('');
            $('#formData').modal('show');
            $('#btnsubmit').prop("disabled", false);
            $('#nama').attr('readonly', true);
            $('#email').attr('readonly', true);

            readonly(false);
        }
        async function viewFunction($id) {
            readonly(true);
            $.ajax({
                type: 'GET',
                async: false,
                url: '/getTicketById/' + $id,
                success: function(data) {
                    $('#id').val(data.id);
                    $('#no_tiket').val(data.no_tiket);
                    $('#nik').val(data.nik);
                    $('#nama').val(data.nama);
                    $('#email').val(data.email);
                    $('#notelp').val(data.notelp);
                    $('#kategori').val(data.kategori);
                    $('#judul').val(data.judul);
                    $('#detail').val(data.detail);
                    $('#status').val(data.status);
                    $('#tgl_selesai').val(data.tgl_selesai);
                    $('#prioritas').val(data.prioritas);
                    $('#btnsubmit').prop("disabled", true);
                    $('#nama').attr('readonly', true);
                    $('#email').attr('readonly', true);
                }
            });

            $('#formData').modal('show');
        }

        async function editFunction($id) {
            await viewFunction($id);
            $('#id').attr('readonly', true);
            $('#btnsubmit').prop("disabled", false);
            readonly(false);
            $('#nama').attr('readonly', true);
            $('#email').attr('readonly', true);
        }

        function readonly(params) {
            $('#id').attr('readonly', params);
            $('#no_tiket').attr('readonly', params);
            $('#nik').attr('readonly', params);
            $('#nama').attr('readonly', params);
            $('#email').attr('readonly', params);
            $('#notelp').attr('readonly', params);
            $('#kategori').attr('readonly', params);
            $('#judul').attr('readonly', params);
            $('#detail').attr('readonly', params);
            $('#status').attr('readonly', params);
            $('#tgl_selesai').attr('readonly', params);
            $('#prioritas').attr('readonly', params);
        }

    </script>

@stop
