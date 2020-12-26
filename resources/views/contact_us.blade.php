@extends('layouts.frontend')
@section('title','contact us') 
@section('content')
@include('layouts.frontend.slider')
<div id="lhc_status_container_page"></div>
<div class="pboxsep01 hidden-xs hidden-sm"></div>
<div class="container">
   <div class="row">
      <div class="col-xs-12">
         <div class="pbox13">
            <a href="/">Home</a>  &gt;  Contact Us
         </div>
      </div>
   </div>
</div>
<div class="container">
   <div class="row">
      <div class="ptitle01a">Contact Us</div>
   </div>
</div>
<div class="container">
   <br><br>
   <div class="container">
      <div class="row">
         <div class="col-xs-6">
            <div class="pbox30">
               <div class="embed-responsive embed-responsive-16by9">
                  <div id="map_canvas" class="embed-responsive-item">
                     <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d58418.88620365728!2d90.33404994776195!3d23.776589951442027!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755b8a2503dfe5b%3A0xe22c964b2f66616d!2sKazi%20Nazrul%20Islam%20Ave%2C%20Dhaka%201215!5e0!3m2!1sen!2sbd!4v1607494169226!5m2!1sen!2sbd" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
                  </div>
               </div>
            </div>
         </div>
         <div class="col-xs-6">
            <div class="pbox30">
               @foreach($contact as $row)
               <p>
                  <br />
               </p>
               <p>
                  <span style="font-size:16px;font-family:Arial;color:#1C75BC;">Office name:{{$row->office_name}}
                  </span>
               </p>
               <p>
                  <span style="color:#666666;font-family:Arial;font-size:16px;">Location:{!!$row->address!!}</span>
               </p>
               <p>
                  <span style="font-size:16px;font-family:Arial;color:#666666;">phone:{{$row->phone}}</span> 
               </p>
               <p>
                  <span style="font-size:16px;font-family:Arial;color:#666666;">Telephone: {{$row->telephone}} </span> 
               </p>
               <p>
                  <span style="font-size:16px;font-family:Arial;color:#666666;">email: {{$row->email}}</span> 
               </p>
               @endforeach
            </div>
         </div>
      </div>
   </div>
</div>
<script type="text/javascript">
   $(document).ready(function (e) {
       $('#checkpic').click(function(){
           this.src = '/index/code?'+Math.random();;
       });
   
       
       $("#myform").validate({
           rules: {
               "name": "required",
               "phone": "required",
               "email": {
                   required: true,
                   email: true
               },
               "message": "required",
               'identifying_code':'required'
           }
       });
   });
</script>
<br><br><br><!-- #BeginLibraryItem "/Library/footer.lbi" -->   
@endsection