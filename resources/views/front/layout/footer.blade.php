<?php
   use App\Models\Footer;
    $footer = Footer::first();
?>
<footer class="footer-top-area pt-5">
    <div class="container">
      <div class="row footer-wrapper">
        <div class="col-12 col-md-4 col-lg-3 mb-1 footer-column">
          <div class="single-widget single-widgets">
            <div class="wp-container-1 wp-block-group">
              <div class="wp-block-group__inner-container">
                <figure class="footer-logo_holder"><a href="index.html"> <img src="{{asset('front/images/main_logo.png')}}"> </a></figure>
                <div style="height:20px" aria-hidden="true" class="wp-block-spacer"></div>
              </div>
            </div>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod incididunt labore et dolore magna aliqua. Quis ipsum suspendisse ultrices.Risus commodo dolor sit amet, consectetur.</p>
          </div>
        </div>
        <div class="col-12 col-md-4 col-lg-3 mb-1 footer-column">
          <div class="single-widget single-widgets">
            <h3>Recent Posts</h3>
            <ul class="wp-block-latest-posts__list has-dates wp-block-latest-posts">
              <li><a href="#">Hello World!</a>
                <time datetime="2021-12-31T17:29:00+00:00" class="wp-block-latest-posts__post-date">December 31, 2021</time>
              </li>
              <li><a href="https:#">Aenean Vulputate</a>
                <time datetime="2021-04-10T21:26:00+00:00" class="wp-block-latest-posts__post-date">April 10, 2021</time>
              </li>
              <li><a href="#">No One Rejects</a>
                <time datetime="2021-04-01T21:23:00+00:00" class="wp-block-latest-posts__post-date">April 1, 2021</time>
              </li>
            </ul>
          </div>
        </div>
        <div class="col-12 col-md-4 col-lg-3 mb-1 footer-column">
          <div class="single-widget single-widgets">
            <h3>Quick links</h3>
            <ul class="wp-block-latest-posts__list has-dates wp-block-latest-posts">
              <li><a href="{{ route('home')}}">Home </a> </li>
              <li><a href="{{ route('about')}}">About Us</a> </li>
              <li><a href="{{ route('all.products')}}">Products</a></li>
              <li><a href="{{ route('contact') }}">Contact Us</a></li>
              <li><a href="#">Terms & Conditions</a></li>
              <li><a href="#">Privacy Policy</a></li>
            </ul>
          </div>
        </div>
        <div class="col-12 col-md-4 col-lg-3 mb-1 footer-column">
          <div class="single-widget single-widgets">
            <h3>Address</h3>
            <div class="office-info-box">
              <p><i class="fa fa-map-marker"></i><span>{{ $footer->address }}</span></a></p>
              <p><a href="tel:(804) 359-1337" class="phone-link"><i class="fa fa-phone"></i><span>{{ $footer->number }}</span></a></p>
              <p><a href="mailto:office@example.com" title="office@example.com"><i class="fa fa-envelope"></i><span>{{ $footer->mail }}</span></a></p>
            </div>
            <div class="footer-social-icons">
              <ul>
                <li><a target="_blank" href="{{$footer->fb_url}}"><i class="fa fa-facebook" aria-hidden="true"></i> </a></li>
                <li><a target="_blank" href="{{$footer->twitter_url}}"><i class="fa fa-twitter" aria-hidden="true"></i> </a></li>
                <li><a target="_blank" href="{{$footer->instagram_url}}"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                <li><a target="_blank" href="{{$footer->LinkedIn_url}}"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
                <li><a target="_blank" href="{{$footer->utube_url}}"><i class="fa fa-youtube-play" aria-hidden="true"></i></a></li>
              </ul>
            </div>
          </div>
        </div>
        <div class="col-12 col-md-6 col-lg-4 mb-1 footer-column">
          <div class="news_letter">
            <h1 class="title">Newsletter</h1>
            <form>
              <fieldset>
                <input type="email" name="email" placeholder="email address*" requried="" class="form-control">
                <button class="btn2">subscribe</button>
              </fieldset>
            </form>
          </div>
        </div>
      </div>
    </div>
    <div class="container footer-bottom">
      <div class="row">
        <div class="col-md-4">
          <p> Copyright © <script type="text/javascript" language="javascript">var date = new Date(); document.write(date.getFullYear());</script> . All Rights Reserved. </p>
        </div>
        <div class="col-md-4">
          <p>Powered by : <a href="https://rarasoft.business.site/" target="_blank" class="company_link" collator_asort="">Rara Soft Pvt. Ltd</a></p>
        </div>
        <div class="col-md-4 footer-menu-wrapper">
          <ul id="menu-footer_menu" class="menu terms-conditions">
            <li><a href="{{ route('home')}}" aria-current="page">Home</a></li>
            <li><a href="#">Shop</a></li>
            <li><a href="#">Blog</a></li>
            <li><a href="{{ route('contact')}}">Contact Us</a></li>
          </ul>
        </div>
      </div>
    </div>
  </footer>
  