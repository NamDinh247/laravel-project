<?php

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

// guest + customer
Route::get('/', 'Frontend\HomeController@getHomePage')
    ->name('homePage');


//Route::get('/register', 'Frontend\HomeController@getRegister')
//    ->name('home.getRegister');
//
//Route::post('/register', 'Frontend\HomeController@postRegister')
//    ->name('home.postRegister');
//
//Route::get('/login', 'Frontend\HomeController@getLogin')
//    ->name('home.getLogin');
//
//Route::post('/login', 'Frontend\HomeController@postLogin')
//    ->name('home.postLogin');

Route::get('/shop/list', 'Frontend\HomeController@getListShop')
    ->name('home.shop.list');

Route::get('/product/list', 'Frontend\HomeController@getListProduct')
    ->name('home.product.list');

//Route::get('/product/{id}', 'Frontend\HomeController@getDetailProduct');
//
Route::get('/product/detail', 'Frontend\HomeController@getDetailProduct');

Route::get('/shopping_cart', 'Frontend\HomeController@getShoppingCart')
    ->name('home.getShoppingCart');

Route::get('/shop/orders/list','Frontend\HomeController@getShopOrdersList');
// detail product
Route::get('/shop/orders/detail/{id}','Frontend\HomeController@getShopDetailOrders');
// sign in
Route::get('/sign-in','Frontend\HomeController@getSignIn');

//Route::post('/order/create', 'Frontend\HomeController@postCreateOrder')
//    ->name('customer.create.order');
//
//Route::get('/shop/register', 'Frontend\HomeController@getShopRegister')
//    ->name('customer.shop.getRegister');
//
//Route::post('/shop/register', 'Frontend\HomeController@postShopRegister')
//    ->name('customer.shop.postRegister');
//
//// Shop
//Route::get('/shop/order/list', 'Frontend\HomeController@getListOrder')
//    ->name('customer.shop.getListOrder');
//
//Route::get('/shop/order/{id}', 'Frontend\HomeController@getDetailOrder')
//    ->name('customer.shop.getDetailOrder');
//
//Route::post('/shop/order/change-status', 'Frontend\HomeController@postChangeStatus')
//    ->name('customer.shop.postChangeStatus');

// test send mail
// Route::get('/send', 'Frontend\HomeController@sendMail');
// list product, add product shop
