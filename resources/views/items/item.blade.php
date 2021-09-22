@extends('adminlte::page')
{{-- @section('title', 'Dashboard') --}}

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
                <th> Id</th>
                <th> User Id</th>
                <th> Jenis</th>
                <th> Nama Item</th>
                <th> Desc</th>
                <th> Status</th>
                <th>Action</th>
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
                    <form action="/addItem" method="POST">
                        {{ csrf_field() }}
                        <div class="form-group">
                            {{-- <label for="id">id</label> --}}
                            <input type="hidden" name="id" class="form-control" id="id">
                        </div>
                        {{-- <div class="form-group">
                            <label for="user_id">user_id</label>
                            <input type="text" name="user_id" class="form-control" id="user_id">
                        </div> --}}
                        <div class="form-group">
                            <label for="jenis">Jenis</label>
                            <select name="jenis" class="form-control" id="jenis">
                                <option value="">-Jenis-</option>
                                <option value="Motor">Motor</option>
                                <option value="Mobil">Mobil</option>
                                <option value="Lain">Lain</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="nama">Nama Item</label>
                            <input type="text" name="nama" class="form-control" id="nama">
                        </div>
                        <div class="form-group">
                            <label for="ket">Keterangan</label>
                            <input type="text" name="ket" class="form-control" id="ket">
                        </div>

                        <div class="form-group">
                            <label for="status">Status Aktif</label>
                            <select name="status" class="form-control" id="status">
                                <option value="">-Status-</option>
                                <option value="Yes">Yes</option>
                                <option value="No">No</option>
                            </select>
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
                ajax: '/getItemByUser/'+'{!! $userid !!}',
                columns: [{
                        data: 'id',
                        name: 'id'
                    },
                    {
                        data: 'user_id',
                        name: 'user_id'
                    },
                    {
                        data: 'jenis',
                        name: 'jenis'
                    },
                    {
                        data: 'nama',
                        name: 'nama'
                    },
                    {
                        data: 'ket',
                        name: 'ket'
                    },
                    {
                        data: 'status',
                        name: 'status'
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
            $('#id').attr('readonly', true);
            $('#user_id').attr('readonly', true);
            $('#jenis').attr('readonly', true);
            $('#nama').attr('readonly', true);
            $('#ket').attr('readonly', true);
            $('#id').val('');
            $('#user_id').val('');
            $('#jenis').val('');
            $('#nama').val('');
            $('#ket').val('');
            $('#formData').modal('show');
            readonly(false);
        }
        async function viewFunction($id) {
            readonly(true);
            $.ajax({
                type: 'GET',
                async: false,
                url: '/getItemById/' + $id,
                success: function(data) {
                    $('#id').val(data.id);
                    $('#user_id').val(data.user_id);
                    $('#jenis').val(data.jenis);
                    $('#nama').val(data.nama);
                    $('#ket').val(data.ket);
                    $('#status').val(data.status);
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
            $('#user_id').attr('readonly', params);
            $('#jenis').attr('readonly', params);
            $('#nama').attr('readonly', params);
            $('#ket').attr('readonly', params);
        }

    </script>

@stop
