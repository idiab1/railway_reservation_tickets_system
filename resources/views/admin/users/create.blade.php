@extends('layouts.admin.app')

{{-- Title --}}
@section('title')
    Add new user
@endsection

{{-- Page name --}}
@section('page_name')
    Add new user
@endsection

{{-- Breadcrumb --}}
@section('breadcrumb-item')
    <li class="breadcrumb-item"><a href="{{route('users.index')}}">Users</a></li>
    <li class="breadcrumb-item">Add new user<li>
@endsection

{{-- Content --}}
@section('content')
<div class="users-page">
    <div class="row">
        <div class="col-md-8 m-auto">
            <div class="users-form">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Add new user</h3>
                    </div>
                    <!-- /.card-header -->
                        <!-- form start -->
                        <form action="{{route('users.store')}}" method="POST">
                            @csrf
                            <div class="card-body">
                                <!-- Name -->
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input class="form-control" type="text" id="name" name="name" placeholder="Enter name of user">
                                </div>

                                <!-- Email -->
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input class="form-control" type="email" id="email" name="email" placeholder="Enter email of user">
                                </div>

                                <!-- Password -->
                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input class="form-control" type="password" id="password" name="password" placeholder="Enter password of user">
                                </div>

                                <!-- Confirm password -->
                                <div class="form-group">
                                    <label for="confirmPassword">Confirm Password</label>
                                    <input class="form-control" type="password" id="confirmPassword" name="password_confirmation" placeholder="Confirm password of user">
                                </div>

                                <!-- Privileges -->
                                <div class="form-group">
                                    <label for="supervisors">Privileges</label>

                                    <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                                        @php
                                            $models = ['users'];
                                            $maps = ['create', 'read', 'update', 'delete']
                                        @endphp

                                        @foreach ($models as $index => $model)
                                            <li class="nav-item">
                                                <a class="nav-link {{$index == 0 ? "active" : ""}}"
                                                id="pills-{{$model}}-tab" data-toggle="pill" href="#pills-{{$model}}" role="tab" aria-controls="pills-{{$model}}">{{ trans('site.' . $model) }}</a>
                                            </li>

                                        @endforeach

                                    </ul>
                                    <div class="tab-content" id="pills-tabContent">

                                        @foreach ($models as $index => $model)

                                            <div class="tab-pane fade show {{$index == 0 ? "active" : ""}}" id="pills-{{$model}}" role="tabpanel" aria-labelledby="pills-{{$model}}-tab">

                                                @foreach ($maps as $map)
                                                    <label><input type="checkbox" name="permissions[]" value="{{$model . '-' . $map}}">{{ trans('site.' . $map) }} </label>
                                                @endforeach

                                            </div>
                                        @endforeach
                                    </div>

                                </div>


                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Submit</button>
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
