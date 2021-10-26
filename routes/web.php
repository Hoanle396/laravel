<?php

use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
//Client

Route::get('/','HomeController@index');
Route::get('/Auth/Help','HomeController@help');
Route::get('/Auth/Login','HomeController@login');
Route::get('/Auth/Register','HomeController@register');


Route::get('/Auth/Logout','AuthControler@logout');
Route::post('/Register','AuthControler@registeracc');
Route::post('/Login','AuthControler@login');
Route::get('/Auth/Profile','AuthControler@profile');
Route::get('/Auth/Forgot','AuthControler@forgot');
Route::get('/Auth/Forgoted/','AuthControler@forgoted');
Route::post('/Auth/Change','AuthControler@change');

Route::get('/Auth/Product','ProductController@product');
Route::get('/Auth/Product/{product_id}','ProductController@productview');
Route::get('/add-to-cart/{id}', 'ProductController@addToCart');
Route::get('/remove-from-cart/{id}', 'ProductController@remove');
Route::get('Auth/Search/{search}','ProductController@search');

Route::get('Checkout','CheckoutController@index');
Route::post('Checkout/success','CheckoutController@success');
Route::get('Bank','CheckoutController@banking');
Route::get('Auth/done', 'CheckoutController@done');

Route::get('/Auth/Tintuc','NewsController@tintuc');
Route::get('/Auth/Tintuc/{id}','NewsController@tintucdetail');
Route::get('/Auth/Tintuc/Search/{search}','NewsController@search');

Route::get('Auth/Service','ServiceController@index');
Route::post('Auth/service','ServiceController@service');
Route::post('Auth/Feedback','ServiceController@feedback');

//Admin
Route::get('/Admin','AdminController@index');
Route::get('/Admin/dashboard','AdminController@dashboard');
Route::get('/Admin/Logout','AdminController@logout');
Route::post('/admin_dashboard','AdminController@login_dashboard');

Route::get('/Admin/addproduct','AdminProduct@add');
Route::post('/Admin/add-product','AdminProduct@addproduct');
Route::get('/Admin/product','AdminProduct@all');
Route::get('/Admin/product/delete/{id}','AdminProduct@delete');
Route::get('Admin/product/update/{id}','AdminProduct@updateproduct');
Route::post('Admin/update-product','AdminProduct@update');

Route::get('Admin/service','AdminService@all');
Route::get('Admin/Service/delete/{id}','AdminService@delete');
Route::get('Admin/service/update/{id}','AdminService@updateservice');
Route::post('Admin/service/update','AdminService@update');
Route::get('Admin/list-service','AdminService@list');
Route::get('Admin/Service/done/{id}','AdminService@done');

Route::get('Admin/customer','AdminAuth@all');
Route::get('Admin/Customer/delete/{id}','AdminAuth@delete');
Route::get('Admin/Customer/update/{id}','AdminAuth@block');

Route::get('/Admin/allorder','AdminOrder@allorder');
Route::get('Admin/Order/view/{code}', 'AdminOrder@detailorder');
Route::post('/Admin/Order/update','AdminOrder@updateorder');

Route::get('Admin/news','AdminNews@getall');
Route::get('Admin/news/delete/{id}','AdminNews@delete');
Route::get('Admin/addnews','AdminNews@loadadd');
Route::post('Admin/add-news','AdminNews@add');
Route::get('Admin/news/update/{id}','AdminNews@updatenew');
Route::post('Admin/update-news','AdminNews@update');
