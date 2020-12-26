@extends('layouts.app')
@section('title','Site settings') 
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
                  <li><a href="javascript:void(0);"><i class="material-icons">content_copy</i>Site settings</a></li>
               </ol>
            </div>
         </div>
      </div>
   </div>
   <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
      <div class="card">
         <div class="header">
            <h2>Update Site settings</h2>
         </div>
         <div class="body">
            <form action="{{ url('update/config/withoutphoto/'.$config->id) }}" method="POST" enctype="multipart/form-data">
               @csrf
               <div class="row">
                  <div class="col-md-6">
                     <label>phone one</label>
                     <div class="form-group ">
                        <div class="form-line">
                           <input type="number" name="phone_one" class="form-control" value="{{$config->phone_one}}">
                        </div>
                     </div>
                  </div>
                  <div class="col-md-6">
                     <label>phone_two</label>
                     <div class="form-group">
                        <div class="form-line">
                           <input type="number" name="phone_two" class="form-control" value="{{$config->phone_two}}">
                        </div>
                     </div>
                  </div>
               </div>
               <div class="row">
                  <div class="col-md-6">
                     <label>phone three</label>
                     <div class="form-group ">
                        <div class="form-line">
                           <input type="number" name="phone_three" class="form-control" value="{{$config->phone_three}}">
                        </div>
                     </div>
                  </div>
                  <div class="col-md-6">
                     <label>phone four</label>
                     <div class="form-group">
                        <div class="form-line">
                           <input type="number" name="phone_four" class="form-control" value="{{$config->phone_four}}">
                        </div>
                     </div>
                  </div>
               </div>
               <div class="row">
                  <div class="col-md-6">
                     <label>phone five</label>
                     <div class="form-group ">
                        <div class="form-line">
                           <input type="number" name="phone_five" class="form-control" value="{{$config->phone_five}}">
                        </div>
                     </div>
                  </div>
                  <div class="col-md-6">
                     <label>Hotline</label>
                     <div class="form-group">
                        <div class="form-line">
                           <input type="number" name="phone_six" class="form-control" value="{{$config->phone_six}}">
                        </div>
                     </div>
                  </div>
               </div>
               <div class="row">
                  <div class="col-md-6">
                     <label>Email</label>
                     <div class="form-group">
                        <div class="form-line">
                           <input type="email" name="email" class="form-control" value="{{$config->email}}">
                        </div>
                     </div>
                  </div>
                  <div class="col-md-6">
                     <label>Location</label>
                     <div class="form-group ">
                        <div class="form-line">
                           <textarea name="location" class="form-control">{{$config->location}}</textarea> 
                        </div>
                     </div>
                  </div>
               </div>
               <div class="row">
                  <div class="col-md-6">
                     <label>Facebook</label>
                     <div class="form-group">
                        <div class="form-line">
                           <input type="text" name="facebook" class="form-control" value="{{$config->facebook}}">
                        </div>
                     </div>
                  </div>
                  <div class="col-md-6">
                     <label>Twitter</label>
                     <div class="form-group ">
                        <div class="form-line">
                           <input type="text" name="twitter" class="form-control" value="{{$config->twitter}}"> 
                        </div>
                     </div>
                  </div>
               </div>
               <div class="row">
                  <div class="col-md-6">
                     <label>Google Plus</label>
                     <div class="form-group">
                        <div class="form-line">
                           <input type="text" name="google_plus" class="form-control" value="{{$config->google_plus}}">
                        </div>
                     </div>
                  </div>
                  <div class="col-md-6">
                     <label>Youtube</label>
                     <div class="form-group ">
                        <div class="form-line">
                           <input type="text" name="youtube" class="form-control" value="{{$config->youtube}}"> 
                        </div>
                     </div>
                  </div>
               </div>
               <button type="submit" class="btn btn-primary m-t-15 waves-effect">Save</button>
               <a href="{{url('home')}}" class="btn btn-danger m-t-15 waves-effect">back</a>
         </div>
         <br>
         </form>
      </div>
   </div>
