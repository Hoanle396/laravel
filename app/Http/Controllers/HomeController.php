<?php

namespace App\Http\Controllers;

use DB;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;

session_start();
class HomeController extends Controller
{
    public function index()
    {
        return view('client.home');
    }
    public function help()
    {
        if (Session::get("user_email")) {
            return view('client.feedback');
        } else {
            return Redirect::to('/Auth/Login');
        }
    }
    public function profile()
    {
        if (Session::get("user_email")) {
            return view('client.profile');
        } else {
            return Redirect::to('/Auth/Login');
        }
    }
    public function register()
    {
        return view('client.register');
    }
    public function login(){
        if(Session::get("user_email")){
            return Redirect::back();
        }
        return view('client.login');
    }

}
