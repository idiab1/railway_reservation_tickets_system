@extends('layouts.app')

{{-- Title --}}
@section('title')
    {{ trans('site.register') }}
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

<!-- Register Page -->
<section class="register-page section sign-page">
    <div class="container-fluid">
        <!-- Sign Box -->
        <div class="sign-container">
            <div class="row">
                <div class="col-8 m-auto">
                    <div class="row">
                        <div class="col-md-6 p-0">
                            <!-- Sing Form -->
                            <div class="sign-form sign-box">
                                <!-- Sign Card -->
                                <div class="card sign-card-form">
                                    <!-- Card Header -->
                                    <div class="card-header">
                                        <h3 class="">Create a new account</h3>
                                    </div>

                                    <!-- card body -->
                                    <div class="card-body">
                                        <!-- Form -->
                                        <form method="POST" action="{{ route('register') }}">
                                            @csrf

                                            <!-- Name -->
                                            <div class="form-group">
                                                <label for="name">{{ trans('site.name') }}</label>
                                                <div class="input-group mb-3">
                                                    <div class="input-group-prepend">
                                                        <!-- Icon -->
                                                        <span class="input-group-text" id="name">
                                                            <i class="mdi mdi-account"></i>
                                                        </span>
                                                    </div>

                                                    <!-- Input name field -->
                                                    <input id="name" type="name" class="form-control @error('name') is-invalid @enderror"
                                                        name="name" value="{{ old('name') }}" required autocomplete="name" autofocus
                                                        placeholder="{{trans('site.enter_name')}}" aria-describedby="name" aria-label="name" >

                                                    @error('name')
                                                        <!-- If session has error type name -->
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>

                                            </div>

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
                                                        name="email" value="{{ old('email') }}" required autocomplete="email"
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
                                                        name="password" required autocomplete="new-password"
                                                        placeholder="{{trans('site.enter_password')}}" aria-describedby="password" aria-label="password" >

                                                    @error('password')
                                                        <!-- If session has error type password -->
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>

                                            </div>

                                            <!-- Confirm Password -->
                                            <div class="form-group">
                                                <label for="password-confirm">{{ trans('site.confirm_password') }}</label>
                                                <div class="input-group mb-3">
                                                    <div class="input-group-prepend">
                                                        <!-- Icon -->
                                                        <span class="input-group-text" id="password-confirm">
                                                            <i class="mdi mdi-lock"></i>
                                                        </span>
                                                    </div>

                                                    <!-- Input password confirmation field -->
                                                    <input id="password_confirmation" type="password" class="form-control"
                                                        name="password_confirmation" required autocomplete="password_confirmation"
                                                        placeholder="{{trans('site.enter_password')}}"
                                                        aria-describedby="password_confirmation" aria-label="password_confirmation" >
                                                </div>

                                            </div>

                                            <!-- Button  -->
                                            <div class="form-group">
                                                <button type="submit" class="btn btn-primary crayons-btn btn-block">
                                                    {{ trans('site.register') }}
                                                </button>
                                            </div>

                                            <div class="row">
                                                <div class="col-12">
                                                    <!-- Create account -->
                                                    <div class="create-account">
                                                        <p class="d-inline-block">Already have an account?</p>
                                                        @if (Route::has('login'))
                                                            <a class="btn-link" href="{{ route('login') }}">
                                                                Login
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
                                        <!-- End of form -->
                                    </div>
                                </div>
                                <!-- End fof Sign Card -->
                            </div>
                            <!-- End of Sing Form -->
                        </div>
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
                    </div>
                </div>
            </div>
        </div>
        <!-- End of Sign Box -->
    </div>
    {{-- <div class="row justify-content-center">
        <div class="col-md-8">
            <!-- Sign Card -->
            <div class="card sign-card">
                <!-- Card Header -->
                <div class="card-header">{{ trans('site.register') }}</div>

                <!-- card body -->
                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <!-- Name -->
                        <div class="form-group">
                            <label for="name">{{ trans('site.name') }}</label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <!-- Icon -->
                                    <span class="input-group-text" id="name">
                                        <i class="mdi mdi-account"></i>
                                    </span>
                                </div>

                                <!-- Input name field -->
                                <input id="name" type="name" class="form-control @error('name') is-invalid @enderror"
                                    name="name" value="{{ old('name') }}" required autocomplete="name" autofocus
                                    placeholder="{{trans('site.enter_name')}}" aria-describedby="name" aria-label="name" >

                                @error('name')
                                    <!-- If session has error type name -->
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                        </div>

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
                                    name="email" value="{{ old('email') }}" required autocomplete="email"
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
                                    name="password" required autocomplete="new-password"
                                    placeholder="{{trans('site.enter_password')}}" aria-describedby="password" aria-label="password" >

                                @error('password')
                                    <!-- If session has error type password -->
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                        </div>

                        <!-- Confirm Password -->
                        <div class="form-group">
                            <label for="password-confirm">{{ trans('site.confirm_password') }}</label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <!-- Icon -->
                                    <span class="input-group-text" id="password-confirm">
                                        <i class="mdi mdi-lock"></i>
                                    </span>
                                </div>

                                <!-- Input password confirmation field -->
                                <input id="password_confirmation" type="password" class="form-control"
                                    name="password_confirmation" required autocomplete="password_confirmation"
                                    placeholder="{{trans('site.enter_password')}}"
                                    aria-describedby="password_confirmation" aria-label="password_confirmation" >
                            </div>

                        </div>

                        <!-- Button  -->
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary crayons-btn">
                                {{ trans('site.register') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div> --}}
</section>


@endsection

{{-- footer --}}
@section('footer')

@endsection

@section('other-scripts')
    <script>
        document.querySelector(".section").style.minHeight = (window.innerHeight) + "px";
    </script>
@endsection
