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

    // category
    public function listCategory()
    {
        return view('admin.category.listCategory');
    }

    public function getListCategory(Request $request)
    {
        $categories = Category::where('status', '=', 1)
            ->orderby('id', 'desc')
            ->paginate(5);
        return view('admin.category.listCategory')->with('categories', $categories);

//        $date ['keyword'] = '';
//        $category_list = Category::query();
//        if ($request->has('keyword') && strlen($request->get('keyword')) > 0) {
//            $data['keyword'] = $request->get('keyword');
//            $category_list = $category_list->where('name', 'like', '%' . $request->get('keyword') . '%');
//        }
//        $data['list'] = $category_list->get();
//        return view('admin.category.listCategory')->with($data);
    }



    public function getDetailCategory($id)
    {
        $category = Category::where('id', '=', $id)
            ->where('status', '=', 1)
            ->first();
        return view('admin.category.detailCategory')->with('category', $category);
    }

    public function postDetailCategory(Request $request)
    {
        $id = $request->get('id');
        $category = Category::where('id', '=', $id)
            ->where('status', '=', 1)
            ->first();
        $category->name = $request->get('name');
        $category->note = $request->get('note');
        $category->save();

        return redirect('/admin/category');
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
        return redirect('/admin/category/listCategory');

    }

    public function deleteAllCategory(Request $request)
    {
        $ids = $request->get('ids');
        Category::whereIn('id', $ids)->delete();
        return $request->get('ids');
    }

    public function newCategory()
    {
        return view('admin.category.newCategory');
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


    // product

    public function listProduct()
    {
        return view('admin.products.listProduct');
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
