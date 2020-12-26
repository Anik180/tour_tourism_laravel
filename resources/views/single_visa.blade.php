@extends('layouts.frontend');
@section('content')
@section('title') 

{{$singlevisa->title}}
@endsection
@include('layouts.frontend.slider')
 <div id="lhc_status_container_page"></div>
      <br>
      <div class="container">
         <div class="row">
            <div class="col-xs-12">
               <div class="pbox13">
                  <a href="/">Home</a>  &gt;{{$singlevisa->title}}            
               </div>
            </div>
         </div>
      </div>
      <div class="container">
         <div class="row">
            <div class="ptitle01a">{{$singlevisa->title}} </div>
         </div>
      </div>
      <div class="container">
         <div class="row">
            <div class="col-xs-12">
               <div class="pboxcontent">
                {!!$singlevisa->visa_detail!!}
               </div>
            </div>
         </div>
      </div>
      <br><br><br><!-- #BeginLibraryItem "/Library/footer.lbi" -->   
<!-- .container /-->
@endsection