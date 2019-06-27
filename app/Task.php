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
<<<<<<< HEAD
		    return Carbon::createFromFormat('Y-m-d H:i:s', $date)->format('F d, Y');
=======
		    return Carbon::createFromFormat('Y-m-d H:i:s', $date)->addSeconds(28800)->format('F d, Y');
>>>>>>> b78006be52c44c0f921c5ee9f514c1ec87090fed
		}

		public function getUpdatedAtAttribute($date)
		{
<<<<<<< HEAD
		    return Carbon::createFromFormat('Y-m-d H:i:s', $date)->format('F d, Y');
=======
		    return Carbon::createFromFormat('Y-m-d H:i:s', $date)->addSeconds(28800)->format('F d, Y');
>>>>>>> b78006be52c44c0f921c5ee9f514c1ec87090fed
		}



}
