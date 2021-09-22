@extends('adminlte::page')
{{-- @section('title', 'Project') --}}

@section('content_header')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Project</h1>
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
        <div class="col-8" style="padding-top: 5px;">
            <form action="/search" method="POST">
                {{ csrf_field() }}
                <div class="row">
                    <div class="form-group col-lg-6">
                        <select name="kriteria" class="form-control" id="kriteria" readonly tabindex="-1">
                            <option value="">Status</option>
                            <option value="Not Start">Not Start</option>
                            <option value="On Progress">On Progress</option>
                            <option value="Selesai">Selesai</option>
                            <option value="Batal">Batal</option>
                        </select>
                    </div>
                    <div class="form-group col-lg-6">
                        <button type="button" class="btn btn-primary btn-sm float-left" data-toggle="modal"
                            onclick="awal();">Search
                        </button>
                    </div>
                </div>
            </form>
        </div>
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
                <th> Nama Project</th>
                <th> Descripsi</th>
                <th> Divisi</th>
                <th> Departement</th>
                <th> Jenis</th>
                <th> Status</th>
                <th>Task</th>
                <th>Action</th>
        </table>
    </div>

    <div class="modal fade" id="formData" data-backdrop="static" tabindex="-1" role="dialog"
        aria-labelledby="addDataLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Project</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="/addProject" method="POST">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <input type="hidden" name="id" class="form-control" id="id">
                        </div>
                        <div class="form-group">
                            <label for="nm_project">Nama Project</label>
                            <input type="text" name="nm_project" class="form-control" id="nm_project">
                        </div>
                        <div class="form-group">
                            <label for="descripsi">Descripsi</label>
                            <input type="text" name="descripsi" class="form-control" id="descripsi">
                        </div>
                        <div class="form-group">
                            <label for="divisi">Divisi</label>
                            <select name="divisi" class="form-control" id="divisi">
                                <option value="">Divisi</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="departement">Departement</label>
                            <select name="departement" class="form-control" id="departement">
                            </select>
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



                        <div class="row">
                            <div class="form-group col-4">
                                <label for="jenis">Jenis</label>
                                <select name="jenis" class="form-control" id="jenis">
                                    <option value="">Jenis Project</option>
                                    <option value='Training'>Training</option>
                                    <option value='Workshop'>Workshop</option>
                                    <option value='Pengadaan'>Pengadaan</option>
                                    <option value='Data'>Data</option>
                                    <option value='Lain'>Lain-lain</option>
                                </select>
                            </div>
                            <div class="form-group col-4">
                                <label for="pic">PIC</label>
                                <select name="pic" class="form-control" id="pic">
                                    <option value="pic">PIC</option>
                                </select>
                                {{-- <input type="text" name="pic" class="form-control" id="pic"> --}}
                            </div>
                            <div class="form-group col-4">
                                <label for="status">Status</label>
                                <select name="status" class="form-control" id="status">
                                    <option value="Not Start">Not Start</option>
                                    <option value="On Progress">On Progress</option>
                                    <option value="Selesai">Selesai</option>
                                    <option value="Batal">Batal</option>
                                </select>
                            </div>

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

    <div class="modal fade" id="formTask" data-backdrop="static" tabindex="-1" role="dialog"
        aria-labelledby="addDataLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Input Activity</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="/addProjectActivity" method="POST">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <input type="text" name="id" class="form-control" id="idTask" readonly>
                        </div>
                        <div class="form-group">
                            <label for="kd_project">kd_project</label>
                            <input type="text" name="kd_project_act" class="form-control" id="kd_project_act" readonly>
                        </div>
                        <div class="form-group">
                            <label for="nm_project">Nama Project</label>
                            <input type="text" name="nm_project" class="form-control" id="nm_project_act" readonly>
                        </div>
                        <div class="form-group">
                            <label for="nm_activity">Nama Activity</label>
                            <input type="text" autocomplete="off" name="nm_activity" class="form-control"
                                id="nm_activity">
                        </div>
                        <div class="form-group">
                            <label for="desc_activity">Deskripsi</label>
                            <input type="text" autocomplete="off" name="desc_activity" class="form-control"
                                id="desc_activity">
                        </div>

                        <div class="row">
                            <div class="form-group col-6">
                                <label for="mulai">Mulai </label>
                                <input type="date" name="mulai" class="form-control" id="mulaiAct">
                            </div>
                            <div class="form-group col-6">
                                <label for="selesai">Selesai</label>
                                <input type="date" name="selesai" class="form-control" id="selesaiAct">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="statusProject">Task Status</label>
                            <select name="status" class="form-control" id="statusProject">
                                <option value="Not Start">Not Start</option>
                                <option value="On Progress">On Progress</option>
                                <option value="Selesai">Selesai</option>
                                <option value="Batal">Batal</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="file1">file1</label>
                            <input type="text" autocomplete="off" name="file1" class="form-control" id="file1">
                        </div>
                        <div class="form-group">
                            <label for="file1_desc">file1_desc</label>
                            <input type="text" autocomplete="off" name="file1_desc" class="form-control" id="file1_desc">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" id="btnsubmitAct" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>





    </div>
    {{-- </div> --}}
    <div class="modal fade" id="formTaskList" data-backdrop="static" tabindex="-1" role="dialog"
        aria-labelledby="addDataLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">TaskList</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div>
                        <label for="judulProject" id='judulProject'>Project Name</label>
                        <input type="hidden" name="idProject" class="form-control" id="idProject">

                    </div>
                    <div>
                        <table id="myActivity" class="display nowrap" style="width:100%">
                            <thead>
                                <th>Activity</th>
                                <th>Descripsi</th>
                                <th>Status</th>
                                <th>Mulai</th>
                                <th>Selesai</th>
                                <th>Action</th>
                        </table>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" id="btnaddtask" class="btn btn-primary" onclick="addTaskFunction();">Add
                            Task</button>
                    </div>
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

            // ========================= untuk multi windows Modal
            $('.modal').on('hidden.bs.modal', function(event) {
                $(this).removeClass('fv-modal-stack');
                $('body').data('fv_open_modals', $('body').data('fv_open_modals') - 1);
            });

            $('.modal').on('shown.bs.modal', function(event) {
                // keep track of the number of open modals
                if (typeof($('body').data('fv_open_modals')) == 'undefined') {
                    $('body').data('fv_open_modals', 0);
                }

                // if the z-index of this modal has been set, ignore.
                if ($(this).hasClass('fv-modal-stack')) {
                    return;
                }

                $(this).addClass('fv-modal-stack');
                $('body').data('fv_open_modals', $('body').data('fv_open_modals') + 1);
                $(this).css('z-index', 1040 + (10 * $('body').data('fv_open_modals')));
                $('.modal-backdrop').not('.fv-modal-stack').css('z-index', 1039 + (10 * $('body').data(
                    'fv_open_modals')));
                $('.modal-backdrop').not('fv-modal-stack').addClass('fv-modal-stack');

            });

            // ========================
            createSelect('divisi', 'kode', 'nama', '/getDivisiByGroup');
            dropDown('divisi', 'departement', '/getDepartementByDivisi/', 'kode', 'nama');
            dropDown('departement', 'pic', '/getUserByDepartemen/', 'name', 'name');

            awal();

        });
        //memebuat combobox/selection, params=nama object select,kode = kode/key dari combo/select , nama=text dari select/combo
        function createSelect(params, kode, nama, url) {
            $('select[name="' + params + '"]').empty();
            $.ajax({
                url: url,
                type: "GET",
                async: false,
                dataType: "json",
                success: function(data) {
                    $('select[name="' + params + '"]').empty();
                    $('select[name="' + params + '"]').append('<option value="' +
                        '">' + '-Pilih-' + '</option>');
                    $.each(data, function(key, value) {
                        $('select[name="' + params + '"]').append('<option value="' +
                            value[kode] + '">' + value[nama] + '</option>');
                    });
                }
            });
        }


        //Divisi sebagai parent. departemen sebagai child 
        async function dropDown(parent, child, url, kode, nama) {
            $('select[name="' + parent + '"]').on('change', function() {
                var filter = $(this).val(); //value yang diklik
                // alert(filter);
                if (filter) {
                    $('select[name="' + child + '"]').empty();
                    $.ajax({
                        url: url + filter,
                        type: "GET",
                        async: false,
                        dataType: "json",
                        success: function(data) {
                            $('select[name="' + child + '"]').empty();
                            $('select[name="' + child + '"]').append('<option value="' +
                                '">' + '-Pilih-' + '</option>');
                            $.each(data, function(key, value) {
                                $('select[name="' + child + '"]').append('<option value="' +
                                    value[kode] + '">' + value[nama] + '</option>');
                            });
                        }
                    });
                } else {
                    // $('select[name="' + 'departemen' + '"]').empty();
                    $('select[name="' + child + '"]').empty();
                    $('select[name="' + child + '"]').append('<option value="' + '">' + '-Pilih-' +
                        '</option>');
                    // alert('kosong');
                }
            });
        }

        async function awal() {
            $status = $('#kriteria').val();
            $url = "";
            if ($status == null || $status == "" || $status == '') {
                $url = '/projectByDivAndDept/';
            } else {
                $url = '/projectByDivAndDeptAndStatus/' + $status;
            }

            $('#myTable').dataTable().fnDestroy();
            $('#myTable').DataTable({
                rowReorder: {
                    selector: 'td:nth-child(2)'
                },
                responsive: true,
                processing: true,
                serverSide: true,
                ajax: $url,
                columns: [

                    {
                        data: 'nm_project',
                        name: 'nm_project'
                    },
                    {
                        data: 'descripsi',
                        name: 'descripsi'
                    },
                    {
                        data: 'nm_divisi',
                        name: 'nm_divisi'
                    },
                    {
                        data: 'nm_departement',
                        name: 'nm_departement'
                    },
                    {
                        data: 'jenis',
                        name: 'jenis'
                    },
                    {
                        data: 'status',
                        name: 'status'
                    },
                    {
                        data: 'task',
                        name: 'task',
                        orderable: false,
                        searchable: false
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
            $('#kd_project').attr('readonly', true);
            $('#nm_project').attr('readonly', true);
            $('#descripsi').attr('readonly', true);
            $('#divisi').attr('readonly', true);
            $('#departement').attr('readonly', true);
            $('#jenis').attr('readonly', true);
            $('#id').val('');
            $('#kd_project').val('');
            $('#nm_project').val('');
            $('#descripsi').val('');
            $('#divisi').val('');
            $('#departement').val('');
            $('#jenis').val('');
            $('#pic').val('');
            $('#mulai').val('');
            $('#selesai').val('');

            $('#status').val('');

            $('#formData').modal('show');
            readonly(false);
        }

        async function viewFunction($id) {
            readonly(true);
            $.ajax({
                type: 'GET',
                async: false,
                url: '/getProjectById/' + $id,
                success: function(data) {
                    $('#id').val(data.id);
                    $('#kd_project').val(data.kd_project);
                    $('#nm_project').val(data.nm_project);
                    $('#descripsi').val(data.descripsi);
                    $('#divisi').val(data.divisi);
                    $('#jenis').val(data.jenis);
                    $('#pic').val(data.pic);
                    $('#mulai').val(data.mulai);
                    $('#selesai').val(data.selesai);
                    $('#status').val(data.status);
                    $('#btnsubmit').prop("disabled", true);
                    // Departemen
                    var divisi_kode = data.divisi;
                    var dept = data.departement;
                    createSelect('departement', 'kode', 'nama', "/getDepartementByDivisi/" + divisi_kode);
                    $('#departement').val(data.departement);
                    createSelect('pic', 'user_id', 'name', "/getUserByDepartemen/" + data.departement);

                    $('#pic').val(data.pic);
                    // dropDown('divisi', 'departement', '/getDepartementByDivisi/', 'kode', 'nama');
                    // dropDown('departement', 'pic', '/getUserByDepartemen/', 'name', 'name');


                }

            });

            $('#formData').modal('show');
        }

        async function editFunction($id) {
            await viewFunction($id);
            $('#id').attr('readonly', true);
            $('#btnsubmit').prop("disabled", false);
            readonly(false);
            // await;
            if ($('#status').val() == 'Selesai') {
                $('#btnsubmit').prop("disabled", true);
            }
        }

        function readonly(params) {
            $('#id').attr('readonly', params);
            $('#kd_project').attr('readonly', params);
            $('#nm_project').attr('readonly', params);
            $('#descripsi').attr('readonly', params);
            $('#divisi').attr('readonly', params);
            $('#departement').attr('readonly', params);
            $('#pic').attr('readonly', params);
            $('#jenis').attr('readonly', params);
            $('#mulai').attr('readonly', params);
            $('#selesai').attr('readonly', params);
            $('#status').attr('readonly', params);
        }
        // ACTIVITY--------------------------
        async function taskFunction($id) {

            $('#formTaskList').modal('show');
            $("#judulProject").empty();
            $.ajax({
                type: 'GET',
                async: false,
                url: '/getProjectById/' + $id,
                success: function(data) {
                    $('#nm_project_act').val(data.nm_project);
                    $("#judulProject").append("Kode Peoject :" + $id + " " + $('#nm_project_act').val());
                }
            });


            $("#idProject").val($id);
            $('#myActivity').DataTable({
                rowReorder: {
                    selector: 'td:nth-child(2)'
                },
                destroy: true,
                responsive: true,
                processing: true,
                serverSide: true,
                ajax: '/projectActivityByProject/' + $id,
                columns: [{
                        data: 'nm_activity',
                        name: 'nm_activity'
                    },
                    {
                        data: 'desc_activity',
                        name: 'desc_activity'
                    },
                    {
                        data: 'status',
                        name: 'status'
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
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false
                    }
                ]
            });
        }


        function addTaskFunction($id) {
            $('#formTask').modal('show');
            $('#kd_project_act').val($('#idProject').val());
        }


        function viewFunctionAct($id) {
            $('#formTask').modal('show');
            $('#kd_project_act').val($('#idProject').val());
            $.ajax({
                type: 'GET',
                async: false,
                url: '/getProjectActivityById/' + $id,
                success: function(data) {
                    $('#idTask').val(data.id);
                    $('#kd_activity').val(data.kd_activity);
                    $('#nm_activity').val(data.nm_activity);
                    $('#desc_activity').val(data.desc_activity);
                    $('#status').val(data.status);
                    $('#kd_project').val(data.kd_project);
                    $('#jenis').val(data.jenis);
                    $('#nm_project').val(data.nm_project);
                    $('#descripsi').val(data.descripsi);
                    $('#divisi').val(data.divisi);
                    $('#departement').val(data.departement);
                    $('#file1').val(data.file1);
                    $('#file1_desc').val(data.file1_desc);
                    $('#file2').val(data.file2);
                    $('#file2_desc').val(data.file2_desc);
                    $('#file3').val(data.file3);
                    $('#file3_desc').val(data.file3_desc);
                    $('#btnsubmit').prop("disabled", true);

                    $('#mulaiAct').val(data.mulai);
                    $('#selesaiAct').val(data.selesai);

                }

            });

            // $('#formData').modal('show');
        }

        function editFunctionAct($id) {
            viewFunctionAct($id);
        }
    </script>

@stop
