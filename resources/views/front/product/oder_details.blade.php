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
                                <h1 class="breadCrumb_title">Order Product Detail</h1>
                                <div class="breadcumb-inner">
                                <ul>
                                    <li><a href="{{route('home')}}" class="breadCrumb_link">Home</a></li>
                                    <li><i class="fa-solid fa-arrow-right-long"></i></li>
                                    <li><a href="{{route('account')}}" class="breadCrumb_link">Order</a></li>
                                    <li><i class="fa-solid fa-arrow-right-long"></i></li>
                                    <li><span>Order Details</span></li>
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
        <h1>Order Detail</h1>
        <hr>
        <div class="col-md-12 col-sm-12">
            <div class="myaccount-orders">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover">
                        <tbody>
                            <tr>
                                <th>Product Code</th>
                                <th>Product Name</th>
                                <th>Product Size</th>
                                <th>Product Color</th>
                                <th>Product Price</th>
                                <th>Product Quantity</th>
                                <th>Total</th>
                            </tr>
                            @foreach ($orderDetails as $item)
                                <tr>
                                    <td>{{$item->product_code}}</td>
                                    <td>{{$item->product_name}}</td>
                                    <td>{{$item->product_size}}</td>
                                    <td>{{$item->product_color}}</td>
                                    <td>{{$item->product_price}}</td>
                                    <td>{{$item->product_qty}}</td>
                                    <td>{{$item->product_qty * $item->product_price}}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection