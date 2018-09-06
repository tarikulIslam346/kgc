<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Schedule;

use App\HomeContent;

use App\HomeButton;

use App\Menu;




class PagesController extends Controller
{
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
 
  
}
