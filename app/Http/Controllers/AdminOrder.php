<?php

namespace App\Http\Controllers;

use App\Models\OderDetail;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class AdminOrder extends Controller
{
    public function allorder()
    {
        if (Session::get("admin_name")) {
            $order = Order::where('order_status', 'Chờ Xử Lý')->orderByDesc('order_id')->paginate(8);
            $allorder = Order::orderByDesc('order_id')->paginate(8);
            $order_ = view('admin.order')->with('order', $order)->with('all', $allorder);
            return view('admin_layout')->with('admin.order', $order_);
        } else {
            return Redirect::to('/Admin');
        }
    }
    public function detailorder($code)
    {
        if (Session::get("admin_name")) {
            $order = OderDetail::where('order_code',$code)->orderByDesc('order_id')->paginate(8);
            $order_ = view('admin.order')->with('order', $order);
            return view('admin_layout')->with('admin.order', $order_);
        } else {
            return Redirect::to('/Admin');
        }
    }
}
