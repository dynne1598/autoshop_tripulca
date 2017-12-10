<?php

namespace App\Http\Controllers;

use App\Sale;
use App\User;
use Auth;
use Illuminate\Http\Request;

class SalesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::User()->role == 'Super Admin' || Auth::User()->role == 'Admin'){
            $sales = Sale::all();
            
            $total_income = $this->calculateTotal($sales);
            return view('/sales/index', compact('sales', 'total_income'));
        }
        return back();
    }
    
      public function __construct()
    {
        $this->middleware('auth');
    }

    // function date from/to
    public function getDateFrom(Request $request)
    {
        $sales = null;
        try {
            $sales = \DB::table('sales')->whereBetween('date', array($request->input('from_date'), $request->input('to_date')))->get();

        } catch (\Exception $e) {
            // 
        }
        $total_income = $this->calculateTotal($sales);
        return view('/sales/index', compact('sales','total_income'));
    }


    public function calculateTotal($data)
    {
        $total = 0;
        foreach ($data as $key => $value) {
         $total = $total + ($value->quantity * $value->item_price);
        }
        return $total;
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
     * @param  \App\Sales  $sales
     * @return \Illuminate\Http\Response
     */
    public function show(Sale $sales)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Sales  $sales
     * @return \Illuminate\Http\Response
     */
    public function edit(Sale $sales)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Sales  $sales
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Sale $sales)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Sales  $sales
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sale $sales)
    {
        //
    }
}
