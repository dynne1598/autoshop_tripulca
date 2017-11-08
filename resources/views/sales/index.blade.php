@extends('layouts.app')

@section('content')
	<!-- <form>
		<input type="text" name="valueToSearch" placeholder="Value To Search"><br><br>
		<input type="submit" name="search" value="Filter"><br><br>
	</form> -->

  <div class="col-md-6">
        <input type="text" name="Item name" placeholder="Item name"> 
        <button type="button" class="btn btn-primary">Filter</button>
   </div>

	<div class="panel">
		<table class="table table-responsive" style="width: 70%" align="center">
			
			<tr>
				<th>ITEM CODE</th>
				<th>ITEM NAME</th>
				<th>DESCRIPTION</th>
				<th>ITEM PRICE</th>
				<th>QUANTITY</th>
				<th>TOTAL</th>
			</tr>

			@foreach ($sales as $sales)
				<tr>
				
				    <td>{{$sales->id}}</td>
				    <td>{{$sales->item_name}}</td>
				    <td>{{$sales->description}}</td>
				    <td>{{$sales->item_price}}</td>
					<td>{{$sales->quantity}}</td>
					<td>{{$sales->total}}</td>
				</tr>
			@endforeach
			<!--  -->
		</table>
	</div>
		<form>
		 <div class="col-md-6">
            <input type="text" name="Item name" placeholder="Item name">
        	<input type="text" class="total income">Total Income</button>
    	</div>
		</form>
	
@endsection

 
