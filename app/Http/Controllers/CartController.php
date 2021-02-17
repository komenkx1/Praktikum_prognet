<?php

namespace App\Http\Controllers;

use App\Models\Products;
use App\Models\Carts;
use Illuminate\Http\Request;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $data = Carts::join('products','carts.product_id','=','products.id')
         ->where('user_id',"=",'1')
         ->select(
            \DB::raw('SUM(carts.qty) as quantity'),
            'products.product_name as name',
            'products.id as product_id',
            
          )
         ->groupBy('products.product_name', 'products.id')
         ->get();
         $sen = $data->toArray();
        return response()->json([
        'status' => true,
        'result' => $sen
    ], 200);
    }
    

    public function count()
    {
        $data = Carts::join('products','carts.product_id','=','products.id')
         ->where('user_id',"=",'1')
         ->select(
            \DB::raw('SUM(carts.qty) as quantity'),
            'products.product_name as name',
            'products.id as product_id',
          )
         ->groupBy('products.product_name', 'products.id')
         ->get()->count();
        return json_encode($data);
    }

    public function totalprice()
    {
        $data = Carts::join('products','carts.product_id','=','products.id')
        ->select(\DB::raw('SUM(products.price) as total'))
         ->where('user_id',"=",'1')
         ->get();
         return json_encode($data);
       
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
        $carts = new Carts;
        if ($request->stock < 1) {
             echo 'stok habis';
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
    }
        // dd($carts);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Carts  $cart
     * @return \Illuminate\Http\Response
     */
    public function show(Carts $cart)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Carts  $cart
     * @return \Illuminate\Http\Response
     */
    public function edit(Carts $cart)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Carts  $cart
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Carts $cart)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Carts  $cart
     * @return \Illuminate\Http\Response
     */
    public function destroy(Carts $cart)
    {
        //
    }
}