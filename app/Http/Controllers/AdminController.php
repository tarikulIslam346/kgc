<?php

namespace App\Http\Controllers;

use App\Menu;
use App\Submenu;

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

    		return view('admin.dashboard',compact('menus','submenus'));
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

    //this method is used for create nav titile of page

    public function create_menu(){

    	$this->validate(request(),[
    		'name' => 'required|unique:menus|max:255',

    	]);

    	 Menu::create(request(['name']));

    	 

    	 return redirect('/dashboard');
    
    }

     //this method is used for delete nav titile of page
    public function delete_menu(){

    	$id = request('id');

    	Menu::where('id',$id)->delete();

    	 return redirect('/dashboard');

    }
    public function update_menu($id){
    	$name = request('name');
    	// dd($name);

    	$menu = Menu::find($id);

        $menu->name = $name ;

        $menu->save();

        return redirect('/dashboard');

    	//return view('admin.update_dashboard ')->with('id','menus');

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




}
