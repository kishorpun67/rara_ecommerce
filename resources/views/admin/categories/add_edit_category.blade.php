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
                        <a href="{{route('admin.categories')}}">Category</a>
                    </li>
                    <li class="separator">
                        <i class="flaticon-right-arrow"></i>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('admin.add.edit.category')}}" >Category Form</a>
                    </li>
                </ul>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <form @if(!empty($categorydata['id'])) action="{{route('admin.add.edit.category',$categorydata['id'])}}" @else action="{{route('admin.add.edit.category')}}" @endif method="post" enctype="multipart/form-data">
                            <div class="card-header">
                                <div class="card-title">{{$title}}</div>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    @csrf                                    
                                    <div class="col-md-6 col-lg-4">
                                        <div class="form-group">
                                            <label for="category">Category Name  *</label>
                                            <input type="text" class="form-control"  placeholder="Category Name" name="category_name"  
                                            @if(!empty($categorydata['category_name']))
                                                value="{{$categorydata['category_name']}}"
                                            @else
                                                value="{{old('category_name')}}"
                                            @endif>
                                            @error('category_name')
                                                <p  style="color: red">{{$message}}</p>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="category">Category Discount</label>
                                            <input type="text" class="form-control" id="" placeholder="Category Discount" name="category_discount"  
                                            @if(!empty($categorydata['category_discount']))
                                                value="{{$categorydata['category_discount']}}"
                                            @else
                                                value="{{old('category_discount')}}"
                                            @endif>
                                            @error('category_discount')
                                                <p  style="color: red">{{$message}}</p>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label>Meta Description</label>
                                            <textarea class="form-control" name="meta_description" rows="4" placeholder="Enter ...">
                                            @if(!empty($categorydata['meta_description']))
                                            {{$categorydata['meta_description']}}
                                            @else
                                            {{old('meta_description')}}
                                            @endif
                                            </textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-lg-4">
                                        <div class="form-group">
                                            <label>Select Category Level *</label>
                                            <select name="parent_id" id="parent_id" class="form-control select2" style="width: 100%;">
                                            <option value="0" @if(isset($categorydata['parent_id']) && $categorydata['parent_id']==0) selected=""
                                            @else {{ old('parent_id') == 0 ? "selected" : "" }}
                                            @endif>Main Category</option>
                                            @if(!empty($categories))
                                                @foreach($categories as $category)
                                                <option value="{{ $category['id'] }}"  
                                                @if(isset($categorydata['parent_id']) && $categorydata['parent_id']==$category['id']) selected=""
                                                    @else {{ old('parent_id') == $category['id'] ? "selected" : "" }}
                                                @endif>{{ $category['category_name'] }}</option>
                                                @if(!empty($category['subcategories']))
                                                    @foreach($category['subcategories'] as $subcategory)
                                                        <option value="{{ $subcategory['id'] }}" 
                                                        >&nbsp;&raquo;&nbsp;{{  $subcategory['category_name'] }}</option>
                                                    @endforeach
                                                    @endif
                                                @endforeach
                                            @endif
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="category">Url *</label>
                                            <input type="text" class="form-control" id="" placeholder="Url" name="url"
                                            @if(!empty($categorydata['url']))
                                            value="{{$categorydata['url']}}"
                                            @else
                                                value="{{old('url')}}"
                                            @endif>
                                            @error('url')
                                                <p  style="color: red">{{$message}}</p>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label>Meta Title</label>
                                            <textarea class="form-control" rows="4" name="meta_title" id="meta_title" placeholder="Enter ...">
                                            @if(!empty($categorydata['meta_title']))
                                                {{$categorydata['meta_title']}}
                                            @else
                                                {{old('meta_title')}}
                                            @endif
                                            </textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-lg-4">
                                        <div class="form-group">
                                            <label for="category">Image</label>
                                            <input type="file" class="form-control" id=""  name="image">
                                            @error('image')
                                                <p  style="color: red">{{$message}}</p>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label>Category Description</label>
                                            <textarea class="form-control" rows="4" name="description" id="description" placeholder="Enter ...">
                                            @if(!empty($categorydata['description']))
                                            {{$categorydata['description']}}
                                            @else
                                            {{old('description')}}
                                            @endif
                                            </textarea>
                                        </div>
                                        <div class="form-group">
                                            <label>Meta Keywords</label>
                                            <textarea class="form-control" id="meta_keywords" name="meta_keywords" rows="4" placeholder="Enter ...">
                                                @if(!empty($categorydata['meta_keywords']))
                                                {{$categorydata['meta_keywords']}}
                                                @else
                                                {{old('meta_keywords')}}
                                                @endif
                                            </textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-action">
                                <input type="submit" value="{{$button}}"  class="btn btn-success"/>
                                {{-- <button class="btn btn-success">{{$button}}</button> --}}
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection