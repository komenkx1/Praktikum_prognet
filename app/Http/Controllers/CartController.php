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
    public function index(Request $request)
    {
         $carts = Carts::join('products','carts.product_id','=','products.id')
         ->where('user_id',"=",'1')
         ->where('status','=','notyet')
         ->select(
            \DB::raw('products.price * carts.qty as subprice'),
            'products.product_name as name',
            'carts.qty as quantity',
            'carts.id',
            'products.id as product_id',
            'products.price',
            'products.stock',)
         ->get();


         $total = Carts::join('products','carts.product_id','=','products.id')
         ->select(\DB::raw('SUM(products.price * carts.qty) as total'))
          ->where('user_id',"=",'1')
          ->where('status','=','notyet')
          ->get()->first();

         if ($request->ajax()) {
         foreach ($carts as $cart) {
            $output = '<li class="kobolg-mini-cart-item mini_cart_item">
            <a href="javascript:void(0)" data-id="'.$cart->id.'" class="delete remove remove_from_cart_button">×</a>
            <a href="#">
                <img src="assets/images/apro134-1-600x778.jpg"
                     class="attachment-kobolg_thumbnail size-kobolg_thumbnail"
                     alt="img" width="600" height="778">'.$cart->name.'</a>
            <span class="quantity">'.$cart->quantity.' × <span
                    class="kobolg-Price-amount amount"><span
                    class="kobolg-Price-currencySymbol">'."Rp " . number_format($cart->price,2,',','.').'</span>
        </li>';
            echo ($output);
        }
    }else{
    return view('carts',compact('carts','total'));
}
    }
    

    public function count()
    {
        $data = Carts::join('products','carts.product_id','=','products.id')
         ->where('user_id',"=",'1')
         ->where('status','=','notyet')
         ->get()->count();
        return json_encode($data);
    }

    public function totalprice()
    {
        $data = Carts::join('products','carts.product_id','=','products.id')
        ->select(\DB::raw('SUM(products.price * carts.qty) as total'))
         ->where('user_id',"=",'1')
         ->where('status','=','notyet')
         ->get();

         foreach ($data as $total ) {
            $output = ' <span class=" kobolg-Price-currencySymbol" id="total">Rp ' . number_format($total->total,2,',','.').'</span>';
            echo ($output);
         }
       
       
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
        $checkCarts = $carts->where('user_id','=','1')
        ->where('product_id','=', $request->id)
        ->where('status','=', 'notyet')
        ->get()->first();
      
        if ($request->stock < 1) {
             echo 'stok habis';
        }else{
            if ($checkCarts) {

            if ($checkCarts->product_id == $request->id ) {
                $qty = $checkCarts->qty+1;
                Carts::where('user_id','=','1')
                ->where('product_id','=', $request->id)
                ->where('status','=', 'notyet')
                ->update([
                        'qty' => $qty,
                    ]);
            }
                        }else{
                            $carts->product_id = $request->id;
                            $carts->user_id  = 1;
                            $carts->qty = 1;
                            $carts->status = 'notyet';
                            $carts->save();
                        }
                        echo 'Product Ditambahkan Ke Keranjang';
      
    }
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
        foreach ($request->id as $key => $value) {

            Carts::where('id',"=",$request->id[$key])->update([
                'qty' => $request->qty[$key],
            ]);
        }
        echo 'cart berhasil Diupdate';
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Carts  $cart
     * @return \Illuminate\Http\Response
     */
    public function destroy(Carts $cart,Request $request )
    {
        $cart = Carts::find($request->id);
        $cart->delete();
        echo 'Produk Dihapus Dari Keranjang';
    }
}