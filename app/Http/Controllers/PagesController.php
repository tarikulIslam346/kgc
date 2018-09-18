<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Schedule;

use App\HomeContent;

use App\HomeButton;

use App\Menu;

use App\Contact;

 use App\Mail\welcome;




class PagesController extends Controller
{
   public function contact_us(){
        
        return view ('contact');
    }
	 //return homepage view
    public function home(){

    	$schedule  = Schedule::whereDate('start_date','>',date('Y-m-d'))->orderBy('start_date','asc')->first();

    	$schedules  = Schedule::whereDate('start_date','>',date('Y-m-d'))->orderBy('start_date','asc')->get();

        $online_servive = HomeContent::latest()->first();

        $buttons = HomeButton::all();

        


    	return view('home',compact('schedule','schedules','online_servive','buttons'));
    }
    
    //return admin page view
    public function admin(){

       return view('admin.index');
    }

    public function store_contact(){
        $this->validate(request(),[
          'contact_details' => 'required'

        ]);
     $contact = new Contact;
     $contact->contact_details = request('contact_details');
     $contact->save();

     return redirect('/dashboard')->with('add_contact','Contact added Successfully');

    }

      public function delete_contact($id){
          Contact::destroy($id);
          return redirect('/dashboard')->with('delete_contact','Deleted Successfully');
      }
          public function send_mail(){
      $user = request('email');
      $fname = request('firstname');
      $phone = request('contact');
      $text = request('details');

      \Mail::to($user)->send(new welcome($fname,$phone,$text));
      return redirect()->back();
    }

 
  
}
