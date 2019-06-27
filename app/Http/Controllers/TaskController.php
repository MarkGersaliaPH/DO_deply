<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TaskController extends Controller
{
    //
    public function index(){ 
<<<<<<< HEAD
  date_default_timezone_set("Asia/Manila");
    	$today = \Carbon\Carbon::now();   
=======
  
    	$today = \Carbon\Carbon::now()->addSeconds(28800);  
>>>>>>> b78006be52c44c0f921c5ee9f514c1ec87090fed
    	$dates = [];
    	$days = []; 
        for($i=1; $i < $today->daysInMonth + 1; ++$i) {
            $dates[] = \Carbon\Carbon::createFromDate($today->year, $today->month, $i)->format('Y-m-d'); 
            $days[] = $i;
        } 

 
    	return view('welcome',['dates' => $dates,'now'=>$today,'days'=>$days]);
    }
}
