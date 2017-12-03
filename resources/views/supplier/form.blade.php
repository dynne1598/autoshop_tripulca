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
         <form class="form-horizontal" method="POST" action="{{ action('SupplierController@update', $supplier->id) }}">
                        {{ csrf_field() }}
{{ method_field('PATCH') }}
                        <input name="_method" value="PUT" type="hidden">
                        <div class="form-group{{ $errors->has('item_name') ? ' has-error' : '' }}">
                            <label for="item_name" class="col-md-4 control-label">Item Name</label>

                            <div class="col-md-6">
                                <input id="item_name" type="item_name" class="form-control" name="item_name" value="{{ $supplier->item_name }}" required autofocus>

                            </div>
                        </div>

                       <div class="form-group{{ $errors->has('stock_code') ? ' has-error' : '' }}">
                            <label for="stock_code" class="col-md-4 control-label">Stock Code</label>

                            <div class="col-md-6">
                                <input id="stock_code" type="stock_code" class="form-control" name="stock_code" value="{{ $supplier->stock_code }}" required>

                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                            <label for="description" class="col-md-4 control-label">Description</label>

                            <div class="col-md-6">
                                <input id="description" type="description" class="form-control" name="description" value="{{ $supplier['stock'][0]->description }}" required>
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('category') ? ' has-error' : '' }}">
                            <label for="category" class="col-md-4 control-label">Category</label>

                            <div class="col-md-6">
                                <input id="category" type="category" class="form-control" name="category" value="{{ $supplier['stock'][0]->category }}" required>
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('item_price') ? ' has-error' : '' }}">
                            <label for="item_price" class="col-md-4 control-label">Item Price</label>

                            <div class="col-md-6">
                                <input id="item_price" type="number" class="form-control" name="item_price" value="{{ $supplier->item_price }}" required>
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('unit_cost') ? ' has-error' : '' }}">
                            <label for="unit_cost" class="col-md-4 control-label">Unit Cost</label>

                            <div class="col-md-6">
                                <input id="unit_cost" type="number" class="form-control" name="unit_cost" value="{{ $supplier->unit_cost }}" required>
                            </div>
                        </div>



                        <div class="form-group{{ $errors->has('quantity') ? ' has-error' : '' }}">
                            <label for="quantity" class="col-md-4 control-label">Quantity</label>

                            <div class="col-md-6">
                                <input id="quantity" type="number" class="form-control" name="quantity" value="{{ $supplier['stock'][0]->quantity}}" required>
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('supplier_name') ? ' has-error' : '' }}">
                            <label for="supplier_name" class="col-md-4 control-label">Supplier</label>

                            <div class="col-md-6">
                              <input id="supplier_name" type="supplier_name" class="form-control" name="supplier_name" value="{{ $supplier->supplier_name }} " required >
                       </div>

                        <div class="modal-footer">
                              <button type="submit" class="btn btn-primary">Submit</button>
                            </a>
                        </div>
                    </form>
              </div>
         </div>
     </div>
</td>  

      
@endsection   