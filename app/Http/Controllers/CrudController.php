<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CrudFormRequest;
use App\Task;

class CrudController extends Controller
{
    //
    public function index(){
 
    	$today = \Carbon\Carbon::now()->format('Y-m-d');   
    	$tasks = Task::whereDate('created_at',$today)->get();  
    	// $tasks = Task::latest()->get();   
    	return view('task.table',['tasks'=>$tasks]);
    }

        //
    public function sorted(Request $request){  
    	$year = 2019; $month = $request->month; $day = $request->days;
		$hour = 20; $minute = 30; $second = 15; $tz = 'Asia/Manila'; 
		// echo $month;
		$today = \Carbon\Carbon::createFromDate(null, $month, $day, $tz)->format('Y-m-d');
		// echo \Carbon\Carbon::createFromFormat('Y-m-d H', '2019-'.$month.'-'.$day.' 22')->toDateTimeString(); // 1975-05-21 22:00:00 
    	$tasks = Task::whereDate('created_at',$today)->get(); 
    	// echo $today; 
    	return view('task.table',['tasks'=>$tasks]);
    }

    public function create(CrudFormRequest $request){ 
    	$task = Task::create($request->all());
    	return response()->json($task);
    }

    public function edit($id){
    	$task = Task::find($id);
    	return response()->json($task);
    }

    public function update(Request $request){
    	$task = Task::find($request->id)->update($request->all());
    	return response()->json($task);
    }

    public function destroy($id){
    	$task = Task::find($id)->delete();
    	return response()->json($task);
    }

    public function saveTime($id,$time){
    	$task = Task::find($id)->update(['time_spent' => $time]);
    }

    public function for_testing(Task $task){
    	$task->status = 'For QA Testing';
    	$task->save();
    }


    public function updateProgress($id,$progress){
    	if ($progress == '100%') {
    		$status = 'Completed';
    	}else{
    		$status = 'On going';
    	}
    	$this->update_status($status,$id);
    	$task = Task::whereId($id)->update(['progress' => $progress,'status'=>$status]);
    	return $task;
    }



    public function update_status($status,$id){
        if($status == 'On going'){
            Task::whereStatus('On going')->update(['status'=>'Pending']);
        }
        Task::find($id)->update(['status'=>$status]);
    	// $task->status = $request->status;
    	// $task->save();
    }

    public function view($id){
    	$data['task'] = Task::find($id); 
    	return view('task.view',$data);
    }

    public function complete($id){
    	$task = Task::find($id)->update(['status' => 'Completed']);
    }
}
