<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Http\Controllers\Controller;
use App\Product;

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
        return view('admin.account.account');
    }

    public function newAccount()
    {
        return view('admin.account.newAccount');
    }

    public function detailAccount()
    {
        return view('admin.account.detailAccount');
    }

    // category
    public function listCategory()
    {
        return view('admin.category.listCategory');
    }

    public function newCategory()
    {
        return view('admin.category.newCategory');
    }

    public function getNewCategory()
    {
        return view('admin.category.newCategory');
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
        return view('admin.category.detailCategory');
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
    public function listProduct(Request $request)
    {
        $products = Product::where('status', '=', 1)->orderby('id', 'desc')->paginate(10);
        return view('admin.products.listProduct')->with('products', $products);
    }
    
    public function newProduct()
    {
        return view('admin.products.newProduct');
    }

    public function detailProduct()
    {
        return view('admin.products.detailProduct');
    }

    // orders
    public function listOrders()
    {
        return view('admin.orders.listOrders');
    }

    public function newOrders()
    {
        return view('admin.orders.newOrders');
    }

    public function detailOrders()
    {
        return view('admin.orders.detailOrders');
    }

    // posts
    public function listPosts()
    {
        return view('admin.posts.listPosts');
    }

    public function newPosts()
    {
        return view('admin.posts.newPosts');
    }

    public function detailPosts()
    {
        return view('admin.posts.detailPosts');
    }

    public function index()
    {
        return view('admin.chartjs');
    }
}

