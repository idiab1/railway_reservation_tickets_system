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
                                    <th>{{ trans('site.date') }}</th>
                                    <th>{{ trans('site.action') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $id = 1;
                                @endphp
                                @if ($reservations->count() > 0)
                                    @foreach ($reservations as $reservation)
                                        <tr>
                                            <td>{{$id++}}</td>
                                            <td>
                                                {{date('d M, Y', strtotime($reservation->created_at))}} &dash; {{date('h:m A', strtotime($reservation->created_at))}}
                                            </td>

                                            <td>
                                                <button class="btn btn-danger btn-sm btn-show" type="button" 
                                                    data-url="{{route("reserve.details", ["id" => $reservation->id])}}"
                                                    data-method="get" >
                                                    <i class="fas fa-list"></i>
                                                    {{ trans('site.show') }}
                                                </button>

                                                <!-- Delete button -->
                                                <form class="d-inline-block" action="{{route('reservations.destroy', ['id' => $reservation->id])}}" method="POST">
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
                
                
                <div class="content">
                    <div class="loading text-center">
                        <div class="loader"></div>
                        <p class="p-2">Waiting</p>
                    </div>
                    <div class="reserve-content-list">

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
<script src="{{asset('admin/js/reservation.js')}}"></script>

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

@if (app()->getLocale() == 'ar')
    <script src="{{asset('plugins/datatables/jquery.dataTables-ar.js')}}"></script>
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
@endif
@endsection
