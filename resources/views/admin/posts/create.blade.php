@extends('layouts.admin.app')

{{-- Title --}}
@section('title')
    {{ trans('site.add_post') }}
@endsection

{{-- Page name --}}
@section('page_name')
    {{ trans('site.add_post') }}
@endsection

{{-- Breadcrumb --}}
@section('breadcrumb-item')
    <li class="breadcrumb-item"><a href="{{route('posts.index')}}">{{ trans('site.posts') }}</a></li>
    <li class="breadcrumb-item">{{ trans('site.add_post') }}<li>
@endsection

{{-- Content --}}
@section('content')
<div class="posts-page">
    <div class="row">
        <div class="col-md-8 m-auto">
            <div class="posts-form">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">{{ trans('site.add_post') }}</h3>
                    </div>
                    <!-- /.card-header -->
                        <!-- form start -->
                        <form action="{{route('posts.store')}}" method="POST">
                            @csrf
                            <div class="card-body">
                                <!-- Name -->
                                <div class="form-group">
                                    <label for="name">{{ trans('site.name') }}</label>
                                    <input class="form-control" type="text" id="name"
                                            name="name" placeholder="{{trans('site.enter_name_post')}}">
                                </div>

                                <!-- Content -->
                                <div class="form-group">
                                    <label for="content">{{ trans('site.content') }}</label>
                                    <textarea class="form-control ckeditor" name="content" id="content"
                                            placeholder="{{trans('site.enter_content_post')}}"></textarea>
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

<!--ckeditor standard-->
<script src="{{ asset('plugins/ckeditor/ckeditor.js') }}"></script>

<script>
    $(document).ready(function(){
        CKEDITOR.config.language = "{{app()->getLocale()}}";
    });
</script>
@endsection
