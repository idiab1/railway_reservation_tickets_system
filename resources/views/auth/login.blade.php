@extends('layouts.app')

{{-- Title --}}
@section('title')
    {{ trans('site.login') }}
@endsection

{{-- Header --}}
@section('header')

@endsection

{{-- Main Content --}}
@section('content')

<!-- Login page -->
<section class="login-page">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6 d-none d-md-block bg-dark">
                test
            </div>
            <div class="col-md-6 p-0">
                <div class="sing-form">
                    <!-- Sign Card -->
                    <div class="card sign-card">
                        <!-- Card Header -->
                        <div class="card-header">
                            <h2 class="">Welcome Back</h2>
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
                                    <div class="form-group col-6">
                                        <div class="form-check">
                                            <!-- Check Input -->
                                            <input class="form-check-input" type="checkbox" name="remember"
                                            id="remember" {{ old('remember') ? 'checked' : '' }}>

                                            <label class="form-check-label" for="remember">
                                                {{ trans('site.remember_me') }}
                                            </label>
                                        </div>
                                    </div>
                                    <div class="form-group col-6">
                                        @if (Route::has('password.request'))
                                            <!-- Forgot your password -->
                                            <a class="btn btn-link" href="{{ route('password.request') }}">
                                                {{ trans('site.forgot_password') }}
                                            </a>
                                        @endif
                                    </div>
                                </div>

                                <!-- Button  -->
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary crayons-btn btn-block">
                                        {{ trans('site.login') }}
                                    </button>
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
            </div>
        </div>
    </div>
</section>
<!-- End of login page -->
@endsection
