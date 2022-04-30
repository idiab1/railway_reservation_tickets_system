@extends('layouts.app')

{{-- Title --}}
@section('title')
    {{ trans('site.tickets') }}
@endsection

{{-- Styles --}}
@section('other-styles')
    <link rel="stylesheet" href="{{asset("plugins/stepper/css/bs-stepper.min.css")}}">
    <style>
        .active .bs-stepper-circle {
            background-color: #832c42;
            color: #eee6ce;
        }
        .active .bs-stepper-label{
            color: #832c42;
        }

        .train-card .train-header{
            color: #eee6ce;
            background-color: #832c42;
        }
        .train-card .train-header .icon{
            margin-bottom: 5px;
        }
        .train-card .train-header h4{
            font-size: 1.2rem;
            font-weight: bold;
            text-transform: capitalize;
        }

        .train-card .card-body .ticket-details{
            display: flex;
            justify-content: space-between;
        }
        .ticket-price span{
            color: #832c42;
            font-weight: 600;
        }
        label{
            display: block;
        }
        select{
            width: 100%;
        }

    </style>
@endsection

{{-- Header --}}
@section('header') @endsection

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
            <div class="col-md-7">
                <div class="p-2 bg-white shadow-sm">
                    <!-- Stepper -->
                    <div id="stepper1" class="bs-stepper">
                        <!-- Stepper Header -->
                        <div class="bs-stepper-header" role="tablist">
                            <!-- reservation -->
                            <div class="step" data-target="#test-l-1">
                                <button type="button" class="step-trigger" role="tab"
                                    id="stepper1trigger1" aria-controls="test-l-1">
                                    <span class="bs-stepper-circle">1</span>
                                    <span class="bs-stepper-label">Reservation</span>
                                </button>
                            </div>
                            <!-- End of reservation -->

                            <div class="bs-stepper-line"></div>

                            <!-- Step Item -->
                            <div class="step" data-target="#test-l-2">
                                <button type="button" class="step-trigger" role="tab"
                                    id="stepper1trigger2" aria-controls="test-l-2">
                                    <span class="bs-stepper-circle">2</span>
                                    <span class="bs-stepper-label">Validate</span>
                                </button>
                            </div>
                            <!-- End of Step Item -->
                        </div>
                        <!-- End of Stepper Header -->

                        <!-- Stepper Content -->
                        <div class="bs-stepper-content">
                            <form method="POST" action="{{route("reserve.store", ["train" => $train->id])}}">
                                @csrf
                                <!-- Stepper one -->
                                <div id="test-l-1" role="tabpanel" class="bs-stepper-pane"
                                    aria-labelledby="stepper1trigger1">

                                    <!-- Form Row -->
                                    <div class="form-row">
                                        <div class="col">
                                            <!-- Username -->
                                            <div class="form-group">
                                                <label for="username">Username</label>
                                                <input type="text" class="form-control" id="username"
                                                    placeholder="Type username" name="name" required
                                                    value="{{Auth::user()->name}}">
                                            </div>
                                        </div>
                                        <div class="col">
                                            <!-- Email Address -->
                                            <div class="form-group">
                                                <label for="email">Email address</label>
                                                <input type="email" class="form-control" id="email"
                                                    placeholder="Enter email" name="email" required
                                                    value="{{Auth::user()->email}}">
                                            </div>
                                        </div>
                                        {{-- <div class="col">
                                            <!-- Gender -->
                                            <div class="form-group">
                                                <label for="gender">Gender</label>
                                                @php
                                                    $gender = ["male", "female"]
                                                @endphp
                                                <select name="gender" id="gender">
                                                    @foreach ($gender as $item)
                                                        <option value=""></option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div> --}}
                                    </div>
                                    <!-- End of Form Row -->

                                    <!-- Form Row -->
                                    <div class="form-row">
                                        <div class="col">
                                            <!-- Depature Station -->
                                            <div class="form-group">
                                                <label for="depature_station">Depature Station</label>
                                                <input type="text" class="form-control disabled" id="depature_station"
                                                    name="depature_station" required disabled
                                                    value="{{$train->depature_station}}">
                                            </div>
                                        </div>
                                        <div class="col">
                                            <!-- Arrival Station -->
                                            <div class="form-group">
                                                <label for="arrival_station">Arrival Station</label>
                                                <input type="text" class="form-control disabled" id="arrival_station"
                                                    name="arrival_station" required disabled
                                                    value="{{$train->arrival_station}}">
                                            </div>
                                        </div>

                                    </div>
                                    <!-- End of Form Row -->

                                    <!-- Price -->
                                    <div class="form-group">
                                        <label for="price">Price</label>
                                        <input type="text" class="form-control disabled" id="price"
                                            name="price" required disabled
                                            value="{{$train->price}}">
                                    </div>


                                    <button class="btn btn-primary crayons-btn crayons-btn" type="button" onclick="stepper.next()">Next</button>
                                </div>
                                <!-- End of Stepper one -->

                                <!-- Stepper three -->
                                <div id="test-l-2" role="tabpane2" class="bs-stepper-pane text-center"
                                    aria-labelledby="stepper1trigger2">
                                    <button class="btn btn-primary crayons-btn mt-5">Previous</button>
                                    <button type="submit" class="btn btn-primary crayons-btn mt-5">Submit</button>
                                </div>
                                <!-- Stepper three -->

                            </form>
                        </div>
                        <!-- End of Stepper Content -->

                    </div>
                    <!-- End of stepper -->
                </div>
            </div>
            <div class="col-md-5">
                <!-- Train Card -->
                <div class="card train-card">
                    <!-- Train header -->
                    <div class="card-header train-header text-center">
                        <!-- Icon -->
                        <div class="icon">
                            <i class="fas fa-train fa-2x"></i>
                        </div>
                        <h4 class="m-0">{{$train->name}}</h4>
                    </div>
                    <!-- End of Train header -->

                    <!-- Train body -->
                    <div class="card-body train-body">
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
                                <span class="m-0">{{$train->type->name}}</span>
                            </div>
                            <!-- End of Ticket price -->
                            <!-- Ticket price -->
                            <div class="ticket-price text-center">
                                <p class="m-0"><span>25 {{ trans('site.currency') }}</span> / Person</p>
                            </div>
                            <!-- End of Ticket price -->

                        </div>
                        <!-- End of Ticket details -->
                    </div>
                    <!-- End of Train body -->
                </div>
                <!-- End of Train Card -->
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

<script src="{{asset('plugins/stepper/js/bs-stepper.min.js')}}"></script>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        let stepper1 = document.querySelector('.bs-stepper');
        window.stepper = new Stepper(document.querySelector('.bs-stepper'), {
            linear: true
        })
    });

//   myStepper = new Stepper(document.querySelector('#stepper1'),{
//     linear: false
// })

// myStepper = new Stepper(document.querySelector('#stepper1'),{
//   animation: true
// })

</script>

@endsection
