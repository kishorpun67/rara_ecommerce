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
                        <a href="{{route('admin.testimonial')}}">Testimonial</a>
                    </li>
                </ul>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex align-items-center">
                                <h4 class="card-title">View Testimonial</h4>
                                <a href="{{route('admin.add.edit.testimonial')}}"  class="btn btn-primary btn-round ml-auto">
                                    <i class="fa fa-plus"></i>
                                    Add Testimonial
                                </a>
                            </div>
                        </div>
                        <div class="card-body">
                            <!-- Modal -->
                            <div class="table-responsive">
                                <table id="add-row" class="display table table-striped table-hover" >
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Name</th>
                                            <th>Post</th>
                                            <th>Image</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i=1;?>
                                        @forelse($testimonial as $testimonial)
                                        <tr>
                                            <td>{{$i}}</td><?php $i++; ?>
                                            <td>{{$testimonial->name}}</td>
                                            <td>{{$testimonial->post}}</td>
                                            <td><img src="{{asset($testimonial->image)}}" style=" width:80px;" alt=""></td>
                                            <td>{{$testimonial->description}}</td>
                                            <td>
                                                @if($testimonial->status==1)
                                                    <a class="updateTestimonialStatus" id="testimonial-{{ $testimonial->id }}" testimonial_id="{{ $testimonial->id }}" href="javascript:void(0)"><i class="fas fa-toggle-on" status="Active"></i></a>
                                                @else
                                                    <a class="updateTestimonialStatus" id="testimonial-{{ $testimonial->id }}" testimonial_id="{{ $testimonial->id }}" href="javascript:void(0)"><i class="fas fa-toggle-off" status="Inactive"></i></a>
                                                @endif
                                            </td>
                                            <td>
                                                <div class="form-button-action">
                                                    <a href="{{route('admin.add.edit.testimonial', $testimonial->id)}}" class="btn btn-data-toggle="tooltip" title="" class="btn btn-link btn-primary btn-lg" data-original-title="Edit Testimonial" >
                                                        <i class="fa fa-edit"></i>
                                                    </a>
                                                    <button type="button" data-toggle="tooltip" title="" rel="{{$testimonial->id}}" record="testimonial" class="btn btn-link btn-danger delete" data-original-title="Remove">
                                                        <i class="fa fa-times"></i>
                                                    </button>
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