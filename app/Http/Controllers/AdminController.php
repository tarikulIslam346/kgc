<?php

namespace App\Http\Controllers;

use App\Menu;
use App\Submenu;
use App\Layout;
use App\LayoutChoice;
use App\Image;
use App\Schedule;
use App\ScheduleDetail;
use App\Notice;
use App\HeigherCommitee;
use App\Text;
use App\GalaryButton;
use App\GalleryVedio;
use App\GalleryImage;
use App\HomeContent;
use App\HomeButton;
use App\Contact;
use App\Slider;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    //
    public function __constructor(){

        $this->middleware('auth');
    }
    public function dashboard(){
      if(\Auth::check())
      {
        $menus = Menu::all();
        $submenus = Submenu::all();
        $layouts = Layout::all();
        $schedules = Schedule::simplePaginate(4);
        $scheduleDetails = ScheduleDetail::simplePaginate(4);
        $notices = Notice::simplePaginate(2);
        $galary_btn = GalaryButton::simplePaginate(4);
        $galary_img = GalleryImage::simplePaginate(2);
        $galary_vedio = GalleryVedio::simplePaginate(4);
        $online_content = HomeContent::all();
        $home_buttons = HomeButton::simplePaginate(4);
        $contact = Contact::all();
        $slides = Slider::simplePaginate(2);
        return view('admin.dashboard',compact('menus','submenus','layouts','schedules','scheduleDetails',
          'notices','galary_btn','galary_vedio','galary_img','online_content','home_buttons','contact','slides'));
      }
      return view('admin.index');
    }
    public function store(){
      if(  ! auth()->attempt(request(['email','password'])) ) {
            // Authentication passed...
             return back(); 
        }
       return $this->dashboard();              
    }
    public function destroy(){
      auth()->logout();
      return redirect('/admin');
    }
    //this method is used for create navigation item of page
    public function create_menu(){
      $this->validate(request(),[
        'name' => 'required|unique:menus|max:255',
      ]);
       Menu::create(request(['name']));
       return redirect('/dashboard')->with('success','Menu created succesfully');    
    }
     //this method is used for delete navigtion item of page
    public function delete_menu(){
      $id = request('id');       
        //update submenu.menu_id
      $submenus = Submenu::where('menu_id',$id)->get();      
      foreach($submenus as $submenu){          
          $submenu->menu_id = 0;          
           $submenu->save();
      }
        //delete menu Image      
      $menu= Menu::where('id',$id)->get();    
      $image_path = '';
      foreach( $menu as $m){
            $image_path = public_path()."/menu_images/$m->menu_img";  // Value is not URL but directory file path
        }
      \File::delete([
                    $image_path
                ]);
     //delete from menu
      Menu::where('id',$id)->delete();
      return redirect('/dashboard')->with('success','Navigation item deleted succesfully');
    }
    public function update_menu($id){
      $name = request('name');
      $menu = Menu::find($id);
      $menu->name = $name ;
      $menu->save();
      return redirect('/dashboard')->with('success','Navigation item Edited succesfully');
    }
    public function show_menu($id){
      $published = Input::has('show') ? true : false;
      $menu = Menu::find($id);
      $menu->confirmed = $published ;
      $menu->save();
      return redirect('/dashboard')->with('success','Show Navigation item succesfully');      
    }
    public function add_menu_img(){
      $id = request('menu_id');
      $this->validate(request(), [                            
                'menu_img' => 'required|mimes:jpeg,png,jpg,gif,svg|max:500'
        ]);
      $image_name = '' ;        
      if(request()->hasfile('menu_img'))
         {                   
            $image_name = time()."-".request()->file('menu_img')->getClientOriginalName();
            request()->file('menu_img')->move(public_path().'/menu_images/', $image_name);         
         }
      $menu = Menu::find($id);
      $menu->menu_img = $image_name ;
      $menu->save();
      return redirect('/dashboard')->with('success',' Navigation Image added succesfully');
    }
    public function add_description(){
      $id = request('menu_id');
      $this->validate(request(), [            
                'menu_details' => 'required'                
        ]);      
      $menu = Menu::find($id);
      $menu->menu_details = request('menu_details') ;
      $menu->save();
      return redirect('/dashboard')->with('success',' Navigation Description added succesfully');
    }
    /*******************for sub menu ************************************/
    public function create_submenu(){
      $this->validate(request(),[
        'name' => 'required|unique:submenus|max:255',
      ]);
      Submenu::create(request(['name']));
      return redirect('/dashboard')->with('success','Sub navigation item created succesfully');    
    }
    public function update_submenu($id){
      $name = request('name');
      $submenu = Submenu::find($id);
      $submenu->name = $name ;
      $submenu->save();
      return redirect('/dashboard')->with('success','Sub navigation item updated succesfully');
      //return view('admin.update_dashboard ')->with('id','menus');
    }
    public function delete_submenu($id){
      Submenu::where('id',$id)->delete();
      LayoutChoice::where('submenu_id',$id)->delete();
      $hc=  HeigherCommitee::where('submenu_id',$id)->get();
      $image_path = '';
      foreach( $hc as $h){
        $image_path = public_path()."/images1/$h->heading";  // Value is not URL but directory file path
       }
      \File::delete([
            $image_path
        ]);  
      HeigherCommitee::where('submenu_id',$id)->delete();
      $images =  Image::where('submenu_id',$id)->get();
      $images_path = '';
        foreach( $images  as $image ){
        for($i=0;$i<count($image->img_url) ;$i++){
        $images_path = public_path()."/images/".$image->img_url[$i]; 
       \File::delete([
              $images_path
          ]);
         } // Value is not URL but directory file path
       }    
      Image::where('submenu_id',$id)->delete();    
      Text::where('submenu_id',$id)->delete();
      return redirect('/dashboard')->with('success','Navigation sub item deleted succesfully');
    }
 /*******************for sub menu **********************************************************/
 /**************For layout *****************************************************************/
    public function create_layout(){       
        $id = request('submenu_id');
         $this->validate(request(),[
        'choice' => 'required',
        'submenu_id' => 'required|unique:layout_choices'
      ]);   
      LayoutChoice::create(request(['choice','submenu_id']));
      $choices =  LayoutChoice::select()->where('submenu_id',$id)->get();
      return view('admin.adminlayoutform',compact('choices','id'));
    }
    public function create_navigation(){
        foreach(request('submenulist') as $submenu){
            $submneu_id[] = $submenu;
        }    
       for($i=0 ;$i<count($submneu_id) ;$i++){
        $submneu = Submenu::find($submneu_id[$i]);
        if(  $submneu->menu_id  == null){
        $submneu->menu_id = request('menu');
        $submneu->save();
          }else{
            return redirect('/dashboard')->with('error','submenu already exists');
          }
        }
        return redirect('/dashboard');
    }
    public function show_navigation($id,$nav){
             $menu = Menu::find($id);
             $menus = Menu::where('id',$id)->get();
             $notices = Notice::all();
        return view('page',compact('menu','notices', 'menus'));
      }
      /**********************schedule***********************/
      public function schedule_store(){
          $this->validate(request(),[
            'tournament' => 'required|max:255',
            'tournament_logo' => 'required',             
            'tournament_logo.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'start_date' => 'required|date|date_format:Y-m-d',
            'closing_date' => 'required|date|date_format:Y-m-d'
          ]);  
          $image_name = '' ;
          if(request()->hasfile('tournament_logo'))
          {
               $image_name = request()->file('tournament_logo')->getClientOriginalName();
               request()->file('tournament_logo')->move(public_path().'/logos/', $image_name);    
          }

      Schedule::create([

        'tournament' => request('tournament'),
        'tournament_logo' => $image_name,
        'start_date' => request('start_date'),
        'closing_date' => request('closing_date')


      ]);

       return redirect('/dashboard')->with('success','Schedule created succesfully');


      }

      public function update_tournament($id){


         $this->validate(request(),[

        'tournament' => 'required'
      ]);


          $tournaments = Schedule::find($id);

          $tournaments->tournament = request('tournament');

          $tournaments->save();


          return redirect('/dashboard')->with('success','Tournament name updated succesfully');


      }
      public function update_winner($id){


         $this->validate(request(),[

        'winner' => 'required|max:255'
      ]);


          $tournament = Schedule::find($id);

          $tournament->winner = request('winner');

          $tournament->save();


          return redirect('/dashboard')->with('success','Winner name updated succesfully');


      }

    public function update_prize($id){


         $this->validate(request(),[

        'prize_money' => 'required|integer'

          ]);


          $tournament = Schedule::find($id);

          $tournament->prize_money = request('prize_money');

          $tournament->save();


          return redirect('/dashboard')->with('success','Prize money  updated succesfully');


      }

