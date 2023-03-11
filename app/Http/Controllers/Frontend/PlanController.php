<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Client;
use App\Models\Plan;
use Illuminate\Http\Request;

class PlanController extends Controller
{
    //LOAD PLANS PAGE
    public function plans(){
        $plan = Plan::latest()->where('status',1)->get();
        $client = Client::latest()->get();

        return view('frontend.plans', compact('plan','client'));
        
    }

    //PLANS DETAILS
    public function plan_details(Request $req)
    {
        $slug = $req->slug;
        $plan = Plan::where('status', '=', 1)->where('slug', $slug)->latest()->first();
        $plans = Plan::where('status', '=', 1)->get();
        $client = Client::latest()->get();

        return view('frontend.plan_details', compact('plans', 'plan', 'client'));
    }
}
