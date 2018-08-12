<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Layout extends Model
{
    //
    protected $guarded = [];

    protected $fillable= ['layout_name','submenu_id'];
}
