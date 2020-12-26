      <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
         {{-- <style type="text/css">
            /* General/reset styles */



/* Header styles */



h1 {
  padding-top: 100px;
  padding-top: -webkit-calc(50vh - 113px);
  padding-top: expression(50vh - 113px);
  padding-top: -moz-calc(50vh - 113px);
  padding-top: -o-calc(50vh - 113px);
  padding-top: calc(50vh - 113px);
  font-size: 5em;
  font-weight: bold;
}







/* Media queries */

@media (max-width: 759px) {
  header h1 {
    font-size: 5em;
  }
}

@media (max-width: 475px) {

  header h1 {
    font-size: 3.2em;
  }  
}
         </style> --}}
         <!-- Wrapper for slides -->
         <div class="carousel-inner" role="listbox">
            @foreach($slider as $key=>$row)
            <div class="item {{$key == 0 ? 'active' : ''}}">
               <a href="" target="_blank" >
                  <img src="{{asset($row->slider)}}" style="width: 1519px; height: 532px;">
               <div class="carousel-caption d-none d-md-block ">
                   
                         <h1  class="animated bounceInDown" style="padding-bottom: 180px;"><b>{!!$row->title!!}</b></h1>
                     
                      
               </div>
               </a>

            </div>
            @endforeach
         </div>
            @php 
                  $sl=0;
            @endphp
         <!-- Indicators -->
         <ol class="carousel-indicators">
         @foreach($slider as $key=>$row)   
            <li data-target="#carousel-example-generic" data-slide-to="{{$sl++}}" class="{{$key == 0 ? 'active' : ''}}" ></li>
         @endforeach
         </ol>
         <!-- Controls -->
         <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
         <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
         <span class="sr-only">Previous</span>
         </a>
         <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
         <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
         <span class="sr-only">Next</span>
         </a>
      </div>
      <script type="text/javascript">
         // Scroll function courtesy of Scott Dowding; http://stackoverflow.com/questions/487073/check-if-element-is-visible-after-scrolling

$(document).ready(function() {
  // Check if element is scrolled into view
  function isScrolledIntoView(elem) {
    var docViewTop = $(window).scrollTop();
    var docViewBottom = docViewTop + $(window).height();

    var elemTop = $(elem).offset().top;
    var elemBottom = elemTop + $(elem).height();

    return elemBottom <= docViewBottom && elemTop >= docViewTop;
  }
  // If element is scrolled into view, fade it in
  $(window).scroll(function() {
    $(".scroll-animations .animated").each(function() {
      if (isScrolledIntoView(this) === true) {
        $(this).addClass("fadeInLeft");
      }
    });
  });

  // Click Animations
  $("button").on("click", function() {
    /*
    If any input is empty make it's border red and shake it. After the animation is complete, remove the shake and animated classes so that the animation can repeat.
    */

    // Check name input
    if ($("#name").val() === "") {
      $("#name")
        .addClass("form-error animated shake")
        .one(
          "webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend",
          function() {
            $(this).removeClass("animated shake");
          }
        );
    } else {
      $("#name").removeClass("form-error");
    }

    // Check email input
    if ($("#email").val() === "") {
      $("#email")
        .addClass("form-error animated shake")
        .one(
          "webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend",
          function() {
            $(this).removeClass("animated shake");
          }
        );
    } else {
      $("#email").removeClass("form-error");
    }

    // Check message textarea
    if ($("#message").val() === "") {
      $("#message")
        .addClass("form-error animated shake")
        .one(
          "webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend",
          function() {
            $(this).removeClass("animated shake");
          }
        );
    } else {
      $("#message").removeClass("form-error");
    }
  });
});
      </script>