<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Navigation;

use App\Submenu;

use App\HeigherCommitee;
use Illuminate\Support\Facades\Storage;

class LayoutController extends Controller
{
    public function create_layout(){

    	$name = request('layout');

         return view('admin.dashboard',compact('name'));
    }


    //heigher commitee message layout for  immage and message
    public function store_heighercommitee(Request $request, $id){

      
    	$file = $request->file('avatar')->store('public');


    	 // $var = HeigherCommitee::select('id')->where('submenu_id',$id)->get();

    
                //create
    	 		$high = new HeigherCommitee;
    			$high->heading = $file;
    			$high->name = request('name');
    			$high->title = request('title');
    			$high->description = request('description');
    			$high->submenu_id = $id;
    			$high->save();

    	

    
        return redirect('/dashboard');

    }

    public function show_heighercommitee($name,$id){



    	 $h = HeigherCommitee::select()->where('submenu_id',$id)->get();

    
    	return view('page',compact('h'));
    	
       
    }

    public function store_images(Request $request, $id){

        dd(request()->all());
    }

}