</div>
<br><br>
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
   <div class="card">
      <div class="header">
         <h2>Update Logo ,Fav Icon & Social Logo</h2>
      </div>
      <div class="body">
         <form action="{{ url('update/config/photo/'.$config->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
               <div class="col-md-6">
                  <label>Logo</label>
                  <div class="form-group ">
                     <div class="form-line">
                        <input type="file" name="logo" class="form-control">
                     </div>
                  </div>
               </div>
               <div class="col-md-6">
                  <label>Old logo</label>
                  <div class="form-group">
                     <div class="form-line">
                        <img src="{{URL::to($config->logo)}}" style="height: 40px;width: 70px;">
                        <input type="hidden" name="old_logo" value="{{$config->logo}}">
                     </div>
                  </div>
               </div>
            </div>
            <div class="row">
               <div class="col-md-6">
                  <label>Fav icon</label>
                  <div class="form-group ">
                     <div class="form-line">
                        <input type="file" name="fav_icon" class="form-control">
                     </div>
                  </div>
               </div>
               <div class="col-md-6">
                  <label>Old Fav icon</label>
                  <div class="form-group">
                     <div class="form-line">
                        <img src="{{URL::to($config->fav_icon)}}" style="height: 40px;width: 70px;">
                        <input type="hidden" name="old_fav_icon" value="{{$config->fav_icon}}">
                     </div>
                  </div>
               </div>
            </div>
            <button type="submit" class="btn btn-primary m-t-15 waves-effect">Update</button>
      </div>
   </div>
   <br>
   </form>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
{{-- - --}}
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
   <div class="card">
      <div class="header">
         <h2>Update Social Logo</h2>
      </div>
      <div class="body">
         <form action="{{ url('update/config/social/'.$config->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <small class="text-danger">Note:logo size 32×32</small>
            {{-- fb --}}
            <div class="row">
               <div class="col-md-6">
                  <label>Facebook logo</label>
                  <div class="form-group ">
                     <div class="form-line">
                        <input type="file" name="facebook_logo" class="form-control">
                     </div>
                  </div>
               </div>
               <div class="col-md-6">
                  <label>Old logo</label>
                  <div class="form-group">
                     <div class="form-line">
                        <img src="{{URL::to($config->facebook_logo)}}" style="height: 40px;width: 70px;">
                        <input type="hidden" name="old_facebook_logo" value="{{$config->facebook_logo}}">
                     </div>
                  </div>
               </div>
            </div>
            {{-- tw --}}
            <div class="row">
               <div class="col-md-6">
                  <label>Twitter logo</label>
                  <div class="form-group ">
                     <div class="form-line">
                        <input type="file" name="twitter_logo" class="form-control">
                     </div>
                  </div>
               </div>
               <div class="col-md-6">
                  <label>Old logo</label>
                  <div class="form-group">
                     <div class="form-line">
                        <img src="{{URL::to($config->twitter_logo)}}" style="height: 40px;width: 70px;">
                        <input type="hidden" name="old_twitter_logo" value="{{$config->twitter_logo}}">
                     </div>
                  </div>
               </div>
            </div>
            {{-- google --}}
            <div class="row">
               <div class="col-md-6">
                  <label>Google plus logo</label>
                  <div class="form-group ">
                     <div class="form-line">
                        <input type="file" name="google_logo" class="form-control">
                     </div>
                  </div>
               </div>
               <div class="col-md-6">
                  <label>Old logo</label>
                  <div class="form-group">
                     <div class="form-line">
                        <img src="{{URL::to($config->google_logo)}}" style="height: 40px;width: 70px;">
                        <input type="hidden" name="old_google_logo" value="{{$config->google_logo}}">
                     </div>
                  </div>
               </div>
            </div>
            {{-- youtube --}}
            <div class="row">
               <div class="col-md-6">
                  <label>Youtube logo</label>
                  <div class="form-group ">
                     <div class="form-line">
                        <input type="file" name="youtube_logo" class="form-control">
                     </div>
                  </div>
               </div>
               <div class="col-md-6">
                  <label>Old logo</label>
                  <div class="form-group">
                     <div class="form-line">
                        <img src="{{URL::to($config->youtube_logo)}}" style="height: 40px;width: 70px;">
                        <input type="hidden" name="old_youtube_logo" value="{{$config->youtube_logo}}">
                     </div>
                  </div>
               </div>
            </div>
            {{-- instagram --}}
            <div class="row">
               <div class="col-md-6">
                  <label>Instagram logo</label>
                  <div class="form-group ">
                     <div class="form-line">
                        <input type="file" name="instagram_logo" class="form-control">
                     </div>
                  </div>
               </div>
               <div class="col-md-6">
                  <label>Old logo</label>
                  <div class="form-group">
                     <div class="form-line">
                        <img src="{{URL::to($config->instagram_logo)}}" style="height: 40px;width: 70px;">
                        <input type="hidden" name="old_instagram_logo" value="{{$config->instagram_logo}}">
                     </div>
                  </div>
               </div>
            </div>
            {{-- linkedin --}}
            <div class="row">
               <div class="col-md-6">
                  <label>Linkedin logo</label>
                  <div class="form-group ">
                     <div class="form-line">
                        <input type="file" name="linkedin_logo" class="form-control">
                     </div>
                  </div>
               </div>
               <div class="col-md-6">
                  <label>Old logo</label>
                  <div class="form-group">
                     <div class="form-line">
                        <img src="{{URL::to($config->linkedin_logo)}}" style="height: 40px;width: 70px;">
                        <input type="hidden" name="old_linkedin_logo" value="{{$config->linkedin_logo}}">
                     </div>
                  </div>
               </div>
            </div>
            <button type="submit" class="btn btn-primary m-t-15 waves-effect">Update</button>
      </div>
   </div>
   <br>
   </form>
</div>
</div>
</div>
</div>
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