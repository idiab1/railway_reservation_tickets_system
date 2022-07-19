@extends('layouts.app')

{{-- Title --}}
@section('title')
    {{$user->name}}
@endsection

{{-- Header --}}
@section('header')

@endsection

{{-- Content --}}
@section('content')
<section class="profile-page section">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <!-- user card -->
                <div class="card user-card">
                    <!-- card body -->
                    <div class="card-body text-center">
                        <!-- User Image -->
                        <div class="user-image">
                            <img class="img-fluid rounded-circle"
                                src="{{asset('uploads/users/' . $user->profile->image)}}"
                                alt="user image" width="70" height="70">
                        </div>
                        <!-- End of User Image -->

                        <!-- User Details -->
                        <div class="user-details">
                            <h3 class="m-0">{{$user->name}}</h3>
                            <p class="m-0">{{$user->email}}</p>

                        </div>
                        <!-- End of User Details -->
                    </div>
                    <!-- End of card body -->

                    <!-- Card Footer -->
                    <div class="card-footer">
                        <div class="d-inline-block">
                            <!-- Facebook -->
                            <a class="btn btn-link p-0" href="{{$user->profile->facebook}}" target="_blank">
                                <!-- Icon -->
                                <div class="icon d-inline-block">
                                    <i class="fab fa-facebook-square"></i>
                                </div>
                                <span>Facebook</span>
                            </a>
                        </div>
                        <div class="d-inline-block">
                            <!-- Twitter -->
                            <a class="btn btn-link p-0" href="{{$user->profile->twitter}}" target="_blank">
                                <!-- Icon -->
                                <div class="icon d-inline-block">
                                    <i class="fab fa-twitter-square"></i>
                                </div>
                                <span>Twitter</span>
                            </a>
                        </div>
                        <div class="d-inline-block">
                            <!-- Twitter -->
                            <a class="btn btn-link p-0" href="{{$user->profile->linkedin}}" target="_blank">
                                <!-- Icon -->
                                <div class="icon d-inline-block">
                                    <i class="fab fa-linkedin"></i>
                                </div>
                                <span>Linkedin</span>
                            </a>
                        </div>

                    </div>
                    <!-- End of Card Footer -->

                </div>
                <!-- End of user card -->

                <!-- Recent Posts -->
                <div class="card recent-box my-4">
                    <!-- recent Box Header -->
                    <div class="card-header recent-box-header px-0">
                        <h4>Recent Posts</h4>
                    </div>
                    <!-- End of Filter Box Header -->

                    <!-- recent Box Body -->
                    <div class="card-body recent-box-body ">
                        <!-- Post -->
                        <div class="card card-post">
                            <!-- Post Header -->
                            <div class="card-header post-header">
                                <img class="img-fluid" src="{{asset('images/post.jpg')}}" alt="">
                            </div>
                            <!-- End of Post Header -->

                            <!-- Post body -->
                            <div class="card-body post-body">
                                <h5 class="m-0">Lorem, ipsum dolor sit.</h5>
                                <span class="date">1 day ago</span>
                            </div>

                        </div>
                        <!-- End of Post -->

                        <!-- Post -->
                        <div class="card card-post">
                            <!-- Post Header -->
                            <div class="card-header post-header">
                                <img class="img-fluid" src="{{asset('images/post.jpg')}}" alt="">
                            </div>
                            <!-- End of Post Header -->

                            <!-- Post body -->
                            <div class="card-body post-body">
                                <h5 class="m-0">Lorem, ipsum dolor sit.</h5>
                                <span class="date">1 day ago</span>
                            </div>

                        </div>
                        <!-- End of Post -->

                        <!-- Post -->
                        <div class="card card-post">
                            <!-- Post Header -->
                            <div class="card-header post-header">
                                <img class="img-fluid" src="{{asset('images/post.jpg')}}" alt="">
                            </div>
                            <!-- End of Post Header -->

                            <!-- Post body -->
                            <div class="card-body post-body">
                                <h5 class="m-0">Lorem, ipsum dolor sit.</h5>
                                <span class="date">1 day ago</span>
                            </div>

                        </div>
                        <!-- End of Post -->
                    </div>
                    <!-- End of recent Box Body -->
                </div>
                <!-- End of Recent Posts -->

            </div>

            <div class="col-md-8">
                <!-- User Tickets section -->
                <section class="tickets-section">
                    <div class="row">
                        <div class="col-12 pb-3">
                            <!-- User Ticket -->
                            <div class="user-ticket">
                                <h3>Your Tickets</h3>
                            </div>
                            <!-- End of User Ticket -->
                        </div>
                    </div>
                    <div class="row">
                        @if ($user->reservations->count() > 0)
                            @foreach ($user->reservations as $reservation)
                                <div class="col-12">

                                    <!-- Card -->
                                    <div class="card ticket mb-4">
                                        <!-- card header -->
                                        <div class="card-header ">
                                            <div class="ticket-header">

                                                <span class="d-block">
                                                    {{date('h:m A', strtotime($reservation->date_reserve))}}
                                                </span>
                                                <span class="d-block">
                                                    {{date('d M, Y', strtotime($reservation->date_reserve))}}
                                                </span>

                                            </div>
                                        </div>
                                        <!-- End of card header -->
                                        <!-- card body -->
                                        <div class="card-body ticket-body">

                                            <!-- Ticket user info -->
                                            <div class="ticket-details">
                                                <h5>{{$reservation->user->name}}</h5>
                                                <span class="d-block">{{$reservation->user->email}}</span>
                                            </div>
                                            <!-- End of Ticket user info -->

                                            <!-- Ticket details -->
                                            <div class="ticket-details">
                                                <!-- Depature station info -->
                                                <div class="depature-station">
                                                    <ul class="list-unstyled">
                                                        <li>
                                                            {{$reservation->train->depature_at}}
                                                        </li>
                                                        <li>
                                                            {{$reservation->train->depature_station}}
                                                        </li>
                                                    </ul>
                                                </div>

                                                <!-- Icon -->
                                                <div class="icon">
                                                    <i class="fas fa-angle-double-right"></i>
                                                </div>

                                                <!-- Depature station info -->
                                                <div class="arrival-station">
                                                    <ul class="list-unstyled">
                                                        <li>
                                                            {{$reservation->train->arrival_at}}
                                                        </li>
                                                        <li>
                                                            {{$reservation->train->arrival_station}}
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <!-- End of Ticket details -->

                                            <!-- Ticket details -->
                                            <div class="ticket-details m-0">
                                                <!-- Ticket price -->
                                                <div class="ticket-price text-center">
                                                    <span class="m-0">{{$reservation->train->type->name}}</span>
                                                </div>
                                                <!-- End of Ticket price -->
                                                <!-- Ticket price -->
                                                <div class="ticket-price text-center">
                                                    <span class="m-0">{{$reservation->train->name}}</span>
                                                </div>
                                                <!-- End of Ticket price -->

                                                <!-- Ticket price -->
                                                <div class="ticket-price text-center">
                                                    <p class="m-0"><span>{{$reservation->train->price}} {{ trans('site.currency') }}</span> / Person</p>
                                                </div>
                                                <!-- End of Ticket price -->
                                                @php
                                                    $trainData = [
                                                        'Name'  => $train->name,
                                                        'Price' => $train->price . " / Person",
                                                        'From'  => $train->depature_station,
                                                        'Depature At'  => date('h:m A', strtotime($train->depature_at)) . "-" . date('d M, Y', strtotime($train->depature_at)),
                                                        'To'  => $train->arrival_station,
                                                        'Arrival At'  => date('h:m A', strtotime($train->arrival_at)) . "-" . date('d M, Y', strtotime($train->arrival_at)),
                                                        'Type' => $train->type->name,
                                                        /* Add here all the data you need*/
                                                    ];

                                                    //Json encode your data
                                                    $jsonData = json_encode($trainData);
                                                @endphp
                                                {!! QrCode::size(100)->generate( $jsonData) !!}

                                            </div>
                                            <!-- End of Ticket details -->
                                        </div>
                                        <!-- End of card body -->
                                    </div>
                                    <!-- End of Card -->

                                </div>
                            @endforeach
                        @else
                            <div class="row">
                                <div class="col-12">
                                    <div class="empty">
                                        <img src="{{asset("images/empty.svg")}}" alt="">
                                        <div class="info py-4">
                                            <p>No data recorded</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif

                    </div>
                </section>
                <!-- End of User Tickets section -->

            </div>
        </div>
        <div class="row"></div>
    </div>
</section>
@endsection

@section('other-scripts')

<!-- main script -->
<script src="{{asset('js/main.js')}}"></script>

<!-- custom script -->
<script src="{{asset('js/custom.js')}}"></script>

@endsection
