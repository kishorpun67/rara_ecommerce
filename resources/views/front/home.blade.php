@extends('front.layout.layout')
@section('content')
<?php 
use App\Models\Product;
use App\Models\Comment;
  
?>
<!-- ===============./BILLBOARD STARTS HERE=======================-->
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
          @foreach ($banners as $banner)
            <div class="swiper-slide slide">
              <div class="slide-image" style="background-image:url({{asset($banner->image)}})"></div>
              <span class="slide-title">{{$banner->titles}}</span> 
            </div>
          @endforeach
   
          
          <!--         <div class="swiper-slide slide">
            <div class="slide imageswiper-lazy" data-background="https://images.unsplash.com/photo-1538083024336-555cf8943ddc?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=66b476a51b19889e13182c0e4827af18&auto=format&fit=crop&w=1950&q=80">
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
  <!-- ===============./BILLBOARD ENDS HERE=======================-->
  
  <section class="offer-banner ">
    <div class="overlay"></div>
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-md-12 text-center text-white">
          <figcaption class="overlay-text">
            <h2>Buy 1 Get 1 free <span>Weekend Special Offer!!</span> </h2>
            <p>The Project T-shirt</p>
            <p class="mb-0"><a href="#" class="btn btn-primary">Shop Now</a></p>
          </figcaption>
        </div>
      </div>
    </div>
  </section>
  <section class="ftco-section ftco-deal mb-5">
    <div class="container">
      <div class="row">
        <div class="col-md-6"> <img src="{{asset('front/images/198-1988250_image-of-chery-red-baseball-cap.png')}}" alt=""> </div>
        <div class="col-md-6">
          <div class="heading-section heading-section-white"> <span class="subheading">Deal of the month</span>
            <h2 class="mb-3">Deal of the month</h2>
          </div>
          <ul id="timer" class="mb-4">
            <li id="days" class="time"></li>
            <li  id="hours"class="time pl-4"></li>
            <li  id="minutes"class="time pl-4"></li>
            <li  id="seconds"class="time pl-4"></li>
          </ul>
          <div class="text-deal">
            <h2><a href="#">Nike Free RN 2019 iD</a></h2>
            <p class="price"><span class="mr-2 price-dc">$120.00</span><span class="price-sale">$80.00</span></p>
            <ul class="thumb-deal row mt-4">
              <li class="img col-4"><img src="{{asset('front/images/64-647908_american-red-cross-guard-cool-dry-mesh-cap.jpg')}}" alt=""></li>
              <li class="img col-4"><img src="{{asset('front/images/198-1988250_image-of-chery-red-baseball-cap.png')}}" alt=""></li>
              <li class="img col-4"><img src="{{asset('front/images/pexels-jens-mahnke-844867.jpg')}}" alt=""></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </section>
  <section class="order-category">
    <div class="container">
      <h1 class="section_title">Our Working Process</h1>
      <div class="shipping_process">
        <div class="shipping_item fadeInLeft animatable">
          <figure><img src="{{asset('front/images/001-confirm.png')}}"></figure>
          <span>Order Confirmed</span> </div>
        <div class="shipping_item fadeInLeft animatable">
          <figure> <img src="{{asset('front/images/process.png')}}"></figure>
          <span>On Process</span> </div>
        <div class="shipping_item fadeInLeft animatable">
          <figure><img src="{{asset('front/images/motorbike.png')}}"></figure>
          <span>On Delivery</span> </div>
        <div class="shipping_item fadeInLeft animatable">
          <figure><img src="{{asset('front/images/package-delivered.png')}}"></figure>
          <span>Delivered</span> </div>
      </div>
    </div>
    <!--<table>
        <thead>
          <tr>
            <th>Delivery status</th>
            <th>Estimated Time</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>order processed</td>
            <td>2 Minutes</td>
          </tr>
        </tbody>
      </table>--> 
  </section>
  {{-- <section class="work_portfolio">
    <div class="container">
      <h1 class="section_title">Work Portfolio</h1>
    </div>
    <div id="isotope-container">
      <div id="filter-big" class="filter"> <strong>Filter by category :</strong> <a href="#" data-filter="*">Show All</a> <a href="#" data-filter=".business-card">Business Card </a> <a href="#" data-filter=".brochure">Brochur</a> <a href="#" data-filter=".logo-design">Logo Design</a> <a href="#" data-filter=".postcard-design">Postcard Design</a> <a href="#" data-filter=".flyer-design">Flyer Design</a> </div>
      <div id="filter-small" class="filter"> <strong>Filter by category :</strong>
        <ul>
          <li><a href="#" data-filter="*">Show All</a></li>
          <li><a href="#" data-filter=".business-card">Business Card </a></li>
          <li><a href="#" data-filter=".brochure">Brochure</a></li>
          <li><a href="#" data-filter=".logo-design">Logo Design</a></li>
          <li><a href="#" data-filter=".postcard-design">Postcard Design</a></li>
          <li><a href="#" data-filter=".flyer-design">Flyer Design</a></li>
        </ul>
      </div>
      <div class="container">
        <div class="row justify-content-center">
          <div class="business-card col-md-3 col-sm-4 col-6 mb col">
            <figure> <a href="#"><img src="{{asset('front/images/port1.png')}}"></a> </figure>
          </div>
          <div class="business-card col-md-3 col-sm-4 col-6 mb col">
            <figure> <a href="#"> <img src="{{asset('front/images/port2.png')}}"></a> </figure>
          </div>
          <div class="brochure col-md-3 col-sm-4 col-6 mb col">
            <figure> <a href="#"> <img src="{{asset('front/images/port3.png')}}"></a> </figure>
          </div>
          <div class="brochure col-md-3 col-sm-4 col-6 mb col">
            <figure> <a href="#"> <img src="{{asset('front/images/port4.png')}}"></a> </figure>
          </div>
          <div class="brochure col-md-3 col-sm-4 col-6 mb col">
            <figure> <a href="#"> <img src="{{asset('front/images/port5.png')}}"></a> </figure>
          </div>
          <div class="logo-design col-md-3 col-sm-4 col-6 mb col">
            <figure> <a href="#"> <img src="{{asset('front/images/port4.png')}}"></a> </figure>
          </div>
          <div  class="logo-design col-md-3 col-sm-4 col-6 mb col">
            <figure> <a href="#"> <img src="{{asset('front/images/port5.png')}}"></a> </figure>
          </div>
          <div class="logo-design col-md-3 col-sm-4 col-6 mb col">
            <figure> <a href="#"> <img src="{{asset('front/images/port5.png')}}"></a> </figure>
          </div>
          <div class="logo-design col-md-3 col-sm-4 col-6 mb col">
            <figure> <a href="#"> <img src="{{asset('front/images/port6.png')}}"></a> </figure>
          </div>
          <div class="postcard-design col-md-3 col-sm-4 col-6 mb col">
            <figure> <a href="#"> <img src="{{asset('front/images/port1.png')}}"></a> </figure>
          </div>
          <div class=" postcard-design col-md-3 col-sm-4 col-6 mb col">
            <figure> <a href="#"><img src="{{asset('front/images/port5.png')}}"></a> </figure>
          </div>
          <div class="postcard-design col-md-3 col-sm-4 col-6 mb col">
            <figure> <a href="#"><img src="{{asset('front/images/port4.png')}}"></a> </figure>
          </div>
          <div class="flyer-design col-md-3 col-sm-4 col-6 mb col">
            <figure> <a href="#"> <img src="{{asset('front/images/port2.png')}}"></a> </figure>
          </div>
        </div>
      </div>
    </div>
  </section> --}}
  <section class="product_content">
    <div class="container">
      <h1 class="section_title">Top Sales</h1>
      <div class="row my-4">
        @foreach ($topProducts as $item)
          <div class="col col-lg-3 col-md-4 col-sm-6 col-6">
            <div class="product-item">
              <figure class="product_img"> <img src="{{asset($item->main_image)}}">
                <div class="view_button"> <a href="{{route('product', $item->url)}}"><i class="fa-solid fa-heart"></i></a> <a href="{{route('product', $item->url)}}"><i class="fa-solid  fa-cart-plus"></i></a> </div>
                <span class="on-sale-badge">Sale</span> </figure>
              <div class="product_caption">
                <h4>{{$item->product_name}}</h4>
                <div class="price"> <del class="regular-price">$100.00</del> <span class="sale-price">{{$item->product_price}}</span> </div>
                <?php 
                  $rating_sum = Comment::where(['product_id'=>$item->id])->sum('ratings');
                  $rating_count = Comment::where(['product_id'=>$item->id])->count();
                  if ($rating_count >0) {
                      $avag_rating = round($rating_sum/$rating_count, 2);
                      $avag_star_rating = round($rating_sum/$rating_count);        
                  } else{
                      $avag_rating = 0;
                      $avag_star_rating = 0; 
                  }
                ?>
                  <span class="reviews-stars">
                    <?php
                    $x = $avag_star_rating;
                    
                    while($x > 0) {
                    echo '<i class="fa fa-star" aria-hidden="true"></i>';
                    $x--;
                    }
                    $y = 5-$avag_star_rating;
                      // echo $;
                      while($y > 0) {
                      echo '<i class="fa fa-star-o" aria-hidden="true"></i>';
                      $y--;
                    }
                ?> 
                </span> <span class="reviews-count">({{$avag_rating}})</span> 
              </div>
            </div>
          </div>
        @endforeach
      </div>
    </div>
  </section>
  <section class="product_content">
    <div class="container">
      <h1 class="section_title">Latest Products</h1>
      <div class="row my-4">
        @foreach ($latestProduct as $item)
          <div class="col col-lg-3 col-md-4 col-sm-6 col-6">
            <div class="product-item">
              <figure class="product_img"> <img src="{{asset($item->main_image)}}">
                <div class="view_button"> <a href="{{route('product', $item->url)}}"><i class="fa-solid fa-heart"></i></a> <a href="{{route('product', $item->url)}}"><i class="fa-solid  fa-cart-plus"></i></a> </div>
                <span class="on-sale-badge">Sale</span> </figure>
              <div class="product_caption">
                <h4>{{$item->product_name}}</h4>
                <div class="price"> <del class="regular-price">$100.00</del> <span class="sale-price">{{$item->product_price}}</span> </div>
                <?php 
                  $rating_sum = Comment::where(['product_id'=>$item->id])->sum('ratings');
                  $rating_count = Comment::where(['product_id'=>$item->id])->count();
                  if ($rating_count >0) {
                      $avag_rating = round($rating_sum/$rating_count, 2);
                      $avag_star_rating = round($rating_sum/$rating_count);        
                  } else{
                      $avag_rating = 0;
                      $avag_star_rating = 0; 
                  }
                ?>
                  <span class="reviews-stars">
                    <?php
                    $x = $avag_star_rating;
                    
                    while($x > 0) {
                    echo '<i class="fa fa-star" aria-hidden="true"></i>';
                    $x--;
                    }
                    $y = 5-$avag_star_rating;
                      // echo $;
                      while($y > 0) {
                      echo '<i class="fa fa-star-o" aria-hidden="true"></i>';
                      $y--;
                    }
                ?> 
                </span> <span class="reviews-count">({{$avag_rating}})</span> 
              </div>
            </div>
          </div>
        @endforeach
      </div>
    </div>
  </section>
  <section class="product_content">
    <div class="container">
      <h1 class="section_title">Feature Products</h1>
      <div class="row my-4">
        @foreach ($featuredItems as $item)
          <div class="col col-lg-3 col-md-4 col-sm-6 col-6">
            <div class="product-item">
              <figure class="product_img"> <img src="{{asset($item->main_image)}}">
                <div class="view_button"> <a href="{{route('product', $item->url)}}"><i class="fa-solid fa-heart"></i></a> <a href="{{route('product', $item->url)}}"><i class="fa-solid  fa-cart-plus"></i></a> </div>
                <span class="on-sale-badge">Sale</span> </figure>
              <div class="product_caption">
                <h4>{{$item->product_name}}</h4>
                <div class="price"> <del class="regular-price">$100.00</del> <span class="sale-price">{{$item->product_price}}</span> </div>
                <?php 
                  $rating_sum = Comment::where(['product_id'=>$item->id])->sum('ratings');
                  $rating_count = Comment::where(['product_id'=>$item->id])->count();
                  if ($rating_count >0) {
                      $avag_rating = round($rating_sum/$rating_count, 2);
                      $avag_star_rating = round($rating_sum/$rating_count);        
                  } else{
                      $avag_rating = 0;
                      $avag_star_rating = 0; 
                  }
                ?>
                  <span class="reviews-stars">
                    <?php
                    $x = $avag_star_rating;
                    
                    while($x > 0) {
                    echo '<i class="fa fa-star" aria-hidden="true"></i>';
                    $x--;
                    }
                    $y = 5-$avag_star_rating;
                      // echo $;
                      while($y > 0) {
                      echo '<i class="fa fa-star-o" aria-hidden="true"></i>';
                      $y--;
                    }
                ?> 
                </span> <span class="reviews-count">({{$avag_rating}})</span> 
              </div>
            </div>
          </div>
        @endforeach
      </div>
    </div>
  </section>
  <section class="product-slider">
    <div class="container">
      <h1 class="section_title">Our Products</h1>
      <div class="carousel-wrap four-carousel-wrap">
        <div class="owl-carousel product-carousel owl-theme">
          @foreach ($ourProducts as $item)
            <div class="item product-item"> <a href="{{route('product', $item->url)}}""> <img src="{{asset($item->main_image)}}">
              <div class="product_caption">
                <h4>{{$item->product_name}}</h4>
                <div class="price"> <del class="regular-price">$100.00</del> <span class="sale-price">{{$item->product_price}}</span> </div>
                <?php 
                  $rating_sum = Comment::where(['product_id'=>$item->id])->sum('ratings');
                  $rating_count = Comment::where(['product_id'=>$item->id])->count();
                  if ($rating_count >0) {
                      $avag_rating = round($rating_sum/$rating_count, 2);
                      $avag_star_rating = round($rating_sum/$rating_count);        
                  } else{
                      $avag_rating = 0;
                      $avag_star_rating = 0; 
                  }
                ?>
                  <span class="reviews-stars">
                    <?php
                    $x = $avag_star_rating;
                    
                    while($x > 0) {
                    echo '<i class="fa fa-star" aria-hidden="true"></i>';
                    $x--;
                    }
                    $y = 5-$avag_star_rating;
                      // echo $;
                      while($y > 0) {
                      echo '<i class="fa fa-star-o" aria-hidden="true"></i>';
                      $y--;
                    }
                ?> 
                </span> <span class="reviews-count">({{$avag_rating}})</span> 
              </div>
              </a> 
            </div>
          @endforeach
        </div>
        <div class="btn_center"> <a href="{{route('all.products')}}" class="btn btn-default btn-danger mt-3">View more</a> </div>
      </div>
    </div>
  </section>
  <section class="section1 my-3">
    <div class="slider">
      <div class="slide-track">
        <div class="slide"> <img src="https://i.postimg.cc/ZnrLHtvj/icon-7.png" height="100" alt="" /> </div>
        <div class="slide"> <img src="https://i.postimg.cc/ZnrLHtvj/icon-7.png" height="100" alt="" /> </div>
        <div class="slide"> <img src="https://i.postimg.cc/ZnrLHtvj/icon-7.png" height="100" alt="" /> </div>
        <div class="slide"> <img src="https://i.postimg.cc/ZnrLHtvj/icon-7.png" height="100" alt="" /> </div>
        <div class="slide"> <img src="https://i.postimg.cc/ZnrLHtvj/icon-7.png" height="100" alt="" /> </div>
        <div class="slide"> <img src="https://i.postimg.cc/ZnrLHtvj/icon-7.png" height="100" alt="" /> </div>
        <div class="slide"> <img src="https://i.postimg.cc/ZnrLHtvj/icon-7.png" height="100" alt="" /> </div>
        <div class="slide"> <img src="https://i.postimg.cc/ZnrLHtvj/icon-7.png" height="100" alt="" /> </div>
        <div class="slide"> <img src="https://i.postimg.cc/ZnrLHtvj/icon-7.png" height="100" alt="" /> </div>
        <div class="slide"> <img src="https://i.postimg.cc/ZnrLHtvj/icon-7.png" height="100" alt="" /> </div>
        <div class="slide"> <img src="https://i.postimg.cc/ZnrLHtvj/icon-7.png" height="100" alt="" /> </div>
        <div class="slide"> <img src="https://i.postimg.cc/ZnrLHtvj/icon-7.png" height="100" alt="" /> </div>
        <div class="slide"> <img src="https://i.postimg.cc/ZnrLHtvj/icon-7.png" height="100" alt="" /> </div>
        <div class="slide"> <img src="https://i.postimg.cc/ZnrLHtvj/icon-7.png" height="100" alt="" /> </div>
      </div>
    </div>
  </section>
  
  <!--SECTION2-->
  
  <div class="section2 container">
    <section> <em>Category</em>
      <h1 class="title">Our Categories</h1>
      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod. Tempor incididunt ut labore…</p>
    </section>
    <section> <span> <img src="https://i.postimg.cc/ncbRDT90/card-1.jpg" alt="" loading="lazy">
      <p>Candles</p>
      </span> <span> <img src="https://i.postimg.cc/4ytW0Hq6/card-2.jpg" alt="" loading="lazy">
      <p>Accessories</p>
      </span> <span> <img src="https://i.postimg.cc/2SC0H6wW/card-3.jpg" alt="" loading="lazy">
      <p>Gift Set</p>
      </span> </section>
  </div>
  <div class="section5">
    <section>
      <figure><img src="https://i.postimg.cc/wTQVszpj/03.jpg" alt="" loading="lazy"></figure>
    </section>
    <section> <span>
      <h1 class="title">The Self Discovery Collection</h1>
      </span> </section>
  </div>
  <section class="flash-sale py-3">
    <div class="container">
      <h1 class="section_title">Flash Sale</h1>
      <div class="carousel-wrap">
        <div class="owl-carousel owl-theme">
          @foreach ($flashSale as $item)
            <div class="item">
              <figure class="product-offer"> <img src="{{asset($item->main_image)}}">
                <div class="offer-text">
                  <h6 class="text-white text-uppercase">Save {{$item->discount}}%</h6>
                  <h3 class="text-white mb-3">Special Offer</h3>
                  <a href="{{route('product', $item->url)}}" class="btn btn-primary">Shop Now</a> </div>
              </figure>
            </div>
          @endforeach
      
         
        </div>
      </div>
    </div>
  </section>
  <section class="review_section py-5">
    <div class="bg-overlay"> </div>
    <div class="container">
      <h1 class="section_title text-white">Testimonial</h1>
      <div class="testimonial_content">
        <div class="carousel-wrap text-white">
          <div class="owl-carousel owl-theme">
            @foreach($testimonial as $data)
              <div class="item"> <a href="javascript:void(0)">
                <figure class="img-circle"> <img src="{{asset($data->image)}}" alt=""> </figure>
                </a>
                <figcaption> <span class="author">{{ $data->name}}</span> <span class="post">{{ $data->post}}</span>
                    <p>{{ $data->description}} </p>            
                </figcaption>
              </div>
            @endforeach
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection