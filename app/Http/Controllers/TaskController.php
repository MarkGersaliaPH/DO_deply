<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TaskController extends Controller
{
    //
    public function index(){ 
  
    	$today = \Carbon\Carbon::now()->addSeconds(28800);  
    	$dates = [];
    	$days = []; 
        for($i=1; $i < $today->daysInMonth + 1; ++$i) {
            $dates[] = \Carbon\Carbon::createFromDate($today->year, $today->month, $i)->format('Y-m-d'); 
            $days[] = $i;
        } 

 
    	return view('welcome',['dates' => $dates,'now'=>$today,'days'=>$days]);
    }
}
