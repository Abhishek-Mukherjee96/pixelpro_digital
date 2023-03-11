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
                                <h3 class="card-title">Add FAQ</h3>
                            </div>
                            <form action="{{route('add_faq_action')}}" enctype="multipart/form-data" method="post">
                                @csrf
                                <div class="row p-4">
                                    <div class="col-md-12 mb-3">
                                        <label><strong>Title:</strong></label>
                                        <input class="form-control mb-4" value="{{old('title')}}" placeholder="Title" type="text" name="title">
                                        @error('title')
                                        <span class="text text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                    
                                    <div class="col-md-12 mb-3">
                                        <label><strong>Description:</strong></label>
                                        <textarea class="content" name="description" placeholder="Description">{{old('description')}}</textarea>
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