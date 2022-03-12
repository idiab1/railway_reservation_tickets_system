@extends('layouts.admin.app')

{{-- Title --}}
@section('title')
    {{ trans('site.list_posts') }}
@endsection

{{-- Styles --}}
@section('styles')
<!-- DataTables -->
<link rel="stylesheet" href="{{asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
<style>
    .content-header{
        height: 100px;
    }
    .content-header .content-header-info {
        text-align: center;
        display: flex;
        justify-content: space-between;
    }
</style>
@endsection


{{-- Page name --}}
@section('page_name')
    {{ trans('site.list_posts') }}
    {{-- <a href="#" class="badge badge-primary">Primary</a> --}}

    {{-- <a class="btn btn-create btn-sm btn-primary btn-crayons"
        data-toggle="modal"data-target="#createNewItem" href="{{route('posts.create')}}">
        <i class="fas fa-plus"></i>
        {{ trans('site.add_post') }}
    </a> --}}

    <button type="button" class="btn btn-create btn-sm btn-primary btn-crayons"
        data-toggle="modal" data-target="#createNewItem">
        <i class="fas fa-plus"></i>
    </button>

@endsection

{{-- Breadcrumb --}}
@section('breadcrumb-item')
    <li class="breadcrumb-item">{{ trans('site.posts') }}<li>
@endsection

{{-- Content --}}
@section('content')
    <section class="post-section">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <!-- Card Header -->
                    {{-- <div class="card-header">
                        <div class="row">
                            <div class="col-6">
                                <!-- Card Title -->
                                <h3 class="card-title">
                                    {{ trans('site.list_posts') }}
                                </h3>
                                <!-- /End of card title -->
                            </div>
                            <div class="col-6">
                                <a class="btn btn-create btn-sm btn-primary btn-crayons float-right" href="{{route('posts.create')}}">
                                    <i class="fas fa-plus"></i>
                                    {{ trans('site.add_post') }}
                                </a>
                            </div>
                        </div>
                    </div> --}}
                    <!-- /End of card-header -->

                    <!-- Card body -->
                    {{-- <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>{{ trans('site.name') }}</th>
                                    <th>{{ trans('site.created_at') }}</th>
                                    <th>{{ trans('site.action') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $id = 1;
                                @endphp
                                @if ($posts->count() > 0)
                                    @foreach ($posts as $post)
                                        <tr>
                                            <td>{{$id++}}</td>
                                            <td>{{$post->name}}</td>
                                            <td>{{$post->created_at}}</td>
                                            <td>
                                                <a class="btn btn-success d-inline-block btn-sm btn-edit" href="{{route('posts.edit', ['id' => $post->id])}}">
                                                    <i class="fas fa-edit"></i>
                                                    {{ trans('site.edit') }}
                                                </a>
                                                <form class="d-inline-block" action="{{route('posts.destroy', ['id' => $post->id])}}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn btn-danger btn-sm btn-delete" type="submit">
                                                        <i class="fas fa-trash"></i>
                                                        {{ trans('site.delete') }}
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                @endif
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>#</th>
                                    <th>{{ trans('site.name') }}</th>
                                    <th>{{ trans('site.created_at') }}</th>
                                    <th>{{ trans('site.action') }}</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div> --}}
                    <!-- /end of card-body -->
                </div>
            <!-- /.card -->
            </div>
            <!--/.col-12 -->
        </div>
        <!--/.row -->

        <div class="row">
            @if ($posts->count() > 0)
                @foreach ($posts as $post)
                    <div class="col-md-4">
                        <!-- Card -->
                        <div class="card">
                            @if ($post->image)
                                <div class="card-header">

                                </div>
                            @endif
                            <div class="card-body post-body">
                                <div class="post-title">
                                    <h4>{{$post->name}}</h4>
                                </div>
                                <div class="post-content">
                                    <p>{!! $post->content !!}</p>
                                </div>
                            </div>

                            <div class="card-footer post-footer">
                                <a class="btn btn-success d-inline-block btn-sm btn-edit" href="{{route('posts.edit', ['id' => $post->id])}}">
                                    <i class="fas fa-edit"></i>
                                    {{ trans('site.edit') }}
                                </a>
                                <form class="d-inline-block" action="{{route('posts.destroy', ['id' => $post->id])}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger btn-sm btn-delete" type="submit">
                                        <i class="fas fa-trash"></i>
                                        {{ trans('site.delete') }}
                                    </button>
                                </form>
                            </div>

                        </div>
                        <!-- End of Card -->
                    </div>
                @endforeach
            @endif
            <div class="col-md-4">

            </div>
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
                            {{ trans('site.add_post') }}
                        </h5>

                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <!-- End of Modal Header -->

                    <!-- Form -->
                    <form action="{{route('posts.store')}}" method="POST">
                        @csrf
                        <div class="modal-body">
                            <!-- Name -->
                            <div class="form-group">
                                <label for="name">{{ trans('site.name') }}</label>
                                <input class="form-control" type="text" id="name"
                                        name="name" placeholder="{{trans('site.enter_name_post')}}">
                            </div>

                            <!-- Content -->
                            <div class="form-group">
                                <label for="content">{{ trans('site.content') }}</label>
                                <textarea class="form-control ckeditor" name="content" id="content"
                                        placeholder="{{trans('site.enter_content_post')}}"></textarea>
                            </div>

                        </div>
                        <!-- /.card-body -->

                        <!-- Modal Footer -->
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary btn-add btn-crayons">
                                {{ trans('site.add') }}
                            </button>

                        </div>
                        <!-- End of Modal Footer -->
                    </form>
                    <!-- End of  Form -->
                </div>
                <!-- End of Modal Content -->
            </div>
        </div>
        <!-- end of create modal -->

    </section>
@endsection

{{-- Scripts --}}
@section('scripts')
<!-- DataTables  & Plugins -->
<script src="{{asset('plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
<script src="{{asset('plugins/datatables-buttons/js/dataTables.buttons.min.js')}}"></script>
<script src="{{asset('plugins/datatables-buttons/js/buttons.bootstrap4.min.js')}}"></script>
<script src="{{asset('plugins/jszip/jszip.min.js')}}"></script>
<script src="{{asset('plugins/pdfmake/pdfmake.min.js')}}"></script>
<script src="{{asset('plugins/pdfmake/vfs_fonts.js')}}"></script>
<script src="{{asset('plugins/datatables-buttons/js/buttons.html5.min.js')}}"></script>
<script src="{{asset('plugins/datatables-buttons/js/buttons.print.min.js')}}"></script>

<script>
    $(function () {
        $("#example1").DataTable({
            "responsive": true,
            "lengthChange": false,
            "autoWidth": false,
            "buttons": ["csv", "excel", "pdf", "print"]
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');

    });
</script>

@endsection
