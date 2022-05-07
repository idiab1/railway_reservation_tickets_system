@extends('layouts.app')

{{-- Title --}}
@section('title')
    {{ trans('site.posts') }}
@endsection

{{-- Styles --}}
@section('other-styles')
    <style>
        /* Sub Header */
        .sub-header {
            height: 270px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .sub-header .header-box .header-info {
            width: auto;
            margin-top: 0;
            text-align: center;
        }

    </style>
@endsection

{{-- Header --}}
@section('header-info')
    <!-- Header info -->
    <div class="header-info">
        <h1>{{ trans('site.posts') }}</h1>
    </div>
    <!-- End of Header info -->
@endsection

@section('content')
<!-- Posts Section -->
<section class="posts-section section">

    <!-- Container fluid -->
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <!-- Recent Posts -->
                <div class="card recent-box mb-4">
                    <!-- recent Box Header -->
                    <div class="card-header recent-box-header px-0">
                        <h4>Recent Posts</h4>
                    </div>
                    <!-- End of Filter Box Header -->

                    <!-- recent Box Body -->
                    <div class="card-body recent-box-body ">
                        <!-- Post -->
                        <div class="card card-post">
                            <!-- Post Header -->
                            <div class="card-header post-header">
                                <img class="img-fluid" src="{{asset('images/post.jpg')}}" alt="">
                            </div>
                            <!-- End of Post Header -->

                            <!-- Post body -->
                            <div class="card-body post-body">
                                <h5 class="m-0">Lorem, ipsum dolor sit.</h5>
                                <span class="date">1 day ago</span>
                            </div>
                            
                        </div>
                        <!-- End of Post -->

                        <!-- Post -->
                        <div class="card card-post">
                            <!-- Post Header -->
                            <div class="card-header post-header">
                                <img class="img-fluid" src="{{asset('images/post.jpg')}}" alt="">
                            </div>
                            <!-- End of Post Header -->

                            <!-- Post body -->
                            <div class="card-body post-body">
                                <h5 class="m-0">Lorem, ipsum dolor sit.</h5>
                                <span class="date">1 day ago</span>
                            </div>
                            
                        </div>
                        <!-- End of Post -->

                        <!-- Post -->
                        <div class="card card-post">
                            <!-- Post Header -->
                            <div class="card-header post-header">
                                <img class="img-fluid" src="{{asset('images/post.jpg')}}" alt="">
                            </div>
                            <!-- End of Post Header -->

                            <!-- Post body -->
                            <div class="card-body post-body">
                                <h5 class="m-0">Lorem, ipsum dolor sit.</h5>
                                <span class="date">1 day ago</span>
                            </div>
                            
                        </div>
                        <!-- End of Post -->
                    </div>
                    <!-- End of recent Box Body -->
                </div>
                <!-- End of Recent Posts -->
            </div>
            <div class="col-md-8 m-auto">
                <div class="posts-lists">

                    <div class="row">
                        <div class="col-12 col-md-6">
                            <!-- Card post -->
                            <div class="card card-post mb-4">
                                <!-- Post header for add images -->
                                <div class="card-header post-header p-0">
                                    <img class="img-fluid" src="{{asset('images/post.jpg')}}" alt="">
                                    <div class="overlay">
                                        <i class="fas fa-eye fa-3x"></i>
                                    </div>
                                </div>
                                <!-- Post Content/body -->
                                <div class="card-body post-body">
                                    <span class="date">21 August, 2019</span>
                                    <h3 class="post-title">Why Lead Generation is Key for Business Growth</h3>
                                </div>
                            </div>
                            {{-- <div class="card card-post">
                                <!-- Post header for add images -->
                                <div class="card-header post-header p-0">
                                    <img class="img-fluid" src="{{asset('images/post.jpg')}}" alt="">
                                </div>
                                <!-- Post Content/body -->
                                <div class="card-body post-body">
                                    <span class="date">21 August, 2019</span>
                                    <h3 class="post-title">Why Lead Generation is Key for Business Growth</h3>
                                    <p class="post-description">
                                        A small river named Duden flows by their place and supplies it with the necessary regelialia.
                                    </p>
                                </div>
                            </div> --}}
                            <!-- ./end of post -->
                        </div>
                        <div class="col-12 col-md-6">
                            <!-- Card post -->
                            <div class="card card-post mb-4">
                                <!-- Post header for add images -->
                                <div class="card-header post-header p-0">
                                    <img class="img-fluid" src="{{asset('images/post.jpg')}}" alt="">
                                    <div class="overlay">
                                        <i class="fas fa-eye fa-3x"></i>
                                    </div>
                                </div>
                                <!-- Post Content/body -->
                                <div class="card-body post-body">
                                    <span class="date">21 August, 2019</span>
                                    <h3 class="post-title">Why Lead Generation is Key for Business Growth</h3>
                                </div>
                            </div>
                            <!-- ./end of post -->
                        </div>
                        <div class="col-12 col-md-6">
                            <!-- Card post -->
                            <div class="card card-post mb-4">
                                <!-- Post header for add images -->
                                <div class="card-header post-header p-0">
                                    <img class="img-fluid" src="{{asset('images/post.jpg')}}" alt="">
                                    <div class="overlay">
                                        <i class="fas fa-eye fa-3x"></i>
                                    </div>
                                </div>
                                <!-- Post Content/body -->
                                <div class="card-body post-body">
                                    <span class="date">21 August, 2019</span>
                                    <h3 class="post-title">Why Lead Generation is Key for Business Growth</h3>
                                </div>
                            </div>
                            <!-- ./end of post -->
                        </div>
                        <div class="col-12 col-md-6">
                            <!-- Card post -->
                            <div class="card card-post mb-4">
                                <!-- Post header for add images -->
                                <div class="card-header post-header p-0">
                                    <img class="img-fluid" src="{{asset('images/post.jpg')}}" alt="">
                                    <div class="overlay">
                                        <i class="fas fa-eye fa-3x"></i>
                                    </div>
                                </div>
                                <!-- Post Content/body -->
                                <div class="card-body post-body">
                                    <span class="date">21 August, 2019</span>
                                    <h3 class="post-title">Why Lead Generation is Key for Business Growth</h3>
                                </div>
                            </div>
                            <!-- ./end of post -->
                        </div>
                        <div class="col-12 col-md-6">
                            <!-- Card post -->
                            <div class="card card-post mb-4">
                                <!-- Post header for add images -->
                                <div class="card-header post-header p-0">
                                    <img class="img-fluid" src="{{asset('images/post.jpg')}}" alt="">
                                    <div class="overlay">
                                        <i class="fas fa-eye fa-3x"></i>
                                    </div>
                                </div>
                                <!-- Post Content/body -->
                                <div class="card-body post-body">
                                    <span class="date">21 August, 2019</span>
                                    <h3 class="post-title">Why Lead Generation is Key for Business Growth</h3>
                                </div>
                            </div>
                            <!-- ./end of post -->
                        </div>
                        <div class="col-12 col-md-6">
                            <!-- Card post -->
                            <div class="card card-post mb-4">
                                <!-- Post header for add images -->
                                <div class="card-header post-header p-0">
                                    <img class="img-fluid" src="{{asset('images/post.jpg')}}" alt="">
                                    <div class="overlay">
                                        <i class="fas fa-eye fa-3x"></i>
                                    </div>
                                </div>
                                <!-- Post Content/body -->
                                <div class="card-body post-body">
                                    <span class="date">21 August, 2019</span>
                                    <h3 class="post-title">Why Lead Generation is Key for Business Growth</h3>
                                </div>
                            </div>
                            <!-- ./end of post -->
                        </div>
                        
                    </div>
        
                </div>
            </div>
        </div>
    </div>
    <!-- End of Container fluid -->
</section>
<!-- End of Tickets Section -->


<!-- Recent Posts recent-posts-section -->
{{-- <section class="recent-posts-section section">
    <div class="container-fluid container-md">
        <div class="row">
            <div class="col-12 p-0">
                <!-- Section Header -->
                <h2 class="heading">Recent Posts</h2>
            </div>
        </div>
        
        

    </div>
</section>
<!-- End of recent posts --> --}}


@endsection

@section('other-scripts')
<!-- main script -->
<script src="{{asset('js/main.js')}}"></script>
<!--Custom script -->
<script src="{{asset('js/custom.js')}}"></script>


@endsection


