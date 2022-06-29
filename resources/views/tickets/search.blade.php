@extends('layouts.app')

{{-- Title --}}
@section('title')
    {{ trans('site.tickets') }}
@endsection

{{-- Styles --}}
@section('other-styles')
    <style>
        /* Sub Header */
        .sub-header {
            height: 270px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .sub-header .header-box .header-info {
            width: auto;
            margin-top: 0;
            text-align: center;
        }

    </style>
@endsection

{{-- Header --}}
@section('header-info')
    <!-- Header info -->
    <div class="header-info">
        <h1>{{ trans('site.tickets') }}</h1>
    </div>
    <!-- End of Header info -->
@endsection

@section('content')
<!-- Tickets Section -->
<section class="tickets-section section">

    <!-- Container fluid -->
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                

                <!-- Recent Posts -->
                <div class="card recent-box">
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
                <!-- Ticktes content -->
                <div class="tickets-content">
                    <div class="loading text-center">
                        <div class="loader"></div>
                        <p class="p-2">Waiting</p>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <!-- Heading -->
                            <h2 class="heading"></h2>
                        </div>
                    </div>
                    <div class="tickets-content-list">
                        @if ($trains->count() > 0)
    @foreach ($trains as $train)
        <!-- Ticket card -->
        <div class="card ticket">

            <!-- Ticket name -->
            <div class="card-header ticket-name text-center">
                <div class="icon">
                    <i class="fas fa-train fa-2x"></i>
                </div>
                <p class="m-0">{{$train->name}}</p>
            </div>
            <!-- End of Ticket name -->

            <!-- card body -->
            <div class="card-body">
                <!-- Ticket details -->
                <div class="ticket-details">
                    <!-- Depature station info -->
                    <div class="depature-station text-center">
                        <div class="from facades">
                            <span class="font-weight-bold">From</span>
                        </div>
                        <ul class="list-unstyled">
                            <li>
                                <span class="d-block">
                                    {{date('h:m A', strtotime($train->depature_at))}}
                                </span>
                                <span class="d-block">
                                    {{date('d M, Y', strtotime($train->depature_at))}}
                                </span>
                                {{-- {{}} --}}
                            </li>
                            <li>
                                <span class="d-block font-weight-bold">
                                    {{$train->depature_station}}
                                </span>
                            </li>
                        </ul>
                    </div>

                    <!-- Icon -->
                    <div class="icon">
                        <i class="fas fa-angle-double-right"></i>
                    </div>

                    <!-- Depature station info -->
                    <div class="arrival-station text-center">
                        <div class="to distination">
                            <span class="font-weight-bold">To</span>
                        </div>
                        <ul class="list-unstyled">
                            <li>
                                <span class="d-block">
                                    {{date('h:m A', strtotime($train->arrival_at))}}
                                </span>
                                <span class="d-block">
                                    {{date('d M, Y', strtotime($train->arrival_at))}}
                                </span>
                                {{-- {{}} --}}
                            </li>
                            <li>
                                <span class="d-block font-weight-bold">
                                    {{$train->arrival_station}}
                                </span>
                            </li>

                        </ul>
                    </div>
                </div>
                <!-- End of Ticket details -->

                <!-- Ticket details -->
                <div class="ticket-details">
                    <!-- Ticket price -->
                    <div class="ticket-price text-center">
                        <p class="m-0">{{$train->price}} {{ trans('site.currency') }} / Person</p>
                    </div>
                    <!-- End of Ticket price -->

                    <!-- Ticket price -->
                    <div class="ticket-price text-center">
                        <p class="m-0">{{$train->type->name}}</p>
                    </div>
                    <!-- End of Ticket price -->
                </div>
                <!-- End of Ticket details -->

            </div>
            <!-- End of card body -->

            <!-- card footer -->
            <div class="card-footer">
                {{-- <a class="btn btn-primary crayons-btn btn-buy-ticket"
                    href="{{route("reserve.index", ["train" => $train->id])}}">
                    Buy Ticket
                </a> --}}
                <form action="{{route('credit', ["train" => $train->id])}}" method="POST">
                    @csrf
                    <input style="width: fit-content" type="submit" value="Buy Ticket" class="btn btn-primary crayons-btn btn-buy-ticket">
                </form>
            </div>
            <!-- End of card footer -->
        </div>
        <!-- End of Ticket card -->
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
                </div>
                <!-- End of Ticktes content -->
            </div>
        </div>
    </div>
    <!-- End of Container fluid -->
</section>
<!-- End of Tickets Section -->
@endsection

@section('other-scripts')
<!-- main script -->
<script src="{{asset('js/main.js')}}"></script>
<!--Custom script -->
<script src="{{asset('js/custom.js')}}"></script>
<script src="{{asset('js/types.js')}}"></script>


@endsection
