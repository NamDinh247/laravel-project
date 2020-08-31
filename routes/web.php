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

#Home
Route::get('/', 'Frontend\HomeController@getHomePage')
    ->name('homePage');
#End home

# Region login, register
Route::post('/register', 'Frontend\HomeController@postRegister')
    ->name('home.postRegister');

Route::get('/login', 'Frontend\HomeController@getLogin')
    ->name('home.getLogin');

Route::post('/login', 'Frontend\HomeController@postLogin')
    ->name('home.postLogin');

Route::get('/logout', 'Frontend\HomeController@getLogout')
    ->name('home.logout');

Route::post('/shop/register', 'Frontend\HomeController@postShopRegister')
    ->name('customer.shop.postRegister');
#End region login,register

Route::get('/shop/list', 'Frontend\HomeController@getListShop')
    ->name('home.shop.list');

# User product
Route::get('/product/list', 'Frontend\HomeController@getListProduct')
    ->name('home.product.list');

Route::get('/product/detail/{id}', 'Frontend\HomeController@getDetailProduct')
    ->name('home.product.detail');
# End user product

# User shopping cart
Route::get('/shopping_cart/show', 'Frontend\HomeController@getShoppingCart')
    ->name('user.shoppingCart');

Route::get('/shopping-cart/add', 'Frontend\HomeController@getAddShoppingCart')
    ->name('user.addShoppingCart');

Route::get('/shopping-cart/remove', 'Frontend\HomeController@getRemoveShoppingCart')
    ->name('user.removeShoppingCart');

Route::post('/shopping-cart/submit', 'Frontend\HomeController@submit');
# End user shopping cart

#Region profile
Route::get('/profile/info', 'Frontend\HomeController@getProfileInfo');

Route::get('/profile/order/list', 'Frontend\HomeController@getListOrderUser');

Route::get('/profile/order/detail/{id}', 'Frontend\HomeController@getDetailOrderUser');

Route::get('/profile/change-password', 'Frontend\HomeController@getUserChangePass');

Route::post('/profile/change-password', 'Frontend\HomeController@postUserChangePass');
#End region profile

// detail product
Route::get('/shop/orders/detail/{id}','Frontend\HomeController@getShopDetailOrders');
// sign in
Route::get('/sign-in','Frontend\HomeController@getSignIn');

# Shop
Route::get('/channel/shop', 'Frontend\HomeController@checkActiveShop')
    ->name('shop.channel');

Route::get('/shop/order/list', 'Frontend\HomeController@getListOrder')
    ->name('customer.shop.getListOrder');

Route::get('/shop/order/{id}', 'Frontend\HomeController@getDetailOrder')
    ->name('customer.shop.getDetailOrder');

Route::post('/shop/order/change-status', 'Frontend\HomeController@postChangeOrder')
    ->name('customer.shop.postChangeStatus');
# End shop

# Test send mail
// Route::get('/send', 'Frontend\HomeController@sendMail');
