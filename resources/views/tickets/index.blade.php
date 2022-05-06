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
                <!-- Filter Box -->
                <div class="card filter-box">
                    <!-- Filter Box Header -->
                    <div class="card-header filter-box-header">
                        <h4>Filter By</h4>
                    </div>
                    <!-- End of Filter Box Header -->

                    <!-- Filter Box Body -->
                    <div class="card-body filter-box-body">
                        <h5>Couch type</h5>
                        <!-- All Types -->
                        <div class="custom-control custom-switch">
                            <input class="custom-control-input all-types" type="checkbox" data-url="{{route("all.types")}}" 
                                data-method="get" id="all">
                            <label class="custom-control-label" for="all">All</label>
                        </div>
                        <!-- End of All Types -->
                        @if ($types->count() > 0)
                            @foreach ($types as $key => $type)
                                {{-- <a href="">{{$type->name}}</a> --}}
                                {{-- <button class="btn btn-link d-block type-item"
                                data-url="{{route("type.ticket", ["type" => $type->id])}}"
                                data-method="get">{{$type->name}}</button> --}}
                                <div class="custom-control custom-switch">
                                    <input class="custom-control-input type-item"
                                        data-url="{{route("type.ticket", ["type" => $type->id])}}"
                                        data-method="get" type="checkbox" id="check{{$key}}">
                                    <label class="custom-control-label" for="check{{$key}}">{{$type->name}}</label>
                                </div>
                            @endforeach
                        @endif
                    </div>
                    <!-- End of Filter Box Body -->
                </div>
                <!-- End of Filter Box -->

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
                <!-- Ticktes content -->
                <div class="tickets-content">
                    <div class="loading text-center">
                        <div class="loader"></div>
                        <p class="p-2">Waiting</p>
                    </div>
                    <div class="tickets-content-list">
                        
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
