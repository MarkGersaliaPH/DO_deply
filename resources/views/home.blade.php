@extends('layouts.app')

@section('content')
<div class="container-fluid">
	<br>
	<div class="animated fadeIn">
		<div class="row">
			<div class="col-sm-3">
				<div class="card card-info"> 
					<div class="card-body">
						{{-- {!! $chart->container() !!} --}}

					</div>
				</div>
			</div>
			<div class="col-sm-6"> 
				<div class="card">
					<div class="card-header">
					Sales Report
					<div class="card-header-actions"> 
						<select   id="year">
						@for($i = $now->year;$i >= 2010; $i --)
							<option {{$now->year == $i ? 'selected default hidden' : ''}}>{{$i}}</option>
							{{-- <option>{{}}</option> --}}
						@endfor
						</select>

						<select id="month">
							@php
								$month = ['January','February','March','April','May','June','July','August','September','October','November','December'];
							@endphp
							@foreach($month as $key => $month)

								@if($now->format('F') == $month)
								<option selected default hidden value="{{$key}}">{{$month}}</option>
								@else
								<option value="{{$key + 1}}">{{$month}}</option>								
								@endif
							@endforeach 
						</select> 
						<button  id="filter">Filter</button> 
					</div>
				</div> 
						
						<div class="embed-responsive embed-responsive-21by9" >
						  <iframe  id="sales" class="embed-responsive-item"></iframe>
						</div>	
					</div> 
			</div>
		</div>
	</div>
</div>
{{-- 
{!! $chart->script() !!}
{!! $sales->script() !!}
 --}}
@section('scripts') 
<script type="text/javascript">
	$('#sales').attr('src',"{{url('widgets/sales')}}")


	$('#filter').on('click',function(){
		year = $('#year').val();
		month = $('#month').val();
		url = "{{url('widgets/sales/')}}/" + month + '/' + year ;
		console.log(url);
		$('#sales').attr('src',url);		
	})
</script>
@endsection
@endsection
