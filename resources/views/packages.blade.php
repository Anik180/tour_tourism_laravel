@extends('layouts.frontend')
@section('title','Package') 
@section('content')
@include('layouts.frontend.slider')
<br>
<div class="container">
   <div class="row">
      <div class="col-xs-12">
         <div class="pbox13">
            <a href="#">Home</a>  &gt;  {{$subcategory->subcat}}            
         </div>
      </div>
   </div>
</div>
<br>
<div class="container">
   <div class="row">
      <div class="col-xs-12">
         <h1 class="ptitle03">{{$subcategory->subcat}}</h1>
      </div>
   </div>
</div>
<br><br>
{{-- <div class="container">
   @foreach($package as $row)   
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
            <span style="color:black;font-size:24px;">{{$row->title}}</span>
            </strong> 
         </p>
         <p style="text-align:center;">
            <strong><span style="color:#1C75BC;line-height:31.42px;font-family:Oswald-Bold, Arial, Helvetica, sans-serif;font-size:32px;"><span style="font-size:12px;">Price</span>&nbsp;&nbsp;</span><span style="color:black;line-height:31.42px;font-family:Oswald-Bold, Arial, Helvetica, sans-serif;font-size:32px;">${{$row->package_price}}</span><span style="color:#E56600;line-height:31.42px;font-family:Oswald-Bold, Arial, Helvetica, sans-serif;font-size:10px;">&nbsp;</span><span style="color:#E56600;line-height:27px;font-family:Oswald-Bold, Arial, Helvetica, sans-serif;font-size:18px;">&nbsp;&nbsp;</span></strong> 
         </p>
         <p style="text-align:center;color:#626262;font-family:Tahoma, Geneva, sans-serif;font-size:14px;">
            <strong><strong><span style="font-size:16px;"><strong><strong><strong></strong></strong>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<span style="color:#1376BC;font-family:Oswald-Bold, Arial, Helvetica, sans-serif;">Promotion&nbsp;</span><span style="color:black;line-height:1.5;font-family:Oswald-Bold, Arial, Helvetica, sans-serif;font-size:18px;">{{$row->promotion}} Off</span></strong></span></strong></strong> 
         </p>
         <p class="MsoNormal" style="background:white;text-align:center;text-indent:-18pt;margin-left:36pt;">
            {!! \Illuminate\Support\Str::limit($row->package_details,'100') !!}
         </p>
         </p>
         <div class="mbtns">
            <a href="{{URL::to('view-package/'.$row->id.'/'.$row->slug)}}" class="pbtn01">View Tour</a>
         </div>
      </div>
   </div>
   @endforeach
</div> --}}
<div class="container">
@foreach($package as $row) 
<div class="pbox36  clearfix">
   <div class="boxl">
      <a href="{{URL::to('view-package/'.$row->id.'/'.$row->slug)}}" class="cover">
      <img src="{{asset($row->image)}}" class="img">

      </a>
   </div>
   <div class="boxcon">
      <p>
      <p style="text-align:center;">
      <span style="font-family:Arial;font-size:16px;">
         <span style="color:#575757;line-height:24px;font-family:Tahoma, Geneva, sans-serif;font-size:16px;"> 
         </span>
      </span> 
      </p>
      <p style="text-align:center;color:#626262;font-family:Tahoma, Geneva, sans-serif;font-size:14px;">
         <strong>
            <span style="color:#1C75BC;line-height:31.42px;font-family:Oswald-Bold, Arial, Helvetica, sans-serif;font-size:32px;"> 
            </span>
         </strong> 
      </p>
      <p class="MsoNormal" style="background:white;text-align:center;margin-left:0cm;">
         <strong>
            <span style="color:#1C75BC;font-family:Arial;font-size:32px;"> </span>
         </strong> 
      </p>
      <p class="MsoNormal" style="background:white;text-align:center;text-indent:-18pt;margin-left:36pt;">
         <strong>
            <span style="color:#1C75BC;font-size:24px;">{{$row->title}}</span>
         </strong> 
      </p>
      <p style="text-align:center;">
         <strong>
            <span style="color:#1C75BC;line-height:31.42px;font-family:Oswald-Bold, Arial, Helvetica, sans-serif;font-size:32px;">
               <span style="font-size:12px;">Price</span>&nbsp;&nbsp;
           </span>
            <span style="color:#333;line-height:31.42px;font-family:Oswald-Bold, Arial, Helvetica, sans-serif;font-size:32px;">{{$row->package_price}}
            </span>
            <span style="color:#E56600;line-height:31.42px;font-family:Oswald-Bold, Arial, Helvetica, sans-serif;font-size:10px;">&nbsp;
            </span>
            <span style="color:#E56600;line-height:27px;font-family:Oswald-Bold, Arial, Helvetica, sans-serif;font-size:18px;">&nbsp;&nbsp;
            </span>
         </strong> 
      </p>
      <p style="text-align:center;color:#626262;font-family:Tahoma, Geneva, sans-serif;font-size:14px;">
         <strong>
            <strong>
               <span style="font-size:16px;">
                  <strong>
                    <span style="color:#1376BC;font-family:Oswald-Bold, Arial, Helvetica, sans-serif;">Promotion&nbsp;
                    </span>
                    <span style="color:#333;line-height:1.5;font-family:Oswald-Bold, Arial, Helvetica, sans-serif;font-size:18px;">{{$row->promotion}} Off
                    </span>
            </strong>
            </span>
            </strong>
         </strong> 
      </p>
      <p class="MsoNormal" style="background:white;text-align:center;text-indent:-18pt;margin-left:36pt;">
        {!! Illuminate\Support\Str::limit($row->package_details, 200) !!}
      </p>
      <p style="text-align:center;">
         <br />
      </p>
      <p style="text-align:center;">
         <br />
      </p>
      <p style="text-align:center;color:#787878;font-family:Tahoma, Geneva, sans-serif;font-size:16px;">
         <br />
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
@endsection