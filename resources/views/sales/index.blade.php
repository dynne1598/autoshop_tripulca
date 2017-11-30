@extends('layouts.app')

@section('content')
	<!-- <form>
		<input type="text" name="valueToSearch" placeholder="Value To Search"><br><br>
		<input type="submit" name="search" value="Filter"><br><br>
	</form> -->
		<form>
			<div class="col-md-4" style="float: right; margin-top: 50px;">
	        	<input type="text" class="total income"><strong> Total Income </strong></button>
	    	</div>
		</form>

	<div class="col-md-6" style="margin-left: 200px; margin-top: 15px;">
		<div class="col-md-3">
	        <input type="text" name="fromDate" id="fromDate" placeholder="Date from"> 
	   </div>
	   <div class="col-md-3">
	        <input type="text" name="toDate" id="toDate" placeholder="Date to"> 
	   </div>
	    <div class="col-md-5">
	        <button type="button" id="Filter" name="Filter" class="btn btn-primary">Filter</button>
	   </div>
	</div>

	<div class="panel">

		<table class="table table-responsive" style="width: 70%" align="center">
			
			<tr>
				<th>ITEM CODE</th>
				<th>ITEM NAME</th>
				<th>DESCRIPTION</th>
				<th>ITEM PRICE</th>
				<th>QUANTITY</th>
				<th>DATE</th>
				<th>TOTAL</th>
			</tr>

			@foreach ($sales as $sale)
				<tr>
				
				    <td>{{$sale->id}}</td>
				    <td>{{$sale->item_name}}</td>
				    <td>{{$sale->description}}</td>
				    <td>{{$sale->item_price}}</td>
					<td>{{$sale->quantity}}</td>
					<td>{{$sale->created_at}}</td>
					<td>{{$sale->total}}</td>
				</tr>
			@endforeach
			<!--  -->
		</table>
	</div>
		
	
@endsection

 
