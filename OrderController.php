<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Order;
use App\Deleveryboy;
use App\Restaurant;
use Carbon\Carbon;

class OrderController extends Controller
{
    //

    public function index(){

    	$order_count=DB::table('orders')->max('id');
    	$revenue=DB::table('orders')->sum('price');
    	$cancel_count=DB::table('orders')->where('completed',0)->count('id');
    	$atv=$revenue/$order_count;

    	$DELAYED=DB::select('select d_boy_id,rest_id, timediff(picktime,order_time) as time from orders where timediff(picktime,order_time)>=maketime(0,2,0)');

    	$totaldelays=count($DELAYED);

        $DEL_DELAY=DB::select('select d_boy_id,rest_id, timediff(delivered_time,order_time) as time from orders where timediff(delivered_time,order_time)>=maketime(0,45,0)');




        $numone=rand(1,10);
        $numtwo=rand(1,10);

        //DB::table('restaurants')->update(['rating'=>$numone]);
        //DB::table('deleveryboys')->update(['rating'=>$numtwo]);

        $boy1=Deleveryboy::findOrFail(1);
        $boy1->rating=$numtwo;
        $boy1->save();

        $boy2=Deleveryboy::findOrFail(2);
        $boy2->rating=$numone;
        $boy2->save();

        $numthree=rand(1,10);
        $numfour=rand(1,10);
        $numfive=rand(1,10);
        

        //DB::table('restaurants')->update(['rating'=>$numone]);
        //DB::table('deleveryboys')->update(['rating'=>$numtwo]);

        $boy1=Restaurant::findOrFail(1);
        $boy1->rating=$numthree;
        $boy1->save();

        $boy2=Restaurant::findOrFail(2);
        $boy2->rating=$numfour;
        $boy2->save();

        $boy2=Restaurant::findOrFail(3);
        $boy2->rating=$numfive;
        $boy2->save();

        $custId=rand(1,11);
        $restId=rand(1,8);
        $delId=rand(1,8);

        $currenttime = Carbon::now()->timestamp; 
        $order=$currenttime;
        $ordertime=date("Y-m-d H:i:s",$order);
        $restAccept=$order+rand(100,1000);
        $restAcceptTime=date("Y-m-d H:i:s",$restAccept);
        $pick=$restAccept+rand(0,1000);
        $pickTime=date("Y-m-d H:i:s",$pick);
        $delivered=$pick+rand(10000,50000);
        $deliveredTime=date("Y-m-d H:i:s",$delivered);
        $discount=rand(0,2);
        $price=rand(150,1500);
        $location = array("Kormangala", "Indiranagar", "Peenya");
        $geo_loc=$location[rand(0,2)];
        $items="";
        for($i=0;$i<=rand(0,15);$i++) {
            $items=$items.rand(1000,10000);
            $items=$items.",";
        }
        $items=$items.rand(1000,10000);
        $completed=rand(0,2);

        $GraphData=DB::select('select extract(HOUR from order_time) as hour,count(*) as count  from orders where datediff(order_time,now())=0 group by extract(HOUR from order_time)');

    
        

        DB::table('orders')->insert(['cust_id'=>$custId,
                                     'rest_id'=>$restId,
                                     'd_boy_id'=>$delId,
                                     'order_time'=>$ordertime,
                                     'rest_del_time'=>$restAcceptTime,
                                     'del_acc_time'=>$restAcceptTime,
                                     'picktime'=>$pickTime,
                                     'delivered_time'=>$deliveredTime,
                                     'discount'=>$discount,
                                     'price'=>$price,
                                     'geo_loc'=>$geo_loc,
                                     'items'=>$items,
                                     'completed'=>$completed,]);
        






        $DATA=array();

    	return view('admin/index',[
    								'order_count'=>$order_count,
    								'revenue'=>$revenue,
    								'cancel_count'=>$cancel_count,
    								'atv'=>$atv,
    								'DELAYED'=>$DELAYED,
                                    'totaldelays'=>$totaldelays,
                                    'DEL_DELAY'=>$DEL_DELAY,
                                    'GRAPH_DATA'=>$GraphData,
                                    'DATA'=>$DATA,
                                ]);
    }



    public function totalOrders()
    {

    	$TOTAL=Order::all();
    	return view('admin/totalorders',['TOTAL'=>$TOTAL]);
    }

    public function showrestrating()
    {

        $BR=DB::table('restaurants')->where('rating','>',5)->orderby('rating','desc')->get();
        return view('admin/restdetails',['BR'=>$BR]);
    }

    public function showleast(){
        $LS=DB::table('restaurants')->where('rating','<=',5)->orderby('rating','asc')->get();
        return view('admin/leastrest',['LS'=>$LS]);

    }

    public function showdelrating()
    {

        $DR=DB::table('deleveryboys')->where('rating','>',5)->orderby('rating','desc')->get();
        return view('admin/deltop',['DR'=>$DR]);
    }

    public function showdelleast(){
        $LR=DB::table('deleveryboys')->where('rating','<=',5)->orderby('rating','asc')->get();
        return view('admin/dellow',['LR'=>$LR]);

    }
    

}
