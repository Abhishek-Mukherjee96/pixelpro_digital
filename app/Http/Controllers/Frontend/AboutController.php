<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\AboutUs;
use App\Models\Client;
use App\Models\Counter;
use App\Models\Team;
use App\Models\Testimonial;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    //LOAD ABOUT PAGE
    public function about_us(){
        $about = AboutUs::first();
        $testimonial = Testimonial::latest()->get();
        $counter = Counter::where('status', '=', 1)->get();
        $team = Team::latest()->get();
        $client = Client::latest()->get();

        return view('frontend.about', compact('about','testimonial','counter','team','client'));
    }
}
