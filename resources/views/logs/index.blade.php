@extends('layouts.app')

@section('content')
	<form>
		<input type="text" name="valueToSearch" placeholder="Value To Search"><br><br>
		<input type="submit" name="search" value="Filter"><br><br>
	</form>
	<div class="panel">
		<table class="table table-responsive" style="width: 70%" align="center">
			
			<tr>
				<th>ITEM LOG</th>
				<th>STOCK LOG</th>
				<th>ACCOUNT LOG</th>
				<th>LOGIN HISTORY</th>
			</tr>

			@foreach ($logs as $logs)
				<tr>
				    <td>{{$logs->item_log}}</td>
				    <td>{{$logs->stock_log}}</td>
				    <td>{{$logs->account_log}}</td>
					<td>{{$logs->login_history}}</td>
				</tr>
			@endforeach
			<!--  -->
		</table>
	</div>
@endsection
