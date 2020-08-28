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
Route::get('/login', 'Admin\AdminController@login');

Route::get('/admin/home', 'Admin\AdminController@home');

// account admin
Route::get('/admin/account', 'Admin\AdminController@accountManagement');

Route::get('/admin/account/new', 'Admin\AdminController@newAccount');

Route::get('/admin/account/detail', 'Admin\AdminController@detailAccount');

// account user
Route::get('/admin/account/user', 'Admin\AdminController@listAccountUser');

Route::get('/admin/account/user/new', 'Admin\AdminController@newAccountUser');

Route::get('/admin/account/user/detail', 'Admin\AdminController@detailAccountUser');

// account shop
Route::get('/admin/account/shop', 'Admin\AdminController@listAccountShop');

Route::get('/admin/account/shop/new', 'Admin\AdminController@newAccountShop');

Route::get('/admin/account/shop/detail', 'Admin\AdminController@detailAccountShop');

// category
Route::get('/admin/category/new', 'Admin\AdminController@getNewCategory');

Route::post('/admin/category/new', 'Admin\AdminController@postNewCategory');

Route::get('/admin/category/detail/{id}', 'Admin\AdminController@getDetailCategory');

Route::post('/admin/category/', 'Admin\AdminController@postDetailCategory');

Route::post('/admin/category/delete', 'Admin\AdminController@deleteCategory')->name('category.delete');

Route::post('/admin/category/delete-all', 'Admin\AdminController@deleteAllCategory')->name('category.deleteAll');

Route::get('/admin/category', 'Admin\AdminController@getListCategory');

// product
Route::get('/admin/product', 'Admin\AdminController@listProduct');

Route::get('/admin/product/new', 'Admin\AdminController@newProduct');

Route::post('/admin/product/new', 'Admin\AdminController@postNewProduct');

Route::get('/admin/product/detail', 'Admin\AdminController@detailProduct');

// orders
Route::get('/admin/orders', 'Admin\AdminController@listOrders');

Route::get('/admin/orders/new', 'Admin\AdminController@newOrders');

Route::get('/admin/orders/detail', 'Admin\AdminController@detailOrders');

// posts
Route::get('/admin/posts', 'Admin\AdminController@listPosts');

Route::get('/admin/dashboard', 'Admin\AdminController@index');

Route::get('/admin/posts/new', 'Admin\AdminController@newPosts');

Route::get('/admin/posts/detail', 'Admin\AdminController@detailPosts');
