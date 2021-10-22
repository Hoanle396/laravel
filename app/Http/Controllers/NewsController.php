<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;

class NewsController extends Controller
{
    public function tintuc()
    {
        $all_news = DB::table('tbl_news')->paginate(6);
        $news = DB::table('tbl_news')->latest('news_id')->first();;
        $manager_news = view('client.News')->with("all_news", $all_news)->with("news", $news);
        return view('welcome')->with('client.News', $manager_news);
    }
    public function tintucdetail($id)
    {
            $news = DB::table('tbl_news')->where("news_id", $id)->get()->first();
            if(!$news){
                abort(404);
            }
            $manager_news = view('client.Detailnews')->with("news", $news);
            return view('welcome')->with('client.Detailnews', $manager_news);
        
    }
    public function search($search)
    {
        $all_news = DB::table("tbl_news")->where("news_title", "like", "%" . $search . "%")
            ->orWhere("news_description", "like", "%" . $search . "%")
            ->orWhere("created_at", "like", "%" . $search . "%")
            ->paginate(8);
        return $all_news;
    }
}
