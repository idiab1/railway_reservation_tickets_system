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

        .tickets-content .ticket{
            flex-direction: row;
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
                    <div class="filter-box-body"></div>
                    <!-- End of Filter Box Body -->
                </div>
                <!-- End of Filter Box -->
            </div>
            <div class="col-md-8">
                <!-- Ticktes content -->
                <div class="tickets-content">
                    {{-- <div class="tickets-content-header"></div> --}}

                    <!-- Ticket card -->
                    <div class="card ticket">

                        <!-- Ticket name -->
                        <div class="card-header ticket-name text-center">
                            <div class="icon">
                                <i class="fas fa-train"></i>
                            </div>
                            2354
                        </div>
                        <!-- End of Ticket name -->

                        <!-- Ticket details -->
                        <div class="card-body ticket-details">
                            <div class="depature-station">

                            </div>
                        </div>
                        <!-- End of Ticket details -->

                        <!-- Ticket price -->
                        <div class="card-footer ticket-price">
                            <p>25 {{ trans('site.currency') }}</p>
                        </div>
                        <!-- End of Ticket price -->
                    </div>
                    <!-- End of Ticket card -->

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

@endsection
