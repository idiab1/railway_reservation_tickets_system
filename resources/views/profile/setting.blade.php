@extends('layouts.app')

{{-- Title --}}
@section('title')
    Edit {{$user->name . "'s"}}
@endsection

{{-- Styles --}}
@section('other-styles')

    <link rel="stylesheet" href="{{asset('plugins/cropper/css/cropper.min.css')}}">

    <style>
        .avatar-upload{
            position: relative;
            max-width: 205px;
            margin: 50px auto;
        }
        .avatar-upload .avatar-edit{
            position: absolute;
            right: 0px;
            z-index: 1;
            top: calc((100%/2) - 17px);
        }
        .avatar-upload .avatar-edit input{
            display: none;
        }
        .avatar-upload .avatar-edit label{
            display: inline-block;
            width: 35px;
            height: 35px;
            text-align: center;
            line-height: 35px;
            margin-bottom: 0;
            border-radius: 100%;
            background-color: #343a40;
            color: #eee;
            border: 1px solid transparent;
            box-shadow: 0px 2px 4px 0px rgba(0, 0, 0, 0.12);
            cursor: pointer;
            font-weight: normal;
            transition: all .2s ease-in-out;
        }
        /* .avatar-upload .avatar-edit label:hover{
            background: #f1f1f1;
            border-color: #d6d6d6;
        } */
        /* .avatar-upload .avatar-edit label::after{
            content: "\f040";
            font-family: 'FontAwesome';
            color: #757575;
            position: absolute;
            top: 10px;
            left: 0;
            right: 0;
            text-align: center;
            margin: auto;
        } */
        .avatar-preview {
            width: 192px;
            height: 192px;
            position: relative;
            border-radius: 100%;
            border: 6px solid #F8F8F8;
            box-shadow: 0px 2px 4px 0px rgba(0, 0, 0, 0.1);

        }
        .avatar-preview > div {
                width: 100%;
                height: 100%;
                border-radius: 100%;
                background-size: cover;
                background-repeat: no-repeat;
                background-position: center;
            }

        /* .avatar-upload {
            position: relative;
            max-width: 205px;
            margin: 50px auto;
        .avatar-edit {
            position: absolute;
            right: 12px;
            z-index: 1;
            top: 10px;
            input {
                display: none;
                + label {
                    display: inline-block;
                    width: 34px;
                    height: 34px;
                    margin-bottom: 0;
                    border-radius: 100%;
                    background: #FFFFFF;
                    border: 1px solid transparent;
                    box-shadow: 0px 2px 4px 0px rgba(0, 0, 0, 0.12);
                    cursor: pointer;
                    font-weight: normal;
                    transition: all .2s ease-in-out;
                    &:hover {
                        background: #f1f1f1;
                        border-color: #d6d6d6;
                    }
                    &:after {
                        content: "\f040";
                        font-family: 'FontAwesome';
                        color: #757575;
                        position: absolute;
                        top: 10px;
                        left: 0;
                        right: 0;
                        text-align: center;
                        margin: auto;
                    }
                }
            }
        }
        .avatar-preview {
            width: 192px;
            height: 192px;
            position: relative;
            border-radius: 100%;
            border: 6px solid #F8F8F8;
            box-shadow: 0px 2px 4px 0px rgba(0, 0, 0, 0.1);
            > div {
                width: 100%;
                height: 100%;
                border-radius: 100%;
                background-size: cover;
                background-repeat: no-repeat;
                background-position: center;
            }
        } */
    }
    </style>
@endsection

{{-- Header --}}
@section('header')

@endsection

