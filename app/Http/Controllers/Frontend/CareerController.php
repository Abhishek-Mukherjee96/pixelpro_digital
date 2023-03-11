<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CareerController extends Controller
{
    //LOAD CAREER PAGE
    public function careers(){
        return view('frontend.careers');
    }
}
