<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    //LOAD BLOG PAGE
    public function blogs(Request $req){
        $slug = $req->slug;
        $blog = Blog::where('status', '=', 1)->where('slug', $slug)->latest()->first();
        $blogs = Blog::where('status', '=', 1)->get();
        return view('frontend.blogs', compact('blog', 'blogs'));
    }
}
