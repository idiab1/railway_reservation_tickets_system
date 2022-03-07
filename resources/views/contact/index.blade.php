@extends('layouts.app')

{{-- Title --}}
@section('title')
    {{ trans('site.contact_us') }}
@endsection

{{-- Header --}}
@section('header')

@endsection

{{-- Content --}}
@section('content')
<section class="contact-page section">
    <!-- container fluid -->
    <div class="container-fluid">
        <!-- Setting page header -->
        <div class="page-header contact-page-header text-center">
            <div class="row">
                <div class="col-12">
                    <div class="header-info">
                        <h2 class="heading m-0">Contact Us</h2>
                        <p class="m-0">Any Question or remarks? Just write us a message</p>
                    </div>
                </div>
            </div>
        </div>
        <!-- End of setting page header -->

        <div class="row">
            <div class="col-9 m-auto">
                <div class="contact-box">
                    <div class="row">
                        <div class="col-md-8 p-0">
                            <!-- Contact form -->
                            <div class="card contact-form section-form">
                                <!-- Card Header -->
                                <div class="card-header">
                                    <div class="row">
                                        <div class="col-6">
                                            <!-- Header Title -->
                                            <div class="header-title">
                                                <h5>Send us a message</h5>
                                            </div>
                                            <!-- End of Header Title -->
                                        </div>
                                        <div class="col-6">
                                            <!-- Header icon -->
                                            <div class="header-icon text-right">
                                                <!-- Icon -->
                                                <div class="icon">
                                                    <span>
                                                        <i class="fas fa-envelope"></i>
                                                    </span>
                                                </div>
                                                <!-- End of icon -->
                                            </div>
                                            <!-- End of header icon -->
                                        </div>
                                    </div>
                                </div>
                                <!-- End of card header -->
                                <!-- form -->
                                <form action="{{route('contact.store')}}" method="POST">
                                    @csrf
                                    <!-- Card body -->
                                    <div class="card-body">

                                        <div class="form-row">
                                            <div class="col">
                                                <!-- Name -->
                                                <div class="form-group">
                                                    <label for="name">{{ trans('site.name') }}</label>
                                                    <div class="input-group mb-3">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text" id="name">
                                                                <i class="mdi mdi-account-outline"></i>
                                                            </span>
                                                        </div>
                                                        <input class="form-control" type="text" id="name" name="name"
                                                            aria-describedby="name" aria-label="name" required>
                                                    </div>
                                                </div>
                                                <!-- End of Name -->
                                            </div>
                                            <div class="col">
                                                <!-- Email address -->
                                                <div class="form-group">
                                                    <label for="email">{{ trans('site.email') }}</label>
                                                    <div class="input-group mb-3">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text" id="email">
                                                                <i class="mdi mdi-email"></i>
                                                            </span>
                                                        </div>
                                                        <input class="form-control" type="email" id="email" name="email"
                                                            aria-describedby="email" aria-label="email" required>
                                                    </div>
                                                </div>
                                                <!-- End of Email address -->
                                            </div>
                                        </div>

                                        <!-- Message -->
                                        <div class="form-group m-0">
                                            <label for="message">{{ trans('site.message') }}</label>
                                            <textarea class="form-control" name="message" id="message" cols="30"
                                                rows="10" placeholder="{{trans('site.enter_your_message')}}"
                                                required autofocus></textarea>

                                        </div>
                                    </div>
                                    <!-- End of card body -->

                                    <!-- Card footer -->
                                    <div class="card-footer {{app()->getLocale() == "ar" ? "text-left" : "text-right" }}">
                                        <button type="submit" class="btn btn-primary crayons-btn">
                                            <i class="mdi mdi-send"></i>
                                            {{ trans('site.send') }}
                                        </button>
                                    </div>
                                    <!-- End fo card footer -->
                                </form>
                                <!-- End of form -->
                            </div>
                            <!-- End of Contact form -->

                        </div>
                        <div class="col-md-4 p-0">
                            <!-- Contact Info -->
                            <div class="card contact-info">
                                <!-- Card Header -->
                                <div class="card-header">
                                    <div class="row">
                                        <div class="col-12">
                                            <!-- Header Title -->
                                            <div class="header-title">
                                                <h5>Contact Information</h5>
                                            </div>
                                            <!-- End of Header Title -->
                                        </div>
                                    </div>
                                </div>
                                <!-- End of card header -->
                                <!-- Card Body -->
                                <div class="card-body">
                                    <!-- Contact information list -->
                                    <ul class="list-unstyled">
                                        <!-- Item -->
                                        <li class="item">
                                            <!-- Icon -->
                                            <span class="icon">
                                                <i class="fas fa-map-marker"></i>
                                            </span>
                                            <!-- End of Icon -->
                                            <p class="d-inline-block m-0">{{$setting->address}}</p>
                                        </li>
                                        <!-- End of Item -->
                                        <!-- Item -->
                                        <li class="item">
                                            <!-- Icon -->
                                            <span class="icon">
                                                <i class="fas fa-mobile"></i>
                                            </span>
                                            <!-- End of Icon -->
                                            <p class="d-inline-block m-0">{{$setting->phone_number}}</p>
                                        </li>
                                        <!-- End of Item -->
                                        <!-- Item -->
                                        <li class="item">
                                            <!-- Icon -->
                                            <span class="icon">
                                                <i class="fas fa-envelope"></i>
                                            </span>
                                            <!-- End of Icon -->
                                            <p class="d-inline-block m-0">{{$setting->web_email}}</p>
                                        </li>
                                        <!-- End of Item -->
                                    </ul>
                                    <!-- End fo contact information list -->

                                    <!-- contact image -->
                                    {{-- <div class="contact-image">
                                        <img src="{{asset('images/contact_us/contact_us.svg')}}" alt="contact image">
                                    </div> --}}
                                    <!-- End of contact image -->
                                </div>
                                <!-- End of card body -->
                            </div>
                            <!-- End of  Contact Info -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End of container fluid -->
</section>
@endsection

{{-- Footer --}}
@section('footer')
<!-- Footer -->
<footer class="main-footer">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <!-- Copyright -->
                <div class="copyright">
                    <div class="row">
                        <div class="col-md-6 col-sm-12">
                            <!-- Logo Brand -->
                            <div class="logo-brand">
                                <h6 class="brand-name">{{$setting->web_name}}</h6>
                            </div>
                            <!-- ./end of logo Brand -->
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <div class="copyright-info text-right">
                                <p>&copy; 2022 {{ trans('site.copyright') }}</p>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ./end of copyright -->
            </div>
        </div> <!-- ./End of row -->
    </div>
</footer>
<!-- End Of Footer -->
@endsection

@section('other-scripts')
<!-- main script -->
<script src="{{asset('js/main.js')}}"></script>
@endsection
