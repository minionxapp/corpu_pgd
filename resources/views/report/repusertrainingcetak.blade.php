{{-- {{$nik}} --}}
{{-- @extends('adminlte::page') --}}
@extends('adminlte::master')
    <div>
        Nama :{{$karyawan->NAMA_KARYAWAN}}<br>
        Nik  :{{$karyawan->NIP}}<br>
        Unit  :{{$karyawan->NAMA_UNIT_KERJA}}<br>
        Jabatan :{{$karyawan->NAMA_JABATAN}} - {{$karyawan->NAMA_UNIT_ORGANISASI}}<br>
    </div>

    <div>  
        <table id="myTable" class="table">
            <thead>
                <tr>
                    <th>No</th>  
                    <th>Nama Training</th>
                    <th>Modul Name</th>
                    <th>Jenis</th>  
                    <th>Mulai</th>  
                    <th>Selesai</th> 
                </tr>
            </thead>  
            <tr>
                <td colspan=5><b>E-Learning</b></td>
            </tr>    
            <?php $a = 1; ?>
            @foreach ($usertraining as $item)
                @if ($item['jenis']=='E-Learning')                
                    <tr>
                        <td>{{$a++}}</td>
                        <td>{{ $item['nama_training'] }}</td>
                        <td>{{ $item['modul_name'] }}</td>
                        <td>{{ $item['jenis'] }}</td>
                        <td>{{ $item['mulai'] }}</td>
                        @if (date('d-m-Y', strtotime($item['completed_on'])) !='01-01-1970')
                            <td>{{ date('d-m-Y', strtotime($item['completed_on'])) }}
                        @else
                            <td>-</td>
                        @endif
                    </tr>
                @endif
            @endforeach


            <tr>
                <td colspan=5><b>Workshop</b></td>
            </tr>    
            <?php $a = 1; ?>
            @foreach ($usertraining as $item)
                @if ($item['jenis']=='Workshop')                
                    <tr>
                        <td>{{$a++}}</td>
                        <td>{{ $item['nama_training'] }}</td>
                        <td>{{ $item['modul_name'] }}</td>
                        <td>{{ $item['jenis'] }}</td>
                        <td>{{ $item['mulai'] }}</td>
                        @if (date('d-m-Y', strtotime($item['completed_on'])) !='01-01-1970')
                            <td>{{ date('d-m-Y', strtotime($item['completed_on'])) }}
                        @else
                            <td>-</td>
                        @endif
                    </tr>
                @endif
            @endforeach

            <tr>
                <td colspan=5><b>Webinar</b></td>
            </tr>    
            <?php $a = 1; ?>
            @foreach ($usertraining as $item)
                @if ($item['jenis']=='Webinar')                
                    <tr>
                        <td>{{$a++}}</td>
                        <td>{{ $item['nama_training'] }}</td>
                        <td>{{ $item['modul_name'] }}</td>
                        <td>{{ $item['jenis'] }}</td>
                        <td>{{ $item['mulai'] }}</td>
                        @if (date('d-m-Y', strtotime($item['completed_on'])) !='01-01-1970')
                            <td>{{ date('d-m-Y', strtotime($item['completed_on'])) }}
                        @else
                            <td>-</td>
                        @endif}
                    </tr>
                @endif
            @endforeach

            <tr>
                <td colspan=5><b>VirtualClass</b></td>
            </tr>    
            <?php $a = 1; ?>
            @foreach ($usertraining as $item)
                @if ($item['jenis']=='VirtualClass')                
                    <tr>
                        <td>{{$a++}}</td>
                        <td>{{ $item['nama_training'] }}</td>
                        <td>{{ $item['modul_name'] }}</td>
                        <td>{{ $item['jenis'] }}</td>
                        <td>{{ $item['mulai'] }}</td>
                        @if (date('d-m-Y', strtotime($item['completed_on'])) !='01-01-1970')
                            <td>{{ date('d-m-Y', strtotime($item['completed_on'])) }}
                        @else
                            <td>-</td>
                        @endif
                    </tr>
                @endif
            @endforeach

            
            <tr>
                <td colspan=5><b>Library</b></td>
            </tr>    
            <?php $a = 1; ?>
            @foreach ($usertraining as $item)
                @if ($item['jenis']=='Library')                
                    <tr>
                        <td>{{$a++}}</td>
                        <td>{{ $item['nama_training'] }}</td>
                        <td>{{ $item['modul_name'] }}</td>
                        <td>{{ $item['jenis'] }}</td>
                        <td>{{ $item['mulai'] }}</td>
                        @if (date('d-m-Y', strtotime($item['completed_on'])) !='01-01-1970')
                            <td>{{ date('d-m-Y', strtotime($item['completed_on'])) }}
                        @else
                            <td>-</td>
                        @endif
                    </tr>
                @endif
            @endforeach

            <tr>
                <td colspan=5><b>Lain - Lain</b></td>
            </tr>    
            <?php $a = 1; ?>
            @foreach ($usertraining as $item)
                @if ($item['jenis']!='Library'
                &&$item['jenis']!='E-Learning'
                &&$item['jenis']!='Workshop'
                &&$item['jenis']!='Webinar'
                &&$item['jenis']!='VirtualClass'
                )                
                    <tr>
                        <td>{{$a++}}</td>
                        <td>{{ $item['nama_training'] }}</td>
                        <td>{{ $item['modul_name'] }}</td>
                        <td>{{ $item['jenis'] }}</td>
                        <td>{{ $item['mulai'] }}</td>
                        
                        @if (date('d-m-Y', strtotime($item['completed_on'])) !='01-01-1970')
                            <td>{{ date('d-m-Y', strtotime($item['completed_on'])) }}
                        @else
                            <td>-</td>
                        @endif
                    </tr>
                @endif
            @endforeach






        </table>
    </div>

    
    
{{-- <div>Workshop ||Webinar VirtualClass Library E-Learning</div>
<div>  
    <table id="myTable" class="table">
        <thead>
            <tr>
                <th>No</th>  
                <th>Nama Training</th>
                <th>Jenis</th>  
                <th>Mulai</th>  
                <th>Selesai</th> 
            </tr>
        </thead>      
        <?php $a = 1; ?>
        @foreach ($usertraining as $item)
            @if ($item['jenis']!='Workshop')                
                <tr>
                    <td>{{$a++}}</td>
                    <td>{{ $item['nama_training'] }}</td>
                    <td>{{ $item['jenis'] }}</td>
                    <td>{{ $item['mulai'] }}</td>
                    <td>{{ $item['selesai'] }}</td>
                </tr>
            @endif
        @endforeach
    </table>
</div> --}}

{{-- {{$usertraining}} --}}

