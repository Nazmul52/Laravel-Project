<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use Session;
use Illuminate\Support\Facades\Redirect;

session_start();

class SliderController extends Controller
{
    public function index(){
    		$this->AdminAuth();
    	return view('admin.add_slider');
    }

    public function save_slider(Request $request){
    	$this->AdminAuth();
    	$data=array();
    	$data['publication_status'] = $request->publication_status;

    	$image=$request->file('slider_image');
    	if($image){
    		$image_name=str_random(20);
    		$ext=strtolower($image->getClientOriginalExtension());
    		$image_full_name=$image_name.'.'.$ext;
    		$upload_path='slider/';
    		$image_url=$upload_path.$image_full_name;
    		$success=$image->move($upload_path,$image_full_name);
    		if($success){
    			$data['slider_image'] = $image_url;
    			DB::table('tbl_slider')->insert($data);
    			Session::put('message', 'Slider Added Successfully.');
    			return Redirect::to('/add_slider');
    		}
    	}

    	$data['slider_image']='';
    	DB::table('tbl_slider')->insert($data);


    	
    	Session::put('message', 'Slider Added Successfully without image.');
    			return Redirect::to('/add_slider');
    	
    }

      public function all_slider(){
		$this->AdminAuth();
		$all_slider = DB::table('tbl_slider')->get();
    	$manage_slider = view('admin.all_slider')

    	->with('all_slider', $all_slider);
    	return view('admin_layout')
    	->with('admin.all_slider', $manage_slider);
}


 public function unactive_slider($slider_id){
     	$this->AdminAuth();
    	DB::table('tbl_slider')
    	->where('slider_id', $slider_id)
    	->update(['publication_status'=>1]);
    	Session::put('message', 'Slider Active Successfully.');
    	return Redirect::to('/all_slider');
    }

    public function active_slider($slider_id){
    	$this->AdminAuth();
    	DB::table('tbl_slider')
    	->where('slider_id', $slider_id)
    	->update(['publication_status'=>0]);
    	Session::put('message', 'Slider Unactive Successfully.');
    	return Redirect::to('/all_slider');
    	
    	
    }


     public function edit_slider($slider_id){
     	$this->AdminAuth();
    	// Session::put('id', $id);
    	$slider_info= DB::table('tbl_slider')
    	 ->where('slider_id', $slider_id)
    	 ->first();
    	 

		$slider_info = view('admin.edit_slider')
    	->with('slider_info', $slider_info);
    	return view('admin_layout')
    	->with('admin.edit_slider', $slider_info);

    	//return view('admin.edit_category');
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
