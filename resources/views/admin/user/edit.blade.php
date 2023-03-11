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
                                <h3 class="card-title">Edit User</h3>
                            </div>
                            <div class="card-body pb-2">
                                <form action="{{route('edit_user_action',$edit_user->id)}}" enctype="multipart/form-data" method="post">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <label><strong>Employee Code:</strong></label>
                                            <input class="form-control mb-4" value="{{$edit_user->employee_code}}" readonly placeholder="Employee Code" type="text" name="employee_code">
                                            @error('employee_code')
                                            <span class="text text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label><strong>Device Code:</strong></label>
                                            <input class="form-control mb-4" value="{{$edit_user->device_code}}" readonly placeholder="Device Code" type="text" name="device_code">
                                            @error('device_code')
                                            <span class="text text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                        <div class="col-md-3 mb-3">
                                            <label><strong>Name:</strong></label>
                                            <input class="form-control mb-4" value="{{$edit_user->name}}" placeholder="Name" type="text" name="name">
                                            @error('name')
                                            <span class="text text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                        <div class="col-md-3 mb-3">
                                            <label><strong>Email:</strong></label>
                                            <input class="form-control mb-4" readonly value="{{$edit_user->email}}" placeholder="Email" type="text" name="email">
                                            @error('email')
                                            <span class="text text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                        <div class="col-md-3 mb-3">
                                            <label><strong>Phone Number:</strong></label>
                                            <input class="form-control mb-4" value="{{$edit_user->phone_number}}" placeholder="Phone Number" type="text" name="phone_number">
                                            @error('phone_number')
                                            <span class="text text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                        <div class="col-md-3 mb-3">
                                            <label><strong>Department:</strong></label>
                                            <select class="form-control" name="department">
                                                <option value="" selected disabled>---Select Department---</option>
                                                <option value="Development Head" {{ $edit_user->department == 'Development Head' ? 'selected' : '' }}>Development Head</option>
                                                <option value="Website Development" {{ $edit_user->department == 'Website Development' ? 'selected' : '' }}>Website Development</option>
                                                <option value="SEO" {{ $edit_user->department == 'SEO' ? 'selected' : '' }}>SEO</option>
                                                <option value="SMM" {{ $edit_user->department == 'SMM' ? 'selected' : '' }}>SMM</option>
                                                <option value="Content Writing" {{ $edit_user->department == 'Content Writing' ? 'selected' : '' }}>Content Writing</option>
                                                <option value="Video Editing" {{ $edit_user->department == 'Video Editing' ? 'selected' : '' }}>Video Editing</option>
                                                <option value="Graphic Designing" {{ $edit_user->department == 'Graphic Designing' ? 'selected' : '' }}>Graphic Designing</option>
                                            </select>
                                            @error('department')
                                            <span class="text text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                        <div class="col-md-12 mb-3">
                                            <label><strong>Address:</strong></label>
                                            <textarea class="form-control mb-4" rows="2" placeholder="Address" name="address">{{$edit_user->address}}</textarea>
                                            @error('address')
                                            <span class="text text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                        <div class="col-md-12 mb-3">
                                            <label><strong>User Type:</strong></label>
                                            <select class="form-control" name="user_type_id">
                                                <option value="" selected disabled>---Select User Type---</option>
                                                @if(isset($get_user_type))
                                                @foreach($get_user_type as $list)
                                                <option value="{{$list->id}}" {{ $list->id == $edit_user->user_type_id ? 'selected' : '' }}>{{$list->role}}</option>
                                                @endforeach
                                                @endif
                                            </select>
                                            @error('user_type')
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