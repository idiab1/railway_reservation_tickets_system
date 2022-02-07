@extends('layouts.admin.app')

{{-- Title --}}
@section('title')
    {{ trans('site.edit') }} {{$post->name . "'s"}}
@endsection

{{-- Page name --}}
@section('page_name')
    {{ trans('site.edit') }} {{$post->name . "'s"}}
@endsection

{{-- Breadcrumb --}}
@section('breadcrumb-item')
    <li class="breadcrumb-item"><a href="{{route('posts.index')}}">{{ trans('site.posts') }}</a></li>
    <li class="breadcrumb-item">{{ trans('site.edit') }} {{$post->name . "'s"}}<li>
@endsection

{{-- Content --}}
@section('content')
<div class="posts-page">
    <div class="row">
        <div class="col-md-8 m-auto">
            <div class="posts-form">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">{{ trans('site.edit') }} {{$post->name . "'s"}}</h3>
                    </div>
                    <!-- /.card-header -->
                        <!-- form start -->
                        <form action="{{route('posts.update', ['id' => $post->id])}}" method="POST"  enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="card-body">
                                <!-- Name -->
                                <div class="form-group">
                                    <label for="name">{{ trans('site.name') }}</label>
                                    <input class="form-control" type="text" id="name" name="name"
                                    value="{{$post->name}}" placeholder="{{trans('site.enter_name_post')}}">
                                </div>

                                <!-- Content -->
                                <div class="form-group">
                                    <label for="content">{{ trans('site.content') }}</label>
                                    <textarea class="form-control ckeditor" name="content" id="content"
                                        placeholder="{{trans('site.enter_name_post')}}">
                                        {{$post->content}}
                                    </textarea>
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

@section('scripts')
<!--ckeditor standard-->
<script src="{{ asset('plugins/ckeditor/ckeditor.js') }}"></script>

<script>
    $(document).ready(function(){
        CKEDITOR.config.language = "{{app()->getLocale()}}";
    });
</script>
@endsection
