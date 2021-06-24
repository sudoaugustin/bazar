<?php

namespace Zay\Http\Controllers;

use Zay\Order;
use Zay\OrderSpecification;
use Zay\Product;
use Zay\ProductSpecification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class OrdersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('app.order');
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
        $items=$request->items;
        $order=new Order;
        $order->u_id=Auth::id();
        $order->location=$request->address;
        $order->payment_method=$request->payment_method;
        $order->payment_contact=$request->payment_contact;
        $order->save();
        foreach ($items as $item) {
          $item=(object) $item;
          $order_spec=new OrderSpecification;
          $product=Product::find($item->id);
          $product_spec=ProductSpecification::where([
            ["p_id","=",$item->id],
            ["color","=",$item->color],
            ["size","=",$item->size],
          ])
          ->first();
          $order_spec->p_id=$product->id;
          $order_spec->s_id=$product->s_id;
          $order_spec->o_id=$order->id;
          $order_spec->qty=$item->qty;
          $order_spec->color=$product_spec->color;
          $order_spec->size=$product_spec->size;
          $order_spec->amount=($item->qty*$product_spec->price);
          $order_spec->save();
          $product_spec=ProductSpecification::where([
            ["p_id","=",$item->id],
            ["color","=",$item->color],
            ["size","=",$item->size],
          ])
          ->update([
            'qty'=>$product_spec->qty-$item->qty
          ]);
        }
        return "OK";

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
        $req=explode(":",$id);
        $type=$req[0];
        $value=$req[1];
        if($type=="id"){
          $view="orderById";
          $order=Order::find($value);
          $order->amount=0;
          $order_spec=OrderSpecification::where("o_id",$order->id)->get();
          foreach ($order_spec as $spec) {
            $item=ProductSpecification::where([
              ["p_id","=",$spec->p_id],
              ["color","=",$spec->color],
              ["size","=",$spec->size]
            ])->first();
            $spec->name=Product::find($spec->p_id)->name;
            $spec->price=$item->price;
            $order->amount+=($item->price*$spec->qty);
          }
          $data=[
            "order"=>$order,
            "items"=>$order_spec
          ];
        }else {
          $view="orderByType";
          $operator=$value==="pending"?"<>":"=";
          $orders=Order::where([
            ["u_id","=",Auth::id()],
            ["status",$operator,"FINISHED"],
          ])->get();
          foreach ($orders as $order) {
            $order->amount=0;
            $order_spec=OrderSpecification::where("o_id",$order->id)->get();
            foreach ($order_spec as $spec) {
              $price=ProductSpecification::where([
                ["p_id","=",$spec->p_id],
                ["color","=",$spec->color],
                ["size","=",$spec->size]
              ])->first()->price;
              $order->amount+=($price*$spec->qty);
            }
          }
          $data=[
            "orders"=>$orders
          ];
        }
        return view('app.'.$view)->with($data);
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
