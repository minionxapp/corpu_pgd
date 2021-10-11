@extends('adminlte::master')
<div>
  <h1 style="center">Daftar Pekerjaan</h1>
    {{-- {{$repusul}} --}}
</div>


<div>  
    <table id="myTable" class="table">
        <thead>
            <tr>
                <th>No</th>  
                {{-- <th>id</th>   --}}
                <th>Deskripsi</th>
                <th>No Surat</th>
                <th>Tgl Surat</th> 
                <th>Unit Kerja</th>  
                {{-- <th>Status</th>   --}}
            </tr>
        </thead>  
        <tr>
            <td colspan=5><b>Usulan</b></td>
        </tr>    
        <?php $a = 1; ?>
        @foreach ($repusul as $item)
            @if ($item['status']=='Usul')                
                <tr>
                    <td>{{$a++}}</td>
                    {{-- <td>{{ $item['id'] }}</td> --}}
                    <td style="white-space: normal;">{{ $item['deskripsi'] }}</td>
                    <td>{{ $item['no_srt'] }}</td>
                    <td>{{ $item['tgl_surat'] }}</td>
                    {{-- <td>{{ $item['unit_usul'] }}</td> --}}
                    <td>{{ $item['nama'] }}</td>
                    {{-- <td>{{ $item['status'] }}</td> --}}
                    <td></td>
                    {{-- 
                        <td>{{ $item['unit_usul'] }}</td>
                    <td>{{ $item['unit_usul'] }}</td> --}}
                    {{-- @if (date('d-m-Y', strtotime($item['completed_on'])) !='01-01-1970')
                        <td>{{ date('d-m-Y', strtotime($item['completed_on'])) }}
                    @else
                        <td>-</td>
                    @endif --}}
                </tr>
            @endif
        @endforeach

        <tr>
            <td colspan=5><b>On Progress</b></td>
        </tr> 
        <?php $a = 1; ?>
        @foreach ($repusul as $item)
            @if ($item['status']=='OnProgress')                
                <tr>
                    <td>{{$a++}}</td>
                    {{-- <td>{{ $item['id'] }}</td> --}}
                    <td style="white-space: normal;">{{ $item['deskripsi'] }}</td>
                    <td>{{ $item['no_srt'] }}</td>
                    <td style="white-space: nowrap;">{{ $item['tgl_surat'] }}</td>
                    {{-- <td>{{ $item['unit_usul'] }}</td> --}}
                    <td>{{ $item['nama'] }}</td>
                    {{-- <td>{{ $item['status'] }}</td> --}}
                    <td></td>
                    {{-- 
                        <td>{{ $item['unit_usul'] }}</td>
                    <td>{{ $item['unit_usul'] }}</td> --}}
                    {{-- @if (date('d-m-Y', strtotime($item['completed_on'])) !='01-01-1970')
                        <td>{{ date('d-m-Y', strtotime($item['completed_on'])) }}
                    @else
                        <td>-</td>
                    @endif --}}
                </tr>
            @endif
        @endforeach
      

          
       

          
       


    </table>
</div>
