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
                        <!-- <h4 class="page-title mb-0">Add User</h4> -->
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
                                <h3 class="card-title">Add Team</h3>
                            </div>
                            <form action="{{route('add_team_action')}}" enctype="multipart/form-data" method="post">
                                @csrf
                                <div class="row p-4">
                                    <div class="col-md-4 mb-3">
                                        <label><strong>Name:</strong></label>
                                        <input class="form-control mb-4" value="{{old('name')}}" placeholder="Name" type="text" name="name">
                                        @error('name')
                                        <span class="text text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label><strong>Designation:</strong></label>
                                        <input class="form-control mb-4" value="{{old('designation')}}" placeholder="Designation" type="text" name="designation">
                                        @error('designation')
                                        <span class="text text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label><strong>Image:</strong></label>
                                        <input class="form-control mb-4" type="file" name="image">
                                        @error('image')
                                        <span class="text text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label><strong>Facebook Link:</strong></label>
                                        <input class="form-control mb-4" value="{{old('fb_link')}}" placeholder="Facebook Link" type="text" name="fb_link">
                                        @error('fb_link')
                                        <span class="text text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label><strong>Instagram Link:</strong></label>
                                        <input class="form-control mb-4" value="{{old('instagram_link')}}" placeholder="Instagram Link" type="text" name="instagram_link">
                                        @error('instagram_link')
                                        <span class="text text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label><strong>Twitter Link:</strong></label>
                                        <input class="form-control mb-4" value="{{old('twitter_link')}}" placeholder="Twitter Link" type="text" name="twitter_link">
                                        @error('twitter_link')
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
                    <!-- End Row-1 -->
                </div>
            </div>
            <!-- End app-content-->
        </div>
        @endsection