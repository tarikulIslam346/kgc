<?php

namespace App\Http\Controllers;

use App\Menu;

use Illuminate\Http\Request;

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

    		return view('admin.dashboard',compact('menus'));
    	}

    	return view('admin.index');
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
    // public function update_menu(){
    // 	$id = request('id');

    // 	$menus = Menu::all();

    // 	 return view('admin.update_dashboard ')->with('id','menus');

    // }

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
}
