<?php

namespace Zay\Http\Controllers;

use Illuminate\Http\Request;
use Zay\Product;
use Zay\Shop;
use Zay\ProductSpecification;
use Zay\RatingSubscribe;
use Zay\Brands;
use Zay\Likes;
use Zay\OrderSpecification;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $subscribed=[];
        $subscribed_s_id=RatingSubscribe::where([
          ['u_id',"=",Auth::id()],
          ["subscribed",'=',true]
        ])->
        take(20)->
        pluck('s_id')->
        toArray();
        foreach ($subscribed_s_id as $s_id) {
          $_product=Product::where('s_id',"=",$s_id)->first();
          if($_product)array_push($subscribed,$_product);
          # code...
        }
        $newarrival=Product::orderBy('id','DESC')
                 ->take(20)
                 ->get();
        $popular=Product::orderBy('sales')
                    ->take(20)
                    ->get();
        $products=[
          'new arrival'=>$newarrival,
          'subsrcibed'=>$subscribed,
          'popular'=>$popular
         ];
         foreach ($products as $product) {
            foreach ($product as $item) {
              if($item){
                $likes=Likes::where([
                  ["p_id","=",$item->id]
                ])->count();
                $product_spec=ProductSpecification::where([
                  ["p_id","=",$item->id],
                  ["qty",">",0],
                ])->first();
                $img=explode(",",$product_spec->img)[0];
                $item->likes=$likes;
                $item->img=$img;
                $item->price=$product_spec->price;
              }
            }
         }
        return view('app.explore')->with('products',$products);
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
        $product=new Product;
        $product->name=$request->name;
        $product->brand_name=$request->b_name;
        $product->desc=$request->desc;
        $product->spec=$request->spec;
        $product->s_id=$request->s_id;
        $product->name=$request->name;
        $request->specification=json_decode($request->specification,true);
        $product->category=$request->category;
        $product->save();
        foreach ($request->specification as $product_spec) {
          # code...
          $newSpec=new ProductSpecification;
          $newSpec->size=$product_spec['size'];
          $newSpec->color=$product_spec['color'];
          $newSpec->qty=$product_spec['qty'];
          $newSpec->price=$product_spec['price'];
          $imgs="";
          for ($i=0; $i < $product_spec["imgLength"] && $i<6; $i++) {
            $image = $request->file($newSpec->size."".$newSpec->color."".$i); 
            $fileName=$product->id."_".
                      $product_spec['color'] ."_".
                      $product_spec['size']. "_" . 
                      $i . '.' .$image->getClientOriginalExtension();
            Storage::disk('public')->put("products/".$fileName,File::get($image));
            if($i==0) $imgs.=$fileName;
            else $imgs.=",".$fileName;
          }
          $newSpec->p_id=$product->id;
          $newSpec->img=$imgs;
          $newSpec->save();
        }
        if(!Brands::where([
          ['category','=',$product->category],
          ['brand_name','=',$product->brand_name]
        ])->exists()){
          $new_brand=new Brands;
          $new_brand->brand_name=$product->brand_name;
          $new_brand->category=$product->category;
          $new_brand->save();
        }
        return $newSpec;

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
        $detail=ProductSpecification::where([
                ['p_id',"=",$id],
                ['qty',"<>",0]
                ])->get();
        $product=Product::find($id);
        $sizes=[];
        foreach ($detail as $row) {
          $color=[
            "img"=>explode(",",$row->img),
            "qty"=>$row->qty,
            "price"=>$row->price
           ];
          $sizeName=$row->size;
          if(!array_key_exists($sizeName,$sizes)) $sizes[$sizeName]=[];
          $sizes[$sizeName][$row->color]=$color;
        }
        $data=[
          "id"=>$id,
          "name"=>$product->name,
          "desc"=>$product->desc,
          "specs"=>explode(",",$product->spec),
          "sizes"=>$sizes,
          "likes"=>Likes::where([
                      ["p_id","=",$id]
                    ])->count(),
          "liked"=>Likes::where([
                      ["p_id","=",$id],
                      ["u_id","=",Auth::id()]
                    ])->exists(),
          "shop"=>Shop::find($product->s_id)
        ];
        return view('app.productById')->with($data);
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
        $product=Product::find($id);
        $product->name=$request->name;
        $product->save();
        ProductSpecification::where([
          ["p_id","=",$id],
          ["color","=",$request->color],
          ["size","=",$request->size],        
        ])->update(['qty'=>$request->qty,"price"=>$request->price]);
        // $product->price=$request->price;
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
        $productSpec=ProductSpecification::where("p_id",$id);
        $product=Product::find($id);
        $likes=Likes::where("p_id",$id);
        $product->delete();
        $productSpec->delete();
        $likes->delete();
    }
}
