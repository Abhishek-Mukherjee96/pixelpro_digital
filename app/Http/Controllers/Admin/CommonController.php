<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AboutUs;
use App\Models\Banner;
use App\Models\Career;
use App\Models\CareerTab;
use App\Models\Counter;
use App\Models\FAQ;
use App\Models\Blog;
use App\Models\Gallery;
use App\Models\GalleryTab;
use App\Models\Plan;
use App\Models\Project;
use App\Models\ProjectCategroy;
use App\Models\Team;
use App\Models\Testimonial;
use App\Models\WhatWeOffer;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class CommonController extends Controller
{
   //LIST BANNER
   public function banner()
   {
      $banner = Banner::latest()->get();
      return view('admin.homepage.banner.index', compact('banner'));
   }

   //ADD BANNER FORM
   public function add_banner()
   {
      return view('admin.homepage.banner.add');
   }

   //ADD BANNER
   public function add_banner_action(Request $req)
   {
      $req->validate([
         'image' => 'required',
         'button_url' => 'required',
         'heading' => 'required',
         'description' => 'required',
      ]);

      $add_banner = new Banner();

      if ($image = $req->file('image')) {
         $destinationPath = 'public/admin/assets/banner';
         $profileImage = rand() . "." . $image->getClientOriginalExtension();
         $image->move($destinationPath, $profileImage);
         $add_banner['image'] = "$profileImage";
      }

      $add_banner->heading = $req->heading;
      $add_banner->description = $req->description;
      $add_banner->button_url = $req->button_url;
      $add_banner->status = 1;

      if ($add_banner->save()) {
         $req->session()->flash('success', 'Banner Added Successfully.');
         return redirect()->route('banner');
      } else {
         $req->session()->flash('error', 'Something Went Wrong, Please Try Again.');
         return redirect()->back();
      }
   }

   //EDIT BANNER
   public function edit_banner($id)
   {
      $edit_banner = Banner::find($id);
      return view('admin.homepage.banner.edit', compact('edit_banner'));
   }

   //UPDATE BANNER
   public function edit_banner_action(Request $req)
   {
      $update_banner = Banner::find($req->id);
      $update_banner->heading = $req->heading;
      $update_banner->description = $req->description;
      $update_banner->button_url = $req->button_url;
      $update_banner->status = 1;

      if ($image = $req->file('image')) {
         $destinationPath = 'public/admin/assets/banner';
         $profileImage = rand() . "." . $image->getClientOriginalExtension();
         $image->move($destinationPath, $profileImage);
         $update_banner['image'] = "$profileImage";
      }

      if ($update_banner->save()) {
         $req->session()->flash('success', 'Banner Updated Successfully.');
         return redirect()->route('banner');
      } else {
         $req->session()->flash('error', 'Something Went Wrong, Please Try Again.');
         return redirect()->back();
      }
   }

   //DELETE BANNER
   public function delete_banner(Request $req, $id)
   {
      Banner::destroy($id);
      $req->session()->flash('success', 'Banner Deleted Successfully.');
      return redirect()->route('banner');
   }

   //UPDATE BANNER STATUS
   public function edit_banner_status(Request $req, $id)
   {
      //get post status with the help of post id

      $data = DB::table('banners')->select('status')->where('id', '=', $id)->first();

      //check post status

      if (
         $data->status == '1'
      ) {
         $status = '0';
      } else {
         $status = '1';
      }

      //update post status

      $data = array('status' => $status);
      DB::table('banners')->where('id', $id)->update($data);
      $req->session()->flash('success', 'Status has been updated successfully.');
      return redirect()->route('banner');
   }

   //LIST ABOUT
   public function about()
   {
      $about = AboutUs::latest()->get();
      return view('admin.homepage.about.index', compact('about'));
   }

   //EDIT ABOUT
   public function edit_about($id)
   {
      $edit_about = AboutUs::find($id);
      return view('admin.homepage.about.edit', compact('edit_about'));
   }

   //UPDATE ABOUT
   public function edit_about_action(Request $req)
   {
      $update_about = AboutUs::find($req->id);
      $update_about->heading = $req->heading;
      $update_about->description = $req->description;
      $update_about->button_url = $req->button_url;
      $update_about->subhead_one = $req->subhead_one;
      $update_about->subhead_two = $req->subhead_two;
      $update_about->subhead_three = $req->subhead_three;
      $update_about->years_of_exp = $req->years_of_exp;
      $update_about->status = 1;

      if ($image = $req->file('img_one')) {
         $destinationPath = 'public/admin/assets/about';
         $profileImage = rand() . "." . $image->getClientOriginalExtension();
         $image->move($destinationPath, $profileImage);
         $update_about['img_one'] = "$profileImage";
      }

      if ($image = $req->file('img_two')) {
         $destinationPath = 'public/admin/assets/about';
         $profileImage = rand() . "." . $image->getClientOriginalExtension();
         $image->move($destinationPath, $profileImage);
         $update_about['img_two'] = "$profileImage";
      }

      if ($image = $req->file('img_three')) {
         $destinationPath = 'public/admin/assets/about';
         $profileImage = rand() . "." . $image->getClientOriginalExtension();
         $image->move($destinationPath, $profileImage);
         $update_about['img_three'] = "$profileImage";
      }

      if ($update_about->save()) {
         $req->session()->flash('success', 'Data Updated Successfully.');
         return redirect()->route('about');
      } else {
         $req->session()->flash('error', 'Something Went Wrong, Please Try Again.');
         return redirect()->back();
      }
   }

   //UPDATE ABOUT STATUS
   public function edit_about_status(Request $req, $id)
   {
      //get post status with the help of post id

      $data = DB::table('about_us')->select('status')->where('id', '=', $id)->first();

      //check post status

      if (
         $data->status == '1'
      ) {
         $status = '0';
      } else {
         $status = '1';
      }

      //update post status

      $data = array('status' => $status);
      DB::table('about_us')->where('id', $id)->update($data);
      $req->session()->flash('success', 'Status has been updated successfully.');
      return redirect()->route('about');
   }

   //LIST WHAT WE OFFER
   public function what_we_offer()
   {
      $what_we_offer = WhatWeOffer::latest()->get();
      return view('admin.homepage.what_we_offer.index', compact('what_we_offer'));
   }

   //ADD WHAT WE OFFER FORM
   public function add_what_we_offer()
   {
      return view('admin.homepage.what_we_offer.add');
   }

   //ADD WHAT WE OFFER
   public function add_what_we_offer_action(Request $req)
   {
      $req->validate([
         'title' => 'required',
         'slug' => 'required|unique:what_we_offers,slug',
         'image' => 'required',
         'icon' => 'required',
         'sub_desc' => 'required',
      ]);

      $add_what_we_offer = new WhatWeOffer();

      if ($image = $req->file('image')) {
         $destinationPath = 'public/admin/assets/service';
         $profileImage = rand() . "." . $image->getClientOriginalExtension();
         $image->move($destinationPath, $profileImage);
         $add_what_we_offer['image'] = "$profileImage";
      }
      if ($image = $req->file('icon')) {
         $destinationPath = 'public/admin/assets/service';
         $profileImage = rand() . "." . $image->getClientOriginalExtension();
         $image->move($destinationPath, $profileImage);
         $add_what_we_offer['icon'] = "$profileImage";
      }
      if ($image = $req->file('img_details')) {
         $destinationPath = 'public/admin/assets/service';
         $profileImage = rand() . "." . $image->getClientOriginalExtension();
         $image->move($destinationPath, $profileImage);
         $add_what_we_offer['img_details'] = "$profileImage";
      }

      $add_what_we_offer->title = $req->title;
      $add_what_we_offer->slug = $req->slug;
      $add_what_we_offer->sub_desc = $req->sub_desc;
      $add_what_we_offer->heading = $req->heading;
      $add_what_we_offer->description = $req->description;
      $add_what_we_offer->status = 1;

      if ($add_what_we_offer->save()) {
         $req->session()->flash('success', 'Data Added Successfully.');
         return redirect()->route('what_we_offer');
      } else {
         $req->session()->flash('error', 'Something Went Wrong, Please Try Again.');
         return redirect()->back();
      }
   }

   //EDIT BANNER
   public function edit_what_we_offer($id)
   {
      $edit_what_we_offer = WhatWeOffer::find($id);
      return view('admin.homepage.what_we_offer.edit', compact('edit_what_we_offer'));
   }

   //UPDATE BANNER
   public function edit_what_we_offer_action(Request $req)
   {
      $update_what_we_offer = WhatWeOffer::find($req->id);
      $update_what_we_offer->title = $req->title;
      $update_what_we_offer->slug = $req->slug;
      $update_what_we_offer->sub_desc = $req->sub_desc;
      $update_what_we_offer->heading = $req->heading;
      $update_what_we_offer->description = $req->description;
      $update_what_we_offer->status = 1;

      if ($image = $req->file('image')) {
         $destinationPath = 'public/admin/assets/service';
         $profileImage = rand() . "." . $image->getClientOriginalExtension();
         $image->move($destinationPath, $profileImage);
         $update_what_we_offer['image'] = "$profileImage";
      }
      if ($image = $req->file('icon')) {
         $destinationPath = 'public/admin/assets/service';
         $profileImage = rand() . "." . $image->getClientOriginalExtension();
         $image->move($destinationPath, $profileImage);
         $update_what_we_offer['icon'] = "$profileImage";
      }
      if ($image = $req->file('img_details')) {
         $destinationPath = 'public/admin/assets/service';
         $profileImage = rand() . "." . $image->getClientOriginalExtension();
         $image->move($destinationPath, $profileImage);
         $update_what_we_offer['img_details'] = "$profileImage";
      }

      if ($update_what_we_offer->save()) {
         $req->session()->flash('success', 'Data Updated Successfully.');
         return redirect()->route('what_we_offer');
      } else {
         $req->session()->flash('error', 'Something Went Wrong, Please Try Again.');
         return redirect()->back();
      }
   }

   //DELETE BANNER
   public function delete_what_we_offer(Request $req, $id)
   {
      WhatWeOffer::destroy($id);
      $req->session()->flash('success', 'Data Deleted Successfully.');
      return redirect()->route('what_we_offer');
   }

   //UPDATE BANNER STATUS
   public function edit_what_we_offer_status(Request $req, $id)
   {
      //get post status with the help of post id

      $data = DB::table('what_we_offers')->select('status')->where('id', '=', $id)->first();

      //check post status

      if (
         $data->status == '1'
      ) {
         $status = '0';
      } else {
         $status = '1';
      }

      //update post status

      $data = array('status' => $status);
      DB::table('what_we_offers')->where('id', $id)->update($data);
      $req->session()->flash('success', 'Status has been updated successfully.');
      return redirect()->route('what_we_offer');
   }

   //LIST PROJECT CATEGORY
   public function project_category()
   {
      $category = ProjectCategroy::latest()->get();
      return view('admin.homepage.project.category.index', compact('category'));
   }

   //ADD PROJECT CATEGORY FORM
   public function add_category()
   {
      return view('admin.homepage.project.category.add');
   }

   //ADD PROJECT CATEGORY
   public function add_category_action(Request $req)
   {
      $req->validate([
         'name' => 'required',
      ]);

      $add_category = new ProjectCategroy();

      $add_category->name = $req->name;
      $add_category->status = 1;

      if ($add_category->save()) {
         $req->session()->flash('success', 'Data Added Successfully.');
         return redirect()->route('project_category');
      } else {
         $req->session()->flash('error', 'Something Went Wrong, Please Try Again.');
         return redirect()->back();
      }
   }

   //EDIT PROJECT CATEGORY
   public function edit_category($id)
   {
      $edit_category = ProjectCategroy::find($id);
      return view('admin.homepage.project.category.edit', compact('edit_category'));
   }

   //UPDATE PROJECT CATEGORY
   public function edit_category_action(Request $req)
   {
      $update_category = ProjectCategroy::find($req->id);
      $update_category->name = $req->name;
      $update_category->status = 1;

      if ($update_category->save()) {
         $req->session()->flash('success', 'Data Updated Successfully.');
         return redirect()->route('project_category');
      } else {
         $req->session()->flash('error', 'Something Went Wrong, Please Try Again.');
         return redirect()->back();
      }
   }

   //DELETE PROJECT CATEGORY
   public function delete_category(Request $req, $id)
   {
      ProjectCategroy::destroy($id);
      $req->session()->flash('success', 'Data Deleted Successfully.');
      return redirect()->route('project_category');
   }

   //UPDATE PROJECT CATEGORY STATUS
   public function edit_category_status(Request $req, $id)
   {
      //get post status with the help of post id

      $data = DB::table('project_categroys')->select('status')->where('id', '=', $id)->first();

      //check post status

      if (
         $data->status == '1'
      ) {
         $status = '0';
      } else {
         $status = '1';
      }

      //update post status

      $data = array('status' => $status);
      DB::table('project_categroys')->where('id', $id)->update($data);
      $req->session()->flash('success', 'Status has been updated successfully.');
      return redirect()->route('project_category');
   }

   //LIST PROJECT
   public function project_list()
   {
      $project = Project::leftjoin('project_categroys', 'project_categroys.id', '=', 'projects.project_cat_id')->get();
      return view('admin.homepage.project.projects.index', compact('project'));
   }

   //ADD PROJECT FORM
   public function add_project()
   {
      $cat_id = ProjectCategroy::latest()->get();
      return view('admin.homepage.project.projects.add', compact('cat_id'));
   }

   //ADD PROJECT
   public function add_project_action(Request $req)
   {
      $req->validate([
         'project_title' => 'required',
         'project_cat_id' => 'required',
         'image' => 'required'
      ]);

      $add_project = new Project();

      if ($image = $req->file('image')) {
         $destinationPath = 'public/admin/assets/project';
         $profileImage = rand() . "." . $image->getClientOriginalExtension();
         $image->move($destinationPath, $profileImage);
         $add_project['image'] = "$profileImage";
      }

      $add_project->project_title = $req->project_title;
      $add_project->project_cat_id = $req->project_cat_id;
      $add_project->project_type = $req->project_type;
      $add_project->status = 1;

      if ($add_project->save()) {
         $req->session()->flash('success', 'Data Added Successfully.');
         return redirect()->route('project_list');
      } else {
         $req->session()->flash('error', 'Something Went Wrong, Please Try Again.');
         return redirect()->back();
      }
   }

   //EDIT PROJECT
   public function edit_project($id)
   {
      $edit_project = Project::find($id);
      $cat_id = ProjectCategroy::latest()->get();
      return view('admin.homepage.project.projects.edit', compact('edit_project', 'cat_id'));
   }

   //UPDATE PROJECT
   public function edit_project_action(Request $req)
   {
      $update_project = Project::find($req->id);
      $update_project->project_title = $req->project_title;
      $update_project->project_cat_id = $req->project_cat_id;
      $update_project->project_type = $req->project_type;
      $update_project->status = 1;

      if ($image = $req->file('image')) {
         $destinationPath = 'public/admin/assets/project';
         $profileImage = rand() . "." . $image->getClientOriginalExtension();
         $image->move($destinationPath, $profileImage);
         $update_project['image'] = "$profileImage";
      }

      if ($update_project->save()) {
         $req->session()->flash('success', 'Data Updated Successfully.');
         return redirect()->route('project_list');
      } else {
         $req->session()->flash('error', 'Something Went Wrong, Please Try Again.');
         return redirect()->back();
      }
   }

   //DELETE PROJECT
   public function delete_project(Request $req, $id)
   {
      Project::destroy($id);
      $req->session()->flash('success', 'Data Deleted Successfully.');
      return redirect()->route('project_list');
   }

   //UPDATE PROJECT STATUS
   public function edit_project_status(Request $req, $id)
   {
      //get post status with the help of post id

      $data = DB::table('project_categroys')->select('status')->where('id', '=', $id)->first();

      //check post status

      if (
         $data->status == '1'
      ) {
         $status = '0';
      } else {
         $status = '1';
      }

      //update post status

      $data = array('status' => $status);
      DB::table('project_categroys')->where('id', $id)->update($data);
      $req->session()->flash('success', 'Status has been updated successfully.');
      return redirect()->route('project_list');
   }

   //COMPANY ACTIVITIES
   public function counter()
   {
      $counter = Counter::get();
      return view('admin.homepage.counter.index', compact('counter'));
   }

   //EDIT COMPANY ACTIVITIES
   public function edit_counter($id)
   {
      $edit_counter = Counter::find($id);
      return view('admin.homepage.counter.edit', compact('edit_counter'));
   }

   //UPDATE COMPANY ACTIVITIES
   public function edit_counter_action(Request $req)
   {
      $update_counter = Counter::find($req->id);
      $update_counter->heading = $req->heading;
      $update_counter->count_no = $req->count_no;
      $update_counter->status = 1;

      if ($update_counter->save()) {
         $req->session()->flash('success', 'Data Updated Successfully.');
         return redirect()->route('counter');
      } else {
         $req->session()->flash('error', 'Something Went Wrong, Please Try Again.');
         return redirect()->back();
      }
   }

   //UPDATE COMPANY ACTIVITIES STATUS
   public function edit_counter_status(Request $req, $id)
   {
      //get post status with the help of post id

      $data = DB::table('counters')->select('status')->where('id', '=', $id)->first();

      //check post status

      if (
         $data->status == '1'
      ) {
         $status = '0';
      } else {
         $status = '1';
      }

      //update post status

      $data = array('status' => $status);
      DB::table('counters')->where('id', $id)->update($data);
      $req->session()->flash('success', 'Status has been updated successfully.');
      return redirect()->route('counter');
   }

   //LIST TEAM
   public function team()
   {
      $team = Team::latest()->get();
      return view('admin.homepage.team.index', compact('team'));
   }

   //ADD TEAM FORM
   public function add_team()
   {
      return view('admin.homepage.team.add');
   }

   //ADD TEAM
   public function add_team_action(Request $req)
   {
      $req->validate([
         'name' => 'required',
      ]);

      $add_team = new Team();

      if ($image = $req->file('image')) {
         $destinationPath = 'public/admin/assets/team';
         $profileImage = rand() . "." . $image->getClientOriginalExtension();
         $image->move($destinationPath, $profileImage);
         $add_team['image'] = "$profileImage";
      }

      $add_team->name = $req->name;
      $add_team->designation = $req->designation;
      $add_team->fb_link = $req->fb_link;
      $add_team->instagram_link = $req->instagram_link;
      $add_team->twitter_link = $req->twitter_link;
      $add_team->status = 1;

      if ($add_team->save()) {
         $req->session()->flash('success', 'Data Added Successfully.');
         return redirect()->route('team');
      } else {
         $req->session()->flash('error', 'Something Went Wrong, Please Try Again.');
         return redirect()->back();
      }
   }

   //EDIT TEAM
   public function edit_team($id)
   {
      $edit_team = Team::find($id);
      return view('admin.homepage.team.edit', compact('edit_team'));
   }

   //UPDATE TEAM
   public function edit_team_action(Request $req)
   {
      $update_team = Team::find($req->id);
      $update_team->name = $req->name;
      $update_team->designation = $req->designation;
      $update_team->fb_link = $req->fb_link;
      $update_team->instagram_link = $req->instagram_link;
      $update_team->twitter_link = $req->twitter_link;
      $update_team->status = 1;

      if ($image = $req->file('image')) {
         $destinationPath = 'public/admin/assets/team';
         $profileImage = rand() . "." . $image->getClientOriginalExtension();
         $image->move($destinationPath, $profileImage);
         $update_team['image'] = "$profileImage";
      }

      if ($update_team->save()) {
         $req->session()->flash('success', 'Data Updated Successfully.');
         return redirect()->route('team');
      } else {
         $req->session()->flash('error', 'Something Went Wrong, Please Try Again.');
         return redirect()->back();
      }
   }

   //DELETE TEAM
   public function delete_team(Request $req, $id)
   {
      Team::destroy($id);
      $req->session()->flash('success', 'Data Deleted Successfully.');
      return redirect()->route('team');
   }

   //UPDATE TEAM STATUS
   public function edit_team_status(Request $req, $id)
   {
      //get post status with the help of post id

      $data = DB::table('teams')->select('status')->where('id', '=', $id)->first();

      //check post status

      if (
         $data->status == '1'
      ) {
         $status = '0';
      } else {
         $status = '1';
      }

      //update post status

      $data = array('status' => $status);
      DB::table('teams')->where('id', $id)->update($data);
      $req->session()->flash('success', 'Status has been updated successfully.');
      return redirect()->route('team');
   }

   //LIST TESTIMONIAL
   public function testimonial()
   {
      $testimonial = Testimonial::latest()->get();
      return view('admin.homepage.testimonial.index', compact('testimonial'));
   }

   //ADD TESTIMONIAL FORM
   public function add_testimonial()
   {
      return view('admin.homepage.testimonial.add');
   }

   //ADD TESTIMONIAL
   public function add_testimonial_action(Request $req)
   {
      $req->validate([
         'name' => 'required',
      ]);

      $add_testimonial = new Testimonial();

      if ($image = $req->file('image')) {
         $destinationPath = 'public/admin/assets/testimonial';
         $profileImage = rand() . "." . $image->getClientOriginalExtension();
         $image->move($destinationPath, $profileImage);
         $add_testimonial['image'] = "$profileImage";
      }

      $add_testimonial->name = $req->name;
      $add_testimonial->designation = $req->designation;
      $add_testimonial->description = $req->description;
      $add_testimonial->status = 1;

      if ($add_testimonial->save()) {
         $req->session()->flash('success', 'Data Added Successfully.');
         return redirect()->route('testimonial');
      } else {
         $req->session()->flash('error', 'Something Went Wrong, Please Try Again.');
         return redirect()->back();
      }
   }

   //EDIT TESTIMONIAL
   public function edit_testimonial($id)
   {
      $edit_testimonial = Testimonial::find($id);
      return view('admin.homepage.testimonial.edit', compact('edit_testimonial'));
   }

   //UPDATE TESTIMONIAL
   public function edit_testimonial_action(Request $req)
   {
      $update_testimonial = Testimonial::find($req->id);
      $update_testimonial->name = $req->name;
      $update_testimonial->designation = $req->designation;
      $update_testimonial->description = $req->description;
      $update_testimonial->status = 1;

      if ($image = $req->file('image')) {
         $destinationPath = 'public/admin/assets/testimonial';
         $profileImage = rand() . "." . $image->getClientOriginalExtension();
         $image->move($destinationPath, $profileImage);
         $update_testimonial['image'] = "$profileImage";
      }

      if ($update_testimonial->save()) {
         $req->session()->flash('success', 'Data Updated Successfully.');
         return redirect()->route('testimonial');
      } else {
         $req->session()->flash('error', 'Something Went Wrong, Please Try Again.');
         return redirect()->back();
      }
   }

   //DELETE TESTIMONIAL
   public function delete_testimonial(Request $req, $id)
   {
      Testimonial::destroy($id);
      $req->session()->flash('success', 'Data Deleted Successfully.');
      return redirect()->route('testimonial');
   }

   //UPDATE TESTIMONIAL STATUS
   public function edit_testimonial_status(Request $req, $id)
   {
      //get post status with the help of post id

      $data = DB::table('testimonials')->select('status')->where('id', '=', $id)->first();

      //check post status

      if (
         $data->status == '1'
      ) {
         $status = '0';
      } else {
         $status = '1';
      }

      //update post status

      $data = array('status' => $status);
      DB::table('testimonials')->where('id', $id)->update($data);
      $req->session()->flash('success', 'Status has been updated successfully.');
      return redirect()->route('testimonial');
   }

   //LIST PLAN
   public function plan()
   {
      $plan = Plan::latest()->get();
      return view('admin.homepage.plan.index', compact('plan'));
   }

   //ADD PLAN FORM
   public function add_plan()
   {
      return view('admin.homepage.plan.add');
   }

   //ADD PLAN
   public function add_plan_action(Request $req)
   {
      $req->validate([
         'name' => 'required',
         'slug' => 'required|unique:plans,slug',
         'image' => 'required',
         'short_desc' => 'required',

      ]);

      $add_plan = new Plan();

      if ($image = $req->file('image')) {
         $destinationPath = 'public/admin/assets/plan';
         $profileImage = rand() . "." . $image->getClientOriginalExtension();
         $image->move($destinationPath, $profileImage);
         $add_plan['image'] = "$profileImage";
      }

      $add_plan->name = $req->name;
      $add_plan->slug = $req->slug;
      $add_plan->short_desc = $req->short_desc;
      $add_plan->description = $req->description;
      $add_plan->status = 1;

      if ($add_plan->save()) {
         $req->session()->flash('success', 'Data Added Successfully.');
         return redirect()->route('plan');
      } else {
         $req->session()->flash('error', 'Something Went Wrong, Please Try Again.');
         return redirect()->back();
      }
   }

   //EDIT PLAN
   public function edit_plan($id)
   {
      $edit_plan = Plan::find($id);
      return view('admin.homepage.plan.edit', compact('edit_plan'));
   }

   //UPDATE PLAN
   public function edit_plan_action(Request $req)
   {
      $update_plan = plan::find($req->id);
      $update_plan->name = $req->name;
      $update_plan->slug = $req->slug;
      $update_plan->short_desc = $req->short_desc;
      $update_plan->description = $req->description;
      $update_plan->status = 1;

      if ($image = $req->file('image')) {
         $destinationPath = 'public/admin/assets/plan';
         $profileImage = rand() . "." . $image->getClientOriginalExtension();
         $image->move($destinationPath, $profileImage);
         $update_plan['image'] = "$profileImage";
      }

      if ($update_plan->save()) {
         $req->session()->flash('success', 'Data Updated Successfully.');
         return redirect()->route('plan');
      } else {
         $req->session()->flash('error', 'Something Went Wrong, Please Try Again.');
         return redirect()->back();
      }
   }

   //DELETE PLAN
   public function delete_plan(Request $req, $id)
   {
      Plan::destroy($id);
      $req->session()->flash('success', 'Data Deleted Successfully.');
      return redirect()->route('plan');
   }

   //UPDATE PLAN STATUS
   public function edit_plan_status(Request $req, $id)
   {
      //get post status with the help of post id

      $data = DB::table('plans')->select('status')->where('id', '=', $id)->first();

      //check post status

      if (
         $data->status == '1'
      ) {
         $status = '0';
      } else {
         $status = '1';
      }

      //update post status

      $data = array('status' => $status);
      DB::table('plans')->where('id', $id)->update($data);
      $req->session()->flash('success', 'Status has been updated successfully.');
      return redirect()->route('plan');
   }

   //LIST FAQ
   public function faq_list()
   {
      $faq = FAQ::latest()->get();
      return view('admin.homepage.faq.index', compact('faq'));
   }

   //ADD FAQ FORM
   public function add_faq()
   {
      return view('admin.homepage.faq.add');
   }

   //ADD FAQ
   public function add_faq_action(Request $req)
   {
      $req->validate([
         'title' => 'required',
         'description' => 'required',

      ]);

      $add_faq = new FAQ();

      $add_faq->title = $req->title;
      $add_faq->description = $req->description;
      $add_faq->status = 1;

      if ($add_faq->save()) {
         $req->session()->flash('success', 'Data Added Successfully.');
         return redirect()->route('faq_list');
      } else {
         $req->session()->flash('error', 'Something Went Wrong, Please Try Again.');
         return redirect()->back();
      }
   }

   //EDIT FAQ
   public function edit_faq($id)
   {
      $edit_faq = FAQ::find($id);
      return view('admin.homepage.faq.edit', compact('edit_faq'));
   }

   //UPDATE FAQ
   public function edit_faq_action(Request $req)
   {
      $update_faq = FAQ::find($req->id);
      $update_faq->title = $req->title;
      $update_faq->description = $req->description;
      $update_faq->status = 1;

      if ($update_faq->save()) {
         $req->session()->flash('success', 'Data Updated Successfully.');
         return redirect()->route('faq_list');
      } else {
         $req->session()->flash('error', 'Something Went Wrong, Please Try Again.');
         return redirect()->back();
      }
   }

   //DELETE FAQ
   public function delete_faq(Request $req, $id)
   {
      FAQ::destroy($id);
      $req->session()->flash('success', 'Data Deleted Successfully.');
      return redirect()->route('faq_list');
   }

   //UPDATE FAQ STATUS
   public function edit_faq_status(Request $req, $id)
   {
      //get post status with the help of post id

      $data = DB::table('f_a_q_s')->select('status')->where('id', '=', $id)->first();

      //check post status

      if (
         $data->status == '1'
      ) {
         $status = '0';
      } else {
         $status = '1';
      }

      //update post status

      $data = array('status' => $status);
      DB::table('f_a_q_s')->where('id', $id)->update($data);
      $req->session()->flash('success', 'Status has been updated successfully.');
      return redirect()->route('faq_list');
   }

   //CAREER
   public function career()
   {
      $career = Career::all();
      return view('admin.homepage.career.index', compact('career'));
   }
   //ADD CAREER FORM
   public function add_career()
   {
      $add_career = Career::all();
      $career_tab = CareerTab::latest()->get();
      return view('admin.homepage.career.add', compact('add_career','career_tab'));
   }

   //ADD CAREER
   public function add_career_action(Request $req)
   {
      $req->validate([
         'image' => 'required|mimes:png,jpeg,jpg,svg',
         'title' => 'required',
         'description' => 'required',
         'location' => 'required',
         'job_type' => 'required',
      ]);

      $career = new Career();

      if ($image = $req->file('image')) {
         $destinationPath = 'public/admin/assets/career';
         $profileImage = rand() . "." . $image->getClientOriginalExtension();
         $image->move($destinationPath, $profileImage);
         $career['image'] = "$profileImage";
      }

      $career->title = $req->title;
      $career->description = $req->description;
      $career->tab_name = $req->tab_name;
      $career->location = $req->location;
      $career->job_type = $req->job_type;
      $career->status = 1;

      if ($career->save()) {
         $req->session()->flash('success', 'career Added Successfully.');
         return redirect()->route('career');
      } else {
         return back()->withErrors(['danger' => 'Unable to added, Try Again Later.']);
      }
   }

   //EDIT CAREER

   public function edit_career($id)
   {
      $career = Career::find($id);
      $career_tab = CareerTab::latest()->get();
      return view('admin.homepage.career.edit', compact('career','career_tab'));
   }

   //UPDATE CAREER

   public function update_career(Request $req)
   {

      $career = Career::find($req->id);
      $career->title = $req->title;
      $career->description = $req->description;
      $career->tab_name = $req->tab_name;
      $career->location = $req->location;
      $career->job_type = $req->job_type;
      $career->status = 1;

      if ($image = $req->file('image')) {
         $destinationPath = 'public/admin/assets/career';
         $profileImage = rand() . "." . $image->getClientOriginalExtension();
         $image->move($destinationPath, $profileImage);
         $career['image'] = "$profileImage";
      }

      if ($career->save()) {
         $req->session()->flash('success', 'career Updated Successfully!');
         return redirect()->route('career');
      } else {
         return back()->withErrors(['danger' => 'Unable to updated, Try Again Later.']);
      }
   }

   //DELETE CAREER

   public function delete_career(Request $req, $id)
   {
      Career::destroy($id);
      $req->session()->flash('success', 'Deleted Successfully!');
      return redirect()->route('career');
   }

   //UPDATE CAREER STATUS

   public function career_status_update(Request $req, $id)

   {
      //get post status with the help of post id

      $data = DB::table('careers')->select('status')->where('id', '=', $id)->first();

      //check post status

      if ($data->status == '1') {
         $status = '0';
      } else {
         $status = '1';
      }

      //update post status

      $data = array('status' => $status);
      DB::table('careers')->where('id', $id)->update($data);
      $req->session()->flash('success', 'Status has been updated successfully!');
      return redirect()->route('career');
   }

   //CAREER TAB
   public function career_tab ()
   {
      $career_tab = CareerTab::all();
      return view('admin.homepage.career_tab.index', compact('career_tab'));
   }
   //ADD CAREER TAB FORM
   public function add_career_tab()
   {
      $career_tab = CareerTab::all();
      return view('admin.homepage.career_tab.add', compact('career_tab'));
   }

   //ADD CAREER TAB
   public function add_career_tab_action(Request $req)
   {

      $career_tab = new CareerTab();

      $career_tab->tab_name = $req->tab_name;
      $career_tab->status = 1;

      if ($career_tab->save()) {
         $req->session()->flash('success', 'Added Successfully!');
         return redirect()->route('career_tab');
      } else {
         return back()->withErrors(['danger' => 'Unable to added, Try Again Later.']);
      }
   }

   //EDIT CAREER TAB

   public function edit_career_tab($id)
   {
      $career_tab = CareerTab::find($id);
      return view('admin.homepage.career_tab.edit', compact('career_tab'));
   }

   //UPDATE CAREER TAB

   public function update_career_tab(Request $req)
   {

      $career_tab = CareerTab::find($req->id);
      $career_tab->tab_name = $req->tab_name;
      $career_tab->status = 1;

      if ($career_tab->save()) {
         $req->session()->flash('success', 'Updated Successfully!');
         return redirect()->route('career_tab');
      } else {
         return back()->withErrors(['danger' => 'Unable to updated, Try Again Later.']);
      }
   }

   //DELETE CAREER TAB

   public function delete_career_tab(Request $req, $id)
   {
      CareerTab::destroy($id);
      $req->session()->flash('success', 'Deleted Successfully!');
      return redirect()->route('career_tab');
   }

   //UPDATE CAREER TAB STATUS

   public function edit_career_tab_status(Request $req, $id)

   {
      //get post status with the help of post id

      $data = DB::table('career_tabs')->select('status')->where('id', '=', $id)->first();

      //check post status

      if ($data->status == '1') {
         $status = '0';
      } else {
         $status = '1';
      }

      //update post status

      $data = array('status' => $status);
      DB::table('career_tabs')->where('id', $id)->update($data);
      $req->session()->flash('success', 'Status has been updated successfully!');
      return redirect()->route('career_tab');
   }
   
   //BLOG
   public function blog ()
   {
      $blog = Blog::all();
      return view('admin.homepage.blog.index', compact('blog'));
   }

   //ADD BLOG FORM
   public function add_blog()
   {
      $blog = Blog::latest()->get();
      return view('admin.homepage.blog.add', compact('blog'));
   }

   //ADD BLOG
   public function add_blog_action(Request $req)
   {
      $req->validate([
         'title' => 'required',
         'slug' => 'required',
         'image' => 'required'
      ]);

      $blog = new Blog();

      if ($image = $req->file('image')) {
         $destinationPath = 'public/admin/assets/blog';
         $profileImage = rand() . "." . $image->getClientOriginalExtension();
         $image->move($destinationPath, $profileImage);
         $blog['image'] = "$profileImage";
      }
      if ($image = $req->file('author_img')) {
         $destinationPath = 'public/admin/assets/blog';
         $profileImage = rand() . "." . $image->getClientOriginalExtension();
         $image->move($destinationPath, $profileImage);
         $blog['author_img'] = "$profileImage";
      }

      $blog->title = $req->title;
      $blog->type = $req->type;
      $blog->slug = $req->slug;
      $blog->author_name = $req->author_name;
      $blog->description = $req->description;
      $blog->status = 1;

      if ($blog->save()) {
         $req->session()->flash('success', 'Data Added Successfully.');
         return redirect()->route('blog');
      } else {
         $req->session()->flash('error', 'Something Went Wrong, Please Try Again.');
         return redirect()->back();
      }
   }

   //EDIT BLOG
   public function edit_blog($id)
   {
      $blog = Blog::find($id);
      return view('admin.homepage.blog.edit', compact('blog'));
   }

   //UPDATE BLOG
   public function edit_blog_action(Request $req)
   {
      $blog = Blog::find($req->id);
      $blog->title = $req->title;
      $blog->type = $req->type;
      $blog->slug = $req->slug;
      $blog->author_name = $req->author_name;
      $blog->description = $req->description;
      $blog->status = 1;

      if ($image = $req->file('image')) {
         $destinationPath = 'public/admin/assets/blog';
         $profileImage = rand() . "." . $image->getClientOriginalExtension();
         $image->move($destinationPath, $profileImage);
         $blog['image'] = "$profileImage";
      }
      if ($image = $req->file('author_img')) {
         $destinationPath = 'public/admin/assets/blog';
         $profileImage = rand() . "." . $image->getClientOriginalExtension();
         $image->move($destinationPath, $profileImage);
         $blog['author_img'] = "$profileImage";
      }

      if ($blog->save()) {
         $req->session()->flash('success', 'Data Updated Successfully.');
         return redirect()->route('blog');
      } else {
         $req->session()->flash('error', 'Something Went Wrong, Please Try Again.');
         return redirect()->back();
      }
   }

   //DELETE BLOG
   public function delete_blog(Request $req, $id)
   {
      Blog::destroy($id);
      $req->session()->flash('success', 'Data Deleted Successfully.');
      return redirect()->route('blog');
   }

   //UPDATE BLOG STATUS
   public function edit_blog_status(Request $req, $id)
   {
      //get post status with the help of post id

      $data = DB::table('blogs')->select('status')->where('id', '=', $id)->first();

      //check post status

      if (
         $data->status == '1'
      ) {
         $status = '0';
      } else {
         $status = '1';
      }

      //update post status

      $data = array('status' => $status);
      DB::table('blogs')->where('id', $id)->update($data);
      $req->session()->flash('success', 'Status has been updated successfully.');
      return redirect()->route('blog');
   }
   
   //FOOTER SETTING 
   public function footer ()
   {
      $setting = Setting::all();
      return view('admin.setting.index', compact('setting'));
   }

   //EDIT BLOG
   public function update_footer($id)
   {
      $setting = Setting::find($id);
      return view('admin.setting.edit', compact('setting'));
   }

   //UPDATE BLOG
   public function update_footer_action(Request $req)
   {
      $setting = Setting::find($req->id);
      $setting->description = $req->description;
      $setting->email = $req->email;
      $setting->phone = $req->phone;
      $setting->address = $req->address;
      $setting->fb_link = $req->fb_link;
      $setting->insta_link = $req->insta_link;
      $setting->youtube_link = $req->youtube_link;
      $setting->twitter_link = $req->twitter_link;
      $setting->pinterest_link = $req->pinterest_link;
      $setting->linkedin_link = $req->linkedin_link;

      if ($image = $req->file('logo')) {
         $destinationPath = 'public/admin/assets/logo';
         $profileImage = rand() . "." . $image->getClientOriginalExtension();
         $image->move($destinationPath, $profileImage);
         $setting['logo'] = "$profileImage";
      }

      if ($setting->save()) {
         $req->session()->flash('success', 'Data Updated Successfully.');
         return redirect()->route('footer');
      } else {
         $req->session()->flash('error', 'Something Went Wrong, Please Try Again.');
         return redirect()->back();
      }
   }
}
