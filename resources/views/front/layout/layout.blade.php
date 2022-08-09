<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="">
<meta name="author" content="">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<link rel="shortcut icon" href="images/favicon.png" type="image/x-icon">
<title> @if(!empty($meta_title)){{$meta_title}} @else Ecommerce | Home @endif</title>
@if(!empty($meta_description))
    <meta name="description" content="{{$meta_description}}">
@endif
@if(!empty($meta_keywords))
    <meta name="keywords" content="{{$meta_keywords}}">
@endif
<link rel="stylesheet" type="text/css" href="{{asset('front/css/bootstrap.css')}}" />
<link rel="stylesheet" type="text/css" href="{{asset('front/fonts/fontawesome-free-6.0.0-web/css/fontawesome.cs')}}s">
<link rel="stylesheet" type="text/css" href="{{asset('front/fonts/fontawesome-free-6.0.0-web/css/solid.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('front/fonts/fontawesome-free-6.0.0-web/css/regular.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('front/fonts/fontawesome-free-6.0.0-web/css/brands.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('front/fonts/font-awesome-4.7.0/css/font-awesome-4.7.0.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('front/fonts/font-awesome-4.7.0/css/font-awesome-4.7.0.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('front/fonts/fonts.css')}}"/>
<link rel="stylesheet" type="text/css" href="{{asset('front/css/animate.css')}}" />
<link rel="stylesheet" type="text/css" href="{{asset('front/lightbox/css/lightbox.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('front/css/owl.carouselv2.3.4.css')}}"/>
<link rel="stylesheet" type="text/css" href="{{asset('front/css/reset.css')}}"/>
<link rel="stylesheet" type="text/css" href="{{asset('front/css/style.css')}}" />
<link rel="stylesheet" type="text/css" href="{{asset('front/css/isotope.css')}}" />
<link rel="stylesheet" type="text/css" href="{{asset('front/css/jQuery_countdown_timer.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('front/css/multilevel_Dropdownmenu.css')}}"/>
<link rel="stylesheet" type="text/css" href="{{asset('front/css/responsive.css')}}" />
<link rel="stylesheet" type="text/css" href="{{asset('front/easyzoom/easyzoom.css')}}"/>
<link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;500;600;700&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Balsamiq+Sans:ital,wght@0,400;0,700;1,400;1,700&display=swap" rel="stylesheet">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Krub:wght@200;300;400;500;600;700&display=swap" rel="stylesheet">
<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->
<script type="text/javascript" src="{{asset('front/js/jquery-1.9.1.min.js')}}"></script> 
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">


@yield('styles')

</head>
<body>

    @include('front.layout.header')
    @yield('content')
    @include('front.layout.footer')

