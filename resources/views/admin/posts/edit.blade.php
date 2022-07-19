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
<section class="post-section section">
    <div class="row">
        <div class="col-md-8 m-auto">
            <!-- Form Container -->
            <div class="form-container">
                <div class="row">
                    <div class="col-md-7 p-0">
                        <!-- posts form -->
                        <div class="posts-form section-form">
                            <!-- Card -->
                            <div class="card">
                                <!-- Card Header -->
                                <div class="card-header">
                                    <h3 class="card-title">{{ trans('site.add_post') }}</h3>
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
                                        <div class="form-group mb-0">
                                            <label for="content">{{ trans('site.content') }}</label>
                                            <textarea class="form-control" name="content" id="content"
                                                placeholder="{{trans('site.enter_name_post')}}">
                                                {!! $post->content !!}
                                            </textarea>
                                        </div>

                                    </div>
                                    <!-- /.card-body -->

                                    <div class="card-footer">
                                        <button type="submit" class="btn btn-primary btn-crayons btn-update">{{ trans('site.update') }}</button>
                                    </div>
                                </form>
                                <!-- ./form -->
                            </div>
                            <!-- End of card -->
                        </div>
                        <!-- End of posts form -->
                    </div>
                    <div class="col-md-5 p-0">
                        <!-- posts Info -->
                        <div class="station-info section-info">
                            <div class="card">
                                <div class="card-body"></div>
                            </div>
                        </div>
                        <!-- End of posts Info -->
                    </div>
                </div>
            </div>
            <!-- End of Form Container -->
        </div>
    </div>
</section>
@endsection
