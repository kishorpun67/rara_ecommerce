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
                        <a href="{{route('admin.banner')}}">Banner</a>
                    </li>
                </ul>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex align-items-center">
                                <h4 class="card-title">View Brands</h4>
                                <a href="#" data-toggle="modal" data-target="#addBanner" class="btn btn-primary btn-round ml-auto">
                                    <i class="fa fa-plus"></i>
                                    Add Banner
                                </a>
                            </div>
                        </div>
                        <div class="card-body">
                            <!-- Modal -->
                            <div class="modal fade" id="addBanner" tabindex="-1" role="dialog" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header no-bd">
                                            <h5 class="modal-title">
                                                <span class="fw-mediumbold">
                                                Add Banner</span> 
                                                
                                            </h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <form action="{{route('admin.add.edit.banner')}}" method="post" enctype="multipart/form-data">
                                            @csrf
                                            <div class="modal-body">
                                                <div class="row">
                                                    <div class="col-sm-12">
                                                        <div class="form-group">
                                                            <label>Title</label>
                                                            <input id="" type="text" class="form-control" name="titles" placeholder="Title" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-12"> 
                                                        <div class="form-group ">
                                                            <label>Image</label>
                                                            <input type="file" name="image" id="image" class="form-control" placeholder="Image" required >
                                                        </div>
                                                    </div>
                                                  
                                                </div>
                                            </div>
                                            <div class="modal-footer no-bd">
                                                <input type="submit" value="Add" class="btn btn-primary"btn btn-primary">
                                                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>

                            <div class="table-responsive">
                                <table id="add-row" class="display table table-striped table-hover" >
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Title</th></th>
                                            <th>Image</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i=1;?>
                                        @forelse($banners as $data)
                                        <tr>
                                            <td>{{$i}}</td> <?php $i++; ?>
                                            <td>{{$data->titles}}</td>
                                            <td>
                                                @if(!empty($data->image))
                                                    <img src="{{asset($data->image)}}" style=" width:150px;" alt="">
                                                @else
                                                    <img src="{{asset('admin/image/no_image.png')}}" style=" width:80px;" alt="">
                                                @endif
                                            </td>
                                            <td>
                                                @if($data->status==1)
                                                    <a  class="updateBannerStatus" id="banner-{{$data->id}}" banner_id="{{$data->id}}"  href="javascript:(0);"><i class="fas fa-toggle-on" status="Active"></i></a>
                                                @else
                                                    <a class="updateBannerStatus" id="banner-{{$data->id}}" banner_id="{{$data->id}}" href="javascript:(0);"><i class="fas fa-toggle-off" status="Inactive"></a>
                                                @endif
                                            </td>
                                            <td>
                                                <div class="form-button-action">
                                                    <a href="#"  data-target="#editBanner{{$data->id}}" data-toggle="modal" title="" class="btn btn-link btn-primary btn-lg" data-original-title="Edit Category" >
                                                        <i class="fa fa-edit"></i>
                                                    </a>
                                                    <button type="button" data-toggle="tooltip" title="" rel="{{$data->id}}" record="banner" class="btn btn-link btn-danger delete" data-original-title="Remove">
                                                        <i class="fa fa-times"></i>
                                                    </button>
                                                </div>
                                            </td>
                                            </tr>
                                            <div class="modal fade" id="editBanner{{$data->id}}" tabindex="-1" role="dialog" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header no-bd">
                                                            <h5 class="modal-title">
                                                                <span class="fw-mediumbold">
                                                                Edit Banner</span> 
                                                            </h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <form action="{{route('admin.add.edit.banner', $data->id)}}" method="post" enctype="multipart/form-data">
                                                            @csrf
                                                            <div class="modal-body">
                                                                <div class="row">
                                                                    <div class="col-sm-12">
                                                                        <div class="form-group">
                                                                            <label>Title</label>
                                                                            <input id="addName" type="text" class="form-control" name="titles" placeholder="Title" required value="{{$data->titles}}">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-sm-12"> 
                                                                        <div class="form-group ">
                                                                            <label>Image</label>
                                                                            <input type="file" name="image" id="image" class="form-control" placeholder="Image"  >
                                                                            <br>
                                                                            @if (!empty($data->image)) 
                                                                                <img src="{{asset($data->image)}}" style=" width:300px;" alt="">
                                                                            @endif
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer no-bd">
                                                                <input type="submit" value="Update" class="btn btn-primary"btn btn-primary">
                                                                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
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