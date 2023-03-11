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
                                <h3 class="card-title">Edit Footer</h3>
                            </div>
                            <div class="card-body pb-2">
                            <form action="{{route('update_footer_action',$setting->id)}}" enctype="multipart/form-data" method="post">
                                @csrf
                                <div class="row p-4">
                                    
                                    <div class="col-md-4 mb-3">
                                        <label><strong>Logo:</strong></label>
                                        <input class="form-control mb-4" type="file" name="logo">
                                        <img src="{{asset('public/admin/assets/logo/'.$setting->logo)}}" width="75px">
                                        @error('logo')
                                        <span class="text text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label><strong>Phone:</strong></label>
                                        <input class="form-control mb-4" value="{{$setting->phone}}" placeholder="Phone" type="text" name="phone">
                                        @error('phone')
                                        <span class="text text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label><strong>Email:</strong></label>
                                        <input class="form-control mb-4" value="{{$setting->email}}" placeholder="Email" type="text" name="email">
                                        @error('email')
                                        <span class="text text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label><strong>Address:</strong></label>
                                        <textarea class="form-control" name="address">{{$setting->address}}</textarea>
                                        @error('address')
                                        <span class="text text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label><strong>Description:</strong></label>
                                        <textarea class="form-control" name="description">{{$setting->description}}</textarea>
                                        @error('description')
                                        <span class="text text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label><strong>Facebook Link:</strong></label>
                                        <input class="form-control mb-4" value="{{$setting->fb_link}}" type="text" placeholder="Facebook Link" name="fb_link">
                                        @error('fb_link')
                                        <span class="text text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label><strong>Twitter Link:</strong></label>
                                        <input class="form-control mb-4" value="{{$setting->twitter_link}}" type="text" placeholder="Twitter Link" name="twitter_link">
                                        @error('twitter_link')
                                        <span class="text text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label><strong>Pinterest Link:</strong></label>
                                        <input class="form-control mb-4" value="{{$setting->pinterest_link}}" type="text" placeholder="Pinterest Link" name="pinterest_link">
                                        @error('pinterest_link')
                                        <span class="text text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label><strong>Linkedin Link:</strong></label>
                                        <input class="form-control mb-4" value="{{$setting->linkedin_link}}" type="text" placeholder="Linkedin Link" name="linkedin_link">
                                        @error('linkedin_link')
                                        <span class="text text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label><strong>Youtube Link:</strong></label>
                                        <input class="form-control mb-4" value="{{$setting->youtube_link}}" type="text" placeholder="Youtube Link" name="youtube_link">
                                        @error('youtube_link')
                                        <span class="text text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label><strong>Instagram Link:</strong></label>
                                        <input class="form-control mb-4" value="{{$setting->insta_link}}" type="text" placeholder="Instagram Link" name="insta_link">
                                        @error('insta_link')
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