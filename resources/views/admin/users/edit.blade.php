@extends('layouts.admin.app')

{{-- Title --}}
@section('title')
    Edit {{$user->name . "'s"}}
@endsection

{{-- Page name --}}
@section('page_name')
    Edit {{$user->name . "'s"}}
@endsection

{{-- Breadcrumb --}}
@section('breadcrumb-item')
    <li class="breadcrumb-item"><a href="{{route('users.index')}}">Users</a></li>
    <li class="breadcrumb-item">Edit {{$user->name . "'s"}}<li>
@endsection

{{-- Content --}}
@section('content')
<div class="users-page">
    <div class="row">
        <div class="col-md-8 m-auto">
            <div class="users-form">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Edit {{$user->name . "'s"}}</h3>
                    </div>
                    <!-- /.card-header -->
                        <!-- form start -->
                        <form action="{{route('users.update', ['id' => $user->id])}}" method="POST"  enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="card-body">
                                <!-- image -->
                                <div class="form-group">
                                    <div class="image-preview text-center">
                                        <img class="preview rounded-circle border border-dark"
                                        src="{{asset('uploads/users/' . Auth::user()->profile->image)}}"
                                        alt="user image" width="60" height="60">
                                    </div>
                                    <label for="image">Image</label>
                                    <input class="form-control image" type="file" id="image" name="image">
                                </div>

                                <!-- Name -->
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input class="form-control" type="text" id="name" name="name" value="{{$user->name}}" placeholder="Enter name of user">
                                </div>

                                <!-- Email -->
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input class="form-control" type="email" id="email" name="email" value="{{$user->email}}" placeholder="Enter email of user">
                                </div>

                                <!-- Password -->
                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input class="form-control" type="password" id="password" name="password" placeholder="Enter password of user">
                                </div>

                                <!-- Confrim Password -->
                                <div class="form-group">
                                    <label for="confirmPassword">Confirm Password</label>
                                    <input class="form-control" type="password" id="confirmPassword" name="password_confirmation" placeholder="Confirm password of user">
                                </div>

                                <!-- Facebook -->
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
                                <div class="form-group">
                                    <label for="about">About</label>
                                    <textarea class="form-control" name="about" id="about" cols="30"
                                    rows="10" placeholder="About Here">{{$user->profile->about}}</textarea>
                                </div>

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
                                                    <label>
                                                        <input type="checkbox" name="permissions[]" {{$user->hasPermission( $model . '-' . $map) ? "checked" : ''}}
                                                        value="{{$model . '-' . $map}}">{{ trans('site.' . $map) }}
                                                    </label>
                                                @endforeach

                                            </div>
                                        @endforeach
                                    </div>

                                </div>

                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Edit</button>
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
