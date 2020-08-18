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

    public function login()
    {
        return view('admin.login_admin');
    }

    public function accountManagement()
    {
        return view('admin.account');
    }

    public function newAccount()
    {
        return view('admin.newAccount');
    }

    public function detailAccount()
    {
        return view('admin.detailAccount');
    }

    // category
    public function listCategory()
    {
        return view('admin.listCategory');
    }

    public function getNewCategory()
    {
        return view('admin.newCategory');
    }

    public function postNewCategory(Request $request) //lưu category
    {
        $category = new Category();
        $category->name = $request->get('name');
        $category->note = $request->get('note');
        $category->status = 1;
        $category->save();

        return redirect('/admin/category');
    }

    public function deleteCategory($id)
    {
        $category = Category::where('id', '=', $id)
            ->where('status', '=', 1)
            ->first();
        $category->status = -1;
        $category->save();

        return redirect('/admin/category');
    }

    public function detailCategory()
    {
        return view('admin.detailCategory');
    }

    public function postDetailCategory(Request $request)
    {
        $id = $request->get('id');
        $category = Category::where('id', '=', $id)
            ->wher('status', '=', 1)
            ->first();
        $name = $request->get('name');
        $note = $request->get('note');
        $category->name = $name;
        $category->note = $note;
        $category->save();

        return redirect('/admin/category');
    }

    // product
    public function listProduct()
    {
        return view('admin.listProduct');
    }

    public function newProduct()
    {
        return view('admin.newProduct');
    }

    public function detailProduct()
    {
        return view('admin.detailProduct');
    }

    // orders
    public function listOrders()
    {
        return view('admin.listOrders');
    }

    public function newOrders()
    {
        return view('admin.newOrders');
    }

    public function detailOrders()
    {
        return view('admin.detailOrders');
    }

    // posts
    public function listPosts()
    {
        return view('admin.listPosts');
    }

    public function newPosts()
    {
        return view('admin.newPosts');
    }

    public function detailPosts()
    {
        return view('admin.detailPosts');
    }

    public function index()
    {
        return view('admin.chartjs');
    }
}

