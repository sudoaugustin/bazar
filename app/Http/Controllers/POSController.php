<?php

namespace Zay\Http\Controllers;

use Illuminate\Http\Request;
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

class POSController extends Controller
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
    public function create(Request $r)
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
        $page=$request->page;
        $data=[];
        if($page==="product"){
            $s_id=$request->s_id;
            $products=Product::where('s_id',$s_id)->get();
            foreach ($products as $product) {
                $likes=Likes::where("p_id",$product->id)->count();
                $product_spec=ProductSpecification::where("p_id",$product->id)->first();
                $img=explode(",",$product_spec->img)[0];
                $product->likes=$likes;
                $product->img=$img;
            }
            $data=[
                'products'=>$products
            ];
        }
        elseif($page==="productById"){
            $p_id=$request->p_id;
            $detail=ProductSpecification::where([
                ['p_id',"=",$p_id]
                ])->get();
            $product=Product::find($p_id);
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
            "id"=>$p_id,
            "name"=>$product->name,
            "desc"=>$product->desc,
            "specs"=>explode(",",$product->spec),
            "sizes"=>$sizes,
            "likes"=>Likes::where([
                        ["p_id","=",$p_id]
                        ])->count()
            ];
        }
        elseif($page==="orderByType"){
            $status=$request->status;
            $s_id=$request->s_id;
            $orders=OrderSpecification::where([
                ["s_id","=",$s_id],
                ["status","=",$status]
            ])->get();
            foreach ($orders as $order) {
                $product=Product::withTrashed()->find($order->p_id);
                $product_spec=ProductSpecification::withTrashed()
                                ->where([
                                    ["p_id","=",$order->p_id],
                                    ["color","=",$order->color],
                                    ["size","=",$order->size]
                                ])->first();
                $order->product_name=$product->name;
                $order->product_img=explode(",",$product_spec->img)[0];
                # code...
            }
            return $orders;
        }
        // elseif ($page==="updateShipping"){
        //     $id=$request->id;
        //     $order_spec=OrderSpecification::find($id);
        //     $order_spec->status="PACKED";
        //     $order_spec->save();
        //     return $order_spec;         
        // }
        elseif($page==="exchange"){
            $shop=Shop::find($request->s_id);
            $data=[
                "max"=>$shop->balance
            ];
        }
        elseif ($page==="setting") {
            # code...
            $shop=Shop::find($request->s_id);
            $data=[
                "shop"=>$shop
            ];
        }
        elseif ($page==="updateShop"){
            $shop=Shop::find($request->s_id);
            $shop->name=$request->name;
            $shop->description=$request->desc;
            $shop->address=$request->address;
            if($request->img!=="undefined"){
              $image = $request->file("img"); 
              $fileName=$shop->id."_".
                        $shop->name.".".
                        $image->getClientOriginalExtension();
              //Storage::disk('local')->delete("shop/".$shop->img);
              Storage::disk('local')->put("shop/".$fileName,File::get($image));
              $shop->img=$fileName;
              
            }
            $shop->save();
            return "OK";
        }
        elseif ($page==="getSale") {
            $saleOfMonth=0;
            $saleofPrevMonth=0;
            $month = date('M');
            $prevMonth= Date('M', strtotime(date('F') . " last month"));
            $year = date('Y');
            $orders=OrderSpecification::where([
                ['s_id',"=",$request->s_id],
                ['status',"=","FINISHED"]
            ])
            ->whereYear('created_at',$year)
            ->orderBy('created_at')
            ->get();
            $sales=[];
            foreach ($orders as $order) {
                $date=date_create($order->created_at);
                $_month=$date->format('M');
                if($_month===$month) $saleOfMonth+=$order->amount;
                else if($_month===$prevMonth) $saleofPrevMonth+=$order->amount;
                if(!array_key_exists($_month,$sales)) $sales[$_month]=0;
                $sales[$_month]+=$order->amount;
            }
            $_sales=[];
            foreach ($sales as $key => $value) {
                array_push($_sales,[
                    "x"=>$key,
                    "y"=>$value
                ]);
            }
            return [
                "sales"=>$_sales,
                "saleOfMonth"=>$saleOfMonth,
                "saleOfPrevMonth"=>$saleofPrevMonth
            ];
        }
        elseif ($page==="getSession") {
            $visitOfMonth=0;
            $visitOfPrevMonth=0;
            $subscribeOfMonth=0;
            $subscribeOfPrevMonth=0;
            $month = date('M');
            $prevMonth= Date('M', strtotime(date('F') . " last month"));
            $year = date('Y');
            $chart_data=[];
            $chart=[];
            $subscribes=RatingSubscribe::where([
                ['s_id',"=",$request->s_id]
                ])
                ->whereYear('created_at',$year)
                ->orderBy('created_at')
                ->get();
            $visits=Visitor::where([
                ['s_id',"=",$request->s_id]
                ])
                ->whereYear('created_at',$year)
                ->orderBy('created_at')
                ->get();
            foreach ($subscribes as $subscribe) {
                $date=date_create($subscribe->created_at);
                $_month=$date->format('M');
                if($_month===$month) $subscribeOfMonth++;
                else if($_month===$prevMonth) $subscribeOfPrevMonth++;
                if(!array_key_exists($_month,$chart_data)) $chart_data[$_month]=[0,0];
                $chart_data[$_month][0]++;
            }
            foreach ($visits as $visit) {
                $date=date_create($visit->created_at);
                $_month=$date->format('M');
                if($_month===$month) $visitOfMonth++;
                else if($_month===$prevMonth) $visitOfPrevMonth++;
                if(!array_key_exists($_month,$chart_data)) $chart_data[$_month]=[0,0];
                $chart_data[$_month][1]++;
            }
            $subscribes=[];
            $visits=[];
            foreach($chart_data as $key=>$value){
                array_push($subscribes,[
                    "x"=>$key,
                    "y"=>$value[0]
                ]);
                array_push($visits,[
                    "x"=>$key,
                    "y"=>$value[1]
                ]);
            }
            return [
                "visits"=>$visits,
                "subscribes"=>$subscribes,
                "visitOfMonth"=>$visitOfMonth,
                "visitOfPrevMonth"=>$visitOfPrevMonth,
                "subscribeOfMonth"=>$subscribeOfMonth,
                "subscribeOfPrevMonth"=>$subscribeOfPrevMonth
            ];
        }
        elseif ($page==="getAvgSale") {
            $avgSaleOfMonth=0;
            $month = date('m');
            $year = date('Y');
            $sales=[];
            $i=0;
            $totalSales=0;
            $orders=OrderSpecification::where([
                ['s_id',"=",$request->s_id],
                ['status',"=","PENDING"]
            ])
            ->whereMonth('created_at',$month)
            ->whereYear('created_at',$year)
            ->orderBy('created_at')
            ->get();
            foreach ($orders as $order) {
                $date=date_create($order->created_at);
                $day=$date->format('d');
                if(!array_key_exists($day,$sales)) $sales[$day]=0;
                $sales[$day]+=$order->amount;
                $i++;
                $totalSales+=$order->amount;
            }
            $_sales=[];
            foreach ($sales as $key => $value) {
                array_push($_sales,[
                    "x"=>(string) $key,
                    "y"=>$value
                ]);
            }
            if($i===0) ++$i;
            $avgSales=round($totalSales/$i);
            return [
                "sales"=>$_sales,
                "avgSales"=>$avgSales
            ];
        }
        return view("pos.".$page)->with($data);
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
 
        return view("pos.index")->with($data);   }

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
