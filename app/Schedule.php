<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    //

    protected $fillable = ['tournament','prize_money','winner','start_date','closing_date'];
}
