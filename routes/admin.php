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
