@extends('adminlte::page')
{{-- @section('title', 'Dashboard') --}}

@section('css_cus')
<script src="https://cdn.ckeditor.com/4.16.0/standard/ckeditor.js"></script>
    
@endsection

@section('content_header')

    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Desain Training</h1>
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
                <th> kode</th>
                <th> nama</th>
                <th> jenis_taining</th>
                <th> kelompok</th>
                {{-- <th> latar_tujuan</th> --}}
                {{-- <th> deskripsi</th> --}}
                {{-- <th> kriteria_peserta</th> --}}
                <th> fasilitator</th>
                {{-- <th> jml_hari</th> --}}
                {{-- <th> jml_jamlat</th> --}}
                {{-- <th> tempat</th> --}}
                {{-- <th> tgl_mulai</th> --}}
                {{-- <th> tgl_selesai</th> --}}
                {{-- <th> metode</th> --}}
                {{-- <th> jml_peserta</th> --}}
                {{-- <th> penilaian</th> --}}
                {{-- <th> investasi</th> --}}
                {{-- <th> pre_class</th> --}}
                {{-- <th> post_class</th> --}}
                <th> pengusul</th>
                <th> approval</th>
                <th>Action</th>
        </table>
    </div>
    <div class="modal fade" id="formData" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="addDataLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Desain Training</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="/addDesainTraining" method="POST">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <input type="hidden" name="id" class="form-control" id="id">
                        </div>

                        <div class="row">
                            <div class="form-group col-lg-6">
                                <label for="kode">Kode</label>
                                <input type="text" name="kode" class="form-control" id="kode">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="nama">Nama</label>
                            <input type="text" name="nama" class="form-control" id="nama">
                        </div>
                        <div class="row">                            
                            <div class="form-group col-lg-6">
                                <label for="jenis_taining">Jenis Training</label>
                                <select name="jenis_taining" class="form-control" id="jenis_taining">
                                    <option value="All">Jenis Training</option>
                                    @foreach ($jenistraining as $item)
                                        <option value={{$item->kode}}>{{$item->nama}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-lg-6">
                                <label for="kelompok">Kelompok</label>
                                <select name="kelompok" class="form-control" id="kelompok">
                                    <option value="All">All</option>
                                    @foreach ($jobfamily as $item)
                                        <option value={{$item->kode}}>{{$item->nama}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="latar_tujuan">latar_tujuan</label>
                            <textarea type="text" rows="2" name="latar_tujuan" class="form-control" id="latar_tujuan"></textarea>
                        </div>
                        <script>
                                CKEDITOR.replace( 'latar_tujuan' );
                        </script>
                        <div class="form-group">
                            <label for="deskripsi">deskripsi</label>
                            <textarea type="text" name="deskripsi" class="form-control" id="deskripsi"></textarea>
                        </div>
                        <script>
                            CKEDITOR.replace( 'deskripsi' );
                        </script>
                        <div class="form-group">
                            <label for="kriteria_peserta">kriteria_peserta</label>
                            <textarea type="text" name="kriteria_peserta" class="form-control" id="kriteria_peserta"></textarea>
                        </div>
                        <script>
                            CKEDITOR.replace( 'kriteria_peserta' );
                        </script>

                        <div class="form-group">
                            <label for="fasilitator">fasilitator</label>
                            <input type="text" name="fasilitator" class="form-control" id="fasilitator">
                        </div>
                        <div class="row">                            
                            <div class="form-group col-lg-6">
                                <label for="jml_hari">jml hari</label>
                                <input type="text" name="jml_hari" class="form-control" id="jml_hari">
                            </div>
                            <div class="form-group col-lg-6">
                                <label for="jml_jamlat">jml jamlat</label>
                                <input type="text" name="jml_jamlat" class="form-control" id="jml_jamlat">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="tempat">tempat</label>
                            <input type="text" name="tempat" class="form-control" id="tempat">
                        </div>
                        <div class="row">
                            <div class="form-group col-lg-6">
                                <label for="tgl_mulai">tgl_mulai</label>
                                <input type="date" name="tgl_mulai" class="form-control" id="tgl_mulai">
                            </div>
                            <div class="form-group col-lg-6">
                                <label for="tgl_selesai">tgl_selesai</label>
                                <input type="date" name="tgl_selesai" class="form-control" id="tgl_selesai">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="metode">metode</label>
                            <input type="text" name="metode" class="form-control" id="metode">
                        </div>
                        <div class="form-group">
                            <label for="jml_peserta">jml_peserta</label>
                            <input type="text" name="jml_peserta" class="form-control" id="jml_peserta">
                        </div>
                        <div class="form-group">
                            <label for="penilaian">penilaian</label>
                            <input type="text" name="penilaian" class="form-control" id="penilaian">
                        </div>
                        <div class="form-group">
                            <label for="investasi">investasi</label>
                            <input type="text" name="investasi" class="form-control" id="investasi">
                        </div>
                        <div class="form-group">
                            <label for="pre_class">pre_class</label>
                            <input type="text" name="pre_class" class="form-control" id="pre_class">
                        </div>
                        <div class="form-group">
                            <label for="post_class">post_class</label>
                            <input type="text" name="post_class" class="form-control" id="post_class">
                        </div>
                        <div class="form-group">
                            <label for="pengusul">pengusul</label>
                            {{-- <input type="text" name="pengusul" class="form-control" id="pengusul"> --}}
                            <select name="pengusul" class="form-control" id="pengusul">
                                <option value="All">All</option>
                                @foreach ($departemen as $item)
                                    <option value={{$item->kode}}>{{$item->nama}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="approval">approval</label>
                            <input type="text" name="approval" class="form-control" id="approval">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" id="btnsubmit" class="btn btn-primary">Submit</button>
                        <button type="button" class="btn btn-primary btn-sm float-left"  onclick="cetak();">Cetak</button>
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

        function cetak() {
            window.open("/cetakDesainTraining/"+$('#id').val());
        }
        function awal() {
            $('#myTable').DataTable({
                rowReorder: {
                    selector: 'td:nth-child(2)'
                },
                responsive: true,
                processing: true,
                serverSide: true,
                ajax: '/allDesainTraining',
                columns: [{
                        data: 'id',
                        name: 'id'
                    },
                    {
                        data: 'kode',
                        name: 'kode'
                    },
                    {
                        data: 'nama',
                        name: 'nama'
                    },
                    {
                        data: 'jenis_taining',
                        name: 'jenis_taining'
                    },
                    {
                        data: 'kelompok',
                        name: 'kelompok'
                    },
                    // {
                    //     data: 'deptnamen',
                    //     name: 'deptnamen'
                    // },
                    // deptnamen
                    // {
                    //     data: 'latar_tujuan',
                    //     name: 'latar_tujuan'
                    // },
                    // {
                    //     data: 'deskripsi',
                    //     name: 'deskripsi'
                    // },
                    // {
                    //     data: 'kriteria_peserta',
                    //     name: 'kriteria_peserta'
                    // },
                    {
                        data: 'fasilitator',
                        name: 'fasilitator'
                    },
                    // {
                    //     data: 'jml_hari',
                    //     name: 'jml_hari'
                    // },
                    // {
                    //     data: 'jml_jamlat',
                    //     name: 'jml_jamlat'
                    // },
                    // {
                    //     data: 'tempat',
                    //     name: 'tempat'
                    // },
                    // {
                    //     data: 'tgl_mulai',
                    //     name: 'tgl_mulai'
                    // },
                    // {
                    //     data: 'tgl_selesai',
                    //     name: 'tgl_selesai'
                    // },
                    // {
                    //     data: 'metode',
                    //     name: 'metode'
                    // },
                    // {
                    //     data: 'jml_peserta',
                    //     name: 'jml_peserta'
                    // },
                    // {
                    //     data: 'penilaian',
                    //     name: 'penilaian'
                    // },
                    // {
                    //     data: 'investasi',
                    //     name: 'investasi'
                    // },
                    // {
                    //     data: 'pre_class',
                    //     name: 'pre_class'
                    // },
                    // {
                    //     data: 'post_class',
                    //     name: 'post_class'
                    // },
                    {
                        data: 'pengusul',
                        name: 'deptnamen'//'pengusul'
                    },
                    {
                        data: 'approval',
                        name: 'approval'
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
            $('#kode').attr('readonly', true);
            $('#nama').attr('readonly', true);
            $('#jenis_taining').attr('readonly', true);
            $('#kelompok').attr('readonly', true);
            $('#latar_tujuan').attr('readonly', true);
            $('#deskripsi').attr('readonly', true);
            $('#kriteria_peserta').attr('readonly', true);
            $('#fasilitator').attr('readonly', true);
            $('#jml_hari').attr('readonly', true);
            $('#jml_jamlat').attr('readonly', true);
            $('#tempat').attr('readonly', true);
            $('#tgl_mulai').attr('readonly', true);
            $('#tgl_selesai').attr('readonly', true);
            $('#metode').attr('readonly', true);
            $('#jml_peserta').attr('readonly', true);
            $('#penilaian').attr('readonly', true);
            $('#investasi').attr('readonly', true);
            $('#pre_class').attr('readonly', true);
            $('#post_class').attr('readonly', true);
            $('#pengusul').attr('readonly', true);
            $('#approval').attr('readonly', true);
            $('#id').val('');
            $('#kode').val('');
            $('#nama').val('');
            $('#jenis_taining').val('');
            $('#kelompok').val('');
            $('#latar_tujuan').val('');
            $('#deskripsi').val('');
            $('#kriteria_peserta').val('');
            $('#fasilitator').val('');
            $('#jml_hari').val('');
            $('#jml_jamlat').val('');
            $('#tempat').val('');
            $('#tgl_mulai').val('');
            $('#tgl_selesai').val('');
            $('#metode').val('');
            $('#jml_peserta').val('');
            $('#penilaian').val('');
            $('#investasi').val('');
            $('#pre_class').val('');
            $('#post_class').val('');
            $('#pengusul').val('');
            $('#approval').val('');
            $('#formData').modal('show');
            $('#btnsubmit').prop("disabled", false);

            readonly(false);
        }
        async function viewFunction($id) {
            readonly(true);
            $.ajax({
                type: 'GET',
                async: false,
                url: '/getDesainTrainingById/' + $id,
                success: function(data) {
                    $('#id').val(data.id);
                    $('#kode').val(data.kode);
                    $('#nama').val(data.nama);
                    $('#jenis_taining').val(data.jenis_taining);
                    $('#kelompok').val(data.kelompok);
                    // $('#latar_tujuan').val(data.latar_tujuan);
                    CKEDITOR.instances['latar_tujuan'].setData(data.latar_tujuan);
                    // $('#deskripsi').val(data.deskripsi);
                    CKEDITOR.instances['deskripsi'].setData(data.deskripsi);
                    // $('#kriteria_peserta').val(data.kriteria_peserta);
                    CKEDITOR.instances['kriteria_peserta'].setData(data.kriteria_peserta);
                    $('#fasilitator').val(data.fasilitator);
                    $('#jml_hari').val(data.jml_hari);
                    $('#jml_jamlat').val(data.jml_jamlat);
                    $('#tempat').val(data.tempat);
                    $('#tgl_mulai').val(data.tgl_mulai);
                    $('#tgl_selesai').val(data.tgl_selesai);
                    $('#metode').val(data.metode);
                    $('#jml_peserta').val(data.jml_peserta);
                    $('#penilaian').val(data.penilaian);
                    $('#investasi').val(data.investasi);
                    $('#pre_class').val(data.pre_class);
                    $('#post_class').val(data.post_class);
                    $('#pengusul').val(data.pengusul);
                    $('#approval').val(data.approval);
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
            $('#kode').attr('readonly', params);
            $('#nama').attr('readonly', params);
            $('#jenis_taining').attr('readonly', params);
            $('#kelompok').attr('readonly', params);
            $('#latar_tujuan').attr('readonly', params);
            $('#deskripsi').attr('readonly', params);
            $('#kriteria_peserta').attr('readonly', params);
            $('#fasilitator').attr('readonly', params);
            $('#jml_hari').attr('readonly', params);
            $('#jml_jamlat').attr('readonly', params);
            $('#tempat').attr('readonly', params);
            $('#tgl_mulai').attr('readonly', params);
            $('#tgl_selesai').attr('readonly', params);
            $('#metode').attr('readonly', params);
            $('#jml_peserta').attr('readonly', params);
            $('#penilaian').attr('readonly', params);
            $('#investasi').attr('readonly', params);
            $('#pre_class').attr('readonly', params);
            $('#post_class').attr('readonly', params);
            $('#pengusul').attr('readonly', params);
            $('#approval').attr('readonly', params);
        }

    </script>

@stop
