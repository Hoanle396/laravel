<?php

namespace App\Http\Controllers;

use App\Mail\OrderShipped;
use App\Models\OderDetail;
use App\Models\Order;
use Carbon\Carbon as time;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class CheckoutController extends Controller
{
    public function index()
    {
        try {
            if (Session::get("user_email") && Session::get('cart')) {
                $account = DB::table('tbl_users')->where('user_email', Session::get('user_email'))->first();
                $manager_account = view('client.checkout')->with("account", $account);
                return view('welcome')->with('client.checkout', $manager_account);
            } else {
                return Redirect::to('Auth/Profile');
            }
        } catch (Exception) {
            abort(404);
        }
    }
    public function success(Request $request)
    {
        $code = substr(sha1(time()), 0, 8);
        try {
            $oder = [
                'order_code' => $code,
                'order_date' => Time::now(),
                'order_pay' => $request->pay,
                'order_total' => $request->total,
                'order_status' => 'Chờ Xử Lý'
            ];
            DB::table('tbl_order')->insert($oder);
            foreach (Session::get('cart') as $id => $details) {
                $detail = new OderDetail();
                $detail->oder_code = $code;
                $detail->product_id = $details['id'];
                $detail->product_name = $details['name'];
                $detail->product_quantity = $details['quantity'];
                $detail->user_fullname = $request->fullname;
                $detail->user_email = $request->email;
                $detail->user_phonenumber = $request->phonenumber;
                $detail->user_address = $request->address;
                $detail->user_address2 = $request->address2;
                $detail->oder_status = 'Chờ Xử lý';
                $detail->oder_pay = $request->pay;
                $detail->save();
            }
            if ($request->pay == 'offline') {
                $order = DB::table('tbl_order_details')->where('oder_code', $code)->select('product_name', 'product_quantity')->get();
                $data = [
                    'order' => $order,
                    'status' => 'Chờ Xử lý',
                    'code' => $code,
                    'reson' => 'Gửi từ hệ thống'
                ];
                Mail::to($request->email)->send(new OrderShipped($data, 'Đơn Hàng Của Bạn', 'order'));
                Session::put("message", "Đặt Hàng Thành Công Đơn Hàng Của Bạn Đang Được Xử Lý");
                return Redirect::back();
            } else if ($request->pay == 'online') {
                Session::put("message", "Đặt Hàng Thành Công Đang Chuyển Hướng Vui Lòng Đợi");
                Session::put("redirect", "online");
                Session::put("total", $request->total);
                Session::put("code", $code);
                return Redirect::back();
            }
        } catch (Exception $e) {
            Session::put("message", "Xảy Ra Lỗi Vui Lòng Thử Lại");
            return Redirect::to("Checkout");
        }
    }
    public function banking()
    {
        if (!Session::get("total")) {
            abort(404);
        } else {
            $bank = DB::table('tbl_banking')->first();
            $bank_ = view('client.bank')->with("bank", $bank);
            return view('welcome')->with('client.bank', $bank_);;
        }
    }
    public function done()
    {
        if (!Session::get("total")) {
            abort(404);
        } else {
            OderDetail::where('oder_code', Session::get('code'))->update(['oder_status' => 'Đã thanh toán']);
            Order::where('order_code', Session::get('code'))->update(['order_status' => 'Đã thanh toán']);
            $order = DB::table('tbl_order_details')->where('oder_code', Session::get('code'))->select('product_name', 'product_quantity', 'user_email')->get();
            $data = [
                'order' => $order,
                'status' => 'Chờ Xử lý',
                'code' => Session::get('code'),
                'reson' => 'Gửi từ hệ thống'
            ];
            Mail::to($order[0]->user_email)->send(new OrderShipped($data, 'Đơn Hàng Của Bạn', 'order'));
            Session::put("total", null);
            Session::put("code", null);
            return Redirect::to('Auth/Profile');
        }
    }
}
