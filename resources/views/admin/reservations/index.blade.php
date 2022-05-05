@extends('layouts.admin.app')

{{-- Title --}}
@section('title')
    {{ trans('site.list_reservations') }}
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
    {{ trans('site.list_reservations') }}
@endsection

{{-- Breadcrumb --}}
@section('breadcrumb-item')
    <li class="breadcrumb-item">{{ trans('site.reservations') }}<li>
@endsection

{{-- Content --}}
@section('content')
    <section class="reservations-section section">
        <div class="row">
            <div class="col-12 col-md-5">
                <div class="card">
                    <!-- Card body -->
                    <div class="card-body">
                        <div class="">
                            <div class="row buttons">
                                <div class="col-sm-12 col-md-5">

                                </div>
                                <div class="col-sm-12 col-md-7 ">

                                </div>
                            </div>
                        </div>
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>{{ trans('site.name') }}</th>
                                    <th>{{ trans('site.date') }}</th>
                                    <th>{{ trans('site.action') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $id = 1;
                                @endphp
                                @if ($reservations->count() > 0)
                                    @foreach ($reservations as $train)
                                        <tr>
                                            <td>{{$id++}}</td>
                                            <!-- Name of train -->
                                            <td>{{$train->name}}</td>

                                            <td>
                                                <button class="btn btn-danger btn-sm btn-show" type="button">
                                                    <i class="fas fa-list"></i>
                                                    {{ trans('site.show') }}
                                                </button>

                                                <!-- Delete button -->
                                                <form class="d-inline-block" action="{{route('reservations.destroy', ['id' => $train->id])}}" method="POST">
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
                                    <th>{{ trans('site.date') }}</th>
                                    <th>{{ trans('site.action') }}</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                    <!-- /end of card-body -->
                </div>
                <!-- /.card -->
            </div>
            <div class="col-12 col-md-7">
                {{-- <div class="card">
                    <!-- Card body -->
                    <div class="card-body">
                        <table id="example2" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>{{ trans('site.name') }}</th>
                                    <th>{{ trans('site.depature_station') }}</th>
                                    <th>{{ trans('site.arrival_station') }}</th>
                                    <th>{{ trans('site.train_type') }}</th>
                                    <th>{{ trans('site.seats_count') }}</th>
                                    <th>{{ trans('site.action') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $id = 1;
                                @endphp
                                @if ($reservations->count() > 0)
                                    @foreach ($reservations as $train)
                                        <tr>
                                            <td>{{$id++}}</td>
                                            <!-- Name of train -->
                                            <td>{{$train->name}}</td>
                                            <td>
                                                <!-- Depature -->
                                                <ul class="list-unstyled">
                                                    <li>{{$train->depature_station}}</li>
                                                    <li>{{$train->depature_at}}</li>
                                                </ul>
                                            </td>
                                            <td>
                                                <!-- Arrival -->
                                                <ul class="list-unstyled">
                                                    <li>{{$train->arrival_station}}</li>
                                                    <li>{{$train->arrival_at}}</li>
                                                </ul>
                                            </td>
                                            <td>
                                                {{$train->type->name}}
                                            </td>
                                            <td>
                                                {{$train->seats_count}}
                                            </td>
                                            <td>
                                                <a class="btn btn-success d-inline-block btn-sm btn-edit"
                                                    href="{{route('reservations.edit', ['id' => $train->id])}}">
                                                    <i class="fas fa-edit"></i>
                                                    {{ trans('site.edit') }}
                                                </a>
                                                <form class="d-inline-block" action="{{route('reservations.destroy', ['id' => $train->id])}}" method="POST">
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
                                    <th>{{ trans('site.depature_station') }}</th>
                                    <th>{{ trans('site.arrival_station') }}</th>
                                    <th>{{ trans('site.train_type') }}</th>
                                    <th>{{ trans('site.seats_count') }}</th>
                                    <th>{{ trans('site.action') }}</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                    <!-- /end of card-body -->
                </div>
                <!-- /.card --> --}}
                <div class="content">
                    <div class="loading text-center">
                        <div class="loader"></div>
                        <p class="p-2">Waiting</p>
                    </div>
                    <div class="tickets-content-list">

                    </div>
                </div>
            </div>

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
            "buttons": ["excel", "print"]
        }).buttons().container().appendTo('.buttons .col-md-5');
        $('div.dataTables_filter').appendTo(".buttons .col-md-7");

        $("#example2").DataTable({
            "responsive": true,
            "lengthChange": false,
            "autoWidth": false,
            "buttons": ["excel", "print"]
        }).buttons().container().appendTo('#example2_wrapper .col-md-6:eq(0)');
    });
</script>

@endsection
