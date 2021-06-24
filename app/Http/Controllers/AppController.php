<?php

namespace Zay\Http\Controllers;

use Zay\User;
use Zay\Likes;
use Zay\Brands;
use Zay\Product;
use Zay\ProductSpecification;
use Zay\RatingSubscribe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class AppController extends Controller
{ 
  public function app()
  {
    $id = Auth::id();
    // $user=User::find($id);
    $user=User::find($id);
    if($user == null || $user->role_id == 2){
      $data=[
        "user"=>$user
      ];
      return view('app.index')->with($data);
    
    }
  //  $r_id=$user->role_id;
    else
   {
    return redirect()->action(
      'AdminShopController@index'
  );  }
  
    
  }
  public function updateNotiStatus($notiId)
  {
    return'OK';
  }
  public function cart()
  {
    $data=[
      "address"=>Auth::user()->address
    ];
    return view('app.cart')->with($data);
  }
  
  public function register()
  {
    return view('auth.register');
  }
  public function getBrands($category){
    $brands=$category==="All"?Brands::distinct('brand_name')->pluck('brand_name')->toArray():Brands::where('category',$category)->pluck('brand_name')->toArray();
    return $brands;
  }
  public function search(Request $r ){
    $category=$r->category;
    $brand=$r->brand;
    $products=Product::where("name","like", "%$r->name%");
    if($category!=="All")$products=$products->where('category',$category);
    if($brand!=="all")$products=$products->where('brand_name',$brand);
    $products=$products->get();
    foreach ($products as $product) {
      if($product){
        $likes=Likes::where([
          ["p_id","=",$product->id]
        ])->count();
        $product_spec=ProductSpecification::where([
          ["p_id","=",$product->id],
          ["qty",">",0],
        ])->first();
        $img=explode(",",$product_spec->img)[0];
        $product->likes=$likes;
        $product->img=$img;
      }
    }
    return $products;
  }
  public function updateUser(Request $request)
  {
    $user=User::find(Auth::id());
    $user->name=$request->name;
    $user->address=$request->address;
    $user->phone=$request->phone;
    if($request->img!=="undefined"){
      $image = $request->file("img"); 
      $fileName=$user->id."_".
                $user->email.".".
                $image->getClientOriginalExtension();
      //Storage::disk('local')->delete("user/".$user->img);
      Storage::disk('local')->put("avatar/".$fileName,File::get($image));
      $user->img=$fileName;
      
    }
    $user->save();
    return "OK";
  }
  public function login()
  {
    return view('auth.login');
  }
  public function storeForm()
  {
    return view('app.storeForm');
  }
  public function setting()
  {

    return view('app.setting')->with("user",Auth::user());
  }
  public function like(Request $r){
    $liked=$r->input('liked');
    $p_id=$r->input('pId');
    if($liked) {
      $newLike=new Likes;
      $newLike->p_id=$p_id;
      $newLike->u_id=Auth::id();
      $newLike->save();
    }
    else {
      Likes::where([
        ["p_id","=",$p_id],
        ["u_id","=",Auth::id()]
      ])->delete();
    }
  }
  public function subscribe(Request $r){
    $subscribed=$r->input('subscribed');
    $s_id=$r->input('s_id');
    $rated=RatingSubscribe::where([
      ["u_id","=",Auth::id()],
      ["s_id","=",$s_id]
    ])->exists();
    if($rated){
      $rating_subsc=RatingSubscribe::where([
        ["u_id","=",Auth::id()],
        ["s_id","=",$s_id]
      ])->update(["subscribed"=>$subscribed]);
    }
    else {
      $rating_subsc=new RatingSubscribe;
      $rating_subsc->u_id=Auth::id();
      $rating_subsc->s_id=$s_id;
      $rating_subsc->subscribed=$subscribed;
      $rating_subsc->save();
    }
  }
  public function rate(Request $r){
    $rate=$r->input('rate');
    $s_id=$r->input('s_id');
    $rated=RatingSubscribe::where([
      ["u_id","=",Auth::id()],
      ["s_id","=",$s_id]
    ])->exists();
    if($rated){
      $rating_subsc=RatingSubscribe::where([
        ["u_id","=",Auth::id()],
        ["s_id","=",$s_id]
      ])->update(["rating"=>$rate]);
    }
    else {
      $rating_subsc=new RatingSubscribe;
      $rating_subsc->u_id=Auth::id();
      $rating_subsc->s_id=$s_id;
      $rating_subsc->rating=$rate;
      $rating_subsc->save();
    }
  }
  
}

