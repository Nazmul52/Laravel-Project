<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use Session;
use Illuminate\Support\Facades\Redirect;

class ProductController extends Controller
{
    public function index(){
    	$this->AdminAuth();
    	return view("admin.add_product");
    }

    public function save_product(Request $request){
    	$this->AdminAuth();
    	$data=array();
    	$data['product_name'] = $request->product_name;
    	$data['category_id'] = $request->category_id;
    	$data['manufacture_id'] = $request->manufacture_id;
    	$data['product_short_desc'] = $request->product_short_desc;
    	$data['product_long_desc'] = $request->product_long_desc;
    	$data['product_price'] = $request->product_price;
    	// $data['product_image'] = $request->product_image;
    	$data['product_size'] = $request->product_size;
    	$data['product_color'] = $request->product_color;
    	$data['publication_status'] = $request->publication_status;

    	$image=$request->file('product_image');
    	if($image){
    		$image_name=str_random(20);
    		$ext=strtolower($image->getClientOriginalExtension());
    		$image_full_name=$image_name.'.'.$ext;
    		$upload_path='img/';
    		$image_url=$upload_path.$image_full_name;
    		$success=$image->move($upload_path,$image_full_name);
    		if($success){
    			$data['product_image'] = $image_url;
    			DB::table('tbl_products')->insert($data);
    			Session::put('message', 'Product Added Successfully.');
    			return Redirect::to('/add_product');
    		}
    	}

    	$data['product_image']='';
    	DB::table('tbl_products')->insert($data);


    	
    	Session::put('message', 'Product Added Successfully without image.');
    			return Redirect::to('/add_product');
    }

    public function all_product(){
$this->AdminAuth();
    	$all_products = DB::table('tbl_products')
    	->join('tbl_category','tbl_products.category_id', '=', 'tbl_category.id')
    	->join('tbl_manufacture','tbl_products.manufacture_id', '=', 'tbl_manufacture.manufacture_id')
    	->select('tbl_products.*', 'tbl_category.category_name', 'tbl_manufacture.manufacture_name')
    	->get();
    	
    	$manage_products = view('admin.all_products')

    	->with('all_products', $all_products);
    	return view('admin_layout')
    	->with('admin.all_products', $manage_products);
    	
    }


     public function unactive_product($product_id){
     	$this->AdminAuth();
    	DB::table('tbl_products')
    	->where('product_id', $product_id)
    	->update(['publication_status'=>1]);
    	Session::put('message', 'Product Active Successfully.');
    	return Redirect::to('/all_product');
    }

    public function active_product($product_id){
    	$this->AdminAuth();
    	DB::table('tbl_products')
    	->where('product_id', $product_id)
    	->update(['publication_status'=>0]);
    	Session::put('message', 'Product Unactive Successfully.');
    	return Redirect::to('/all_product');
    	
    	
    }


     public function edit_product($product_id){
     	$this->AdminAuth();
    	// Session::put('id', $id);
    	$product_info= DB::table('tbl_products')
    	 ->where('product_id', $product_id)
    	 ->first();
    	 

		$product_info = view('admin.edit_product')
    	->with('product_info', $product_info);
    	return view('admin_layout')
    	->with('admin.edit_product', $product_info);

    	//return view('admin.edit_category');
    }


    public function update_product(Request $request, $product_id){
$this->AdminAuth();
    	$data=array();
    	$data['product_name'] = $request->product_name;
    	$data['category_id'] = $request->category_id;
    	$data['manufacture_id'] = $request->manufacture_id;
    	$data['product_short_desc'] = $request->product_short_desc;
    	$data['product_long_desc'] = $request->product_long_desc;
    	$data['product_price'] = $request->product_price;
    	// $data['product_image'] = $request->product_image;
    	$data['product_size'] = $request->product_size;
    	$data['product_color'] = $request->product_color;
    	$data['publication_status'] = $request->publication_status;
    	// $image=$request->file('product_image');
    	// if($image){
    	// 	$image_name=str_random(20);
    	// 	$ext=strtolower($image->getClientOriginalExtension());
    	// 	$image_full_name=$image_name.'.'.$ext;
    	// 	$upload_path='img/';
    	// 	$image_url=$upload_path.$image_full_name;
    	// 	$success=$image->move($upload_path,$image_full_name);
    	// 	if($success){
    	// 		$data['product_image'] = $image_url;
    	// 		DB::table('tbl_products')
    	// 		->where('product_id', $product_id)
    	// 		->update($data);
    	// 		Session::put('message', 'Product Updated Successfully.');
    	// 		return Redirect::to('/add_product');
    	// 	}
    	// }
    	// $data['product_image']='';
    	DB::table('tbl_products')
    	->where('product_id', $product_id)
    	->update($data);

    	
    	Session::put('message', 'Product Updated Successfully ');
    	

    	
    	return Redirect::to('/all_product');
    }

    public function delete_pruduct($product_id){
    	$this->AdminAuth();
    	DB::table('tbl_products')
    	->where('product_id', $product_id)
    	->delete();
    	Session::put('message', 'Product Deleted Successfully.');
    	return Redirect::to('/all_product');

    }

     public function AdminAuth(){
        
      $admin_id =   Session::get('admin_id');
      if($admin_id){
        return;
      }else{
         return Redirect::to('/login')->send();
      }
    }
}
