@extends('layouts.admin.app')

{{-- Title --}}
@section('title')
    {{ trans('site.add_station') }}
@endsection

{{-- Page name --}}
@section('page_name')
    {{ trans('site.add_station') }}
@endsection

{{-- Breadcrumb --}}
@section('breadcrumb-item')
    <li class="breadcrumb-item"><a href="{{route('stations.index')}}">{{ trans('site.stations') }}</a></li>
    <li class="breadcrumb-item">{{ trans('site.add_station') }}<li>
@endsection

{{-- Content --}}
@section('content')
<div class="stations-page">
    <div class="row">
        <div class="col-md-8 m-auto">
            <div class="stations-form">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">{{ trans('site.add_station') }}</h3>
                    </div>
                    <!-- /.card-header -->
                        <!-- form start -->
                        <form action="{{route('stations.store')}}" method="POST">
                            @csrf
                            <div class="card-body">
                                <!-- Name -->
                                <div class="form-group">
                                    <label for="name">{{ trans('site.name') }}</label>
                                    <input class="form-control" type="text" id="name"
                                            name="name" placeholder="{{trans('site.enter_name_station')}}">
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
<script>
    $(document).ready(function(){

        // Image Preview
        $('.image').change(function(){
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
