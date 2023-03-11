<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\ProjectTask;
use App\Models\User;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use SebastianBergmann\CodeCoverage\Report\Xml\Project as XmlProject;

class AdminAuthController extends Controller
{
    public function admin_login()
    {
        return view('admin.auth.login');
    }

    public function dashboard()
    {
        $hour = date("G");
        $minute = date("i");
        $second = date("s");
        $msg = " Today is " . date("l, M. d, Y.") . " And the time is " . date("g:i a");

        if ($hour == 00 && $hour <= 9 && $minute <= 59 && $second <= 59) {
            $greet = "Good Morning,";
        } else if ($hour >= 10 && $hour <= 11 && $minute <= 59 && $second <= 59) {
            $greet = "Good Day,";
        } else if ($hour >= 12 && $hour <= 15 && $minute <= 59 && $second <= 59) {
            $greet = "Good Afternoon,";
        } else if ($hour >= 16 && $hour <= 23 && $minute <= 59 && $second <= 59) {
            $greet = "Good Evening,";
        } else {
            $greet = "Welcome,";
        }
        return view('admin.dashboard', compact('greet'));
    }

    //LOGIN CODE 
    public function admin_login_action(Request $req)
    {
        $req->validate([
            'email' => 'required|email',
            'password' => 'required|min:8'
        ]);
        //dd($req->all());
        $email = $req->email;
        $password = $req->password;

        if (Auth::attempt(["email" => $email, "password" => $password, "status" => 1])) {
            return redirect()->route('dashboard');
        } else {
            return Redirect::back()->with(["error" => "Invalid Username & Password."]);
        }
    }

    //LOGOUT CODE
    public function logout()
    {
        session()->flush();
        Auth::logout();
        return redirect()->route('login');
    }

    //STORING DATA IN SESSION
    public function get_session_data(Request $req)
    {
        $req->session()->put('user_id', Auth::user()->id);
        $req->session()->put('user_name', Auth::user()->name);
        //GET ALL DATA FROM SESSION
        $value = session()->all();
        dd($value);
    }
}
