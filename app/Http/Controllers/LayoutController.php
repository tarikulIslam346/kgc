<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Menu;

use App\Submenu;
use App\Image;

use App\Text;
use App\Notice;

use App\HeigherCommitee;
use Illuminate\Support\Facades\Storage;
use App\LayoutChoice;


class LayoutController extends Controller
{
    public function create_layout(){

    	$name = request('layout');

         return view('admin.dashboard',compact('name'));
    }


    //heigher commitee message layout for  immage and message
    public function store_heighercommitee(Request $request, $id){


         $choices =  LayoutChoice::select()->where('submenu_id',$id)->get();

       

      
        $this->validate(request(), [
            
                 
                'avatar' => 'required',
                
                'avatar.*' => 'images|mimes:jpeg,png,jpg,gif,svg'

        ]);


        $image_name = '' ;
        
        if(request()->hasfile('avatar'))
         {

           
         
               $image_name=request()->file('avatar')->getClientOriginalName();
               request()->file('avatar')->move(public_path().'/images1/', $image_name);  
                
               
           
         }


    
                //create
    	 		$high = new HeigherCommitee;
    			$high->heading =   $image_name;
    			$high->name = request('name');
    			$high->title = request('title');
    			$high->description = request('description');
    			$high->submenu_id = $id;
    			$high->save();

                $choices =  LayoutChoice::select()->where('submenu_id',$id)->get();

                request()->session()->flash('status', 'successful!');

    	

    
               return view('admin.adminlayoutform',compact('choices'));

    }


    public function show_layout(){

        /* $choices =  LayoutChoice::select()->where('submenu_id',$id)->get();*/
   



      return view('admin.adminlayoutform');
    }

    public function show_pages($name,$id,$menu){


            // dd($menu);

    	 $h = HeigherCommitee::where('submenu_id',$id)->get();
 
   

        

         $image = Image::where('submenu_id',$id)->get();

        $text = Text::where('submenu_id',$id)->get();

        $notices = Notice::all();

        $menus =  Menu::where('id',$menu)->get();
        // dd($menus );


        $menu = Menu::find($menu);
     
    
    return view('page',compact('h','image','menu','menus','text','notices'));

  
    	
       
    }

    public function store_images(Request $request, $id){


        $this->validate(request(), [

                'name' => 'required',

                'filename' => 'required',

                'filename.*' => 'image|mimes:jpeg,png,jpg,gif,svg'


        ]);




        if(request()->hasfile('filename'))
         {

            foreach(request()->file('filename') as $image)
            {
               $image_name=$image->getClientOriginalName();
                $image->move(public_path().'/images/', $image_name);  
                
                $data[] = $image_name;   
            }
         }

         $image= new Image;
         $image->img_url= $data;
         $image->name = request('name');
         $image->submenu_id = $id;
        
         $image->save();

          $choices =  LayoutChoice::select()->where('submenu_id',$id)->get();

         request()->session()->flash('status', 'successful!');

        

    
               return view('admin.adminlayoutform',compact('choices'));
    }


     public function store_text( $id){

        $this->validate(request(), [

            'details' => 'required'

        ]);


         $text= new Text;
         $text->details = request('details');
         $text->submenu_id = $id;
         $text->save();


          $choices =  LayoutChoice::select()->where('submenu_id',$id)->get();

         request()->session()->flash('status', 'successful!');

        

    
               return view('admin.adminlayoutform',compact('choices'));

     }




}
