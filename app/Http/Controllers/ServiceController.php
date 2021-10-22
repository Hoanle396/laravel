<?php

namespace App\Http\Controllers;

use Carbon\Carbon as time;
use Exception;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class ServiceController extends Controller
{
    public function index()
    {
        if (Session::get("user_email")) {
            return view('client.tuvan');
        } else {
            return Redirect::to('/Auth/Login');
        }
    }
    public function service(Request $request)
    {
        $data = [
            'service_fullname' => $request->firstName . " " . $request->lastName,
            'service_gender' => $request->gender,
            'service_birthday' => $request->birthday,
            'service_address' => $request->address,
            'service_email' => $request->email,
            'service_mobilePhone' => $request->mobilePhone,
            'service_homePhone' => $request->homePhone,
            'service_officePhone' => $request->officePhone,
            'created_at' => Time::now()
        ];
        try {
            DB::table('tbl_service')->insert($data);
            Session::put("message", "Đăng Kí Thành Công");
            return Redirect::back();
        } catch (Exception $e) {
            Session::put("message", "Đăng Kí Không Thành Công");
            return Redirect::back();
        }
    }
    public function feedback(Request $req){
        $data=[
          'feedback_firstname'=>$req->firstname,
          'feedback_lastname'=>$req->lastname,
          'feedback_email'=>$req->email,
          'feedback_phonenumber'=>$req->phonenumber,
          'feedback_message'=>$req->message,
          'created_at' => Time::now()
        ];
       try {
            DB::table('tbl_feedback')->insert($data);
            Session::put("message", "Phản Hồi Thành Công");
           return Redirect::back();
        } catch (Exception ) {
            Session::put("message", "Vui Lòng Thử Lại Sau");
            return Redirect::back();
        }
    }
}
