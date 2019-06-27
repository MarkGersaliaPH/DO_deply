 
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css">

<script src="http://code.jquery.com/jquery-3.3.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js" charset="utf-8"></script>

		
  
				{!! $chart->container() !!} 

{!! $chart->script() !!}
<script type="text/javascript">
	 window.{{ $chart->id }}
</script>