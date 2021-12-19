@extends('layouts.app')

{{-- Title --}}
@section('title')
    {{ trans('site.register') }}
@endsection

{{-- Header --}}
@section('header')

@endsection

{{-- Main Content --}}
@section('content')

<!-- Register Page -->
<section class="register-page">
    <div class="row justify-content-center">
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
    </div>
</section>


@endsection
