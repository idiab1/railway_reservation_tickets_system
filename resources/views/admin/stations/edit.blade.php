@extends('layouts.admin.app')

{{-- Title --}}
@section('title')
    {{ trans('site.edit') }} {{$station->name . "'s"}}
@endsection

{{-- Page name --}}
@section('page_name')
    {{ trans('site.edit') }} {{$station->name . "'s"}}
@endsection

{{-- Breadcrumb --}}
@section('breadcrumb-item')
    <li class="breadcrumb-item"><a href="{{route('stations.index')}}">{{ trans('site.stations') }}</a></li>
    <li class="breadcrumb-item">{{ trans('site.edit') }} {{$station->name . "'s"}}<li>
@endsection

{{-- Content --}}
@section('content')
<div class="stations-page">
    <div class="row">
        <div class="col-md-8 m-auto">
            <div class="stations-form">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">{{ trans('site.edit') }} {{$station->name . "'s"}}</h3>
                    </div>
                    <!-- /.card-header -->
                        <!-- form start -->
                        <form action="{{route('stations.update', ['id' => $station->id])}}" method="POST"  enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="card-body">
                                <!-- Name -->
                                <div class="form-group">
                                    <label for="name">{{ trans('site.name') }}</label>
                                    <input class="form-control" type="text" id="name" name="name"
                                    value="{{$station->name}}" placeholder="{{trans('site.admin_enter_name')}}">
                                </div>

                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary btn-crayons btn-update">{{ trans('site.update') }}</button>
                            </div>
                        </form>

                    </div>
            <!-- /.card -->
            </div>
        </div>
    </div>
</div>
@endsection
