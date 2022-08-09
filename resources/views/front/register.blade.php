@extends('front.layout.layout')
@section('content')
<section id="billboard" class="inner-page register-page">
    <div class="bg-card"> <!--<img src="images/bac2.jpg" class="card-img" alt="This is Card image">-->
      
      <div class="bg-card-img-overlay"> </div>
      <div class="card-caption text-white">
        <div class="container">
          <div class="pulse animatable">
            <div class="breadCrumbNav">
              <div class="container breadcrumb-container">
                <h1 class="breadCrumb_title"> Register</h1>
                <div class="breadcumb-inner">
                  <ul>
                    <li><a href="{{route('home')}}" class="breadCrumb_link">Home</a></li>
                    <li><i class="fa-solid fa-arrow-right-long"></i></li>
                    <li><span>Register</span></li>
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
          <h1 class="section_title">Register</h1>
        </div>
      </div>
    </div>
  </section>
  <section class="login-register">
     <div class="container w-75 mb-5">
      <div class="row justify-content-center">
        <div class="col-sm-7">
          <div class="form register_form">
            <h4 class="mb-3"><span>Not a Member? </span>Register now! </h4>
            <form role="form" action="{{route('register')}}" method="post">
                @csrf
                <div class="form-group">
                    <input type="text" class="form-control" name="username" placeholder="Username">
                </div>
                <div class="form-group">
                    <input type="email" name="email" class="form-control" placeholder="E-mail">
                </div>
                <div class="form-group">
                    <input id="password-field2" type="password" class="form-control" name="password" value="" placeholder="Create password">
                    <span toggle="#password-field2" class="fa fa-fw fa-eye field-icon toggle-password"></span> </div>
                    <div class="form-group">
                    <input id="password-field3" type="password" class="form-control" name="confirm_password" value="" placeholder="Confirm password">
                    <span toggle="#password-field3" class="fa fa-fw fa-eye field-icon toggle-password"></span> 
                </div>
              <div class="form-group"> <button type="submit" class="btn submit-btn btn-login">Create an Account</button> </div>
              <p class="message">Already registered? <a href="{{route('login')}}">Sign In</a></p>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection