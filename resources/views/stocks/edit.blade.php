@extends('layouts.app')

@section('content')


  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h6 class="modal-title" id="edit"><b>Want to do changes?</b></h6>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

<div class="modal-body">
         <form class="form-horizontal" method="POST" action="{{ route('stocks.update', $stock->id) }}">
                        {{ csrf_field() }}
                        {{ method_field('PUT') }}
                        <div class="form-group{{ $errors->has('Item Name') ? ' has-error' : '' }}">
                            <label for="Item Name" class="col-md-4 control-label">Item Name</label>

                            <div class="col-md-6">
                                <input id="Item Name" type="Item Name" class="form-control" name="item name"  value="{{ $stock->item_name }}" required autofocus>

                            </div>
                        </div>

                       <div class="form-group{{ $errors->has('stock_code') ? ' has-error' : '' }}">
                            <label for="stock_code" class="col-md-4 control-label">Stock Code</label>

                            <div class="col-md-6">
                                <input id="stock_code" type="stock_code" class="form-control" name="stock_code" value="{{ $stock['supplier'][0]->stock_code }}" required>

                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('Description') ? ' has-error' : '' }}">
                            <label for="Description" class="col-md-4 control-label">Description</label>

                            <div class="col-md-6">
                                <input id="Description" type="Description" class="form-control" name="description" value="{{ $stock->description }}" required>
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('Category') ? ' has-error' : '' }}">
                            <label for="Category" class="col-md-4 control-label">Category</label>

                            <div class="col-md-6">
                                <input id="Category" type="Category" class="form-control" name="category" value="{{ $stock->category }}" required>
                       </div>
                        </div>

                        <div class="form-group{{ $errors->has('Item Price') ? ' has-error' : '' }}">
                            <label for="Item Price" class="col-md-4 control-label">Item Price</label>

                            <div class="col-md-6">
                                <input id="Item Price" type="number" class="form-control" name="item_price" value="{{ $stock['supplier'][0]->item_price }}" required>
                            </div>
                        </div>


                        <div class="form-group{{ $errors->has('Item Price') ? ' has-error' : '' }}">
                            <label for="Item Price" class="col-md-4 control-label">Quantity</label>

                            <div class="col-md-6">
                                <input id="quantity" type="number" class="form-control" name="qty" value="{{ $stock->quantity}}" required>
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('Supplier') ? ' has-error' : '' }}">
                            <label for="Supplier" class="col-md-4 control-label">Supplier</label>

                            <div class="col-md-6">
                                <input id="Supplier" type="Supplier" class="form-control" name="supplier_name" value="{{ $stock['supplier'][0]->supplier_name}}" required>
                       </div>
                        </div>

                        <div class="modal-footer">
                           <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
            </div>
         </div>
     </div>
  </div>
</td>	

@endsection	