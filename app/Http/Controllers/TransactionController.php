<?php

namespace App\Http\Controllers;

use App\Models\Transactions;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $transaksis = Transactions::where('user_id','=','1')->get();
        return view('transaksi',compact('transaksis'));
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
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Transactions  $transactions
     * @return \Illuminate\Http\Response
     */
    public function show(Transactions $transactions)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Transactions  $transactions
     * @return \Illuminate\Http\Response
     */
    public function edit(Transactions $transactions)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Transactions  $transactions
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Transactions $transactions)
    {
        if ($request->proof_of_payment) {

    $gambar = $request->file('proof_of_payment');
    $urlgambar = $gambar->storeAs("img/bukti", md5('Bukti' . $transactions->id . microtime()) . '.' . $gambar->extension());
    $transactions->proof_of_payment = $urlgambar;
    $transactions->update();
}
return redirect()->back();
    }

    public function cancel(Transactions $transactions)
    {
  
    $transactions->status = 'canceled';
    $transactions->update();
    return redirect()->back();

    }
    public function verifbarang(Transactions $transactions)
    {
  
    $transactions->status = 'success';
    $transactions->update();
    return redirect()->back();

    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Transactions  $transactions
     * @return \Illuminate\Http\Response
     */
    public function destroy(Transactions $transactions)
    {
        //
    }
}
