<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\HeigherCommitee;

class LayoutController extends Controller
{
    public function create_layout(){

    	$name = request('layout');

         return view('admin.dashboard',compact('name'));
    }
    public function store_heighercommitee($id){

    	$submenu_id = $id;

        $h = new HeigherCommitee;
        $h->paragraph = request('paragraph');
        $h->heading = request('heading');
        $h->submenu_id = $submenu_id;
        $h->save();

        return redirect()->back();

    }

    public function show_heighercommitee($name,$id){

    	$h = HeigherCommitee::find($id);
    	    // $h->paragraph
    	return view('page',compact('h'));
    }
}
