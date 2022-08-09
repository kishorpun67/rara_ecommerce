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
                        <a href="{{route('admin.edit.footer')}}" >Update Contact</a>
                    </li>
                </ul>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <form role="form" method="post" action="{{ route('admin.edit.footer',$footer->id) }}" name="" id="" enctype="multipart/form-data">@csrf
                            <div class="card-header">
                                <div class="card-title">Footer</div>
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
                                    <div class="col-md-6 col-lg-6">
                                        <div class="form-group">
                                            <label for="address">Address</label>
                                            <input type="text" class="form-control" value="{{ $footer->address }}" name="address" id="" required="">
                                        </div>
                                        <div class="form-group">
                                            <label for="number">Number</label>
                                            <input type="text" class="form-control" value="{{ $footer->number }}" name="number" id="" required="">
                                        </div>
                                        <div class="form-group">
                                            <label for="mail">Email Address</label>
                                            <input type="text" class="form-control" value="{{ $footer->mail }}" name="mail" id="" required="">
                                        </div>
                                        <div class="form-group">
                                            <label for="fb_url">Fb Url</label>
                                            <input type="text" class="form-control" value="{{ $footer->fb_url }}" name="fb_url" id="" required="">
                                        </div>
                                        <div class="form-group">
                                            <label for="twitter_url">Twitter Url</label>
                                            <input type="text" class="form-control" value="{{ $footer->twitter_url }}" name="twitter_url" id="" required="">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-lg-6">
                                        <div class="form-group">
                                            <label for="instagram_url">Instagram Url</label>
                                            <input type="text" class="form-control" value="{{ $footer->instagram_url }}" name="instagram_url" id="" required="">
                                        </div>
                                        <div class="form-group">
                                            <label for="LinkedIn_url">LinkedIn Url</label>
                                            <input type="text" class="form-control" value="{{ $footer->LinkedIn_url }}" name="LinkedIn_url" id="" required="">
                                        </div>
                                        <div class="form-group">
                                        <label for="utube_url">Youtube Url</label>
                                        <input type="text" class="form-control" value="{{ $footer->utube_url }}" name="utube_url" id="" required="">
                                        </div>
                                        <div class="form-group">
                                            <label for="message">Message</label>
                                            <textarea class="form-control" rows="4" value="" name="message" id="message">{{ $footer->message }}</textarea>
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