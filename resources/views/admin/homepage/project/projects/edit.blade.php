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
                                <h3 class="card-title">Edit Project</h3>
                            </div>
                            <div class="card-body pb-2">
                                <form action="{{route('edit_project_action',$edit_project->id)}}" enctype="multipart/form-data" method="post">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <label><strong>Project Title:</strong></label>
                                            <input class="form-control mb-4" value="{{$edit_project->project_title}}" placeholder="Project Title" type="text" name="project_title">
                                            @error('project_title')
                                            <span class="text text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label><strong>Project Type:</strong></label>
                                            <input class="form-control mb-4" value="{{$edit_project->project_type}}" placeholder="Project Type" type="text" name="project_type">
                                            @error('project_type')
                                            <span class="text text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label><strong>Project Category:</strong></label>
                                            <select class="form-control" name="project_cat_id">
                                                <option value="" selected disabled>Select</option>
                                                @if(isset($cat_id))
                                                @foreach($cat_id as $list)
                                                <option value="{{$list->id}}" {{ $list->id == $edit_project->project_cat_id ? 'selected' : '' }}>{{$list->name}}</option>
                                                @endforeach
                                                @endif
                                            </select>
                                            @error('project_type')
                                            <span class="text text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label><strong>Image:</strong></label>
                                            <input class="form-control mb-4" type="file" name="image">
                                            <img src="{{asset('public/admin/assets/project/'.$edit_project->image)}}" width="75px">
                                            @error('image')
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