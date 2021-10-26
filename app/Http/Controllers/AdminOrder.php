<?php

namespace App\Http\Controllers;

use App\Mail\OrderShipped;
use App\Models\OderDetail;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
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
            $order = OderDetail::where('oder_code', $code)->select('product_id', 'product_name', 'product_quantity')->orderByDesc('oder_detail_id')->get();
            $user = OderDetail::where('oder_code', $code)->select('oder_code', 'user_fullname', 'user_email', 'user_phonenumber', 'user_address', 'oder_status', 'oder_pay')->orderByDesc('oder_detail_id')->get()->first();
            $order_ = view('admin.orderdetail')->with('order', $order)->with('user', $user);
            return view('admin_layout')->with('admin.orderdetail', $order_);
        } else {
            return Redirect::to('/Admin');
        }
    }
    public function updateorder(Request $request)
    {
        if (Session::get("admin_name")) {
            if ($request->save) {
                OderDetail::where('oder_code', $request->code)->update(['oder_status' => $request->status]);
                Order::where('order_code', $request->code)->update(['order_status' => $request->status]);
                $order =DB::table('tbl_order_details')->where('oder_code', $request->code)->select('product_name', 'product_quantity')->get();

                $data=[
                    'order'=>$order,
                    'status'=>$request->status,
                    'code'=> $request->code,
                    'reson'=>'Gửi từ hệ thống'
                ];
                Mail::to($request->email)->send(new OrderShipped($data,'Đơn Hàng Của Bạn','order'));
                Session::put('message', 'Đã cập nhật trạng thái đơn hàng');
                return Redirect::back();
            } else if ($request->huy) {
                OderDetail::where('oder_code', $request->code)->update(['oder_status' => 'Đơn Hàng Bị Hủy']);
                Order::where('order_code', $request->code)->update(['order_status' => 'Đơn Hàng Bị Hủy']);
                $order = DB::table('tbl_order_details')->where('oder_code', $request->code)->select('product_name', 'product_quantity')->get();
                $data=[
                    'order'=>$order,
                    'status'=>'Đơn Hàng Bị Hủy',
                    'code'=> $request->code,
                    'reson'=>$request->description
                ];
                Mail::to($request->email)->send(new OrderShipped($data,'Đơn Hàng Của Bạn','order'));
                Session::put('message', 'Đã hủy đơn hàng');
                return Redirect::back();
            } else {
                abort(404);
            }
        } else {
            return Redirect::to('/Admin');
        }
    }
}
