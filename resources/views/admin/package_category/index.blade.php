@extends('layouts.app')
@section('title','Package Category') 
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
                                <li><a href="javascript:void(0);"><i class="material-icons">content_copy</i>Package Category</a></li>
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
                                Package Category List
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
                                            <th>Package category Name</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Package category Name</th>
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        @foreach($package_category as $row)
                                        <tr>
                                            <td>{{$row->package_category_name}}</td>
                                            <td>
                                      {{--           <a type="button" class="btn btn-info waves-effect">
                                                    <i class="material-icons">edit</i>
                                            </a> --}}

                                            <a
                                            class="btn btn-info waves-effect btn-md"
                                            id="item_edit"
                                            href="javascript:void(0);"
                                            data-id="<?php echo $row->id; ?>"
                                            data-package_category_name="<?php echo $row->package_category_name; ?>"

                                        >
                                            <i class="material-icons">edit</i>
                                        </a>
        
                                             <button class="btn btn-danger waves-effect" type="button" onclick="deletePackage_category_name({{ $row->id }})">
                                                    <i class="material-icons">delete</i>
                                                </button>
                                                <form id="delete-form-{{ $row->id }}" action="{{ route('package-category.destroy',$row->id) }}" method="POST" style="display: none;">
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
                            <h4 class="modal-title" id="defaultModalLabel">Add Package category</h4>
                        </div>
                        <div class="modal-body">
                            <form action="{{route('package-category.store')}}" method="POST">
                                @csrf
                                <label>Package category name</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" name="package_category_name" class="form-control" placeholder="Enter Package category name">
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
                            <h4 class="modal-title" id="defaultModalLabel">Update Package category</h4>
                        </div>
                        <div class="modal-body">
                            <form action="{{url('package-category/package-category-update')}}" method="POST">
                                @csrf
                                @method('PUT')
                                <label>Package category Name</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" id="package_category_name" name="package_category_name" class="form-control">
                                    </div>
                                </div>
                                <br>
                           <input type="hidden" name="package_category_id" id="package_category_id" />
                            
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
        function deletePackage_category_name(id) {
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
            var package_category_name = $(this).data("package_category_name");
            $("#modal-edit").modal("show");
            $("#package_category_id").val(id);
            $("#package_category_name").val(package_category_name);

        });
    });
</script>
@endpush

 @endsection