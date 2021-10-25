<?php

namespace App\Http\Controllers;

use App\Models\News;
use Exception;
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
    public function loadadd()
    {
        if (Session::get('admin_name')) {
            return view('admin.addnews');
        } else {
            return Redirect::to('/Admin');
        }
    }
    public function add(Request $request)
    {
        try {
            $request->validate([
                'image' => [
                    'required',
                    'mimes:jpeg,png,jpg',
                    'mimetypes:image/jpeg,image/png,image/jpg',
                    'max:1000000'
                ]
            ]);
            $image = $request->file('image');
            $newimage = time() . "-" . $request->name . "." . $image->getClientOriginalExtension();
            $image->move('./imageupload', $newimage);
            $data = [
                'news_title' => $request->name,
                'news_description' => $request->description,
                'news_image' => '/imageupload/' . $newimage,
            ];
            News::create($data);
            Session::put('message', 'Đã Thêm Tin Này');
            return Redirect::back();
        } catch (Exception) {
            abort(404);
        }
    }
    public function updatenew($id)
    {
        if (Session::get("admin_name")) {
            $news = News::where('news_id', $id)->get()->first();
            $news_ = view('admin.updatenews')->with('news', $news);
            return view('admin_layout')->with('admin.updatenews', $news_);
        } else {
            return Redirect::to('/Admin');
        }
    }
    public function update(Request $request)
    {
        try {
            $request->validate([
                'image' => [
                    'required',
                    'mimes:jpeg,png,jpg',
                    'mimetypes:image/jpeg,image/png,image/jpg',
                    'max:1000000'
                ]
            ]);
            $image = $request->file('image');
            $newimage = time() . "-" . $request->name . "." . $image->getClientOriginalExtension();
            $image->move('./imageupload', $newimage);
            $data = [
                'news_title' => $request->name,
                'news_description' => $request->description,
                'news_image' => '/imageupload/' . $newimage,
            ];
            News::where('news_id',$request->id)->update($data);
            Session::put('message', 'Đã Sửa Tin Này');
            return Redirect::back();
        } catch (Exception) {
            abort(404);
        }
    }
}
