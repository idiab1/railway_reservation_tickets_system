@extends('layouts.admin.app')

{{-- Title --}}
@section('title')
    {{ trans('site.edit') }} {{$train->name . "'s"}}
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
<div class="trains-page">
    <div class="row">
        <div class="col-md-8 m-auto">
            <div class="train-form">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">{{ trans('site.edit') }} {{$train->name . "'s"}}</h3>
                    </div>
                    <!-- /.card-header -->
                        <!-- form start -->
                        <form action="{{route('stations.update', ['id' => $train->id])}}" method="POST"  enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="card-body">
                                <!-- Name -->
                                <div class="form-group">
                                    <label for="name">{{ trans('site.name') }}</label>
                                    <input class="form-control" type="text" id="name" name="name"
                                    value="{{$train->name}}" placeholder="{{trans('site.admin_enter_name')}}">
                                </div>

                                <!-- Train Type / Seats Count -->
                                <div class="form-group">
                                    <div class="row">

                                        <!-- Train Type -->
                                        <div class="col">
                                            <label for="train_type">{{ trans('site.train_type') }}</label>
                                            <input class="form-control" type="text" id="train_type" name="train_type"
                                                value="{{$train->train_type}}" placeholder="{{trans('site.enter_name_type')}}"
                                                required>
                                        </div>
                                        <!-- End of Train Type -->

                                        <!-- Seats available -->
                                        <div class="col">
                                            <label for="seats_available">{{ trans('site.seats_available') }}</label>
                                            <input type="number" class="form-control" id="seats_available" name="seats_count"
                                                value="{{$train->seats_count}}" placeholder="{{trans('site.enter_seats_available_train')}}"
                                                required>
                                        </div>
                                        <!-- End of Seats available -->
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
                                <div class="form-group">
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
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    $(document).ready(function(){

        // Image Preview
        $('.avatar').change(function(){
            if(this.files && this.files[0]){

                let reader = new FileReader();

                reader.onload = function(e){

                    $('.preview').attr('src', e.target.result);

                }
                reader.readAsDataURL(this.files[0]);

            }
        })

    });
</script>
@endsection
