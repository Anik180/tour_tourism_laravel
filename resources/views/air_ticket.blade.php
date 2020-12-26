@extends('layouts.frontend')
@section('title','Air ticket') 
@section('content')
@include('layouts.frontend.slider')
<br>
<div class="container">
   <div class="row">
      <div class="col-xs-12">
         <div class="pbox13">
            <a href="#">Home</a>  &gt;  {{$air_subcategory->ticket_subcategory}}            
         </div>
      </div>
   </div>
</div>
<br>
<div class="container">
   <div class="row">
      <div class="col-xs-12">
         <h1 class="ptitle03">{{$air_subcategory->ticket_subcategory}}</h1>
      </div>
   </div>
</div>
<br><br>
<div class="container">
   @foreach($airticket as $row)   
   <div class="pbox36  clearfix">
      <div class="boxcon">
         <p>
         <p class="MsoNormal" style="background:white;text-align:center;text-indent:-18pt;margin-left:36pt;">
            <strong>
            <span style="color:black;font-size:24px;">{{$row->title}}</span>
            </strong> 
         </p>
         <p class="MsoNormal" style="background:white;text-align:center;text-indent:-18pt;margin-left:36pt;">
            {!! \Illuminate\Support\Str::limit($row->description,'200') !!}
         </p>
         </p>
         <div class="mbtns">
            <a href="{{URL::to('view-ticket/'.$row->id.'/'.$row->slug)}}" class="pbtn01">View Detail</a>
         </div>
      </div>
   </div>
   @endforeach
</div>
<br><br><br>    
@endsection