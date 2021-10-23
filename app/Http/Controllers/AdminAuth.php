<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class AdminAuth extends Controller
{
    public function all(){
        if (Session::get("admin_name")) {
            $auth= User::orderByDesc('user_id')->paginate(8);
            $authbaned=User::where('user_status','Khóa')->paginate(8);
            $auth_ = view('admin.auth')->with('auth', $auth)->with('baned',$authbaned);
            return view('admin_layout')->with('admin.auth', $auth_);
        } else {
            return Redirect::to('/Admin');
        }
    }
}
