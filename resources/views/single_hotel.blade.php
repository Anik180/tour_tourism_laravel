@extends('layouts.frontend')
@section('content')
@section('title') 
{{$singleairhotel->title}}
@endsection
@include('layouts.frontend.slider')
<br>
<div class="container">
   <div class="row">
      <div class="col-xs-12">
         <div class="pbox13">
            <a href="/">Home</a>  &gt;  {{$singleairhotel->title}}            
         </div>
      </div>
   </div>
</div>
<div id="lhc_status_container_page"></div>
<div class="container">
<img src="{{asset($singleairhotel->image)}}" class="pimg01 img-responsive" style="width: 600px; height: 300px;">		
</div>

<br>

<div class="container">
   <div class="row">
      <div class="ptitle01a">{{$singleairhotel->title}}</div>
   </div>
</div>
<div class="container">
   <div class="row">
      <div class="col-xs-12">
         <div class="pboxcontent">
           {!!$singleairhotel->detail!!}
         </div>
      </div>
   </div>
</div>
<br><br><br><!-- #BeginLibraryItem "/Library/footer.lbi" -->
 



@endsection