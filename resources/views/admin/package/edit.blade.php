@extends('layouts.app')
@section('title','package') 
@section('content')
@push('css')
<!-- Colorpicker Css -->
    <link href="{{asset('public/admin/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.css')}}" rel="stylesheet" />

    <!-- Dropzone Css -->
    <link href="{{asset('public/admin/plugins/dropzone/dropzone.css')}}" rel="stylesheet">

    <!-- Multi Select Css -->
    <link href="{{asset('public/admin/plugins/multi-select/css/multi-select.css')}}" rel="stylesheet">

    <!-- Bootstrap Spinner Css -->
    <link href="{{asset('public/admin/plugins/jquery-spinner/css/bootstrap-spinner.css')}}" rel="stylesheet">

    <!-- Bootstrap Tagsinput Css -->
    <link href="{{asset('public/admin/plugins/bootstrap-tagsinput/bootstrap-tagsinput.css')}}" rel="stylesheet">

    <!-- Bootstrap Select Css -->
    <link href="{{asset('public/admin/plugins/bootstrap-select/css/bootstrap-select.css')}}" rel="stylesheet" />

    <!-- noUISlider Css -->
    <link href="{{asset('public/admin/plugins/nouislider/nouislider.min.css')}}" rel="stylesheet" />

    <!-- Custom Css -->
    <link href="{{asset('public/admin/css/style.css')}}" rel="stylesheet">
@endpush
        <div class="container-fluid">
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="body">
                            <ol class="breadcrumb breadcrumb-bg-blue align-right">
                                <li><a href="javascript:void(0);"><i class="material-icons">home</i> Dashboard</a></li>
                                <li><a href="javascript:void(0);"><i class="material-icons">content_copy</i>package update</a></li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>


                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                         <div class="header">
                         	<h2>Update Package</h2>
                         </div>
                        <div class="body">
                            <form action="{{route('packages.update',$package->id)}}" method="POST" enctype="multipart/form-data">
                            	@csrf
                                @method('PUT')
                                <div class="row">
                                <div class="col-md-6">
                                <label>Title</label>
                                <div class="form-group ">
                                    <div class="form-line">
                                        <input type="text" name="title" class="form-control" value="{{$package->title}}">
                                    </div>
                                </div>
                                </div>
                                <div class="col-md-6">
                                <label>Image</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="file" name="image" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                            <label for="exampleInputFile">Old Image</label><br>
                           <img src="{{URL::to($package->image)}}" style="height: 40px;width: 70px;">
                          <input type="hidden" name="old_image" value="{{$package->image}}">
                       </div>
                                </div>

                                <div class="row">
                                <div class="col-md-6">
                                <label>Package category name</label>ty
                                        <select class="form-control show-tick" name="package_category_id">
                                        @foreach($package_category as $row)
                                        <option value="{{$row->id}}" <?php if($row->id==$package->package_category_id){echo "Selected";}?>>{{$row->package_category_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-6">
                                <label>Package Subcategory name</label>ty
                                        <select class="form-control show-tick" name="subcat_id">
                                        @foreach($subcategories as $row)
                                        <option value="{{$row->id}}" <?php if($row->id==$package->subcat_id){echo "Selected";}?>>{{$row->subcat}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-6">
                                <label>Package Price</label>
                                <div class="form-group ">
                                    <div class="form-line">
                                        <input type="text" name="package_price" class="form-control" value="{{$package->package_price}}">
                                    </div>
                                </div>
                                </div>
                                </div>

                                <div class="row">
                                <div class="col-md-6">
                                <label>Package Date</label>
                                <div class="form-group ">
                                    <div class="form-line">
                                        <input type="date" name="date" class="form-control" value="{{$package->date}}">
                                    </div>
                                </div>
                                </div>
                                <div class="col-md-6">
                                <label>Promotion</label>
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" name="promotion" class="form-control" value="{{$package->promotion}}">
                                    </div>
                                </div>
                            </div>
                                </div>
                 <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                   
                        <div class="header">
                            <h2>
                               Package details
                            </h2>
                        </div>
                        <div class="body">
                            <textarea id="tinymce" name="package_details">{{$package->package_details}}</textarea>
                        </div>
                   
                </div>
            </div>
                                <br>
                                <button type="submit" class="btn btn-primary m-t-15 waves-effect">Update</button>
                                <a href="{{url('packages')}}" class="btn btn-danger m-t-15 waves-effect">back</a>
                            </form>
                        </div>
                    </div>
                </div>


        </div>


@push('js')

 <script src="{{ asset('public/admin/plugins/tinymce/tinymce.js') }}"></script>
    <script>
        $(function () {
            //TinyMCE
            tinymce.init({
                selector: "textarea#tinymce",
                theme: "modern",
                height: 300,
                plugins: [
                    'advlist autolink lists link image charmap print preview hr anchor pagebreak',
                    'searchreplace wordcount visualblocks visualchars code fullscreen',
                    'insertdatetime media nonbreaking save table contextmenu directionality',
                    'emoticons template paste textcolor colorpicker textpattern imagetools'
                ],
                toolbar1: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
                toolbar2: 'print preview media | forecolor backcolor emoticons',
                image_advtab: true
            });
            tinymce.suffix = ".min";
            tinyMCE.baseURL = '{{ asset('public/admin/plugins/tinymce') }}';
        });
    </script>
 <!-- Bootstrap Colorpicker Js -->
    <script src="{{asset('public/admin//plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.js')}}"></script>

    <!-- Dropzone Plugin Js -->
    <script src="{{asset('public/admin//plugins/dropzone/dropzone.js')}}"></script>

    <!-- Input Mask Plugin Js -->
    <script src="{{asset('public/admin//plugins/jquery-inputmask/jquery.inputmask.bundle.js')}}"></script>

    <!-- Multi Select Plugin Js -->
    <script src="{{asset('public/admin//plugins/multi-select/js/jquery.multi-select.js')}}"></script>

    <!-- Jquery Spinner Plugin Js -->
    <script src="{{asset('public/admin//plugins/jquery-spinner/js/jquery.spinner.js')}}"></script>

    <!-- Bootstrap Tags Input Plugin Js -->
    <script src="{{asset('public/admin/plugins/bootstrap-tagsinput/bootstrap-tagsinput.js')}}"></script>

    <!-- noUISlider Plugin Js -->
    <script src="{{asset('public/admin//plugins/nouislider/nouislider.js')}}"></script>

    <script src="{{asset('public/admin/js/pages/forms/advanced-form-elements.js')}}"></script>
    
@endpush
@endsection