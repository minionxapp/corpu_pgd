@extends('adminlte::page')
@section('title', 'Dashboard')

@section('content_header')

    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>G-Leads Skill</h1>
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
                    {{-- <div class="form-group col-lg-6">
                        <label for="tahun">Tahun</label>
                        <select name="tahun" class="form-control" id="tahun">
                            <option value="">Tahun</option>
                            <option value="2019">2019</option>
                            <option value="2020">2020</option>
                            <option value="2021">2021</option>
                        </select>
                    </div> --}}
                    <div class="form-group col-lg-6">
                        <label for="program">Program</label>
                        <select name="program" class="form-control" id="program">
                            <option value="ALL">--All--</option>
                            @foreach ($program as $item)
                                <option value="{{ $item->program_name }}">{{ $item->program_name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                {{-- <div class="row"> --}}
                {{-- <div class="form-group col-lg-6">
                        <label for="skill">Skill</label>
                        <select name="skill" class="form-control" id="skill">
                            @foreach ($program as $item)
                            <option value="{{$item->program_name}}">{{$item->program_name}}</option>
                            @endforeach
                        </select>
                    </div> --}}
                {{-- <div class="form-group col-lg-6">
                        <label for="modul">Modul</label>
                        <select name="modul" class="form-control" id="modul">
                           
                        </select>
                    </div> --}}
                {{-- </div> --}}
            </form>
            <button type="button" class="btn btn-primary btn-sm float-left" data-toggle="modal"
                onclick="searchFunction();">Search
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
                {{-- <th> Id</th> --}}
                <th> Nama Program</th>
                <th> Nama Skill</th>
                <th> Valid</th>
                <th> Action</th>
        </table>
    </div>
    <div class="modal fade" id="formData" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="addDataLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Data Skill</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="/addTransGleadsSkill" method="POST" autocomplete="off">
                        {{ csrf_field() }}
                        <div class="form-group">
                            {{-- <label for="id">Id</label> --}}
                            <input type="hidden" name="id" class="form-control" id="id">
                        </div>
                        <div class="form-group">
                            <label for="skill_name">Nama Skill</label>
                            <input type="text" name="skill_name" class="form-control" id="skill_name">
                        </div>
                        <div class="form-group">
                            <label for="program_name">Nama Program</label>
                            <select name="program_name" class="form-control" id="program_name">
                                @foreach ($program as $item)
                                    <option value="{{ $item->program_name }}">{{ $item->program_name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="deskripsi">Deskripsi</label>
                            <input type="text" name="deskripsi" class="form-control" id="deskripsi">
                        </div>
                        <div class="form-group">
                            <label for="job_family">Job Family</label>
                            <select name="job_family" class="form-control" id="job_family">
                                @foreach ($jobFamily as $item)
                                    <option value="{{ $item->kode }}">{{ $item->nama }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="row">
                            <div class="form-group col-sm-2">
                                <label for="tot_jam">Tot Jam</label>
                                <input type="text" name="tot_jam" class="form-control" id="tot_jam">
                            </div>
                            <div class="form-group col-sm-5">
                                <label for="jenis">Jenis</label>
                                {{-- <input type="text" name="jenis" class="form-control" id="jenis"> --}}

                                <select name="jenis" class="form-control" id="jenis">
                                    @foreach ($jenisTraining as $item)
                                        <option value="{{ $item->kode }}">{{ $item->nama }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-sm-5">
                                <label for="fasilitator">Fasilitator</label>
                                <input type="text" name="fasilitator" class="form-control" id="fasilitator">
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-2">
                                <label for="tot_hari">Tot Hari</label>
                                <input type="text" name="tot_hari" class="form-control" id="tot_hari">
                            </div>
                            <div class="form-group col-md-5">
                                <label for="mulai">Mulai</label>
                                <input type="date" name="mulai" class="form-control" id="mulai">
                            </div>
                            <div class="form-group col-md-5">
                                <label for="selesai">Selesai</label>
                                <input type="date" name="selesai" class="form-control" id="selesai">
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-sm-7">
                                <label for="venue">Tempat</label>
                                <input type="text" name="venue" class="form-control" id="venue">
                            </div>
                            <div class="form-group col-sm-5">
                                <label for="tot_peserta">Tot Peserta</label>
                                <input type="text" name="tot_peserta" class="form-control" id="tot_peserta">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="nama_training">Nama_Training</label>
                            <input type="text" name="nama_training" class="form-control" id="nama_training">
                        </div>

                        <div class="form-group">
                            <label for="valid">Valid</label>
                            <select name="valid" class="form-control" id="valid">
                                <option value="N/A">N/A</option>
                                <option value="Y">Yes</option>
                                <option value="N">No</option>
                            </select>
                        </div>
                        {{-- <div class="form-group">
                            <label for=""></label>
                            <input type="text" name="" class="form-control" id="">
                        </div>
                        <div class="form-group">
                            <label for=""></label>
                            <input type="text" name="" class="form-control" id="">
                        </div>
                        <div class="form-group">
                            <label for=""></label>
                            <input type="text" name="" class="form-control" id="">
                        </div> --}}


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
                ajax: '/allTransGleadsSkill',
                columns: [
                    // {
                    //     data: 'id',
                    //     name: 'id'
                    // },
                    {
                        data: 'program_name',
                        name: 'program_name'
                    },
                    {
                        data: 'skill_name',
                        name: 'skill_name'
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
            $('#skill_name').attr('readonly', true);
            $('#valid').attr('readonly', true);
            $('#id').val('');
            $('#program_name').val('');
            $('#skill_name').val('');
            $('#valid').val('');
            $('#formData').modal('show');
            $('#btnsubmit').prop("disabled", false);

            $('#deskripsi').val('');
            $('#job_family').val('');
            $('#tot_jam').val('');

            $('#jenis').val('');
            $('#fasilitator').val('');
            $('#tot_hari').val('');
            $('#mulai').val('');
            $('#selesai').val('');
            $('#venue').val('');
            $('#tot_peserta').val('');
            $('#nama_training').val('');


            readonly(false);
        }
        async function viewFunction($id) {
            readonly(true);
            $.ajax({
                type: 'GET',
                async: false,
                url: '/getTransGleadsSkillById/' + $id,
                success: function(data) {
                    $('#id').val(data.id);
                    $('#program_name').val(data.program_name);
                    $('#skill_name').val(data.skill_name);
                    $('#valid').val(data.valid);
                    $('#btnsubmit').prop("disabled", true);
                    $('#deskripsi').val(data.deskripsi);
                    $('#job_family').val(data.job_family);
                    $('#tot_jam').val(data.tot_jam);

                    $('#jenis').val(data.jenis);
                    $('#fasilitator').val(data.fasilitator);
                    $('#tot_hari').val(data.tot_hari);
                    $('#mulai').val(data.mulai);
                    $('#selesai').val(data.selesai);
                    $('#venue').val(data.venue);
                    $('#tot_peserta').val(data.tot_peserta);
                    $('#nama_training').val(data.nama_training);
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
            $('#skill_name').attr('readonly', params);
            $('#valid').attr('readonly', params);
            $('#deskripsi').attr('readonly', params);
            $('#job_family').attr('readonly', params);
            $('#tot_jam').attr('readonly', params);


            $('#jenis').attr('readonly', params);
            $('#fasilitator').attr('readonly', params);
            $('#tot_hari').attr('readonly', params);
            $('#mulai').attr('readonly', params);
            $('#selesai').attr('readonly', params);
            $('#venue').attr('readonly', params);
            $('#tot_peserta').attr('readonly', params);
            $('#nama_training').attr('readonly', params);

        }

        function searchFunction() {
            $('#myTable').dataTable().fnClearTable();
            $('#myTable').dataTable().fnDestroy();
            $('#myTable').DataTable({
                rowReorder: {
                    selector: 'td:nth-child(2)'
                },
                responsive: true,
                processing: true,
                serverSide: true,
                ajax: '/skillbyprogram/' + $("#program").val(),
                columns: [
                    // {
                    //     data: 'id',
                    //     name: 'id'
                    // },
                    {
                        data: 'program_name',
                        name: 'program_name'
                    },
                    {
                        data: 'skill_name',
                        name: 'skill_name'
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

    </script>

@stop
