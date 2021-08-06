@extends('adminlte::page')

@section('title', config('adminlte.title'))

@section('content_header')



    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Corpu Digital</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Corpu Digital</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>

@stop

@section('content')

    {{-- <div id='calendar'></div> --}}



    <section class="content">
        {{-- <h1 class="m-0 text-dark">Aplikasi</h1> --}}
        <div class="row">
            <div class="col-12 col-sm-6 col-md-2">
                <div class="card">
                    <a href="https://eoffice.pegadaian.co.id/" target="_blank">
                        <img src="/images/officr.jpg" class="card-img-top" alt="...">
                    </a>
                    <div class="card-body">
                        <h5 class="card-title">E-Office</h5>
                        <p class="card-text">.</p>
                        <a href="https://eoffice.pegadaian.co.id/" class="btn btn-primary">E-Office</a>
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-6 col-md-2">
                <a href="https://kms.pegadaian.co.id/login" target="_blank">
                    <div class="card">
                        <img src="/images/kms.jpg" class="card-img-top" alt="...">
                </a>
                <div class="card-body">
                    <h5 class="card-title">K M S</h5>
                    <p class="card-text">kms.</p>
                    <a href="https://kms.pegadaian.co.id/login" class="btn btn-primary">K M S</a>
                </div>
            </div>
        </div>
       
        <div class="col-12 col-sm-6 col-md-2">
            <div class="card">
                <a href="https://g-leads.disprz.com/" target="_blank">
                    <img src="/images/learning-01.png" class="card-img-top" alt="...">
                </a>
                <div class="card-body">
                    <h5 class="card-title">G-Leads</h5>
                    <p class="card-text">.</p>
                    <a href="https://g-leads.disprz.com/" class="btn btn-primary">G-Leads</a>
                </div>
            </div>
        </div>
        <div class="col-12 col-sm-6 col-md-2">
            <div class="card">
                <a href="https://learningwallet.pegadaian.co.id/" target="_blank">
                    <img src="/images/wallet2.jpg" class="card-img-top" alt="...">
                </a>
                <div class="card-body">
                    <h5 class="card-title">Learning Wallet</h5>
                    <p class="card-text">.</p>
                    <a href="https://sites.google.com/pegadaian.co.id/learningwallet" class="btn btn-primary">Learning
                        Wallet</a>
                </div>
            </div>
        </div>

        <div class="col-12 col-sm-6 col-md-2">
            <div class="card">
                <a href="https://www.pegadaian.co.id/" target="_blank">
                    <img src="/images/pegadaian.jpg" class="card-img-top" alt="...">
                </a>
                <div class="card-body">
                    <h5 class="card-title">Pegadaian</h5>
                    <p class="card-text">.</p>
                    <a href="https://www.pegadaian.co.id/" class="btn btn-primary">Pegadaian</a>
                </div>
            </div>
        </div>

        <div class="col-12 col-sm-6 col-md-2">
            <div class="card">
                <a href="https://kms.pegadaian.co.id/elearning/index.php?c=library/" target="_blank">
                    <img src="/images/library.jpg" class="card-img-top" alt="...">
                </a>
                <div class="card-body">
                    <h5 class="card-title">KMS Library</h5>
                    <p class="card-text">.</p>
                    <a href="https://kms.pegadaian.co.id/elearning/index.php?c=library/" class="btn btn-primary"
                        target="_blank">KMS Library</a>
                </div>
            </div>
        </div>

        <div class="col-12 col-sm-6 col-md-2">
            <div class="card">
                <a href="https://hcms.pegadaian.co.id/" target="_blank">
                    <img src="/images/hcm.jpg" class="card-img-top" alt="...">
                </a>
                <div class="card-body">
                    <h5 class="card-title">HCMS</h5>
                    <p class="card-text">.</p>
                    <a href="https://hcms.pegadaian.co.id/" class="btn btn-primary" target="_blank">HCMS</a>
                </div>
            </div>
        </div>

        <div class="col-12 col-sm-6 col-md-2">
            <div class="card">
                <a href="https://hc-leave.pegadaian.co.id/login/" target="_blank">
                    <img src="/images/cuti2.jpg" class="card-img-top" alt="...">
                </a>
                <div class="card-body">
                    <h5 class="card-title">CUTI</h5>
                    <p class="card-text">.</p>
                    <a href="https://hc-leave.pegadaian.co.id/login/" class="btn btn-primary" target="_blank">Cuti</a>
                </div>
            </div>
        </div>



        <div class="col-12 col-sm-6 col-md-2">
            <div class="card">
                <a href="https://newlarisa.pegadaian.co.id/login" target="_blank">
                    <img src="/images/work.jpg" class="card-img-top" alt="...">
                </a>
                <div class="card-body">
                    <h5 class="card-title">Larisa</h5>
                    <p class="card-text">.</p>
                    <a href="https://newlarisa.pegadaian.co.id/login" class="btn btn-primary" target="_blank">Larisa</a>
                </div>
            </div>
        </div>
        {{-- </div> --}}

        <div class="col-12 col-sm-6 col-md-2">
            <div class="card">
                <a href="https://hc-trip.pegadaian.co.id/login" target="_blank">
                    <img src="/images/travel.jpg" class="card-img-top" alt="...">
                </a>
                <div class="card-body">
                    <h5 class="card-title">SPPD</h5>
                    <p class="card-text">.</p>
                    <a href="https://hc-trip.pegadaian.co.id/login" class="btn btn-primary" target="_blank">SPPD</a>
                </div>
            </div>
        </div>
        </div>


        <div class="container-fluid">
            <!-- Info boxes -->
            <div class="row">
                <div class="col-12 col-sm-6 col-md-3">
                    <div class="info-box">
                        <span class="info-box-icon bg-info elevation-1"><i class="fas fa-cog"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">CPU Traffic</span>
                            <span class="info-box-number">
                                10
                                <small>%</small>
                            </span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <!-- /.col -->
                <div class="col-12 col-sm-6 col-md-3">
                    <div class="info-box mb-3">
                        <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-thumbs-up"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">Likes</span>
                            <span class="info-box-number">41,410</span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <!-- /.col -->

                <!-- fix for small devices only -->
                <div class="clearfix hidden-md-up"></div>

                <div class="col-12 col-sm-6 col-md-3">
                    <div class="info-box mb-3">
                        <span class="info-box-icon bg-success elevation-1"><i class="fas fa-shopping-cart"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">Sales</span>
                            <span class="info-box-number">760</span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <div class="col-12 col-sm-6 col-md-3">
                    <div class="info-box mb-3">
                        <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-users"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">New Members</span>
                            <span class="info-box-number">2,000</span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->




        </div>
        <!--/. container-fluid -->
    </section>
@stop

@section('css')
    <link rel="stylesheet" href="{{ asset('vendor/fullcalendar/main.min.css') }}">
@stop

@section('js')
    <script src='http://fullcalendar.io/js/fullcalendar-2.1.1/lib/moment.min.js'></script>
    <script src='http://fullcalendar.io/js/fullcalendar-2.1.1/lib/jquery.min.js'></script>
    <script src="http://fullcalendar.io/js/fullcalendar-2.1.1/lib/jquery-ui.custom.min.js"></script>
    <script src='http://fullcalendar.io/js/fullcalendar-2.1.1/fullcalendar.min.js'></script>

    {{-- <script src="{{ asset('vendor/fullcalendar/main.js') }}"></script>
<script src="{{ asset('vendor/moment/moment.min.js') }}"></script> --}}
    <script type="text/javascript">
        $(document).ready(function() {
            // alert("dokumen Ready")
        });
        $(function() {

            $('#calendar').fullCalendar({
                themeSystem: 'bootstrap4',
                header: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'month,agendaWeek,agendaDay,listMonth'
                },
                weekNumbers: true,
                eventLimit: true, // allow "more" link when too many events
                events: 'https://fullcalendar.io/demo-events.json'
            });

        });
    </script>

@stop
