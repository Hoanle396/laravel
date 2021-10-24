<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class AdminOrder extends Controller
{
    public function allorder(){
        if (Session::get("admin_name")) {
            $order = Order::orderByDesc('order_id')->paginate(8);
            $order_ = view('admin.order')->with('order', $order);
            return view('admin_layout')->with('admin.order', $order_);
        } else {
            return Redirect::to('/Admin');
        }
    }
}
