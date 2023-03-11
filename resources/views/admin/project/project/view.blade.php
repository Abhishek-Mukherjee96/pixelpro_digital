@extends('admin.layouts.main')
@section('content')
<style>
    .usr_img_logo {
        width: 30px;
        height: 30px;
        border-radius: 100px;
        background: #9E2308;
        font-size: 18px;
        color: #fff;
        text-align: center;
        line-height: 30px;
        display: inline-block;
    }
</style>
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
                        <h4 class="page-title mb-0">Project Title: {{$get_project->project_title}}</h4>
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
                        <div class="panel panel-primary tabs-style-3">
                            <div class="tab-menu-heading">
                                <div class="tabs-menu ">
                                    <!-- Tabs -->
                                    <ul class="nav panel-tabs">
                                        <li class=""><a href="#tab11" class="active" data-toggle="tab"><i class="fe fe-info mr-1"></i>Overview</a></li>
                                        <li><a href="#tab12" data-toggle="tab"><i class="fe fe-list mr-1"></i>Task</a></li>
                                        <li><a href="#tab14" data-toggle="tab"><i class="fe fe-database mr-1"></i>Resources</a></li>
                                    </ul>
                                </div>
                            </div>

                            <div class="panel-body tabs-menu-body">
                                <div class="tab-content">
                                    <div class="tab-pane active" id="tab11">
                                        <div class="card p-3">
                                            <div class="row">
                                                <div class="col-md-4 mb-3">
                                                    <label><strong>Business Name:</strong> {{$get_project->business_name}}</label>
                                                </div>
                                                <div class="col-md-4 mb-3">
                                                    <label><strong>Client Name:</strong> {{$get_project->client_name}}</label>
                                                </div>
                                                <div class="col-md-4 mb-3">
                                                    <label><strong>Website URL:</strong>
                                                        {{$get_project->website_url}}
                                                    </label>
                                                </div>

                                                <div class="col-md-12 mb-3">
                                                    <label><strong>Description:</strong>
                                                        {!!$get_project->description!!}
                                                    </label>
                                                </div>
                                                <div class="col-md-12 mb-3">
                                                    <label><strong>Project Doc File:</strong></label>
                                                    <a href="{{asset('public/admin/assets/project/'.$get_project->project_doc_file)}}" target="_blank">View File...</a>
                                                </div>
                                                <div class="col-md-12 mb-3">
                                                    <label><strong>Logo:</strong></label><br>
                                                    @foreach(json_decode($get_project->logo, true) as $list)
                                                    <a href="{{asset('public/admin/assets/logo/project/'.$list)}}" download="{{asset('public/admin/assets/logo/project/'.$list)}}"><img src="{{asset('public/admin/assets/logo/project/'.$list)}}" class="img-fluid" width="100px"></a>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="tab-pane" id="tab12">
                                        <div class="row">
                                            @if(isset($get_project_type))
                                            @foreach($get_project_type as $count => $list)
                                            <div class="card p-3">
                                                <div class="col-md-12 mb-3">
                                                    <div class="page-rightheader">
                                                        <div class="card-header bg-gray">
                                                            <label style="font-size:16px;"><span><b>{{$list->project_type}}:</b></span></label>
                                                        </div>
                                                        <div class="btn btn-list float-right">
                                                            <a href="{{route('add_project_task',['id'=>$get_project->id,'project_type_id'=>$list->id])}}" class="btn btn-info btn-sm"><i class="fe fe-plus mr-1"></i>Add Task</a>
                                                        </div>
                                                        <div class="col-md-12 mt-5">
                                                            <table class="table table-bordered text-nowrap key-buttons" id="example{{$loop->iteration}}">
                                                                <thead>
                                                                    <tr>
                                                                        <th>#</th>
                                                                        <th>Task Title</th>
                                                                        <th>Assign To</th>
                                                                        <th>Assign By</th>
                                                                        <th>Due Date</th>
                                                                        <th>Priority</th>
                                                                        <th>Action</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>

                                                                    @csrf
                                                                    @php
                                                                    $data = DB::table('project_tasks')->where('project_id',$get_project->id)->where('project_types_id',$list->id)->latest()->get();
                                                                    @endphp
                                                                    @if(isset($data))
                                                                    @foreach( $data as $task)
                                                                    <tr>
                                                                        <td>{{$loop->iteration}}</td>
                                                                        <td>{{$task->task_title}}</td>
                                                                        <td>
                                                                            @php
                                                                            $team_id = json_decode($task->assign_to);
                                                                            $team_members_name = DB::table('users')->whereIn('id',$team_id)->get();
                                                                            @endphp
                                                                            @if(isset($team_members_name))
                                                                            @foreach($team_members_name as $member)
                                                                            <span class="usr_img_logo" data-placement="top" data-toggle="tooltip" title="{{$member->name}}">{{ substr($member->name, 0, 1) }}</span>
                                                                            @endforeach
                                                                            @endif
                                                                        </td>
                                                                        <td>
                                                                            <span class="usr_img_logo" data-placement="top" data-toggle="tooltip" title="{{Auth::user()->name}}">{{ substr(Auth::user()->name, 0, 1) }}</span>
                                                                        </td>
                                                                        <td>{{$task->due_date}}</td>
                                                                        <td>
                                                                            @if($task->priority == 2)
                                                                            <span class="badge badge-success mt-2"><i class="glyphicon glyphicon-ok"></i> High</span>
                                                                            @elseif($task->priority == 1)
                                                                            <span class="badge badge-warning mt-2"><i class="glyphicon glyphicon-refresh"></i> Medium</span>
                                                                            @else
                                                                            <span class="badge badge-danger mt-2"><i class="glyphicon glyphicon-remove"></i> Low</span>
                                                                            @endif
                                                                        </td>
                                                                        <td>
                                                                            <a href="{{route('view_project_task',$task->id)}}" class="btn btn-warning"><i class="fa fa-eye"></i></a>

                                                                            <a href="{{route('edit_project_task',$task->id)}}" onclick="return confirm('Are you sure to edit?');" class="btn btn-info"><i class="glyphicon glyphicon-pencil"></i></a>

                                                                            <a href="{{route('delete_project_task',$task->id)}}" onclick="return confirm('Are you sure to delete?');" class="btn btn-danger"><i class="glyphicon glyphicon-trash"></i></a>
                                                                        </td>
                                                                    </tr>
                                                                    @endforeach
                                                                    @endif
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            @endforeach
                                            @endif
                                        </div>
                                    </div>
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
</div>
</div>
@endsection