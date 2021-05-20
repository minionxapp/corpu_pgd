@extends('adminlte::page')
@section('title', 'Dashboard')

@section('content_header')

    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>RolePermission</h1>
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

    {{-- <div class="row text-nowrap">
        <div class="col-12" style="padding-top: 5px;">
            <button type="button" class="btn btn-primary btn-sm float-left" data-toggle="modal" onclick="addFunction();">Add
            </button>
        </div>
    </div> --}}
    <div class="row text-nowrap">
        <div class="col-12" style="padding-top: 5px;">
            <form action="/search" method="POST">
                {{ csrf_field() }}
                <div class="row">
                    <div class="form-group col-lg-6">
                        <label for="program">Role</label>
                        {{-- <input type="text" name="UserId" class="form-control" id="UserId"> --}}
                        <select name="role" class="form-control" id="role">
                            <option value="">--Role--</option>
                            @foreach ($roles as $role)
                            <option value="{{$role->id}}">{{$role->name}}</option>
                            @endforeach
                        </select>
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
                {{-- <th> id</th> --}}
                <th> role_id</th>
                <th>Role Name </th>
                <th> permission_id</th>
                <th> permission Name</th>
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
                    <form action="/addRolePermission" method="POST" autocomplete="off">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="id">id</label>
                            <input type="text" name="id" class="form-control" id="id">
                        </div>
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
                        <div class="form-group">
                            <label for="permission_id">permission_id</label>
                            {{-- <input type="text" name="permission_id" class="form-control" id="permission_id"> --}}
                            <select name="permission_id" class="form-control" id="permission_id">
                                <option value="">--Permission--</option>
                                @foreach ($permissions as $permission)
                                <option value="{{$permission->id}}">{{$permission->name}}</option>
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
            // awal();
            awal('/allRolePermission');
        });
        function searchFunction() {
            $('#myTable').dataTable().fnClearTable();
            $('#myTable').dataTable().fnDestroy();
            if($('#role').val() == null || $('#role').val() ==''){
                awal('/allRolePermission');
            }else{
                awal('/allPermissionByRole/'+$('#role').val());
            }
        }
        function awal(url) {
            $('#myTable').DataTable({
                rowReorder: {
                    selector: 'td:nth-child(2)'
                },
                responsive: true,
                processing: true,
                serverSide: true,
                ajax: url,
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
                        data: 'permission_id',
                        name: 'permission_id'
                    },
                    {
                        data: 'permissionname',
                        name: 'permissionname'
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
            $('#permission_id').attr('readonly', true);
            $('#role_id').attr('readonly', true);
            $('#id').val('');
            $('#permission_id').val('');
            $('#role_id').val('');
            $('#formData').modal('show');
            $('#btnsubmit').prop("disabled", false);

            readonly(false);
        }
        async function viewFunction($id) {
            readonly(true);
            $.ajax({
                type: 'GET',
                async: false,
                url: '/getRolePermissionById/' + $id,
                success: function(data) {
                    $('#id').val(data.id);
                    $('#permission_id').val(data.permission_id);
                    $('#role_id').val(data.role_id);
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
            $('#permission_id').attr('readonly', params);
            $('#role_id').attr('readonly', params);
        }

    </script>

@stop
