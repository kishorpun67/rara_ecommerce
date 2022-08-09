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
                        <a href="{{route('admin.categories')}}">Category</a>
                    </li>
                </ul>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex align-items-center">
                                <h4 class="card-title">View Categories</h4>
                                <a href="{{route('admin.add.edit.category')}}" class="btn btn-primary btn-round ml-auto">
                                    <i class="fa fa-plus"></i>
                                    Add Category
                                </a>
                            </div>
                        </div>
                        <div class="card-body">
                            <!-- Modal -->
                            <div class="modal fade" id="addRowModal" tabindex="-1" role="dialog" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header no-bd">
                                            <h5 class="modal-title">
                                                <span class="fw-mediumbold">
                                                New</span> 
                                                <span class="fw-light">
                                                    Row
                                                </span>
                                            </h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <p class="small">Create a new row using this form, make sure you fill them all</p>
                                            <form>
                                                <div class="row">
                                                    <div class="col-sm-12">
                                                        <div class="form-group form-group-default">
                                                            <label>Name</label>
                                                            <input id="addName" type="text" class="form-control" placeholder="fill name">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 pr-0">
                                                        <div class="form-group form-group-default">
                                                            <label>Position</label>
                                                            <input id="addPosition" type="text" class="form-control" placeholder="fill position">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group form-group-default">
                                                            <label>Office</label>
                                                            <input id="addOffice" type="text" class="form-control" placeholder="fill office">
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                        <div class="modal-footer no-bd">
                                            <button type="button" id="addRowButton" class="btn btn-primary">Add</button>
                                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="table-responsive">
                                <table id="add-row" class="display table table-striped table-hover" >
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Category</th>
                                            <th>Parent Category</th>
                                            <th>Image</th>
                                            <th>URL</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody >
                                        <?php $i=1;?>

                                        @forelse($results as $data)
                                        @if(!isset($data->parentcategory->category_name))
                                          <?php $parent_category = "Root"; ?>
                                        @else
                                          <?php $parent_category = $data->parentcategory->category_name; ?>
                                        @endif
                                        <tr>
                                        <td>{{$i}}</td> <?php $i++; ?>
                                           <td>{{$data->category_name}}</td>
                                           <td>{{$parent_category}}</td>
                                           <td>
                                               @if(!empty($data->category_image))
                                               <img src="{{asset($data->category_image)}}" style=" width:80px;" alt="">
                                               @else
                                               <img src="{{asset('admin/image/no_image.png')}}" style=" width:80px;" alt="">
                                               @endif
                                           </td>
                                           <td>{{$data->url}}</td>
                                           <td>
                                                @if($data->status==1)
                                                    <a  class="updateCategoryStatus" id="category-{{$data->id}}" category_id="{{$data->id}}"  href="javascript:(0);"><i class="fas fa-toggle-on" status="Active"></i></a>
                                                @else
                                                    <a class="updateCategoryStatus" id="category-{{$data->id}}" category_id="{{$data->id}}" href="javascript:(0);"><i class="fas fa-toggle-off" status="Inactive"></a>
                                                @endif
                                           </td>
                                           <td>
                                               <div class="form-button-action">
                                                   <a href="{{route('admin.add.edit.category',$data->id)}}" class="btn btn-type="button" data-toggle="tooltip" title="" class="btn btn-link btn-primary btn-lg" data-original-title="Edit Category" >
                                                       <i class="fa fa-edit"></i>
                                                   </a>
                                                   <a type="button" data-toggle="tooltip" title="" rel="{{$data->id}}" record="category" class="btn btn-link btn-danger delete" data-original-title="Remove">
                                                       <i class="fa fa-times"></i>
                                                   </a>
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