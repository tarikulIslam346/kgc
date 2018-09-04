<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\GalaryButton;

use App\GalleryVedio;

class GalaryController extends Controller
{
    //

    public function index(){

    	$g_btns = GalaryButton::all();
        $g_vedios = GalleryVedio::all();

     	return view('galary.index',compact('g_btns','g_vedios'));

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



}
