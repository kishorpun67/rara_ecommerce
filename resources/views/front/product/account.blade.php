@extends('front.layout.layout')
@section('content')
<section id="billboard" class="inner-page about-page"> 
    <div class="bg-card"> <!--<img src="images/bac2.jpg" class="card-img" alt="This is Card image">-->
        <div class="bg-card-img-overlay"> </div>
            <div class="card-caption text-white">
             <div class="container">
              <div class="pulse animatable">
                <div class="breadCrumbNav">
                  <div class="container breadcrumb-container">
                    <h1 class="breadCrumb_title">My Account</h1>
                    <div class="breadcumb-inner">
                      <ul>
                        <li><a href="{{route('home')}}" class="breadCrumb_link">Home</a></li>
                        <li><i class="fa-solid fa-arrow-right-long"></i></li>
                        <li><span><a href="{{route('account')}}">My Account</a></span></li>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
            </div>
        </div>
    </div>
</section>
  <section class="vertical-tab-section">
    <div class="container">
        <h1>My Account</h1>
      <hr>
      <div class="row mb-3 tab-row">
        <div class="col-md-3 col-sm-4 p-0">
          <ul class="nav nav-pills flex-column" id="myTab" role="tablist">
            <li class="nav-item">
              <a class="nav-link active" id="dashboard-tab" data-toggle="tab" href="#dashboard" role="tab" aria-controls="dashboard" aria-selected="true"><i class="fa fa-user" aria-hidden="true"></i>
                  Profile</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" id="orders-tab" data-toggle="tab" href="#orders" role="tab" aria-controls="orders" aria-selected="false"><i class="fas fa-shopping-cart"></i> Orders</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" id="address-tab" data-toggle="tab" href="#address" role="tab" aria-controls="address" aria-selected="false"><i class="fa fa-user" aria-hidden="true"></i> Update Details</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" id="logout-tab" data-toggle="tab" href="#register" role="tab" aria-controls="register" aria-selected="false"><i class="fa fa-key" aria-hidden="true"></i>
              Change Password</a>
            </li>
          </ul>
        </div>
        <div class="col-md-9 col-sm-8">
          <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="dashboard" role="tabpanel" aria-labelledby="dashboard-tab">
              <h2>My Profile</h2>
              <form action="{{route('update.user.detail')}}"  method="post" enctype="multipart/form-data">
                <div class="row">
                  @csrf
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="category_discoutn">Email</label>
                      <input type="text" class="form-control" id="" name=""  readonly  value='{{auth()->user()->email}}'>
                    </div>
                    <div class="form-group">
                      <label for="category_discoutn">Contact</label>
                      <input type="text" class="form-control" id="" name="number"    value='{{auth()->user()->number}}'>
                    </div>
                    <div class="form-group">
                      <label for="category_discoutn">City</label>
                      <input type="text" class="form-control" id="" name="city"    value='{{auth()->user()->city}}'>
                    </div>
                    <div class="form-group">
                      <label for="image">Image</label>
                      <input type="file" class="form-control" id="" name="image" value=''>
                      <br>
                      @if (!empty(auth()->user()->image))
                        <img src="{{asset(auth()->user()->image)}}" width="alt="" srcset=" ">
                      @endif
                    </div>
                    <button class="btn btn-primary">Update</button>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="category_discoutn">Name</label>
                      <input type="text" class="form-control" id="" name="name"    value='{{auth()->user()->name}}'>
                    </div>
                    <div class="form-group">
                      <label for="category_discoutn">Address</label>
                      <input type="text" class="form-control" id="" name="address"    value='{{auth()->user()->address}}'>
                    </div>
                    <div class="form-group">
                      <label for="category_discoutn">Country</label>
                      <select name="country" class="form-control" id="country">
                        <option >Select</option>
                        @foreach ($countries as $country)
                        <option value="{{$country->nicename}}" @if (!empty(auth()->user()->country) && auth()->user()->country == $country->nicename)
                          selected=""
                        @endif>{{$country->nicename}}</option>
                        @endforeach                  
                      </select>                  
                    </div>
                  </div>
                </div>
              </form>
            </div>
            <div class="tab-pane fade" id="orders" role="tabpanel" aria-labelledby="orders-tab">
              <h2>MY ORDERS</h2>
                <div class="myaccount-orders">
                  <div class="table-responsive">
                    <table class="table table-bordered table-hover">
                        <tbody>
                          <tr>
                            <th>ORDER</th>
                            <th>DATE</th>
                            <th>STATUS</th>
                            <th>TAX(%)</th>
                            <th>Delivery Charge</th>
                            <th>TOTAL</th>
                            <th>View</th>
                          </tr>
                          @foreach ($oder as $item)
                            <tr>
                              <td><a class="account-order-id" href="javascript:void(0)">#{{$item->id}}</a></td>
                              <td>{{$item->created_at}}</td>
                              <td>{{$item->status}}</td>
                              <td>{{$item->tax}}%</td>
                              <td>{{$item->shipping_charge}}</td>
                              <td>{{$item->grand_total}}</td>
                              <td>
                                <a href="{{route('order.detail', $item->id)}}" class="hiraola-btn hiraola-btn_dark hiraola-btn_sm"><span>View</span></a>
                              </td>
                            </tr>
                          @endforeach
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
                <div class="tab-pane fade" id="address" role="tabpanel" aria-labelledby="address-tab">
                  <div class="user-account checkout-details my-5">
                    <form action="{{route('update.shipping.billing.detail')}}" method="post">
                      @csrf
                      <div class="row">
                        <div class="col-md-6">
                          <div class="new-users">
                            {{-- <form id="billing_form" role="form"> --}}
                              <h2>Billing Address</h2>
                              <div class="fieldset">
                                <p>
                                  <label>Full Name * :</label>
                                  <input id="name" type="text"  name="name" class="form-control" value="{{auth()->user()->name}}">
                                </p>
                                <p>
                                  <label>Email * :</label>
                                  <input id="email" type="text"  name="email"class="form-control" value="{{auth()->user()->email}}" readonly>
                                </p>
                                <p>
                                  <label>Mobile Number :</label>
                                  <input id="number" type="text"  name="number"class="form-control" value="{{auth()->user()->number}}">
                                </p>
                                <p>
                                  <label>Address * :</label>
                                  <input id="address" type="text"  name="address" class="form-control" value="{{auth()->user()->address}}">
                                </p>
                                <p>
                                  <label>City * :</label>
                                  <input id="city" type="text"  name="city"class="form-control" value="{{auth()->user()->city}}">
                                </p>
                                <p>
                                  <label for="state">Country * :</label>
                                  <select name="country" class="form-control" id="country">
                                    <option >Select</option>
                                    @foreach ($countries as $country)
                                    <option value="{{$country->nicename}}" @if (!empty(auth()->user()->country) && auth()->user()->country == $country->nicename)
                                      selected=""
                                    @endif>{{$country->nicename}}</option>
                                    @endforeach                  
                                  </select>
                                </p>
                                <p class="checkbox">
                                  <input type="checkbox" name="" class="" id="ship-to-bill">
                                    Copy Billing Address to Delivery 
                                </p>
                              </div>
                            {{-- </form> --}}
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="registered-users">
                            {{-- <form id="delivery_form" role="form"> --}}
                              <h2>Delivery Address</h2>
                              <p>
                                <label>Full Name * :</label>
                                <input id="shipping_name" type="text"  name="shipping_name" class="form-control" value="@if(!empty($shipping_address->name)) {{$shipping_address->name}} @endif" />
                              </p>
                              <p>
                                <label>Email * :</label>
                                <input id="shipping_email" type="text"  name="shipping_email"class="form-control" value=" @if(!empty($shipping_address->email)) {{$shipping_address->email}} @endif" />
                              </p>
                              <p>
                                <label>Mobile Number :</label>
                                <input id="shipping_number" type="text"  name="shipping_number"class="form-control" value="@if(!empty($shipping_address->contact)) {{$shipping_address->contact}} @endif" />
                              </p>
                              <p>
                                <label>Address * :</label>
                                <input id="shipping_address" type="text"  name="shipping_address"class="form-control" value="@if(!empty($shipping_address->address)) {{$shipping_address->address}} @endif" />
                              </p>
                              <p>
                                <label>City * :</label>
                                <input id="shipping_city" type="text"  name="shipping_city" class="form-control"value="@if(!empty($shipping_address->city)) {{$shipping_address->city}} @endif" />
                              </p>
                              <p>
                                <label for="state">Country * :</label>
                                <select name="shipping_country" class="form-control" id="shipping_country">
                                  <option >Select</option>

                                @foreach ($countries as $country)
                                  <option value="{{$country->nicename}}" @if (!empty($shipping_address->country) && $shipping_address->country == $country->nicename)
                                    selected=""
                                  @endif>{{$country->nicename}}</option>
                                @endforeach
                                </select>
                              </p>
                              <p> <button class="checkout_btn btn" >Update</button> </p>
                          </div>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
                <div class="tab-pane fade" id="register" role="tabpanel" aria-labelledby="register-tab">
                  <h2>Change Password</h2>
                  <div class="login-register">
                    <div class="container mb-3">
                      <div class="row">
                        <div class="col col-sm-6">
                          <div class="form login_form">
                            <h4><span style="color:#777;">Change Password</span> </h4>
                            <form role="form" action="{{route('update.current.password')}}" method="post">
                              @csrf
                              <div class="form-group">
                                <input type="text" class="form-control" placeholder="Current Password" name="current_password" >
                              </div>
                              <div class="form-group">
                                <input id="password-field" type="password" class="form-control" name="new_password"  placeholder="New Password">
                                  {{-- <span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password">   </span>  --}}
                              </div>
                              <div class="form-group">
                                  <input id="password-field" type="password" class="form-control" name="confirm_password"  placeholder="Confirm Password">
                                    {{-- <span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password">   </span>  --}}
                                </div>
                              <button type="submit" class="btn submit-btn btn-login">Change</button>
                            </form>
                          </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection