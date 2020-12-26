@extends('layouts.app')
@section('title','Contact us') 
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
                                <li><a href="javascript:void(0);"><i class="material-icons">content_copy</i>Contact us</a></li>
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
                                Contact us List
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
                                            <th>Office name</th>
                                            <th>Address</th>
                                            <th>Phone</th>
                                            <th>Telephone</th>
                                            <th>Email</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Office name</th>
                                            <th>Address</th>
                                            <th>Phone</th>
                                            <th>Telephone</th>
                                            <th>Email</th>
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        @foreach($contact as $row)
                                        <tr>
                                            <td>{{$row->office_name}}</td>
                                            <td>{{$row->address}}</td>
                                            <td>{{$row->phone}}</td>
                                            <td>{{$row->telephone}}</td>
                                            <td>{{$row->email}}</td>
                                            <td>
                                            <a
                                            class="btn btn-info waves-effect btn-md"
                                            id="item_edit"
                                            href="javascript:void(0);"
                                            data-id="<?php echo $row->id; ?>"
                                            data-office_name="<?php echo $row->office_name; ?>"
                                            data-address="<?php echo $row->address; ?>"
                                            data-phone="<?php echo $row->phone; ?>"
                                            data-telephone="<?php echo $row->telephone; ?>"
                                            data-email="<?php echo $row->email; ?>"

                                        >
                                            <i class="material-icons">edit</i>
                                        </a>
        
                                             <button class="btn btn-danger waves-effect" type="button" onclick="deleteContact_us({{ $row->id }})">
                                                    <i class="material-icons">delete</i>
                                                </button>
                                                <form id="delete-form-{{ $row->id }}" action="{{ route('contact_us.destroy',$row->id) }}" method="POST" style="display: none;">
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
                            <h4 class="modal-title" id="defaultModalLabel">Add Contact</h4>
                        </div>
                        <div class="modal-body">
                            <form action="{{route('contact_us.store')}}" method="POST">
                                @csrf
                                <label>Office name</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" name="office_name" class="form-control" placeholder="Enter office_name">
                                    </div>
                                </div>
                                 <label>Address</label>
                                 <div class="form-group">
                                    <div class="form-line">
                                        <textarea  name="address" class="form-control" placeholder="Enter address"></textarea>
                                    </div>
                                </div>
                                <label>Phone</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="number" name="phone" class="form-control" placeholder="Enter Package phone">
                                    </div>
                                </div>
                                <label>Telephone</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="number" name="telephone" class="form-control" placeholder="Enter telephone">
                                    </div>
                                </div>
                                <label>Email</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" name="email" class="form-control" placeholder="Enter email">
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
                            <h4 class="modal-title" id="defaultModalLabel">Update Contact Us</h4>
                        </div>
                        <div class="modal-body">
                            <form action="{{url('contact_us/contact-us-update')}}" method="POST">
                                @csrf
                                @method('PUT')
                                <label>Office name</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" name="office_name" id="office_name" class="form-control" placeholder="Enter office_name">
                                    </div>
                                </div>
                                 <label>Address</label>
                                 <div class="form-group">
                                    <div class="form-line">
                                        <textarea  name="address" id="address" class="form-control" placeholder="Enter address"></textarea>
                                    </div>
                                </div>
                                <label>Phone</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="number" name="phone" id="phone" class="form-control" placeholder="Enter Package phone">
                                    </div>
                                </div>
                                <label>Telephone</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="number" name="telephone" id="telephone" class="form-control" placeholder="Enter telephone">
                                    </div>
                                </div>
                                <label>Email</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" name="email" id="email" class="form-control" placeholder="Enter email">
                                    </div>
                                </div>
                                <br>
                           <input type="hidden" name="contact_us_id" id="contact_us_id" />
                            
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
        function deleteContact_us(id) {
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
            var office_name = $(this).data("office_name");
            var address = $(this).data("address");
            var phone = $(this).data("phone");
            var telephone = $(this).data("telephone");
            var email = $(this).data("email");
            $("#modal-edit").modal("show");
            $("#contact_us_id").val(id);
            $("#office_name").val(office_name);
            $("#address").val(address);
            $("#phone").val(phone);
            $("#telephone").val(telephone);
            $("#email").val(email);

        });
    });
</script>
@endpush

 @endsection