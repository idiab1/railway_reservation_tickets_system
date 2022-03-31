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
