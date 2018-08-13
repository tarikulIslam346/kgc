<?php

namespace App\Http\Controllers;

use App\Menu;
use App\Submenu;
use App\Layout;
use App\LayoutChoice;
use App\Navigation;

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
    		$nav = Navigation::all();

    		return view('admin.dashboard',compact('menus','submenus','layouts','nav'));
    	}

    	return view('admin.index');
    }

        public function store(){

    	if(  ! auth()->attempt(request(['email','password'])) ) {
            // Authentication passed...
             return back(); 
        
        }

        $menus = Menu::all();


            return view('admin.dashboard',compact('menus'));
       
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

    	 

    	 return redirect('/dashboard');
    
    }

     //this method is used for delete navegtion item titile of page
    public function delete_menu(){

    	$id = request('id');

       // delete from navigation 

        //1. get the menu id
      $menu = Menu::where('id',$id)->get();

      //2. then delete from navigation
      foreach($menu as $m){

        Navigation::where('menu', $m->name)->delete();
        
      }
     //delete from menulist


    	Menu::where('id',$id)->delete();



       

    	 return redirect('/dashboard');

    }
    public function update_menu($id){
    	$name = request('name');

        //upadate on navigation table
      //      $menu = Menu::where('menu',$name)->get();

      // foreach($menu as $m){

      //   dd(Navigation::where('menu', $m->name)->get());
        
      // }
    	
        // update from navigation item(menu) table
    	$menu = Menu::find($id);

        $menu->name = $name ;

        $menu->save();

        return redirect('/dashboard');



    }
    public function show_menu($id){


    	$published = Input::has('show') ? true : false;

    	$menu = Menu::find($id);

    	$menu->confirmed = $published ;

    	$menu->save();

    	return redirect('/dashboard');

    	//dd($published);

    }

    // for sub menu /////////////////////////////////////

     public function create_submenu(){

    	$this->validate(request(),[
    		'name' => 'required|unique:menus|max:255',

    	]);

    	 Submenu::create(request(['name']));

    	

    	 // view('admin.dashboard',compact(''))

    	 return redirect('/dashboard');
    
    }

        public function update_submenu($id){
    	$name = request('name');
    	// dd($name);

    	$submenu = Submenu::find($id);

        $submenu->name = $name ;

        $submenu->save();

        return redirect('/dashboard');

    	//return view('admin.update_dashboard ')->with('id','menus');

    }


    public function create_layout(){
        $id = request('submenu_id');

    
    //   $choice =  LayoutChoice::all();

   //dd($id);
   LayoutChoice::updateOrCreate(request(['choice','submenu_id']));

     $choices =  LayoutChoice::select()->where('submenu_id',$id)->get();
     // foreach($choices as $choice)
     // $choices = $choice->choice;

     // foreach($choices as $choice)$var = $choice->choice;




      return view('admin.adminlayoutform',compact('choices'));
    }


    public function create_navigation(){

    	 Navigation::Create(request()->except('_token','Submit'));


        return redirect('/dashboard');

    }
      public function show_navigation($nav){


      	$submenulist = Navigation::where('menu',$nav)

      	             ->get();

      	return view('page',compact('submenulist'));

      }




}
