<?php

namespace App\Http\Controllers;

use App\Supplier;
use App\Stock;
use Illuminate\Http\Request;
use App\Events\SupplierCreate;

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
            'item_price' => $request->input('item_price'),
            'created_at' => date('Y-d-m')
        ];

        $supplier = Supplier::create($data_supp);
    
        $stock = new Stock();
        $stock->item_name = $request->input('item_name');
        $stock->description = $request->input('description');
        $stock->category = $request->input('category');
        $stock->quantity =$request->input('quantity');     

        $supplier->stock()->save($stock);
        // event(new SupplierCreate($supplier ,$stock_data));
        // $data_stock = [
        //     'item_price' => $request->input('item_price'),
        //     'item_name' => $request->input('item_name'),
        //     'quantiy' => $request->input('quantity'),
        //     'description' => $request->input('description'),
        //     'category' => $request->input('category')
        // ];
        // $stock = new Stock($data_stock);
        // $stock->supplier()->associate($request->input('item_price'), $request->input('item_name'), $request->input('quantity'), $request->input('description'), $request->input('category'), $request->input('supplier_name'));
                
        // $stock->save();

        
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
    public function edit(Supplier $supplier)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Supplier $supplier)
    {
        //
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

        \Session::flash('message', 'Successfully deleted the nerd!');
        return \Redirect::to('supplier');
    }
}
