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
        </div>
        <div class="slideshow-pagination"></div>
        <div class="slideshow-navigation">
          <div class="slideshow-navigation-button prev"><i class="fa fa-chevron-left"></i></div>
          <div class="slideshow-navigation-button next"><i class="fa fa-chevron-right"></i></div>
        </div>
      </div>
    </div>
</section>
<section class="subpage_section cart_section  my-5">
    <div class="container">
      <heading class="section_tittle text-center py-3"> 
        <!--  <p>Our Services</p>-->
        <h1 class="section_title">Order Summary</h1>
      </heading>
      <div class="row">
        <div class="col-md-6">
          <h5>Billing Address</h5>
          <p><Strong>Name: </Strong> {{auth()->user()->name}}</p>
          <p><Strong>Email: </Strong> {{auth()->user()->email}}</p>
          <p><Strong>Contact: </Strong> {{auth()->user()->number}}</p>
          <p><Strong>Address: </Strong> {{auth()->user()->address}}</p>
          <p><Strong>City: </Strong> {{auth()->user()->city}}</p>
          <p><Strong>Country: </Strong> {{auth()->user()->country}}</p>
        </div>
        <div class="col-md-6">
          <h5>Shipping Address</h5>
          <p><Strong>Name: </Strong> {{$shippingDetails->name}}</p>
          <p><Strong>Email: </Strong> {{$shippingDetails->email}}</p>
          <p><Strong>Contact: </Strong> {{$shippingDetails->contact}}</p>
          <p><Strong>Address: </Strong> {{$shippingDetails->address}}</p>
          <p><Strong>City: </Strong> {{$shippingDetails->city}}</p>
          <p><Strong>Country: </Strong> {{$shippingDetails->country}}</p>
        </div>
        <div class="col-md-12 col-sm-12">
          <h4>Order Items</h4>
          <table id="cartContentsDisplay" width="100%" cellspacing="0" cellpadding="0" border="0">
            <thead>
              <tr>
                <th><label class="product-serial">SN</label></th>
                <th><label class="product-image">Image</label></th>
                <th><label class="product-details">Product</label></th>
                <th><label class="product-price">Price</label></th>
                <th><label class="product-quantity">Quantity</label></th>
                <th><label class="product-line-price">Total</label></th>
              </tr>
            </thead>
            <tbody class="product">
                <?php $sub_total = 0; $i=1;?>
                @foreach ($userCart as $cart)
                  <tr>
                      <td>{{$i}}</td><?php $i++;?>
                      <td><figure class="product-image"> <img src="{{$cart->product_image}}" alt="" title=""> </figure></td>
                      <td><div class="product-details">
                          <div class="product-title">{{$cart->product_name}}({{$cart->product_code}})</div>
                      </div></td>
                      <td><div class="product-price">{{$cart->price}}</div></td>
                      <td><div class="product-quantity">
                        {{$cart->quantity}}
                      </div></td>
                      <td><div class="product-line-price">{{$cart->price*$cart->quantity}}</div></td>
                  </tr>
                  <?php $sub_total += $cart->price*$cart->quantity ?>
                @endforeach
            </tbody>
          </table>
          <div class="price-total">
            <table id="shopcart-total" width="100%" cellspacing="0" cellpadding="0" border="0" align="center">
              <tbody>
                <tr>
                  <td class="price-of">Sub Total:</td>
                  <td>{{$sub_total}}</td>
                </tr>
                <tr>
                  <td class="price-of">Tax(%)</td>
                  <td>10%<td>
                </tr>
                <tr>
                  <td class="price-of">Delivery charge</td>
                  <td>50</td>
                </tr>
                <?php 
                    $total = $sub_total +($sub_total *10 /100);
                    $grand_total = $total +50;
                ?>
                <tr class="grand-total">
                  <td class="price-of">Grand Total:</td>
                  <td>{{$grand_total}}</td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12">
          <div class="panel panel-info">
            <div class="panel-heading">
              <h4 class="panel-title">Payment Methods</h4>
            </div>
            <div class="pay__option tooltip-item">
              <form class="pay__form" role="form" action="{{route('place.order')}}" method="POST">
                @csrf
                <input type="hidden" name="tax" value="10" />
                <input type="hidden" name="sub_total" value="{{$sub_total}}" />
                <input type="hidden" name="delivery_charge" value="50" />
                <input type="hidden" name="grand_total" value="{{$grand_total}}" />
                <label for="cod">
                  <input type="radio" value="cod" name="payment_method">
                  <a href="#"><span tooltip="Cash on delivery" flow="up"><img src="{{asset('front/images/cash_on_delivery.png')}}" alt=""></span></a> </label>
                <label for="khalti">
                  <input type="radio" value="khalti" name="payment_method">
                  <a href="#"><span tooltip="Khalti" flow="up"><img src="{{asset('front/images/khalti.jpg')}}" alt=""></span></a> </label>
                <label for="esewa">
                  <input type="radio" value="esewa" name="payment_method">
                  <a href="#"><span tooltip="esewa" flow="up"><img src="{{asset('front/images/esewa.jpg')}}" alt=""></span></a> </label>
                <label for="phonepay">
                  <input type="radio" value="esewa" name="payment_method">
                  <a href="#"><span tooltip="phonepay" flow="up"><img src="{{asset('front/images/phonepay.jpg')}}" alt=""></span></a> </label>
                <input type="submit" class="btn btn-pay  btn-danger" value="Pay Order">
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection
