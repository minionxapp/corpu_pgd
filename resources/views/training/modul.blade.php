@extends('adminlte::page')
{{-- @section('title', 'Dashboard') --}}

@section('content_header')

    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Modul Training</h1>
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
            {{-- <button type="button" class="btn btn-primary btn-sm float-left"  
                data-toggle="modal" onclick="addFunction();" >Add
            </button> --}}
            <form action="/search" method="POST">
                {{ csrf_field() }}
                <div class="row">
                   
                    <div class="form-group col-lg-6">
                        <label for="program">Program</label>
                        <select name="program" class="form-control" id="program">
                            <option value="all">--All--</option>
                            @foreach ($program as $item)
                            <option value="{{$item->program_name}}">{{$item->program_name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group col-lg-6">
                        <label for="skill">Skill</label>
                        <select name="skill" class="form-control" id="skill">
                        </select>
                    </div>
                </div>
            </form>
            <button type="button" class="btn btn-primary btn-sm float-left"  
                data-toggle="modal" onclick="searchFunction();" >Search
            </button>
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
                {{-- <th> modul_id</th> --}}
                {{-- <th> program_name</th> --}}
                <th> skill_name</th>
                <th> modul_name</th>
                <th> jamlat</th>
                <th> hitung</th>
                <th> enrolled</th>
                <th> selesai</th>
                <th> progress</th>
                <th> belum</th>
                <th> modul_type</th>
                <th> tahun</th>
                <th> type_enroll</th>
                <th>Action</th>
        </table>
    </div>
    <div class="modal fade" id="formData" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="addDataLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Modul Training</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="/addGleadsModul" method="POST" autocomplete="off">
                        {{ csrf_field() }}
                        <div class="form-group">
                            {{-- <label for="id">id</label> --}}
                            <input type="hidden" name="id" class="form-control" id="id">
                        </div>
                        <div class="form-group">
                            {{-- <label for="modul_id">modul_id</label> --}}
                            <input type="hidden" name="modul_id" class="form-control" id="modul_id">
                        </div>
                        <div class="form-group">
                            <label for="program_name">Nama Program</label>
                            <input type="text" name="program_name" class="form-control" id="program_name">
                        </div>
                        <div class="form-group">
                            <label for="skill_name">Nama Skill</label>
                            <input type="text" name="skill_name" class="form-control" id="skill_name">
                        </div>
                        <div class="form-group">
                            <label for="modul_name">Nama Modul</label>
                            <input type="text" name="modul_name" class="form-control" id="modul_name">
                        </div>
                        <div class="form-group">
                            <label for="nama_training">nama_training</label>
                            <input type="text" name="nama_training" class="form-control" id="nama_training">
                        </div>
                        <div class="row">
                            <div class="form-group col-6">
                                <label for="jamlat">Jamlat</label>
                                <input type="text" name="jamlat" class="form-control" id="jamlat">
                            </div>
                            <div class="form-group col-6">
                                <label for="hitung">Hitung</label>
                                {{-- <input type="text" name="hitung" class="form-control" id="hitung"> --}}
                                <select name="hitung" class="form-control" id="hitung">
                                    <option value="Ya">Ya</option>
                                    <option value="Tidak">Tidak</option>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-3">
                                <label for="enrolled">Enrolled</label>
                                <input type="text" name="enrolled" class="form-control" id="enrolled">
                            </div>
                            <div class="form-group col-3">
                                <label for="selesai">Selesai</label>
                                <input type="text" name="selesai" class="form-control" id="selesai">
                            </div>
                            <div class="form-group col-3">
                                <label for="progress">Progress</label>
                                <input type="text" name="progress" class="form-control" id="progress">
                            </div>
                            <div class="form-group  col-3">
                                <label for="belum">Belum</label>
                                <input type="text" name="belum" class="form-control" id="belum">
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-4">
                                <label for="modul_type">modul_type</label>
                                <input type="text" name="modul_type" class="form-control" id="modul_type">
                            </div>

                            <div class="form-group col-4">
                                <label for="tahun">Tahun</label>
                                <input type="text" name="tahun" class="form-control" id="tahun">
                            </div>
                            <div class="form-group col-4">
                                <label for="type_enroll">type_enroll</label>
                                <input type="text" name="type_enroll" class="form-control" id="type_enroll">
                            </div>
                        </div>



                            <div class="form-group">
                                <label for="hitung">As Training</label>
                                {{-- <input type="text" name="hitung" class="form-control" id="hitung"> --}}
                                <select name="modul_as_training" class="form-control" id="modul_as_training">
                                    <option value="Ya">Ya</option>
                                    <option value="Tidak">Tidak</option>
                                </select>
                            </div>
                            <div class="form-group ">
                                <label for="type_enroll">type_enroll</label>
                                <input type="text" name="type_enroll" class="form-control" id="type_enroll">
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
            dropDown('program', 'skill', '/skillnoth/', 'skill_name', 'skill_name');
            $('#program').val("{{$programName}}");
            searchFunction();
        });

        function awal() {
            $('#myTable').DataTable({
                rowReorder: {
                    selector: 'td:nth-child(2)'
                },
                responsive: true,
                processing: true,
                serverSide: true,
                ajax: '/allGleadsModul',
                columns: [
                    // {
                    //     data: 'modul_id',
                    //     name: 'modul_id'
                    // },
                    // {
                    //     data: 'program_name',
                    //     name: 'program_name'
                    // },
                    {
                        data: 'skill_name',
                        name: 'skill_name'
                    },
                    {
                        data: 'modul_name',
                        name: 'modul_name'
                    },
                    {
                        data: 'jamlat',
                        name: 'jamlat'
                    },
                    {
                        data: 'hitung',
                        name: 'hitung'
                    },
                    {
                        data: 'enrolled',
                        name: 'enrolled'
                    },
                    {
                        data: 'selesai',
                        name: 'selesai'
                    },
                    {
                        data: 'progress',
                        name: 'progress'
                    },
                    {
                        data: 'belum',
                        name: 'belum'
                    },
                    {
                        data: 'modul_type',
                        name: 'modul_type'
                    },
                    {
                        data: 'tahun',
                        name: 'tahun'
                    },
                    {
                        data: 'type_enroll',
                        name: 'type_enroll'
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
            $('#program_name').attr('readonly', true);
            $('#skill_name').attr('readonly', true);
            $('#modul_name').attr('readonly', true);
            $('#jamlat').attr('readonly', true);
            $('#hitung').attr('readonly', true);
            $('#enrolled').attr('readonly', true);
            $('#selesai').attr('readonly', true);
            $('#progress').attr('readonly', true);
            $('#belum').attr('readonly', true);
            $('#modul_type').attr('readonly', true);
            $('#tahun').attr('readonly', true);
            $('#type_enroll').attr('readonly', true);
            $('#modul_id').val('');
            $('#program_name').val('');
            $('#skill_name').val('');
            $('#modul_name').val('');
            $('#jamlat').val('');
            $('#hitung').val('');
            $('#enrolled').val('');
            $('#selesai').val('');
            $('#progress').val('');
            $('#belum').val('');
            $('#modul_type').val('');
            $('#tahun').val('');
            $('#type_enroll').val('');
            $('#modul_as_training').val('');
            $('#nama_training').val('');
            
            $('#formData').modal('show');
            $('#btnsubmit').prop("disabled", false);

            readonly(false);
            $('#modul_id').attr('readonly', true);
        }
        async function viewFunction($id) {
            readonly(true);
            $.ajax({
                type: 'GET',
                async: false,
                url: '/getGleadsModulById/' + $id,
                success: function(data) {
                    $('#id').val(data.id);
                    $('#modul_id').val(data.modul_id);
                    $('#program_name').val(data.program_name);
                    $('#skill_name').val(data.skill_name);
                    $('#modul_name').val(data.modul_name);
                    $('#jamlat').val(data.jamlat);
                    $('#hitung').val(data.hitung);
                    $('#enrolled').val(data.enrolled);
                    $('#selesai').val(data.selesai);
                    $('#progress').val(data.progress);
                    $('#belum').val(data.belum);
                    $('#modul_type').val(data.modul_type);
                    $('#tahun').val(data.tahun);
                    $('#type_enroll').val(data.type_enroll);
                    $('#modul_as_training').val(data.modul_as_training);
                    $('#nama_training').val(data.nama_training);
                    
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
            $('#modul_id').attr('readonly', true);
            $('#program_name').attr('readonly', true);
            $('#skill_name').attr('readonly', true);
            $('#modul_name').attr('readonly', true);
        }

        function readonly(params) {
            $('#modul_id').attr('readonly', params);
            $('#program_name').attr('readonly', params);
            $('#skill_name').attr('readonly', params);
            $('#modul_name').attr('readonly', params);
            $('#jamlat').attr('readonly', params);
            $('#hitung').attr('readonly', params);
            $('#enrolled').attr('readonly', params);
            $('#selesai').attr('readonly', params);
            $('#progress').attr('readonly', params);
            $('#belum').attr('readonly', params);
            $('#modul_type').attr('readonly', params);
            $('#tahun').attr('readonly', params);
            $('#type_enroll').attr('readonly', params);
            $('#modul_as_training').attr('readonly', params);
            
        }



        function searchFunction() {
            url = '/getGleadsModulByProgram/'+$("#skill").val();
            $('#myTable').dataTable().fnClearTable();
            $('#myTable').dataTable().fnDestroy();
            $('#myTable').DataTable({
                rowReorder: {
                    selector: 'td:nth-child(2)'
                },
                responsive: true,
                processing: true,
                serverSide: true,
                ajax: url ,
                columns: [
                    // {
                    //     data: 'program_name',
                    //     name: 'program_name'
                    // },
                    {
                        data: 'skill_name',
                        name: 'skill_name'
                    },
                    {
                        data: 'modul_name',
                        name: 'modul_name'
                    },
                    {
                        data: 'jamlat',
                        name: 'jamlat'
                    },
                    {
                        data: 'hitung',
                        name: 'hitung'
                    },
                    {
                        data: 'enrolled',
                        name: 'enrolled'
                    },
                    {
                        data: 'selesai',
                        name: 'selesai'
                    },
                    {
                        data: 'progress',
                        name: 'progress'
                    },
                    {
                        data: 'belum',
                        name: 'belum'
                    },
                    {
                        data: 'modul_type',
                        name: 'modul_type'
                    },
                    {
                        data: 'tahun',
                        name: 'tahun'
                    },
                    {
                        data: 'type_enroll',
                        name: 'type_enroll'
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


        async function dropDown(divisi, child, url, kode, nama) {
            $('select[name="' + divisi + '"]').on('change', function() {
                // var filter = $("#program option:selected" ).text();//$(this).val();
                var filter = $(this).val();
                // alert($("#tahun").val());
                if (filter) {
                    $('select[name="' + child + '"]').empty();
                    $('select[name="' + "modul" + '"]').empty();
                    $('select[name="' + "skill" + '"]').append('<option value="' +
                                    "" + '">' + "--Skill Name--" + '</option>');
                    $.ajax({
                        url: url + filter+"/",//$("#tahun").val(),
                        type: "GET",
                        async: false,
                        dataType: "json",
                        success: function(data) {
                            $.each(data, function(key, value) {
                                $('select[name="' + child + '"]').append('<option value="' +
                                    value[kode] + '">' + value[nama] + '</option>');
                            });
                        }
                    });
                } else {
                    $('select[name="' + 'departemen' + '"]').empty();
                }
            });
        }



    </script>

@stop
