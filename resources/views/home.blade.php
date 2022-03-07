@extends('layouts.app')

{{-- Title --}}
@section('title')
    {{ trans('site.home') }}
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
                                    <div class="col">
                                        <!-- Travelling Routing -->
                                        <div class="form-group mb-3">
                                            <label for="travelling_routing" class="form-label">
                                                Travelling Routing
                                            </label>
                                            <div class="input-group">
                                                <input type="text" class="form-control" id="travelling_routing" placeholder="From" aria-label="From">
                                                <input type="text" class="form-control" id="travelling_routing" placeholder="To" aria-label="To">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <!-- Travelling date -->
                                        <div class="form-group mb-3">
                                            <label for="travelling_routing" class="form-label">
                                                Travelling Date
                                            </label>
                                            <div class="input-group">
                                                <input type="date" class="form-control" id="travelling_routing" aria-label="From">
                                                <input type="date" class="form-control" id="travelling_routing" aria-label="To">
                                            </div>
                                        </div>
                                    </div>
                                </div>
        
        
                                <div class="text-right">
                                    <button type="submit" class="btn btn-primary crayons-btn">
                                        Search Tickets
                                    </button>
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
                                <i class="fas fa-ticket-alt fa-2x"></i>
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
                                <i class="fas fa-building fa-2x"></i>
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
                                <i class="fas fa-globe fa-2x"></i>
                            </div>
                            <!-- Name of advantage -->
                            <h2></h2>
                        </div>
                        <!-- Advantage inforamtion -->
                        <div class="card-body advantage-info">
                            <p>To order ticekts all you need is internet, a couple minutes and
                                a payment card. Grab bonuses and discounts.</p>
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
                                <i class="fas fa-credit-card fa-2x"></i>
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

    <!-- Recent Posts -->
    <section class="recent-posts section">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <!-- Section Header -->
                    <h2 class="heading">Recent Posts</h2>
                </div>
            </div>
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
    </section>
    <!-- End of recent posts -->

@endsection

@section('other-scripts')
<!-- main script -->
<script src="{{asset('js/main.js')}}"></script>
@endsection
