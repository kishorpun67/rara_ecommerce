@extends('admin.layout.layout')
@section('content')
    <div class="content">
        <div class="page-inner">
            <div class="page-header">
                <h4 class="page-title">Dashboard</h4>
                <ul class="breadcrumbs">
                    <li class="nav-home">
                        <a href="{{route('admin.dashboard')}}}">
                            <i class="flaticon-home"></i>
                        </a>
                    </li>
                    <li class="separator">
                        <i class="flaticon-right-arrow"></i>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('admin.product')}}">Product</a>
                    </li>
                    <li class="separator">
                        <i class="flaticon-right-arrow"></i>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('admin.add.edit.product')}}" >Product Form</a>
                    </li>
                </ul>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <form @if(!empty($products->id)) action="{{route('admin.add.edit.product',$products->id)}}" @else action="{{route('admin.add.edit.product')}}" @endif method="post" enctype="multipart/form-data">
                            <div class="card-header">
                                <div class="card-title">{{$title}}</div>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    @csrf                                    
                                    <div class="col-md-6 col-lg-4">
                                        <div class="form-group">
                                            <label>Select Category *</label>
                                            <select name="category_id" id="category_id"  class="form-control select2" style="width: 100%;">
                                                    <option value="">Select</option>
                                                    @forelse($categories as $category)
                                                            <option value="{{$category->id}}"
                                                                @if(!empty(@old('category_id')) && $category->id==@old('category_id'))
                                                                selected=""
                                                                @elseif(!empty($products->category_id) && $products->category_id==$category['id'])
                                                                 selected=""
                                                                @endif
                                                                >&nbsp;&raquo;&nbsp; {{$category->category_name}}</option>
                                                            @foreach($category['subcategories'] as $subCategory)
                                                                <option value="{{$subCategory->id}}"
                                                                @if(!empty(@old('category_id')) && $subCategory->id==@old('category_id'))
                                                                selected=""
                                                                @elseif(!empty($products->category_id) && $products->category_id==$subCategory['id'])
                                                                 selected=""
                                                                @endif
                                                                >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&raquo;&nbsp; {{$subCategory->category_name}}</option>
                                                            @endforeach
                                                        @empty
                                                    @endforelse
                                            </select>
                                            @error('category_id')
                                            <div style="color:red">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="product_name">Product Name *</label>
                                            <input type="text" class="form-control" name="product_name" id="product_name" placeholder="Enter Product Name"
                                            @if(!empty($products->product_name))
                                            value= "{{$products->product_name}}"
                                            @else value="{{old('product_name')}}"
                                            @endif
                                            >
                                            @if(!empty($products->id))
                                             <input type="hidden" class="form-control" name="product_id" id="product_id" value= "{{$products->id}}">
                                            @endif
                                            @error('product_name')
                                            <div style="color:red">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Prouduct Discount (%)</label>
                                            <input type="text" name="product_discount" id="productd_discount" class="form-control"  placeholder="Enter Product Discount"
                                            @if(!empty($products->product_discount))
                                            value= "{{$products->product_discount}}"
                                            @else value="{{old('product_discount')}}"
                                            @endif>
                                        </div>
                                        <div class="form-group">
                                            <label for="category">Image</label>
                                            <input type="file" class="form-control" id=""  name="image">
                                            @error('image')
                                                <p  style="color: red">{{$message}}</p>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label>Select Pattern</label>
                                            <select name="pattern" id="pattern" class="form-control select2" style="width: 100%;">
                                                    <option value="">Select</option>
                                                    @forelse($pattern as $patterns)
                                                        <option value="{{$patterns}}" @if(!empty($products->pattern) && $products->pattern==$patterns ) selected="" @endif>&nbsp;&raquo;&nbsp; {{$patterns}}</option>
                                                    @empty
                                                    @endforelse
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Product Description</label>
                                            <textarea class="form-control" rows="3" name="description" id="description" placeholder="Enter ...">
                                            @if(!empty($products->description))
                                            {{$products->description}}
                                            @else
                                            {{old('description')}}
                                            @endif
                                            </textarea>
                                        </div>
                                        <div class="form-group">
                                            <label>Meta Description</label>
                                            <textarea class="form-control" name="meta_description" rows="4" placeholder="Enter ...">
                                            @if(!empty($products->meta_description))
                                            {{$products->meta_description}}
                                            @else
                                            {{old('meta_description')}}
                                            @endif
                                            </textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-lg-4">
                                        <div class="form-group">
                                            <label>Select Brand *</label>
                                            <select name="brand_id" id="brand_id" class="form-control select2" style="width: 100%;">
                                                    <option value="">Select</option>
                                                    @forelse($brands as $brand)
                                                        <option value="{{$brand->id}}" @if(!empty($products->brand_id) && $products->brand_id==$brand->id) selected="" 
                                                            @else {{ old('brand_id') == $brand->id? "selected" : "" }}
                                                            @endif>&nbsp;&raquo;&nbsp; {{$brand->brand_name}}
                                                        </option>
                                                    @empty
                                                    @endforelse
                                            </select>
                                            @error('brand_id')
                                                <div style="color:red">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="category_discoutn">Product Code *</label>
                                            <input type="text" class="form-control" id="product_code" name="product_code" placeholder="Enter Price Code"
                                            @if(!empty($products->product_code))
                                            value= "{{$products->product_code}}"
                                            @else value="{{rand(111,9999)}}"
                                            @endif>
                                            @error('product_code')
                                            <div style="color:red">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Prouduct Weight</label>
                                            <input type="text" name="product_weight" id="product_weight" class="form-control"  placeholder="Enter Product Weight"
                                            @if(!empty($products->product_weight))
                                            value= "{{$products->product_weight}}"
                                            @else value="{{old('product_weight')}}"
                                            @endif>
                                        </div>
                                        <div class="form-group">
                                            <label>Select Fabric</label>
                                            <select name="fabric" id="fabric" class="form-control select2" style="width: 100%;">
                                                    <option value="" >Select</option>
                                                    @forelse($fabric as $fab)
                                                        <option value="{{$fab}}" @if(!empty($products->fabric) && $products->fabric==$fab ) selected="" @endif>&nbsp;&raquo;&nbsp; {{$fab}}</option>
                                                    @empty
                                                    @endforelse
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Select Ocassion</label>
                                            <select name="occassion" id="occassion" class="form-control select2" style="width: 100%;">
                                                    <option value="">Select</option>
                                                    @forelse($occassion as $occassions)
                                                        <option value="{{$occassions}}" @if(!empty($products->occassion) && $products->occassion==$occassions ) selected="" @endif>&nbsp;&raquo;&nbsp; {{$occassions}}</option>
                                                    @empty
                                                    @endforelse
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Wash Care</label>
                                            <textarea class="form-control" rows="3" name="wash_care" id="wash_care" placeholder="Enter ..." >
                                            @if(!empty($products->wash_care))
                                            {{$products->wash_care}}
                                            @else
                                            {{old('wash_care')}}
                                            @endif
                                            </textarea>
                                        </div>
                                        <div class="form-group">
                                            <label>Meta Keywords</label>
                                            <textarea class="form-control" id="meta_keywords" name="meta_keywords" rows="4" placeholder="Enter ...">
                                                @if(!empty($products->meta_keywords))
                                                {{$products->meta_keywords}}
                                                @else
                                                {{old('meta_keywords')}}
                                                @endif
                                            </textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-lg-4">
                                        <div class="form-group">
                                            <label>Select Section *</label>
                                            <select name="section_id" id="section" name="section_id" class="form-control select2" style="width: 100%;">
                                                    <option value="" >Select</option>
                                                    @forelse($section as $sec)
                                                        <option value="{{$sec->id}}" @if(!empty($products->section_id) && $products->section_id==$sec->id ) selected="" 
                                                            @else {{ old('section_id') == $sec->id? "selected" : "" }}
                                                            @endif>{{$sec->section}}
                                                        </option>
                                                    @empty
                                                    @endforelse
                                            </select>
                                            @error('section_id')
                                                <div style="color:red">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="category_discoutn">Product Price *</label>
                                            <input type="text" class="form-control" id="product_price" name="product_price" placeholder="Enter Price Rs."
                                            @if(!empty($products->product_price))
                                            value= "{{$products->product_price}}"
                                            @else value="{{old('product_price')}}"
                                            @endif>
                                            @error('product_price')
                                            <div style="color:red">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Prouduct Color *</label>
                                            <input type="text" name="product_color" id="product_color" class="form-control"  placeholder="Product Color"
                                            @if(!empty($products->product_color))
                                            value= "{{$products->product_color}}"
                                            @else value="{{old('product_color')}}"
                                            @endif>
                                            @error('product_color')
                                            <div style="color:red">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Url *</label>
                                            <input type="text" name="url" id="url" class="form-control"  placeholder="Url"
                                            @if(!empty($products->url))
                                            value= "{{$products->url}}"
                                            @else value="{{old('url')}}"
                                            @endif>
                                            @error('url')
                                            <div style="color:red">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label>Select Seleeve</label>
                                            <select name="sleeve" id="sleeve" class="form-control select2" style="width: 100%;">
                                                    <option value="">Select</option>
                                                    @forelse($sleeve as $sel)
                                                        <option value="{{$sel}}"  @if(!empty($products->sleeve) && $products->sleeve==$sel ) selected="" @endif>&nbsp;&raquo;&nbsp; {{$sel}}</option>
                                                    @empty
                                                    @endforelse
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Select Fit</label>
                                            <select name="fit" id="fit" class="form-control select2" style="width: 100%;">
                                                    <option value="">Select</option>
                                                    @forelse($fit as $fits)
                                                        <option value="{{$fits}}" @if(!empty($products->fit) && $products->fit==$fits ) selected="" @endif>&nbsp;&raquo;&nbsp; {{$fits}}</option>
                                                    @empty
                                                    @endforelse
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Meta Title</label>
                                            <textarea class="form-control" rows="3" name="meta_title" id="meta_title" placeholder="Enter ...">
                                            @if(!empty($products->meta_title))
                                            {{$products->meta_title}}
                                            @else
                                            {{old('meta_title')}}
                                            @endif
                                            </textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="category_discoutn">Is Feature </label><br>
                                            <input type="checkbox" id="is_feature"  name="is_feature" value="Yes"
                                            @if(!empty($products->is_featured) && $products->is_featured =="Yes")
                                            checked=""
                                            @endif>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-action">
                                <input type="submit" value="{{$button}}"  class="btn btn-success"/>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection