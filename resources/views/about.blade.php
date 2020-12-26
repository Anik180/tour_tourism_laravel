@extends('layouts.frontend');
@section('title','About') 
@section('content')
<div id="lhc_status_container_page"></div>
<br>
<div class="container">
   <div class="row">
      <div class="col-xs-12">
         <div class="pbox13">
            <a href="/">Home</a>  &gt;About Company            
         </div>
      </div>
   </div>
</div>
<div class="container">
   <div class="row">
      <div class="ptitle01a">About Company</div>
   </div>
</div>
<div class="container">
   <div class="row">
      <div class="col-xs-12">
         <div class="pboxcontent">
           {!!$about->about!!}            
         </div>
      </div>
   </div>
</div>
<br><br><br><!-- #BeginLibraryItem "/Library/footer.lbi" -->   
@endsection