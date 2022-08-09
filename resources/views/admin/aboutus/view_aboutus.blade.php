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
                        <a href="">Contact</a>
                    </li>
                    <li class="separator">
                        <i class="flaticon-right-arrow"></i>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('admin.edit.aboutus')}}" >Update Contact</a>
                    </li>
                </ul>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <form role="form" method="post" action="{{ route('admin.edit.aboutus',$aboutus->id) }}" name="" id="" enctype="multipart/form-data">@csrf
                            <div class="card-header">
                                <div class="card-title">aboutus</div>
                                @if ($errors->any())
                                <div class="alert alert-danger" style="margin-top: 10px">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    @csrf                                    
                                    <div class="col-md-12 col-lg-12">
                                        <div class="form-group">
                                            <label for="image">Image</label>
                                            <input type="file" class="form-control" id=""  name="image">
                                            <img src="{{asset($aboutus->image)}}" style="width:100px; height=100px;" alt="">
                                        </div>
                        
                                        <div class="form-group">
                                            <label for="description">Description</label>
                                            <textarea class="form-control" rows="4" value="" name="textarea" id="description">{{ $aboutus->description }}</textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-action">
                                <input type="submit" value="Update"  class="btn btn-success"/>
                                {{-- <button class="btn btn-success">{{$button}}</button> --}}
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection