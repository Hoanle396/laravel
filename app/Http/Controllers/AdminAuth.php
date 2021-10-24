<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class AdminAuth extends Controller
{
    public function all()
    {
        if (Session::get("admin_name")) {
            $auth = User::orderByDesc('user_id')->paginate(8);
            $authbaned = User::where('user_status', 'Khóa')->paginate(8);
            $auth_ = view('admin.auth')->with('auth', $auth)->with('baned', $authbaned);
            return view('admin_layout')->with('admin.auth', $auth_);
        } else {
            return Redirect::to('/Admin');
        }
    }
    public function delete($id)
    {
        if (Session::get("admin_name")) {
            $auth = User::where('user_id', $id)->delete();
            if ($auth) {
                Session::put('message', 'Đã xóa Người Dùng');
                return Redirect::to('Admin/customer');
            } else {
                Session::put('message', 'Xảy ra lỗi');
                return Redirect::to('Admin/customer');
            }
        } else {
            return Redirect::to('/Admin');
        }
    }
    public function block($id)
    {
        if (Session::get("admin_name")) {
            $auth = User::where('user_id', $id)->get()->first();
            if ($auth) {
                if ($auth->user_status == 'khóa') {
                    User::where('user_id', $id)->update(['user_status' => 'Hoạt Động']);
                    Session::put("message", "Đã Mở Khóa Tài Khoản");
                    return Redirect::back();
                } else {
                    User::where('user_id', $id)->update(['user_status' => 'khóa']);
                    Session::put("message", "Đã Khóa Tài Khoản");
                    return Redirect::back();
                }
            } else {
                Session::put('message', 'Xảy ra lỗi');
                return Redirect::to('Admin/customer');
            }
        } else {
            return Redirect::to('/Admin');
        }
    }
}
