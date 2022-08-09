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
                </ul>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex align-items-center">
                                <h4 class="card-title">View Orders</h4>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="add-row" class="display table table-striped table-hover" >
                                    <thead>
                                        <tr>
                                            <th>SN</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Contact</th>
                                            <th>Status</th>
                                            <th>Total</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i=1;?>
                                        @forelse($orders as $data)
                                        <tr>
                                            <td>{{$i}}</td> <?php $i++; ?>
                                            <td>{{$data->name}}</td>
                                            <td>{{$data->email}}</td>
                                            <td>{{$data->contact}}</td>
                                            <td>{{$data->status}}</td>
                                            <td>{{$data->grand_total}}</td>
                                            <td>
                                                <div class="form-button-action">
                                                    <a href="{{route('admin.view.order.invoice', $data->id)}}" title="" class="btn btn-link btn-primary btn-lg" data-original-title="View Order Details" >
                                                        <i class="fa fa-file-invoice"></i>
                                                    </a>
                                                    <a href="{{route('admin.view.order.details', $data->id)}}" title="" class="btn btn-link btn-primary btn-lg" data-original-title="View Order Details" >
                                                        <i class="fa fa-eye"></i>
                                                    </a>
                                                    <button type="button" data-toggle="tooltip" title="" rel="{{$data->id}}" record="order" class="btn btn-link btn-danger delete" data-original-title="Remove">
                                                        <i class="fa fa-times"></i>
                                                    </button>
                                                </div>
                                            </td>
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
    </div>
    @endsection