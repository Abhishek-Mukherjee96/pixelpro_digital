<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\ContactUs;
use App\Models\GetAQuote;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    //LOAD CONTACT PAGE
    public function contact(){
        return view('frontend.contact_us');
    }

    //GET ALL DATA
    public function contact_list(){
        $contact_list = ContactUs::latest()->get();
        return view('admin.homepage.contact.index',compact('contact_list'));
    }
    //GET ALL DATA
    public function quote_list(){
        $quote_list = GetAQuote::latest()->get();
        return view('admin.homepage.quote.index',compact('quote_list'));
    }

    //SUBMIT FORM ACTION
    public function submit_contact_form(Request $req){
        $req->validate([
            'name'=>'required',
            'email'=>'required|email',
            'phone'=>'required|numeric|digits:10',
            'subject'=>'required',

        ]);

        $contact=new ContactUs();
        
        $contact->name=$req->name;
        $contact->email=$req->email;
        $contact->phone=$req->phone;
        $contact->subject=$req->subject;
        $contact->message=$req->message;
        $contact->created_at=date('Y-m-d H:i:s');
        $contact->updated_at=date('Y-m-d H:i:s');
        //dd($contact);
        
        if($contact->save())
        {
            $req->session()->flash('success', 'Thank you! Your message has been sent successfully.'); 
            return redirect()->back(); 
        }
        else
        {
            return back()->withErrors(['danger'=>'Unable to added, Try Again Later.']);      
        }
    }

    //GET A QUOTE FORM ACTION
    public function get_a_quote(Request $req){
        $req->validate([
            'name'=>'required',
            'email'=>'required|email',
            'phone'=>'required|numeric|digits:10',
            'business_name'=>'required',
            'interested_in'=>'required',

        ]);

        $quote=new GetAQuote();
        
        $quote->name=$req->name;
        $quote->email=$req->email;
        $quote->phone=$req->phone;
        $quote->business_name=$req->business_name;
        $quote->business_address=$req->business_address;
        $quote->existing_website=$req->existing_website;
        $quote->date=$req->date;
        $quote->interested_in=$req->interested_in;
        $quote->message=$req->message;

        //dd($quote);
        
        if($quote->save())
        {
            $req->session()->flash('success', 'Thank you! Your message has been sent successfully.'); 
            return redirect()->back(); 
        }
        else
        {
            return back()->withErrors(['danger'=>'Unable to added, Try Again Later.']);      
        }
    }
}
