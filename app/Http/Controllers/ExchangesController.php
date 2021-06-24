<?php

namespace Zay\Http\Controllers;

use Zay\Exchange;
use Zay\Shop;
use Illuminate\Http\Request;

class ExchangesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $newExchange=new Exchange;
        $newExchange->s_id=$request->s_id;
        $newExchange->amount=$request->amount;
        $newExchange->method=$request->payment;
        $newExchange->address=$request->address;
        $newExchange->save();
        $shop=Shop::find($request->s_id);
        $shop->balance=$shop->balance - $request->amount;
        $shop->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  \Zay\Exchange  $exchange
     * @return \Illuminate\Http\Response
     */
    public function show($type)
    {
        //
        $data=[
          "type"=>$type
        ];
        return view("app.exchange")->with($data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \Zay\Exchange  $exchange
     * @return \Illuminate\Http\Response
     */
    public function edit(Exchange $exchange)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Zay\Exchange  $exchange
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Exchange $exchange)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Zay\Exchange  $exchange
     * @return \Illuminate\Http\Response
     */
    public function destroy(Exchange $exchange)
    {
        //
    }
}
