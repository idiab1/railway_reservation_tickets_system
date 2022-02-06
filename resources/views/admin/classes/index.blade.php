@extends('layouts.admin.app')

{{-- Title --}}
@section('title')
    {{ trans('site.list_classes') }}
@endsection

{{-- Styles --}}
@section('styles')
<!-- DataTables -->
<link rel="stylesheet" href="{{asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
@endsection


{{-- Page name --}}
@section('page_name')
    {{ trans('site.list_classes') }}
@endsection

{{-- Breadcrumb --}}
@section('breadcrumb-item')
    <li class="breadcrumb-item">{{ trans('site.classes') }}<li>
@endsection

{{-- Content --}}
@section('content')
    <section class="class-section">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <!-- Card Header -->
                    <div class="card-header">
                        <div class="row">
                            <div class="col-6">
                                <!-- Card Title -->
                                <h3 class="card-title">
                                    {{ trans('site.list_classes') }}
                                </h3>
                                <!-- /End of card title -->
                            </div>
                            <div class="col-6">
                                {{-- <a class="btn btn-create btn-sm btn-primary btn-crayons float-right" href="{{route('classes.create')}}">
                                    <i class="fas fa-plus"></i>
                                    {{ trans('site.add_class') }}
                                </a> --}}
                            </div>
                        </div>
                    </div>
                    <!-- /End of card-header -->

                    <!-- Card body -->
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>{{ trans('site.class_name') }}</th>
                                    <th>{{ trans('site.class_price') }}</th>
                                    <th>{{ trans('site.seats_count') }}</th>
                                    <th>{{ trans('site.action') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $id = 1;
                                @endphp
                                @if ($classes->count() > 0)
                                    @foreach ($classes as $class)
                                        <tr>
                                            <td>{{$id++}}</td>
                                            <td>{{$class->class_name}}</td>
                                            <td>{{ trans('site.currency') }} {{$class->class_price}}</td>
                                            <td>{{$class->seats_count}}</td>
                                            <td>
                                                {{-- <a class="btn btn-success d-inline-block btn-sm btn-edit" href="{{route('classes.edit', ['id' => $class->id])}}">
                                                    <i class="fas fa-edit"></i>
                                                    {{ trans('site.edit') }}
                                                </a> --}}
                                                <form class="d-inline-block" action="{{route('classes.destroy', ['id' => $class->id])}}" method="POST">
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
                                    <th>{{ trans('site.class_name') }}</th>
                                    <th>{{ trans('site.class_price') }}</th>
                                    <th>{{ trans('site.seats_count') }}</th>
                                    <th>{{ trans('site.action') }}</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                    <!-- /end of card-body -->
                </div>
            <!-- /.card -->
            </div>
            <!--/.col-12 -->
        </div>
        <!--/.row -->
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
