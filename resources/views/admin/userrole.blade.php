@extends('adminlte::page')
@section('title', 'Dashboard')

@section('content_header')

    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>UserRole</h1>
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
            <form action="/search" method="POST">
                {{ csrf_field() }}
                <div class="row">
                    <div class="form-group col-lg-6">
                        <label for="program">User Id</label>
                        <input type="text" name="UserId" class="form-control" id="UserId">
                    </div>
                </div>
            </form>
            <button type="button" class="btn btn-primary btn-sm float-left" data-toggle="modal"
                onclick="searchFunction();">Search
            </button>
            <button type="button" class="btn btn-primary btn-sm float-left" data-toggle="modal"
                onclick="addFunction();">Add
            </button>
        </div>
    </div>
    <div>
        <table id="myTable" class="display nowrap" style="width:100%">
            <thead>
                <th>role_id</th>
                <th>role Name</th>
                <th>model_type</th>
                <th>model_id</th>
                <th>User Id</th>
                <th>Action</th>
        </table>
    </div>
    <div class="modal fade" id="formData" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="addDataLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">User Role</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="/addUserRole" method="POST" autocomplete="off">
                        {{ csrf_field() }}
                        {{-- <div class="form-group">
                            <label for="id">id</label>
                            <input type="text" name="id" class="form-control" id="id">
                        </div> --}}
                        <div class="form-group">
                            <label for="role_id">role_id</label>
                            {{-- <input type="text" name="role_id" class="form-control" id="role_id"> --}}
                            <select name="role_id" class="form-control" id="role_id">
                                <option value="">--Role--</option>
                                @foreach ($roles as $role)
                                <option value="{{$role->id}}">{{$role->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        {{-- <div class="form-group">
                            <label for="model_type">model_type</label>
                            <input type="text" name="model_type" class="form-control" id="model_type">
                        </div> --}}
                        <div class="form-group">
                            <label for="model_id">User Id</label>
                            {{-- <input type="text" name="model_id" class="form-control" id="model_id"> --}}
                            <select name="model_id" class="form-control" id="model_id">
                                <option value="">--User--</option>
                                @foreach ($users as $user)
                                <option value="{{$user->id}}">{{$user->name}}</option>
                                @endforeach
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

        function searchFunction() {
            if( $('#UserId').val() == null ||  $('#UserId').val() == ""){
                $('#myTable').dataTable().fnClearTable();
                $('#myTable').dataTable().fnDestroy();
                awal();
            }else{

            var s = '/getUserByUserId/'+ $('#UserId').val();
            $.ajax({
                type: 'GET',
                async: false,
                url: s ,
                success: function(data) {
                    $('#myTable').dataTable().fnClearTable();
                    $('#myTable').dataTable().fnDestroy();
                    if (data != null&&data != ""){
                       t = '/roleByUserId/' + data.id;
                    }else{
                        t = '/roleByUserId/10000000';
                    }
                        $('#myTable').DataTable({
                        rowReorder: {
                            selector: 'td:nth-child(2)'
                        },
                        responsive: true,
                        processing: true,
                        serverSide: true,
                        ajax: t,
                        columns: [

                            {
                                data: 'role_id',
                                name: 'role_id'
                            },
                            {
                                data: 'rolename',
                                name: 'rolename'
                            },
                            {
                                data: 'model_type',
                                name: 'model_type'
                            },
                            {
                                data: 'model_id',
                                name: 'model_id'
                            },
                            {
                                data: 'userId',
                                name: 'userId'
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

            });
            }

        }

        function awal() {
            $('#myTable').DataTable({
                rowReorder: {
                    selector: 'td:nth-child(2)'
                },
                responsive: true,
                processing: true,
                serverSide: true,
                ajax: '/allUserRole',
                columns: [
                    // {
                    //     data: 'id',
                    //     name: 'id'
                    // },
                    {
                        data: 'role_id',
                        name: 'role_id'
                    },
                    {
                        data: 'rolename',
                        name: 'rolename'
                    },
                    {
                        data: 'model_type',
                        name: 'model_type'
                    },
                    {
                        data: 'model_id',
                        name: 'model_id'
                    },
                    {
                        data: 'userId',
                        name: 'userId'
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
            $('#role_id').attr('readonly', true);
            $('#model_type').attr('readonly', true);
            $('#model_id').attr('readonly', true);
            $('#id').val('');
            $('#role_id').val('');
            $('#model_type').val('');
            $('#model_id').val('');
            $('#formData').modal('show');
            $('#btnsubmit').prop("disabled", false);

            readonly(false);
        }
        async function viewFunction($id) {
            readonly(true);
            $.ajax({
                type: 'GET',
                async: false,
                url: '/getUserRoleById/' + $id,
                success: function(data) {
                    $('#id').val(data.id);
                    $('#role_id').val(data.role_id);
                    $('#model_type').val(data.model_type);
                    $('#model_id').val(data.model_id);
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
            $('#role_id').attr('readonly', params);
            $('#model_type').attr('readonly', params);
            $('#model_id').attr('readonly', params);
        }

    </script>

@stop
