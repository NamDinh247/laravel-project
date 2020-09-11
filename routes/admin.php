<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Rutes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/admin/login', 'Admin\AdminController@login')
    ->name('admin.login');

Route::post('/admin/login', 'Admin\AdminController@postLogin');

Route::get('/admin/logout', 'Admin\AdminController@getAdminLogout');

// account admin
Route::group(['prefix' => 'admin', 'middleware' => 'auth.admin'], function() {
    Route::get('/home', 'Admin\AdminController@home');

    Route::get('/account', 'Admin\AdminController@accountManagement');

    Route::get('/account/new', 'Admin\AdminController@newAccount');

    Route::get('/account/detail/{id}', 'Admin\AdminController@detailAccount');

    Route::post('/account/edit', 'Admin\AdminController@postEditUser');

    Route::post('/account/create', 'Admin\AdminController@postCreateUser');

// account user
    Route::get('/account/user', 'Admin\AdminController@listAccountUser');

    Route::get('/account/user/new', 'Admin\AdminController@newAccountUser');

    Route::get('/account/user/detail/{id}', 'Admin\AdminController@detailAccountUser');

// account shop
    Route::get('/account/shop', 'Admin\AdminController@listAccountShop');

    Route::get('/account/shop/{id}/{status}', 'Admin\AdminController@getChangeStatusShop');

    Route::get('/account/shop/new', 'Admin\AdminController@newAccountShop');

    Route::get('/account/shops/detail/{id}', 'Admin\AdminController@detailAccountShop');

    Route::post('/account/shop/edit', 'Admin\AdminController@postEditShop');

// category
    Route::get('/category/new', 'Admin\AdminController@getNewCategory');

    Route::post('/category/new', 'Admin\AdminController@postNewCategory');

    Route::get('/category/detail/{id}', 'Admin\AdminController@getDetailCategory');

    Route::post('/category/', 'Admin\AdminController@postDetailCategory');

    Route::post('/category/delete', 'Admin\AdminController@deleteCategory')
        ->name('category.delete');

    Route::post('/category/delete-all', 'Admin\AdminController@deleteAllCategory')
        ->name('category.deleteAll');

    Route::get('/category', 'Admin\AdminController@getListCategory');

// product
    Route::get('/product', 'Admin\AdminController@listProduct');

    Route::get('/product/new', 'Admin\AdminController@newProduct');

    Route::post('/product/new', 'Admin\AdminController@postNewProduct');

    Route::get('/product/detail/{id}', 'Admin\AdminController@detailProduct');

    Route::post('/product/delete', 'Admin\AdminController@deleteProduct')
        ->name('product.delete');

    Route::post('/product/delete-all', 'Admin\AdminController@deleteAllProduct')
        ->name('product.deleteAll');

// orders
//Route::get('/admin/orders', 'Admin\AdminController@listOrders');
    Route::get('/orders/list', 'Admin\AdminController@getListOrder');

    Route::get('/orders/new', 'Admin\AdminController@newOrders');

    Route::get('/orders/detail/{id}', 'Admin\AdminController@getDetailOrder');

    Route::post('/orders/change-order/{id}', 'Admin\AdminController@postChangeOrder');

// posts
    Route::get('/posts', 'Admin\AdminController@listPosts');

    Route::get('/dashboard', 'Admin\AdminController@index');

    Route::get('/posts/new', 'Admin\AdminController@newPosts');

    Route::get('/posts/detail', 'Admin\AdminController@detailPosts');
});

