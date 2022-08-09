@extends('front.layout.layout')
@section('content')
<?php
use App\Models\Footer;
$footer = Footer::first();
// dd($footer);
?>
<section id="billboard" class="inner-page contact-page">
    <div class="bg-card"> <!--<img src="images/bac2.jpg" class="card-img" alt="This is Card image">-->
      
      <div class="bg-card-img-overlay"> </div>
      <div class="card-caption text-white">
        <div class="container">
          <div class="pulse animatable">
            <div class="breadCrumbNav">
              <div class="container breadcrumb-container">
                <h1 class="breadCrumb_title"> Contact us</h1>
                <div class="breadcumb-inner">
                  <ul>
                    <li><a href="{{route('home')}}" class="breadCrumb_link">Home</a></li>
                    <li><i class="fa-solid fa-arrow-right-long"></i></li>
                    <li><span>Contact us</span></li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <section class="contact_content my-4">
    <div class="container">
      <h1 class="section_title">Contact us</h1>
    </div>
    <div class="map my-5">
      <div class="gmap_canvas">
       <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3154.9582524048187!2d-122.42377728432723!3d37.744123621694605!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x808f7e42e1b683a9%3A0x225f82d9da5726a2!2s60+29th+St+%23343%2C+San+Francisco%2C+CA+94110%2C+USA!5e0!3m2!1sen!2sin!4v1501570738622" style="border: 0px none; pointer-events: none;" allowfullscreen="" width="600" height="450" frameborder="0"></iframe>
      </div>
    </div>
    <div class="container">
      <div class="row">
        <div class="col col-sm-7">
          <div class="contact_form">
            <form role="form" action="{{ route('add.contact') }}" method="post">
              @csrf
              <div class="row">
                <div class="col col-6 form-group">
                  <label>Your Name</label>
                  <input id="name" class="form-control" name="name" type="text" required>
                </div>
                <div class="col col-6 form-group">
                  <label>Your Email</label>
                  <input id="email" class="form-control" name="email" type="email" required>
                </div>
                <div class="col col-12 form-group">
                  <label>Subject</label>
                  <input id="phone" class="form-control" name="subject" type="tel" required>
                </div>
                <div class="col col-12 form-group">
                  <label> Your message (optional)</label>
                  <textarea id="message" class="form-control"  name="message" placeholder="Message..." title="Type your message" rows="5"></textarea>
                </div>
                <div class="col col-12 form-group">
                  <p>
                    <input class="btn-submit btn" type="submit" value="Submit">
                  </p>
                </div>
              </div>
            </form>
          </div>
        </div>
        <div class="col col-sm-5">
          <div class="contact_info">
            <address>
            <figure class="icon"> <i class="fa-solid fa-location-dot fa-2x"></i></figure>
            <div class="details">
              <div class="address-label">Address:</div>
              <span>{{ $footer->address }}</span> </div>
            </address>
            <address>
            <figure class="icon"><i class="fa-solid  fa-phone fa-2x"></i></figure>
            <div class="details">
              <div class="address-label">Phone numbers:</div>
              <span>{{ $footer->number }}</span> </div>
            </address>
            <address>
            <figure class="icon"><i class="fa-solid  fa-envelope fa-2x"></i> </figure>
            <div class="details">
              <div class="address-label">Email:</div>
              <span> <a href="mailto:demo@example.com">{{ $footer->mail }}</a>
              <p>Monday – Friday 10 AM – 8 PM</p>
              </span> </div>
            </address>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection