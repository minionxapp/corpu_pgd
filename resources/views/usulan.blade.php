@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Daftar Usulan Training</h1>
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
        <div class="col-8" style="padding-top: 5px;">
            <form action="/search" method="POST">
                {{ csrf_field() }}
                <div class="row">
                    <div class="form-group col-lg-6">
                                <select name="kriteria" class="form-control" id="kriteria"
                                 readonly tabindex="-1">
                                    <option value="">Status</option>
                                    <option value='Usul'>Usulan</option>
                                    <option value='OnProgress'>OnProgress</option>
                                    <option value='Selesai'>Selesai</option>
                                    <option value='Tolak'>Tolak</option>
                                </select>
                    </div>
                    <div class="form-group col-lg-6">
                        <button type="button" class="btn btn-primary btn-sm float-left"  
                            data-toggle="modal" onclick="awal();" >Search
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div> --}}


    <div class="row text-nowrap">
        <div class="col-12" style="padding-top: 5px;">
            <button type="button" class="btn btn-primary btn-sm float-left" data-toggle="modal" onclick="addFunction();">Add
            </button>
        </div>
    </div>


    <div>
        <table id="myTable" class="display nowrap" style="width:100%">
            <thead>
                <tr>
                    <th>Deskripsi</th>
                    <th>Unit Kerja</th>
                    <th>Mulai</th>
                    <th>Selesai</th>
                    <th>Status</th>
                    <th>No Surat</th>
                    <th>Action</th>
                </tr>
            </thead>
        </table>
    </div>



    <!-- Modal -->
    <div class="modal fade" id="formData" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="addDataLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Usulan Training</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="/addUsulan" method="POST" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <input type="hidden" name="id" class="form-control" id="id">
                        </div>

                        <div class="form-group">
                            <label for="no_srt">No Surat/Pengajuan</label>
                            <input type="text" name="no_srt" class="form-control" id="no_srt" autocomplete="off">
                        </div>
                        <div class="form-group">
                            <label for="deskripsi">Deskripsi</label>
                            {{-- <textarea type="text" name="deskripsi" class="form-control" id="deskripsi" autocomplete="off">
                            </textarea> --}}
                            <input type="text" name="deskripsi" class="form-control" id="deskripsi" autocomplete="off">
                            

                        </div>
                        <div class="form-group">
                            <label for="unit_usul">Unit Kerja</label>
                            {{-- <input type="text" name="unit_usul" class="typeahead form-control" id="unit_usul"> --}}
                            <select name="unit_usul" class="form-control" id="unit_usul">
                                @foreach ($divisi as $item)
                                <option value="{{$item->kode}}">{{$item->nama}}</option>
                                @endforeach
                            </select>
                            

                        </div>
                        <div class="row">
                            <div class="form-group col-6">
                                <label for="jenis_usul">Jenis Usulan</label>
                                <select name="jenis_usul" class="form-control" id="jenis_usul">
                                    <option value="">Jenis Usulan</option>
                                    <option value='Training'>Training</option>
                                    <option value='E-Learning'>E-Learning</option>
                                    <option value='Data'>Data</option>
                                    <option value='Lain'>Lain-lain</option>
                                </select>
                            </div>
                            <div class="form-group col-6">
                                <label for="status">Status</label>
                                <select name="status" class="form-control" id="status"
                                 readonly tabindex="-1">
                                    <option value="">Status</option>
                                    <option value='Usul'>Usulan</option>
                                    <option value='OnProgress'>OnProgress</option>
                                    <option value='Selesai'>Selesai</option>
                                    <option value='Tolak'>Tolak</option>
                                </select>
                            </div>
                        </div>
                        {{-- 
                            <div class="form-group">
                                <label for="file_usul" id='lbl_file_usul'>File Usulan :</label>
                                <input type="file" name="file_usul" class="form-control" id="file_usul">
                            </div>
                            
                        --}}
                        <div class="form-group">
                            <label for="file_usul_link" id='lbl_file_usul_link'>File Link</label>
                            <input type="text" name="file_usul_link" class="form-control" 
                                    id="file_usul_link"  autocomplete="off">
                        </div>
                        <div class="form-group">
                            <label for="comment">Catatan</label>
                            <input type="text" name="comment" class="form-control" id="comment" autocomplete="off">
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
                            <div class="form-group col-8">
                                <label for="pic_usul">PIC Pengusul</label>
                                <input type="text" name="pic_usul" class="form-control" id="pic_usul" autocomplete="off">
                            </div>
                            <div class="form-group col-4">
                                <label for="no_pic_usul">PIC Contact</label>
                                <input type="text" name="no_pic_usul" class="form-control" id="no_pic_usul" autocomplete="off">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="asign_to">Assign Akademi</label>
                            <select name="asign_to" class="form-control" id="asign_to">
                                @foreach ($departemen as $item)
                                <option value="{{$item->kode}}">{{$item->nama}}</option>
                                @endforeach
                            </select>
                        </div>


                        <div class="row">                            
                            <div class="form-group col-4">
                                <label for="Project_id">Create Project</label>
                                {{-- <input type="text" name="project_id" class="form-control" id="project_id" autocomplete="off"> --}}
                                <select name="project_yn" class="form-control" id="project_yn">
                                    <option value="">-Project-</option>
                                    <option value="Y">Yes</option>
                                    <option value="N">No</option>
                                </select>
                            </div>
                            <div class="form-group col-8">
                                 <label for="Project_id">Project Id</label>
                                <input type="text" name="project_id" class="form-control" id="project_id" autocomplete="off" readonly>
                            </div>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" id="btnsubmit" class="btn btn-primary">Submit</button>
                            {{-- <button type="button" id="btnproject" class="btn btn-primary"  onclick="createProject();">Creata Project</button> --}}
                   
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>



    <script type="text/javascript">
        
