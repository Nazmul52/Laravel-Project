<?php

namespace App\Http\Controllers;
use DB;
use App\Http\Requests;
use Session;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
  public function profile_details($customer_id){

  	$customer_info= DB::table('tbl_customer')
    	 ->where('customer_id', $customer_id)
    	 ->first();
    	 

		$customer_info = view('pages.profile')
    	->with('customer_info', $customer_info);
    	return view('layout')
    	->with('pages.profile', $customer_info);
  	// return view('pages.profile');
  }

  public function order_details(){

  		$order_id = Session::get('order_id');
		$order_details = DB::table('tbl_order')
    	// ->join('tbl_customer','tbl_order.customer_id', '=', 'tbl_customer.customer_id')
    	->join('tbl_order_details',  'tbl_order.order_id', '=', 'tbl_order_details.order_id')
    	->join('tbl_shipping',  'tbl_order.shipping_id', '=', 'tbl_shipping.shipping_id')
    	->select('tbl_order.*', 'tbl_order_details.*',  'tbl_shipping.*')
    	->where('tbl_order.order_id', $order_id)
    	->get();

    	// echo "<pre>";
    	// print_r($order_id);
    	// echo "</pre>";
    	
    	$order_details = view('pages.customer_order_details')

    	->with('order_details', $order_details);
    	return view('layout')
    	->with('pages.customer_order_details', $order_details);
  }
}
