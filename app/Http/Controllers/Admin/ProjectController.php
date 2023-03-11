<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\ProjectCategory;
use App\Models\ProjectTask;
use App\Models\ProjectType;
use App\Models\User;
use App\Models\UserType;
use GuzzleHttp\Handler\Proxy;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ProjectController extends Controller
{
    //GET ALL PROJECT
    public function project()
    {
        // $get_project = Project::leftjoin('project_categories', 'project_categories.id', '=', 'projects.category_id')->select('projects.*')->get();
        $get_project = Project::latest()->get();
        return view('admin.project.project.index', compact('get_project'));
    }

    public function add_project()
    {
        $project_manager = User::leftjoin('user_types', 'user_types.id', '=', 'users.user_type_id')->select('users.*')->get();
        $team_member = User::leftjoin('user_types', 'user_types.id', '=', 'users.user_type_id')->select('users.*')->get();
        $team_members = User::all();
        //$project_type = ProjectCategory::where('status', '=', 1)->get();
        return view('admin.project.project.add', compact('project_manager', 'team_member', 'team_members'));
    }

    //ADD PROJECT
    public function add_project_action(Request $req)
    {
        $req->validate([
            'project_title' => 'required',
            'business_name' => 'required',
            'client_name' => 'required',
            'description' => 'required',
        ]);

        $add_project = new Project();

        $fileName = [];
        if ($req->file('logo')) {
            foreach ($req->file('logo') as $logo) {
                $imageName = rand() . "." . $logo->getClientOriginalExtension();
                $logo->move('public/admin/assets/logo/project', $imageName);
                $fileName[] = $imageName;
            }
        }
        $logo = json_encode($fileName);

        if ($image = $req->file('project_doc_file')) {
            $destinationPath = 'public/admin/assets/project';
            $profileImage = rand() . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $add_project['project_doc_file'] = "$profileImage";
        }

        $add_project->project_title = $req->project_title;
        $add_project->user_id = Auth::user()->id;
        $add_project->business_name = $req->business_name;
        $add_project->client_name = $req->client_name;
        $add_project->website_url = $req->website_url;
        $add_project->logo = $logo;
        $add_project->description = $req->description;
        $add_project->status = 1;

        if ($add_project->save()) {
            $req->session()->flash('success', 'Project Added Successfully.');
            return redirect()->route('project');
        } else {
            $req->session()->flash('error', 'Something Went Wrong, Please Try Again.');
            return redirect()->back();
        }
    }

    //EDIT PROJECT
    public function edit_project($id)
    {
        $edit_project = Project::find($id);
        return view('admin.project.project.edit', compact('edit_project'));
    }

    //UPDATE PROJECT
    public function edit_project_action(Request $req)
    {
        $req->validate([
            'project_title' => 'required',
            'business_name' => 'required',
            'client_name' => 'required',
            'description' => 'required',

        ]);
        $fileName = [];
        if ($req->file('logo')) {
            foreach ($req->file('logo') as $logo) {
                $imageName = rand() . "." . $logo->getClientOriginalExtension();
                $logo->move('public/admin/assets/logo/project', $imageName);
                $fileName[] = $imageName;
            }
        }
        $logo = json_encode($fileName);

        $update_project = Project::find($req->id);
        $update_project->project_title = $req->project_title;
        $update_project->user_id = Auth::user()->id;
        $update_project->business_name = $req->business_name;
        $update_project->client_name = $req->client_name;
        $update_project->website_url = $req->website_url;
        $update_project->logo = $logo;
        $update_project->description = $req->description;
        $update_project->status = 1;

        if ($image = $req->file('project_doc_file')) {
            $destinationPath = 'public/admin/assets/project';
            $profileImage = rand() . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $update_project['project_doc_file'] = "$profileImage";
        }

        if ($update_project->save()) {
            $req->session()->flash('success', 'Project Updated Successfully.');
            return redirect()->route('project');
        } else {
            $req->session()->flash('error', 'Something Went Wrong, Please Try Again.');
            return redirect()->back();
        }
    }

    //DELETE PROJECT
    public function delete_project(Request $req, $id)
    {
        Project::destroy($id);
        $req->session()->flash('success', 'Project Deleted Successfully.');
        return redirect()->route('project');
    }

    //PROJECT STATUS UPDATE
    public function edit_project_status(Request $req, $id)
    {
        //get post status with the help of post id

        $data = DB::table('projects')->select('status')->where('id', '=', $id)->first();

        //check post status

        if ($data->status == '1') {
            $status = '0';
        } else {
            $status = '1';
        }

        //update post status

        $data = array('status' => $status);
        DB::table('projects')->where('id', $id)->update($data);
        $req->session()->flash('success', 'Status has been updated successfully.');
        return redirect()->route('project');
    }

    //VIEW PROJECT DETAILS
    public function view_project($id)
    {
        $get_project = Project::where('id', $id)->first();
        $get_project_type = ProjectType::latest()->get();
        // $task_details = ProjectTask::select('project_tasks.*', 'projects.id as projectId', 'project_types.id as projectTypeId')->leftjoin('projects', 'projects.id','=', 'project_tasks.project_id')->leftjoin('project_types', 'project_types.id', '=', 'project_tasks.project_types_id')->get();
        //dd($task_details);
        return view('admin.project.project.view', compact('get_project', 'get_project_type'));
    }

    //GET ALL CATEGORY 
    public function project_category()
    {
        $category = ProjectType::latest()->get();
        return view('admin.project.category.index', compact('category'));
    }

    public function add_category()
    {
        return view('admin.project.category.add');
    }

    //ADD CATEGORY
    public function add_category_action(Request $req)
    {
        $req->validate([
            'project_type' => 'required',
        ]);

        $add_category = new ProjectType();
        $add_category->project_type = $req->project_type;

        if ($add_category->save()) {
            $req->session()->flash('success', 'Category Added Successfully.');
            return redirect()->route('project_category');
        } else {
            $req->session()->flash('error', 'Something Went Wrong, Please Try Again.');
            return redirect()->back();
        }
    }

    //EDIT CATEGORY
    public function edit_category($id)
    {
        $edit_category = ProjectType::find($id);
        return view('admin.project.category.edit', compact('edit_category'));
    }

    //UPDATE CATEGORY
    public function edit_category_action(Request $req)
    {
        $update_category = ProjectType::find($req->id);
        $update_category->project_type = $req->project_type;

        if ($update_category->save()) {
            $req->session()->flash('success', 'Category Updated Successfully.');
            return redirect()->route('project_category');
        } else {
            $req->session()->flash('error', 'Something Went Wrong, Please Try Again.');
            return redirect()->back();
        }
    }

    //DELETE CATEGORY
    public function delete_category(Request $req, $id)
    {
        ProjectType::destroy($id);
        $req->session()->flash('success', 'Category Deleted Successfully.');
        return redirect()->route('project_category');
    }

}
