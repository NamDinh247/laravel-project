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
#product
Route::get('/product/list', 'Frontend\HomeController@getListProduct')
    ->name('home.product.list');

Route::get('/product/cate/{id}', 'Frontend\HomeController@getListProductByCate')
    ->name('home.product.list');

Route::get('/product/list/research', 'Frontend\HomeController@getListProductResearch')
    ->name('home.product.list.research');

Route::get('/product/detail/{id}', 'Frontend\HomeController@getDetailProduct')
    ->name('home.product.detail');

#shopping cart
Route::get('/shopping-cart/add', 'Frontend\HomeController@getAddShoppingCart')
    ->name('user.addShoppingCart');

Route::get('/shopping-cart/remove', 'Frontend\HomeController@getRemoveShoppingCart')
    ->name('user.removeShoppingCart');

Route::get('/shopping_cart/show', 'Frontend\HomeController@getShoppingCart')
    ->name('user.shoppingCart');

Route::post('/shopping-cart/submit', 'Frontend\HomeController@submit');
#shop
Route::get('/shops/list', 'Frontend\HomeController@getListShop')
    ->name('home.shop.list');

Route::get('/shops/detail/{id}', 'Frontend\HomeController@getDetailShop')
    ->name('home.shop.list');
#end

Route::group(['middleware' => 'auth'], function() {
    Route::post('/shop/register', 'Frontend\HomeController@postShopRegister')
        ->name('customer.shop.postRegister');

#Region profile
    Route::get('/profile/info', 'Frontend\HomeController@getProfileInfo');

    Route::post('/profile/info', 'Frontend\HomeController@postProfileInfo');

    Route::get('/profile/order/list', 'Frontend\HomeController@getListOrderUser');

    Route::get('/profile/order/detail/{id}', 'Frontend\HomeController@getDetailOrderUser');

    Route::get('/profile/change-password', 'Frontend\HomeController@getUserChangePass');

    Route::post('/profile/change-password', 'Frontend\HomeController@postUserChangePass');
#End region profile

// detail product
    Route::get('/shop/orders/detail/{id}','Frontend\HomeController@getShopDetailOrders');

# Shop
    Route::get('/channel/shop', 'Frontend\HomeController@checkActiveShop')
        ->name('shop.channel');

    Route::get('/shop/order/list', 'Frontend\HomeController@getListOrder')
        ->name('customer.shop.getListOrder');

    Route::get('/shop/order/{id}', 'Frontend\HomeController@getDetailOrder')
        ->name('customer.shop.getDetailOrder');

    Route::post('/shop/order/change-status', 'Frontend\HomeController@postChangeOrder')
        ->name('customer.shop.postChangeStatus');

    Route::get('/shop/products/list', 'Frontend\HomeController@getListProductShop');

    Route::get('/shop/products/detail/{id}', 'Frontend\HomeController@getDetailProductShop');

    Route::post('/shop/products/edit', 'Frontend\HomeController@postEditProductShop');

    Route::get('/shop/products/create', 'Frontend\HomeController@getCreateProductShop');

    Route::post('/shop/products/create', 'Frontend\HomeController@postCreateProductShop');

    Route::post('/shop/product/delete', 'Admin\AdminController@deleteProduct')
        ->name('product.delete');

    Route::post('/shop/product/delete-all', 'Admin\AdminController@deleteAllProduct')
        ->name('product.deleteAll');

    Route::get('/shop/profile', 'Frontend\HomeController@getProfileShop');

    Route::post('/shop/profile', 'Frontend\HomeController@postProfileShop');

    Route::get('/shop/article/list', 'Frontend\HomeController@getListArticle')
        ->name('customer.shop.getListArticle');

    Route::post('/shop/article/create', 'Frontend\HomeController@postCreateArticle');

    Route::get('/shop/revenue', 'Frontend\HomeController@getRevenueShop');
# End shop
});



# Test send mail
// Route::get('/send', 'Frontend\HomeController@sendMail');
