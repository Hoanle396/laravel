<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class AdminNews extends Controller
{
    public function getall()
    {
        if (Session::get("admin_name")) {
            $news = News::orderByDesc('news_id')->paginate(8);
            $news_ = view('admin.news')->with('news', $news);
            return view('admin_layout')->with('admin.news', $news_);
        } else {
            return Redirect::to('/Admin');
        }
    }
    public function delete($id)
    {
        if (Session::get("admin_name")) {
            $news = News::where('news_id', $id)->delete();
            if ($news) {
                Session::put('message', 'Đã xóa nội dung này');
                return Redirect::back();
            } else {
                Session::put('message', 'Xảy ra lỗi');
                return Redirect::back();
            }
        } else {
            return Redirect::to('/Admin');
        }
    }
}
