@extends('layouts.app')

{{-- Title --}}
@section('title')
    {{ trans('site.reset_password') }}
@endsection

{{-- Header --}}
@section('header')

@endsection

{{-- Main Content --}}
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ trans('site.reset_password') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('password.email') }}">
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
                                <input id="email" type="email"
                                    class="form-control @error('email') is-invalid @enderror"
                                    name="email" value="{{ old('email') }}"
                                    required autocomplete="email"
                                    placeholder="{{trans('site.enter_email')}}"
                                    aria-describedby="email" aria-label="email" >

                                @error('email')
                                    <!-- If session has error type email -->
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                        </div>

                        <!-- Button -->
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary crayons-btn">
                                {{ trans('site.send_password_link') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
