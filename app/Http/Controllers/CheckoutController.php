<?php

namespace App\Http\Controllers;
use App\Models\Couriers;
use App\Models\Provinces;
use App\Models\Cities;
use App\Models\Carts;
use App\Models\Transactions;
use App\Models\TransactionDetails;

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
         ->where('status','=','notyet')
         ->select(
            \DB::raw('products.price * carts.qty as subprice,products.weight * carts.qty as berattotal'),
            'products.product_name as name',
            'carts.qty as quantity',
            'products.id as product_id',)
         ->get();

         $total = Carts::join('products','carts.product_id','=','products.id')
         ->select(\DB::raw('SUM(products.price * carts.qty) as total, SUM(products.weight*carts.qty) as berattotal'))
         ->where('user_id',"=",'1')
         ->where('status','=','notyet')
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
        $carts = Carts::join('products','carts.product_id','=','products.id')
         ->where('user_id',"=",'1')
         ->where('status','=','notyet')
         ->get();

        $total = Carts::join('products','carts.product_id','=','products.id')
         ->select(\DB::raw('SUM(products.price * carts.qty) as total, SUM(products.weight * carts.qty) as berattotal'))
         ->where('user_id',"=",'1')
         ->where('status','=','notyet')
         ->get()->first();

        $transaksi = New Transactions;
        $datetime = strtotime("+1 day");
        $tomorrowDate = date("Y-m-d H:i:s", $datetime);
        $transaksaction = $request->all();
        $transaksaction['timeout'] = $tomorrowDate;
        $transaksaction['total'] =  $request->shipping_cost + $total->total;
        $transaksaction['sub_total'] = $total->total;
        $transaksaction['user_id'] = '1';
        $transaksaction['status'] = 'unverified'; 
        $transaksaction['telp'] = '081222111'; 
        $idtransaksi = $transaksi->create($transaksaction);

    

        foreach ($carts as $key => $value) {
            $idtransaksidetail = TransactionDetails::create([
                'transaction_id' => $idtransaksi->id,
                'product_id' => $value->product_id,
                'qty' => $value->qty,
                'selling_price' => $value->price,
            ]);

            Carts::where('user_id',"=",'1')->update([
                'status' => 'checkedout',
            ]);
        }
        // dd($transaksiDetails);
        return redirect(Route('detail-transaksi',['transactions' => $idtransaksidetail->id]));
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