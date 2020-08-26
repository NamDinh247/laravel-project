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

    public function getNewCategory()//tạo mới
    {
        $categories = Category::where('status', '=', 1)
            ->orderby('id', 'desc')
            ->paginate(5);
        return view('admin.category.newCategory')->with('categories', $categories);
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
        #Hàm sai, ko delete trực tiếp, delete bằng cách update stats = -1;
        // $ids = $request->get('ids');
        // Category::whereIn('id', $ids)->delete();
        // return $request->get('ids');
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
    public function listProduct(Request $request)
    {
            $data = array();
            $data['category_id'] = 0;
            $data['keyword'] = '';
            $categories = Category::where('status', '=', 1)->get();
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
            $data['list'] = $product_list->where('status', '=', 1)
                ->orderby('id', 'desc')
                ->paginate(15);
            $data['categories'] = $categories;
            return view('admin.products.listProduct')->with($data);
        $products = Product::where('status', '=', 1)->orderby('id', 'desc')->paginate(10);
        return view('admin.products.listProduct')->with('products', $products);
    }

    public function newProduct()
    {
        $listCate = Category::where('status', '=', 1)->get();
        return view('admin.products.newProduct')->with('listCate', $listCate);
    }
    public function postAddProduct(Request $request)
    {
        $product = new Product();
        $name = $request->get('name');
        $price = $request->get('price');
        $description = $request->get('description');
        $thumbnails = $request->get('thumbnails');
        $cateId = $request->get('cateId');
        $product->category_id = $cateId;
        $product->name = $name;
        $product->price = $price;
        foreach ($thumbnails as $thumbnail) {
            $product->thumbnail .= $thumbnail . ',';
        }
        $product->description = $description;
        $product->size = 1;
        $product->color = 1;
        $product->dimension = 1;
        $product->status = 1;
        $product->save();

        // msg success
        return redirect('/admin/product/list');// chưa biết trả bề đâu
    }

    public function detailProduct($id)
    {
        $product = Product::where('id', '=', $id)
            ->where('status', '=', 1)
            ->first();
        $listCate = Category::where('status', '=', 1)->get();
        return view('admin.products.detailProduct', compact('listCate', 'product'));
    }

    public function getEditProduct($id)
    {
        $product = Product::where('id', '=', $id)
            ->where('status', '=', 1)
            ->first();
        $listCate = Category::where('status', '=', 1)->get();
        return view('admin.product.editProduct', compact('listCate', 'product'));
    }

    public function postEditProduct(Request $request)
    {
        $id = $request->get('id');
        $product = Product::where('id', '=', $id)
            ->where('status', '=', 1)
            ->first();
        $product->name = $request->get('name');
        $product->price = $request->get('price');
        $product->description = $request->get('description');
        $product->category_id = $request->get('cateId');
        $product->thumbnail = '';

        $thumbnails = $request->get('thumbnails');
        foreach ($thumbnails as $thumbnail) {
            $product->thumbnail .= $thumbnail . ',';
        }
        $product->save();

        // msg success
        return redirect('/admin/product/list');
    }

    public function getDeleteProduct($id)
    {
        $product = Product::where('id', '=', $id)
            ->where('status', '=', 1)
            ->first();
        $product->status = -1;
        $product->save();
        return redirect('/admin/product/list');
    }

    // orders
    public function listOrders(Request $request)
    {
            $data = array();
            $data['status'] = 0;
            $data['keyword'] = '';
//        $categories = Category::where('status', '=', 1)->get();
            $order_list = Order::query();
            if ($request->has('status') && $request->get('status') != 0) {
                $data['status'] = $request->get('status');
                $order_list = $order_list->where('od_status', '=', $request->get('status'));
            }
            if ($request->has('keyword') && strlen($request->get('keyword')) > 0) {
                $data['keyword'] = $request->get('keyword');
                $order_list = $order_list->where('od_code', 'like', '%' . $request->get('keyword') . '%')
                    ->orWhere('ship_name', 'like', '%' . $request->get('keyword') . '%')
                    ->orWhere('ship_phone', 'like', '%' . $request->get('keyword') . '%');
            }
            if ($request->has('start') && strlen($request->get('start')) > 0 && $request->has('end') && strlen($request->get('end')) > 0) {
                $data['start'] = $request->get('start');
                $data['end'] = $request->get('end');
                $from = date($request->get('start') . ' 00:00:00');
                $to = date($request->get('end') . ' 23:59:00');
                $order_list = $order_list->whereBetween('created_at', [$from, $to]);
            }
            $data['list'] = $order_list->whereNotIn('od_status', [-1])
                ->orderby('created_at', 'desc')
                ->paginate(10);
            return view('admin.orders.listOrders')->with($data);
    }

    public function newOrders()
    {
        return view('admin.orders.newOrders');
    }

    public function detailOrders($id)
    {
            $product = Product::where('id', '=', $id)
                ->where('status', '=', 1)
                ->first();
            $listCate = Category::where('status', '=', 1)->get();
            return view('admin.edit_product', compact('listCate', 'product'));

            $orders = Order::where('id', '=', $id)
                ->orderby('created_at', 'desc')
                ->paginate(10);
            return view('admin.orders.detailOrders', compact())->with('orders', $orders);
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
