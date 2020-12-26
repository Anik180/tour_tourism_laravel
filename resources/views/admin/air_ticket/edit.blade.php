@extends('layouts.app')
@section('title','Air ticket') 
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
                  <li><a href="javascript:void(0);"><i class="material-icons">content_copy</i>Air ticket update</a></li>
               </ol>
            </div>
         </div>
      </div>
   </div>
   <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
      <div class="card">
         <div class="header">
            <h2>Update Air ticket</h2>
         </div>
         <div class="body">
            <form action="{{URL::to('air-tickets',$airtickets->id)}}" method="POST" enctype="multipart/form-data">
               @csrf
               @method('PUT')
               <div class="row">
                  <div class="col-md-6">
                     <label>Air ticket category name</label>ty
                     <select class="form-control show-tick" name="cat_id">
                        @foreach($ticketcategory as $row)
                        <option value="{{$row->id}}" <?php if($row->id==$airtickets->cat_id){echo "Selected";}?>>{{$row->ticket_category}}</option>
                        @endforeach
                     </select>
                  </div>
                  <div class="col-md-6">
                     <label>Air ticket subcategory name</label>ty
                     <select class="form-control show-tick" name="subcat_id">
                        @foreach($ticketsubcategory as $row)
                        <option value="{{$row->id}}" <?php if($row->id==$airtickets->subcat_id){echo "Selected";}?>>{{$row->ticket_subcategory}}</option>
                        @endforeach
                     </select>
                  </div>
               </div>
               <div class="row">
                  <div class="col-md-12">
                     <label>Title</label>
                     <div class="form-group ">
                        <div class="form-line">
                           <input type="text" name="title" class="form-control" value="{{$airtickets->title}}">
                        </div>
                     </div>
                  </div>
               </div>
               <div class="row clearfix">
                  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                     <div class="header">
                        <h2>
                           Description
                        </h2>
                     </div>
                     <div class="body">
                        <textarea id="tinymce" name="description">{{$airtickets->description}}</textarea>
                     </div>
                  </div>
               </div>
               <br>
               <button type="submit" class="btn btn-primary m-t-15 waves-effect">Update</button>
               <a href="{{url('air-tickets')}}" class="btn btn-danger m-t-15 waves-effect">back</a>
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