@extends('layouts.app')

{{-- Title --}}
@section('title')
    {{$user->name}}
@endsection

{{-- Styles --}}
@section('other-styles')
    <style>
        .profile-page .user-card{
        }
        .profile-page .user-card .user-details h3{
            color: #1c1f33;
            font-size: 1.35rem;
            font-weight: bold;
        }
        .profile-page .user-card .user-details p{
            color: #575757;
        }

        .profile-page .user-card .card-body .user-image{
            padding-bottom: 10px;
        }
        .profile-page .user-card .card-body .user-image img{
            border: 4px solid #832c42;
        }
        .profile-page .user-card .card-footer{
            display: flex;
            justify-content: space-between;
            background-color: #832c42;
            padding: 1rem;
        }
        .profile-page .user-card .card-footer a{
            border: none;
            color: #eee6ce;
            text-decoration: none;
            text-transform: capitalize;
        }
        .profile-page .user-card .card-footer a .icon i{

        }
        .profile-page .user-card .card-footer a span{

        }
    </style>
@endsection


{{-- Header --}}
@section('header')

@endsection

{{-- Content --}}
@section('content')
<section class="profile-page section">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <!-- user card -->
                <div class="card user-card">
                    <!-- card body -->
                    <div class="card-body text-center">
                        <!-- User Image -->
                        <div class="user-image">
                            <img class="img-fluid rounded-circle"
                                src="{{asset('uploads/users/' . $user->profile->image)}}"
                                alt="user image" width="70" height="70">
                        </div>
                        <!-- End of User Image -->

                        <!-- User Details -->
                        <div class="user-details">
                            <h3 class="m-0">{{$user->name}}</h3>
                            <p class="m-0">{{$user->email}}</p>

                        </div>
                        <!-- End of User Details -->
                    </div>
                    <!-- End of card body -->

                    <!-- Card Footer -->
                    <div class="card-footer">
                        <div class="d-inline-block">
                            <!-- Facebook -->
                            <a class="btn btn-link p-0" href="{{$user->profile->facebook}}" target="_blank">
                                <!-- Icon -->
                                <div class="icon d-inline-block">
                                    <i class="fab fa-facebook-square"></i>
                                </div>
                                <span>Facebook</span>
                            </a>
                        </div>
                        <div class="d-inline-block">
                            <!-- Twitter -->
                            <a class="btn btn-link p-0" href="{{$user->profile->twitter}}" target="_blank">
                                <!-- Icon -->
                                <div class="icon d-inline-block">
                                    <i class="fab fa-twitter-square"></i>
                                </div>
                                <span>Twitter</span>
                            </a>
                        </div>
                        <div class="d-inline-block">
                            <!-- Twitter -->
                            <a class="btn btn-link p-0" href="{{$user->profile->linkedin}}" target="_blank">
                                <!-- Icon -->
                                <div class="icon d-inline-block">
                                    <i class="fab fa-linkedin"></i>
                                </div>
                                <span>Linkedin</span>
                            </a>
                        </div>

                    </div>
                    <!-- End of Card Footer -->

                </div>
                <!-- End of user card -->
            </div>
            <div class="col-md-8">
                <!-- Card -->
                <div class="card">
                    <!-- card header -->
                    <div class="card-header"></div>
                    <!-- End of card header -->
                </div>
                <!-- End of Card -->
            </div>
        </div>
        <div class="row"></div>
    </div>
</section>
@endsection

@section('other-scripts')

<!-- main script -->
<script src="{{asset('js/main.js')}}"></script>

<!-- custom script -->
<script src="{{asset('js/custom.js')}}"></script>

@endsection
