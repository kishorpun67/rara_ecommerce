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
                        <a href="#">Catelogue</a>
                    </li>
                    <li class="separator">
                        <i class="flaticon-right-arrow"></i>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('admin.product')}}">Product</a>
                    </li>
                </ul>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex align-items-center">
                                <h4 class="card-title">View Product</h4>
                                <a href="{{route('admin.add.edit.product')}}"  class="btn btn-primary btn-round ml-auto">
                                    <i class="fa fa-plus"></i>
                                    Add Product
                                </a>
                            </div>
                        </div>
                        <div class="card-body">
                            <!-- Modal -->
                            <div class="table-responsive">
                                <table id="add-row" class="display table table-striped table-hover" >
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Product</th>
                                            <th>Category</th>
                                            <th>Image</th>
                                            <th>Price</th>
                                            <th>Section</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i=1;?>
                                        @forelse($products as $product)
                                        <tr>
                                            <td>{{$i}}</td><?php $i++; ?>
                                            <td>{{$product->product_name}}</td>
                                            <td>                                            
                                                @if(!empty($product->category->category_name))
                                                {{$product->category->category_name}}
                                                @endif
                                            </td>
                                            <td>
                                            @if(!empty($product->main_image))
                                                <img src="{{asset($product->main_image)}}" style=" width:80px;" alt="">
                                            @else
                                                <img src="{{asset('admin/image/no_image.png')}}" style=" width:80px;" alt="">
                                            @endif
                                            </td>
                                            <td>{{$product->product_price}}</td>
                                            <td>
                                                @if(!empty($product->section->section))
                                                {{$product->section->section}}
                                                @endif
                                            </td>
                                            <td>
                                                @if($product->status==1)
                                                    <a class="updateProductStatus" id="product-{{ $product->id }}" product_id="{{ $product->id }}" href="javascript:void(0)"><i class="fas fa-toggle-on" status="Active"></i></a>
                                                @else
                                                    <a class="updateProductStatus" id="product-{{ $product->id }}" product_id="{{ $product->id }}" href="javascript:void(0)"><i class="fas fa-toggle-off" status="Inactive"></i></a>
                                                @endif
                                            </td>
                                            <td>
                                                <div class="form-button-action">
                                                    <a href="{{route('admin.add.edit.product', $product->id)}}" class="btn btn-data-toggle="tooltip" title="" class="btn btn-link btn-primary btn-lg" data-original-title="Edit Category" >
                                                        <i class="fa fa-edit"></i>
                                                    </a>
                                                    <a href="{{route('admin.product.attribute', $product->id)}}" class="btn btn-data-toggle="tooltip" title="" class="btn btn-link btn-primary btn-lg" data-original-title="Edit Category" >
                                                        <i class="fa fa-plus"></i>
                                                    </a>
                                                    <button type="button" data-toggle="tooltip" title="" rel="{{$product->id}}" record="product" class="btn btn-link btn-danger delete" data-original-title="Remove">
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