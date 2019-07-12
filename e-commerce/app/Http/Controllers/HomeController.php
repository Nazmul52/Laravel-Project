<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use Session;
use Illuminate\Support\Facades\Redirect;

class HomeController extends Controller
{
	public function index()
	{
		// return view('pages.home_content');

			$all_publish_products = DB::table('tbl_products')
    	->join('tbl_category','tbl_products.category_id', '=', 'tbl_category.id')
    	->join('tbl_manufacture','tbl_products.manufacture_id', '=', 'tbl_manufacture.manufacture_id')
    	->select('tbl_products.*', 'tbl_category.category_name', 'tbl_manufacture.manufacture_name')
    	->where('tbl_products.publication_status',1)
    	->limit(9)

    	->get();
    	
    	$manage_publish_products = view('pages.home_content')

    	->with('all_publish_products', $all_publish_products);
    	return view('layout')
    	->with('pages.home_content', $manage_publish_products);
	}


    public function product_by_category( $id){
        $product_by_category = DB::table('tbl_products')
        ->join('tbl_category','tbl_products.category_id', '=', 'tbl_category.id')
        
        ->select('tbl_products.*', 'tbl_category.category_name')
        ->where('tbl_category.id',$id)
        // ->where('tbl_products.publication_status',1)
        ->limit(9)

        ->get();
        
        $manage_product_by_category = view('pages.category_by_product')

        ->with('product_by_category', $product_by_category);
        return view('layout')
        ->with('pages.category_by_product', $manage_product_by_category);
    }


      public function product_by_manufacture( $manufacture_id){
            $manufacture_by_product = DB::table('tbl_products')
        ->join('tbl_category','tbl_products.category_id', '=', 'tbl_category.id')
        ->join('tbl_manufacture','tbl_products.manufacture_id', '=', 'tbl_manufacture.manufacture_id')
        ->select('tbl_products.*', 'tbl_category.category_name', 'tbl_manufacture.manufacture_name')
        ->where('tbl_manufacture.manufacture_id', $manufacture_id)
        ->where('tbl_products.publication_status',1)
        ->limit(9)

        ->get();
        
        $manage_publish_products = view('pages.manufacture_by_product')

        ->with('manufacture_by_product', $manufacture_by_product);
        return view('layout')
        ->with('pages.manufacture_by_product', $manage_publish_products);
       
        
    }

    public function view_product_details($product_id){
     $product_by_details = DB::table('tbl_products')
        ->join('tbl_category','tbl_products.category_id', '=', 'tbl_category.id')
        ->join('tbl_manufacture','tbl_products.manufacture_id', '=', 'tbl_manufacture.manufacture_id')
        ->select('tbl_products.*', 'tbl_category.category_name', 'tbl_manufacture.manufacture_name')
        ->where('tbl_products.product_id', $product_id)
        ->where('tbl_products.publication_status',1)
        ->first();

     
        
        $manage_products_by_details = view('pages.product_details')

        ->with('product_by_details', $product_by_details);
        return view('layout')
        ->with('pages.product_details', $manage_products_by_details);
    }

}
