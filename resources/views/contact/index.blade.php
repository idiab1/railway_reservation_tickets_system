@extends('layouts.app')

{{-- Title --}}
@section('title')
    {{ trans('site.contact_us') }}
@endsection

{{-- Header --}}
@section('header')

@endsection

{{-- Content --}}
@section('content')
<div class="contact-page">
    <div class="row">
        <div class="col-md-7 m-auto">
            <div class="contact-form">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="h1 card-title">{{ trans('site.contact_us') }}</h3>
                    </div>
                    <!-- /.card-header -->
                        <!-- form start -->
                        <form action="{{route('contact.store')}}" method="POST">
                            @csrf
                            <div class="card-body">
                                <!-- Name -->
                                <div class="form-group">
                                    <label for="name">{{ trans('site.name') }}</label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="name">
                                                <i class="mdi mdi-account-outline"></i>
                                            </span>
                                        </div>
                                        <input class="form-control" type="text" id="name" name="name"
                                            placeholder="{{trans('site.name')}}" aria-describedby="name" aria-label="name" >
                                    </div>
                                </div>

                                <!-- Email -->
                                <div class="form-group">
                                    <label for="email">{{ trans('site.email') }}</label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="email">
                                                <i class="mdi mdi-email"></i>
                                            </span>
                                        </div>
                                        <input class="form-control" type="email" id="email" name="email"
                                            placeholder="{{trans('site.email')}}" aria-describedby="email" aria-label="email" >
                                    </div>

                                </div>

                                <!-- Contact -->
                                <div class="form-group">
                                    <label for="message">{{ trans('site.message') }}</label>
                                    <textarea class="form-control" name="message" id="message" cols="30"
                                    rows="10" placeholder="{{trans('site.enter_your_message')}}"></textarea>

                                </div>
                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer {{app()->getLocale() == "ar" ? "text-left" : "text-right" }}">
                                <button type="submit" class="btn btn-primary crayons-btn">
                                    <i class="mdi mdi-send"></i>
                                    {{ trans('site.send') }}
                                </button>
                            </div>
                        </form>

                    </div>
            <!-- /.card -->
            </div>
        </div>
    </div>
</div>
@endsection
