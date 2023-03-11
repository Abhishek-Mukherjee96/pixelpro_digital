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
                                <div class="card-title">Contact Form List</div>
                            </div>
                            <div class="card-body">
                                <div class="">
                                    <div class="table-responsive">
                                        <table id="example1" class="table table-bordered text-nowrap key-buttons">
                                            <thead>
                                                <tr>
                                                    <th class="wd-15p border-bottom-0">#</th>
                                                    <th class="wd-15p border-bottom-0">Name</th>
                                                    <th class="wd-15p border-bottom-0">Email</th>
                                                    <th class="wd-15p border-bottom-0">Phone</th>
                                                    <th class="wd-15p border-bottom-0">Business Name</th>
                                                    <th class="wd-15p border-bottom-0">Interested In</th>
                                                    <th class="wd-20p border-bottom-0">Date</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @if(isset($quote_list))
                                                @foreach($quote_list as $list)
                                                <tr>
                                                    <td>{{$loop->iteration}}</td>
                                                    <td>{{$list->name}}</td>
                                                    <td>{{$list->email}}</td>
                                                    <td>{{$list->phone}}</td>
                                                    <td>{{$list->business_name}}</td>
                                                    @if($list->interested_in == 1)
                                                    <td>Service 1</td>
                                                    @elseif($list->interested_in == 2)
                                                    <td>Service 2</td>
                                                    @elseif($list->interested_in == 3)
                                                    <td>Service 3</td>
                                                    @endif
                                                    <td>{{$list->created_at}}</td>
                                                </tr>
                                                @endforeach
                                                @endif
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Row-1 -->
                </div>
            </div>
            <!-- End app-content-->
        </div>
        @endsection