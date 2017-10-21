@extends('layouts.app')

@section('content')
	<!-- <form>
		<input type="text" name="valueToSearch" placeholder="Value To Search"><br><br>
		<input type="submit" name="search" value="Filter"><br><br>
	</form> -->
	<div class="panel">
		<table class="table table-responsive" style="width: 70%" align="center">
			
			<tr>
				<th>TRANSACTION CODE</th>
				<th>ITEM CODE</th>
				<th>ITEM NAME</th>
				<th>ITEM PRICE</th>
				<th>DATE PURCHASED</th>
				<th>TOTAL</th>
			</tr>
			@foreach ($invoice as $invoice)
				<tr>
				
				    <td>{{$invoice->transaction_code }}</td>
				    <td>{{$invoice->item_code}}</td>
				    <td>{{invoice->item_name}}</td>
				    <td>{{$invoice->item_price}}</td>
				    <td>{{$invoice->date_purchased}}</td>
					<td>{{$invoice->total}}</td>   
				</tr>
			@endforeach
			<!--  -->
		</table>s
	</div>

	
@endsection


