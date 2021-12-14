@extends('layouts.app')

{{-- Title --}}
@section('title')
    Edit {{$user->name . "'s"}}
@endsection

{{-- Header --}}
@section('header')

@endsection

{{-- Content --}}
@section('content')
<div class="profile-setting-page">
    <div class="row">
        <div class="col-sm-8 m-auto">
            <div class="setting-form">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="h1 card-title">Edit {{$user->name . "'s"}}</h3>
                    </div>
                    <!-- /.card-header -->
                        <!-- form start -->
                        <form action="{{route('profile.update', ['id' => $user->id])}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="card-body">
                                <!-- image -->
                                <div class="form-group">
                                    {{-- <div class="image-preview text-center">
                                        <img class="preview rounded-circle border border-dark"
                                        src="{{asset('uploads/users/' . Auth::user()->profile->image)}}"
                                        alt="user image" width="60" height="60">
                                    </div>
                                    <label for="image">Image</label>
                                    <input class="form-control image" type="file" id="image" name="image">
                                    --}}

                                    {{-- <div class="avatar-item text-center">
                                        <img class="img-fluid preview rounded-circle border border-dark"
                                        src="{{asset('uploads/users/' . Auth::user()->profile->image)}}" alt="image"
                                        data-toggle="tooltip" title="" data-original-title="{{$user->name}}" width="60" height="60">
                                        <div class="avatar-badge" title="" data-toggle="tooltip" data-original-title="Admin">
                                            <i class="fas fa-cog"></i>
                                            <input class="form-control image" type="file" id="image" name="image">

                                        </div>
                                    </div> --}}

                                </div>

                                <!-- Name -->
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <!-- Input group -->
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <!-- Input Icon -->
                                            <span class="input-group-text" id="name">
                                                <i class="mdi mdi-account-outline"></i>
                                            </span>
                                        </div>
                                        <!-- Input -->
                                        <input class="form-control" type="text" id="name"
                                            name="name" placeholder="{{trans('site.name')}}"
                                            value="{{$user->name}}" aria-describedby="name" aria-label="name" >
                                    </div>
                                </div>

                                <!-- Email -->
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <!-- Input group -->
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <!-- Input Icon -->
                                            <span class="input-group-text" id="email">
                                                <i class="mdi mdi-email"></i>
                                            </span>
                                        </div>
                                        <!-- Input -->
                                        <input class="form-control" type="email" id="email"
                                        name="email" placeholder="{{trans('site.type_email')}}"
                                        value="{{$user->email}}" aria-describedby="email" aria-label="email" >
                                    </div>

                                </div>

                                <div class="row">
                                    <div class="col">
                                        <!-- Password -->
                                        <div class="form-group">
                                            <label for="password">Password</label>
                                            <input class="form-control" type="password" id="password"
                                            name="password" placeholder="Enter Your Password">
                                        </div>
                                    </div>
                                    <div class="col">
                                        <!-- Confirm Password -->
                                        <div class="form-group">
                                            <label for="confirmPassword">Confirm Password</label>
                                            <input class="form-control" type="password" id="confirmPassword"
                                            name="password_confirmation" placeholder="Confirm password ">
                                        </div>
                                    </div>
                                </div>

                                <!-- Facebook -->
                                <div class="form-group">
                                    <label for="facebook">Facebook URL</label>
                                    <!-- Input Group -->
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <!-- Input icon -->
                                            <span class="input-group-text" id="facebook">
                                                <i class="mdi mdi-facebook"></i>
                                            </span>
                                        </div>
                                        <!-- Input -->
                                        <input class="form-control" type="text" id="facebook"
                                        name="facebook" placeholder="ex: http://www.facebook.com/username"
                                        value="{{$user->profile->facebook}}" aria-describedby="facebook" aria-label="facebook" >
                                    </div>
                                </div>

                                <!-- twitter -->
                                <div class="form-group">
                                    <label for="twitter">Twitter URL</label>
                                    <!-- Input Group -->
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <!-- Input icon -->
                                            <span class="input-group-text" id="twitter">
                                                <i class="mdi mdi-twitter"></i>
                                            </span>
                                        </div>
                                        <!-- Input -->
                                        <input class="form-control" type="text" id="twitter"
                                        name="twitter" placeholder="ex: http://www.twitter.com/username"
                                        value="{{$user->profile->twitter}}" aria-describedby="twitter" aria-label="twitter" >
                                    </div>

                                </div>
                                <!-- linkedin -->
                                <div class="form-group">
                                    <label for="linkedin">Linkedin URL</label>
                                    <!-- Input Group -->
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <!-- Input icon -->
                                            <span class="input-group-text" id="linkedin">
                                                <i class="mdi mdi-linkedin"></i>
                                            </span>
                                        </div>
                                        <!-- Input -->
                                        <input class="form-control" type="text" id="linkedin"
                                        name="linkedin" placeholder="ex: http://www.linkedin.com/username"
                                        value="{{$user->profile->linkedin}}" aria-describedby="linkedin" aria-label="linkedin" >
                                    </div>

                                </div>

                                <!-- about -->
                                <div class="form-group">
                                    <label for="about">About</label>
                                    <textarea class="form-control" name="about" id="about" cols="30"
                                    rows="10" placeholder="About Here">{{$user->profile->about}}</textarea>
                                </div>
                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer {{app()->getLocale() == "ar" ? "text-left" : "text-right" }}">
                                <button type="submit" class="btn btn-primary crayons-btn">
                                    Edit
                                </button>
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
