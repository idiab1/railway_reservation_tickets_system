@extends('layouts.admin.app')

{{-- Title --}}
@section('title')
    {{ trans('site.list_passengers') }}
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
    {{ trans('site.list_passengers') }}
    <button type="button" class="btn btn-create btn-sm btn-primary btn-crayons"
        data-toggle="modal" data-target="#createNewItem">
        <i class="fas fa-plus"></i>
    </button>
@endsection

{{-- Breadcrumb --}}
@section('breadcrumb-item')
    <li class="breadcrumb-item">{{ trans('site.passengers') }}<li>
@endsection

{{-- Content --}}
@section('content')
    <section class="passenger-section section">
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
                                    <th>{{ trans('site.email') }}</th>
                                    <th>{{ trans('site.register') }}</th>
                                    <th>{{ trans('site.action') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $id = 1;
                                @endphp
                                @if ($passengers->count() > 0)
                                    @foreach ($passengers as $passenger)
                                        <tr>
                                            <td>{{$id++}}</td>
                                            <td>{{$passenger->name}}</td>
                                            <td>{{$passenger->email}}</td>
                                            <td>{{$passenger->created_at->diffForHumans()}}</td>
                                            
                                            
                                            <td>
                                                <a class="btn btn-success d-inline-block btn-sm btn-edit"
                                                    href="{{route('passengers.edit', ['id' => $passenger->id])}}">
                                                    <i class="fas fa-edit"></i>
                                                    {{ trans('site.edit') }}
                                                </a>
                                                <form class="d-inline-block" action="{{route('passengers.destroy', ['id' => $passenger->id])}}" method="POST">
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
                                    <th>{{ trans('site.email') }}</th>
                                    <th>{{ trans('site.register') }}</th>
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
                       {{ trans('site.add_user') }}
                   </h5>

                   <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                       <span aria-hidden="true">&times;</span>
                   </button>
               </div>
               <!-- End of Modal Header -->

               <!-- Form -->
               <form action="{{route('passengers.store')}}" method="POST">
                   @csrf
                   <div class="modal-body">
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
                       <div class="form-group mb-0">
                           <label for="confirmPassword">{{ trans('site.confirm_password') }}</label>
                           <input class="form-control" type="password" id="confirmPassword"
                               name="password_confirmation" placeholder="{{trans('site.admin_confirm_password')}}"
                               required>
                       </div>

                   </div>
                   <!-- /.card-body -->

                   <div class="modal-footer">
                       <button type="submit" class="btn btn-primary btn-add btn-crayons">
                           {{ trans('site.add') }}
                       </button>
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

@endsection
