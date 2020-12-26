<!DOCTYPE html>
<html>
   <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>@yield('title') {{ config('app.name','home') }}</title>
      <meta name="description" content="">
      <meta name="keyword" content="">
      <link rel="shortcut icon" href="{{asset($config->fav_icon)}}">
      <!-- Bootstrap -->
      <link href="{{asset('public/frontend/css/bootstrap.min.css')}}" rel="stylesheet">
      <link href="{{asset('public/frontend/css/common.css')}}" type="text/css" rel="stylesheet">
      <!-- #EndLibraryItem --><!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
      <script src="{{asset('public/frontend/js/jquery.min.js')}}"></script>
      <!-- Include all compiled plugins (below), or include individual files as needed -->
      <script src="{{asset('public/frontend/js/bootstrap.min.js')}}"></script>
      <script src="{{asset('public/frontend/js/bootstrap-hover-dropdown.js')}}"></script>
      <script type="text/javascript" src="{{asset('public/frontend/js/common.js')}}"></script>
      <link href="{{asset('public/frontend/css/jquery-ui.min.css')}}" type="text/css" rel="stylesheet">
      <script type="text/javascript" src="{{asset('public/frontend/js/jquery-ui.min.js')}}"></script>
      <script type="text/javascript" src="{{asset('public/frontend/js/jquery.validate.min.js')}}"></script>

      <style>
         @CHARSET "UTF-8"; 
         .editInfos li{
         list-style:none;
         }
         .animated  img{
         max-width:100%;
         height:auto;
         width:auto9;
         -ms-interpolation-mode:bicubic;
         vertical-align:middle
         }
         .animated a,.animated button,.animated input{
         -webkit-tap-highlight-color:rgba(255,0,0,0)
         }
         .animated input{
         border:0 none;
         -webkit-appearance:none
         }
         .animated ul,.animated p{
         padding:0;
         margin:0
         }
         .animated h1,.animated h2,.animated h3,.animated h4,.animated h5,.animated h6{
         margin:0;
         font-weight:100
         }
         .animated ul,.animated li{
         list-style:none
         }
         .animated a{
         color:#666
         }
         .animated a,.animated a:hover{
         text-decoration:none
         }
         a:focus{
         outline:none
         }
         .animated{
         -webkit-animation-duration:1.4s;
         animation-duration:1.4s;
         -webkit-animation-fill-mode:both;
         animation-fill-mode:both
         }
         @-webkit-keyframes bounceIn{
         0%{
         opacity:0;
         -webkit-transform:scale(.3);
         transform:scale(.3)
         }
         50%{
         opacity:1;
         -webkit-transform:scale(1.05);
         transform:scale(1.05)
         }
         70%{
         -webkit-transform:scale(.9);
         transform:scale(.9)
         }
         100%{
         opacity:1;
         -webkit-transform:scale(1);
         transform:scale(1)
         }
         }
         @keyframes bounceIn{
         0%{
         opacity:0;
         -webkit-transform:scale(.3);
         -ms-transform:scale(.3);
         transform:scale(.3)
         }
         50%{
         opacity:1;
         -webkit-transform:scale(1.05);
         -ms-transform:scale(1.05);
         transform:scale(1.05)
         }
         70%{
         -webkit-transform:scale(.9);
         -ms-transform:scale(.9);
         transform:scale(.9)
         }
         100%{
         opacity:1;
         -webkit-transform:scale(1);
         -ms-transform:scale(1);
         transform:scale(1)
         }
         }
         .bounceIn{
         -webkit-animation-name:bounceIn;
         animation-name:bounceIn
         }
         @-webkit-keyframes bounceInDown {
         0% {
         opacity: 0;
         -webkit-transform: translateY(-2000px);
         transform: translateY(-2000px);
         }
         60% {
         opacity: 1;
         -webkit-transform: translateY(30px);
         transform: translateY(30px);
         }
         80% {
         -webkit-transform: translateY(-10px);
         transform: translateY(-10px);
         }
         100% {
         -webkit-transform: translateY(0);
         transform: translateY(0);
         }
         }
         @keyframes bounceInDown {
         0% {
         opacity: 0;
         -webkit-transform: translateY(-2000px);
         -ms-transform: translateY(-2000px);
         transform: translateY(-2000px);
         }
         60% {
         opacity: 1;
         -webkit-transform: translateY(30px);
         -ms-transform: translateY(30px);
         transform: translateY(30px);
         }
         80% {
         -webkit-transform: translateY(-10px);
         -ms-transform: translateY(-10px);
         transform: translateY(-10px);
         }
         100% {
         -webkit-transform: translateY(0);
         -ms-transform: translateY(0);
         transform: translateY(0);
         }
         }
         .bounceInDown {
         -webkit-animation-name: bounceInDown;
         animation-name: bounceInDown;
         }
         @-webkit-keyframes bounceOutUp {
         0% {
         -webkit-transform: translateY(0);
         transform: translateY(0);
         }
         20% {
         opacity: 1;
         -webkit-transform: translateY(20px);
         transform: translateY(20px);
         }
         100% {
         opacity: 0;
         -webkit-transform: translateY(-2000px);
         transform: translateY(-2000px);
         }
         }
         @keyframes bounceOutUp {
         0% {
         -webkit-transform: translateY(0);
         -ms-transform: translateY(0);
         transform: translateY(0);
         }
         20% {
         opacity: 1;
         -webkit-transform: translateY(20px);
         -ms-transform: translateY(20px);
         transform: translateY(20px);
         }
         100% {
         opacity: 0;
         -webkit-transform: translateY(-2000px);
         -ms-transform: translateY(-2000px);
         transform: translateY(-2000px);
         }
         }
         .bounceOutUp {
         -webkit-animation-name: bounceOutUp;
         animation-name: bounceOutUp;
         }
         @-webkit-keyframes rollIn {
         0% {
         opacity: 0;
         -webkit-transform: translateX(-100%) rotate(-120deg);
         transform: translateX(-100%) rotate(-120deg);
         }
         100% {
         opacity: 1;
         -webkit-transform: translateX(0px) rotate(0deg);
         transform: translateX(0px) rotate(0deg);
         }
         }
         @keyframes rollIn {
         0% {
         opacity: 0;
         -webkit-transform: translateX(-100%) rotate(-120deg);
         -ms-transform: translateX(-100%) rotate(-120deg);
         transform: translateX(-100%) rotate(-120deg);
         }
         100% {
         opacity: 1;
         -webkit-transform: translateX(0px) rotate(0deg);
         -ms-transform: translateX(0px) rotate(0deg);
         transform: translateX(0px) rotate(0deg);
         }
         }
         .rollIn {
         -webkit-animation-name: rollIn;
         animation-name: rollIn;
         }
         @-webkit-keyframes flipInX {
         0% {
         -webkit-transform: perspective(400px) rotateX(90deg);
         transform: perspective(400px) rotateX(90deg);
         opacity: 0;
         }
         40% {
         -webkit-transform: perspective(400px) rotateX(-10deg);
         transform: perspective(400px) rotateX(-10deg);
         }
         70% {
         -webkit-transform: perspective(400px) rotateX(10deg);
         transform: perspective(400px) rotateX(10deg);
         }
         100% {
         -webkit-transform: perspective(400px) rotateX(0deg);
         transform: perspective(400px) rotateX(0deg);
         opacity: 1;
         }
         }
         @keyframes flipInX {
         0% {
         -webkit-transform: perspective(400px) rotateX(90deg);
         -ms-transform: perspective(400px) rotateX(90deg);
         transform: perspective(400px) rotateX(90deg);
         opacity: 0;
         }
         40% {
         -webkit-transform: perspective(400px) rotateX(-10deg);
         -ms-transform: perspective(400px) rotateX(-10deg);
         transform: perspective(400px) rotateX(-10deg);
         }
         70% {
         -webkit-transform: perspective(400px) rotateX(10deg);
         -ms-transform: perspective(400px) rotateX(10deg);
         transform: perspective(400px) rotateX(10deg);
         }
         100% {
         -webkit-transform: perspective(400px) rotateX(0deg);
         -ms-transform: perspective(400px) rotateX(0deg);
         transform: perspective(400px) rotateX(0deg);
         opacity: 1;
         }
         }
         .flipInX {
         -webkit-backface-visibility: visible !important;
         -ms-backface-visibility: visible !important;
         backface-visibility: visible !important;
         -webkit-animation-name: flipInX;
         animation-name: flipInX;
         }
         /*------------------- 华丽分割线 -----------------------*/
         .demo{width:100%;margin:0 auto;text-align:center;}
         .demo a{margin:0 5px 20px;background-color:#eee;}
         /*------------------- 华丽分割线 -----------------------*/
         #dialogBg{width:100%;height:100%;background-color:#000000;opacity:.8;filter:alpha(opacity=60);position:fixed;top:0;left:0;z-index:9999;display:none;}
         #dialog{ width: 400px; height: 340px; margin: 0 auto; display: none; background-color: #ffffff; position: fixed; top: 50%; left: 50%; margin: -120px 0 0 -150px; z-index: 10000; border: 1px solid #ccc; border-radius: 10px; -webkit-border-radius: 10px; box-shadow: 3px 2px 4px rgba(0,0,0,0.2); -webkit-box-shadow: 3px 2px 4px rgba(0,0,0,0.2); }
         .dialogTop{width:90%;margin:0 auto;border-bottom:1px dotted #ccc;letter-spacing:1px;padding:10px 0;text-align:right;}
         .dialogIco{width:50px;height:50px;position:absolute;top:-25px;left:50%;margin-left:-25px;}
         .editInfos{padding:15px 0;}
         .editInfos li{width:90%;margin:8px auto auto;text-align: center;}
         .ipt{border:1px solid #ccc;padding:5px;border-radius:3px;-webkit-border-radius:3px;box-shadow:0 0 3px #ccc inset;-webkit-box-shadow:0 0 3px #ccc inset;margin-left:5px;}
         .ipt:focus{outline:none;border-color:#66afe9;box-shadow:0 1px 1px rgba(0, 0, 0, 0.075) inset, 0 0 8px rgba(102, 175, 233, 0.6);-webkit-box-shadow:0 1px 1px rgba(0, 0, 0, 0.075) inset, 0 0 8px rgba(102, 175, 233, 0.6);}
         .GsubmitBtn{width:90px;height:30px;line-height:30px;font-family:"微软雅黑","microsoft yahei";cursor:pointer;margin-top:10px;display:inline-block;border-radius:5px;-webkit-border-radius:5px;text-align:center;background-color:#428bca;color:#fff;box-shadow: 0 -3px 0 #2a6496 inset;-webkit-box-shadow: 0 -3px 0 #2a6496 inset;}
      </style>
   </head>
   <body>
      <!-- #BeginLibraryItem "/Library/header.lbi" -->
      <div class="container-fluid">
         <div class="row pheaderlarge">
            <div class="col-xs-12">
               <div class="pboxheader clearfix">
                  <a href="{{URL::to('/')}}"><img class="logo" src="{{asset($config->logo)}}" style="height: 83px; width: 400px;"></a>
                  <div class="box2">
                     <div class="rbox clearfix">
                        <div class="box3">
                           <div class="phoneblue"  style="right:300px;font-size: 14px;top: -24px;width: 270px" >
                              <img src="{{asset('public/frontend/images/phoneblue.png')}}"> {{$config->phone_six}}<br>
                           </div>
                     <span>
                        <a href="{{$config->facebook}}" target="_blank"><img src="{{asset('public/frontend/images/ico003.png')}}" style="height: 32px; width: 32px;"></a>
                        <a href="{{$config->twitter}}" target="_blank"><img src="{{asset('public/frontend/images/ico004.png')}}" style="height: 32px; width: 32px;"></a>
                        <a href="{{$config->google_plus}}" target="_blank"><img src="{{asset('public/frontend/images/ico005.png')}}" style="height: 32px; width: 32px;"></a>
                        <a href="{{$config->youtube}}" target="_blank"><img src="{{asset('public/frontend/images/ico007.png')}}" style="height: 32px; width: 32px;">
                        </a>
                        <a href="{{$config->youtube}}" target="_blank"><img src="{{asset('public/frontend/images/instagram-logo.png')}}" style="height: 32px; width: 32px;"></a>
                         <a href="{{$config->youtube}}" target="_blank"><img src="{{asset('public/frontend/images/61109.png')}}" style="height: 32px; width: 32px;"></a>
                     </span>
                        </div>
                     </div>
                  </div>
                  <div class="box1">
                     <ul class="pul01 clearfix">
                        <li role="presentation" class="dropdown">
                           <a href="{{URL::to('/')}}" target="_self" title="Home">Home</a>
                        </li>
                        <li role="presentation" class="dropdown">
                           <a class="dropdown-toggle "
                              data-hover="dropdown" data-toggle="dropdown" href="#" target="_self">About Us</a>
                           <ul role="menu" class="dropdown-menu">
                              <li>
                                 <a href="{{URL::to('about-company')}}" target="_self">About Company</a>
                              </li>
                              <li>
                                 <a href="{{URL::to('ceo-massage')}}" target="_self">CEO Massage</a>
                              </li>
                              <li>
                                 <a href="{{URL::to('photo-gallery')}}" target="_self">Photo Gallery</a>
                              </li>  
                           </ul>
                        </li>
                       @foreach($package_category as $row)
                           @php
                             $subcategories=DB::table('subcategories')->where('package_category_id',$row->id)->get();
                           @endphp 
                        <li role="presentation" class="dropdown">
                           <a class="dropdown-toggle "
                              data-hover="dropdown" data-toggle="dropdown" href="#" target="_self">{{$row->package_category_name}}</a>
                           <ul role="menu" class="dropdown-menu">
                              @foreach($subcategories as $row)   
                              <li><a href="{{URL::to('package/'.$row->id.'/'.$row->subcat)}}" target="_self">{{$row->subcat}}</a></li> 
                              @endforeach 
                           </ul>
                        </li>
                        @endforeach 

                        <li role="presentation" class="dropdown">
                           <a class="dropdown-toggle "
                              data-hover="dropdown" data-toggle="dropdown" href="#" target="_self">Visa Service</a>
                           <ul role="menu" class="dropdown-menu">
                           @foreach($visa as $row)   
                              <li>
                                 <a href="{{URL::to('visa/'.$row->id.'/'.$row->slug)}}" target="_self" title="{{$row->visa_country}}">{{$row->visa_country}}</a>
                              </li>
                           @endforeach   
                           </ul>
                        </li>
                        @php
                        $ticketcategories=DB::table('ticketcategories')->orderBy('id','ASC')->get();
                        @endphp
                        <li role="presentation" class="dropdown">
                           <a class="dropdown-toggle "
                              data-hover="dropdown" data-toggle="dropdown" href="#" target="_self">Air Tickets</a>
                           <ul role="menu" class="dropdown-menu">
                           @foreach($ticketcategories as $row)
                           @php
                             $ticketsubcategories=DB::table('ticketsubcategories')->where('ticket_category_id',$row->id)->get();
                           @endphp   
                              <li class="dropdown-submenu">
                                 <a  title="Asia" href="" target="_self">{{$row->ticket_category}}</a>
                                 <ul role="menu" class="dropdown-menu">
                                 @foreach($ticketsubcategories as $row)   
                                    <li>
                                       <a tabindex="-1" href="{{URL::to('air-ticket/'.$row->id.'/'.$row->slug)}}"
                                       target="_self">{{$row->ticket_subcategory}}</a>
                                    </li>
                                 @endforeach
                                 </ul>
                              </li>
                           @endforeach
                           </ul>
                        </li>
                        <li role="presentation" class="dropdown">
                           <a href="{{URL::to('hotel_bookings')}}" target="_self" title="Presentation">Hotel booking</a>
                        </li>
                        <li role="presentation" class="dropdown">
                           <a href="{{URL::to('contact')}}" target="_self" title="Trip Finder">Contact Us</a>
                        </li>
                     </ul>
                  </div>
               </div>
            </div>
         </div>
         <div class="row pheadersmall">
            <div class="col-xs-12">
               <div class="pboxheader1 clearfix">
                  <div class="logo">
                     <a href="{{URL::to('/')}}"><img class="logo" src="{{asset($config->logo)}}"></a>
                  </div>
                  <div class="box1 clearfix">
                     <div class="boxl">
                        <!--<a href="/?t=rtcnewcn" class="lang">中文</a>-->
                        <!-- <a href="/index/index/t/rtcnewcn" class="lang">中文</a> -->
                        {{-- <span class="s">&nbsp;</span> --}}
                                             <span>
                        <a href="{{$config->facebook}}" target="_blank"><img src="{{asset('public/frontend/images/ico003.png')}}" style="height: 32px; width: 32px;"></a>
                        <a href="{{$config->twitter}}" target="_blank"><img src="{{asset('public/frontend/images/ico004.png')}}" style="height: 32px; width: 32px;"></a>
                        <a href="{{$config->google_plus}}" target="_blank"><img src="{{asset('public/frontend/images/ico005.png')}}" style="height: 32px; width: 32px;"></a>
                        <a href="{{$config->youtube}}" target="_blank"><img src="{{asset('public/frontend/images/ico007.png')}}" style="height: 32px; width: 32px;"></a>
                     </span>                  
                     </div>
                     <div class="boxr">
                        <a href="#nav" data-toggle="collapse"><span
                           class="glyphicon glyphicon-menu-hamburger"></span></a>
                     </div>
                  </div>
                  <div id="nav" class="navbox">
                     <ul class="pul02 clearfix">
                        <li role="presentation" class="dropdown">
                           <a href="{{URL::to('/')}}" target="_self">Home</a>
                        </li>

                        <li role="presentation" class="dropdown">
                           <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                              aria-haspopup="true" aria-expanded="false" target="_self">About us</a>
                           <ul class="dropdown-menu">
                              <li><a href="{{URL::to('about-company')}}" target="_self">About Company</a></li>
                               <li>
                                 <a href="{{URL::to('ceo-massage')}}" target="_self">CEO Massage</a>
                              </li>
                              <li>
                                 <a href="{{URL::to('photo-gallery')}}" target="_self">Photo Gallery</a>
                              </li>
                           </ul>
                        </li>
                        @foreach($package_category as $row)
                        @php
                        $subcategories=DB::table('subcategories')->where('package_category_id',$row->id)->get();
                        @endphp
                        <li role="presentation" class="dropdown">
                           <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                              aria-haspopup="true" aria-expanded="false" target="_self">{{$row->package_category_name}}</a>
                           <ul class="dropdown-menu">
                              @foreach($subcategories as $row)
                              <li><a href="{{URL::to('package/'.$row->id.'/'.$row->subcat)}}" target="_self">{{$row->subcat}}</a></li>
                              @endforeach
                           </ul>
                        </li>
                        @endforeach
                        <li role="presentation" class="dropdown">
                           <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                              aria-haspopup="true" aria-expanded="false" target="_self">Visa Services</a>
                           <ul class="dropdown-menu">
                           @foreach($visa as $row)   
                              <li>
                                 <a href="{{URL::to('visa/'.$row->id.'/'.$row->slug)}}" target="_self">{{$row->visa_country}}</a>
                              </li>
                           @endforeach
                     
                           </ul>
                        </li>
                        <li role="presentation" class="dropdown">
                           <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                              aria-haspopup="true" aria-expanded="false" target="_self">Air Tickets</a>
                           <ul class="dropdown-menu">
                           @foreach($ticketcategories as $row)
                           @php
                             $ticketsubcategories=DB::table('ticketsubcategories')->where('ticket_category_id',$row->id)->get();
                           @endphp   
                              <li class="dropdown-submenu">
                                 <a href="" target="_self">{{$row->ticket_category}}</a>
                                 <ul>
                                 @foreach($ticketsubcategories as $row)    
                                    <li>
                                       <a tabindex="-1" href="{{URL::to('air-ticket/'.$row->id.'/'.$row->slug)}}"
                                       target="_self">{{$row->ticket_subcategory}}</a>
                                   </li>
                                 @endforeach
                                 </ul>
                              </li>
                           @endforeach   
                           </ul>
                        </li>
                        <li role="presentation" class="dropdown">
                           <a href="{{URL::to('hotel_bookings')}}" target="_self">Hotel booking</a>
                        </li>

                        <li role="presentation" class="dropdown">
                           <a href="{{URL::to('contact')}}" target="_self">Contact us</a>
                        </li>
                     </ul>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <div id="lhc_status_container_page"></div>


 @yield('content')
 @php
 $agent=DB::table('agents')->take(4)->get();
 @endphp
<div class="pboxfooter2">
         <div class="container">
            <div class="row">
               <div class="col-md-3">
                  <div class="pbox06">
                     <p class="t1">Air Lines Sales Agent</p>
                    @foreach($agent as $row)
                    <div>
                     <img src="{{asset($row->agent_image)}}" style="float: left; padding-right: 4px;">
                     </div>
                     @endforeach
                  </div>
               </div>
                <div class="col-md-3">
                  <div class="pbox06">
                     <p class="t1">Office Location</p>
                     <ul class="pul03">
                        <li><a href="">{{$config->location}}</a></li>
                     </ul>
                  </div>
               </div>
               
               <div class="col-md-3">
                  <div class="pbox06">
                     <p class="t1">Contact Us</p>
                     <ul class="pul03">
                        <li><a href="">-Mobile</a></li>
                        <li><a href="">{{$config->phone_one}}</a></li>
                        <li><a href="">-{{$config->phone_two}}</a></li>
                        <li><a href="">-{{$config->phone_three}}</a></li>
                        <li>
                           <li>Email</li>
                           <li><a href="">{{$config->email}}</a></li>
                        </li>
                     </ul>
                  </div>
               </div>
                

               <div class="col-md-3">
                  <div class="pbox06">
                     <p class="t1">Our partners</p>
                     <div><img src="{{asset('public/frontend/images/image.jfif')}}" style="height: 55px; width: 55px; float: left; padding-right: 4px;"></div>
                     <div><img src="{{asset('public/frontend/images/airs.png')}}" style="height: 55px; width: 55px; float: left; padding-right: 4px;"></div>
                     <div><img src="{{asset('public/frontend/images/images.jfif')}}" style="height: 55px; width: 55px; float: left; padding-right: 4px;"></div>
                     <div><img src="{{asset('public/frontend/images/URAL_Airlines_Logo.jpeg')}}" style="height: 55px; width: 55px; float: left;"></div>
                  </div>
               </div>

            </div>
         </div>
      </div>
      <div class="pboxfooter3">
         <div class="container-fluid">
            <div class="row">
               <div class="col-xs-12">
                  <div class="pbox07">
                     <span>
                        <a href="{{$config->facebook}}" target="_blank"><img src="{{asset('public/frontend/images/ico003.png')}}" style="height: 32px; width: 32px;"></a>
                        <a href="{{$config->twitter}}" target="_blank"><img src="{{asset('public/frontend/images/ico004.png')}}" style="height: 32px; width: 32px;"></a>
                        <a href="{{$config->google_plus}}" target="_blank"><img src="{{asset('public/frontend/images/ico005.png')}}" style="height: 32px; width: 32px;"></a>
                        <a href="{{$config->youtube}}" target="_blank"><img src="{{asset('public/frontend/images/ico007.png')}}" style="height: 32px; width: 32px;">
                        </a>
                        <a href="{{$config->youtube}}" target="_blank"><img src="{{asset('public/frontend/images/instagram-logo.png')}}" style="height: 32px; width: 32px;">
                        </a>
                        <a href="{{$config->youtube}}" target="_blank"><img src="{{asset('public/frontend/images/61109.png')}}" style="height: 32px; width: 32px;"></a>
                     </span>
                  </div>
               </div>
            </div>
         </div>
         <br><br>
         <div class="container">
            <br><br>
            <div class="row">
               <div class="col-xs-12">
                  <div class="pbox09">
                     <p>@2020 Akon Holiday. All rights reserved. Developed By |  <a href="http://bdsoft.biz/">BDSoft IT Solutions</a></p>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <noscript><iframe src="//www.googletagmanager.com/ns.html?id=GTM-NJ57MD"
         height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
      <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
         new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
         j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
         '//www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
         })(window,document,'script','dataLayer','GTM-NJ57MD');
      </script>
      <!-- End Warden Promotion -->
   </body>
</html>
 