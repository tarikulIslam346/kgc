<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Navigation extends Model
{
    //
    protected $guraded = [];

    protected $casts = [
    	
    	'submenulist' => 'array'

    ];
}
