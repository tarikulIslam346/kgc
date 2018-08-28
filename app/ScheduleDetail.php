<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ScheduleDetail extends Model
{
    //

     protected $fillable = ['front9',
							'back9',
							
							'schedule_id'
						];

      public function schedules(){

    	return $this->belongsTo(Schedule::class);
    	
    }
}
