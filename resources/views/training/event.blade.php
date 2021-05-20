@extends('adminlte::page')
@section('title', 'Dashboard')

@section('content_header')

    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Event</h1>
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

    <div>
        <table id="myTable" class="display nowrap" style="width:100%">
            <thead>
                <th> Jenis</th>
                <th> Kode Div</th>
                <th> Divisi</th>
                <th> Kode Dept</th>
                <th> Departement</th>
                <th> Judul</th>
                <th> Deskripsi</th>
                <th> Mulai</th>
                <th> Selesai</th>
                <th> Tahun</th>
                <th> Action</th>
        </table>
    </div>
    <div class="modal fade" id="formData" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="addDataLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Data User</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="/addEvent" method="POST" autocomplete="off">
                        {{ csrf_field() }}
                        <div class="form-group">
                            {{-- <label for="id">id</label> --}}
                            <input type="hidden" name="id" class="form-control" id="id">
                        </div>
                        <div class="form-group">
                            <label for="jenis">Jenis Training</label>
                            {{-- <input type="text" name="jenis" class="form-control" id="jenis"> --}}
                            <select name="jenis" class="form-control" id="jenis">
                                <option value="">Jenis</option>
                                @foreach ($jenistrainings as $item)
                                    <option value={{$item->kode}}>{{$item->nama}}</option>
                                @endforeach
                            </select>
                            
                        </div>
                        <div class="form-group">
                            <label for="divisi_kode">Divisi </label>
                            {{-- <input type="text" name="divisi_kode" class="form-control" id="divisi_kode"> --}}
                            <select name="divisi_kode" class="form-control" id="divisi_kode">
                                <option value="">Divisi</option>
                                @foreach ($divisis as $item)
                                    <option value={{$item->kode}}>{{$item->nama}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="departement_kode">Departement</label>
                            {{-- <input type="text" name="departement_kode" class="form-control" id="departement_kode"> --}}
                            <select name="departement_kode" class="form-control" id="departement_kode">
                                <option value="">Departement</option>
                                @foreach ($departements as $item)
                                    <option value={{$item->kode}}>{{$item->nama}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="judul">Judul</label>
                            <input type="text" name="judul" class="form-control" id="judul">
                        </div>
                        <div class="form-group">
                            <label for="deskripsi">Deskripsi</label>
                            <input type="text" name="deskripsi" class="form-control" id="deskripsi">
                        </div>
                        <div class="row">
                            <div class="form-group col-6">
                                <label for="mulai">Mulai</label>
                                <input type="date" name="mulai" class="form-control" id="mulai">
                            </div>
                            <div class="form-group col-6">
                                <label for="selesai">Selesai</label>
                                <input type="date" name="selesai" class="form-control" id="selesai">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="tahun">Tahun</label>
                            <input type="text" name="tahun" class="form-control" id="tahun">
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
                ajax: '/allEvent',
                columns: [{
                        data: 'jenis',
                        name: 'jenis'
                    },
                    {
                        data: 'divisi_kode',
                        name: 'divisi_kode'
                    },
                    {
                        data: 'divisi_name',
                        name: 'divisi_name'
                    },


                    
                    {
                        data: 'departement_kode',
                        name: 'departement_kode'
                    },
                    {
                        data: 'departement_name',
                        name: 'departement_name'
                    },

                    
                    {
                        data: 'judul',
                        name: 'judul'
                    },
                    {
                        data: 'deskripsi',
                        name: 'deskripsi'
                    },
                    {
                        data: 'mulai',
                        name: 'mulai'
                    },
                    {
                        data: 'selesai',
                        name: 'selesai'
                    },
                    {
                        data: 'tahun',
                        name: 'tahun'
                    },
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
            $('#jenis').attr('readonly', true);
            $('#divisi_kode').attr('readonly', true);
            $('#departement_kode').attr('readonly', true);
            $('#judul').attr('readonly', true);
            $('#deskripsi').attr('readonly', true);
            $('#mulai').attr('readonly', true);
            $('#selesai').attr('readonly', true);
            $('#tahun').attr('readonly', true);
            $('#jenis').val('');
            $('#divisi_kode').val('');
            $('#departement_kode').val('');
            $('#judul').val('');
            $('#deskripsi').val('');
            $('#mulai').val('');
            $('#selesai').val('');
            $('#tahun').val('');
            $('#formData').modal('show');
            $('#btnsubmit').prop("disabled", false);

            readonly(false);
        }
        async function viewFunction($id) {
            readonly(true);
            $.ajax({
                type: 'GET',
                async: false,
                url: '/getEventById/' + $id,
                success: function(data) {
                    $('#id').val(data.id);
                    $('#jenis').val(data.jenis);
                    $('#divisi_kode').val(data.divisi_kode);
                    $('#departement_kode').val(data.departement_kode);
                    $('#judul').val(data.judul);
                    $('#deskripsi').val(data.deskripsi);
                    $('#mulai').val(data.mulai);
                    $('#selesai').val(data.selesai);
                    $('#tahun').val(data.tahun);
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
            $('#jenis').attr('readonly', params);
            $('#divisi_kode').attr('readonly', params);
            $('#departement_kode').attr('readonly', params);
            $('#judul').attr('readonly', params);
            $('#deskripsi').attr('readonly', params);
            $('#mulai').attr('readonly', params);
            $('#selesai').attr('readonly', params);
            $('#tahun').attr('readonly', params);
        }

    </script>

@stop
