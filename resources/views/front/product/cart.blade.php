@extends('front.layout.layout')
@section('content')
<section id="billboard"> 
  
    <!-- ===./HOMEPAGE  SLIDER STARTS====--> 
    <!-- ===./MAIN SLIDER STARTS====-->
    
    <div class="banner-slider"> 
      
      <!--<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>--> 
      <!------ Include the above in your HEAD tag ---------->
      <link rel="stylesheet" type="text/css" href="{{asset('front/css/bootsnipp_animated_slider.css')}}">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.4.1/css/swiper.min.css">
      <!--   <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">--> 
      <!--<link href="https://fonts.googleapis.com/css?family=Oswald:500" rel="stylesheet">--> 
      <script>!function(e){"undefined"==typeof module?this.charming=e:module.exports=e}(function(e,n){"use strict";n=n||{};var t=n.tagName||"span",o=null!=n.classPrefix?n.classPrefix:"char",r=1,a=function(e){for(var n=e.parentNode,a=e.nodeValue,c=a.length,l=-1;++l<c;){var d=document.createElement(t);o&&(d.className=o+r,r++),d.appendChild(document.createTextNode(a[l])),n.insertBefore(d,e)}n.removeChild(e)};return function c(e){for(var n=[].slice.call(e.childNodes),t=n.length,o=-1;++o<t;)c(n[o]);e.nodeType===Node.TEXT_NODE&&a(e)}(e),e});
  </script> 
      <script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.4.1/js/swiper.min.js"></script> 
      <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/2.0.2/TweenMax.min.js"></script>
      <div class="swiper-container slideshow">
        <div class="swiper-wrapper">
          <div class="swiper-slide slide">
            <div class="slide-image" style="background-image:url({{asset('front/images/slider-31-1057x490.jpg')}})"></div>
            <span class="slide-title">Exotic places</span> </div>
          <div class="swiper-slide slide">
            <div class="slide-image" style="background-image:url({{asset('front/images/slider-32-1057x490.jpg')}})"></div>
            <span class="slide-title">Meet ocean</span> </div>
          <div class="swiper-slide slide">
            <div class="slide-image" style="background-image:url({{asset('front/images/slider-34-1057x490.jpg')}})"></div>
            <span class="slide-title">Around the world</span> </div>
          
          <!--         <div class="swiper-slide slide">
            <div class="slide-imageswiper-lazy" data-background="https://images.unsplash.com/photo-1538083024336-555cf8943ddc?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=66b476a51b19889e13182c0e4827af18&auto=format&fit=crop&w=1950&q=80">
            </div>
            </div>
            <span class="slide-title">Exotic places</span>
          </div>
        
          <div class="swiper-slide slide">
            <div class="slide-image swiper-lazy" data-background="https://images.unsplash.com/photo-1500375592092-40eb2168fd21?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=e07d2457879a4e15577ec75a31023e47&auto=format&fit=crop&w=2134&q=80">
            </div>
            <span class="slide-title">Meet ocean</span>
          </div>
        
          <div class="swiper-slide slide">
            <div class="slide-image swiper-lazy" data-background="https://images.unsplash.com/photo-1482059470115-0aadd6bf6834?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=267bba9a4e280ec64388fe8fb01e9d1b&auto=format&fit=crop&w=1950&q=80">
            </div>
            <span class="slide-title">Around the world</span>
          </div> --> 
          
        </div>
        <div class="slideshow-pagination"></div>
        <div class="slideshow-navigation">
          <div class="slideshow-navigation-button prev"><i class="fa fa-chevron-left"></i></div>
          <div class="slideshow-navigation-button next"><i class="fa fa-chevron-right"></i></div>
        </div>
      </div>
    </div>
    
    <!-- ===./MAIN SLIDER ENDS====--> 
    <!-- ====./HOMEPAGE  SLIDER ENDS====--> 
    
</section>
<section class="subpage_section cart_section  my-5">
    <div class="container">
      <heading class="section_tittle text-center py-3"> 
        <!--  <p>Our Services</p>-->
        <h1 class="section_title">Cart</h1>
      </heading>
      <div class="cart_content" id="ajaxCart">
        @include('front.product.ajax_cart')
      </div>
      <div class="clear"></div>
    </div>
  </section>
@endsection