@extends('layouts.app')

@section('content')
	<!-- <form>
		<input type="text" name="valueToSearch" placeholder="Value To Search"><br><br>
		<input type="submit" name="search" value="Filter"><br><br>
	</form> -->
		<form>
			<div class="col-md-4" style="float: right; margin-top: 50px;">
	        	<strong> Total Income: {{$total_income}} </strong>

	    	</div>
		</form>
	<form class="form-horizontal" action="{{ route('sales.getDateFrom') }}" method="post">
        {{ method_field('POST') }}

		<div class="col-md-6" style="margin-left: 200px; margin-top: 15px;">
			<div class="col-md-3">
		        <input type="date" name="from_date" id="fromDate" placeholder="Date from"> 
			</div>
		   	<div class="col-md-3">
		        <input type="date" name="to_date" id="toDate" placeholder="Date to"> 
		   	</div>
		    <div class="col-md-5">
		        <button type="submit" id="Filter" name="Filter" class="btn btn-primary">Submit</button>
		   </div>
		</div>
		{{ csrf_field() }}
	</form>
	<div class="panel">

		<table class="table table-responsive" style="width: 70%" align="center">
			
			<tr>
				<th>ITEM CODE</th>
				<th>ITEM NAME</th>
				<th>DESCRIPTION</th>
				<th>ITEM PRICE</th>
				<th>QUANTITY</th>
				<th>TOTAL</th>
				<th>DATE</th>
			</tr>

			@foreach ($sales as $sale)
				<tr>
				
				    <td>{{$sale->id}}</td>
				    <td>{{$sale->item_name}}</td>
				    <td>{{$sale->description}}</td>
				    <td>{{$sale->item_price}}</td>
					<td>{{$sale->quantity}}</td>
					<td>{{$sale->total}}</td>
					<td>{{$sale->date}}</td>
				</tr>
			@endforeach
			<!--  -->
		</table>
	</div>
		
	
@endsection

 
