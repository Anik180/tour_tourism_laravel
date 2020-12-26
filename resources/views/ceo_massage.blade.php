@extends('layouts.frontend')
@section('content')
@section('title','CEO Massage') 
<style type="text/css">

img {
  border:solid 2px;
  border-bottom-color:#ffe;
  border-left-color:#eed;
  border-right-color:#eed;
  border-top-color:#ccb;
  max-height:100%;
  max-width:100%;
}

.frame {
  background-color:#ddc;
  border:solid 5vmin #eee;
  border-bottom-color:#fff;
  border-left-color:#eee;
  border-radius:2px;
  border-right-color:#eee;
  border-top-color:#ddd;
  box-shadow:0 0 5px 0 rgba(0,0,0,.25) inset, 0 5px 10px 5px rgba(0,0,0,.25);
  box-sizing:border-box;
  display:inline-block;
  margin:10vh 10vw;

  position:relative;
  text-align:center;
  &:before {
    border-radius:2px;
    bottom:2px;
    box-shadow:0 2px 5px 0 rgba(0,0,0,.25) inset;
    content:"";
    left:-2vmin;
    position:absolute;
    right:-2vmin;
    top:-2vmin;
  }
  &:after {
    border-radius:2px;
    bottom:-2.5vmin;
    box-shadow: 0 2px 5px 0 rgba(0,0,0,.25);
    content:"";
    left:-2.5vmin;
    position:absolute;
    right:-2.5vmin;
    top:-2.5vmin;
  }
}
</style>
<div class="container">
   <div class="row">
      <div class="col-xs-12">
         <div class="pbox13">
            <a href="/">Home</a>  &gt;  CEO Massage            
         </div>
      </div>
   </div>
</div>
<div id="lhc_status_container_page"></div>
<div class="container">
<div class="frame">

<img src="{{asset($ceo->image)}}" class="pimg01 img-responsive" style="width: 350px; height: 321px;">
</div>
</div>

<br>


<div class="container">
   <div class="row">
      <div class="col-xs-12">
         <div class="pboxcontent">
           {!!$ceo->massage!!}
         </div>
      </div>
   </div>
</div>
<br><br><br><!-- #BeginLibraryItem "/Library/footer.lbi" -->
 



@endsection