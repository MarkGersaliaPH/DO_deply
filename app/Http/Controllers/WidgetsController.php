<?php

namespace App\Http\Controllers;
use App\Models\Order;
use Illuminate\Http\Request;

use App\Charts\Sales;
use App\User; 
use Carbon\Carbon;
class WidgetsController extends Controller
{
    //

    public function sales(Request $request){

    		$month = $request->month;
    		$year = $request->year;
    		$day = '1';

    	if($month != null || $year != null){
    		$today = Carbon::create($year, $month, $day);    	
 
    	}else{ 
	    	$today = today(); 

    	} 
 
        $dates = []; 
        $orders = []; 
        $items = [];
        $ordersCancelled = [];


        for($i=1; $i < $today->daysInMonth + 1; ++$i) {
            $dates[] = \Carbon\Carbon::createFromDate($today->year, $today->month, $i)->format('F-d-Y');
            $day = \Carbon\Carbon::createFromDate($today->year, $today->month, $i);
            $orders[] = Order::whereDate('created_at', $day)->count(); 
            $ordersCancelled[] = Order::cancelled()->whereDate('created_at', $day)->count(); 
        } 

 
        $salesChart = new Sales;
        // $salesChart->labels([''])


        $salesChart->labels($dates);
        $salesChart->dataset('Sales', 'line', $orders)->color('#01aa7f')->fill(true); 
        $salesChart->dataset('Cancelled', 'line', $ordersCancelled)->color('red')->fill(true); 
 
        return view('widgets.sales',['chart' => $salesChart]);
    }
}
