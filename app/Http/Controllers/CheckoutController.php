<?php

namespace App\Http\Controllers;
use App\Models\Couriers;
use App\Models\Provinces;
use App\Models\Cities;
use App\Models\Carts;
use Kavist\RajaOngkir\Facades\RajaOngkir;

use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $provinsis = Provinces::all();
        $kurirs = Couriers::all();
        $carts = Carts::join('products','carts.product_id','=','products.id')
         ->where('user_id',"=",'1')
         ->select(
            \DB::raw('SUM(carts.qty) as quantity,SUM(products.weight) as berattotal,SUM(products.price) as hargatotal'),
            'products.product_name as name',
            'products.id as product_id')
         ->groupBy('products.product_name', 'products.id')
         ->get();

         $total = Carts::join('products','carts.product_id','=','products.id')
         ->select(\DB::raw('SUM(products.price) as total, SUM(products.weight) as berattotal'))
         ->where('user_id',"=",'1')
         ->get()->first();
        // dd($carts);
        return view('checkout',compact('provinsis','kurirs','carts','total'));
    }
    public function getkota(Request $request)
    {
        $kota = Cities::where('province_id','=',$request->id)->get();
        $sen = $kota->toArray();
        return response()->json([
        'status' => true,
        'kota' => $sen
    ], 200);
    }
    public function cekongkir(Request $request)
    {
        $asal = Cities::where('city_id','128')->get()->first();
        $cost = RajaOngkir::ongkosKirim([
    'origin'        => $asal->id,     // ID kota/kabupaten asal
    'destination'   => $request->kota,      // ID kota/kabupaten tujuan
    'weight'        => $request->berat,    // berat barang dalam gram
    'courier'       => $request->kurir    // kode kurir pengiriman: ['jne', 'tiki', 'pos'] untuk starter
])->get();
return response()->json($cost);
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}