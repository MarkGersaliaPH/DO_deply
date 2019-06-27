<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Charts\LatestUsers;
use App\Charts\Sales;
use App\User;
use Carbon\Carbon;
use App\Models\Order;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $data['now'] = Carbon::now()->addSeconds(28800);  
        return view('home',$data);
    }

    public function sales(){
        $today = today(); 
        $dates = []; 
        $orders = []; 
        $items = [];
        $ordersCancelled = [];


        for($i=1; $i < $today->daysInMonth + 1; ++$i) {
            $dates[] = \Carbon\Carbon::createFromDate($today->year, $today->month, $i)->format('F-d');
            $day = \Carbon\Carbon::createFromDate($today->year, $today->month, $i);
            $orders[] = Order::whereDate('created_at', $day)->count(); 
            $ordersCancelled[] = Order::cancelled()->whereDate('created_at', $day)->count(); 
        } 

 
        $salesChart = new Sales;
        // $salesChart->labels([''])


        $salesChart->labels($dates);
        $salesChart->dataset('Sales', 'line', $orders)->color('#01aa7f')->fill(true); 
        $salesChart->dataset('Cancelled', 'line', $ordersCancelled)->color('red')->fill(true); 


        return $salesChart;
    }
}

