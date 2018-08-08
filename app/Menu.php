<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    //
    protected $fillable = ['name'];

    //this static method call for  nav item list avilable to view composer with a view 
    //to supplying menu item avilable to all view

    public static function menulist(){

    	return static::where('confirmed',1)->get();
    }
}
