@extends('adminlte::page')
@section('title', config('adminlte.title'))

@section('content_header')

    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Dokumen</h1>
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
                        <label for="program">Kriteria</label>
                        <select name="kriteria" class="form-control" id="kriteria">
                            <option value={{$departemen_user->user_id}}>{{$departemen_user->name}}</option>
                            @foreach ($departemen as $item)
                            <option value={{$item->kode}}>{{$item->nama}}</option>
                            @endforeach
                            <option value="All">All</option>
                        </select></div>
                </div>
            </form>
            <button type="button" class="btn btn-primary btn-sm float-left"  
                data-toggle="modal" onclick="awal();" >Search
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
                <th> Nama</th>
                <th> Deskripsi</th>
                <th> Dokumen</th>
                <th>Action</th>
        </table>
    </div>
    <div class="modal fade" id="formData" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="addDataLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Dokumen Link</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="/addDokumenLink" method="POST" autocomplete="off" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <input type="hidden" name="id" class="form-control" id="id">
                        </div>
                        <div class="form-group">
                            <label for="nama">Nama Dokumen</label>
                            <input type="text" name="nama" class="form-control" id="nama">
                        </div>
                        
                        <div class="form-group">
                            <label for="deskripsi">Deskripsi</label>
                            <input type="text" name="deskripsi" class="form-control" id="deskripsi">
                        </div>
                        <div class="form-group">
                            <label for="pencarian">Kata Pencarian</label>
                            <input type="text" name="pencarian" class="form-control" id="pencarian">
                        </div>
                        <div class="row">
                            <div class="form-group col-6">
                                <label for="jenis">Jenis</label>
                                <select name="jenis" class="form-control" id="jenis">
                                    <option value="">-Jeni Dokumen-</option>
                                    <option value="Usulan_Training">Usulan Training</option>
                                    <option value="Dokumen_Pengadaan">Dokumen Pengadaan</option>
                                    <option value="Proposal">Proposal</option>
                                    <option value="Invoice">Invoice</option>
                                    <option value="Lain_lain">Lain lain</option>
                                </select>
                            </div>
                            <div class="form-group col-6">
                                <label for="tgl">Tanggal</label>
                                <input type="date" name="tgl" class="form-control" id="tgl">
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-6">
                                <label for="status">Status</label>
                                <select name="status" class="form-control" id="status">
                                    <option value="Aktif">Aktif</option>
                                    <option value="Non Aktif">Non Aktif</option>
                                </select>
                            </div>
                            <div class="form-group col-6">
                                <label for="akses">Akses</label>
                                <select name="akses" class="form-control" id="akses">
                                    <option value={{$departemen_user->user_id}}>{{$departemen_user->name}}</option>
                                    @foreach ($departemen as $item)
                                        <option value={{$item->kode}}>{{$item->nama}}</option>
                                    @endforeach
                                    <option value="All">All</option>
                                </select>
                            </div>
                            
                        </div>
                        <div class="form-group">
                            <label for="linkdok">Dokumen Url</label>
                            <div class="row">
                                <div class="form-group col-10">
                                    <input type="text" name="linkdok" class="form-control" id="linkdok">
                                </div>
                                <div class="form-group col-2">
                                <button type="button" onclick="copyLink()" class="btn btn-secondary" data-dismiss="modal">Copy</button>
                                </div>
                            </div>
                         
                        </div>
                        <div class="row">

                            <div class="form-group col-6">
                                <label for="pemilik">Pemilik</label>
                                {{-- <input type="text" name="pemilik" class="form-control" id="pemilik" > --}}
                                <select name="pemilik" class="form-control" id="pemilik">
                                    {{-- <option value="All">Pemilik</option> --}}
                                    @foreach ($departemen as $item)
                                    <option value={{$item->kode}}>{{$item->nama}}</option>
                                    @endforeach
                                </select>
                            </div>
                            
                            <div class="form-group col-6">
                                <label for="create_by">create_by</label>
                                <input type="text" name="create_by" class="form-control" id="create_by">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="filename" id='lbl_filename'>Filename</label>
                            <input type="hidden" name="filename" class="form-control" id="filename">
                        </div>
                        <div class="form-group">
                            {{-- <label for="filename_real">filename_real</label> --}}
                            <input type="hidden" name="filename_real" class="form-control" id="filename_real">
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
        function copyLink() {
            alert('myLink');
             /* Get the text field */
            var copyText = document.getElementById("linkdok");

            /* Select the text field */
            copyText.select();
            copyText.setSelectionRange(0, 99999); /* For mobile devices */

            /* Copy the text inside the text field */
            document.execCommand("copy");

            /* Alert the copied text */
            alert("Copied the text: " + copyText.value);            
        }

        function awal(){
            $.ajax({
                type: 'GET',
                async: true,
                url: '/auth/check' ,
                success: function(data) {
                    if(data == 1){
                        ambilData();
                    }else{
                        alert("Session Timeout.......!");  
                        location.replace("/");    
                    }
                }
            });
        }

        function ambilData() {      
            s = $("#kriteria").val();
            if (s==null||s=='') {
                s="QQQQ";
            }
            url='/dokumenLinkByCriteria/'+s;
            // $('#myTable').dataTable().fnClearTable();
            $('#myTable').dataTable().fnDestroy();
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
                        data: 'nama',
                        name: 'nama'
                    },
                   
                    {
                        data: 'deskripsi',
                        name: 'deskripsi'
                    },
                    
                    {
                        data: 'file',
                        name: 'file'
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
            $('#nama').attr('readonly', true);
            $('#jenis').attr('readonly', true);
            $('#deskripsi').attr('readonly', true);
            $('#pencarian').attr('readonly', true);
            $('#status').attr('readonly', true);
            $('#tgl').attr('readonly', true);
            $('#linkdok').attr('readonly', true);
           
            $('#akses').attr('readonly', true);
            $('#filename').attr('readonly', true);
            $('#filename_real').attr('readonly', true);
            $('#id').val('');
            $('#nama').val('');
            $('#jenis').val('');
            $('#deskripsi').val('');
            $('#pencarian').val('');
            $('#status').val('');
            $('#tgl').val('');
            $('#linkdok').val('');
            $('#pemilik').val('{{$departemen_user->departemen}}');
            $('#akses').val('');
            $('#filename').val('');
            $('#filename_real').val('');
            $('#formData').modal('show');
            $('#btnsubmit').prop("disabled", false);
            readonly(false);
            $('#pemilik').attr('readonly', true);
        }
        async function viewFunction($id) {
            readonly(true);
            $.ajax({
                type: 'GET',
                async: false,
                url: '/getDokumenLinkById/' + $id,
                success: function(data) {
                    $('#id').val(data.id);
                    $('#nama').val(data.nama);
                    $('#jenis').val(data.jenis);
                    $('#deskripsi').val(data.deskripsi);
                    $('#pencarian').val(data.pencarian);
                    $('#status').val(data.status);
                    $('#tgl').val(data.tgl);
                    $('#linkdok').val(data.linkdok);
                    $('#pemilik').val(data.pemilik);
                    $('#akses').val(data.akses);
                    // $('#filename').val(data.filename);
                    $('#filename_real').val(data.filename_real);
                    // $('#btnsubmit').prop("disabled", true);
                    $("#lbl_filename").empty();
                    $('#create_by').val(data.create_by);
                    // $("#lbl_filename").append('  Filename :');

                    // $("#lbl_filename").append('  Filename :  <a href="{{ config('constant.docFile') }}' +
                    //      data.filename +'" target=\"_blank\"">' +
                    //      data.filename_real+ '</a>');

                     $("#lbl_filename").append('  Filename :  <a href="{{ config('constant.downloadDoc') }}' +
                         data.filename +'" target=\"_blank\"">' +
                         data.filename_real+ '</a>');


                }

            });
            $('#btnsubmit').prop("disabled", true);
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
            $('#nama').attr('readonly', params);
            $('#jenis').attr('readonly', params);
            $('#deskripsi').attr('readonly', params);
            $('#pencarian').attr('readonly', params);
            $('#status').attr('readonly', params);
            $('#tgl').attr('readonly', params);
            $('#linkdok').attr('readonly', params);
            $('#pemilik').attr('readonly', params);
            $('#akses').attr('readonly', params);
            $('#filename').attr('readonly', params);
            $('#filename_real').attr('readonly', params);
            $('#create_by').attr('readonly', true);
        }

    </script>

@stop
