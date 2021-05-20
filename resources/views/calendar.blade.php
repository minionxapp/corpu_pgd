@extends('adminlte::page')
@section('title', 'Dashboard')

@section('content_header')

    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Kalendar</h1>
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

    <div id='calendar-container'>
        <div id='calendar'></div>
    </div>




@stop

@section('css')
    <link rel="stylesheet" href="/css/app.css">

    <style>
        /* body {
            margin: 40px 10px;
            padding: 0;
            font-family: Arial, Helvetica Neue, Helvetica, sans-serif;
            font-size: 14px;
        } */

        #calendar {
            max-width: 1100px;
            margin: 0 auto;
        }

    </style>



@stop
@section('js')
    <script src="{{ asset('vendor/kalendar/main.js') }}"></script>

    <script>
 $(document).ready(function() { 
        kalendar2();
      }
    );


        document.addEventListener('DOMContentLoaded', function() {
            var calendarEl = document.getElementById('calendar');

            var calendar = new FullCalendar.Calendar(calendarEl, {
                initialDate: '2020-09-12',
                editable: true,
                selectable: true,
                businessHours: true,
                dayMaxEvents: true, // allow "more" link when too many events
                events: [{
                        title: 'All Day Event',
                        start: '2020-09-01'
                    },
                    
                ]
            });

            calendar.render();
        });





    function kalendar2() {
    var epent=[];
    var warna =['purple','green','blue','orange','brown']
    var events = {!! $epentlist !!};
    var i = 0;
            @foreach ($epentlist as $item)
                i = i + 1;
                c = i % warna.length;
                kon = false;
                if({{$item->mulai}} == {{$item->selesai}}){
                  kon = true;
                }
                {
                  epent.push({title: "{{$item->judul}} - {{$item->departement->nama}}",
                  start: "{{$item->mulai}}T00:01:00", end:"{{$item->selesai}}T23:59:00", 
                  description:"{{$item->deskripsi}}",color:warna[c],allDay:kon});
                }
            @endforeach  
  
      var calendarEl = document.getElementById('calendar');
          var calendar = new FullCalendar.Calendar(calendarEl, {
            initialView: 'dayGridMonth',
            timeZone: 'UTC',
            events: epent,
            displayEventTime:false,
          });
          calendar.render();
  }



    </script>

@stop
