@extends('adminlte::page')
{{-- @section('title', 'Dashboard') --}}

@section('content_header')

    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>MakeTable</h1>
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
                <th> id</th>
                <th> nama_table</th>
                <th> col1</th>
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
                    <form action="/addMakeTable" method="POST" autocomplete="off">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="id">id</label>
                            <input type="text" name="id" class="form-control" id="id">
                        </div>
                        <div class="form-group">
                            <label for="nama_table">nama_table</label>
                            <input type="text" name="nama_table" class="form-control" id="nama_table">
                        </div>
                        <div class="form-group">
                            <label for="col1">col1</label>
                            <input type="text" name="col1" class="form-control" id="col1">
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
                ajax: '/allMakeTable',
                columns: [{
                        data: 'id',
                        name: 'id'
                    },
                    {
                        data: 'nama_table',
                        name: 'nama_table'
                    },
                    {
                        data: 'col1',
                        name: 'col1'
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
            $('#nama_table').attr('readonly', true);
            $('#col1').attr('readonly', true);
            $('#id').val('');
            $('#nama_table').val('');
            $('#col1').val('');
            $('#formData').modal('show');
            $('#btnsubmit').prop("disabled", false);

            readonly(false);
        }
        async function viewFunction($id) {
            readonly(true);
            $.ajax({
                type: 'GET',
                async: false,
                url: '/getMakeTableById/' + $id,
                success: function(data) {
                    $('#id').val(data.id);
                    $('#nama_table').val(data.nama_table);
                    $('#col1').val(data.col1);
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
            $('#nama_table').attr('readonly', params);
            $('#col1').attr('readonly', params);
        }

    </script>

@stop
