@extends('layouts.app')
@section('title','Visa') 
@section('content')
@push('css')

  <!-- JQuery DataTable Css -->
    <link href="{{asset('public/admin/plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css')}}" rel="stylesheet">
@endpush
        <div class="container-fluid">
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="body">
                            <ol class="breadcrumb breadcrumb-bg-blue align-right">
                                <li><a href="javascript:void(0);"><i class="material-icons">home</i> Dashboard</a></li>
                                <li><a href="javascript:void(0);"><i class="material-icons">content_copy</i>Visa</a></li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Exportable Table -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Visa List
                            </h2>
                            <ul class="header-dropdown m-r--5">
                                <button type="button" class="btn btn-success waves-effect" data-toggle="modal" data-target="#defaultModal">
                                    <i class="material-icons">add</i>
                                    <span>Add New</span>
                                </button>
                            </ul>
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                                    <thead>
                                        <tr>
                                            <th>Visa country</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Visa country</th>
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        @foreach($visa as $row)
                                        <tr>
                                            <td>{{$row->visa_country}}</td>
                                            <td>
                                      {{--           <a type="button" class="btn btn-info waves-effect">
                                                    <i class="material-icons">edit</i>
                                            </a> --}}

                                            <a
                                            class="btn btn-info waves-effect btn-md"
                                            id="item_edit"
                                            href="javascript:void(0);"
                                            data-id="<?php echo $row->id; ?>"
                                            data-visa_country="<?php echo $row->visa_country; ?>"

                                        >
                                            <i class="material-icons">edit</i>
                                        </a>
        
                                             <button class="btn btn-danger waves-effect" type="button" onclick="deleteVisa_country({{ $row->id }})">
                                                    <i class="material-icons">delete</i>
                                                </button>
                                                <form id="delete-form-{{ $row->id }}" action="{{ route('visas.destroy',$row->id) }}" method="POST" style="display: none;">
                                                    @csrf
                                                    @method('DELETE')
                                                </form>
                                            </td>
                                        </tr>
                                        @endforeach
                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Exportable Table -->
                        <!-- add modal -->
            <div class="modal fade" id="defaultModal" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="defaultModalLabel">Add Visa country</h4>
                        </div>
                        <div class="modal-body">
                            <form action="{{route('visas.store')}}" method="POST">
                                @csrf
                                <label>Visa country</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" name="visa_country" class="form-control" placeholder="Enter Visa country">
                                    </div>
                                </div>
                                <br>
                           
                            
                        </div>
                        <div class="modal-footer">
                           <button type="submit" class="btn btn-success waves-effect">SAVE</button>
                            <button type="button" class="btn btn-danger waves-effect" data-dismiss="modal">CLOSE</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
                                    <!-- edit modal -->
            <div class="modal fade" id="modal-edit" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="defaultModalLabel">Update Visa</h4>
                        </div>
                        <div class="modal-body">
                            <form action="{{url('visas/visas-update')}}" method="POST">
                                @csrf
                                @method('PUT')
                                <label>Visa country</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" id="visa_country" name="visa_country" class="form-control">
                                    </div>
                                </div>
                                <br>
                           <input type="hidden" name="visa_id" id="visa_id" />
                            
                        </div>
                        <div class="modal-footer">
                           <button type="submit" class="btn btn-success waves-effect">UPDATE</button>
                            <button type="button" class="btn btn-danger waves-effect" data-dismiss="modal">CLOSE</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
@push('js')
     <!-- Jquery DataTable Plugin Js -->
    <script src="{{asset('public/admin/plugins/jquery-datatable/jquery.dataTables.js')}}"></script>
    <script src="{{asset('public/admin/plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js')}}"></script>
    <script src="{{asset('public/admin/plugins/jquery-datatable/extensions/export/dataTables.buttons.min.js')}}"></script>
    <script src="{{asset('public/admin/plugins/jquery-datatable/extensions/export/buttons.flash.min.js')}}"></script>
    <script src="{{asset('public/admin/plugins/jquery-datatable/extensions/export/jszip.min.js')}}"></script>
    <script src="{{asset('public/admin/plugins/jquery-datatable/extensions/export/pdfmake.min.js')}}"></script>
    <script src="{{asset('public/admin/plugins/jquery-datatable/extensions/export/vfs_fonts.js')}}"></script>
    <script src="{{asset('public/admin/plugins/jquery-datatable/extensions/export/buttons.html5.min.js')}}"></script>
    <script src="{{asset('public/admin/plugins/jquery-datatable/extensions/export/buttons.print.min.js')}}"></script>
    <script src="{{asset('public/admin/js/pages/tables/jquery-datatable.js')}}"></script>
<script src="https://unpkg.com/sweetalert2@7.19.1/dist/sweetalert2.all.js"></script>
    <script type="text/javascript">
        function deleteVisa_country(id) {
            swal({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!',
                cancelButtonText: 'No, cancel!',
                confirmButtonClass: 'btn btn-success',
                cancelButtonClass: 'btn btn-danger',
                buttonsStyling: false,
                reverseButtons: true
            }).then((result) => {
                if (result.value) {
                    event.preventDefault();
                    document.getElementById('delete-form-'+id).submit();
                } else if (
                    // Read more about handling dismissals
                    result.dismiss === swal.DismissReason.cancel
                ) {
                    swal(
                        'Cancelled',
                        'Your data is safe :)',
                        'error'
                    )
                }
            })
        }
    </script>

    <script type="text/javascript">
    $(document).ready(function () {
        $("table").on("click", "#item_edit", function () {
            var id = $(this).data("id");
            var visa_country = $(this).data("visa_country");
            $("#modal-edit").modal("show");
            $("#visa_id").val(id);
            $("#visa_country").val(visa_country);

        });
    });
</script>
@endpush

 @endsection