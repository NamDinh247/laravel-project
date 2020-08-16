<?php

namespace App\Http\Controllers\Admin;
use App\Category;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    //
    public function home(){
        return view('admin.layout_admin_master');
    }
    public function login(){
        return view('admin.login_admin');
    }
    public function accountManagement(){
        return view('admin.account');
    }
    public function newAccount(){
        return view('admin.newAccount');
    }
    public function detailAccount(){
        return view('admin.detailAccount');
    }
}
