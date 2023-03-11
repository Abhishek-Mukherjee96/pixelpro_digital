<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\UserType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

   //GET ALL USER
   public function user()
   {
      //$get_user = User::latest()->get();
      $get_user = User::leftjoin('user_types', 'user_types.id', '=', 'users.user_type_id')->select('user_types.*', 'users.*')->get();
      return view('admin.user.user.index', compact('get_user'));
   }

   //ADD USER
   public function add_user_action(Request $req)
   {
      //dd($req->all());
      $req->validate([
         'name' => 'required',
         'employee_code' => 'required',
         'email' => 'required|email|unique:users,email',
         'phone_number' => 'required|numeric|min:10',
         'department' => 'required',
         'address' => 'required',
         'user_type_id' => 'required',
         'password' => 'required|min:8|string',
      ]);
      $add_user = new User();
      
      $add_user->employee_code = $req->employee_code;
      $add_user->device_code = $req->device_code;
      $add_user->name = $req->name;
      $add_user->email = $req->email;
      $add_user->phone_number = $req->phone_number;
      $add_user->department = $req->department;
      $add_user->address = $req->address;
      $add_user->user_type_id = $req->user_type_id;
      $add_user->password = Hash::make($req->password);
      $add_user->status = 1;

      if ($add_user->save()) {
         $req->session()->flash('success', 'User Added Successfully.');
         return redirect()->route('user');
      } else {
         $req->session()->flash('error', 'Something Went Wrong, Please Try Again.');
         return redirect()->back();
      }
   }

   //EDIT USER
   public function edit_user($id)
   {
      $edit_user = User::find($id);
      return view('admin.user.user.edit', compact('edit_user'));
   }

   //UPDATE USER
   public function edit_user_action(Request $req)
   {
      $req->validate([
         'name' => 'required',
         'employee_code' => 'required',
         'email' => 'required|email|unique:users,email',
         'phone_number' => 'required|numeric|min:10',
         'department' => 'required',
         'address' => 'required',
         'user_type_id' => 'required',
      ]);

      $update_user = User::find($req->id);
      $update_user->employee_code = $req->employee_code;
      $update_user->device_code = $req->device_code;
      $update_user->name = $req->name;
      $update_user->email = $req->email;
      $update_user->phone_number = $req->phone_number;
      $update_user->department = $req->department;
      $update_user->address = $req->address;
      $update_user->user_type_id = $req->user_type_id;
      $update_user->status = 1;

      if ($update_user->save()) {
         $req->session()->flash('success', 'User Updated Successfully.');
         return redirect()->route('user');
      } else {
         $req->session()->flash('error', 'Something Went Wrong, Please Try Again.');
         return redirect()->back();
      }
   }

   //DELETE USER
   public function delete_user(Request $req, $id){
      User::destroy($id);
      $req->session()->flash('success', 'User Deleted Successfully.');
      return redirect()->route('user');
   }

   //UPDATE USER STATUS
   public function edit_user_status(Request $req, $id){
      //get post status with the help of post id

      $data = DB::table('users')->select('status')->where('id', '=', $id)->first();

      //check post status

      if ($data->status == '1') {
         $status = '0';
      } else {
         $status = '1';
      }

      //update post status

      $data = array('status' => $status);
      DB::table('users')->where('id', $id)->update($data);
      $req->session()->flash('success', 'Status has been updated successfully.');
      return redirect()->route('user');
   }
}
