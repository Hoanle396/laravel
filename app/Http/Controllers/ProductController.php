<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class ProductController extends Controller
{
    public function product()
    {
        $all_product = DB::table('tbl_product')->paginate(8);
        $manager_product = view('client.product')->with("all_product", $all_product);
        return view('welcome')->with('client.product', $manager_product);
    }
    public function productview($product_id)
    {
        try {
            $product = DB::table('tbl_product')->where("product_id", $product_id)->get()->first();
            $like = DB::table("tbl_product")->where("product_manufacturer", "like", $product->product_manufacturer)->limit(4)->get();
            $manager_product = view('client.Detailproduct')->with("product", $product)->with("like", $like);
            return view('welcome')->with('client.Detailproduct', $manager_product);
        } catch (Exception) {
            abort(404);
        }
    }
    public function addToCart($id)
    {
        $product = DB::table('tbl_product')->where("product_id", $id)->get()->first();
        if (!$product) {
            abort(404);
        }
        $cart = session()->get('cart');
        if (!$cart) {
            $cart = [
                $id => [
                    "id" => $id,
                    "name" => $product->product_name,
                    "quantity" => 1,
                    "price" => $product->product_price,
                    "photo" => $product->product_image
                ]
            ];
            session()->put('cart', $cart);
            return redirect()->back()->with('success', 'Đã Thêm Vào Giỏ Hàng!');
        }
        if (isset($cart[$id])) {
            $cart[$id]['quantity']++;
            session()->put('cart', $cart);
            return redirect()->back()->with('success', 'Đã Thêm Vào Giỏ Hàng!');
        }
        $cart[$id] = [
            "id" => $id,
            "name" => $product->product_name,
            "quantity" => 1,
            "price" => $product->product_price,
            "photo" => $product->product_image
        ];
        session()->put('cart', $cart);
        return redirect()->back()->with('success', 'Đã Thêm Vào Giỏ Hàng!');
    }
    public function remove(Request $request)
    {
        if ($request->id) {
            $cart = session()->get('cart');
            if (isset($cart[$request->id])) {
                unset($cart[$request->id]);
                session()->put('cart', $cart);
            }
            return redirect()->back()->with('success', 'Đã Xóa Khỏi Giỏ Hàng!');
        }
    }
    public function search($search)
    {
        $all_product = DB::table("tbl_product")->where("product_name", "like", "%" . $search . "%")
            ->orWhere("product_price", "like", "%" . $search . "%")
            ->orWhere("product_description", "like", "%" . $search . "%")
            ->orWhere("product_origin", "like", "%" . $search . "%")
            ->orWhere("product_manufacturer", "like", "%" . $search . "%")
            ->paginate(8);
        return $all_product;
    }
}
