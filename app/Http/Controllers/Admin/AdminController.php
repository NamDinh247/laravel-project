<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Http\Controllers\Controller;
use App\Product;

use Illuminate\Http\Request;
use Mockery\Exception;

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
            ->orderby('created_at', 'desc')
            ->paginate(5);
//        dd($categories);
        return view('admin.category.listCategory')->with('categories', $categories);

//        $date ['keyword'] = '';
//        $category_list = Category::query();
//        if ($request->has('keyword') && strlen($request->get('keyword')) > 0) {
//            $data['keyword'] = $request->get('keyword');
//            $category_list = $category_list->where('name', 'like', '%' . $request->get('keyword') . '%');
//        }
//        $data['listCate'] = $category_list->get();
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

    public function deleteCategory(Request $request)
    {
        try {
            $category = Category::where('id', '=', $request->get('id'))
                ->where('status', '=', 1)
                ->first();
            $category->status = -1;
            $category->save();
            return true;
        } catch (Exception $ex) {
            return false;
        }
    }

    public function deleteAllCategory(Request $request)
    {
        #Hàm sai, ko delete trực tiếp, delete bằng cách update stats = -1;
        try {
            $ids = $request->get('ids');
            foreach ($ids as $id) {
                $category = Category::where('id', '=', $id)->where('status', '=', 1)->first();
                $category->status = -1;
                $category->save();
            }
            return true;
        } catch (Exception $ex) {
            return false;
        }
    }

    public function accountManagement()
    {
        return view('admin.account.account');
    }


    public function detailAccount()
    {
        return view('admin.account.detailAccount');
    }


    // product
    public function listProduct(Request $request)
    {
        $products = Product::where('status', '=', 1)->orderby('id', 'desc')->paginate(10);
        return view('admin.products.listProduct')->with('products', $products);
    }

    public function newProduct()
    {
        $listCate = Category::where('status', '=', 1)->get();
        return view('admin.products.newProduct')->with('listCate', $listCate);
    }

    public function postNewProduct(Request $request)
    {
        $product = new Product();
        $id = $request->get('id');
        $name = $request->get('name');
        $price = $request->get('price');
        $category_id = $request->get('category_id');
        $shop_id = $request->get('shop_id');
        $sale_off = $request->get('sale_off');
        $thumbnails = $request->get('thumbnails');
        $description = $request->get('description');

        $product->id = $id;
        $product->name = $name;
        $product->price = $price;
        $product->category_id = $category_id;
        $product->shop_id = $shop_id;
        $product->sale_off = $sale_off;
        $product->description = $description;
        foreach ($thumbnails as $thumbnail) {
            $product->thumbnail .= $thumbnail . ',';
        }
        $product->save();


        return redirect('/admin/category/listProduct');
    }

    public function detailProduct()
    {
        return view('admin.products.detailProduct');
    }

    public function getListProduct(Request $request)
    {
        $data = array();
        $data['category_id'] = 0;
        $data['keyword'] = '';
        $categories = Category::all();
        $product_list = Product::query();
        if ($request->has('category_id') && $request->get('category_id') != 0) {
            $data['category_id'] = $request->get('category_id');
            $product_list = $product_list->where('category_id', '=', $request->get('category_id'));
        }
        if ($request->has('keyword') && strlen($request->get('keyword')) > 0) {
            $data['keyword'] = $request->get('keyword');
            $product_list = $product_list->where('name', 'like', '%' . $request->get('keyword') . '%');
        }
        if ($request->has('start') && strlen($request->get('start')) > 0 && $request->has('end') && strlen($request->get('end')) > 0) {
            $data['start'] = $request->get('start');
            $data['end'] = $request->get('end');
            $from = date($request->get('start') . ' 00:00:00');
            $to = date($request->get('end') . ' 23:59:00');
            $product_list = $product_list->whereBetween('created_at', [$from, $to]);
        }
        $data['list'] = $product_list->get();
        $data['categories'] = $categories;
        return view('admin.products.listProduct')
            ->with($data);
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
