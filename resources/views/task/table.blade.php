@foreach($tasks as $key => $task)

<tr class="{{getPriorityClass($task['priority'])}}">
	<td>{!! getPriorityIcon($task['priority']) !!} {{$task['priority']}}</td>
	<td><span id="title">@if($task['status'] == 'Completed') <strike> {{$task['task']}}</strike> @else {{$task['task']}}</span> @endif</td>
	<td style="width: 150px"> 
					<div class="progress" style="margin: 0">
				  <div class="progress-bar progress-bar-striped progress-bar-success active" role="progressbar"
				  aria-valuenow="{{$task['progress']}}" aria-valuemin="0" aria-valuemax="100" style="width:{{$task['progress']}}">
				    {{$task['progress']}}
				  </div>
</div>  
				 
	</td>
	<td class="text-center">
		<i class="fa fa-clock"></i> 
				  {{$task['time_spent'] ?? ''}}  </td>
	<td>{{$task['assigned_by']}}</td> 
	<td><label class="label label-{{getStatus($task['status'])}}">{{$task['status']}}</label></td>
	<td>{{$task['created_at']}}</td>
	<td><button class='btn btn-xs btn-warning' onclick='edit({{$task['id']}})'><i class="fa fa-edit"></i></button>
	<button class='btn btn-xs btn-success' onclick='view({{$task['id']}})'><i class="fa fa-eye"></i> </button>
	<button class='btn btn-xs btn-danger'  onclick='remove({{$task['id']}})'><i class="fa fa-trash"></i></button></td> 
</tr>
@endforeach


<style type="text/css">
	.bg-white{background-color: #fff;}
</style>