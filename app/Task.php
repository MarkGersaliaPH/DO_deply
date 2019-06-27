<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
class Task extends Model
{
    //



    protected $fillable = [
    	'task','description','status','priority','assigned_by','time_spent','progress'
    ];

    public function getCreatedAtAttribute($date)
		{ 
		    return Carbon::createFromFormat('Y-m-d H:i:s', $date)->addSeconds(28800)->format('F d, Y');
		}

		public function getUpdatedAtAttribute($date)
		{
		    return Carbon::createFromFormat('Y-m-d H:i:s', $date)->addSeconds(28800)->format('F d, Y');
		}



}
