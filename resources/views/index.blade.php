@extends('layouts.frontend')
@section('content')
@include('layouts.frontend.slider')

      <div class="container">
         <div class="row">
            <div class="col-xs-12">
               <h2 class="ptitle01"><span>Our Packages</span></h2>
            </div>
         </div>
      </div>
      @php
       $package=DB::table('packages')->orderBy('id', 'DESC')->limit(16)->get();
      @endphp
      <div class="container">
         <div class="row pboxcitys">
            @foreach($package as $row)
            <div class="col-md-3">
               <div class="pbox10">
                  <a class="link" href="{{URL::to('view-package/'.$row->id.'/'.$row->slug)}}" title='Mysterious Egypt, Nile River and Jordan 15 Days'>
                     <img src="{{asset($row->image)}}" class="img">
                     <span class="mb"></span>
                     <div class="box" >{{$row->title}}...${{$row->package_price}}</div>
                  </a>
               </div>
            </div>
            @endforeach
         </div>
         <div class="pmore">
            <br>
            <a href="/travel/travel_lists">All Packages <img src="{{asset('public/frontend/images/ico028.png')}}"></a>
         </div>
         <hr class="psep04">
         <br>
      </div>  
@endsection