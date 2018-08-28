<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    //

    protected $fillable = ['tournament','tournament_logo','winner','start_date','closing_date'];

   public function scheduleDetails(){

    	return $this->hasMany(ScheduleDetail::class);
    	
    }
}
