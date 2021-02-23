<?php

namespace App\Http\Controllers;

use App\Models\TransactionDetails;
use App\Models\Transactions;
use App\Models\Carts;
use Illuminate\Http\Request;

class TransactionDetailsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($transactions)
    {
        $id = decrypt($transactions);
        $transaksi = Transactions::with('TransactionDetails')->where('id','=',$id)->get()->first();
        $transaksidetails = TransactionDetails::with('Transaction')
        ->join('transactions','transaction_details.transaction_id','=','transactions.id')
        ->where('transactions.id','=',$id)
        ->select(
            \DB::raw('SUM(transaction_details.selling_price * transaction_details.qty) as price'),
            'transaction_details.product_id',
            'transaction_details.qty as quantity',)
         ->groupBy('transaction_details.product_id', 'transaction_details.qty')
        ->get();
        $carts = Carts::join('products','carts.product_id','=','products.id')
        ->where('user_id',"=",'1')
        ->where('status','=','notyet')
        ->select(
           \DB::raw('products.price * carts.qty as subprice'),
           'products.product_name as name',
           'carts.qty as quantity',
           'carts.id',
           'products.id as product_id',
           'products.price',)
        ->get();
        $total = Carts::join('products','carts.product_id','=','products.id')
        ->select(\DB::raw('SUM(products.price * carts.qty) as total'))
         ->where('user_id',"=",'1')
         ->where('status','=','notyet')
         ->get()->first();
// dd($transaksidetails);
        return view('detail-transaksi',compact('transaksi','transaksidetails','carts','total'));
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
     * @param  \App\Models\TransactionDetails  $transactionDetails
     * @return \Illuminate\Http\Response
     */
    public function show(TransactionDetails $transactionDetails)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TransactionDetails  $transactionDetails
     * @return \Illuminate\Http\Response
     */
    public function edit(TransactionDetails $transactionDetails)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TransactionDetails  $transactionDetails
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TransactionDetails $transactionDetails)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TransactionDetails  $transactionDetails
     * @return \Illuminate\Http\Response
     */
    public function destroy(TransactionDetails $transactionDetails)
    {
        //
    }
}
