@extends('layouts.app')
@section('title','Air ticket category') 
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
                                <li><a href="javascript:void(0);"><i class="material-icons">content_copy</i>Air ticket category</a></li>
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
                                Air ticket category List
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
                                            <th>Air ticket category Name</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Air ticket category Name</th>
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        @foreach($ticketcategory as $row)
                                        <tr>
                                            <td>{{$row->ticket_category}}</td>
                                            <td>
                                            <a
                                            class="btn btn-info waves-effect btn-md"
                                            id="item_edit"
                                            href="javascript:void(0);"
                                            data-id="<?php echo $row->id; ?>"
                                            data-ticket_category="<?php echo $row->ticket_category; ?>"

                                        >
                                            <i class="material-icons">edit</i>
                                        </a>
        
                                             <button class="btn btn-danger waves-effect" type="button" onclick="deleteTicketcategory({{ $row->id }})">
                                                    <i class="material-icons">delete</i>
                                                </button>
                                                <form id="delete-form-{{ $row->id }}" action="{{ route('ticket-categories.destroy',$row->id) }}" method="POST" style="display: none;">
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
                            <h4 class="modal-title" id="defaultModalLabel">Add Destination</h4>
                        </div>
                        <div class="modal-body">
                            <form action="{{route('ticket-categories.store')}}" method="POST">
                                @csrf
                                <label>Air ticket category name</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" name="ticket_category" class="form-control" placeholder="Enter Air ticket category Name">
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
                            <h4 class="modal-title" id="defaultModalLabel">Update Air ticket category</h4>
                        </div>
                        <div class="modal-body">
                            <form action="{{url('ticket-categories/ticket-categories-update')}}" method="POST">
                                @csrf
                                @method('PUT')
                                <label>Air ticket category name</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" id="ticket_category" name="ticket_category" class="form-control">
                                    </div>
                                </div>
                                <br>
                           <input type="hidden" name="ticket_category_id" id="ticket_category_id" />
                            
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
        function deleteTicketcategory(id) {
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
            var ticket_category = $(this).data("ticket_category");
            $("#modal-edit").modal("show");
            $("#ticket_category_id").val(id);
            $("#ticket_category").val(ticket_category);

        });
    });
</script>
@endpush

 @endsection