<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use Session;
use Illuminate\Support\Facades\Redirect;

class ManufactureController extends Controller
{
     public function index(){
$this->AdminAuth();
    	return view('admin.add_manufacture');
    }

    public function all_manufacture(){
$this->AdminAuth();
    	$all_manufacture = DB::table('tbl_manufacture')->get();
    	$manage_manufacture = view('admin.all_manufacture')

    	->with('all_manufacture', $all_manufacture);
    	return view('admin_layout')
    	->with('admin.all_manufacture', $manage_manufacture);

    	//return view('admin.all-category');
    }

    public function save_manufacture(Request $request){
$this->AdminAuth();
		$data=array();
    	$data['manufacture_id'] = $request->manufacture_id;
    	$data['manufacture_name'] = $request->manufacture_name;
    	$data['manufacture_desc'] = $request->manufacture_desc;
    	$data['publication_status'] = $request->publication_status;

    	DB::table('tbl_manufacture')->insert($data);
    	Session::put('message','Manufacture Added Successfully.');
    	return Redirect::to('/add_manufacture');
    }

    public function unactive_manufacture($manufacture_id){
        $this->AdminAuth();
    	DB::table('tbl_manufacture')
    	->where('manufacture_id', $manufacture_id)
    	->update(['publication_status'=>1]);
    	Session::put('message', 'Manufacture Active Successfully.');
    	return Redirect::to('/all_manufacture');
    }
    public function active_manufacture($manufacture_id){
        $this->AdminAuth();
    	DB::table('tbl_manufacture')
    	->where('manufacture_id', $manufacture_id)
    	->update(['publication_status'=>0]);
    	Session::put('message', 'Manufacture Unactive Successfully.');
    	return Redirect::to('/all_manufacture');
    	
    	
    }

    public function edit_manufacture($manufacture_id){
    	// Session::put('id', $id);
        $this->AdminAuth();
    	$manufacture_info= DB::table('tbl_manufacture')
    	 ->where('manufacture_id', $manufacture_id)
    	 ->first();
    	 

		$manufacture_info = view('admin.edit_manufacture')
    	->with('manufacture_info', $manufacture_info);
    	return view('admin_layout')
    	->with('admin.edit_manufacture', $manufacture_info);

    	//return view('admin.edit_category');
    }


    public function update_manufacture(Request $request, $manufacture_id){
$this->AdminAuth();
    	$data=array();
    	$data['manufacture_name']=$request->manufacture_name;
    	$data['manufacture_desc']=$request->manufacture_desc;

    	DB::table('tbl_manufacture')
    	->where('manufacture_id', $manufacture_id)
    	->update($data);

    	Session::put('message', 'Manufacture Update Successfully.');
    	return Redirect::to('/all_manufacture');
    }

    public function delete_manufacture($manufacture_id){
        $this->AdminAuth();
    	DB::table('tbl_manufacture')
    	->where('manufacture_id', $manufacture_id)
    	->delete();
    	Session::put('message', 'Manufacture Deleted Successfully.');
    	return Redirect::to('/all_manufacture');

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
