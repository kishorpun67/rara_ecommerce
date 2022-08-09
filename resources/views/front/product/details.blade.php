
    @extends('front.layout.layout')
    @section('content')
    <section id="billboard" class="inner-page product-page"> 
      <div class="bg-card"> <!--<img src="images/bac2.jpg" class="card-img" alt="This is Card image">-->
          <div class="bg-card-img-overlay"> </div>
              <div class="card-caption text-white">
                  <div class="container">
                      <div class="pulse animatable">
                          <div class="breadCrumbNav">
                              <div class="container breadcrumb-container">
                                  <h1 class="breadCrumb_title"> Product Detail</h1>
                                  <div class="breadcumb-inner">
                                  <ul>
                                      <li><a href="{{route('home')}}" class="breadCrumb_link">Home</a></li>
                                      <li><i class="fa-solid fa-arrow-right-long"></i></li>
                                      <li><span>Product Detail</span></li>
                                  </ul>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </section>
        <section class="subpage_section cart_section  my-5">
            <div class="container">
              <heading class="section_tittle text-center py-3"> 
                <!--  <p>Our Services</p>-->
                <h1 class="section_title">Product Detail</h1>
              </heading>
              <div class="product-wrapper my-5">
                <div class="container">
                  <div class="row">
                    <div class="col-md-6 col-12">
                      <div class="product-image">
                        <div class="easyzoom easyzoom--overlay"> <a href="{{asset($productDetails->main_image)}}"> <i class="fa-solid fa-magnifying-glass-plus"></i><img src="{{asset($productDetails->main_image)}}" class="zoomlay-img"/> </a> </div>
                      </div>
                    </div>
                    <div class="col-md-6 col-12">
                      <div class="product-features">
                        <ul class="nav nav-tabs">
                          <li><a data-toggle="tab" class="active" href="#product-price">Item</a></li>
                          <li><a data-toggle="tab" href="#product-description">Description</a></li>
                          {{-- <li><a data-toggle="tab" href="#product-reviews">Reviews</a></li> --}}
                        </ul>
                        <form action="{{route('add.cart')}}" method="post">
                          @csrf
                          <input type="hidden" name="product_id" value="{{$productDetails->id}}"/>
                          <input type="hidden" name="product_name" value="{{$productDetails->product_name}}"/>
                          <input type="hidden" name="product_image" value="{{$productDetails->main_image}}"/>
                          <input type="hidden" id="product_price" name="product_price" value="{{$productDetails->product_price}}"/>
                        <div class="tab-content" style="display: block;">
                          <div id="product-price" class="tab-pane in active">
                            <div class="product-section">
                              <h3>{{$productDetails->product_name}}</h3>
                              <div class="product-price"><strong> Price:</strong> <span class="old-price">$25.00</span> <span class="new-price">{{$productDetails->product_price}}</span> </div>
                             
                                {{-- <br> --}}
                              <strong>Size</strong>
                              <select class="form-control getSizePrice" name="size">
                                <option value="">Select</option>
                                @foreach ($productDetails->attributes as $attr)
                                  <option value="{{$attr->id}}-{{$attr->size}}">{{$attr->size}}</option>
                                @endforeach
                              </select>
                              <label>Color</label>
                              <select class="form-control" name="color">
                                <option value="black">{{$productDetails->product_color}}</option>
                              </select>
                              <div class="cart-qty product-cart-qty">
                                <!--  <input class="q-mini" type="text" value="1"  size="3"name="quantity">-->
                                <div class="quantity-bar">
                                 <strong> Quantity:</strong> 
                                 <span class="input-group-btn">
                                  <button type="button" class="btn-number btn-minus" data-type="minus" data-field="quant"> <i class="fas fa-minus"></i> </button>
                                  </span>
                                  <input type="text" name="quant" class="form-control input-number" value="1" min="1" max="100" placeholder="1">
                                  <span class="input-group-btn">
                                  <button type="button" class="btn-number btn-plus" data-type="plus" data-field="quant"> <i class="fas fa-plus"></i> </button>
                                  </span> 
                                </div>
                                <button class="btn btn-warning" name="cart" value="cart" > Add To Cart </button> &nbsp;&nbsp;
                                <button class="btn btn-warning" name="wish_list" value="wish_list" > Add To Wish List </button>

                                 </div>
                                <div class="cart-available"> <strong>Availability :</strong> <span class="cart_available">In Stock</span> </div>
                            </div>
                            <div class="row">
                              <div class="col-12">
                                <h4 class="review_title mb-0"><strong>Reviews</strong></h4>
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
                                </span> 
                                <span class="reviews-count">({{$avag_rating}})</span>

                              </div>
                            </div>
                            <div class="accepted-payment">
                              <h4>Accepted payment </h4>
                              <img src="{{asset('front/images/paypal.png')}}"> <img src="{{asset('front/images/bank.png')}}"> </div>
                          </div>
                          <div id="product-description" class="tab-pane fade in">
                            <div class="product-section">
                              <h4>Product Details</h4>
                              <p>{{$productDetails->description}} </p>
                            
                              <label>
                                Pattern
                              </label>
                              <select class="form-control" name="style">
                                <option value="">{{$productDetails->pattern}}</option>
                             
                              </select>
                              <label>Sleeve</label>
                              <select class="form-control" name="type">
                                <option value="">{{$productDetails->sleeve}}</option>
                              </select>
                              <label>Material</label>
                              <select class="form-control" name="material">
                                <option value="petcare">{{$productDetails->fabric}} </option>
                              </select>
                            </div>
                          </div>
                        </form>
                      
                        </div>
                      </div>
                    </div>
                  </div>
                  <h2 class="sub_title">Reviews</h2>
                  <span class="reviews-stars"> 
                    <i class="fa fa-star"  onclick="rating(this.getAttribute('attr'))"   attr=1 id="star-1"  aria-hidden="true"></i> 
                    <i class="fa fa-star-o" onclick="rating(this.getAttribute('attr'))" attr=2 id="star-2" aria-hidden="true"></i> 
                    <i class="fa fa-star-o" onclick="rating(this.getAttribute('attr'))"  attr=3 id="star-3" aria-hidden="true"></i> 
                    <i class="fa fa-star-o" onclick="rating(this.getAttribute('attr'))"  attr=4 id="star-4" aria-hidden="true"></i> 
                    <i class="fa fa-star-o" onclick="rating(this.getAttribute('attr'))"  attr=5 id="star-5"  aria-hidden="true"></i> 
                  </span> 
                  {{-- <div class="reviews"> <span class="reviews-stars rating-0"></span> </div> --}}
                  <div class="review_form">
                    <form role="form" action="{{route('add.comment')}}" method="post" enctype="multipart/form">
                      @csrf
                      <div class="row">
                        <input type="hidden" name="rating" id="rating" value="1" />
                        <input type="hidden" name="product_id" id="product_id" value="{{$productDetails->id}}" />

                        <div class="col col-sm-12">
                          <div class="form-group">
                            <textarea id="review" class="form-control" name="message" rows="5" placeholder="Write a review..."></textarea>
                            @error('message')
                                <p style="color: red">{{$message}}</p>
                            @enderror
                          </div>
                        </div>
                        <div class="col col-sm-12">
                          <div class="form-group">
                            <div class="captcha">
                              <div class="spinner">
                                <label>
                                  <input type="checkbox" onclick="$(this).attr('disabled','disabled');">
                                  <span class="checkmark"><span>&nbsp;</span></span> </label>
                              </div>
                              <div class="text"> I'm not a robot </div>
                              <div class="logo"> <img src="https://forum.nox.tv/core/index.php?media/9-recaptcha-png/"/>
                                <p>reCAPTCHA</p>
                                <small>Privacy - Terms</small> </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="form-group">
                        <button class="btn submit-btn" type="submit">Submit</button>
                      </div>
                    </form>
                   
                    <div class="body_comment">
                      <ul id="list_comment" class="col-12 toggle_content">
                        <?php $i=1; ?>
                        @foreach ($comments as $item)
                          @if ($i<=4)
                              @if ($i<=3)
                                <li class="box_result">
                                  <div class="avatar_comment"> <img src="{{asset('front/images/avatar.jpg')}}" alt="avatar"/> </div>
                                  <div class="result_comment">
                                    <h4>{{$item->name}} </h4>
                                    {{-- <div class="reviews">  --}}
                                      <span class="reviews-stars"> 
                                        <?php
                                          $x = $item->ratings;
                                          while($x > 0) {
                                          echo '<i class="fa fa-star" aria-hidden="true"></i> ';
                                          $x--;
                                          }
                                          $y = 5-$item->ratings;
                                        // echo $;
                                          while($y > 0) {
                                          echo '<i class="fa fa-star-o" aria-hidden="true"></i>';
                                          $y--;
                                          }
                                        ?>
                                      </span>
                                    {{-- </div> --}}
                                    <p>{{$item->message}}</p>
                                    <div class="tools_comment"><span class="comment-time">{{$item->created_at->diffForhumans()}}</span> </div>
                                  </div>
                                </li>
                              @else                                
                                <div id="show-more" ><a href="javascript:void(0)" class="show_more_btn btn">Show MORE Comments <i class="fa-solid fa-angle-down"></i></a></div>
                              @endif
                          @else
                          @endif
                          <?php $i++; ?>
                        @endforeach
                        <div id="show-more-content">
                          <?php $i=1; ?>
                          @foreach ($comments as $item)
                              @if ($i>=4)
                              <li class="box_result">
                                <div class="avatar_comment"> <img src="{{asset('front/images/avatar.jpg')}}" alt="avatar"/> </div>
                                <div class="result_comment">
                                  <h4>{{$item->name}}</h4>
                                  {{-- <div class="reviews"> <span class="reviews-stars rating-0"></span> </div> --}}
                                  <span class="reviews-stars"> 
                                    <?php
                                      $x = $item->ratings;
                                      while($x > 0) {
                                      echo '<i class="fa fa-star" aria-hidden="true"></i> ';
                                      $x--;
                                      }
                                      $y = 5-$item->ratings;
                                    // echo $;
                                      while($y > 0) {
                                      echo '<i class="fa fa-star-o" aria-hidden="true"></i>';
                                      $y--;
                                      }
                                    ?>
                                  </span>
                                  <p>{{$item->message}}</p>
                                  <div class="tools_comment"><span class="comment-time">{{$item->created_at->diffForhumans()}}</span> </div>
                                </div>
                              </li>
                              @endif
                              <?php $i++; ?>
                          @endforeach
                          
                          <div id="show-less"> <a href="javascript:void(0)" class="show_more_btn btn">Show Less Comments  <i class="fa-solid fa-angle-up"></i></a></div>
                        </div>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </section>
    @endsection