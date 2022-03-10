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
<section class="stations-section section">
    <div class="row">
        <div class="col-md-8 m-auto">

            <!-- form container -->
            <div class="form-container">
                <div class="row">
                    <div class="col-md-7 p-0">
                        <!-- Stations form -->
                        <div class="stations-form section-form">
                            <!-- Card -->
                            <div class="card">
                                <!-- Card header -->
                                <div class="card-header">
                                    <h3 class="card-title">
                                        {{ trans('site.edit') }} {{$station->name . "'s"}}
                                    </h3>
                                </div>
                                <!-- End of card header -->
                                <!-- form -->
                                <form action="{{route('stations.update', ['id' => $station->id])}}" method="POST"  enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="card-body">
                                        <!-- Name -->
                                        <div class="form-group m-0">
                                            <label for="name">{{ trans('site.name') }}</label>
                                            <input class="form-control" type="text" id="name" name="name"
                                            value="{{$station->name}}" placeholder="{{trans('site.admin_enter_name')}}">
                                        </div>

                                    </div>
                                    <!-- /.card-body -->

                                    <div class="card-footer">
                                        <button type="submit" class="btn btn-primary btn-add btn-crayons">
                                            {{ trans('site.update') }}
                                        </button>
                                    </div>
                                </form>
                                <!-- End of form -->

                            </div>
                            <!-- End of card -->
                        </div>
                        <!-- End of Stations form -->
                    </div>
                    <div class="col-md-5 p-0">
                        <!-- Stations Info -->
                        <div class="station-info section-info">
                            <div class="card">
                                <div class="card-body"></div>
                            </div>
                        </div>
                        <!-- End of Stations Info -->
                    </div>
                </div>
            </div>
            <!-- End of form container -->
        </div>
    </div>
</section>
@endsection
