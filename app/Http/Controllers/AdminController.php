<?php

namespace App\Http\Controllers;

use App\Models\Feedback;
use App\Models\OderDetail;
use App\Models\product;
use App\Models\Service;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
session_start();
class AdminController extends Controller
{
    public function index(){
        if(Session::get("admin_name")){
            return Redirect::to('/Admin/dashboard');
        }else{
            return view('login_admin');
        }
    }
    public function dashboard(){
        if(Session::get("admin_name")){
           $order= OderDetail::orderByDesc('oder_detail_id')->paginate(5);
           $thongke=[
               'totaluser'=>User::all()->count(),
               'totalorder'=>OderDetail::all()->count(),
               'totalproduct'=>product::all()->count(),
               'totalservice'=>Service::all()->count(),
               'totalfeedback'=>Feedback::all()->count()
           ];
           $feedback= Feedback::orderByDesc('feedback_id')->paginate(5);
           $order_= view('admin.index')->with('order',$order)->with('total',$thongke)->with('feedback',$feedback);
           return view('admin_layout')->with('admin.index',$order_);
        }else{
            return Redirect::to('/Admin');
        }


    }
    public function login_dashboard(Request $request){
        $admin_email=$request->admin_email;
        $admin_password=$request->admin_password;
        $result = DB::table('tbl_admin')->where('admin_email',$admin_email)->where('admin_password',$admin_password)->first();
        if($result){
            Session::put("admin_name",$result->admin_name);
            Session::put("admin_id",$result->admin_id);
            return Redirect::to('/Admin/dashboard');
        }else{
            Session::put("message","Tài Khoản Hoặc Mật Khẩu Sai");
            return Redirect::to('/Admin');
        }
    }
    public function logout(){
        Session::put("admin_name",null);
        Session::put("admin_id",null);
        return Redirect::to('/Admin');
    }
}
