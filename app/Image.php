<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    //
    protected $fillbale= ['img_url','name','submenu_id'];

    protected $casts = [

    	'img_url' =>'array',
    	'name'  => 'array'

    ];
}
