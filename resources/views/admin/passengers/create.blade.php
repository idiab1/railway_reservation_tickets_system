@extends('layouts.admin.app')

{{-- Title --}}
@section('title')
    {{ trans('site.add_passenger') }}
@endsection

{{-- Page name --}}
@section('page_name')
    {{ trans('site.add_passenger') }}
@endsection

{{-- Breadcrumb --}}
@section('breadcrumb-item')
    <li class="breadcrumb-item"><a href="{{route('passengers.index')}}">{{ trans('site.passengers') }}</a></li>
    <li class="breadcrumb-item">{{ trans('site.add_passenger') }}<li>
@endsection

{{-- Content --}}
@section('content')
<section class="passengers-section section">
    <div class="row">
        <div class="col-md-10 m-auto">

            <!-- form container -->
            <div class="form-container">
                <div class="row">
                    <div class="col-md-6 p-0">
                        <!-- passengers form -->
                        <div class="users-form section-form">
                            <!-- Card -->
                            <div class="card">
                                {{-- <!-- Card header -->
                                <div class="card-header">
                                    <h3 class="card-title">{{ trans('site.add_passenger') }}</h3>
                                </div>
                                <!-- End of card header --> --}}
                                <!-- form -->
                                <form action="{{route('passengers.store')}}" method="POST">
                                    @csrf
                                    <div class="card-body">
                                        <!-- Name -->
                                        <div class="form-group">
                                            <label for="name">{{ trans('site.name') }}</label>
                                            <input class="form-control" type="text" id="name" name="name"
                                                placeholder="{{trans('site.admin_enter_name')}}" required>
                                        </div>

                                        <!-- Email -->
                                        <div class="form-group">
                                            <label for="email">{{ trans('site.email') }}</label>
                                            <input class="form-control" type="email" id="email" name="email"
                                                placeholder="{{trans('site.admin_enter_email')}}" required>
                                        </div>

                                        <!-- Password -->
                                        <div class="form-group">
                                            <label for="password">{{ trans('site.password') }}</label>
                                            <input class="form-control" type="password" id="password" name="password"
                                                placeholder="{{trans('site.admin_enter_password')}}" required>
                                        </div>

                                        <!-- Confirm password -->
                                        <div class="form-group mb-0">
                                            <label for="confirmPassword">{{ trans('site.confirm_password') }}</label>
                                            <input class="form-control" type="password" id="confirmPassword"
                                                name="password_confirmation"
                                                placeholder="{{trans('site.admin_confirm_password')}}" required>
                                        </div>

                                        

                                    </div>
                                    <!-- /.card-body -->

                                    <div class="card-footer">
                                        <button type="submit" class="btn btn-primary btn-add btn-crayons">
                                            {{ trans('site.add') }}
                                        </button>
                                    </div>
                                </form>
                                <!-- End of form -->

                            </div>
                            <!-- End of card -->
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
