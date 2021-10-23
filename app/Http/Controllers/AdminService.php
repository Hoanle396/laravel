<?php

namespace App\Http\Controllers;

use App\Mail\OrderShipped;
use App\Models\Join;
use App\Models\Service;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class AdminService extends Controller
{
    public function all()
    {
        if (Session::get("admin_name")) {
            $service = Service::orderByDesc('service_id')->paginate(8);
            $service_ = view('admin.service')->with('service', $service);
            return view('admin_layout')->with('admin.service', $service_);
        } else {
            return Redirect::to('/Admin');
        }
    }
    public function delete($id)
    {
        if (Session::get("admin_name")) {
            $product = Service::where('service_id', $id)->delete();
            if ($product) {
                Session::put('message', 'Đã xóa ');
                return Redirect::to('/Admin/service');
            } else {
                Session::put('message', 'Xảy ra lỗi');
                return Redirect::to('/Admin/service');
            }
        } else {
            return Redirect::to('/Admin');
        }
    }
    public function updateservice($id)
    {
        if (Session::get("admin_name")) {
            $service = Service::where('service_id', $id)->get()->first();
            $service_ = view('admin.updateservice')->with('service', $service);
            return view('admin_layout')->with('admin.updateservice', $service_);
        } else {
            return Redirect::to('/Admin');
        }
    }
    public function update(Request $request)
    {
        try {
            if (Session::get("admin_name")) {
                $data = [
                    'service_id' => $request->service_id,
                    'service_fullname' => $request->service_fullname,
                    'service_email' => $request->service_email,
                    'join_time' => $request->join_time,
                    'join_date' => $request->join_date,
                    'join_description' => $request->join_description
                ];
                Mail::to($request->service_email)->send(new OrderShipped($data, 'Tư Vấn Y Tế', 'join'));
                Service::where('service_id', $request->service_id)->update(['service_status' => 'Đã Lên Lịch']);
                Join::create($data);
                Session::put("message", "Đã Lên Lịch Hẹn");
                return Redirect::to('/Admin/service');
            } else {
                return Redirect::to('/Admin');
            }
        } catch (Exception $e) {
            $e->getMessage();
        }
    }
    public function list()
    {
        if (Session::get("admin_name")) {
            $service = Join::orderByDesc('join_id')->paginate(8);
            $service_ = view('admin.joinservice')->with('service', $service);
            return view('admin_layout')->with('admin.joinservice', $service_);
        } else {
            return Redirect::to('/Admin');
        }
    }
    public function done($id)
    {
        if (Session::get("admin_name")) {
            Service::where('service_id', $id)->update(['service_status' => 'Đã Hoàn Thành']);
            Join::where('service_id', $id)->update(['join_description' => 'Đã Hoàn Thành']);
            Session::put("message", "Đã Hoàn Thành Lịch Hẹn");
            return Redirect::to('/Admin/list-service');
        } else {
            return Redirect::to('/Admin');
        }
    }
}
