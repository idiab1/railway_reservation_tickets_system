@extends('layouts.admin.app')

{{-- Title --}}
@section('title')
    {{ trans('site.edit') }} {{$train->name . "'s"}}
@endsection

{{-- Styles --}}
@section('styles')

    <!-- Select2 -->
    <link rel="stylesheet" href="{{asset('plugins/select2/css/select2.min.css')}}">
    <style>
        .select2-container .select2-selection--single {
            height: auto;
        }

    </style>
@endsection

{{-- Page name --}}
@section('page_name')
    {{ trans('site.edit') }} {{$train->name . "'s"}}
@endsection

{{-- Breadcrumb --}}
@section('breadcrumb-item')
    <li class="breadcrumb-item"><a href="{{route('trains.index')}}">{{ trans('site.trains') }}</a></li>
    <li class="breadcrumb-item">{{ trans('site.edit') }} {{$train->name . "'s"}}<li>
@endsection

{{-- Content --}}
@section('content')
<section class="trains-section section">
    <div class="row">
        <div class="col-md-10 m-auto">

            <!-- form container -->
            <div class="form-container">
                <div class="row">
                    <div class="col-md-7 p-0">
                        <!-- Stations form -->
                        <div class="train-form section-form">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">{{ trans('site.edit') }} {{$train->name . "'s"}}</h3>
                                </div>
                                <!-- /.card-header -->
                                    <!-- form start -->
                                    <form action="{{route('trains.update', ['id' => $train->id])}}" method="POST"  enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')
                                        <div class="card-body">
                                            <!-- Name -->
                                            <div class="form-group">
                                                <label for="name">{{ trans('site.name') }}</label>
                                                <input class="form-control" type="text" id="name" name="name"
                                                value="{{$train->name}}" placeholder="{{trans('site.admin_enter_name')}}">
                                            </div>

                                            <!-- Train Type -->
                                            <div class="form-group">
                                                <label for="type_id">{{ trans('site.train_type') }}</label>
                                                <!-- All types -->
                                                <select class="form-control select2 searchable" name="type_id"
                                                    id="type_id" required>
                                                    <option value="0" >{{trans('site.all_types')}}</option>
                                                    @foreach ($types as $type)
                                                        <option value="{{$type->id}}"
                                                            {{$train->type->id == $type->id ? "selected" : " "}}>
                                                            {{$type->name}}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>

                                            <!-- Train Type / Seats Count -->
                                            <div class="form-group">
                                                <div class="row">

                                                    <!-- Seats available -->
                                                    <div class="col">
                                                        <label for="seats_available">{{ trans('site.seats_available') }}</label>
                                                        <input type="number" class="form-control" id="seats_available" name="seats_count"
                                                            value="{{$train->seats_count}}" placeholder="{{trans('site.enter_seats_available_train')}}"
                                                            required>
                                                    </div>
                                                    <!-- End of Seats available -->

                                                    <!-- Train price -->
                                                    <div class="col">
                                                        <label for="price">{{ trans('site.train_price') }}</label>
                                                        <input type="number" class="form-control" id="price"
                                                            name="price" placeholder="{{trans('site.enter_train_price')}}"
                                                            value="{{$train->price}}" required>
                                                    </div>
                                                    <!-- End of Train price -->

                                                </div>
                                            </div>

                                            <!-- Depature Station / Time -->
                                            <div class="form-group">
                                                <div class="row">
                                                    <div class="col">
                                                        <label for="depature_station">{{ trans('site.depature_station') }}</label>
                                                        <!-- All stations -->
                                                        <select class="form-control select2 searchable" name="depature_station_id"
                                                            id="depature_station" required>
                                                            <option value="" >{{trans('site.all_stations')}}</option>
                                                            @foreach ($stations as $station)
                                                                <option value="{{$station->id}}"
                                                                    {{$station->id == $train->stations[0]->id ? 'selected' : ' '}}>
                                                                    {{$station->name}}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="col">
                                                        <label for="depature_at">{{ trans('site.depature_at') }}</label>
                                                        <input class="form-control" type="datetime-local" id="depature_at"
                                                            value="{{$train->depature_at->format('Y-m-d\TH:i')}}" name="depature_at" required>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Arrival Station / Time -->
                                            <div class="form-group mb-0">
                                                <div class="row">
                                                    <div class="col">
                                                        <label for="arrival_station">{{ trans('site.arrival_station') }}</label>
                                                        <!-- All stations -->
                                                        <select class="form-control select2 searchable" name="arrival_station_id"
                                                            id="arrival_station" required>
                                                            <option value="" >{{trans('site.all_stations')}}</option>
                                                            @foreach ($stations as $station)
                                                                <option value="{{$station->id}}"
                                                                    {{$station->id == $train->stations[1]->id ? 'selected' : ' '}}>
                                                                    {{$station->name}}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="col">
                                                        <label for="arrival_at">{{ trans('site.arrival_at') }}</label>
                                                        <input class="form-control" type="datetime-local" id="arrival_at"
                                                            value="{{$train->arrival_at->format('Y-m-d\TH:i')}}" name="arrival_at" required>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                        <!-- /.card-body -->

                                        <!-- Card Footer -->
                                        <div class="card-footer">
                                            <button type="submit" class="btn btn-primary btn-crayons btn-update">
                                                {{ trans('site.update') }}
                                            </button>
                                        </div>
                                        <!-- End of Card Footer -->
                                    </form>

                                </div>
                        <!-- /.card -->
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

@section('scripts')
<!-- Select 2 -->
<script src="{{asset('plugins/select2/js/select2.min.js')}}"></script>
<script>
    $(document).ready(function(){
        $('.select2').select2();
    });
</script>
@endsection
