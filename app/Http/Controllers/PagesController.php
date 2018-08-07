<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
 use App\Menu;

class PagesController extends Controller
{
	 //return homepage view
    public function home(){


    	return view('home');
    }
    
    //return admin page view
    public function admin(){
       return view('admin.index');
    }

  
}
