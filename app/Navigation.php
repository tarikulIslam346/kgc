<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Navigation extends Model
{
    //
    // protected $guraded = [];

    protected $fillable = ['menu','submenulist'];

    protected $casts = [

    	'submenulist' => 'array'

    ];
}
