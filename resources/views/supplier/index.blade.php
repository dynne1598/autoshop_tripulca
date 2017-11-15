@extends('layouts.app')

@section('content')

		<!-- Button trigger modal -->

        <div id="modal">
           <div class="col-md-6">
          <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
            New item
          </button>
        </div>
      
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"><b>Add new item</b></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

<div class="modal-body">
         <form class="form-horizontal" method="POST" action="{{ route('supplier.store') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('Item Name') ? ' has-error' : '' }}">
                            <label for="Item Name" class="col-md-4 control-label">Item Name</label>

                            <div class="col-md-6">
                                <input id="Item Name" type="Item Name" class="form-control" name="item name" value="{{ old('Item Name') }}" required autofocus>

                            </div>
                        </div>

                       <div class="form-group{{ $errors->has('stock_code') ? ' has-error' : '' }}">
                            <label for="stock_code" class="col-md-4 control-label">Stock Code</label>

                            <div class="col-md-6">
                                <input id="stock_code" type="stock_code" class="form-control" name="stock_code" value="{{ old('stock
                                _code ') }}" required>

                            </div>
                        </div>


                        <div class="form-group{{ $errors->has('Description') ? ' has-error' : '' }}">
                            <label for="Description" class="col-md-4 control-label">Description</label>

                            <div class="col-md-6">
                                <input id="Description" type="Description" class="form-control" name="description" required>
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('Category') ? ' has-error' : '' }}">
                            <label for="Category" class="col-md-4 control-label">Category</label>

                            <div class="col-md-6">
                                <input id="Category" type="Category" class="form-control" name="category" value="{{ old('Category') }}" required>
                       </div>
                        </div>

                        <div class="form-group{{ $errors->has('Item Price') ? ' has-error' : '' }}">
                            <label for="Item Price" class="col-md-4 control-label">Item Price</label>

                            <div class="col-md-6">
                                <input id="Item Price" type="number" class="form-control" name="item_price" value="{{ old('Item Price') }}" required>
                            </div>
                        </div>

                         <div class="form-group{{ $errors->has('Item Price') ? ' has-error' : '' }}">
                            <label for="unit_cost" class="col-md-4 control-label">Unit Cost</label>

                            <div class="col-md-6">
                                <input id="unit_cost" type="number" class="form-control" name="unit_cost" value="{{ old('unit_cost') }}" required>
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('Quantity') ? ' has-error' : '' }}">
                            <label for="Quantity" class="col-md-4 control-label">Quantity</label>

                            <div class="col-md-6">
                                <input id="quantity" type="number" class="form-control" name="quantity" value="{{ old('quantity') }}" required>
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('Supplier') ? ' has-error' : '' }}">
                            <label for="Supplier" class="col-md-4 control-label">Supplier</label>

                            <div class="col-md-6">
                                <input id="Supplier" type="Supplier" class="form-control" name="supplier_name" value="{{ old('Supplier') }}" required>
                       </div>
                        </div>


                       <!--  <div class="form-group{{ $errors->has('Date') ? ' has-error' : '' }}">
                            <label for="Date" class="col-md-4 control-label">Date</label>

                            <div class="col-md-6">
                                <input id="Date" type="date" class="form-control" name="date" value="{{ old('Date') }}" required>
                             </div>
                        </div> -->
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                           <button type="submit" class="btn btn-primary">
                                    Add Item
                                </button>
                        </div>
                    </form>
      </div>
    
    </div>
  </div>
