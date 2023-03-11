<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\FAQ;
use Illuminate\Http\Request;

class FAQController extends Controller
{
    //LOAD FAQ PAGE
    public function faq(){
        $faq = FAQ::where('status','=',1)->get();
        return view('frontend.faq',compact('faq'));
    }
}
