

<div class="form-group"> 
		<h2>

		
	{{$task['task']}}</h2>	 
</div>   

<table class="table table-bordered table-striped">
	<tr>
		<th>Assigned By:</th>
		<td>{{$task['assigned_by']}}</td>
	</tr>
	<tr>
		<th>Created on:</th>
		<td>{{$task['created_at']}}</td>
	</tr>
	<tr>
		<th>Priority</th>
		<td>{{$task['priority']}}</td>
	</tr>

	<tr>
		<th>Status</th>
		<td><label id="status" class="label label-{{getStatus($task['status'])}}">{{$task['status']}}</label></td>
	</tr> 
	<tr>
		<th>Progress</th>
		<td>
				<div class="progress" style="margin:0">
				  <div class="progress-bar progress-bar-striped progress-bar-success active" role="progressbar"
				  aria-valuenow="{{$task['progress']}}" aria-valuemin="0" aria-valuemax="100" style="width:{{$task['progress']}}">
				    {{$task['progress']}}
				  </div>
				</div>
		</td>
	</tr> 

	<tr>
		<th>Update Progress</th>
		<td>
			<select id="progress"> 
					<option default hidden>-- Select Progress --</option>
					<option >10%</option> 
					<option >20%</option> 
					<option >30%</option> 
					<option >40%</option> 
					<option >50%</option> 
					<option >60%</option> 
					<option >70%</option> 
					<option >80%</option> 
					<option >90%</option> 
					<option >100%</option> 
			</select>
		</td>
	</tr> 
</table> 
<input type="hidden" value="{{$task['time_spent']}}" name="" id="saved-time"> 
<div class="well">  
	<label><i class="fas fa-clock"></i> Time spent: </label> <h3 id="timer" style="margin:0">{{$task['time_spent']}}</h3>
</div> 
<div class="form-group">
<button class="btn btn-success" onclick="startTimer({{$task['id']}})" id="start"><i class="fas fa-play-circle"></i> Start Timer </button>
<button class="btn btn-success" id="resume" style="display: none"><i class="fas fa-play-circle"></i> Start Timer </button>
<button class="btn btn-warning" id="pause"><i class="fas fa-pause-circle"></i> Pause Timer </button>  
<button class="btn btn-info" onclick="updateStatusForTesting({{$task['id']}},'QA Testing')"><i class="far fa-edit"></i> For QA Testing </button>  
<button class="btn btn-default" data-dismiss="modal" aria-label="Close" onclick="saveTimer({{$task['id']}})" id="close"> <i class="fas fa-times"></i> Close </button> 
</div>
		<label>Description:</label><br>
		<div class="description" style="padding: 20px;border: 1px solid #eee;">
		 {!! $task['description'] !!}
		 </div>  
<script type="text/javascript">

var timer = $('#timer'), 
	savedTime = $('#saved-time');


function complete(id){ 
  $.get('crud/complete/' + id,function(){
    createAlert('Task has been marked as completed','success')
    showDataSet() 
	view({{$task['id']}})

  });
 }


$('#progress').on('change',function(){
	$.get('crud/update/progress/' + {{$task['id']}} + '/' + $(this).val(),function(){
	view({{$task['id']}})

      showDataSet()
	createAlert('Progress Succesfully Updated','success')

	});
})


$(document).ready(function(){ 

 	$('#pause').on('click',function(){
 			$('#start').hide();
 			$('#resume').show();
		  timer.timer('pause');	
  	})

  	$('#resume').on('click',function(){

		  timer.timer('resume');	

  	});


  })

$('#start').on('click',function(){

})

function updateStatusForTesting(id){
	$.ajax({
		method:'GET',
		url:'/crud/testing/' + id,
		success:function(){
		    createAlert('Task has been marked as For QA Testing','success')
		    showDataSet() 
			view({{$task['id']}})

		}
	})
}

  	function startTimer(id){
  		  timer.timer({ 
		  	seconds: convertSavedTimeToSeconds(savedTime.val()), 
		  	format:'%H:%M:%S',
		  	duration:1,
		  	repeat: true,
		  	editable:true,
		  	callback:function(){
				var time_from_count = timer.html(); 

		  		 $.get('crud/save-time/' + id + '/' + time_from_count);
		  	}
		  });	
  	}

  	function resetTimer(id){
  		timer.html('00:00:00');
  		savedTime.val('00:00:00');
  		 $.get('crud/save-time/' + id + '/00:00:00');
  	}

  	function saveTimer(id){
  		timer.timer('remove');

				var time_from_count = timer.html(); 

		 $.get('crud/save-time/' + id + '/' + time_from_count);
  	}

  function convertSavedTimeToSeconds(time){
 	if (time == undefined || time == null) {
 		return 0;
 	}else{

		var a = time.split(':'); // split it at the colons
		// minutes are worth 60 seconds. Hours are worth 60 minutes.
		var seconds = (+a[0]) * 60 * 60 + (+a[1]) * 60 + (+a[2]); 
		return seconds;	
 	}
  }  



//save time to local storage
 // var localSavedTime = localStorage.getItem("time-{{$task['id']}}");
 // savedTime.val(localSavedTime); 
 // if(localSavedTime != undefined || localSavedTime != null){
 // 	timer.html(localSavedTime)
 // }
</script>