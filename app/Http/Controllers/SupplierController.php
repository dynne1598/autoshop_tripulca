<?php

namespace App\Http\Controllers;

use App\Supplier;
use App\Stock;
use Illuminate\Http\Request;

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
            'stock_code' => $request->input('stock_code'),
            'item_name' => $request->input('item_name'),
        ];

        $supplier = Supplier::create($data_supp);

        $data_stock = [
            'item_price' => $request->input('item_price'),
            'item_name' => $request->input('item_name'),
            'quantiy' => $request->input('qty'),
            'supplier_id' => '1',
            'description' => $request->input('description'),
            'category' => $request->input('category')
        ];
        $stock = new Stock($data_stock);
        $stock->supplier()->associate($data_stock);
        $stock->save();

        die;

        
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

        \Session::flash('message', 'Successfully deleted the nerd!');
        return \Redirect::to('supplier');
    }
}
