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
                                <form action="{{route('posts.store')}}" method="POST" enctype="multipart/form-data">
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
                                            <textarea class="form-control" name="content" id="content"
                                                    placeholder="{{trans('site.enter_content_post')}}"></textarea>
                                        </div>

                                        <!-- image -->
                                        <div class="form-group mb-0">
                                            <!-- post Upload -->
                                            <div class="post-upload">
                                                <!-- post Edit -->
                                                <div class="post-edit">
                                                    <input type='file' id="imageUpload" name="image" accept=".png, .jpg, .jpeg" />
                                                    <label for="imageUpload">
                                                        <i class="fas fa-pen"></i>
                                                    </label>
                                                </div>
                                                <!-- post Preview -->
                                                <div class="post-preview">
                                                    <div id="imagePreview" style="background-color: #ececec;">
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- End of post Upload -->
                                        </div>

                                    </div>
                                    <!-- /.card-body -->

                                    <div class="card-footer">
                                        <button type="submit" class="btn btn-primary btn-add btn-crayons">
                                            {{ trans('site.add') }}
                                        </button>
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

{{-- Scripts --}}
@section('scripts')
<script>
    $(document).ready(function(){
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#imagePreview').css('background-image', 'url('+e.target.result +')');
                    $('#imagePreview').hide();
                    $('#imagePreview').fadeIn(650);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
        $("#imageUpload").change(function() {
            readURL(this);
        });
    });
</script>
@endsection
