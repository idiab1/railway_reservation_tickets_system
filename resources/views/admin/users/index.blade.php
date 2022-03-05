@extends('layouts.admin.app')

{{-- Title --}}
@section('title')
    {{ trans('site.list_users') }}
@endsection


{{-- Page name --}}
@section('page_name')
    {{ trans('site.list_users') }}
    <button type="button" class="btn btn-create btn-sm btn-primary btn-crayons"
        data-toggle="modal" data-target="#createNewItem">
        <i class="fas fa-plus"></i>
    </button>
@endsection

{{-- Breadcrumb --}}
@section('breadcrumb-item')
    <li class="breadcrumb-item">{{ trans('site.users') }}<li>
@endsection

{{-- Content --}}
@section('content')
    <section class="user-section section">
        <div class="row">
            @if ($users->count() > 0)
                @foreach ($users as $user)
                    <div class="col-md-3">
                        <!-- card -->
                        <div class="card user-card text-center">
                            <!-- Card Header -->

                            @if ($user->profile->image)
                                <div class="card-header p-0">
                                    <img class="img-fluid" src="{{asset('uploads/users/' . $user->profile->image)}}"
                                        alt="user image">
                                </div>

                            @endif

                            <!-- End of Card Header -->

                            <!-- Card Body -->
                            <div class="card-body">
                                <h4 class="username">{{$user->name}}</h4>
                                <p class="m-0">
                                    @foreach (auth()->user()->roles as $role)
                                        {{ $role->display_name }}
                                    @endforeach
                                </p>
                            </div>
                            <!-- End of Card Body -->

                            <!-- Card footer -->
                            <div class="card-footer">
                                <a class="btn btn-success d-inline-block btn-sm btn-edit" href="{{route('users.edit', ['id' => $user->id])}}">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form class="d-inline-block" action="{{route('users.destroy', ['id' => $user->id])}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger btn-sm btn-delete" type="submit">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </div>
                            <!-- End of Card footer -->
                        </div>
                        <!-- End of card -->
                    </div>
                @endforeach
            @endif
        </div>

        <!-- create modal -->
        <div class="modal fade" id="createNewItem" data-backdrop="static" data-keyboard="false"
            tabindex="-1" aria-labelledby="createNewItem" aria-hidden="true">
            <div class="modal-dialog">
                <!-- Modal Content -->
                <div class="modal-content">
                    <!-- Modal Header -->
                    <div class="modal-header">
                        <!-- Modal Title -->
                        <h5 class="modal-title" id="createNewItem">
                            {{ trans('site.add_user') }}
                        </h5>

                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <!-- End of Modal Header -->

                    <!-- Form -->
                    <form action="{{route('users.store')}}" method="POST">
                        @csrf
                        <div class="card-body">
                            <!-- Name -->
                            <div class="form-group">
                                <label for="name">{{ trans('site.name') }}</label>
                                <input class="form-control" type="text" id="name"
                                    name="name" placeholder="{{trans('site.admin_enter_name')}}"
                                    required>
                            </div>

                            <!-- Email -->
                            <div class="form-group">
                                <label for="email">{{ trans('site.email') }}</label>
                                <input class="form-control" type="email" id="email"
                                    name="email" placeholder="{{trans('site.admin_enter_email')}}"
                                    required>
                            </div>

                            <!-- Password -->
                            <div class="form-group">
                                <label for="password">{{ trans('site.password') }}</label>
                                <input class="form-control" type="password" id="password"
                                    name="password" placeholder="{{trans('site.admin_enter_password')}}"
                                    required>
                            </div>

                            <!-- Confirm password -->
                            <div class="form-group">
                                <label for="confirmPassword">{{ trans('site.confirm_password') }}</label>
                                <input class="form-control" type="password" id="confirmPassword"
                                    name="password_confirmation" placeholder="{{trans('site.admin_confirm_password')}}"
                                    required>
                            </div>

                            <!-- Privileges -->
                            <div class="form-group">
                                <label for="supervisors">{{ trans('site.privileges') }}</label>

                                <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                                    @php
                                        $models = ['users', 'stations', 'trains', 'posts'];
                                        $maps = ['create', 'read', 'update', 'delete']
                                    @endphp

                                    @foreach ($models as $index => $model)
                                        <li class="nav-item">
                                            <a class="nav-link btn btn-sm {{$index == 0 ? "active" : ""}}"
                                                id="pills-{{$model}}-tab" data-toggle="pill" href="#pills-{{$model}}"
                                                role="tab" aria-controls="pills-{{$model}}">
                                                {{ trans('site.' . $model) }}
                                            </a>
                                        </li>

                                    @endforeach

                                </ul>
                                <div class="tab-content" id="pills-tabContent">

                                    @foreach ($models as $index => $model)

                                        <div class="tab-pane fade show {{$index == 0 ? "active" : ""}}" 
                                            id="pills-{{$model}}" role="tabpanel" 
                                            aria-labelledby="pills-{{$model}}-tab">

                                            @foreach ($maps as $map)
                                                <label>
                                                    <input type="checkbox" name="permissions[]" value="{{$model . '-' . $map}}">
                                                    {{ trans('site.' . $map) }} 
                                                </label>
                                            @endforeach

                                        </div>
                                    @endforeach
                                </div>
                            </div>

                        </div>
                        <!-- /.card-body -->

                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary btn-add btn-crayons">{{ trans('site.add') }}</button>
                        </div>
                    </form>

                    <!-- End of  Form -->
                </div>
                <!-- End of Modal Content -->
            </div>
        </div>
        <!-- end of create modal -->

    </section>
@endsection

