<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\AboutUs;
use App\Models\Banner;
use App\Models\Blog;
use App\Models\Client;
use App\Models\Counter;
use App\Models\Project;
use App\Models\ProjectCategroy;
use App\Models\Team;
use App\Models\Testimonial;
use App\Models\WhatWeOffer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    //LOAD INDEX PAGE
    public function index()
    {
        $banner = Banner::first();
        $about = AboutUs::first();
        $service = WhatWeOffer::where('status', '=', 1)->latest()->get();
        $project = Project::leftjoin('project_categroys', 'project_categroys.id', '=', 'projects.project_cat_id')->get();
        $counter = Counter::where('status', '=', 1)->get();
        $team = Team::latest()->get();
        $testimonial = Testimonial::latest()->get();
        $client = Client::latest()->get();
        $blog = Blog::latest()->get();

        return view('frontend.index', compact('banner', 'about', 'service', 'project', 'counter', 'team', 'testimonial','client','blog'));
    }

    //SERVICE DETAILS
    public function service_details(Request $req)
    {
        $slug = $req->slug;
        $service = WhatWeOffer::where('status', '=', 1)->where('slug', $slug)->latest()->first();
        $services = WhatWeOffer::where('status', '=', 1)->get();
        //dd($services);
        return view('frontend.service_details', compact('service', 'services'));
    }

    //BLOG DETAILS
    public function blog_details(Request $req)
    {
        $slug = $req->slug;
        $blog = Blog::where('status', '=', 1)->where('slug', $slug)->latest()->first();
        $blogs = Blog::where('status', '=', 1)->get();

        return view('frontend.blog_details',compact('blog','blogs'));
    }
}
