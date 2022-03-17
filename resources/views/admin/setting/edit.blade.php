@extends('layouts.admin.app')

{{-- Title --}}
@section('title')
    {{ trans('site.setting') }}
@endsection

{{-- Page name --}}
@section('page_name')
    {{ trans('site.setting') }}
@endsection

{{-- Breadcrumb --}}
@section('breadcrumb-item')
    <li class="breadcrumb-item">{{ trans('site.setting') }}<li>
@endsection

{{-- Content --}}
@section('content')
<section class="setting-section section">
    <div class="row">
        <div class="col-md-10 m-auto">

            {{-- <!-- Nav pills tab -->
            <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                <!-- Setting info -->
                <li class="nav-item">
                    <a class="nav-link active" id="pills-setting-info-tab"
                        data-toggle="pill" href="#pills-setting-info" role="tab"
                        aria-controls="pills-setting-info" aria-selected="true">
                        {{ trans('site.setting_info') }}
                    </a>
                </li>
                <!-- End of Setting info -->

                <!-- Home -->
                <li class="nav-item">
                    <a class="nav-link" id="pills-setting-logo-tab"
                        data-toggle="pill" href="#pills-setting-logo" role="tab"
                        aria-controls="pills-setting-logo" aria-selected="false">
                        {{ trans('site.change_logo') }}
                    </a>
                </li>
                <!-- Home -->
            </ul>
            <!-- End of nav pills tab -->

            <!-- Tab Content -->
            <div class="tab-content" id="pills-tabContent">
                <!-- Setting info content -->
                <div class="tab-pane fade show active" id="pills-setting-info"
                    role="tabpanel" aria-labelledby="pills-setting-info-tab">

                    <!-- form container -->
                    <div class="form-container">
                        <div class="row">
                            <div class="col-md-7 p-0">
                                <!-- Setting form -->
                                <div class="setting-form section-form">
                                    <div class="card">
                                        <div class="card-header">
                                            <h3 class="card-title">{{ trans('site.setting') }}</h3>
                                        </div>
                                        <!-- /.card-header -->
                                            <!-- form start -->
                                            <form action="{{route('setting.update', ['id' => $setting->id])}}" method="POST">
                                                @csrf
                                                @method('PUT')
                                                <div class="card-body">
                                                    <!-- Website name -->
                                                    <div class="form-group">
                                                        <label for="webName">{{ trans('site.website_name') }}</label>
                                                        <input class="form-control" type="text" id="webName" name="web_name"
                                                            value="{{$setting->web_name}}" placeholder="{{trans('site.enter_website_name')}}">
                                                    </div>

                                                    <!-- Phone Number -->
                                                    <div class="form-group">
                                                        <label for="phoneNumber">{{ trans('site.phone_number') }}</label>
                                                        <input class="form-control" type="number" id="phoneNumber" name="phone_number"
                                                            value="{{$setting->phone_number}}" placeholder="{{trans('site.enter_phone_number')}}">
                                                    </div>

                                                    <!-- Email -->
                                                    <div class="form-group">
                                                        <label for="webEmail">{{ trans('site.email') }}</label>
                                                        <input class="form-control" type="text" id="webEmail" name="web_email"
                                                            value="{{$setting->web_email}}" placeholder="{{trans('site.enter_website_email')}}">
                                                    </div>

                                                    <!-- Address -->
                                                    <div class="form-group m-0">
                                                        <label for="address">{{ trans('site.address') }}</label>
                                                        <input class="form-control" type="text" id="address" name="address"
                                                            value="{{$setting->address}}" placeholder="{{trans('site.enter_address')}}">
                                                    </div>

                                                </div>
                                                <!-- /.card-body -->

                                                <!-- Card footer -->
                                                <div class="card-footer">
                                                    <button type="submit" class="btn btn-primary btn-submit btn-crayons">
                                                        {{ trans('site.update') }}
                                                    </button>
                                                </div>
                                                <!-- End of card footer -->
                                            </form>

                                        </div>
                                    <!-- /.card -->
                                </div>
                                <!-- End of Setting form -->

                            </div>
                            <div class="col-md-5 p-0">
                                <!-- setting Info -->
                                <div class="setting-info section-info">
                                    <div class="card">
                                        <div class="card-body"></div>
                                    </div>
                                </div>
                                <!-- End of setting Info -->
                            </div>
                        </div>
                    </div>
                    <!-- End of form container -->

                </div>
                <!-- End of Setting info content -->

                <!-- Setting logo content -->
                <div class="tab-pane fade" id="pills-setting-logo"
                    role="tabpanel" aria-labelledby="pills-setting-logo-tab">
                    <!-- form container -->
                    <div class="form-container">
                        <div class="row">
                            <div class="col-md-7 p-0">
                                <!-- Setting form -->
                                <div class="setting-form section-form">
                                    <div class="card">
                                        <div class="card-header">
                                            <h3 class="card-title">{{ trans('site.setting') }}</h3>
                                        </div>
                                        <!-- /.card-header -->
                                            <!-- form start -->
                                            <form action="{{route('setting.update', ['id' => $setting->id])}}" method="POST">
                                                @csrf
                                                @method('PUT')
                                                <div class="card-body">
                                                    <!-- Website name -->
                                                    <div class="form-group">
                                                        <label for="webName">{{ trans('site.website_name') }}</label>
                                                        <input class="form-control" type="text" id="webName" name="web_name"
                                                            value="{{$setting->web_name}}" placeholder="{{trans('site.enter_website_name')}}">
                                                    </div>

                                                    <!-- Phone Number -->
                                                    <div class="form-group">
                                                        <label for="phoneNumber">{{ trans('site.phone_number') }}</label>
                                                        <input class="form-control" type="number" id="phoneNumber" name="phone_number"
                                                            value="{{$setting->phone_number}}" placeholder="{{trans('site.enter_phone_number')}}">
                                                    </div>

                                                    <!-- Email -->
                                                    <div class="form-group">
                                                        <label for="webEmail">{{ trans('site.email') }}</label>
                                                        <input class="form-control" type="text" id="webEmail" name="web_email"
                                                            value="{{$setting->web_email}}" placeholder="{{trans('site.enter_website_email')}}">
                                                    </div>

                                                    <!-- Address -->
                                                    <div class="form-group m-0">
                                                        <label for="address">{{ trans('site.address') }}</label>
                                                        <input class="form-control" type="text" id="address" name="address"
                                                            value="{{$setting->address}}" placeholder="{{trans('site.enter_address')}}">
                                                    </div>

                                                </div>
                                                <!-- /.card-body -->

                                                <!-- Card footer -->
                                                <div class="card-footer">
                                                    <button type="submit" class="btn btn-primary btn-submit btn-crayons">
                                                        {{ trans('site.update') }}
                                                    </button>
                                                </div>
                                                <!-- End of card footer -->
                                            </form>

                                        </div>
                                    <!-- /.card -->
                                </div>
                                <!-- End of Setting form -->

                            </div>
                            <div class="col-md-5 p-0">
                                <!-- setting Info -->
                                <div class="setting-info section-info">
                                    <div class="card">
                                        <div class="card-body"></div>
                                    </div>
                                </div>
                                <!-- End of setting Info -->
                            </div>
                        </div>
                    </div>
                    <!-- End of form container -->
                </div>
                <!-- End of Setting logo content -->
            </div>
            <!-- End of Tab Content --> --}}


            <!-- form container -->
            <div class="form-container">
                <div class="row">
                    <div class="col-md-7 p-0">
                        <!-- Setting form -->
                        <div class="setting-form section-form">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">{{ trans('site.setting') }}</h3>
                                </div>
                                <!-- /.card-header -->
                                    <!-- form start -->
                                    <form action="{{route('setting.update', ['id' => $setting->id])}}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <div class="card-body">
                                            <!-- Website name -->
                                            <div class="form-group">
                                                <label for="webName">{{ trans('site.website_name') }}</label>
                                                <input class="form-control" type="text" id="webName" name="web_name"
                                                    value="{{$setting->web_name}}" placeholder="{{trans('site.enter_website_name')}}">
                                            </div>

                                            <!-- Phone Number -->
                                            <div class="form-group">
                                                <label for="phoneNumber">{{ trans('site.phone_number') }}</label>
                                                <input class="form-control" type="number" id="phoneNumber" name="phone_number"
                                                    value="{{$setting->phone_number}}" placeholder="{{trans('site.enter_phone_number')}}">
                                            </div>

                                            <!-- Email -->
                                            <div class="form-group">
                                                <label for="webEmail">{{ trans('site.email') }}</label>
                                                <input class="form-control" type="text" id="webEmail" name="web_email"
                                                    value="{{$setting->web_email}}" placeholder="{{trans('site.enter_website_email')}}">
                                            </div>

                                            <!-- Address -->
                                            <div class="form-group m-0">
                                                <label for="address">{{ trans('site.address') }}</label>
                                                <input class="form-control" type="text" id="address" name="address"
                                                    value="{{$setting->address}}" placeholder="{{trans('site.enter_address')}}">
                                            </div>

                                        </div>
                                        <!-- /.card-body -->

                                        <!-- Card footer -->
                                        <div class="card-footer">
                                            <button type="submit" class="btn btn-primary btn-submit btn-crayons">
                                                {{ trans('site.update') }}
                                            </button>
                                        </div>
                                        <!-- End of card footer -->
                                    </form>

                                </div>
                            <!-- /.card -->
                        </div>
                        <!-- End of Setting form -->

                    </div>
                    <div class="col-md-5 p-0">
                        <!-- setting Info -->
                        <div class="setting-info section-info">
                            <div class="card">
                                <div class="card-body"></div>
                            </div>
                        </div>
                        <!-- End of setting Info -->
                    </div>
                </div>
            </div>
            <!-- End of form container -->
        </div>
    </div>
</section>
@endsection
