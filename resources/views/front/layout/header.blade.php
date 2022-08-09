  <?php
    use App\Http\Controllers\Controller;
    use App\Models\Cart;
    use App\Models\WishList;
    use App\Models\Footer;
    $footer = Footer::first();

    $mainCategories = Controller::mainCategories();
    $mainCategoires = json_decode(json_encode($mainCategories),true);
    if(auth()->check()){
      $count = Cart::where('user_id',auth()->user()->id)->count();
    }else{
      $count = "";
    }
    if(auth()->check()){
      $wish_list_count = WishList::where('user_id',auth()->user()->id)->count();
    }else{
      $wish_list_count = "";
    }
  ?>
  <header class="main_header"><!--../header starts--> 
    <!-- ./top-bar-->
    <div class="topbar">
      <div class="container">
        <figure class="logo_holder"><a href="{{route('home')}}"> <img src="{{asset('front/images/main_logo.png')}}"> </a></figure>
        <form role="form" action="{{route('search.products')}}" method="post">
            <div class="form_wrapper">
            @csrf
            <div class="select_dropdown select_category">
              <select name="category_id" id="category_id" class="form-control" required="">
                <option value="All">All Categories </option>
                @foreach($mainCategoires as $category)
                  <option value="{{$category['url']}}">{{$category['category_name']}} </option>
                  {{-- @foreach($category['subcategories'] as $subCategory)
                    <option value="{{$subCategory['id']}}">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{$subCategory['category_name']}} </option>
                  @endforeach --}}
                @endforeach
              </select>
            </div>
            <div class="form_search">
              <input type="search" name="product" placeholder="Search" class="form-control" id="search-field">
              {{-- <button type="button" class="btn btn-search"><i class="fa-solid fa-magnifying-glass"></i></button> --}}
            </div>
          </div>
        </form>
        <div class="top_social_icons topbar-items">
          <ul>
            <li><a target="_blank" href="{{$footer->fb_url}}" title=""><i class="fab fa-facebook"></i></a></li>
            <li><a target="_blank" href="{{$footer->twitter_url}}" title=""><i class="fab fa-twitter"></i> </a></li>
            <li><a target="_blank" href="{{$footer->instagram_url}}" title=""><i class="fab fa-instagram"></i> </a></li>
          </ul>
        </div>
        <address class="top-contact-address topbar-items">
        <ul>
          <li>
            <figure class="icon"><i class="fas fa-phone"></i></figure>
            <div class="details"> <a href="tel:9801904810" class="call" >{{ $footer->number }}</a> </div>
          </li>
          <li>
            <figure class="icon"> <i class="fas fa-envelope"></i></figure>
            <div class="details"><a href="mailto:info@rarasoft.com.np" class="email">{{ $footer->mail }}</a> </div>
          </li>
        </ul>
        </address>
      </div>
    </div>
    <!-- ./top-bar-->
    
    <div class="navigation-bar"><!-- ./navigation-bar-->
      
      <div id="pav-mainnav"><!-- ./pav-mainnav-->
        <div class="container">
          <div class="row nav-row"> 
            <div class="col col-sm-12 col-12">
              <div id="menu_area" class="menu-area">
                <div class="container">
                  <nav class="navbar navbar-light navbar-expand-lg mainmenu">
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"> <span class="navbar-toggler-icon"></span> </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                      <ul class="navbar-nav mr-auto">
                        <li class="active dropdown megamenu"> <a class="dropdown-toggle btn btn-category" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">All categories</a>
                          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li>
                              <div class="flex-tabs">
                                <ul id="tabs-nav">
                                  @foreach($mainCategoires as $category)
                                    <li><a href="{{route('products',$category['url'])}}" id="tab-{{$category['id']}}">{{$category['category_name']}}</a></li>
                                    @foreach($category['subcategories'] as $subCategory)
                                      <li><a href="{{route('products',$subCategory['url'])}}">&nbsp;&nbsp;&raquo;&nbsp;{{$subCategory['category_name']}}</a></li>
                                    @endforeach
                                  @endforeach
                                </ul>
                              </div>
                            </li>
                          </ul>
                        </li>
                        <li class="active"><a href="{{route('home')}}">Home </a></li>
                        <li><a href="{{route('about')}}">About us</a></li>
                        <li><a href="{{route('all.products')}}">Products</a></li>
                        <li><a href="{{route('contact')}}">Contact us</a></li>
                        <li>
                          <ul class="side-navbar">
                            {{-- <li class="item"> <a class="btn btn-primary text-white" href="{{route('cart')}}"> <i class="fa-solid  fa-cart-plus"></i> My Cart</a> </li> --}}
                            <li class="item"> <a class="btn btn-secondary" href="{{route('wish.list')}}"> <i class="fa-solid fa-heart"><span class="cart-notify">{{$wish_list_count}}</span></i></a> </li>
                            <li class="item"><a class="btn btn-dark" href="{{route('cart')}}"><i class="fa-solid fa-basket-shopping"><span class="cart-notify">{{$count}}</span></i></a> </li>
                              @if (auth()->check())
                              <li class="dropdown"><a class="dropdown-toggle btn btn-primary text-white login-btn" href="{{route('account')}}"><i class="fa fa-user" aria-hidden="true"></i>
                                My Account</a>
                                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                  <li><a href="{{route('account')}}"></i>Account 
                                    </a>
                                  </li>
                                  <li><a href="{{route('logout')}}"><i class="fa fa-sign-out" aria-hidden="true"></i>Logout 
                                  </a>
                                </li>
                                </ul>
                              </li>                              
                              @else
                                <li class=" item"><a class="btn btn-primary text-white login-btn" href="{{route('login')}}">Login</a>
                              @endif
                            </li>
                          </ul>
                        </li>
                      </ul>
                    </div>
                  </nav>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- ./navigation-bar--> 
    </div>
    <!-- ./pav-mainnav--> 
  </header>
  <!--../header ends--> 