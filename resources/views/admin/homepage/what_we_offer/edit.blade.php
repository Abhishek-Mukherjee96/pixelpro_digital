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
                                <h3 class="card-title">Edit What We Offer</h3>
                            </div>
                            <div class="card-body pb-2">
                                <form action="{{route('edit_what_we_offer_action',$edit_what_we_offer->id)}}" enctype="multipart/form-data" method="post">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-4 mb-3">
                                            <label><strong>Image:</strong></label>
                                            <input class="form-control mb-4" type="file" name="image">
                                            <img src="{{asset('public/admin/assets/service/'.$edit_what_we_offer->image)}}" width="75px">
                                            @error('image')
                                            <span class="text text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label><strong>Icon:</strong></label>
                                            <input class="form-control mb-4" type="file" name="icon">
                                            <img src="{{asset('public/admin/assets/service/'.$edit_what_we_offer->icon)}}" width="75px">
                                            @error('icon')
                                            <span class="text text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label><strong>Image Details:</strong></label>
                                            <input class="form-control mb-4" type="file" name="img_details">
                                            <img src="{{asset('public/admin/assets/service/'.$edit_what_we_offer->img_details)}}" width="75px">
                                            @error('img_details')
                                            <span class="text text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label><strong>Title:</strong></label>
                                            <input class="form-control mb-4" value="{{$edit_what_we_offer->title}}" placeholder="Title" type="text" name="title">
                                            @error('title')
                                            <span class="text text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label><strong>Sub Description:</strong></label>
                                            <input class="form-control mb-4" value="{{$edit_what_we_offer->sub_desc}}" placeholder="Sub Description" type="text" name="sub_desc">
                                            @error('sub_desc')
                                            <span class="text text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label><strong>Heading:</strong></label>
                                            <input class="form-control mb-4" value="{{$edit_what_we_offer->heading}}" placeholder="Heading" type="text" name="heading">
                                            @error('heading')
                                            <span class="text text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label><strong>Slug:</strong></label>
                                            <input class="form-control mb-4" value="{{$edit_what_we_offer->slug}}" placeholder="Slug" type="text" name="slug">
                                            @error('slug')
                                            <span class="text text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                        <div class="col-md-12 mb-3">
                                            <label><strong>Description:</strong></label>
                                            <textarea placeholder="Description" class="form-control mb-4" name="description">{{$edit_what_we_offer->description}}</textarea>
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