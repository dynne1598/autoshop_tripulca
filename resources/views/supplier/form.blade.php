@extends('layouts.app')

@section('content')

  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="edit"><b>Want to do changes?</b></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
         <form class="form-horizontal" method="POST" action="{{ route('supplier.update', $supplier->id) }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('Item Name') ? ' has-error' : '' }}">
                            <label for="Item Name" class="col-md-4 control-label">Item Name</label>

                            <div class="col-md-6">
                                <input id="Item Name" type="Item Name" class="form-control" name="item name" value="{{ $supplier->item_name }}" required autofocus>

                            </div>
                        </div>

                       <div class="form-group{{ $errors->has('stock_code') ? ' has-error' : '' }}">
                            <label for="stock_code" class="col-md-4 control-label">Stock Code</label>

                            <div class="col-md-6">
                                <input id="stock_code" type="stock_code" class="form-control" name="stock_code" value="{{ $supplier->stock_code }}" required>

                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('Description') ? ' has-error' : '' }}">
                            <label for="Description" class="col-md-4 control-label">Description</label>

                            <div class="col-md-6">
                                <input id="Description" type="Description" class="form-control" name="description" value="{{ $supplier['stock'][0]->description }}" required>
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('Category') ? ' has-error' : '' }}">
                            <label for="Category" class="col-md-4 control-label">Category</label>

                            <div class="col-md-6">
                                <input id="Category" type="Category" class="form-control" name="category" value="{{ $supplier['stock'][0]->category }}" required>
                       </div>
                        </div>

                        <div class="form-group{{ $errors->has('Item Price') ? ' has-error' : '' }}">
                            <label for="Item Price" class="col-md-4 control-label">Item Price</label>

                            <div class="col-md-6">
                                <input id="Item Price" type="number" class="form-control" name="item_price" value="{{ $supplier->item_price }}" required>
                            </div>
                        </div>


                        <div class="form-group{{ $errors->has('Item Price') ? ' has-error' : '' }}">
                            <label for="Item Price" class="col-md-4 control-label">Quantity</label>

                            <div class="col-md-6">
                                <input id="quantity" type="number" class="form-control" name="qty" value="{{ $supplier['stock'][0]->quantity}}" required>
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('Supplier') ? ' has-error' : '' }}">
                            <label for="Supplier" class="col-md-4 control-label">Supplier</label>

                            <div class="col-md-6">
                              <input id="Supplier" type="Supplier" class="form-control" name="supplier_name" value="{{ $supplier->supplier_name }} " required >
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
</td>   
@endsection