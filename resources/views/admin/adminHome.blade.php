@extends('layouts.admin.app')

{{-- Title --}}
@section('title')
    Home
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
    .dataTables_length{
        float: right;
        margin-bottom: 12px;
    }
    .card h4.header{
        color: #b8405e;
        font-weight: 600;
        font-size: 1.35rem;
    }
</style>

@endsection

{{-- Page name --}}
@section('page_name')
    {{ trans('site.control_panel') }}
@endsection

{{-- Content --}}
@section('content')
    <!-- Homepage -->
    <section class="homepage">

        <!-- Status Content -->
        <div class="status-content pb-4">
            <div class="row">
                <div class="col-12 col-sm-6 col-md-3">
                    <!-- Project box -->
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3>{{$trainsCount}}</h3>
                            <p>{{ trans('site.trains') }}</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-train"></i>
                        </div>
                        <a href="{{route("trains.index")}}" class="small-box-footer">
                            {{ trans('site.more_info') }} <i class="fas fa-arrow-circle-right"></i>
                        </a>
                    </div>
                    <!-- End of Project box -->
                </div>
                <!-- ./col -->
                <div class="col-12 col-sm-6 col-md-3">
                    <!-- Tasks box -->
                    <div class="small-box bg-success">
                        <div class="inner">
                            <h3>{{$passengersCount}}</h3>
                            <p>{{ trans('site.passengers') }}</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-users"></i>
                        </div>
                        <a href="{{route('passengers.index')}}" class="small-box-footer">
                            {{ trans('site.more_info') }} <i class="fas fa-arrow-circle-right"></i>
                        </a>
                    </div>
                    <!-- End of Tasks box -->
                </div>
                <div class="col-12 col-sm-6 col-md-3">
                    <!-- Tasks box -->
                    <div class="small-box bg-primary">
                        <div class="inner">
                            <h3>{{$servationsCount}}</h3>
                            <p>{{ trans('site.reservations') }}</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-ticket-alt"></i>
                        </div>
                        <a href="{{route('reservations.index')}}" class="small-box-footer">
                            {{ trans('site.more_info') }} <i class="fas fa-arrow-circle-right"></i>
                        </a>
                    </div>
                    <!-- End of Tasks box -->
                </div>
                <!-- ./col -->
                <div class="col-12 col-sm-6 col-md-3">
                    <!-- Users box -->
                    <div class="small-box bg-warning">
                        <div class="inner">
                            <h3>{{$userCount}}</h3>
                            <p>{{ trans('site.users_registrations') }}</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-users"></i>
                        </div>
                        <a href="{{route("users.index")}}" class="small-box-footer">
                            {{ trans('site.more_info') }} <i class="fas fa-arrow-circle-right"></i>
                        </a>
                    </div>
                </div>
                <!-- ./col -->
            </div>
        </div>
        <!-- End of Status Content -->

        <div class="row">
            <div class="col-12 col-md-5">
                <div class="card">
                    <!-- Card body -->
                    <div class="card-body">
                        <h4 class="header">{{ trans('site.reservations') }}</h4>
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
                        <p class="p-2">{{ trans('site.waiting') }}</p>
                    </div>
                    <div class="reserve-content-list">

                    </div>
                </div>
            </div>

        </div>




    </section>
    <!-- End of Homepage -->
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
            "filter": false,
        })
        $('.header').appendTo("#example1_wrapper .col-md-6:eq(0)");
        $('.dataTables_length').appendTo("#example1_wrapper .col-md-6:eq(1)");

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
