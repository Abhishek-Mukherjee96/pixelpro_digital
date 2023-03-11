@extends('admin.layouts.main')
@section('content')
<!-- Page -->
<div class="page">
    <div class="page-main">
        @extends('admin.layouts.sidebar')
        <!-- App-Content -->
        <div class="app-content main-content">
            <div class="side-app">
                @extends('admin.layouts.nav')
                <!--Page header-->
                <div class="page-header">
                    <div class="page-leftheader">
                        <!-- <h4 class="page-title mb-0">Edit User</h4> -->
                    </div>
                    <div class="page-rightheader">

                    </div>
                </div>
                <!--End Page header-->
                @if(Session::has('success'))
                <p class="alert alert-success">{{ Session::get('success') }}</p>
                @elseif(Session::has('error'))
                <p class="alert alert-danger">{{ Session::get('error') }}</p>
                @endif
                <!-- Row-1 -->
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12">
                        <div class="card">
                            <div class="card-header bg-primary text-white">
                                <h3 class="card-title">Edit Team</h3>
                            </div>
                            <div class="card-body pb-2">
                                <form action="{{route('edit_testimonial_action',$edit_testimonial->id)}}" enctype="multipart/form-data" method="post">
                                    @csrf
                                    <div class="row">
                                    <div class="col-md-4 mb-3">
                                        <label><strong>Name:</strong></label>
                                        <input class="form-control mb-4" value="{{$edit_testimonial->name}}" placeholder="Name" type="text" name="name">
                                        @error('name')
                                        <span class="text text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label><strong>Designation:</strong></label>
                                        <input class="form-control mb-4" value="{{$edit_testimonial->designation}}" placeholder="Designation" type="text" name="designation">
                                        @error('designation')
                                        <span class="text text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label><strong>Image:</strong></label>
                                        <input class="form-control mb-4" type="file" name="image">
                                        <img src="{{asset('public/admin/assets/testimonial/'.$edit_testimonial->image)}}" width="75px">
                                        @error('image')
                                        <span class="text text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                    <div class="col-md-12 mb-3">
                                        <label><strong>Description:</strong></label>
                                        <textarea class="form-control" name="description">{{$edit_testimonial->description}}</textarea>
                                        @error('description')
                                        <span class="text text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                        <div class="col-md-12">
                                            <input type="submit" class="btn btn-info" value="Save">
                                        </div>

                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- End Row-1 -->
                </div>
            </div>
            <!-- End app-content-->
        </div>
        @endsection