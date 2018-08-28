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

class LayoutController extends Controller
{
    public function create_layout(){

    	$name = request('layout');

         return view('admin.dashboard',compact('name'));
    }


    //heigher commitee message layout for  immage and message
    public function store_heighercommitee(Request $request, $id){

      
        $this->validate(request(), [
            
                 
                'avatar' => 'required',
                
                'avatar.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'

        ]);
                $image_name = '' ;
        
        if(request()->hasfile('avatar'))
         {

           
         
               $image_name=request()->file('avatar')->getClientOriginalName();
               request()->file('avatar')->move(public_path().'/images1/', $image_name);  
                // request()->file('avatar')->move('/home/kgcbdc/public_html/images1/', $image_name);  
               
           
         }


    
                //create
    	 		$high = new HeigherCommitee;
    			$high->heading =   $image_name;
    			$high->name = request('name');
    			$high->title = request('title');
    			$high->description = request('description');
    			$high->submenu_id = $id;
    			$high->save();

    	

    
        return redirect('/dashboard')->with('success','Heigher commitee stroed successfully');

    }

    public function show_pages($name,$id,$menu){


            // dd($menu);

    	 $h = HeigherCommitee::where('submenu_id',$id)->get();
 
   

        

         $image = Image::where('submenu_id',$id)->get();

        $text = Text::where('submenu_id',$id)->get();

        $notices = Notice::all();


        $menu = Menu::find($menu);
     
    
    return view('page',compact('h','image','menu','text','notices'));

    //      $submenulist = Navigation::where('menu',$menu)

    //                  ->get();

     
    
    // return view('page',compact('h','image','submenulist'));
    	
       
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
               $image_name=$image->getClientOriginalName();
                $image->move(public_path().'/images/', $image_name);  
                // $image->move('/home/kgcbdc/public_html/images/', $image_name);  
                $data[] = $image_name;   
            }
         }

         $image= new Image;
         $image->img_url= $data;
         $image->name = request('name');
         $image->submenu_id = $id;
        
         $image->save();

        return redirect('/dashboard')->with('success', 'Your images has been successfully');
    }


     public function store_text( $id){

        $this->validate(request(), [
            'details' => 'required'

        ]);


         $text= new Text;
         $text->details = request('details');
         $text->submenu_id = $id;
         $text->save();

         return redirect('/dashboard')->with('success', 'Your text of this page  has been added successfully');

     }




}
