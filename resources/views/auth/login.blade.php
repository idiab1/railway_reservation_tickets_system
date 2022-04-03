@extends('layouts.app')

{{-- Title --}}
@section('title')
    {{ trans('site.login') }}
@endsection

{{-- Styles --}}
@section('other-styles')
    <style>
        .layout .main-container {
            width: 100vw;
            overflow: hidden;
        }
    </style>
@endsection

{{-- navbar --}}
@section('navbar')

@endsection

{{-- Header --}}
@section('header')

@endsection

{{-- Sidebar --}}
@section('sidebar')

@endsection

{{-- Main Content --}}
@section('content')

<!-- Login page -->
<section class="login-page section sign-page">
    <div class="container-fluid">
        <!-- Sign Box -->
        <div class="sign-container">
            <div class="row">
                <div class="col-8 m-auto">
                    <div class="row">
                        <div class="col-md-6 d-none p-0 d-md-block">
                            <!-- sign info -->
                            <div class="sign-info sign-box">
                                <!-- Card -->
                                <div class="card card-sign-info">
                                    <!-- Card Body -->
                                    <div class="card-body">

                                    </div>
                                    <!-- End of Card Body -->
                                </div>
                                <!-- End of card -->
                            </div>
                            <!-- End of sign info -->
                        </div>
                        <div class="col-md-6 p-0">
                            <!-- Sign form -->
                            <div class="sign-form sign-box">
                                <!-- Sign Card -->
                                <div class="card sign-card-form">
                                    <!-- Card Header -->
                                    <div class="card-header">
                                        <h3 class="">Welcome Back</h3>
                                        <p>Welcome Back! Please enter your details.</p>
                                    </div>

                                    <!-- card body -->
                                    <div class="card-body">
                                        <form method="POST" action="{{ route('login') }}">
                                            @csrf

                                            <!-- Email Address -->
                                            <div class="form-group">
                                                <label for="email">{{ trans('site.email') }}</label>
                                                <div class="input-group mb-3">
                                                    <div class="input-group-prepend">
                                                        <!-- Icon -->
                                                        <span class="input-group-text" id="email">
                                                            <i class="mdi mdi-email"></i>
                                                        </span>
                                                    </div>

                                                    <!-- Input email field -->
                                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                                        name="email" value="{{ old('email') }}" required autocomplete="email" autofocus
                                                        placeholder="{{trans('site.enter_email')}}" aria-describedby="email" aria-label="email" >

                                                    @error('email')
                                                        <!-- If session has error type email -->
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>

                                            </div>

                                            <!-- Password -->
                                            <div class="form-group">
                                                <label for="password">{{ trans('site.password') }}</label>
                                                <div class="input-group mb-3">
                                                    <div class="input-group-prepend">
                                                        <!-- Icon -->
                                                        <span class="input-group-text" id="password">
                                                            <i class="mdi mdi-lock"></i>
                                                        </span>
                                                    </div>

                                                    <!-- Input password field -->
                                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                                                        name="password" required autocomplete="current-password"
                                                        placeholder="{{trans('site.enter_password')}}" aria-describedby="password" aria-label="password" >

                                                    @error('password')
                                                        <!-- If session has error type password -->
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>

                                            </div>

                                            <!-- Remember Me -->
                                            <div class="form-row">
                                                <div class="col col-md-5">
                                                    <div class="form-group">
                                                        <div class="form-check">
                                                            <!-- Check Input -->
                                                            <input class="form-check-input" type="checkbox" name="remember"
                                                            id="remember" {{ old('remember') ? 'checked' : '' }}>

                                                            <label class="form-check-label" for="remember">
                                                                {{ trans('site.remember_me') }}
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col col-md-7">
                                                    <div class="form-group forgot-password text-right">
                                                        @if (Route::has('password.request'))
                                                            <!-- Forgot your password -->
                                                            <a class="btn btn-link forgot-password-link" href="{{ route('password.request') }}">
                                                                {{ trans('site.forgot_password') }}
                                                            </a>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Button  -->
                                            <div class="form-group">
                                                <button type="submit" class="btn btn-primary crayons-btn btn-block">
                                                    {{ trans('site.login') }}
                                                </button>
                                            </div>

                                            <div class="row">
                                                <div class="col-12">
                                                    <!-- Create account -->
                                                    <div class="create-account">
                                                        <p class="d-inline-block">Don't have an account?</p>
                                                        @if (Route::has('register'))
                                                            <a class="btn-link" href="{{ route('register') }}">
                                                                Create account
                                                            </a>
                                                        @endif
                                                    </div>
                                                    <!-- End of Create account -->
                                                </div>
                                            </div>

                                            {{-- <div class="form-group">
                                                <ul class="list-unstyled">
                                                    <li>
                                                        <a href="">
                                                            <i class="mdi mdi-email"></i>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="">
                                                            <i class="mdi mdi-email"></i>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="">
                                                            <i class="mdi mdi-email"></i>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div> --}}

                                        </form>
                                    </div>
                                </div>
                            </div>
                            <!-- End of Sign form -->
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <!-- End of Sign Box -->
    </div>
</section>
<!-- End of login page -->
@endsection

{{-- footer --}}
@section('footer')

@endsection

@section('other-scripts')
    <script>
        document.querySelector(".section").style.minHeight = (window.innerHeight) + "px";
    </script>
@endsection
