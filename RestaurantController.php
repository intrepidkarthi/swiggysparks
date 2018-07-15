<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;

use Illuminate\Support\Facades\DB;

class RestaurantController extends Controller
{
    //

    public function index(){
    	return view('admin/alert');
    }

    public function envalert(Request $request){
    	
    	$loc=$request->input('location');

    	$LIST=DB::select("select id,cust_id,geo_loc,order_time from orders where timediff(order_time,now())<=maketime(0,10,0) and geo_loc='$loc' and datediff(order_time,now())=0");
    
    	// foreach($LIST as $list)
    	// {
    	// 	$id=$list->cust_id;
    	// 	$number=DB::table('customers')->where('id',$id)->pluck('number');
    	// 	array_push($NUM,$number);

    	// }

    	return view('/admin/envalert',['LIST'=>$LIST]);
    }
}
