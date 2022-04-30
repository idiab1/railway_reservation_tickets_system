@extends('layouts.app')

{{-- Title --}}
@section('title')
    {{ trans('site.tickets') }}
@endsection

{{-- Styles --}}
@section('other-styles')
    <style>
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

        .filter-box .filter-box-header{
            color: #eee6ce;
            background: #98354e;
            text-align: center;
        }

        .tickets-content .ticket{
            flex-direction: row;
        }

        .tickets-content .ticket .card-header{
            border: none;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            background-color: transparent;
            border-right: 1px solid rgba(0, 0, 0, 0.125);
            padding: 0.75rem 1rem;
        }

        .tickets-content .ticket .card-header .icon {
            background-color: #98354e;
            width: 40px;
            height: 40px;
            color: #eee6ce;
            display: flex;
            justify-content: center;
            align-items: center;
            border-radius: 50%;
        }

        .tickets-content .ticket .card-header .icon i{
            font-size: 20px;
        }

        .tickets-content .ticket .card-header p{
            color: #98354e;
            font-weight: bold;
            padding-top: 5px;
            text-transform: capitalize;
        }

        .tickets-content .ticket .card-body{
            background-color: transparent;
            padding: 0.75rem 1rem;
        }

        .tickets-content .ticket .card-body .ticket-details{
            display: flex;
            justify-content: space-between;
        }

        .tickets-content .ticket .ticket-price{
            padding-top: 10px;
        }
        .tickets-content .ticket .card-body .ticket-details .icon{
            display: flex;
            align-items: center;
        }

        .tickets-content .ticket .card-footer{
            border: none;
            display: flex;
            padding: 0.75rem 1rem;
            justify-content: center;
            align-items: center;
            background-color: transparent;
            border-left: 1px solid rgba(0, 0, 0, 0.125);
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
                <!-- Filter Box -->
                <div class="card filter-box">
                    <!-- Filter Box Header -->
                    <div class="card-header filter-box-header">
                        <h4>Filter By</h4>
                    </div>
                    <!-- End of Filter Box Header -->

                    <!-- Filter Box Body -->
                    <div class="card-body filter-box-body">

                    </div>
                    <!-- End of Filter Box Body -->
                </div>
                <!-- End of Filter Box -->
            </div>
            <div class="col-md-8">
                <!-- Ticktes content -->
                <div class="tickets-content">
                    {{-- <div class="tickets-content-header"></div> --}}

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
                                        <div class="depature-station">
                                            <ul class="list-unstyled">
                                                <li>
                                                    {{$train->depature_at}}
                                                </li>
                                                <li>
                                                    {{$train->depature_station}}
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
                                                    {{$train->arrival_at}}
                                                </li>
                                                <li>
                                                    {{$train->arrival_station}}
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
                                    <a class="btn btn-primary crayons-btn btn-buy-ticket"
                                        href="{{route("reserve.index", ["train" => $train->id])}}">
                                        Buy Ticket
                                    </a>
                                </div>
                                <!-- End of card footer -->
                            </div>
                            <!-- End of Ticket card -->
                        @endforeach
                    @else

                    @endif



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

@endsection
