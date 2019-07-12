<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use Session;
use Illuminate\Support\Facades\Redirect;

class CategoryController extends Controller
{
    public function index(){
        $this->AdminAuth();

    	return view('admin.add-category');
    }

    public function all_category(){
 $this->AdminAuth();
    	$all_category = DB::table('tbl_category')->get();
    	$manage_category = view('admin.all-category')

    	->with('all_category', $all_category);
    	return view('admin_layout')
    	->with('admin.all-category', $manage_category);

    	//return view('admin.all-category');
    }

    public function save_category(Request $request){
 $this->AdminAuth();
		$data=array();
    	$data['id'] = $request->id;
    	$data['category_name'] = $request->category_name;
    	$data['category_desc'] = $request->category_desc;
    	$data['publication_status'] = $request->publication_status;

    	DB::table('tbl_category')->insert($data);
    	Session::put('message','Category Added Successfully.');
    	return Redirect::to('/add-category');
    }

    public function unactive_category($id){
         $this->AdminAuth();
    	DB::table('tbl_category')
    	->where('id', $id)
    	->update(['publication_status'=>1]);
    	Session::put('message', 'Category Unactive Successfully.');
    	return Redirect::to('/all-category');
    }
    public function active_category($id){
         $this->AdminAuth();
    	DB::table('tbl_category')
    	->where('id', $id)
    	->update(['publication_status'=>0]);
    	Session::put('message', 'Category Active Successfully.');
    	return Redirect::to('/all-category');
    	
    	
    }

    public function edit_category($id){
         $this->AdminAuth();
    	// Session::put('id', $id);
    	$category_info= DB::table('tbl_category')
    	 ->where('id', $id)
    	 ->first();
    	 

		$category_info = view('admin.edit_category')
    	->with('category_info', $category_info);
    	return view('admin_layout')
    	->with('admin.edit_category', $category_info);

    	//return view('admin.edit_category');
    }


    public function update_category(Request $request, $id){
 $this->AdminAuth();
    	$data=array();
    	$data['category_name']=$request->category_name;
    	$data['category_desc']=$request->category_desc;

    	DB::table('tbl_category')
    	->where('id', $id)
    	->update($data);

    	Session::put('message', 'Category Update Successfully.');
    	return Redirect::to('/all-category');
    }

    public function delete_category($id){
         $this->AdminAuth();
    	DB::table('tbl_category')
    	->where('id', $id)
    	->delete();
    	Session::put('message', 'Category Deleted Successfully.');
    	return Redirect::to('/all-category');

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
