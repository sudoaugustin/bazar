<?php

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
Route::get('/withdrawlist','AdminShopController@withdrawindex');
Route::post('/confirmWithdraw','AdminShopController@withdraw');
Route::get('/deliverlist','AdminShopController@deliverindex');
Route::post('/confirmDelivery','AdminShopController@deliver');
Route::get('/orderlist','AdminShopController@orderindex');
Route::post('/confirmOrder','AdminShopController@order');
Route::post('/change_pw','ChangePasswordController@changepw');
Route::get('/change_pwd','ChangePasswordController@pwview');
Route::post('/requestupgrade','AdminShopController@reupgrade');
Route::get('/paymentlist','AdminShopController@payindex');
Route::post('/confirmPayment','AdminShopController@payment');
Route::post('/upgradeshop','AdminShopController@update');
Route::get('/shoplist','AdminShopController@index');
Route::get('/product','ProductController@index');
Route::get('/getBrands/{category}','AppController@getBrands');
Route::get('/','AppController@app');
Route::get('/home','AppController@app');
Route::get('/login','AppController@login');
Route::get('/register','AppController@register');
Route::post('/likes',"AppController@like");
Route::post('/search',"AppController@search");
Route::post('/subscribe',"AppController@subscribe");
Route::post('/rate',"AppController@rate");
Route::get('/storeForm','AppController@storeForm');
Route::get('/cart','AppController@cart');
Route::get('/setting','AppController@setting');
Route::resource("/product","ProductsController");
Route::post('/updateUser','AppController@updateUser');
Route::resource("/shop","ShopsController");
Route::resource("/order","OrdersController");
Route::resource("/order_specification","OrderSpecificationController");
Route::resource("/exchange","ExchangesController");
Route::resource("/management","POSController");
// Route::put('/updateNotiStatus/{notiId}','AppController@updateNotiStatus');
// Route::get('/orderById/{orderId}','AppController@orderById');
// Route::get('/orderByType/{orderType}','AppController@orderByType');
// Route::get('/itemById/{itemId}','AppController@itemById');
// Route::get('/product','ProductController@index');
// Route::post('/explore','AppController@explore');
// Route::post('/order','AppController@order');
// Route::post('/store','AppController@store');
// Route::get('/storeById/{storeId}','AppController@storeById');
Auth::routes();
