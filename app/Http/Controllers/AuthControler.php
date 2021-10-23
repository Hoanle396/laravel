<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use Exception;
use Illuminate\Support\Facades\Mail;
use App\Mail\OrderShipped;

session_start();
class AuthControler extends Controller
{
    public function login(Request $request)
    {

        $email = $request->inputEmail;
        $password = $request->inputPassword;
        $RememberPassword = $request->inputRememberPassword;
        $result = DB::table('tbl_users')->where('user_email', $email)->where('user_password', $password)->first();
        if ($result) {
            if ($RememberPassword) {
                Cookie::queue('Email', $email, 10 * 24 * 60);
                Cookie::queue('Password', $password, 10 * 24 * 60);
            }
            Session::put("user_email", $result->user_email);
            return Redirect::to('./');
        } else {
            Session::put("message", "Tài Khoản Hoặc Mật Khẩu Sai");
            return Redirect::to('Auth/Login');
        }
    }
    public function profile()
    {
        if (Session::get("user_email")) {
            $account = DB::table('tbl_users')->where('user_email', Session::get('user_email'))->first();
            $manager_account = view('client.profile')->with("account", $account);
            return view('welcome')->with('client.profile', $manager_account);
        } else {
            return Redirect::to('/Auth/Login');
        }
    }
    public function logout()
    {
        Session::put("user_email", null);
        return Redirect::to('/Auth/Login');
    }
    public function registeracc(Request $request)
    {
        $data = array();
        $data["user_fullname"] = $request->inputFirstName . " " . $request->inputLastName;
        $data['user_email'] = $request->inputEmail;
        $data['user_password'] = $request->inputPassword;
        $data['user_status'] = 'Hoạt Động';
        $passwordconfrim = $request->inputPasswordConfirm;
        if ($data['user_password'] == $passwordconfrim) {
            try {
                DB::table("tbl_users")->insert($data);
                Session::put("message", "Đăng Kí Tài Khoản Thành Công");
                return Redirect::to("Auth/Register");
            } catch (Exception $e) {
                Session::put("message", "Tài Khoản Đã Tồn Tại Trong Hệ Thống");
                return Redirect::to("Auth/Register");
            }
        } else {
            Session::put("message", "Đăng Kí Tài Khoản Không Thành Công");
            return Redirect::to("Auth/Register");
        }
    }
    public function forgot()
    {
        return view('client.forgot');
    }
    public function forgoted(Request $request)
    {
        $mail = $request->inputEmail;
        $result = DB::table('tbl_users')->where('user_email', $mail)->first();
        if ($result) {
            $data = ['user_password' => rand(10000000, 99999999)];
            Mail::to($mail)->send(new OrderShipped($data, 'Khôi Phục Mật Khẩu', 'mail'));
            DB::table('tbl_users')->where('user_email', $mail)->update($data);
            Session::put("message", "Mật Khẩu Mới Đã Được Gửi Đến Email Của Bạn!");
            return Redirect::to("Auth/Forgot");
        } else {
            Session::put("message", "Tài khoản Này Chưa Tồn Tại Trong Hệ Thống!");
            return Redirect::to("Auth/Forgot");
        }
    }
    public function change(Request $request)
    {
        try{
            if ($request->changedetail) {
                $data = [
                    'user_fullname' => $request->name,
                    'user_phonenumber' => $request->phonenumber
                ];
                try {
                    DB::table('tbl_users')->where('user_email', Session::get('user_email'))->update($data);
                    Session::put("message", "Thay Đổi Thành Công");
                    return Redirect::to('Auth/Profile');
                } catch (Exception $e) {
                    Session::put("message", "Thay Đổi Không Thành Công");
                    return Redirect::to('Auth/Profile');
                }
            }
            if ($request->changepass) {
                if ($request->newpwd == $request->confirmpwd) {
                    $result = DB::table('tbl_users')->where('user_email', Session::get('user_email'))->where('user_password', $request->currentpwd)->first();
                    if ($result) {
                        $data = ['user_password' => $request->newpwd];
                        DB::table('tbl_users')->where('user_email', Session::get('user_email'))->update($data);
                        Session::put("message", "Thay Đổi Thành Công");
                        return Redirect::to('Auth/Profile');
                    } else {
                        Session::put("message", "Mật Khẩu cũ không đúng");
                        return Redirect::to('Auth/Profile');
                    }
                } else {
                    Session::put("message", "Mật Khẩu không khớp");
                    return Redirect::to('Auth/Profile');
                }
            }
            if ($request->changeaddress) {
                $data = [
                    //  'user_address' => $request->ward.", ".$request->distric.", ".$request->city
                    'user_address' => $request->address
                ];
                try {
                    DB::table('tbl_users')->where('user_email', Session::get('user_email'))->update($data);
                    Session::put("message", "Thay Đổi Thành Công");
                    return Redirect::to('Auth/Profile');
                } catch (Exception $e) {
                    Session::put("message", "Thay Đổi Không Thành Công");
                    return Redirect::to('Auth/Profile');
                }
            }
        }
        catch(Exception){
            abort(404);
        }
    }
}
