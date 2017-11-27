<?php

namespace App\Http\Controllers;

use App\Supplier;
use App\Stock;
use Illuminate\Http\Request;
use App\Events\SupplierCreate;
use App\Http\Controllers\LogsController;



class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $supplier = Supplier::all();
        // \Session::flash('flash_message','You are now logged in!.'){{ Auth::user()->name }};
        return view('/supplier/index', compact('supplier'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {  

        $data_supp = [
            'supplier_name' => $request->input('supplier_name'),
            'unit_cost' => $request->input('unit_cost'),
            'stock_code' => $request->input('stock_code'),
            'item_name' => $request->input('item_name'),
            'item_price' => $request->input('item_price')
            // 'created_at' => date('Y-d-m')
        ];

        $supplier = Supplier::create($data_supp);
    
        $stock = new Stock();
        $stock->item_name = $request->input('item_name');
        $stock->description = $request->input('description');
        $stock->category = $request->input('category');
        $stock->quantity =$request->input('quantity');     

        $supplier->stock()->save($stock);

        // para maka add sa item
        $action ='Added new stock ' . $stock->item_name;
        (new LogsController)->store('stock', $action);
        
        return redirect()->route('supplier.index')
                        ->with('success','Item created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function show(Supplier $supplier)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

       $supplier = Supplier::find($id);
       $supplier['stock'] = $supplier->stock()->get();
       return view('supplier.form', compact('supplier'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function update($id, Supplier $supplier)
    {
        $supply = Supplier::findOrFail($id);

            $this->validate($request, [
                'item_name' => 'required|string|max:255',
                'stock_code' => 'required',
                'description' => 'required|string|max:255',
                'category' => 'required|string|max:255',
                'item_price' => 'required',
                'unit_cost' => 'required',
                'quantity' => 'required',
                'supplier' => 'required|string|max:255',
            ]);
            $supply->update([

                 'item_name' => $request['item_name'],
                'stock_code' => $request['stock_code'],
                'description' => $request['description'],
                'category' => $request['category'],
                'item_price' => $request['item_price'],
                'unit_cost' => $request['unit_cost'],
                'quantity' => $request['quantity'],
                'supplier' => $request['supplier'],

            ]);

        $supply = Supplier::findOrFail($request['$id']);

        $action = 'Updated stock '.$supply->item_name;
        (new LogsController)->store('stock', $action);



    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $supply = Supplier::find($id); 
        $supply->delete();   
        $supply->stock()->delete();

        $action ='Deleted stock ' . $supply->item_name;
        (new LogsController)->store('stock', $action);


        \Session::flash('message', 'Successfully deleted the nerd!');
        return \Redirect::to('supplier');
    }
}
