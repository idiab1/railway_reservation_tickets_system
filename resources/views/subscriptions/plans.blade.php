@extends('layouts.app')

{{-- Title --}}
@section('title')
    {{ trans('site.subscriptions') }}
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
        <h1>{{ trans('site.subscriptions') }}</h1>
    </div>
    <!-- End of Header info -->
@endsection

@section('content')
<!-- subscription Section -->
<section class="subscription-section section">

    <!-- Container fluid -->
    <div class="container">
        <div class="row">
            <div class="col-md-8 m-auto">
                <div class="card">
                    <div class="card-header">{{ __('Subscription Plans') }}</div>

                    <div class="card-body">
                        @foreach($plans as $plan)
                            <div>
                                <a href="{{ route('payments', ['plan' => $plan->identifier]) }}">
                                    {{$plan->title}}
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End of Container fluid -->
</section>
<!-- End of subscriptions Section -->


@endsection

@section('other-scripts')
<!-- main script -->
<script src="{{asset('js/main.js')}}"></script>
<!--Custom script -->
<script src="{{asset('js/custom.js')}}"></script>


@endsection


