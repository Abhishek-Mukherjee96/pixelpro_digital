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
                                <h3 class="card-title">Add Job</h3>
                            </div>
                            <form action="{{route('add_career_action')}}" enctype="multipart/form-data" method="post">
                                @csrf
                                <div class="row p-4">
                                    <div class="col-md-4 mb-3">
                                        <label><strong>Title:</strong></label>
                                        <input class="form-control mb-4" value="{{old('title')}}" placeholder="Title" type="text" name="title">
                                        @error('title')
                                        <span class="text text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label><strong>Tab Name:</strong></label>
                                        <select class="form-control" name="tab_name">
                                            <option value="" selected disabled>Select One</option>
                                            @if(isset($career_tab))
                                            @foreach($career_tab as $list)
                                            <option value="{{$list->tab_name}}">{{$list->tab_name}}</option>
                                            @endforeach
                                            @endif
                                        </select>
                                        @error('tab_name')
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
                                    <div class="col-md-6 mb-3">
                                        <label><strong>Location:</strong></label>
                                        <input class="form-control mb-4" value="{{old('location')}}" placeholder="Location" type="text" name="location">
                                        @error('location')
                                        <span class="text text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label><strong>Job Type:</strong></label>
                                        <select class="form-control" name="job_type">
                                            <option value="" selected disabled>Select One</option>
                                            <option value="Full-Time">Full-Time</option>
                                            <option value="Part-Time">Part-Time</option>
                                        </select>
                                        @error('job_type')
                                        <span class="text text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                    <div class="col-md-12 mb-3">
                                        <label><strong>Description:</strong></label>
                                        <textarea class="form-control" name="description">{{old('description')}}</textarea>
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
                    <!-- End Row-1 -->
                </div>
            </div>
            <!-- End app-content-->
        </div>
        @endsection