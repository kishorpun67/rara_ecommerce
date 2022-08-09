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
                        <a href="{{route('admin.testimonial')}}">Testimonial</a>
                    </li>
                    <li class="separator">
                        <i class="flaticon-right-arrow"></i>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('admin.add.edit.testimonial')}}" >Testimonial Form</a>
                    </li>
                </ul>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <form @if(!empty($testimonialdata['id'])) action="{{route('admin.add.edit.testimonial',$testimonialdata['id'])}}" @else action="{{route('admin.add.edit.testimonial')}}" @endif method="post" enctype="multipart/form-data">
                            <div class="card-header">
                                <div class="card-title">{{$title}}</div>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    @csrf                                    
                                    <div class="col-md-6 col-lg-6">
                                        <div class="form-group">
                                            <label for="name">Name</label>
                                            <input type="text" class="form-control"  placeholder="Enter Name" name="name"  
                                            @if(!empty($testimonialdata['name']))
                                                value="{{$testimonialdata['name']}}"
                                            @else
                                                value="{{old('name')}}"
                                            @endif>
                                        </div>

                                        <div class="form-group">
                                            <label for="post">Post</label>
                                            <input type="text" class="form-control"  placeholder="Enter Post" name="post"  
                                            @if(!empty($testimonialdata['post']))
                                                value="{{$testimonialdata['post']}}"
                                            @else
                                                value="{{old('post')}}"
                                            @endif>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-lg-6">
                                        <div class="form-group">
                                            <label for="image">Image</label>
                                            <input type="file" class="form-control" id=""  name="image">
                                        </div>
                                        <div class="form-group">
                                            <label>Description</label>
                                            <textarea class="form-control" rows="4" name="description" id="description" placeholder="Enter ...">
                                            @if(!empty($testimonialdata['description']))
                                            {{$testimonialdata['description']}}
                                            @else
                                            {{old('description')}}
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