/**************************Create Notice*********************/

public function store_notice(){

   $this->validate(request(),[

     'notice' => 'required'

   ]);

   Notice::create(request(['notice']));

   return redirect('/dashboard')->with('success','Notice craeted succesfully');


}

public function delete_notice($id){

   Notice::destroy($id);

   return redirect('/dashboard')->with('success','Notice deleted succesfully');


}
/***********Home page *********/

public function store_online_service(){

     $this->validate(request(),[

     'home_online_text' => 'required'

   ]);

  $online = new HomeContent;
  $online->home_online_text = request('home_online_text');
  $online->save();

   return redirect('/dashboard')->with('content_success','Online service info added succesfully');


}
public function delete_online_content($id){

  HomeContent::destroy($id);

 return redirect('/dashboard')->with('content_success','Online service info deleted succesfully');

}
    public function store_home_button(){

    $this->validate(request(),[

     'home_button_name' => 'required',

     'home_button_link' => 'required'

    ]);
          foreach(request('home_button_name') as $btn_name){

        $button_name[] = $btn_name ;
      }
    foreach(request('home_button_link') as $btn_link){
        
        $button_link[] = $btn_link ;
      }
      

      //$button_link[] = request('button_link');

      for( $i=0;$i<count($button_name);$i++)
      {
        $button = new HomeButton;

        $button->home_button_name = $button_name[$i];

        $button->home_button_link = $button_link[$i];

        $button ->save();


      }

      return redirect('/dashboard')->with('home_btn_success','Button added Successfully');



    }

public function delete_home_button($id){

  HomeButton::destroy($id);

 return redirect('/dashboard')->with('home_btn_success','Button deleted Successfully');

}





}