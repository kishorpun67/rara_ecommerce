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
                    <a href="{{route('admin.product')}}">Base</a>
                </li>
                <li class="separator">
                    <i class="flaticon-right-arrow"></i>
                </li>
                <li class="nav-item">
                    <a href="#">Product Attribute</a>
                </li>
            </ul>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Product Details</h4>
                        
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <p class="demo">
                                    <h5><strong>Product Category</strong> : 
                                        @if(!empty($product->category->category_name))
                                        {{$product->category->category_name}}
                                        @endif </h5>
                                    <h5><strong>Product Name</strong> : {{$product->product_name}}</h5>
                                    <h5><strong>Product Code</strong>  : {{$product->product_code}}</h5>
                                    <h5><strong>Product Color</strong>  : {{$product->product_color}}</h5>
                                </p>
                            </div>
                            <div class="col-md-6">
                                <p class="demo">
                                    @if(!empty($product->main_image))
                                        <img src="{{asset($product->main_image)}}" style=" width:150px;" alt="">
                                    @else
                                        <img src="{{asset('admin/image/no_image.png')}}" style=" width:150px;" alt="">
                                    @endif
                                </p>
                            </div>
                            <form action="{{route('admin.add.procut.attributes', $product->id)}}" method="post" >
                                @csrf
                                <div class="form-group" style="margin-top:30px; margin-left:8px;">
                                    <div class="field_wrapper">
                                    <div>
                                        <input type="text" name="sku[]" id="sku" placeholder="SKU" value="" required/>
                                        <input type="text" name="size[]" id="size" placeholder="Size" value="" required/>
                                        <input type="number" name="price[]" id="price" placeholder="Price Rs." min="1" value="" required/>
                                        <input type="number" name="stock[]" id="stock" placeholder="Stock" min="1" value="" required/>
                                        <a href="javascript:" class="add_button">Add</a>
                                    </div>
                                    </div>
                                </div>
                                <div class="card-action">
                                    <input type="submit" value="Submit"  class="btn btn-success"/>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex align-items-center">
                            <h4 class="card-title">Product Details</h4>
                           
                        </div>
                    </div>
                    <div class="card-body">
                     
                        <div class="table-responsive">
                            <form action="{{route('admin.edit.procut.attributes', $product->id)}}" method="post">
                                @csrf
                                <table id="add-row" class="display table table-striped table-hover" >
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>SKU</th>
                                            <th>Size</th>
                                            <th>Price</th>
                                            <th>Stock</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i=1;?>
                                        @forelse($product_attribute as $attribute)
                                        <tr>
                                            <input type="hidden" name="idAttr[]" value="{{$attribute->id}}" />
                                            <td>{{$i}}</td><?php $i++;?>
                                            <td>{{$attribute->sku}}</td>
                                            <td>{{$attribute->size}}</td>
                                            <td><input type="number" name="price[]" id="price" value="{{$attribute->price}}"></td>
                                            <td><input type="number" name="stock[]" id="price" value="{{$attribute->stock}}"></td>
                                            <td>
                                                <div class="form-button-action">
                                                    <button type="button" data-toggle="tooltip" title="" rel="{{$attribute->id}}" record="product-attribue" class="btn btn-link btn-danger delete" data-original-title="Remove">
                                                        <i class="fa fa-times"></i>
                                                    </button>
                                                </div>
                                            </td>
                                            </tr>
                                        @empty
                                        @endforelse
                                    </tbody>
                                </table>
                                <div class="card-action">
                                    <input type="submit" value="Submit"  class="btn btn-success"/>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection