<?php

namespace Zay\Http\Controllers;

use Zay\Shop;
use Zay\RatingSubscribe;
use Zay\Product;
use Zay\OrderSpecification;
use Zay\User;
use Zay\ProductSpecification;
use Zay\Likes;
use Zay\Visitor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class ShopsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $subscribed_shop_id=RatingSubscribe::where([
          ['u_id',"=",Auth::id()],
          ["subscribed","=",1]
          ])->take(10)->get('s_id');
        $shops=[
          "your store"=>Shop::where('u_id',Auth::id())->take(10)->get(),
          "newly opened"=>Shop::where([
                            ["u_id","<>",Auth::id()]
                          ])->orderBy('id',"DESC")->take(10)->get(),
          "subscribed"=>Shop::whereIn('id',$subscribed_shop_id)->get()
        ];
        foreach ($shops as $key=>$shop) {
          if($key!=="your store"){
            foreach ($shop as $store) {
              $shop_user=RatingSubscribe::where([
                            ["u_id","=",Auth::id()],
                            ["s_id","=",$store->id]
                          ])->first();
              $store->subscribed=$shop_user?$shop_user->subscribed:0;
            }
          }
        }
        $data=[
          "shops"=>$shops
        ];
        return view('app.store')->with($data);
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
        $shop=new Shop;
        $shop->u_id=Auth::id();
        $shop->address=$request->address;
        $shop->name=$request->name;
        $shop->save();
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
        $shop=Shop::find($id);
        $new_visit=new Visitor;
        $new_visit->u_id=Auth::id();
        $new_visit->s_id=$id;
        $new_visit->save();
        $shop->subscribes=RatingSubscribe::where([
          ["s_id","=",$id],
          ["subscribed","=",1]
        ])->count();
        $total_rating=RatingSubscribe::where([
         ["s_id","=",$id],
        ])->sum('rating');
        $rater_count=RatingSubscribe::where([
          ["s_id","=",$id],
          ["rating",">",0]
        ])->count();
        if($rater_count===0) $rater_count=1;
        $user_count=User::all()->count();
        $shop->subscribed=RatingSubscribe::where([
                      ["u_id","=",Auth::id()],
                      ["s_id","=",$id],
                      ["subscribed","=",1]
                    ])->exists();
        $shopRate=RatingSubscribe::where([
         ["s_id","=",$id],
         ["u_id","=",Auth::id()]
        ])->first();
        $shop->rate=$shopRate?$shopRate->rating:0;
        $shop->avg_rating=($total_rating+$rater_count)/$user_count;
        $shop->avg_rating=round($shop->avg_rating,1);
        $shop->products=Product::where('s_id',$id)->count();
        $shop->sales=OrderSpecification::where('s_id',$id)->count();
        $product=Product::where("s_id",$id)->get();
         foreach ($product as $item) {
           $likes=Likes::where([
             ["p_id","=",$item->id]
           ])->count();
           $img=ProductSpecification::where("p_id",$item->id)->first()->img;
           $img=explode(",",$img)[0];
           $item->likes=$likes;
           $item->img=$img;
         }
        $data=[
          "shop"=>$shop,
          "product"=>$product
        ];
        return view('app.storeById')->with($data);
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
