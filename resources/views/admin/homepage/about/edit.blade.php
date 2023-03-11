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
                                <h3 class="card-title">Edit About</h3>
                            </div>
                            <div class="card-body pb-2">
                                <form action="{{route('edit_about_action',$edit_about->id)}}" enctype="multipart/form-data" method="post">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-4 mb-3">
                                            <label><strong>Image One:</strong></label>
                                            <input class="form-control mb-4" type="file" name="img_one">
                                            <img src="{{asset('public/admin/assets/about/'.$edit_about->img_one)}}" width="75px">
                                            @error('img_one')
                                            <span class="text text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label><strong>Image Two:</strong></label>
                                            <input class="form-control mb-4" type="file" name="img_two">
                                            <img src="{{asset('public/admin/assets/about/'.$edit_about->img_two)}}" width="75px">
                                            @error('img_two')
                                            <span class="text text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label><strong>Image Three:</strong></label>
                                            <input class="form-control mb-4" type="file" name="img_three">
                                            <img src="{{asset('public/admin/assets/about/'.$edit_about->img_three)}}" width="75px">
                                            @error('img_three')
                                            <span class="text text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label><strong>Heading:</strong></label>
                                            <input class="form-control mb-4" value="{{$edit_about->heading}}" placeholder="Heading" type="text" name="heading">
                                            @error('heading')
                                            <span class="text text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label><strong>Button Url:</strong></label>
                                            <input class="form-control mb-4" value="{{$edit_about->button_url}}" placeholder="Button Url" type="text" name="button_url">
                                            @error('button_url')
                                            <span class="text text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label><strong>Years of Exp:</strong></label>
                                            <input class="form-control mb-4" value="{{$edit_about->years_of_exp}}" placeholder="Years of Exp" type="text" name="years_of_exp">
                                            @error('years_of_exp')
                                            <span class="text text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label><strong>Sub Heading One:</strong></label>
                                            <input class="form-control mb-4" value="{{$edit_about->subhead_one}}" placeholder="Sub Heading One" type="text" name="subhead_one">
                                            @error('subhead_one')
                                            <span class="text text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                        <div class="col-md-4 mb-3">
                                        <label><strong>Sub Heading Two:</strong></label>
                                            <input class="form-control mb-4" value="{{$edit_about->subhead_two}}" placeholder="Sub Heading Two" type="text" name="subhead_two">
                                            @error('subhead_two')
                                            <span class="text text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                        <div class="col-md-4 mb-3">
                                        <label><strong>Sub Heading Three:</strong></label>
                                            <input class="form-control mb-4" value="{{$edit_about->subhead_three}}" placeholder="Sub Heading Three" type="text" name="subhead_three">
                                            @error('subhead_three')
                                            <span class="text text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                        <div class="col-md-12 mb-3">
                                            <label><strong>Description:</strong></label>
                                            <textarea placeholder="Description" class="form-control mb-4" name="description">{{$edit_about->description}}</textarea>
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