</script>
@stop

@section('css')
    {{--
    <link rel="stylesheet" href="/css/admin_custom.css"> --}}
    <link rel="stylesheet" href="/css/app.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css"/>
@stop
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    
    @section('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.1/bootstrap3-typeahead.min.js"></script>
    <script>
        $(document).ready(function() {
            awal();

            var path = "{{ route('autocomplete') }}";
                $('input.typeahead').typeahead({
                    source:  function (query, process) {
                    return $.get(path, { query: query }, function (data) {
                            return process(data);
                        });
                    }
                });


        });

        function awal() {
            $('#myTable').dataTable().fnDestroy();
            $('#myTable').DataTable({
                rowReorder: {
                    selector: 'td:nth-child(2)'
                },
                responsive: true,
                processing: true,
                serverSide: true,
                ajax: '/allUsulan',
                columns: [
                    
                    {
                        data: 'deskripsi',
                        name: 'deskripsi'
                    },
                    {
                        data: 'divisi',
                        name: 'divisi'
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
                        data: 'status',
                        name: 'status'
                    },
                    {
                        data: 'no_srt',
                        name: 'no_srt'
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
            $('#id').val('');
            $('#kode').val('');
            $('#nama').val('');
            $('#no_srt').val('');
            $('#deskripsi').val('');
            $('#unit_usul').val('');
            $('#status').val('Usul');
            $('#file_usul').val('');
            $('#file_usul_link').val('');
            $('#file_dispo').val('');
            $('#file_dispo_link').val('');
            $('#comment').val('');
            $('#deadline').val('');
            $('#jenis_usul').val('');
            $('#pic_usul').val('');
            $('#no_pic_usul').val('');
            $('#asign_to').val('');
            $('#pic_asign_to').val('');
            $('#asign_desc').val('');
            $('#create_by').val('');
            $('#update_by').val('');
            $('#mulai').val('');
            $('#selesai').val('');
            $('#project_yn').val('');
            $('#project_id').val('');
            
            

            readonly(false);
            $('#formData').modal('show');
            $("#lbl_file_dispo").empty();
            $("#lbl_file_dispo").append('  File Disposisi :');
            $("#lbl_file_usul").empty();
            $("#lbl_file_usul").append('  File Usulan :');
            $('#btnsubmit').prop("disabled", false);
            $('#status').attr('readonly', true);
            $('#status').prop('disabled',true);
            $('#btnproject').prop("disabled", true);
            
        }

        async function viewFunction($id) {
            readonly(true);
            $.ajax({
                type: 'GET',
                async: false,
                url: '/getUsulanById/' +
                    $id, //    data:'_token = <?php echo csrf_token(); ?>',
                success: function(data) {
                    $('#btnproject').prop("disabled", true);
                    $("#id").val(data.id);
                    $('#no_srt').val(data.no_srt);
                    $('#deskripsi').val(data.deskripsi);
                    $('#unit_usul').val(data.unit_usul);
                    $('#status').val(data.status).change();
                    $('#file_usul_link').val(data.file_usul_link);
                    $('#file_dispo_link').val(data.file_dispo_link);
                    $('#comment').val(data.comment);
                    $('#deadline').val(data.deadline);
                    $('#jenis_usul').val(data.jenis_usul);
                    $('#pic_usul').val(data.pic_usul);
                    $('#no_pic_usul').val(data.no_pic_usul);
                    $('#asign_to').val(data.asign_to);
                    $('#pic_asign_to').val(data.pic_asign_to);
                    $('#asign_desc').val(data.asign_desc);
                    $('#create_by').val(data.create_by);
                    $('#update_by').val(data.update_by);
                    $('#mulai').val(data.mulai);
                    $('#selesai').val(data.selesai);

                    $('#project_id').val(data.project_id);
                    $('#project_yn').val(data.project_yn);
                    
                    if (data.file_usul != null) {
                        $("#lbl_file_usul").empty();
                        $("#lbl_file_usul").append('  File Usulan :  <a href="{{ config('constant.imageShow') }}' +
                         data.file_usul +'" target=\"_blank\"">' +
                         data.file_usul.substring(11) + '</a>');
                    }
                    if (data.file_dispo != null) {
                        $("#lbl_file_dispo").empty();
                        $("#lbl_file_dispo").append('  File Disposisi :  <a href="{{ config('constant.imageShow') }}' +
                         data.file_dispo + '" target=\"_blank\"">' + 
                         data.file_dispo.substring(11) + '</a>');
                    }

                    if ( data.file_usul_link != null) {
                        $("#lbl_file_usul_link").empty();
                        $("#lbl_file_usul_link").append('  File Link :  <a href="' +
                            data.file_usul_link + '" target=\"_blank\"">' + 
                            'link'+ '</a>');
                    }
                    $('#id').attr('readonly', true);
                    $('#btnsubmit').prop("disabled", true);
                    $('#btnsubmit').prop("disabled", true);
                }
            });
            $('#formData').modal('show');
        }

        async function editFunction($id) {
            await viewFunction($id);
            readonly(false);
            $('#btnsubmit').prop("disabled", false);
            $('#btnproject').prop("disabled", false);
 
            if ($('#project_id').val() =="" || $('#project_id').val() === null) {
                $('#project_yn').attr('readonly', false); 
            }else{
                $('#project_yn').attr('readonly', true);                
            }
        }

        async function prosesFunction($id){
            await viewFunction($id);
            readonly(true);
            $('#status').attr('readonly', false);
            $('#status').prop('disabled',false);
            $('#btnsubmit').prop("disabled", false);
        }
        // 'no_srt','deskripsi','unit_usul','status','file_usul','file_usul_link','file_dispo','file_dispo_link','comment','deadline','jenis_usul','pic_usul','no_pic_usul','asign_to','pic_asign_to','asign_desc','create_by','update_by',   
        function readonly(params) {
            $('#id').attr('readonly', true);
            $('#no_srt').attr('readonly', params);
            $('#deskripsi').attr('readonly', params);
            $('#unit_usul').attr('readonly', params);
            $('#status').attr('readonly', params);
            $('#file_usul').attr('readonly', params);
            $('#file_usul_link').attr('readonly', params);
            $('#file_dispo').attr('readonly', params);
            $('#file_dispo_link').attr('readonly', params);
            $('#comment').attr('readonly', params);
            $('#deadline').attr('readonly', params);
            $('#jenis_usul').attr('readonly', params);
            $('#pic_usul').attr('readonly', params);
            $('#no_pic_usul').attr('readonly', params);
            $('#asign_to').attr('readonly', params);
            $('#pic_asign_to').attr('readonly', params);
            $('#asign_desc').attr('readonly', params);
            $('#create_by').attr('readonly', params);
            $('#update_by').attr('readonly', params);

            $('#mulai').attr('readonly', params);
            $('#selesai').attr('readonly', params);

            $('#userid').attr('readonly', params);
            $('#name').attr('readonly', params);
            $('#project_yn').attr('readonly', params);

            

        }
        
        // function createProject(){
        //     alert("function");
        // }
    </script>
@stop
