@extends('layouts.admin.app')

{{-- Title --}}
@section('title')
    {{ trans('site.setting') }}
@endsection

{{-- Page name --}}
@section('page_name')
    {{ trans('site.setting') }}
@endsection

{{-- Breadcrumb --}}
@section('breadcrumb-item')
    <li class="breadcrumb-item">{{ trans('site.setting') }}<li>
@endsection

{{-- Content --}}
@section('content')
<div class="setting-page">
    <div class="row">
        <div class="col-md-8 m-auto">
            <div class="setting-form">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">{{ trans('site.setting') }}</h3>
                    </div>
                    <!-- /.card-header -->
                        <!-- form start -->
                        <form action="{{route('setting.update', ['id' => $setting->id])}}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="card-body">
                                <!-- Website name -->
                                <div class="form-group">
                                    <label for="webName">{{ trans('site.website_name') }}</label>
                                    <input class="form-control" type="text" id="webName" name="web_name"
                                            value="{{$setting->web_name}}" placeholder="{{trans('site.enter_website_name')}}">
                                </div>

                                <!-- Phone Number -->
                                <div class="form-group">
                                    <label for="phoneNumber">{{ trans('site.phone_number') }}</label>
                                    <input class="form-control" type="number" id="phoneNumber" name="phone_number"
                                            value="{{$setting->phone_number}}" placeholder="{{trans('site.enter_phone_number')}}">
                                </div>

                                <!-- Email -->
                                <div class="form-group">
                                    <label for="webEmail">{{ trans('site.email') }}</label>
                                    <input class="form-control" type="text" id="webEmail" name="web_email"
                                            value="{{$setting->web_email}}" placeholder="{{trans('site.enter_website_email')}}">
                                </div>

                                <!-- Address -->
                                <div class="form-group">
                                    <label for="address">{{ trans('site.address') }}</label>
                                    <input class="form-control" type="text" id="address" name="address"
                                            value="{{$setting->address}}" placeholder="{{trans('site.enter_address')}}">
                                </div>

                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary btn-submit btn-crayons">{{ trans('site.update') }}</button>
                            </div>
                        </form>

                    </div>
            <!-- /.card -->
            </div>
        </div>
    </div>
</div>
@endsection
