@extends('layouts.app')

{{-- Title --}}
@section('title')
    {{ trans('site.home') }}
@endsection

{{-- Styles --}}
@section('other-styles')
    <!-- Select2 -->
    <link rel="stylesheet" href="{{asset('plugins/select2/css/select2.min.css')}}">
    <link rel="stylesheet" href="{{asset('plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
    <style>
        .select2-container .select2-selection--single .select2-selection__rendered{
            padding-left: 0;
            text-transform: capitalize;
            background-color: transparent;
        }
        .select2-container .select2-selection--single .select2-selection__rendered,
        .select2-container .select2-selection--single .select2-selection__rendered:focus{
            background-color: transparent;
            box-shadow: none;
            border: none;
        }
        .select2-container .select2-selection--single {
            height: 34px;
            background-color: transparent;
            border: none;
        }
        .select2-container--default .select2-results__option--highlighted[aria-selected] {
            background-color: #1c1f33;
            color: #EEE6CE;
            text-transform: capitalize;
        }

        span.select2.select2-container.select2-container--bootstrap4{
            width: auto !important;
        }

        

        .select2-container--bootstrap4 .select2-selection {
            border: none;
            color: #ababab;
            text-transform: capitalize;
            background-color: transparent;
        }
        .select2-container--bootstrap4 .select2-selection:focus {
            border:none;
            box-shadow: none;
        }

        .select2-container--bootstrap4 .select2-results__option--highlighted,
        .select2-container--bootstrap4 .select2-results__option--highlighted.select2-results__option[aria-selected=true] {
            background-color: #1c1f33;
            color: #EEE6CE;
            text-transform: capitalize;

        }

    </style>

@endsection

{{-- Header --}}
@section('header-info')
    <!-- Header info -->
    <div class="header-info">
        <p>Train Service</p>
        <h1>Welcome to Egyption Railway</h1>
        <p>We saves your time both while burchasing, the check-in and during the travel </p>
    </div>
    <!-- End of Header info -->
@endsection

@section('content')
    <!-- reservation search section -->
    <section class="search-reservation section">
        <div class="container-fluid container-md">
            <div class="row d-none d-md-block">
                <div class="col-12">
                    <!-- Reservation Box -->
                    <div class="reservation-box">
                        <!-- Reservation form -->
                        <div class="reservation-form">
                            <!-- Form -->
                            <form action="" method="POST">

                                <div class="card box">
                                    <!-- Box Header -->
                                    <div class="card-header box-header">
                                        <div class="icon">
                                            <i class="fas fa-train fa-2x"></i>
                                        </div>
                                    </div>
                                    <!-- End of Box Header -->

                                    <!-- Card Body -->
                                    <div class="card-body box-content py-0">
                                        <div class="row">
                                            {{-- <div class="col">
                                                <!-- Box Routes -->
                                                <div class="box-routes">
                                                    <!-- Travelling Routing -->
                                                    <div class="form-group m-0">
                                                        <label for="travelling_routing" class="form-label">
                                                            Travelling Routing
                                                        </label>
                                                        <div class="input-group m-0">
                                                            <select class="form-control select2bs4 depature-stations">
                                                                <option>{{trans('site.from')}}</option>
                                                                @foreach ($stations as $station)
                                                                    <option value="{{$station->id}}" >{{$station->name}}</option>
                                                                @endforeach
                                                            </select>
                                                            <select class="form-control select2bs4 arrival-stations">
                                                                <option>{{trans('site.to')}}</option>
                                                                @foreach ($stations as $station)
                                                                    <option value="{{$station->id}}" >{{$station->name}}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- End of Box Routes -->
                                            </div>
                                            <div class="col pl-0">
                                                <!-- Box Dates -->
                                                <div class="box-dates">
                                                    <!-- Travelling date -->
                                                    <div class="form-group m-0">
                                                        <label for="travelling_routing" class="form-label">
                                                            Travelling Date
                                                        </label>
                                                        <div class="input-group m-0">
                                                            <input type="date" class="form-control" id="travelling_routing" aria-label="From">
                                                            <input type="date" class="form-control" id="travelling_routing" aria-label="To">
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- End of Box Dates -->
                                            </div> --}}

                                            <div class="col-3 px-0">
                                                <div class="form-group m-0">
                                                    <label for="from" class="form-label">
                                                        From
                                                    </label>
                                                    <select class="form-control select2bs4 select2 depature-stations" id="from">
                                                        <option>{{trans('site.all')}}</option>
                                                        @foreach ($stations as $station)
                                                            <option value="{{$station->id}}" >{{$station->name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-3 px-0">
                                                <div class="form-group m-0">
                                                    <label for="to" class="form-label">
                                                        To
                                                    </label>
                                                    <select class="form-control select2bs4 select2 arrival-stations" id="to">
                                                        <option>{{trans('site.all')}}</option>
                                                        @foreach ($stations as $station)
                                                            <option value="{{$station->id}}" >{{$station->name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-3 px-0">
                                                <div class="form-group m-0">
                                                    <label for="depature_date" class="form-label">
                                                        Depature Date
                                                    </label>
                                                    <input type="date" class="form-control" id="depature_date" aria-label="from">
                                                </div>
                                            </div>
                                            <div class="col-3 px-0">
                                                <div class="form-group m-0 border-right-0">
                                                    <label for="depature_date" class="form-label">
                                                        Arrival Date
                                                    </label>
                                                    <input type="date" class="form-control" id="arrival_date" aria-label="to">
                                                </div>
                                            </div>

                                        </div>


                                    </div>
                                    <!-- End of Card Body -->

                                    <!-- Card Footer -->
                                    <div class="card-footer box-button p-0">
                                        <!-- Button search tickets -->
                                        <div class="form-group m-0 text-right">
                                            <button type="submit" class="btn btn-primary btn-search-tickets crayons-btn">
                                                Search
                                            </button>
                                        </div>
                                    </div>
                                    <!-- End of Card Footer -->
                                </div>
                            </form>
                            <!-- ./end of form -->
                        </div>
                        <!-- End fo reservation form -->
                    </div>
                    <!-- End of Reservation Box -->
                </div>
            </div>
            <div class="row d-block d-md-none">
                <div class="col-12">
                    <!-- Card Reservation Form -->
                    <div class="card card-reservation-form">
                        <!-- Form -->
                        <form action="" method="POST">

                            <div class="card">
                                <!-- Card header -->
                                <div class="card-header">
                                    <h4>Search</h4>
                                </div>
                                <!-- End of Card header -->

                                <!-- Card Body -->
                                <div class="card-body box-content">
                                    <div class="row">
                                        {{-- <div class="col">
                                            <!-- Box Routes -->
                                            <div class="box-routes">
                                                <!-- Travelling Routing -->
                                                <div class="form-group m-0">
                                                    <label for="travelling_routing" class="form-label">
                                                        Travelling Routing
                                                    </label>
                                                    <div class="input-group m-0">
                                                        <select class="form-control select2bs4 depature-stations">
                                                            <option>{{trans('site.from')}}</option>
                                                            @foreach ($stations as $station)
                                                                <option value="{{$station->id}}" >{{$station->name}}</option>
                                                            @endforeach
                                                        </select>
                                                        <select class="form-control select2bs4 arrival-stations">
                                                            <option>{{trans('site.to')}}</option>
                                                            @foreach ($stations as $station)
                                                                <option value="{{$station->id}}" >{{$station->name}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- End of Box Routes -->
                                        </div>
                                        <div class="col pl-0">
                                            <!-- Box Dates -->
                                            <div class="box-dates">
                                                <!-- Travelling date -->
                                                <div class="form-group m-0">
                                                    <label for="travelling_routing" class="form-label">
                                                        Travelling Date
                                                    </label>
                                                    <div class="input-group m-0">
                                                        <input type="date" class="form-control" id="travelling_routing" aria-label="From">
                                                        <input type="date" class="form-control" id="travelling_routing" aria-label="To">
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- End of Box Dates -->
                                        </div> --}}

                                        <div class="col">
                                            <div class="form-group ">
                                                <label for="from" class="form-label">
                                                    From
                                                </label>
                                                <select class="form-control select2bs4 depature-stations" id="from">
                                                    <option>{{trans('site.all')}}</option>
                                                    @foreach ($stations as $station)
                                                        <option value="{{$station->id}}" >{{$station->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group ">
                                                <label for="depature_date" class="form-label">
                                                    Depature Date
                                                </label>
                                                <input type="date" class="form-control" id="depature_date" aria-label="from">
                                            </div>
                                        </div>
                                        <div class="">

                                        </div>

                                        <div class="col">
                                            <div class="form-group border-right-0">
                                                <label for="to" class="form-label">
                                                    To
                                                </label>
                                                <select class="form-control select2bs4 arrival-stations" id="to">
                                                    <option>{{trans('site.all')}}</option>
                                                    @foreach ($stations as $station)
                                                        <option value="{{$station->id}}" >{{$station->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group  border-right-0">
                                                <label for="depature_date" class="form-label">
                                                    Arrival Date
                                                </label>
                                                <input type="date" class="form-control" id="arrival_date" aria-label="to">
                                            </div>

                                        </div>
                                        {{-- <div class="col-3 px-0">
                                            
                                        </div>
                                        <div class="col-3 px-0">
                                            
                                        </div>
                                        <div class="col-3 px-0">
                                            
                                        </div> --}}

                                    </div>


                                </div>
                                <!-- End of Card Body -->

                                <!-- Card Footer -->
                                <div class="card-footer box-button p-0">
                                    <!-- Button search tickets -->
                                    <div class="form-group m-0 text-right">
                                        <button type="submit" class="btn btn-primary d-block btn-search-tickets crayons-btn">
                                            Search
                                        </button>
                                    </div>
                                </div>
                                <!-- End of Card Footer -->
                            </div>
                        </form>
                        <!-- ./end of form -->
                    </div>
                    <!-- End of Card Reservation Form -->
                </div>
                
            </div>
        </div>
    </section>
    <!-- End of reservation search section -->

    <!-- Recent Posts -->
    <section class="recent-posts-section section">
        <div class="container-fluid container-md">
            <div class="row">
                <div class="col-12 p-0">
                    <!-- Section Header -->
                    <h2 class="heading">Recent Posts</h2>
                </div>
            </div>
            <div class="posts-lists">
                <div class="row d-none d-md-block">
                    <div class="col-12 p-0">
                        <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <!-- Card post -->
                                            <div class="card card-post">
                                                <!-- Post header for add images -->
                                                <div class="card-header post-header">
            
                                                    <span class="date">21 August, 2019</span>
                                                </div>
                                                <!-- Post Content/body -->
                                                <div class="card-body post-body">
                                                    <h3 class="post-title">Why Lead Generation is Key for Business Growth</h3>
                                                    <p class="post-description">
                                                        A small river named Duden flows by their place and supplies it with the necessary regelialia.
                                                    </p>
                                                </div>
                                            </div>
                                            <!-- ./end of post -->
                                        </div>
                                        <div class="col-md-4">
                                            <!-- Card post -->
                                            <div class="card card-post">
                                                <!-- Post header for add images -->
                                                <div class="card-header post-header">
            
                                                    <span class="date">21 August, 2019</span>
                                                </div>
                                                <!-- Post Content/body -->
                                                <div class="card-body post-body">
                                                    <h3 class="post-title">Why Lead Generation is Key for Business Growth</h3>
                                                    <p class="post-description">
                                                        A small river named Duden flows by their place and supplies it with the necessary regelialia.
                                                    </p>
                                                </div>
                                            </div>
                                            <!-- ./end of post -->
                                        </div>
                                        <div class="col-md-4">
                                            <!-- Card post -->
                                            <div class="card card-post">
                                                <!-- Post header for add images -->
                                                <div class="card-header post-header">
            
                                                    <span class="date">21 August, 2019</span>
                                                </div>
                                                <!-- Post Content/body -->
                                                <div class="card-body post-body">
                                                    <h3 class="post-title">Why Lead Generation is Key for Business Growth</h3>
                                                    <p class="post-description">
                                                        A small river named Duden flows by their place and supplies it with the necessary regelialia.
                                                    </p>
                                                </div>
                                            </div>
                                            <!-- ./end of post -->
                                        </div>
                                    </div>
                                </div>
                                <div class="carousel-item">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <!-- Card post -->
                                            <div class="card card-post">
                                                <!-- Post header for add images -->
                                                <div class="card-header post-header">
            
                                                    <span class="date">21 August, 2019</span>
                                                </div>
                                                <!-- Post Content/body -->
                                                <div class="card-body post-body">
                                                    <h3 class="post-title">Why Lead Generation is Key for Business Growth</h3>
                                                    <p class="post-description">
                                                        A small river named Duden flows by their place and supplies it with the necessary regelialia.
                                                    </p>
                                                </div>
                                            </div>
                                            <!-- ./end of post -->
                                        </div>
                                        <div class="col-md-4">
                                            <!-- Card post -->
                                            <div class="card card-post">
                                                <!-- Post header for add images -->
                                                <div class="card-header post-header">
            
                                                    <span class="date">21 August, 2019</span>
                                                </div>
                                                <!-- Post Content/body -->
                                                <div class="card-body post-body">
                                                    <h3 class="post-title">Why Lead Generation is Key for Business Growth</h3>
                                                    <p class="post-description">
                                                        A small river named Duden flows by their place and supplies it with the necessary regelialia.
                                                    </p>
                                                </div>
                                            </div>
                                            <!-- ./end of post -->
                                        </div>
                                        <div class="col-md-4">
                                            <!-- Card post -->
                                            <div class="card card-post" style="height:100%">
                                                <div class="card-body post-body">
                                                    <a href="" class="btn-btn-primary crayons-btn">
                                                        show More
                                                    </a>
                                                </div>
                                            </div>
                                            <!-- ./end of post -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="sr-only">Previous</span>
                            </a>
                            <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="sr-only">Next</span>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="row d-block d-md-none">
                    <div class="col-8">
                        <!-- Card post -->
                        <div class="card card-post">
                            <!-- Post header for add images -->
                            <div class="card-header post-header">

                            </div>
                            <!-- Post Content/body -->
                            <div class="card-body post-body">
                                <span class="date">21 August, 2019</span>
                                <h3 class="post-title">Why Lead Generation is Key for Business Growth</h3>
                                <p class="post-description">
                                    A small river named Duden flows by their place and supplies it with the necessary regelialia.
                                </p>
                            </div>
                        </div>
                        <!-- ./end of post -->
                    </div>
                </div>
            </div>
            

        </div>
    </section>
    <!-- End of recent posts -->

    <!-- Ticket Advantages -->
    <section class="e-ticket-advantages section">
        <div class="container-fluid container-md">
            <div class="row">
                <div class="col-12">
                    <!-- Header of section -->
                    <h2 class="heading">E-Tickets Advantages</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-12 col-sm-6 col-md-3">
                    <!-- Advantage card -->
                    <div class="card advantage-card text-center">
                        <!-- Advantage Header -->
                        <div class="card-header advantage-header">
                            <!-- Advantage icon -->
                            <div class="advantage-icon">
                                <i class="fas fa-ticket-alt fa-3x"></i>
                            </div>
                        </div>
                        <!-- Advantage inforamtion -->
                        <div class="card-body advantage-info">
                            <p>It's very easy to order a train ticket online. E-Ticket can not be
                                lost of forgotten at home.</p>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-md-3">
                    <!-- Advantage card -->
                    <div class="card advantage-card text-center">
                        <!-- Advantage Header -->
                        <div class="card-header advantage-header">
                            <!-- Advantage icon -->
                            <div class="advantage-icon">
                                <i class="fas fa-building fa-3x"></i>
                            </div>
                        </div>
                        <!-- Advantage inforamtion -->
                        <div class="card-body advantage-info">
                            <p>There's no need to go to the ticket office additionally before your
                                trip.</p>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-md-3">
                    <!-- Advantage card -->
                    <div class="card advantage-card text-center">
                        <!-- Advantage Header -->
                        <div class="card-header advantage-header">
                            <!-- Advantage icon -->
                            <div class="advantage-icon">
                                <i class="fas fa-globe fa-3x"></i>
                            </div>
                            <!-- Name of advantage -->
                        </div>
                        <!-- Advantage inforamtion -->
                        <div class="card-body advantage-info">
                            <p>To order ticekts all you need is internet, a couple minutes and
                                a payment card. </p>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-md-3">
                    <!-- Advantage card -->
                    <div class="card advantage-card text-center">
                        <!-- Advantage Header -->
                        <div class="card-header advantage-header">
                            <!-- Advantage icon -->
                            <div class="advantage-icon">
                                <i class="fas fa-credit-card fa-3x"></i>
                            </div>
                            <!-- Name of advantage -->
                        </div>
                        <!-- Advantage inforamtion -->
                        <div class="card-body advantage-info">
                            <p>Pay through any payment mode & avail instant ticket refund and cancellation</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End of Ticket Advantages -->

@endsection

@section('other-scripts')
<!-- Bootstrap 4 -->
<script src="{{asset('plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- Select 2 -->
<script src="{{asset('plugins/select2/js/select2.min.js')}}"></script>

<!-- main script -->
<script src="{{asset('js/main.js')}}"></script>

<script>
    $(function () {
        // $('.select2bs4').select2({
        //     theme: 'bootstrap4'
        // })
        $('.select2').select2()
        $('.carousel').carousel({
            wrap: false,
            ride: true
        });
    })
</script>

@endsection

