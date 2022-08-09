@extends('front.layout.layout')
@section('content')
<?php
use App\Models\Aboutus;
$aboutus = Aboutus::first();
//echo "<pre>"; print_r($aboutus); die;
?>
<section id="billboard" class="inner-page about-page">
    <div class="bg-card">
        <!--<img src="images/bac2.jpg" class="card-img" alt="This is Card image">-->

        <div class="bg-card-img-overlay"> </div>

        <div class="card-caption text-white">
            <div class="container">
                <div class="pulse animatable">
                    <div class="breadCrumbNav">
                        <div class="container breadcrumb-container">
                            <h1 class="breadCrumb_title"> About Us</h1>
                            <div class="breadcumb-inner">
                                <ul>
                                    <li><a href="{{route('home')}}" class="breadCrumb_link">Home</a></li>
                                    <li><i class="fa-solid fa-arrow-right-long"></i></li>
                                    <li><span>About us</span></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

</section>
<section class="welcome_content my-4">
    <div class="container">

        <div class="row">
            <div class="col-sm-12">
                <h1 class="section_title">About us</h1>
            </div>
        </div>

        <div class="inner-content my-5">
            <figure class="welcome_thumb pull-left w-50 mr-3"> <img src="{{asset($aboutus->image) }}"> </figure>
            <div class="txt_wrapper welcome_caption mt-2">
              <p>{!! $aboutus->description !!}</p>
            </div>
        </div>
    </div>
</section>
@endsection