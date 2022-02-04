@extends('layouts.admin.app')

{{-- Title --}}
@section('title')
    {{ trans('site.add_class') }}
@endsection

{{-- Page name --}}
@section('page_name')
    {{ trans('site.add_class') }}
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

{{-- Breadcrumb --}}
@section('breadcrumb-item')
    <li class="breadcrumb-item"><a href="{{route('classes.index')}}">{{ trans('site.classes') }}</a></li>
    <li class="breadcrumb-item">{{ trans('site.add_class') }}<li>
@endsection

{{-- Content --}}
@section('content')
<div class="classes-page">
    <div class="row">
        <div class="col-md-8 m-auto">
            <div class="classes-form">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">{{ trans('site.add_class') }}</h3>
                    </div>
                    <!-- /.card-header -->
                        <!-- form start -->
                        <form action="{{route('trains.classes.store', ['id' => $train->id])}}" method="POST">
                            @csrf
                            <div class="card-body">

                                <input type="number" class="form-control" id="train_id" name="train_id"
                                        value="{{$train->id}}" hidden>
                                <!-- Name -->
                                <div class="form-group">
                                    <label for="class_name">{{ trans('site.class_name') }}</label>
                                    <input type="text" class="form-control" id="class_name" name="class_name"
                                            placeholder="{{trans('site.enter_name_class')}}" required>
                                </div>
                                <!-- Price -->
                                <div class="form-group">
                                    <label for="class_price">{{ trans('site.class_price') }}</label>
                                    <input type="text" class="form-control" id="class_price" name="class_price"
                                            placeholder="{{trans('site.enter_price_class')}}" required>
                                </div>

                                <!-- Count of seats -->
                                <div class="form-group">
                                    <label for="seats_count">{{ trans('site.seats_count') }}</label>
                                    <input type="number" class="form-control" id="seats_count" name="seats_count"
                                            placeholder="{{trans('site.enter_seats_count')}}" required>
                                </div>



                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary btn-add btn-crayons">{{ trans('site.add') }}</button>
                            </div>
                        </form>

                    </div>
            <!-- /.card -->
            </div>
        </div>
    </div>
</div>
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
