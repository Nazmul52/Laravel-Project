<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use Session;
use Illuminate\Support\Facades\Redirect;

session_start();

class SuperAdminController extends Controller
{
  

    public function index(){

        $this->AdminAuth();
    return view('admin.dashboard');
   
    }

    public function AdminAuth(){
      $admin_id =   Session::get('admin_id');
      if($admin_id){
        return;
      }else{
         return Redirect::to('/login')->send();
      }
    }


      public function logout()
     {
    //  Session::put('admin_name', null);
    //  Session::put('admin_id', null);
    //  Session::put('admin_phone', null);
    //  Session::put('admin_email', null);
        Session::flush();
        return Redirect::to('/login');
        session_destroy();
    }
}
