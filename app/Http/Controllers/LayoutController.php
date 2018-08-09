<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LayoutController extends Controller
{
    public function create_layout(){

    	$name = request('layout');

         return view('admin.dashboard',compact('name'));
    }
}
