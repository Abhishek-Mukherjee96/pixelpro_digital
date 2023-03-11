<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Client;
use App\Models\Project;
use App\Models\ProjectCategroy;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
     //LOAD PROJECT PAGE
     public function project(){
        $project = Project::leftjoin('project_categroys', 'project_categroys.id', '=', 'projects.project_cat_id')->paginate(10); 
        $client = Client::latest()->get();

        return view('frontend.project',compact('project','client'));
    }

    public function project_id($id){
        $projects = Project::where('project_cat_id', $id)->get();
        $project_cat = ProjectCategroy::where('id', $id)->first();
        $client = Client::latest()->get();

        //dd($project_cat);
        return view('frontend.project_category',compact('projects','project_cat','client'));
    }
}
