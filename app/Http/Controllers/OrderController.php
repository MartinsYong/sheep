<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\Input;
use App\Http\Requests;
use App\Order;
use App\User;

class OrderController extends Controller
{
//  	获取下单页面
    public function getPlaceOrder(){
    	
		return view('main.main_pgs');
    }
	
//	            下单
	public function postPlaceOrder(){
		
		$order = new Order;
		$order->id = rand(pow(10,(9)), pow(10,10)-1);
		$order->owner = Auth::user()->id;
		$order->origin = Input::get('origin');
		$order->dest = Input::get('dest');
		$order->description = Input::get('description');
		$order->setout_time = Input::get('setout_time');
		$order->save();
		return view('main.success');
	}
	
//		获取查单数据
	public function getIndexOrder(){
		
		$orders = Order::where('taken',0)->get();
		return $orders->toJson();
	}
	
//		获取查单页面
	public function getOrders(){
		return view('main.main_dvs');
	}
	
//		获取订单详情
	public function getDetails(){
		$order_id = intval(Input::get('id'));
		if($order_id){
			$order = Order::where('id',$order_id)->first();
			$order->taken = 1;
			$order->picker = Auth::user()->id;
			$order->save();
			$user = User::where('id',$order->owner)->first();
			return view('main.details',['order'=>$order->toJson(),'user'=>$user->toJson()]);
		}else{
			return redirect()->to('/orders');
		}
		
	}
	
//      获取历史页面
	public function getHistory(){
		return view('main.history');
	}

//      获取历史数据
	public function getIndexHistory(){
		$user = Auth::user();
		$orders = Order::where('picker',$user->id)
		->orWhere('owner',$user->id)
		->orderBy('updated_at', 'desc')
		->get();
		foreach($orders as $order){
			$owner = User::where('id',$order->owner)->first();
			$order->owner_phone = $owner->phone;
			$order->owner_name = $owner->name;
			if(!($order->picker)){
				$order->picker_phone = null;
				$order->picker_name = null;
			}else{
				$picker = User::where('id',$order->picker)->first();
				$order->picker_phone = $picker->phone;
				$order->picker_name = $picker->name;
			}
		}
		return $orders->toJson();
	}
}
