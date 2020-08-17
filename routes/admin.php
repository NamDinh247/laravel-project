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
Route::get('/login', 'Admin\AdminController@login');

Route::get('/admin/home', 'Admin\AdminController@home');

Route::get('/admin/account', 'Admin\AdminController@accountManagement');

Route::get('/admin/account/new', 'Admin\AdminController@newAccount');

Route::get('/admin/account/detail', 'Admin\AdminController@detailAccount');

// category
Route::get('/admin/category', 'Admin\AdminController@listCategory');

Route::get('/admin/category/new', 'Admin\AdminController@newCategory');

Route::get('/admin/category/detail', 'Admin\AdminController@detailCategory');

// product
Route::get('/admin/product', 'Admin\AdminController@listProduct');

Route::get('/admin/product/new', 'Admin\AdminController@newProduct');

Route::get('/admin/product/detail', 'Admin\AdminController@detailProduct');

// orders
Route::get('/admin/orders', 'Admin\AdminController@listOrders');

Route::get('/admin/orders/new', 'Admin\AdminController@newOrders');

Route::get('/admin/orders/detail', 'Admin\AdminController@detailOrders');

// posts
Route::get('/admin/posts', 'Admin\AdminController@listPosts');

Route::get('/admin/posts/new', 'Admin\AdminController@newPosts');

Route::get('/admin/posts/detail', 'Admin\AdminController@detailPosts');