</div>
	<div class="panel">
		<table class="table table-responsive" style="width: 70%" align="center">
			
			<tr>
				<th>SUPPLIER NAME</th>
				<th>STOCK CODE</th>
				<th>ITEM NAME</th>
				<th>DATE OF PURCHASE</th>
				<th>ITEM PRICE</th>
        <th>UNIT COST</th>
				<td>Action</td>
			</tr>
			@foreach ($supplier as $supplier)
				<tr>
				
				    <td>{{$supplier->supplier_name }}</td>
				    <td>{{$supplier->stock_code}}</td>
				    <td>{{$supplier->item_name}}</td>
				    <td>{{$supplier->created_at}}</td>
				    <td>{{$supplier->item_price}}</td>
            <td>{{$supplier->unit_cost}}</td>
					
            <td>
              
            <div id="modal">
              <div class="col-md-6">
              <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delete">Delete</button>
           </div>

      <div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="delete" aria-hidden="true">
        <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
           <h5 class="modal-title" id="#delete"><b>Delete?</b></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
           <span aria-hidden="true">&times;</span>
        </button>
        </div>

    <div class="modal-body" id="delete">
          <p>Are you sure you want to delete the existing file?</p>
        </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
        <form class="form-horizontal" method="POST" action="{{ route('supplier.destroy', $supplier->id) }}">
          {{ csrf_field() }}
          <input type="hidden" name="_method" value="DELETE" />
          <button type="submit" class="btn btn-secondary">Confirm</button> 
        </form>
        
      </div>
  </td>
<!-- Edit button -->
<td>

<!-- <td><a class="btn mini blue-stripe" href="{site_url()}admin/editFront/2"></a></td> -->
    <div id="modal">
           <div class="col-md-6">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Edit</button>
        </div>

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"><b>Want to do changes?</b></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

<div class="modal-body">
         <form class="form-horizontal" method="POST" action="{{ route('supplier.store') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('Item Name') ? ' has-error' : '' }}">
                            <label for="Item Name" class="col-md-4 control-label">Item Name</label>

                            <div class="col-md-6">
                                <input id="Item Name" type="Item Name" class="form-control" name="item name" value="{{ old('Item Name') }}" required autofocus>

                            </div>
                        </div>

                       <div class="form-group{{ $errors->has('stock_code') ? ' has-error' : '' }}">
                            <label for="stock_code" class="col-md-4 control-label">Stock Code</label>

                            <div class="col-md-6">
                                <input id="stock_code" type="stock_code" class="form-control" name="stock_code" value="{{ old('stock
                                _code ') }}" required>

                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('Description') ? ' has-error' : '' }}">
                            <label for="Description" class="col-md-4 control-label">Description</label>

                            <div class="col-md-6">
                                <input id="Description" type="Description" class="form-control" name="description" required>
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('Category') ? ' has-error' : '' }}">
                            <label for="Category" class="col-md-4 control-label">Category</label>

                            <div class="col-md-6">
                                <input id="Category" type="Category" class="form-control" name="category" value="{{ old('Category') }}" required>
                       </div>
                        </div>

                        <div class="form-group{{ $errors->has('Item Price') ? ' has-error' : '' }}">
                            <label for="Item Price" class="col-md-4 control-label">Item Price</label>

                            <div class="col-md-6">
                                <input id="Item Price" type="number" class="form-control" name="item_price" value="{{ old('Item Price') }}" required>
                            </div>
                        </div>


                        <div class="form-group{{ $errors->has('Item Price') ? ' has-error' : '' }}">
                            <label for="Item Price" class="col-md-4 control-label">Quantity</label>

                            <div class="col-md-6">
                                <input id="quantity" type="number" class="form-control" name="qty" value="{{ old('qty') }}" required>
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('Supplier') ? ' has-error' : '' }}">
                            <label for="Supplier" class="col-md-4 control-label">Supplier</label>

                            <div class="col-md-6">
                                <input id="Supplier" type="Supplier" class="form-control" name="supplier_name" value="{{ old('Supplier') }}" required>
                       </div>
                        </div>


                        <div class="form-group{{ $errors->has('Date') ? ' has-error' : '' }}">
                            <label for="Date" class="col-md-4 control-label">Date</label>

                            <div class="col-md-6">
                                <input id="Date" type="date" class="form-control" name="date" value="{{ old('Date') }}" required>
                             </div>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                           <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>
                    </form>
            </div>
         </div>
     </div>
  </div>
</td>					

				</tr>
			@endforeach
			<!--  -->
		</table>
	</div>	
@endsection

