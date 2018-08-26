<?php

namespace App\Http\Controllers;

use App\Menu;
use App\Submenu;
use App\Layout;
use App\LayoutChoice;
// use App\Navigation;
use App\Schedule;
use App\ScheduleDetail;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;


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
    		//$nav = Navigation::all();
        $schedules = Schedule::all();
        $scheduleDetails = ScheduleDetail::all();

    		return view('admin.dashboard',compact('menus','submenus','layouts','schedules','scheduleDetails'));
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

     //this method is used for delete navegtion item titile of page
    public function delete_menu(){

    	$id = request('id');

       // delete from navigation 

        //1. get the menu id

      $menu = Menu::where('id',$id)->get();

     //delete from menulist


    	Menu::where('id',$id)->delete();



       

    	 return redirect('/dashboard')->with('success','Navigation item deleted succesfully');

    }

    public function update_menu($id){

    	$name = request('name');

        //1.upadate on navigation table

     // $menu = Menu::where('id',$id)->get();

      //2. then update from navigation

      // foreach($menu as $m){

      //   Navigation::where('menu', $m->name)->update(['menu'=>$name]);
        
      // }

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
    	// dd($name);

    	$submenu = Submenu::find($id);

        $submenu->name = $name ;

        $submenu->save();

        return redirect('/dashboard')->with('success','Sub navigation item updated succesfully');

    	//return view('admin.update_dashboard ')->with('id','menus');

    }

      public function delete_submenu($id){


    Submenu::where('id',$id)->delete();



       

       return redirect('/dashboard')->with('success','Navigation sub item deleted succesfully');

        // return redirect('/dashboard')->with('success','Sub navigation item updated succesfully');

      //return view('admin.update_dashboard ')->with('id','menus');

    }
 /*******************for sub menu **********************************************************/
 /**************For layout *****************************************************************/

    public function create_layout(){
        $id = request('submenu_id');

         $this->validate(request(),[
        'choice' => 'required',
        'submenu_id' => 'required|unique:layout_choices'
      ]);

    

   LayoutChoice::updateOrCreate(request(['choice','submenu_id']));

     $choices =  LayoutChoice::select()->where('submenu_id',$id)->get();
   



      return view('admin.adminlayoutform',compact('choices'));
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

    	 // Navigation::Create(request()->except('_token','Submit'));


      //   return redirect('/dashboard');

    }
      public function show_navigation($id,$nav){

             $menu = Menu::find($id);

        return view('page',compact('menu'));


      	// $submenulist = Navigation::where('menu',$nav)

      	//              ->get();

      	// return view('page',compact('submenulist'));

      }


      /**********************schedule***********************/

      public function schedule_store(){


      $this->validate(request(),[

        'tournament' => 'required|max:255',

        'prize_money' => 'required|integer',

        'start_date' => 'required|date|date_format:Y-m-d',

        'closing_date' => 'required|date|date_format:Y-m-d'


      ]);

      Schedule::create(request()->except('_token','Submit'));

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






}
