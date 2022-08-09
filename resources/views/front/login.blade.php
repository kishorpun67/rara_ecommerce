@extends('front.layout.layout')
@section('content')
<section id="billboard" class="inner-page login-page">
    <div class="bg-card">
        <!--<img src="images/bac2.jpg" class="card-img" alt="This is Card image">-->
        <div class="bg-card-img-overlay"> </div>
        <div class="card-caption text-white">
            <div class="container">
                <div class="pulse animatable">
                    <div class="breadCrumbNav">
                        <div class="container breadcrumb-container">
                            <h1 class="breadCrumb_title"> Login</h1>
                            <div class="breadcumb-inner">
                                <ul>
                                    <li><a href="{{route('home')}}" class="breadCrumb_link">Home</a></li>
                                    <li><i class="fa-solid fa-arrow-right-long"></i></li>
                                    <li><span>Login</span></li>
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
                <h1 class="section_title">Login</h1>
            </div>
        </div>
    </div>
</section>
<section class="login-register">
    <div class="container w-75 mb-5">
        <div class="row justify-content-center">
            <div class="col-sm-7">
                <div class="form login_form">
                    <h4 class="mb-3"><span>Already a Member? </span>Login </h4>
                    <form role="form" action ="{{route('login')}}" method ="POST">
                        @csrf
                        <div class="form-group">
                            <input type="text" name="email" class="form-control" placeholder="Username/ Email ID / Mobile No">
                        </div>
                        <div class="form-group">
                            <input id="password-field" type="password" class="form-control" name="password" value="" placeholder="password">
                            <span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password">   </span>
                        </div>
                        <div class="form-group checkbox">
                            <label>
                            <input id="login-remember" type="checkbox" name="remember" >
                            Keep me logged in </label>
                        </div>
                        <button type="submit" class="btn submit-btn btn-login">Login</button>
                        <p class="message">Not registered? <a href="{{route('register')}}">Create an account</a></p>
                        <div class="form-group forget-text mt-3"> <span>Forgot your password? <a href="forget.html" style="text-decoration:underline;"> Click here</a> to reset your password. </span> </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>


@endsection