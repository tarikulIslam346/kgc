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
    public function store_heighercommitee(Request $request, $id){


    	$file =$request->file('avatar')->store('public');



    	  HeigherCommitee::where('submenu_id',$id)->update(['heading'=>$file]);
    
        return redirect('/dashboard');

    }

    public function show_heighercommitee($name,$id){

    	
    	 // $submenu = Submenu::find($id);
    	 

    	 // $var = Navigation::all();

    	 $h = HeigherCommitee::select()->where('submenu_id',$id)->get();

    	 // $this->show_menu()


    	//  foreach($var as $v){

    	//  	for($i=0;$i<count($v->submenulist);$i++){

    	//  		if($v->submenulist[$i] == $submenu->name)

    	//  			$var = Navigation::select()->where('menu',$v->menu)->get();

    	//  			dd($var[0]->menu);

    	//  		return view('page',compact('h','submenulist'));

    	//  			// echo 'ok';
    	//  		//dd($v->submenulist[$i] );

    	// 		// Navigation::find('submenulist',$submenu->name);
    	// 	}
    	// }
    		//dd($submenulist);

    	// $h = HeigherCommitee::find($id);
    	//     // $h->paragraph
    	return view('page',compact('h'));
    	// return Response::json($h);
       
    }
}
