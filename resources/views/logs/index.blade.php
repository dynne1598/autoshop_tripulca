@extends('layouts.app')

@section('content')
	<div>
		<input type="text" name="valueToSearch" placeholder="Value To Search"><br><br>
		<input type="submit" class="btn btn-primary" value="Filter"><br><br>
	</div>
	<div class="panel">
		<table class="table table-responsive" style="width: 70%" align="center">
	
		
			<tr>
				<th>ID</th>
				<th>ACTION</th>
				<th>DATE</th>
			</tr>

			@foreach ($logs as $logs)
				<tr>
				    <td>{{$logs->id}}</td>
				    <td>{{$logs->action}}</td>
				    <td>{{$logs->date}}</td>
				</tr>
			@endforeach
		 <div role="tabpanel">

        <!-- Nav tabs -->
        <ul class="nav nav-tabs nav-justified" role="tablist">
            <li role="presentation" class="active">
		      <a href="#logs" aria-controls="logs" role="tab" data-toggle="tab">
		        Account logs
		       </a>
      		</li>
			<li role="presentation">
	          <a href="#Stock" aria-controls="Stock" role="tab" data-toggle="tab">
	            Stock logs
	          </a>
	 		</li>
	 	</ul>
            

     	<!-- <ul class="nav nav-tabs nav-justified" role="tablist">
		  <li class="active"><a href="#">Account logs</a></li>
		  <li><a href="#">Menu 1</a></li>
		  <li><a href="#">Menu 2</a></li>
		  <li><a href="#">Menu 3</a></li>
		</ul>

		<ul class="nav nav-tabs nav-justified" role="tablist">
		  <li class="active"><a href="#">Stock logs</a></li>
		  <li><a href="#">Menu 1</a></li>
		  <li><a href="#">Menu 2</a></li>
		  <li><a href="#">Menu 3</a></li>
		</ul> -->
	
		</table>
		

	</div>
@endsection
