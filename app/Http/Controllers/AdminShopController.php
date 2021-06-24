<?php

namespace Zay\Http\Controllers;


use Illuminate\Http\Request;
use Zay\User;
use Zay\Shop;
use Zay\Likes;
use Zay\Product;
use Zay\ProductSpecification;
use Zay\Order;
use Zay\Visitor;
use Zay\RatingSubscribe;
use Zay\OrderSpecification;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Zay\Exchange;

class AdminShopController extends Controller
{
    public function index(){

    $objs = Shop::where('offical', 1)->get();
    $objs2 = User::all();
    return view('app.admin.shoplist')
     ->with('objs', $objs)
     ->with('objs2', $objs2);
}
public function update(Request $request){
    $s_id= $request->input('s_id');
   
    $objs3 = Shop::find($s_id);
    $objs3->offical = 2;
    if($objs3->save()){
        $objs = Shop::where('offical', 1)->get();
        $objs2 = User::all();   
        return view('app.admin.shoplist')
        ->with('objs', $objs)
        ->with('objs2', $objs2);
    }
}
public function payment(Request $request){
    $o_id= $request->input('o_id');
   
    $objs4 = Order::find($o_id);
    $objs4->paid = 1;

    $o_id2 = $objs4->id;
    
    $objs5 = OrderSpecification::where('o_id',$o_id2)->first();
    
    $i_amount = $objs4->amount;
    $s_id = $objs5->s_id;

    $objs6 = Shop::find($s_id);
    $objs6->balance += $i_amount;

    if($objs4->save() && $objs5->save() && $objs6->save()){
        $objs = Order::where('paid', 0)->get();
        $objs2 = User::all();   
        $objs3= OrderSpecification::all();
        return view('app.admin.paymentlist')
        ->with('objs', $objs)
        ->with('objs2', $objs2)
        ->with('objs3', $objs3);
    }
}
public function payindex(){

    $objs = Order::where('paid', 0)->get();
    $objs2 = User::all();
    $objs3= OrderSpecification::all();
    return view('app.admin.paymentlist')
     ->with('objs', $objs)
     ->with('objs2', $objs2)
     ->with('objs3', $objs3);
}
public function reupgrade(Request $request){
$id=$request->input('s_id');
    $shop=Shop::find($id);
    $shop->pendingOrders=OrderSpecification::where([
        ["s_id","=",$id],
        ["status","=","PENDING"]
    ])->count();
    $shop->productQty=0;
    $products=Product::where('s_id',$id)->get();
    foreach ($products as $product) {
        $product_specs=ProductSpecification::where("p_id",$product->id)->get();
        foreach ($product_specs as $product_spec) {
            $shop->productQty+=$product_spec->qty;
        }
    }

    $data=[
      "shop"=>$shop
    ];
    $s = Shop::find($id);
    $s->offical=1;
    if($s->save()){
    return view("pos.index")->with($data)
    ->with('s', $s);
    }
}

public function order(Request $request){
    $o_id= $request->input('o_id');
   
    $objs4 = OrderSpecification::find($o_id);
    $objs4->status = "FINISHED";

    
    
    if($objs4->save()){
        return redirect()->action(
            'AdminShopController@orderindex'
        );
    }
}
public function orderindex(){

    $objs = Order::all();
    $objs2 = User::all();
    $objs3= OrderSpecification::where('status','PACKED')->get();
    $objs4 = Shop::all();
    $objs5=Product::all();

    return view('app.admin.order')
     ->with('objs', $objs)
     ->with('objs2', $objs2)
     ->with('objs3', $objs3)
     ->with('objs4', $objs4)
     ->with('objs5', $objs5);
}
public function deliver(Request $request){
    $o_id= $request->input('o_id');
   
    $objs4 = Order::find($o_id);
    $objs4->status = "FINISHED";

    
    
    if($objs4->save()){
        return redirect()->action(
            'AdminShopController@deliverindex'
        );
    }
}
public function deliverindex(){

    $objs = Order::where('status','PENDING')->get();
    $objs2 = User::all();
    $objs3= OrderSpecification::all();
    
    $objs5=Product::all();

    return view('app.admin.deliverylist')
     ->with('objs', $objs)
     ->with('objs2', $objs2)
     ->with('objs3', $objs3)
     ->with('objs5', $objs5);
}
public function withdraw(Request $request){
    $o_id= $request->input('o_id');
   
    $objs4 = Exchange::find($o_id);
    $objs4->paid =1;

    
    
    if($objs4->save()){
        return redirect()->action(
            'AdminShopController@withdrawindex'
        );
    }
}
public function withdrawindex(){

    $objs = Exchange::where('paid',0)->get();
    $objs2 = User::all();
    $objs3= Shop::all();
    
    
    return view('app.admin.withdrawlist')
     ->with('objs', $objs)
     ->with('objs2', $objs2)
     ->with('objs3', $objs3)
    ;
}
}