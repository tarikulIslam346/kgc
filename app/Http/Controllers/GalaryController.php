<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\GalaryButton;

use App\GalleryVedio;

use App\GalleryImage;

class GalaryController extends Controller
{
    //

    public function index(){

    	$g_btns = GalaryButton::all();
        $g_vedios = GalleryVedio::all();
        $g_images = GalleryImage::all();

     	return view('galary.index',compact('g_btns','g_vedios','g_images'));

     }


    public function store_button(){
$this->validate(request(),[
 'button_name' => 'required',
 'button_link' => 'required'

]);
    	foreach(request('button_name') as $btn_name){

    		$button_name[] = $btn_name ;
    	}
    foreach(request('button_link') as $btn_link){
    		
    		$button_link[] = $btn_link ;
    	}
    	

    	//$button_link[] = request('button_link');

    	for( $i=0;$i<count($button_name);$i++)
    	{
    		$button = new GalaryButton;

    		$button->button_name = $button_name[$i];

    		$button->button_link = $button_link[$i];

    		$button ->save();


    	}

    	return redirect('/dashboard')->with('btn_success','Button added Successfully');



    }

    public function delete_button($id){

    	GalaryButton::destroy($id);
    	
    	return redirect('/dashboard')->with('btn_delete','Button deleted Successfully');

    }


     public function store_vedio(){



$this->validate(request(),[

 'link' => 'required'





]);
        foreach(request('link') as $l){

            $vedio_link[] = $l;
        }
   
        

        for( $i=0;$i<count($vedio_link);$i++)
        {
            $vedio = new GalleryVedio;

            $vedio->link = $vedio_link[$i];

          

            $vedio->save();


        }

        return redirect('/dashboard')->with('vedio_success','vedio added Successfully');



    }

      public function delete_vedio($id){

        GalleryVedio::destroy($id);
        
        return redirect('/dashboard')->with('vedio_delete','Vedio deleted Successfully');

    }


     public function store_images(){


        $this->validate(request(),[

         'img_url' => 'required|max:2048',

         'img_url.*' => 'image|mimes:jpeg,png,jpg,gif,svg'



        ]); 




        // foreach(request('img_url') as $img){

        //     $img_url[] = $img ;
        // }


          if(request()->hasfile('img_url'))
         {

            foreach(request()->file('img_url') as $image)
            {
               $image_name=$image->getClientOriginalName();
                $image->move(public_path().'/galleryimages/', $image_name);  
                
                $data[] = $image_name;   
            }
         }
   
        

        //$button_link[] = request('button_link');

        for( $i=0;$i<count($data);$i++)
        {
            $gallery = new GalleryImage;

            $gallery->img_url = $data[$i];

            // $button->button_link = $button_link[$i];

            $gallery->save();


        }

        return redirect('/dashboard')->with('img_success','Images added Successfully');



    }

 public function delete_img($id){

   $image =  GalleryImage::where('id',$id)->get();

     $image_path = '';

 foreach(    $image as $img){
    $image_path = public_path()."/galleryimages/$img->img_url";  // Value is not URL but directory file path

}

 \File::delete([
            $image_path
        ]);

        GalleryImage::destroy($id);
        
        return redirect('/dashboard')->with('img_delete','Image deleted Successfully');

    }



}
