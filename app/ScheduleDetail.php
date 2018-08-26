<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ScheduleDetail extends Model
{
    //

     protected $fillable = ['pos',
							'name',
							'to_par',
							'hole',
							'today',
							'r1',
							'r2',
							'r3',
							'r4',
							'total',
							'earnings',
							'hfh_ranking',
							'schedule_id'
						];

      public function schedules(){

    	return $this->belongsTo(Schedule::class);
    	
    }
}