<section class="back_top"><!--//back to top scroll-->
    <div class="container">
      <div id="back-top" style="display: block;"> <a href="#top" title="Go to top"><i class="fa fa-angle-up" aria-hidden="true"></i> </a> </div>
    </div>
  </section>
  <!--//back to top scroll--> 
  
  <script type="text/javascript" src="{{asset('front/js/owl.carouselv2.3.4.js')}}"></script> 
  <script type="text/javascript">
  
  
  
  
  
  $('.product-slider .owl-carousel').owlCarousel({
    loop: false,
    margin: 10,
    dots:false,
    nav: true,
  //  navText: [
  //    "<i class='fa fa-caret-left'></i>",
  //    "<i class='fa fa-caret-right'></i>"
  //  ],
    autoplay: true,
    autoplayHoverPause: true,
    responsive: {
      0: {
        items: 1
      },
      
     480: {
      items: 2
    },
      
      600: {
        items: 3
      },
      1000: {
        items: 4
      }
    }
    
  })
  
  
  
  
  
  
  $('.flash-sale .owl-carousel').owlCarousel({
    loop: false,
    margin: 25,
    dots:false,
    nav: false,
  //  navText: [
  //    "<i class='fa fa-caret-left'></i>",
  //    "<i class='fa fa-caret-right'></i>"
  //  ],
    autoplay: true,
    autoplayHoverPause: true,
    responsive: {
      0: {
        items: 1
      },
      
     480: {
      items: 2
    },
      
      600: {
        items: 2
      },
      1000: {
        items: 2
      }
    }
    
  })
  
  
  $('.testimonial_content .owl-carousel').owlCarousel({
    loop: false,
    margin: 0,
    nav: true,
     dots:true,
    autoplay: true,
    autoplayHoverPause: true,
    responsive: {
      0: {
        items: 1
      },
   
   
       480: {
      items: 1
    },
      
      600: {
        items: 1
      },
      
      1000: {
        items:1
      }
    }
  })
  
  </script> 
  <script type="text/javascript" src="{{asset('front/js/fixed-nav.js')}}"></script> 
  <script type="text/javascript" src="{{asset('front/js/jquery.js')}}"></script> 
  <script type="text/javascript" src="{{asset('front/js/bootstrap.js')}}"></script> 
  <script type="text/javascript" src="{{asset('front/js/Push_up_jquery.js')}}"></script> 
  <script type="text/javascript" src="{{asset('front/js/equalheight.js')}}"></script> 
  <!--<script type="text/javascript" src="lightbox/js/lightbox.js"></script>  --> 
  
  <script type='text/javascript' src="{{asset('front/js/isotope.min.js')}}"></script> 
  <script type='text/javascript' src="{{asset('front/js/front_script.js')}}"></script> 

  <script type="text/javascript">
      var $container = $('#isotope-container .container .row');
      // Isotope initialize
      $container.isotope();
  
      /* ---- Filtering ----- */
      $('#isotope-container').find('.filter a').first().addClass('active');
      $("#isotope-container").find('.filter a').click(function(){		
          if ( $(this).hasClass('active') ) {			  
              return false;		  
          } 
          else {				
              $('#isotope-container').find('.filter a').removeClass('active');				
              var selector = $(this).attr('data-filter');
              $container.isotope({ filter: selector });
              $(this).addClass('active');
              return false;			
          }
      });	
      
   
   
  </script> 
  
  <script type="text/javascript" src="{{asset('front/js/annimatable_jquery.js')}}"></script> 
  <script type="text/javascript" src="{{asset('front/js/multilevel_Dropdownmenu.js')}}"></script> 
 

  <script src="{{asset('front/js/bootsnipp_animated_slider.js')}}"></script>
  
  <script src="{{asset('front/js/bootsnipp_animated_slider.js')}}"></script> 
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    <script>

        @if(Session::has('success_message'))
            toastr.options =
            {
                "closeButton" : true,
                "progressBar" : true
            }
                toastr.success("{{ session('success_message') }}");
        @endif
        @if(Session::has('error_message'))
            toastr.options =
            {
                "closeButton" : true,
                "progressBar" : true
            }
                    toastr.error("{{ session('error_message') }}");
        @endif
    </script>