{{-- Content --}}
@section('content')
<section class="profile-setting-page section">
    <div class="container-fluid">

        <!-- Setting page header -->
        <div class="page-header setting-page-header text-center">
            <div class="row">
                <div class="col-12">
                    <div class="header-info">
                        <h2 class="heading m-0">Account Settings</h2>
                        <p class="m-0">Change your profile and account settings</p>
                    </div>
                </div>
            </div>
        </div>
        <!-- End of setting page header -->

        <!-- Setting info -->
        <div class="setting-info">
            <div class="row">
                <div class="col-4">
                    <!-- Tab links -->
                    <div class="nav flex-column nav-pills bg-dark" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                        <!-- avatar link -->
                        <a class="nav-link active" id="v-pills-avatar-tab" data-toggle="pill"
                            href="#v-pills-avatar" role="tab" aria-controls="v-pills-avatar"
                            aria-selected="true">
                            <div class="icon mr-1 d-inline-block">
                                <i class="mdi mdi-image-edit-outline"></i>
                            </div>
                            Change your Avatar
                        </a>
                        <!-- End of avatar link -->

                        <!-- account link -->
                        <a class="nav-link" id="v-pills-account-tab" data-toggle="pill"
                            href="#v-pills-account" role="tab" aria-controls="v-pills-account"
                            aria-selected="false">
                            <div class="icon mr-1 d-inline-block">
                                <i class="mdi mdi-account-settings"></i>
                            </div>
                            Account Info
                        </a>
                        <!-- End of account link -->

                        <!-- passowrd link -->
                        <a class="nav-link" id="v-pills-password-tab" data-toggle="pill"
                            href="#v-pills-password" role="tab" aria-controls="v-pills-password"
                            aria-selected="false">
                            <div class="icon mr-1 d-inline-block">
                                <i class="mdi mdi-lock"></i>
                            </div>
                            Change your Password
                        </a>
                        <!-- End of passowrd link -->

                        <!-- Social Media links -->
                        <a class="nav-link" id="v-pills-social-media-tab" data-toggle="pill"
                            href="#v-pills-social-media" role="tab" aria-controls="v-pills-social-media"
                            aria-selected="false">
                            <div class="icon mr-1 d-inline-block">
                                <i class="mdi mdi-cellphone-cog"></i>
                            </div>
                            Social Media links
                        </a>
                        <!-- End of Social Media links -->

                        <!-- bio Link -->
                        <a class="nav-link" id="v-pills-bio-tab" data-toggle="pill"
                            href="#v-pills-bio" role="tab" aria-controls="v-pills-bio"
                            aria-selected="false">
                            <div class="icon mr-1 d-inline-block">
                                <i class="mdi mdi-text-account"></i>
                            </div>
                            Change your bio
                        </a>
                        <!-- End of bio Link -->
                    </div>
                    <!-- End of tab links -->
                </div>
                <div class="col-8">
                    <!-- Tab Content -->
                    <div class="tab-content" id="v-pills-tabContent">

                        <!-- Change your avatar -->
                        <div class="tab-pane fade show active" id="v-pills-avatar" role="tabpanel"
                            aria-labelledby="v-pills-avatar-tab">
                            <div class="setting-form section-form">
                                <div class="card card-primary">
                                    <!-- Card header -->
                                    <div class="card-header">
                                        <h5 class="title">
                                            Change your Avatar
                                        </h5>
                                    </div>
                                    <!-- End of card header -->
                                    <!-- form -->
                                    <form action="{{route('profile.update', ['id' => $user->id])}}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')
                                        <div class="card-body">
                                            <!-- image -->
                                            <div class="form-group">
                                                <div class="avatar-upload">
                                                    <div class="avatar-edit">
                                                        <input type='file' id="imageUpload" name="image" accept=".png, .jpg, .jpeg" />
                                                        <label for="imageUpload">
                                                            <i class="mdi mdi-pencil"></i>
                                                        </label>
                                                    </div>
                                                    <div class="avatar-preview">
                                                        <div id="imagePreview" style="background-image: url({{asset('uploads/users/' . Auth::user()->profile->image)}});">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- /.card-body -->

                                        <div class="card-footer {{app()->getLocale() == "ar" ? "text-left" : "text-right" }}">
                                            <button type="submit" class="btn btn-primary crayons-btn">
                                                Edit
                                            </button>
                                        </div>
                                    </form>
                                    <!-- End of form -->
                                </div>
                            <!-- /.card -->
                            </div>
                        </div>
                        <!-- End of change your avatar -->

                        <!-- Account Info -->
                        <div class="tab-pane fade" id="v-pills-account" role="tabpanel"
                            aria-labelledby="v-pills-account-tab">
                            <div class="setting-form section-form">
                                <div class="card card-primary">
                                    <!-- Card header -->
                                    <div class="card-header">
                                        <h5 class="title">
                                            Account info
                                        </h5>
                                    </div>
                                    <!-- End of card header -->
                                    <!-- form -->
                                    <form action="{{route('profile.update', ['id' => $user->id])}}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')
                                        <div class="card-body">

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
                                        </div>
                                        <!-- /.card-body -->

                                        <div class="card-footer {{app()->getLocale() == "ar" ? "text-left" : "text-right" }}">
                                            <button type="submit" class="btn btn-primary crayons-btn">
                                                Edit
                                            </button>
                                        </div>
                                    </form>
                                    <!-- End of form -->
                                </div>
                            <!-- /.card -->
                            </div>
                        </div>
                        <!-- End of Account Info -->

                        <!-- Change password -->
                        <div class="tab-pane fade" id="v-pills-password" role="tabpanel"
                            aria-labelledby="v-pills-password-tab">
                            <div class="setting-form section-form">
                                <div class="card card-primary">
                                    <!-- Card header -->
                                    <div class="card-header">
                                        <h5 class="title">
                                            Change your password
                                        </h5>
                                    </div>
                                    <!-- End of card header -->
                                    <!-- form -->
                                    <form action="{{route('profile.update', ['id' => $user->id])}}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')
                                        <div class="card-body">

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
                                        </div>
                                        <!-- /.card-body -->

                                        <div class="card-footer {{app()->getLocale() == "ar" ? "text-left" : "text-right" }}">
                                            <button type="submit" class="btn btn-primary crayons-btn">
                                                Edit
                                            </button>
                                        </div>
                                    </form>
                                    <!-- End of form -->
                                </div>
                            <!-- /.card -->
                            </div>
                        </div>
                        <!-- End of Change password -->

                        <!-- Social Media links --->
                        <div class="tab-pane fade" id="v-pills-social-media" role="tabpanel"
                            aria-labelledby="v-pills-social-media-tab">
                            <div class="setting-form section-form">
                                <div class="card card-primary">
                                    <!-- Card header -->
                                    <div class="card-header">
                                        <h5 class="title">
                                            Social Media links
                                        </h5>
                                    </div>
                                    <!-- End of card header -->
                                    <!-- form start -->
                                    <form action="{{route('profile.update', ['id' => $user->id])}}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')
                                        <div class="card-body">

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
                                        </div>
                                        <!-- /.card-body -->

                                        <div class="card-footer {{app()->getLocale() == "ar" ? "text-left" : "text-right" }}">
                                            <button type="submit" class="btn btn-primary crayons-btn">
                                                Edit
                                            </button>
                                        </div>
                                    </form>
                                    <!-- End of form -->
                                </div>
                            <!-- /.card -->
                            </div>
                        </div>
                        <!-- End of Social Media links --->

                        <!-- Change bio -->
                        <div class="tab-pane fade" id="v-pills-bio" role="tabpanel"
                            aria-labelledby="v-pills-bio-tab">

                            <div class="setting-form section-form">
                                <div class="card card-primary">
                                    <!-- Card header -->
                                    <div class="card-header">
                                        <h5 class="title">
                                            Bio
                                        </h5>
                                    </div>
                                    <!-- End of card header -->
                                    <!-- form -->
                                    <form action="{{route('profile.update', ['id' => $user->id])}}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')
                                        <div class="card-body">
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
                                    <!-- End of form -->
                                </div>
                            <!-- /.card -->
                            </div>

                        </div>
                        <!-- End of change bio -->
                    </div>
                    <!-- End of Tab Content -->
                </div>
            </div>
        </div>
        <!-- End of setting info -->

    </div>
</section>
@endsection

@section('other-scripts')

<script src="{{asset('plugins/cropper/js/cropper.min.js')}}"></script>

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

    document.querySelector(".main-content").style.minHeight = ((window.innerHeight) - (document.querySelector(".main-footer").clientHeight) - document.querySelector(".navbar").clientHeight ) + "px"

</script>
@endsection
