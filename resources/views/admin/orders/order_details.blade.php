@extends('admin.layout.layout')
@section('content')
<div class="content">
    <div class="page-inner">
        <div class="page-header">
            <h4 class="page-title">Dashboard</h4>
            <ul class="breadcrumbs">
                <li class="nav-home">
                    <a href="{{route('admin.dashboard')}}">
                        <i class="flaticon-home"></i>
                    </a>
                </li>
                <li class="separator">
                    <i class="flaticon-right-arrow"></i>
                </li>
                <li class="nav-item">
                    <a href="{{route('admin.orders')}}">Order</a>
                </li>
                <li class="separator">
                    <i class="flaticon-right-arrow"></i>
                </li>
                <li class="nav-item">
                    <a href="javascript:void(0)">Order Details</a>
                </li>
            </ul>
        </div>
        <div class="row ">
            <div class="col-md-4 pl-md-0">
                <div class="card card-pricing">
                    <div class="card-header">
                        <h4 class="card-title">Billing Address</h4>
                    </div>
                    <div class="card-body">
                        <ul class="specification-list">
                            <li>
                                <span class="name-specification">Name</span>
                                <span class="status-specification">{{$userDetails->name}}</span>
                            </li>
                            <li>
                                <span class="name-specification">Email</span>
                                <span class="status-specification">{{$userDetails->email}}</span>
                            </li>
                            <li>
                                <span class="name-specification">Contact</span>
                                <span class="status-specification">{{$userDetails->number}}</span>
                            </li>
                            <li>
                                <span class="name-specification">Address</span>
                                <span class="status-specification">{{$userDetails->address}}</span>
                            </li>
                            <li>
                                <span class="name-specification">City</span>
                                <span class="status-specification">{{$userDetails->city}}</span>
                            </li>
                            <li>
                                <span class="name-specification">Country</span>
                                <span class="status-specification">{{$userDetails->country}}</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-4 pl-md-0">
                <div class="card card-pricing">
                    <div class="card-header">
                        <h4 class="card-title">Shipping Address</h4>
                    </div>
                    <div class="card-body">
                        <ul class="specification-list">
                            <li>
                                <span class="name-specification">Name</span>
                                <span class="status-specification">{{$orderDetails->name}}</span>
                            </li>
                            <li>
                                <span class="name-specification">Email</span>
                                <span class="status-specification">{{$orderDetails->email}}</span>
                            </li>
                            <li>
                                <span class="name-specification">Contact</span>
                                <span class="status-specification">{{$orderDetails->contact}}</span>
                            </li>
                            <li>
                                <span class="name-specification">Address</span>
                                <span class="status-specification">{{$orderDetails->address}}</span>
                            </li>
                            <li>
                                <span class="name-specification">City</span>
                                <span class="status-specification">{{$orderDetails->city}}</span>
                            </li>
                            <li>
                                <span class="name-specification">Country</span>
                                <span class="status-specification">{{$orderDetails->country}}</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card card-pricing">
                    <form action="{{route('admin.update.order.status',$orderDetails->id)}}" method="post">
                        @csrf
                        <div class="card-header">
                            <h4 class="card-title">Update Order Status</h4>
                        </div>
                        <div class="card-body text-center">
                            <div class="form-group" >
                                <label for="status">Select Status</label>
                                <select name="order_status" id="order_status" class="form-control select2">
                                <option value="New"
                                @if(!empty($orderDetails->status) && $orderDetails->status=="New")
                                selected
                                @endif
                                >New</option>
                                <option value="Pending"
                                @if(!empty($orderDetails->status) && $orderDetails->status=="Pending")
                                selected
                                @endif
                                >Pending</option>
                                <option value="Cancelling"
                                @if(!empty($orderDetails->status) && $orderDetails->status=="Cancelling")
                                selected
                                @endif
                                >Cancelling</option>
                                <option value="Delivery"
                                @if(!empty($orderDetails->status) && $orderDetails->status=="Delivery")
                                selected
                                @endif
                                >Delivery</option>
                                <option value="Confirmed"
                                @if(!empty($orderDetails->status) && $orderDetails->status=="Confirmed")
                                selected
                                @endif
                                >Confirmed</option>
                                </select>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">Order Detail Item</div>
                    </div>
                    <div class="card-body">
                        {{-- <div class="card-sub">									
                            This is the basic table view of the ready dashboard :
                        </div> --}}
                        <table class="table mt-3">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Porduct Name</th>
                                    <th>Color </th>
                                    <th>Size</th>
                                    <th>Code</th>
                                    <th>Quantity</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($orderDetails['ordersDetails'] as $cmspage)
                                <tr>
                                  <td>{{$cmspage->id}}</td>
                                  <td>{{$cmspage->product_name}}</td>
                                  <td>{{$cmspage->product_color}}</td>
                                  <td>{{$cmspage->product_size}}</td>
                                  <td>{{$cmspage->product_code}}</td>
                                  <td>{{$cmspage->product_qty}}</td>
                                </tr>
                                @empty
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection