@extends('layouts.app')

@section('content')
	<form>
		<input type="text" name="valueToSearch" placeholder="Value To Search"><br><br>
		<input type="submit" name="search" value="Filter"><br><br>
	</form>
	<div class="panel">
		<table class="table table-responsive" style="width: 70%" align="center">
			
			<tr>
				<th>ITEM CODE</th>
				<th>ITEM NAME</th>
				<th>DESCRIPTION</th>
				<th>CATEGORY</th>
				<th>ITEM PRICE</th>
				<th>QUANTITY</th>
				<th>SUPPLIER</th>
				<th>DATE</th>
				<td>Action</td>
			</tr>
			@foreach ($stocks as $stock)
				<tr>
				
				    <td>{{ $stock->id }}</td>
				    <td>{{$stock->item_name}}</td>
				    <td>{{$stock->description}}</td>
				    <td>{{$stock->category}}</td>
				    <td>{{$stock->item_price}}</td>
					<td>{{$stock->quantity}}</td>
					<td>{{$stock->supplier}}</td>
					<td>{{$stock->created_at}}</td>
					<td>Delete
					|
					Edit</td>
				
				</tr>
			@endforeach
			<!--  -->
		</table>
	</div>

	
@endsection
