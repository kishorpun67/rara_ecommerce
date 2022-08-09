@extends('admin.layout.layout')
@section('styles')
@endsection
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
                        <a href="{{route('admin.brand')}}">Brand</a>
                    </li>
                </ul>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex align-items-center">
                                <h4 class="card-title">View Brands</h4>
                                <a href="#" data-toggle="modal" data-target="#addBrand" class="btn btn-primary btn-round ml-auto">
                                    <i class="fa fa-plus"></i>
                                    Add Brand
                                </a>
                            </div>
                        </div>
                        <div class="card-body">
                            <!-- Modal -->
                            <div class="modal fade" id="addBrand" tabindex="-1" role="dialog" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header no-bd">
                                            <h5 class="modal-title">
                                                <span class="fw-mediumbold">
                                                Add Brand</span> 
                                                
                                            </h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <form action="{{route('admin.add.edit.brand')}}" method="post">
                                            @csrf
                                            <div class="modal-body">
                                                <div class="row">
                                                    <div class="col-sm-12">
                                                        <div class="form-group">
                                                            <label>Brand</label>
                                                            <input id="addName" type="text" class="form-control" name="brand_name" placeholder="Brand Name" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-12"> 
                                                        <div class="form-group ">
                                                            <label>Description</label>
                                                            <textarea name="description" col="4" class="form-control" ></textarea>
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
                                            <th>Brand Name</th>
                                            <th>Description</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i=1;?>
                                        @forelse($brands as $data)
                                        <tr>
                                            <td>{{$i}}</td> <?php $i++; ?>
                                            <td>{{$data->brand_name}}</td>
                                            <td>{{$data->description}}</td>
                                            <td>
                                                @if($data->status==1)
                                                    <a  class="updateBrandStatus" id="brand-{{$data->id}}" brand_id="{{$data->id}}"  href="javascript:(0);"><i class="fas fa-toggle-on" status="Active"></i></a>
                                                @else
                                                    <a class="updateBrandStatus" id="brand-{{$data->id}}" brand_id="{{$data->id}}" href="javascript:(0);"><i class="fas fa-toggle-off" status="Inactive"></a>
                                                @endif
                                                                                    
                                            </td>
                                            <td>
                                                <div class="form-button-action">
                                                    <a href="#"  data-target="#editBrand{{$data->id}}" data-toggle="modal" title="" class="btn btn-link btn-primary btn-lg" data-original-title="Edit Category" >
                                                        <i class="fa fa-edit"></i>
                                                    </a>
                                                    <button type="button" data-toggle="tooltip" title="" rel="{{$data->id}}" record="brand" class="btn btn-link btn-danger delete" data-original-title="Remove">
                                                        <i class="fa fa-times"></i>
                                                    </button>
                                                </div>
                                            </td>
                                            </tr>
                                            <div class="modal fade" id="editBrand{{$data->id}}" tabindex="-1" role="dialog" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header no-bd">
                                                            <h5 class="modal-title">
                                                                <span class="fw-mediumbold">
                                                                Edit Brand</span> 
                                                            </h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <form action="{{route('admin.add.edit.brand', $data->id)}}" method="post">
                                                            @csrf
                                                            <div class="modal-body">
                                                                <div class="row">
                                                                    <div class="col-sm-12">
                                                                        <div class="form-group">
                                                                            <label>Brand</label>
                                                                            <input id="addName" type="text" class="form-control" name="brand_name" placeholder="Brand Name" required value="{{$data->brand_name}}">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-sm-12"> 
                                                                        <div class="form-group ">
                                                                            <label>Description</label>
                                                                            <textarea name="description" col="4" class="form-control" >{{$data->description}}</textarea>
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