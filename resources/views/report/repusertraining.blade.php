@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
<section class="content-header">
    <div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
        <h1>User Training</h1>
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
            {{session('sukses')}}
        </div>
        @endif
    </div>

    <div class="row text-nowrap">
        <div class="col-12" style="padding-top: 5px;">
            <form action="/search" method="POST">
                {{ csrf_field() }}
                <div class="row">
                    <div class="form-group col-lg-6">
                        <label for="program">Nik</label>
                        <input type="text" name="nik" class="form-control" id="nik" required>
                    </div>
                </div>
            </form>
            <button type="button" class="btn btn-primary btn-sm float-left"  
                data-toggle="modal" onclick="searchFunction();" >Search
            </button>
        </div>
    </div>

    <div>  
        <table id="myTable" class="display nowrap" style="width:100%">
            <thead>
                <tr>
                    <th>Program</th>  
                    <th>Skill</th>  
                    <th>Modul</th>  
                    <th>Modul Status</th>    
                    <th>Departement</th>   
                    <th>Action</th>
                </tr>
            </thead>
        </table>
    </div>


    
    <!-- Modal -->
    {{-- <div class="modal fade" id="formData" data-backdrop="static" tabindex="-1" role="dialog"
        aria-labelledby="addDataLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Data User</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <div class="modal-body">
                    <form action="/addModel" method="POST">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <input type="hidden" name="id" class="form-control" id="id">
                        </div>
                        <div class="form-group">
                            <label for="nama">nama</label>
                            <input type="text" name="nama" class="form-control" id="nama" required>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" id="btnsubmit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div> --}}





@stop

@section('css')
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
    <link rel="stylesheet" href="/css/app.css">
@stop

@section('js')
    <script> 
        $(document).ready(function() {
            //awal();
            // dropDown('program', 'skill', '/skill/', 'skill_name', 'skill_name');
            // dropDownModul('skill', 'modul', '/modul/', 'modul_name', 'modul_name');
 
        });


  



        function searchFunction() {
            // alert($("#program option:selected" ).text());
            // alert($("#program").val()+"|"+$("#skill").val()+"|"+$("#modul").val());
            $('#myTable').dataTable().fnClearTable();
            $('#myTable').dataTable().fnDestroy();
            $('#myTable').DataTable({
                rowReorder: {
                    selector: 'td:nth-child(2)'
                },
                responsive: true,
                processing: true,
                serverSide: true,
                ajax: '/getTrainingByUser/'+$("#nik").val(),
                columns: [
                    // { data: 'User_Id', name: 'User_Id' },  
                    // { data: 'User_Name', name: 'User_Name' },    
                    { data: 'Program_Name', name: 'Program_Name' },      
                    { data: 'Skill_Name', name: 'Skill_Name' },  
                    { data: 'Module_Name', name: 'Module_Name' }, 
                                 
                    { data: 'Module_Status', name: 'Module_Status' },   
                    { data: 'Sub_Department', name: 'Sub_Department' },                        
                    {data: 'action', name: 'action', orderable: false, searchable: false}
                ]
            });


        }

        function awal() {
            $('#myTable').DataTable({
                rowReorder: {
                    selector: 'td:nth-child(2)'
                },
                responsive: true,
                processing: true,
                serverSide: true,
                ajax: '/allModel',
                columns: [
                    // { data: '', name: '' },           
                    // {data: 'action', name: 'action', orderable: false, searchable: false}
                ]
            });
        }

        function addFunction() {
            $('#id').attr('readonly', true);          
            $('#kode').attr('readonly', false);

            $('#kode').val('');
            $('#nama').val('');
            $('#formData').modal('show'); 
            readonly(false)      ; 
        }

        async function viewFunction($id) {
            readonly(true)      ;  
            $.ajax({
               type:'GET',
               async: false,
               url:'/Model/'+$id, //    data:'_token = <?php echo csrf_token() ?>',
               success:function(data) {
                $("#id").val(data.id);                

                $('#id').attr('readonly', true);          
                $('#').attr('readonly', true);                
                $('#btnsubmit').prop("disabled",true);   
                $('#btnsubmit').prop("disabled",true); 
               }
            });    
            $('#formData').modal('show');   
        }

        async function editFunction($id) {    
            await viewFunction($id);
            $('#id').attr('readonly', true);        
            $('#btnsubmit').prop("disabled",false); 
            readonly(false)      ; 
            readonly(false)      ; 
        }


    function readonly(params) {
        $('#id').attr('readonly', params); 
        $('#userid').attr('readonly', params);  
        $('#name').attr('readonly', params); 
        
    }


    </script>
@stop