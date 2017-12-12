@extends('layouts.app')

@section('content')
	
	<div class="panel">
		

		  <div role="tabpanel">
		 	 <ul class="nav nav-tabs nav-justified" role="tablist">
			    <li class="active"><a href="#account" data-toggle="tab">Account logs</a></li>
			    <li><a href="#stock" data-toggle="tab">Stock logs</a></li>   
			</ul>

		<div class="tab-content">
		    <div class="tab-pane active" id="account">

		    	<table class="table table-responsive" style="width: 70%" align="center">

					<tr>
						<th>ID</th>
						<th>ACTION</th>
						<th>DATE</th>
					</tr>
					@foreach ($acc_logs as $acc_log)
						<tr>
						    <td>{{$acc_log->id}}</td>
						    <td>{{$acc_log->action}}</td>
						    <td>{{$acc_log->date}}</td>
						</tr>
					@endforeach
				</table>	


		    </div>
		    <div class="tab-pane" id="stock">
		    	<table class="table table-responsive" style="width: 70%" align="center">

					<tr>
						<th>ID</th>
						<th>ACTION</th>
						<th>DATE</th>
					</tr>
					@foreach ($stock_logs as $stock_log)
						<tr>
						    <td>{{$stock_log->id}}</td>
						    <td>{{$stock_log->action}}</td>
						    <td>{{$stock_log->date}}</td>
						</tr>
					@endforeach
				</table>
		    </div>
		</div>

	</div>
@endsection