<script>
  // Show the first tab and hide the rest
  $('#tabs-nav li:first-child').addClass('active');
  $('.tab-content').hide();
  $('.tab-content:first').show();
  
  // Click function
  $('#tabs-nav li').mouseenter(function(){
    $('#tabs-nav li').removeClass('active');
   // $(this).addClass('active');
    $('.tab-content').hide();
    
    var activeTab = $(this).find('a').attr('href');
    $(activeTab).fadeIn();
    return false;
    function button1(){

      document.getElementById('button1').className='show';
      document.getElementById('button2').className='hide';

      document.getElementById('b2_name').value='';
      }

      function button2(){

      document.getElementById('button2').className='show';
      document.getElementById('button1').className='hide';

      document.getElementById('b1_name').value='';


      }
    });
  </script> 
  <script type="text/javascript" src="{{asset('front/js/jQuery_countdown_timer.js')}}"></script> 
  <!-------------Easy zoomer scripts--------------------> 
  
  <script type="text/javascript" src="{{asset('front/easyzoom/easyzoom.js')}}"></script> 
  <script>
          // Instantiate EasyZoom plugin
          var $easyzoom = $('.easyzoom').easyZoom();
  
          // Get the instance API
          var api = $easyzoom.data('easyZoom');
          $('.owl-carousel').owlCarousel({
            loop: true,
            margin: 10,
            dots: true,
            nav: true,
            //  navText: [
            //    "<i class='fa fa-caret-left'></i>",
            //    "<i class='fa fa-caret-right'></i>"
            //  ],
            autoplay: true,
            autoplayHoverPause: true,
            responsive: {
                0: {
                    items: 1
                },

                480: {
                    items: 2
                },

                600: {
                    items: 3
                },
                1000: {
                    items: 4
                }
            }

        })
        var $container = $('#isotope-container .container .row');
        // Isotope initialize
        $container.isotope();

        /* ---- Filtering ----- */
        $('#isotope-container').find('.filter a').first().addClass('active');
        $("#isotope-container").find('.filter a').click(function() {
            if ($(this).hasClass('active')) {
                return false;
            } else {
                $('#isotope-container').find('.filter a').removeClass('active');
                var selector = $(this).attr('data-filter');
                $container.isotope({
                    filter: selector
                });
                $(this).addClass('active');
                return false;
            }
        });
        function button1() {
          document.getElementById('button1').className = 'show';
          document.getElementById('button2').className = 'hide';
          document.getElementById('b2_name').value = '';
          }
          function button2() {
          document.getElementById('button2').className = 'show';
          document.getElementById('button1').className = 'hide';

          document.getElementById('b1_name').value = '';


          }
          $('.btn-number').click(function(e) {
            e.preventDefault();

            fieldName = $(this).attr('data-field');
            type = $(this).attr('data-type');
            var input = $("input[name='" + fieldName + "']");
            var currentVal = parseInt(input.val());
            if (!isNaN(currentVal)) {
                if (type == 'minus') {

                    if (currentVal > input.attr('min')) {
                        input.val(currentVal - 1).change();
                    }
                    if (parseInt(input.val()) == input.attr('min')) {
                        $(this).attr('disabled', true);
                    }

                } else if (type == 'plus') {

                    if (currentVal < input.attr('max')) {
                        input.val(currentVal + 1).change();
                    }
                    if (parseInt(input.val()) == input.attr('max')) {
                        $(this).attr('disabled', true);
                    }

                }
            } else {
                input.val(0);
            }
        });
        $('.input-number').focusin(function() {
            $(this).data('oldValue', $(this).val());
        });
        $('.input-number').change(function() {

            minValue = parseInt($(this).attr('min'));
            maxValue = parseInt($(this).attr('max'));
            valueCurrent = parseInt($(this).val());

            name = $(this).attr('name');
            if (valueCurrent >= minValue) {
                $(".btn-number[data-type='minus'][data-field='" + name + "']").removeAttr('disabled')
            } else {
                alert('Sorry, the minimum value was reached');
                $(this).val($(this).data('oldValue'));
            }
            if (valueCurrent <= maxValue) {
                $(".btn-number[data-type='plus'][data-field='" + name + "']").removeAttr('disabled')
            } else {
                alert('Sorry, the maximum value was reached');
                $(this).val($(this).data('oldValue'));
            }


        });
        $(".input-number").keydown(function(e) {
            // Allow: backspace, delete, tab, escape, enter and .
            if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 190]) !== -1 ||
                // Allow: Ctrl+A
                (e.keyCode == 65 && e.ctrlKey === true) ||
                // Allow: home, end, left, right
                (e.keyCode >= 35 && e.keyCode <= 39)) {
                // let it happen, don't do anything
                return;
            }
            // Ensure that it is a number and stop the keypress
            if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
                e.preventDefault();
            }
        });
       
      </script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>

  </body>
  </html>
  