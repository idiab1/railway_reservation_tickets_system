@extends('layouts.admin.app')

{{-- Title --}}
@section('title')
    {{ trans('site.list_trains') }}
@endsection

{{-- Styles --}}
@section('styles')
<!-- DataTables -->
<link rel="stylesheet" href="{{asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
<link rel="stylesheet" href="{{asset('plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
<!-- Select2 -->
<link rel="stylesheet" href="{{asset('plugins/select2/css/select2.min.css')}}">
<style>
    .select2-container .select2-selection--single {
        height: auto;
    }
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
    {{ trans('site.list_trains') }}
    <button type="button" class="btn btn-create btn-sm btn-primary btn-crayons"
        data-toggle="modal" data-target="#createNewItem">
        <i class="fas fa-plus"></i>
    </button>
@endsection

{{-- Breadcrumb --}}
@section('breadcrumb-item')
    <li class="breadcrumb-item">{{ trans('site.trains') }}<li>
@endsection

{{-- Content --}}
@section('content')
    <section class="train-section section">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <!-- Card body -->
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
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
                                @if ($trains->count() > 0)
                                    @foreach ($trains as $train)
                                        <tr>
                                            <td>{{$id++}}</td>
                                            <!-- Name of train -->
                                            <td>{{$train->name}}</td>
                                            <td>
                                                <!-- Depature -->
                                                <ul class="list-unstyled">
                                                    <li>{{$train->depature_station}}</li>
                                                    <li>{{date('d M, Y', strtotime($train->depature_at))}} &dash; {{date('h:m A', strtotime($train->depature_at))}}</li>
                                                </ul>
                                            </td>
                                            <td>
                                                <!-- Arrival -->
                                                <ul class="list-unstyled">
                                                    <li>{{$train->arrival_station}}</li>
                                                    <li>{{date('d M, Y', strtotime($train->arrival_at))}} &dash; {{date('h:m A', strtotime($train->arrival_at))}}</li>
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
                                                    href="{{route('trains.edit', ['id' => $train->id])}}">
                                                    <i class="fas fa-edit"></i>
                                                    {{ trans('site.edit') }}
                                                </a>
                                                <form class="d-inline-block" action="{{route('trains.destroy', ['id' => $train->id])}}" method="POST">
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
            <!-- /.card -->
            </div>
            <!--/.col-12 -->
        </div>
        <!--/.row -->

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
                            Add a new train
                        </h5>

                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <!-- End of Modal Header -->

                    <!-- Form -->
                    <form action="{{route('trains.store')}}" method="POST">
                        @csrf
                        <!-- Modal Body -->
                        <div class="modal-body">
                            <!-- Name -->
                            <div class="form-group">
                                <label for="name">{{ trans('site.name') }}</label>
                                <input type="text" class="form-control" id="name"
                                    name="name" placeholder="{{trans('site.enter_name_train')}}"
                                    required>
                            </div>

                            <!-- Train Type -->
                            <div class="form-group">
                                <label for="type_id">{{ trans('site.train_type') }}</label>
                                <!-- All types -->
                                <select class="form-control select2 searchable" name="type_id"
                                    id="type_id" required>
                                    <option value="0" >{{trans('site.all_types')}}</option>
                                    @foreach ($types as $type)
                                        <option value="{{$type->id}}">{{$type->name}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <!-- Train Type / Seats Count -->
                            <div class="form-group">
                                <div class="row">

                                    <!-- Seats available -->
                                    <div class="col">
                                        <label for="seats_available">{{ trans('site.seats_available') }}</label>
                                        <input type="number" class="form-control" id="seats_available"
                                            name="seats_count" placeholder="{{trans('site.enter_seats_available_train')}}"
                                            required>
                                    </div>
                                    <!-- End of Seats available -->

                                    <!-- Train price -->
                                    <div class="col">
                                        <label for="price">{{ trans('site.train_price') }}</label>
                                        <input type="number" class="form-control" id="price"
                                            name="price" placeholder="{{trans('site.enter_train_price')}}"
                                            required>
                                    </div>
                                    <!-- End of Train price -->

                                </div>
                            </div>

                            <!-- Depature Station / Time -->
                            <div class="form-group">
                                <div class="row">
                                    <div class="col">
                                        <label for="depature_station">{{ trans('site.depature_station') }}</label>
                                        <!-- All stations -->
                                        <select class="form-control select2 searchable" name="depature_station_id"
                                            id="depature_station" required>
                                            <option value="" >{{trans('site.all_stations')}}</option>
                                            @foreach ($stations as $station)
                                                <option value="{{$station->id}}">{{$station->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col">
                                        <label for="depature_at">{{ trans('site.depature_at') }}</label>
                                        <input class="form-control" type="datetime-local" id="depature_at"
                                            name="depature_at" required>
                                    </div>
                                </div>
                            </div>
                            <!-- Arrival Station / Time -->
                            <div class="form-group m-0">
                                <div class="row">
                                    <div class="col">
                                        <label for="arrival_station">{{ trans('site.arrival_station') }}</label>
                                        <!-- All stations -->
                                        <select class="form-control select2 searchable" name="arrival_station_id"
                                            id="arrival_station" required>
                                            <option value="" >{{trans('site.all_stations')}}</option>
                                            @foreach ($stations as $station)
                                                <option value="{{$station->id}}" >{{$station->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col">
                                        <label for="arrival_at">{{ trans('site.arrival_at') }}</label>
                                        <input class="form-control" type="datetime-local" id="arrival_at"
                                            name="arrival_at" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End of Modal Body -->
                        <!-- Modal Footer -->
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary btn-add btn-crayons">
                                {{ trans('site.add') }}
                            </button>
                        </div>
                        <!-- End of Card Footer -->
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

<!-- Select 2 -->
<script src="{{asset('plugins/select2/js/select2.min.js')}}"></script>
<script>
    $(document).ready(function(){
        $('.select2').select2();
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
