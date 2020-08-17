<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    //
    public function home()
    {
        return view('admin.layout_admin_master');
    }
    public function login(){
        return view('admin.login_admin');
    }
    public function accountManagement(){
        return view('admin.account.account');
    }
    public function newAccount(){
        return view('admin.account.newAccount');
    }
    public function detailAccount(){
        return view('admin.account.detailAccount');
    }

    // category
    public function listCategory(){
        return view('admin.category.listCategory');
    }
    public function newCategory(){
        return view('admin.category.newCategory');
    }
    public function detailCategory(){
        return view('admin.category.detailCategory');
    }

    // product
    public function listProduct(){
        return view('admin.products.listProduct');
    }
    public function newProduct(){
        return view('admin.products.newProduct');
    }
    public function detailProduct(){
        return view('admin.products.detailProduct');
    }

    // orders
    public function listOrders(){
        return view('admin.orders.listOrders');
    }
    public function newOrders(){
        return view('admin.orders.newOrders');
    }
    public function detailOrders(){
        return view('admin.orders.detailOrders');
    }

    // posts
    public function listPosts(){
        return view('admin.posts.listPosts');
    }
    public function newPosts(){
        return view('admin.posts.newPosts');
    }
    public function detailPosts(){
        return view('admin.posts.detailPosts');
    }

    public function index()
    {
        return view('admin.chartjs');
    }
}

