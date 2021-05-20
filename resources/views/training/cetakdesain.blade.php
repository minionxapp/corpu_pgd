{{-- {{ $desain }} --}}
@extends('adminlte::master')
@section('css_cus')
    <style>
        table td *,table tr td {
        vertical-align: top;
    }
    table thead tr td {
        vertical-align: center;
    }
    </style>
    
@endsection
<div class="wrapper">

    <p class="text-center"><strong>DESAIN PELATIHAN</strong></p>
    <table width="660" >
        <tbody>
            <tr>
                <td colspan="18" width="642">
                    <p><strong><u>URAIAN PELATIHAN :</u></strong></p>
                </td>
                <td width="18">
                    <p>&nbsp;</p>
                </td>
            </tr>
            <tr>
                <td width="103">
                    <p>Nama</p>
                </td>
                <td width="30">
                    <p>:</p>
                </td>
                <td colspan="16" width="509">
                    <p><strong>{{ $desain->nama }}</strong></p>
                </td>
                <td width="18">
                    <p>&nbsp;</p>
                </td>
            </tr>
            <tr>
                <td width="103">
                    <p>Kode (6 digit)</p>
                </td>
                <td width="30">
                    <p>:</p>
                </td>
                <td width="19">
                    <p>{{ $desain->kode }}</p>
                </td>
                <td colspan="2" width="19">
                    <p>&nbsp;</p>
                </td>
                <td width="19">
                    <p>&nbsp;</p>
                </td>
                <td width="19">
                    <p>&nbsp;</p>
                </td>
                <td width="19">
                    <p>&nbsp;</p>
                </td>
                <td colspan="2" width="19">
                    <p>&nbsp;</p>
                </td>
                <td width="19">
                    <p>&nbsp;</p>
                </td>
                <td colspan="2" width="16">
                    <p>&nbsp;</p>
                </td>
                <td colspan="6" width="376">
                    <p>&nbsp;</p>
                </td>
            </tr>
            <tr>
                <td width="103">
                    <p>Metode&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>
                </td>
                <td width="30">
                    <p>:</p>
                </td>
                <td width="30">
                    <p>{{ $desain->metode }}</p>
                </td>

            </tr>
            <tr>
                <td width="103">
                    <p>Kelompok</p>
                </td>
                <td width="30">
                    <p>:</p>
                </td>
                <td colspan="16" width="509">
                    <p><strong>{{ $desain->kelompok }}</strong></p>
                </td>
                <td width="18">
                    <p>&nbsp;</p>
                </td>
            </tr>
        </tbody>
    </table>

    <p>&nbsp;</p>
    <table style="width:100% ; border: 2px solid black; border-collapse:collapse" border='1' >
        <thead>
            <tr>
                <td width="2%" style="text-align: center;background-color:#6a89a3be">
                    <p><strong>No</strong></p>
                </td>
                <td width="20%" style="text-align: center;background-color:#6a89a3be">
                    <p><strong>Item</strong></p>
                </td>
                <td width="60%" style="text-align: center;background-color:#6a89a3be">
                    <p><strong>Sub Item</strong></p>
                </td>
                <td style="text-align: center;background-color:#6a89a3be">
                    <p><strong>Keterangan</strong></p>
                </td>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>1</td>
                <td>Latar Belakang dan Tujuan</td>
                <td>{!! $desain->latar_tujuan !!}
                </td>
                <td></td>
            </tr>
            <tr>
                <td>2</td>
                <td>Deskripsi Pelatihan</td>
                <td>{!!$desain->deskripsi !!}</td>
                <td></td>
            </tr>
            <tr>
                <td>3</td>
                <td>Kriteria Peserta</td>
                <td>{!!$desain->kriteria_peserta !!}</td>
                <td></td>
            </tr>
            <tr>
                <td>4</td>
                <td>Fasilitator</td>
                <td>{!!$desain->fasilitator !!}</td>
                <td></td>
            </tr>
            <tr>
                <td>5</td>
                <td>Jumlah Hari / Jamlat</td>
                <td>{!!$desain->jml_hari !!} hari /{!!$desain->jml_jamlat !!} jam</td>
                <td></td>
            </tr>
            <tr>
                <td>6</td>
                <td>Tempat</td>
                <td>{!!$desain->tempat !!}</td>
                <td></td>
            </tr>
            <tr>
                <td>7</td>
                <td>Tanggal Pelaksanaan</td>
                <td>{!!$desain->tgl_mulai !!} s/d {!!$desain->tgl_selesai !!}</td>
                <td></td>
            </tr>
            <tr>
                <td>8</td>
                <td>Metode Pembelajaran</td>
                <td>{!!$desain->metode !!}</td>
                <td></td>
            </tr>
            <tr>
                <td>9</td>
                <td>Jumlah peserta</td>
                <td>{!!$desain->jml_peserta !!}</td>
                <td></td>
            </tr>
            <tr>
                <td>10</td>
                <td>Penilaian</td>
                <td>{!!$desain->penilaian !!}</td>
                <td></td>
            </tr>
            <tr>
                <td>11</td>
                <td>Nilai Investasi</td>
                <td>{!!$desain->investasi !!}</td>
                <td></td>
            </tr>
            <tr>
                <td>12</td>
                <td>Aktifitas Pre-class</td>
                <td>{!!$desain->pre_class !!}</td>
                <td></td>
            </tr>
            <tr>
                <td>13</td>
                <td>Aktiftas Post-class</td>
                <td>{!!$desain->post_class !!}</td>
                <td></td>
            </tr>
        </tbody>
    </table>
    <br>
    <p style="text-align: right">Jakarta, 07 Oktober 2020</p>
    <table style="width:100% ; border: 2px solid black; border-collapse:collapse" border='1' >
    <tr>
        <td colspan="2"><br>
            Catatan:
            <br><br><br><br><br><br>

        </td>
        
    </tr>
    <tr>
        <td style="text-align: center">Menyetujui,<br>
            Kepala Divisi Corporate University  
            <br><br><br><br>     <br><br><br><br>    
        </td>
        <td style="text-align: center">
            Diajukan Oleh,<br>
            Dean Akademi Supporting
            <br><br><br><br><br><br><br><br>   
        </td>
    </tr>
    </table>
    <br><br><br><br>
</div>
