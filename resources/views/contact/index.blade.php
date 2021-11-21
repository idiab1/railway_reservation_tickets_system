@extends('layouts.app')

{{-- Title --}}
@section('title')
    {{ trans('site.contact') }}
@endsection

{{-- Page name --}}
@section('page_name')
    {{ trans('site.contact') }}
@endsection

{{-- Content --}}
@section('content')
<div class="contact-page">
    <div class="row">
        <div class="col-md-6 m-auto">
            <div class="setting-form">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="h1 card-title">{{ trans('site.contact') }}</h3>
                    </div>
                    <!-- /.card-header -->
                        <!-- form start -->
                        <form action="{{route('contact.store')}}" method="POST">
                            @csrf
                            <div class="card-body">
                                <!-- Name -->
                                <div class="form-group">
                                    <label for="name">{{ trans('site.name') }}</label>
                                    <input class="form-control" type="text" id="name"
                                    name="name" placeholder="{{trans('site.enter_name')}}">
                                </div>

                                <!-- Email -->
                                <div class="form-group">
                                    <label for="email">{{ trans('site.email') }}</label>
                                    <input class="form-control" type="email" id="email"
                                    name="email" placeholder="{{trans('site.enter_email')}}">
                                </div>

                                <!-- Contact -->
                                <div class="form-group">
                                    <label for="message">{{ trans('site.message') }}</label>
                                    <textarea class="form-control" name="message" id="message" cols="30"
                                    rows="10" placeholder="{{trans('site.enter_your_message')}}"></textarea>
                                </div>
                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary crayons-btn">{{ trans('site.send') }}</button>
                            </div>
                        </form>

                    </div>
            <!-- /.card -->
            </div>
        </div>
    </div>
</div>
@endsection
