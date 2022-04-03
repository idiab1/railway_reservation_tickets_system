@extends('layouts.admin.app')

{{-- Title --}}
@section('title')
    Home
@endsection

{{-- Styles --}}
@section('styles')

<style>
    .content-header{
        height: 100px;
    }
    .content-header .content-header-info {
        text-align: center;
        display: flex;
        justify-content: space-between;
    }
</style>

@endsection

{{-- Page name --}}
@section('page_name')
    Control Panel
@endsection

{{-- Content --}}
@section('content')
    <!-- Homepage -->
    <section class="homepage">
        <div class="row">
            <div class="col-lg-4 col-6">
                <!-- Project box -->
                <div class="small-box bg-info">
                    <div class="inner">
                        <h3>{{$trainsCount}}</h3>
                        <p>Trains</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-train"></i>
                    </div>
                    <a href="#" class="small-box-footer">
                        More info <i class="fas fa-arrow-circle-right"></i>
                    </a>
                </div>
                <!-- End of Project box -->
            </div>
            <!-- ./col -->
            <div class="col-lg-4 col-6">
                <!-- Tasks box -->
                <div class="small-box bg-success">
                    <div class="inner">
                        <h3>{{$servationsCount}}</h3>
                        <p>Reservations</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-ticket-alt"></i>
                    </div>
                    <a href="#" class="small-box-footer">
                        More info <i class="fas fa-arrow-circle-right"></i>
                    </a>
                </div>
                <!-- End of Tasks box -->
            </div>
            <!-- ./col -->
            <div class="col-lg-4 col-6">
                <!-- Users box -->
                <div class="small-box bg-warning">
                    <div class="inner">
                        <h3>{{$userCount}}</h3>
                        <p>User Registrations</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-users"></i>
                    </div>
                    <a href="{{route("users.index")}}" class="small-box-footer">
                        More info <i class="fas fa-arrow-circle-right"></i>
                    </a>
                </div>
            </div>
            <!-- ./col -->
        </div>
    </section>
    <!-- End of Homepage -->
@endsection
