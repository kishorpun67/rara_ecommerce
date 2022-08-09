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
                        <a href="{{route('admin.coupen')}}">Coupen</a>
                    </li>
                    <li class="separator">
                        <i class="flaticon-right-arrow"></i>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('admin.add.edit.coupen')}}" >Coupen Form</a>
                    </li>
                </ul>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <form @if(!empty($coupendata['id'])) action="{{route('admin.add.edit.coupen',$coupendata['id'])}}" @else action="{{route('admin.add.edit.coupen')}}" @endif method="post" enctype="multipart/form-data">
                            <div class="card-header">
                                <div class="card-title">{{$title}}</div>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    @csrf                                    
                                    <div class="col-md-6 col-lg-6">
                                        <div class="form-group">
                                            <label for="type">Coupen Type * </label>
                                            <select id="type" class="form-control" name="type" required="">
                                              <option name="type" value="Fixed" @if ($coupendata['type']== "Fixed") {{ 'selected' }} @endif>Fixed</option>
                                              <option name="type" value="Percentage" @if ($coupendata['type']== "Percentage") {{ 'selected' }} @endif>Percentage</option>
                                            </select>
                                          </div>

                                        <div class="form-group">
                                            <label for="coupen_code">Coupen Code</label>
                                            <input type="text" class="form-control"  placeholder="Enter Coupen Code" name="coupen_code"  
                                            @if(!empty($coupendata['coupen_code']))
                                                value="{{$coupendata['coupen_code']}}"
                                            @else
                                                value="{{old('coupen_code')}}"
                                            @endif>
                                        </div>

                                        <div class="form-group">
                                            <label for="price">Price</label>
                                            <input type="text" class="form-control"  placeholder="Enter Price" name="price"  
                                            @if(!empty($coupendata['price']))
                                                value="{{$coupendata['price']}}"
                                            @else
                                                value="{{old('price')}}"
                                            @endif>
                                        </div>

                                        <div class="form-group">
                                            <label for="date">Date</label>
                                            <input type="date" class="form-control"  placeholder="Enter Date" name="date"  
                                            @if(!empty($coupendata['date']))
                                                value="{{$coupendata['date']}}"
                                            @else
                                                value="{{old('date')}}"
                                            @endif>
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