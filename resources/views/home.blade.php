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
        .select2-container .select2-selection--single {
            height: auto;
        }

    </style>

    <style>

        .search-reservation .reservation-box {
            top: -65px;
        }
        .btn-search-tickets{
            display: FLEX;
            align-items: center;
            justify-content: right;
            margin-top: 30px;
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
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <!-- Reservation Box -->
                    <div class="reservation-box">
                        <!-- Reservation form -->
                        <div class="reservation-form">
                            <!-- Form -->
                            <form action="" method="POST">
                                <div class="row">
                                    <div class="col-5">
                                        <!-- Travelling Routing -->
                                        <div class="form-group">
                                            <label for="travelling_routing" class="form-label">
                                                Travelling Routing
                                            </label>
                                            <div class="input-group row m-0">
                                                <div class="col pl-0">
                                                    <select class="form-control select2bs4 depature-stations">
                                                        <option selected="selected" >{{trans('site.from')}}</option>
                                                        @foreach ($stations as $station)
                                                            <option value="{{$station->id}}" >{{$station->name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="col pr-0">
                                                    <select class="form-control select2bs4 arrival-stations">
                                                        <option selected="selected" >{{trans('site.to')}}</option>
                                                        @foreach ($stations as $station)
                                                            <option value="{{$station->id}}" >{{$station->name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-5">
                                        <!-- Travelling date -->
                                        <div class="form-group">
                                            <label for="travelling_routing" class="form-label">
                                                Travelling Date
                                            </label>
                                            <div class="input-group row m-0">
                                                <div class="col pl-0">
                                                    <input type="date" class="form-control" id="travelling_routing" aria-label="From">
                                                </div>
                                                <div class="col pr-0">
                                                    <input type="date" class="form-control" id="travelling_routing" aria-label="To">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-2 btn-search-tickets">
                                        <!-- Button search tickets -->
                                        <div class="form-group text-right">
                                            <button type="submit" class="btn btn-primary crayons-btn">
                                                Search Tickets
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            <!-- ./end of form -->
                        </div>
                        <!-- End fo reservation form -->
                    </div>
                    <!-- End of Reservation Box -->
                </div>
            </div>
        </div>
    </section>
    <!-- End of reservation search section -->

    <!-- Recent Posts -->
    <section class="recent-posts section">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <!-- Section Header -->
                    <h2 class="heading">Recent Posts</h2>
                </div>
            </div>
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
    </section>
    <!-- End of recent posts -->

    <!-- Ticket Advantages -->
    <section class="e-ticket-advantages section">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <!-- Header of section -->
                    <h2 class="heading">E-Tickets Advantages</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3">
                    <!-- Advantage card -->
                    <div class="card advantage-card text-center">
                        <!-- Advantage Header -->
                        <div class="card-header advantage-header">
                            <!-- Advantage icon -->
                            <div class="advantage-icon">
                                <i class="fas fa-ticket-alt fa-3x"></i>
                            </div>
                            <!-- Name of advantage -->
                            <h2></h2>
                        </div>
                        <!-- Advantage inforamtion -->
                        <div class="card-body advantage-info">
                            <p>It's very easy to order a train ticket online. E-Ticket can not be
                                lost of forgotten at home.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <!-- Advantage card -->
                    <div class="card advantage-card text-center">
                        <!-- Advantage Header -->
                        <div class="card-header advantage-header">
                            <!-- Advantage icon -->
                            <div class="advantage-icon">
                                <i class="fas fa-building fa-3x"></i>
                            </div>
                            <!-- Name of advantage -->
                            <h2></h2>
                        </div>
                        <!-- Advantage inforamtion -->
                        <div class="card-body advantage-info">
                            <p>There's no need to go to the ticket office additionally before your
                                trip. Save your money and nerves.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <!-- Advantage card -->
                    <div class="card advantage-card text-center">
                        <!-- Advantage Header -->
                        <div class="card-header advantage-header">
                            <!-- Advantage icon -->
                            <div class="advantage-icon">
                                <i class="fas fa-globe fa-3x"></i>
                            </div>
                            <!-- Name of advantage -->
                            <h2></h2>
                        </div>
                        <!-- Advantage inforamtion -->
                        <div class="card-body advantage-info">
                            <p>To order ticekts all you need is internet, a couple minutes and
                                a payment card. </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <!-- Advantage card -->
                    <div class="card advantage-card text-center">
                        <!-- Advantage Header -->
                        <div class="card-header advantage-header">
                            <!-- Advantage icon -->
                            <div class="advantage-icon">
                                <i class="fas fa-credit-card fa-3x"></i>
                            </div>
                            <!-- Name of advantage -->
                            <h2></h2>
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
        $('.carousel').carousel({
            wrap: false,
            ride: true
        });
        $('.select2bs4').select2({
            theme: 'bootstrap4'
        })
    })
</script>

@endsection

