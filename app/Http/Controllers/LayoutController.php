<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Navigation;

use App\Submenu;
use App\Image;

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


    
                //create
    	 		$high = new HeigherCommitee;
    			$high->heading = $file;
    			$high->name = request('name');
    			$high->title = request('title');
    			$high->description = request('description');
    			$high->submenu_id = $id;
    			$high->save();

    	

    
        return redirect('/dashboard')->with('success','Heigher commitee stroed successfully');

    }

    public function show_heighercommitee($name,$id,$menu){


            // dd($menu);

    	 $h = HeigherCommitee::where('submenu_id',$id)->get();
 
   

        

         $image = Image::where('submenu_id',$id)->get();

         $submenulist = Navigation::where('menu',$menu)

                     ->get();

     
    
    return view('page',compact('h','image','submenulist'));
    	
       
    }

    public function store_images(Request $request, $id){


        $this->validate(request(), [
                 'name' => 'required',
                'filename' => 'required',
                'filename.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',

        ]);




        if(request()->hasfile('filename'))
         {

            foreach(request()->file('filename') as $image)
            {
                $name=$image->getClientOriginalName();
                $image->move(public_path().'/images/', $name);  
                $data[] = $name;  
            }
         }

         $image= new Image;
         $image->img_url= $data;
         $image->name = request('name');
         $image->submenu_id = $id;
        
         $image->save();

        return redirect('/dashboard')->with('success', 'Your images has been successfully');
    }

}
