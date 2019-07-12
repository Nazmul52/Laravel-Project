<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use Session;
use Illuminate\Support\Facades\Redirect;
use Cart;

class CheckooutController extends Controller
{
    public function login_check(){
    	$customer_id =   Session::get('customer_id');
      if($customer_id){
        return Redirect::to('/checkout');
      }else{
         return view('pages.login');
      }
  
    	
   
    }

     public function customer_registration(Request $request){

   	$data=array();
   	$data['customer_name']=$request->customer_name;
   	$data['customer_email']=$request->customer_email;
   	$data['customer_phone']=$request->customer_phone;
   	$data['password']=md5($request->password);

   	$customer_table = DB::table('tbl_customer')
   					 ->insertGetId($data);

   					 Session::put('customer_id', $request->customer_id);
   					 Session::put('customer_name', $request->customer_name);
   					 return view('pages.login');


   }

   public function checkout(){
   	$shipping_id = Session::get('shipping_id');

   	if($shipping_id == NULL){
   		return view('pages.checkout');
   	}else{
   		return view('pages.payment');
   	}

   	
   }

    public function AdminAuth(){
      $customer_id =   Session::get('customer_id');
      if(is_null($customer_id)){
        return Redirect::to('/checkout');
      }else{
        
          return view('pages.login');
      }
    }

    public function shipping_details(Request $request){
	$data=array();
   	$data['shipping_email']=$request->shipping_email;
   	$data['first_name']=$request->first_name;
   	$data['last_name']=$request->last_name;
   	$data['shipping_address']=$request->shipping_address;
   	$data['shipping_phone']=$request->shipping_phone;
   	$data['shipping_city']=$request->shipping_city;

   	$shipping_id = DB::table('tbl_shipping')
   		->insertGetId($data);

		$shipping_info = Session::put('shipping_id', $shipping_id);
   		// echo "<pre>";
   		// print_r($shipping_info);
   		// echo "</pre>";
   		  return Redirect::to('/payment');

    }

    public function customer_login(Request $request){

    	$customer_email = $request->customer_email;
    	$password = md5($request->password);

    	$result = DB::table('tbl_customer')
    			->where('customer_email', $customer_email)
    			->where('password', $password)
    			->first();

    			// echo "<pre>";
    			// print_r($result);
    			// echo "</pre>";

    			if($result){
    				$customer_id = Session::put('customer_id', $result->customer_id);
    				return Redirect::to('/checkout');
    			}else{
    				return Redirect::to('/login-check');
    			}

    }

    public function payment(){
    	
    	$shipping_id = Session::get('shipping_id');
    	if($shipping_id != NULL){
		return view('pages.payment');
    	}else{
		return view('pages.checkout');
    	}
    	
    	
    }

    public function order_place(Request $request){
    	
	   	$payment_method =$request->payment_method;
	 	$shipping_id=Session::get('shipping_id');
	 	$customer_id=Session::get('customer_id');
	 	$pdata=array();
	 	$pdata['payment_method'] = $payment_method;
	 	$pdata['payment_status'] = 'pending';

	 	$payment_id = DB::table('tbl_payment')
	 	->insertGetId($pdata);

	 	Session::put('payment_id', $payment_id);

	 	$odata=array();
	 	$odata['customer_id'] = Session::get('customer_id');
	 	$odata['shipping_id'] = Session::get('shipping_id');
	 	$odata['payment_id']  = $payment_id;
	 	$odata['order_total'] =  Cart::total();
	 	$odata['order_status']= 'pending';

	 	$order_id = DB::table('tbl_order')
	 	 			->insertGetId($odata);

          Session::put('order_id', $order_id);
		$contents = Cart::content();
		$order_details_data = array();

		foreach ($contents as  $v_contents) {
			$order_details_data['order_id'] = $order_id;
			$order_details_data['product_id'] = $v_contents->id;
			$order_details_data['product_name'] = $v_contents->name;
			$order_details_data['product_price'] = $v_contents->price;
			$order_details_data['product_sales_quantity'] = $v_contents->qty;

			$order_details_id = DB::table('tbl_order_details')
			->insertGetId($order_details_data);

      Session::put('order_details_id', $order_details_id);
		}

		if ($payment_method == 'handcash') {
				// Cart::destroy();
			return view('pages.handcash');
			
		}elseif($payment_method == 'bkash'){
			echo "Successfuly done by Bkash!";
		}elseif($payment_method == 'paypal'){
			echo "Successfuly done by Paypal!";
		}elseif($payment_method == 'payza'){
			echo "Successfuly done by Payza";
		}else{
			echo "Not Select Any Method!";
		}

    }

    public function manage_order(){
    	$all_order_info = DB::table('tbl_order')
    	->join('tbl_customer','tbl_order.customer_id', '=', 'tbl_customer.customer_id')
    	->select('tbl_order.*', 'tbl_customer.customer_name')
    	->get();
    	
    	$manage_order = view('admin.manage_order')

    	->with('all_order_info', $all_order_info);
    	return view('admin_layout')
    	->with('admin.manage_order', $manage_order);
    }

    public function view_order($order_id){
		$order_by_id = DB::table('tbl_order')
    	->join('tbl_customer','tbl_order.customer_id', '=', 'tbl_customer.customer_id')
    	->join('tbl_order_details',  'tbl_order.order_id', '=', 'tbl_order_details.order_id')
    	->join('tbl_shipping',  'tbl_order.shipping_id', '=', 'tbl_shipping.shipping_id')
    	->select('tbl_order.*', 'tbl_order_details.*', 'tbl_customer.*', 'tbl_shipping.*')
    	->where('tbl_order.order_id', $order_id)

    	->get();

    	// echo "<pre>";
    	// print_r($order_by_id);
    	// echo "</pre>";
    	
    	$view_order = view('admin.view_order')

    	->with('order_by_id', $order_by_id);
    	return view('admin_layout')
    	->with('admin.view_order', $view_order);
    	
    }

    public function pending_order($order_id){
         $this->AdminAuth();
    	DB::table('tbl_order')
    	->where('order_id', $order_id)
    	->update(['order_status'=>'success']);
    	Session::put('message', 'Order Deliver Unsuccessfully.');
    	return Redirect::to('/manage_order');
    }
    public function success_order($order_id){
         $this->AdminAuth();
    	DB::table('tbl_order')
    	->where('order_id', $order_id)
    	->update(['order_status'=>'pending']);
    	Session::put('message', 'Order Deliver Successfully.');
    	return Redirect::to('/manage_order');
    	
    	
    }

    public function delete_order($order_id){
         $this->AdminAuth();
    	DB::table('tbl_order')
    	->where('order_id', $order_id)
    	->delete();
    	Session::put('message', 'Order Deleted Successfully.');
    	return Redirect::to('/manage_order');

    }


     public function c_logout()
     {

       Session::flush();

        return Redirect::to('/');
     
        
    }
}
