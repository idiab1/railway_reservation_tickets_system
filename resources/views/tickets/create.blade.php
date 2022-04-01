@extends('layouts.app')

{{-- Title --}}
@section('title')
    {{ trans('site.tickets') }}
@endsection

{{-- Styles --}}
@section('other-styles')
    <link rel="stylesheet" href="{{asset("plugins/stepper/css/bs-stepper.min.css")}}">
    <style>

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

        <div class="`p-4 bg-white shadow-sm">
            <!-- Stepper -->
            <div id="stepper1" class="bs-stepper">
                <!-- Stepper Header -->
                <div class="bs-stepper-header" role="tablist">
                    <!-- Step Item -->
                    <div class="step" data-target="#test-l-1">
                        <button type="button" class="step-trigger" role="tab"
                            id="stepper1trigger1" aria-controls="test-l-1">
                            <span class="bs-stepper-circle">1</span>
                            <span class="bs-stepper-label">Email</span>
                        </button>
                    </div>
                    <!-- End of Step Item -->

                    <div class="bs-stepper-line"></div>

                    <!-- Step Item -->
                    <div class="step" data-target="#test-l-2">
                        <button type="button" class="step-trigger" role="tab"
                            id="stepper1trigger3" aria-controls="test-l-2">
                            <span class="bs-stepper-circle">2</span>
                            <span class="bs-stepper-label">Validate</span>
                        </button>
                    </div>
                    <!-- End of Step Item -->
                </div>
                <!-- End of Stepper Header -->

                <!-- Stepper Content -->
                <div class="bs-stepper-content">
                    <form onSubmit="return false" method="POST" action="{{route("user.tickets.store")}}">
                        @csrf
                        <!-- Stepper one -->
                        <div id="test-l-1" role="tabpanel" class="bs-stepper-pane"
                            aria-labelledby="stepper1trigger1">
                            <!-- Email Address -->
                            <div class="form-group">
                                <label for="username">Username</label>
                                <input type="email" class="form-control" id="username"
                                    placeholder="Enter email" required>
                            </div>
                            <!-- Email Address -->
                            <div class="form-group">
                                <label for="exampleInputEmail1">Email address</label>
                                <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
                            </div>
                            <!-- Email Address -->
                            <div class="form-group">
                                <label for="exampleInputEmail1">Email address</label>
                                <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
                            </div>
                            <!-- Email Address -->
                            <div class="form-group">
                                <label for="exampleInputEmail1">Email address</label>
                                <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
                            </div>
                            <button class="btn btn-primary crayons-btn crayons-btn" onclick="stepper.next()">Next</button>
                        </div>
                        <!-- End of Stepper one -->

                        <!-- Stepper three -->
                        <div id="test-l-2" role="tabpanel" class="bs-stepper-pane text-center"
                            aria-labelledby="stepper1trigger3">
                            <button class="btn btn-primary crayons-btn mt-5" onclick="stepper.previous()">Previous</button>
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
        window.stepper = new Stepper(document.querySelector('.bs-stepper'))
    });

//   myStepper = new Stepper(document.querySelector('#stepper1'),{
//     linear: false
// })

// myStepper = new Stepper(document.querySelector('#stepper1'),{
//   animation: true
// })

</script>

@endsection
