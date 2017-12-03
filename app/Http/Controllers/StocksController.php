<?php

namespace App\Http\Controllers;

use App\Stock;
use App\Supplier;
use Illuminate\Http\Request;
use App\Sale;
use Auth;

class StocksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $supplier = Supplier::orderBy('id')->with('stock')->get();
        return view('/stocks/index', compact('supplier'));
        //nadungag
        // $stocks = Stock::with('supplier')->get();

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
           //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Stocks  $stocks
     * @return \Illuminate\Http\Response
     */
    public function show(Stock $stocks)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Stocks  $stocks
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $stock = Stock::find($id);
        $stock['supplier'] = $stock->supplier()->get();
       // return compact('stock');
       return view('stocks.edit', compact('stock'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Stocks  $stocks
     * @return \Illuminate\Http\Response
     */
    public function update($id, Stock $request)
    {
        //para makita ang parsed
       return compact('request');
       
        $stock = Stock::find($id);
        $this->validate($request,[
            'item_name' => 'required',
            'stock_code' => 'required',
            'description' => 'required',
            'category' => 'required',
            'item_price' => 'required',
            'unit_cost' => 'required',
            'quantity' => 'required',
            'supplier' => 'required',

        ]);
            $stock->update([

                'item_name' => $request['item_name'],
                'stock_code' => $request['stock_code'],
                'description' => $request['description'],
                'category' => $request['category'],
                'item_price' => $request['item_price'],
                'unit_cost' => $request['unit_cost'],
                'quantity' => $request['quantity'],
                'supplier' => $request['supplier'],

            ]);
    }
//     //para ma minus-san tong qty sa stocks
    public function buy($id, $quantity) {

        $stocks = Stock::find($id);
        $stocks['supplier'] = $stocks->supplier()->get();
        
        $final_qty = $stocks->quantity - $quantity;
        $result = Stock::where('id', $id)->update(['quantity'=> $final_qty]);


        $data_sales = [
            'item_name' => $stocks->item_name,
            'description' => $stocks->description,
            'item_price' => $stocks['supplier'][0]->item_price,
            'quantity' => $final_qty,
            'total' => 0
            // 'created_at' => date('Y-d-m')
        ];

        $sales = Sale::create($data_sales);
        
        if(Auth::User()->role == "Super Admin"){
            return redirect('sales');
        }else{
            return back();
        }

        
    }

   
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Stocks  $stocks
     * @return \Illuminate\Http\Response
     */
    public function destroy(Stocks $stocks)
    {
         
    }
}
