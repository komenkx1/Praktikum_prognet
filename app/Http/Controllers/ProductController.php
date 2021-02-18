<?php

namespace App\Http\Controllers;

use App\Models\Products;
use App\Models\Carts;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Products::all();
        $carts = Carts::join('products','carts.product_id','=','products.id')
         ->where('user_id',"=",'1')
         ->where('status','=','notyet')
         ->select(
            \DB::raw('SUM(carts.qty) as quantity'),
            'products.product_name as name',
            'products.id as product_id',
            )
         ->groupBy('products.product_name', 'products.id')
         ->get()->all();

         $total = Carts::join('products','carts.product_id','=','products.id')
         ->select(\DB::raw('SUM(products.price) as total'))
         ->where('user_id',"=",'1')
         ->where('status','=','notyet')
         ->get()->first();
        //  dd($carts);
        return view('index',compact('products','carts','total'));
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
     public function stock()
    {
        $data = Products::select('stock')->get();
        $sen = $data->toArray();
        return response()->json([
        'status' => true,
        'stocks' => $sen
    ], 200);
       
    }
    public function store(Request $request)
    {
     
        $carts = new Carts;
        if ($request->stock < 1) {
           echo 'stock habis';
        }else{
        $stock = $request->stock-1;
        Products::where('id',"=",$request->id)->update([
                'stock' => $stock,
            ]);
       
    
    $carts->product_id = $request->id;
    $carts->user_id  = 1;
    $carts->qty = 1;
    $carts->status = 'notyet';
    $carts->save();
    return redirect('checkout');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Products  $products
     * @return \Illuminate\Http\Response
     */
    public function show(Products $products)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Products  $products
     * @return \Illuminate\Http\Response
     */
    public function edit(Products $products)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Products  $products
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Products $products)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Products  $products
     * @return \Illuminate\Http\Response
     */
    public function destroy(Products $products)
    {
        //
    }
}