<?php

namespace App\Http\Controllers;

use App\Models\product;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class AdminProduct extends Controller
{
    public function add()
    {
        if (Session::get("admin_name")) {
            $product = product::orderByDesc('product_id')->paginate(5);
            $product_ = view('admin.addproduct')->with('product', $product);
            return view('admin_layout')->with('admin.addproduct', $product_);
        } else {
            return Redirect::to('/Admin');
        }
    }
    public function addproduct(Request $request)
    {
        try {
            $request->validate([
                'product_image' => [
                    'required',
                    'mimes:jpeg,png,jpg',
                    'mimetypes:image/jpeg,image/png,image/jpg',
                    'max:1000000'
                ]
            ]);
            $image = $request->file('product_image');
            $newimage = time() . "-" . $request->product_name . "." . $image->getClientOriginalExtension();
            $image->move('./imageupload', $newimage);
            $data = [
                'product_name' => $request->product_name,
                'product_description' => $request->product_description,
                'product_image' => '/imageupload/' . $newimage,
                'product_price' => $request->product_price,
                'product_origin' => $request->product_origin,
                'product_manufacturer' => $request->product_manufacturer,
                'product_discount' => $request->product_discount
            ];
            product::create($data);
            Session::put('message', 'Đã Thêm Sản Phẩm');
            return Redirect::to('/Admin/addproduct');
        } catch (Exception) {
            abort(404);
        }
    }
    public function all()
    {
        if (Session::get("admin_name")) {
            $product = product::orderByDesc('product_id')->paginate(8);
            $product_ = view('admin.product')->with('product', $product);
            return view('admin_layout')->with('admin.product', $product_);
        } else {
            return Redirect::to('/Admin');
        }
    }
    public function delete($id)
    {
        if (Session::get("admin_name")) {
            $product = product::where('product_id', $id)->delete();
            if ($product) {
                Session::put('message', 'Đã xóa sản phẩm');
                return Redirect::to('/Admin/product');
            } else {
                Session::put('message', 'Xảy ra lỗi');
                return Redirect::to('/Admin/product');
            }
        } else {
            return Redirect::to('/Admin');
        }
    }
    public function updateproduct($id)
    {
        if (Session::get("admin_name")) {
            $product = product::where('product_id', $id)->get()->first();
            $product_ = view('admin.updateproduct')->with('product', $product);
            return view('admin_layout')->with('admin.updateproduct', $product_);
        } else {
            return Redirect::to('/Admin');
        }
    }
    public function update(Request $request)
    {
        try {
            $data = [
                'product_name' => $request->product_name,
                'product_description' => $request->product_description,
                'product_price' => $request->product_price,
                'product_origin' => $request->product_origin,
                'product_manufacturer' => $request->product_manufacturer,
                'product_discount' => $request->product_discount
            ];
            $result = product::where('product_id', $request->product_id)->update($data);
            if ($result) {
                Session::put('message', 'Đã Sửa Sản Phẩm');
                return Redirect::to('Admin/product/update/' . $request->product_id);
            } else {
                Session::put('message', 'Đã Xảy Ra Lỗi');
                return Redirect::to('Admin/product/update/' . $request->product_id);
            }
        } catch (Exception) {
            abort(404);
        }
    }
}
