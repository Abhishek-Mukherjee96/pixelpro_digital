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
                        <!-- <h4 class="page-title mb-0">Edit Project</h4> -->
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
                                <form action="{{route('edit_project_action', $edit_project->id)}}" enctype="multipart/form-data" method="post">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-4 mb-3">
                                            <label><strong>Project Title:</strong></label>
                                            <input class="form-control mb-4" value="{{$edit_project->project_title}}" placeholder="Project Title" type="text" name="project_title">
                                            @error('project_title')
                                            <span class="text text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label><strong>Business Name:</strong></label>
                                            <input class="form-control mb-4" value="{{$edit_project->business_name}}" placeholder="Business Name" type="text" name="business_name">
                                            @error('business_name')
                                            <span class="text text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label><strong>Client Name:</strong></label>
                                            <input class="form-control mb-4" value="{{$edit_project->client_name}}" placeholder="Client Name" type="text" name="client_name">
                                            @error('client_name')
                                            <span class="text text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label><strong>Project Doc File:</strong></label>
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" name="project_doc_file">
                                                <label class="custom-file-label">Choose file</label>
                                            </div>
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label><strong>Logo:</strong></label>
                                            <div class="custom-file">
                                                <input type="file" id="files" multiple class="custom-file-input" accept=".jpg,.jpeg,.png" name="logo[]">
                                                <label class="custom-file-label">Choose file</label>
                                            </div>
                                            <div id="preview" style="width: 75px;"></div>
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <label><strong>Website URL:</strong></label>
                                            <input class="form-control mb-4" value="{{$edit_project->website_url}}" placeholder="Website URL" type="text" name="website_url">
                                        </div>
                                        <div class="col-md-12 mb-3">
                                            <label><strong>Description:</strong></label>
                                            <textarea class="content mb-4" rows="2" placeholder="Description" name="description">{{$edit_project->description}}</textarea>
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
        <script>
            const preview = (file) => {
                const fr = new FileReader();
                fr.onload = () => {
                    const img = document.createElement("img");
                    img.src = fr.result; // String Base64 
                    img.alt = file.name;
                    document.querySelector('#preview').append(img);
                };
                fr.readAsDataURL(file);
            };

            document.querySelector("#files").addEventListener("change", (ev) => {
                if (!ev.target.files) return; // Do nothing.
                [...ev.target.files].forEach(preview);
            });
        </script>
        @endsection