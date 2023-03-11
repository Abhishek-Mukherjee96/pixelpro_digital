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
                                <h3 class="card-title">Edit Blog</h3>
                            </div>
                            <div class="card-body pb-2">
                                <form action="{{route('edit_blog_action',$blog->id)}}" enctype="multipart/form-data" method="post">
                                    @csrf
                                    <div class="row p-4">
                                        <div class="col-md-4 mb-3">
                                            <label><strong>Title:</strong></label>
                                            <input class="form-control mb-4" value="{{$blog->title}}" placeholder="Title" type="text" name="title">
                                            @error('title')
                                            <span class="text text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label><strong>Blog Image:</strong></label>
                                            <input class="form-control mb-4" type="file" name="image">
                                            <img src="{{asset('public/admin/assets/blog/'.$blog->image)}}" width="75px">
                                            @error('image')
                                            <span class="text text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label><strong>Blog Type:</strong></label>
                                            <input class="form-control mb-4" value="{{$blog->type}}" placeholder="Blog Type" type="text" name="type">
                                            @error('type')
                                            <span class="text text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label><strong>Slug:</strong></label>
                                            <input class="form-control mb-4" value="{{$blog->slug}}" placeholder="Slug" type="text" name="slug">
                                            @error('slug')
                                            <span class="text text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label><strong>Author Name:</strong></label>
                                            <input class="form-control mb-4" value="{{$blog->author_name}}" placeholder="Author Name" type="text" name="author_name">
                                            @error('author_name')
                                            <span class="text text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label><strong>Author Image:</strong></label>
                                            <input class="form-control mb-4" type="file" name="author_image">
                                            <img src="{{asset('public/admin/assets/blog/'.$blog->author_image)}}" width="75px">
                                            @error('author_image')
                                            <span class="text text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                        <div class="col-md-12 mb-3">
                                            <label><strong>Description:</strong></label>
                                            <textarea class="form-control" name="description">{{$blog->description}}</textarea>
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