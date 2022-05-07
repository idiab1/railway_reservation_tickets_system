@extends('layouts.admin.app')

{{-- Title --}}
@section('title')
    {{ trans('site.edit') }} {{$user->name . "'s"}}
@endsection

{{-- Styles --}}
@section('styles')
    {{-- <style>
        .content-wrapper {
            background-color: #b8405e;
            background-image: url("../../../images/add-user.svg");
            background-position: bottom;
            background-size: contain;
            background-repeat: no-repeat;
        }
    </style> --}}
@endsection

{{-- Page name --}}
@section('page_name')
    {{ trans('site.edit') }} {{$user->name . "'s"}}
@endsection

{{-- Breadcrumb --}}
@section('breadcrumb-item')
    <li class="breadcrumb-item"><a href="{{route('users.index')}}">{{ trans('site.users') }}</a></li>
    <li class="breadcrumb-item">{{ trans('site.edit') }} {{$user->name . "'s"}}<li>
@endsection

{{-- Content --}}
@section('content')
<section class="users-section section">
    <div class="row">
        <div class="col-md-10 m-auto">
            <!-- form container -->
            <div class="form-container">
                <div class="row">
                    <div class="col-md-6 p-0">
                        <!-- users form -->
                        <div class="users-form section-form">
                            <div class="card">
                                
                                    <!-- form start -->
                                    <form action="{{route('passengers.update', ['id' => $user->id])}}" method="POST"  enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')
                                        <div class="card-body">
                                            {{-- <!-- image -->
                                            <div class="form-group">
                                                <div class="image-preview text-center">
                                                    <img class="preview rounded-circle border border-dark"
                                                    src="{{asset('uploads/users/' . Auth::user()->profile->image)}}"
                                                    alt="user image" width="60" height="60">
                                                </div>
                                                <label for="image">{{ trans('site.image') }}</label>
                                                <input class="form-control image" type="file" id="image" name="image">
                                            </div> --}}

                                            <!-- Name -->
                                            <div class="form-group">
                                                <label for="name">{{ trans('site.name') }}</label>
                                                <input class="form-control" type="text" id="name" name="name"
                                                value="{{$user->name}}" placeholder="{{trans('site.admin_enter_name')}}" 
                                                required>
                                            </div>

                                            <!-- Email -->
                                            <div class="form-group">
                                                <label for="email">{{ trans('site.email') }}</label>
                                                <input class="form-control" type="email" id="email" name="email"
                                                value="{{$user->email}}" placeholder="{{trans('site.admin_enter_email')}}" 
                                                required>
                                            </div>

                                            <!-- Password -->
                                            <div class="form-group">
                                                <label for="password">{{ trans('site.password') }}</label>
                                                <input class="form-control" type="password" id="password"
                                                name="password" placeholder="{{trans('site.admin_enter_password')}}" 
                                                required>
                                            </div>

                                            <!-- Confrim Password -->
                                            <div class="form-group mb-0">
                                                <label for="confirmPassword">{{ trans('site.confirm_password') }}</label>
                                                <input class="form-control" type="password" id="confirmPassword"
                                                name="password_confirmation" placeholder="{{trans('site.admin_confirm_password')}}" 
                                                required>
                                            </div>

                                            {{-- <!-- Facebook -->
                                            <div class="form-group">
                                                <label for="facebook">Facebook URL</label>
                                                <input class="form-control" type="text" id="facebook"
                                                name="facebook" placeholder="ex: http://www.facebook.com/username"
                                                value="{{$user->profile->facebook}}">
                                            </div>

                                            <!-- twitter -->
                                            <div class="form-group">
                                                <label for="twitter">Twitter URL</label>
                                                <input class="form-control" type="text" id="twitter"
                                                name="twitter" placeholder="ex: http://www.twitter.com/username"
                                                value="{{$user->profile->twitter}}">
                                            </div>
                                            <!-- linkedin -->
                                            <div class="form-group">
                                                <label for="linkedin">Linkedin URL</label>
                                                <input class="form-control" type="text" id="linkedin"
                                                name="linkedin" placeholder="ex: http://www.linkedin.com/username"
                                                value="{{$user->profile->linkedin}}">
                                            </div>

                                            <!-- about -->
                                            <div class="form-group mb-0">
                                                <label for="about">{{ trans('site.about') }}</label>
                                                <textarea class="form-control" name="about" id="about" cols="30"
                                                rows="10" placeholder="{{trans('site.admin_about_here')}}">{{$user->profile->about}}</textarea>
                                            </div> --}}

                                        </div>
                                        <!-- /.card-body -->

                                        <div class="card-footer">
                                            <button type="submit" class="btn btn-primary btn-crayons btn-update">
                                                {{ trans('site.update') }}
                                            </button>
                                        </div>
                                    </form>

                                </div>
                        <!-- /.card -->
                        </div>
                        <!-- End of Stations form -->
                    </div>
                    <div class="col-md-6 p-0">
                        <!-- user Info -->
                        <div class="user-info section-info">
                            <div class="card">
                                <div class="card-body"></div>
                            </div>
                        </div>
                        <!-- End of user Info -->
                    </div>
                </div>
                {{-- <div class="row">
                    <div class="col-12">
                        
                    </div>
                </div> --}}
            </div>
            <!-- End of form container -->

        </div>
    </div>
</section>
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
