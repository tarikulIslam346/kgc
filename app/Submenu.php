<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Submenu extends Model
{
    //
    public function menus(){
    	return $this->belongsTo(Menu::class);
    }
    protected $fillable = ['name'];

    
}
