@extends('adminlte::page')
{{-- @section('title', 'Dashboard') --}}

@section('content_header')

    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>G-Leads Program</h1>
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
                <th> Nama Program</th>
                <th> Valid</th>
                <th>Action</th>
        </table>
    </div>
    <div class="modal fade" id="formData" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="addDataLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">G-Leads Program</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="/addTransGleadsProgram" method="POST" autocomplete="off">
                        {{ csrf_field() }}
                        <div class="form-group">
                            {{-- <label for="id">Id</label> --}}
                            <input type="hidden" name="id" class="form-control" id="id">
                        </div>
                        <div class="form-group">
                            <label for="program_name">Nama Program</label>
                            <input type="text" name="program_name" class="form-control" id="program_name">
                        </div>
                        <div class="form-group">
                            <label for="valid">Valid</label>
                            {{-- <input type="text" name="valid" class="form-control" id="valid"> --}}
                            <select name="valid" class="form-control" id="valid">
                                {{-- <option value="All">Pemilik</option> --}}
                                {{-- @foreach ($departemen as $item) --}}
                                <option value="N/A">N/A</option>
                                <option value="Y">Yes</option>
                                <option value="N">No</option>
                                {{-- @endforeach --}}
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
                ajax: '/allTransGleadsProgram',
                columns: [{
                        data: 'id',
                        name: 'id'
                    },
                    {
                        data: 'program_name',
                        name: 'program_name'
                    },
                    {
                        data: 'valid',
                        name: 'valid'
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
            $('#program_name').attr('readonly', true);
            $('#valid').attr('readonly', true);
            $('#id').val('');
            $('#program_name').val('');
            $('#valid').val('');
            $('#formData').modal('show');
            $('#btnsubmit').prop("disabled", false);

            readonly(false);
        }
        async function viewFunction($id) {
            readonly(true);
            $.ajax({
                type: 'GET',
                async: false,
                url: '/getTransGleadsProgramById/' + $id,
                success: function(data) {
                    $('#id').val(data.id);
                    $('#program_name').val(data.program_name);
                    $('#valid').val(data.valid);
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
            $('#program_name').attr('readonly', params);
            $('#valid').attr('readonly', params);
        }

    </script>

@stop
