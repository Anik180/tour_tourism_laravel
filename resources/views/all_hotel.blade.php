@extends('layouts.frontend')
@section('title','Hotel booking') 
@section('content')
@include('layouts.frontend.slider')
{{-- <br>
<div class="container">
   <div class="row">
      <div class="col-xs-12">
         <div class="pbox13">
            <a href="#">Home</a>  &gt;Hotel booking              
         </div>
      </div>
   </div>
</div>
<br>
<div class="container">
   <div class="row">
      <div class="col-xs-12">
         <h1 class="ptitle03">Hotel booking</h1>
      </div>
   </div>
</div>
<br><br>
<div class="container">
   @foreach($all_hotel as $row)   
   <div class="pbox36  clearfix">
      <div class="boxl">
         <a href="{{URL::to('view-hotel/'.$row->id.'/'.$row->slug)}}" class="cover">
         <img src="{{asset($row->image)}}" class="img" style="width: 300px; height: 346px;">
         </a>
      </div>
      <div class="boxcon">
         <p>
         <p class="MsoNormal" style="background:white;text-align:center;text-indent:-18pt;margin-left:36pt;">
            <strong>
            <span style="color:black;font-size:24px;">{{$row->title}}</span>
            </strong> 
         </p>
         <p class="MsoNormal" style="background:white;text-align:center;text-indent:-18pt;margin-left:36pt;">
            {{$row->title}}.................
         </p>
         </p>
         <div class="mbtns">
            <a href="{{URL::to('view-hotel/'.$row->id.'/'.$row->slug)}}" class="pbtn01">View Detail</a>
         </div>
      </div>
   </div>
   @endforeach
</div>
<br><br><br> --}}

<br>
<div class="container">
   <div class="row">
      <div class="col-xs-12">
         <div class="pbox13">
            <a href="#">Home</a>  &gt;              
         </div>
      </div>
   </div>
</div>

<br><br>
<div class="container">
   @foreach($all_hotel as $row)   
   <div class="pbox36  clearfix">
      <div class="boxl">
         <a href="{{URL::to('view-package/'.$row->id.'/'.$row->slug)}}" class="cover">
         <img src="{{asset($row->image)}}" class="img">
         </a>
      </div>
      <div class="boxcon">
         <p>
         <p class="MsoNormal" style="background:white;text-align:center;text-indent:-18pt;margin-left:36pt;">
            <strong>
            <span style="color:#1376BC;font-size:24px;">{{$row->title}}</span>
            </strong> 
         </p>



         <p class="MsoNormal" style="background:white;text-align:center;text-indent:-18pt;margin-left:36pt;">
            {!! \Illuminate\Support\Str::limit($row->detail,'300') !!}<br>
         </p>
         </p>
         <div class="mbtns">
            <a href="{{URL::to('view-package/'.$row->id.'/'.$row->slug)}}" class="pbtn01">View Tour</a>
         </div>
      </div>
   </div>
   @endforeach
</div>
<br><br><br>
</div>
@endsection