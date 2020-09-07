<?php

namespace App\Http\Controllers\Admin;

use App\Article;
use App\Category;
use App\Http\Controllers\Controller;
use App\Order;
use App\Order_detail;
use App\Order_status;
use App\Product;

use App\Shop;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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

    public function getAdminLogout() {
        Auth::logout();
        return redirect('/admin/login');
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
            ->paginate(20);
        return view('admin.category.listCategory', compact('categories'));

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
    // account
    // list account admin
    public function accountManagement()
    {
        $lstUserAdmin = User::whereIn('role', [2])
            ->where('status', '!=', -1)
            ->orderby('created_at', 'desc')
            ->paginate(15);
        return view('admin.account.account', compact('lstUserAdmin'));
    }

    // detail account admin
    public function detailAccount($id)
    {
        $user = User::where('id', $id)->where('status', '!=', -1)->first();
        if ($user == null) {
            return abort(404);
        }
        return view('admin.account.detailAccount', compact('user'));
    }

    public function postEditUser(Request $request)
    {
        try {
            $user = User::where('id', $request->id)->where('status', '!=', -1)->first();
            if ($user == null) {
                return abort(404);
            }
            $user->user_name = $request->user_name;
            $user->full_name = $request->full_name;
            $user->phone = $request->phone;
            $user->email = $request->email;
            $user->status = $request->status;
            $user->address = $request->address;
            $user->save();
            return redirect()->back()->with(['success_message' => 'Cập nhật tài khoản thành công']);
        } catch (\Exception $ex) {
            return redirect()->back()->with(['success_message' => 'Cập nhật tài khoản không thành công']);
        }
    }

    public function newAccount()
    {
        return view('admin.account.newUser');
    }

    public function newAccountUser()
    {
        return view('admin.account.newAccount');
    }

    public function postCreateUser(Request $request)
    {
        try {
            // no check unique phone + email
            $user = new User();
            $user->user_name = $request->user_name;
            $user->email = $request->email;
            $user->password = bcrypt($request->password);
            $user->full_name = $request->full_name;
            $user->phone = $request->phone;
            $user->role = $request->role;
            $user->status = 1;
            $user->save();
            if ($request->role == 2) {
                return redirect('/admin/account')->with(['success_message' => 'Tạo mới tài khoản thành công']);
            }
            return redirect('/admin/account/user')->with(['success_message' => 'Tạo mới tài khoản thành công']);
        } catch (\Exception $ex) {
            return redirect('/admin/account')->with(['success_message' => 'Tạo mới tài không thành công']);
        }
    }

    // list account user
    public function listAccountUser()
    {
        $lstUser = User::whereIn('role', [3,4])
            ->where('status', '!=', -1)
            ->orderby('created_at', 'desc')
            ->paginate(20);
        return view('admin.account.listUser', compact('lstUser'));
    }

    // new account user


    // detail account user
    public function detailAccountUser($id)
    {
        $user = User::where('id', $id)->where('status', '!=', -1)->first();
        if ($user == null) {
            return abort(404);
        }

        return view('admin.account.detailUser', compact('user'));
    }

    // list account shop
    public function listAccountShop()
    {
        $lstShop = Shop::whereNotIn('status', [-1])
            ->orderby('created_at', 'desc')
            ->paginate(20);
        return view('admin.account.listShop', compact('lstShop'));
    }

    public function getChangeStatusShop(Request $request)
    {
        $shop = Shop::where('id', $request->id)->where('status', '!=', -1)->first();
        if ($shop) {
            $user = User::where('id', $shop->account_id)->where('status', '!=', -1)->first();
            if ($user) {
                $shop->status = $request->status;
                $user->role = 4;
                $user->save();
                $shop->save();
                return redirect('/admin/account/shop');
            }
            return view('errors.404');
        } else {
            return view('errors.404');
        }
    }

    // new account shop
    public function newAccountShop()
    {
        return view('admin.account.newShop');
    }

    // detail account shop
    public function detailAccountShop($id)
    {
        $shop = Shop::where('id', $id)->where('status', '!=', -1)->first();
        if ($shop == null) {
            return  abort(404);
        }
        return view('admin.account.detailShop', compact('shop'));
    }

    public function postEditShop(Request $request)
    {
        try {
            $shop = Shop::where('id', $request->id)->where('status', '!=', -1)->first();
            if ($shop == null) {
                return abort(404);
            }
            $shop->name = $request->name;
            $shop->address = $request->address;
            $shop->phone = $request->phone;
            $shop->email = $request->email;
            $shop->save();
            return redirect()->back()->with(['success_message' => 'Cập nhật tài khoản thành công']);
        } catch (\Exception $ex) {
            return redirect()->back()->with(['success_message' => 'Cập nhật tài khoản không thành công']);
        }
    }

    // product
    public function listProduct(Request $request)
    {
        $products = Product::where('status', '=', 1)
            ->orderby('created_at', 'desc')
            ->paginate(20);
        $lstCate = Category::where('status', 1)->get();
        return view('admin.products.listProduct', compact('products', 'lstCate'));
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
    public function getListOrder()
    {
        $lstOrder = Order::whereNotIn('od_status', [-1])
            ->orderby('created_at', 'desc')
            ->paginate(15);
        return view('admin.orders.listOrders', compact('lstOrder'));
    }

    public function newOrders()
    {
        return view('admin.orders.newOrders');
    }

    public function getDetailOrder($id)
    {
        try {
            $order = Order::where('id', '=', $id)
                ->whereNotIn('od_status', [-1])
                ->first();
            $order_status = Order_status::all();
            if ($order == null) {
                return view('errors.404');
            }
            $order_detail = Order_detail::where('od_id', $order->id)->get();
            return view('admin.orders.detailOrders', compact('order', 'order_status', 'order_detail'));
        } catch (\Exception $ex) {
            return false;
        }
    }

    public function postChangeOrder(Request $request)
    {
        $od_id = $request->get('od_id');
        $order = Order::where('id', '=', $od_id)
            ->whereNotIn('od_status', [-1])
            ->first();
        if ($order == null) {
            return false;
        }
        $order->od_status = $request->get('order_status');
        $order->save();
        return redirect()->back()->with(['success_message' => 'Cập nhật đơn hàng thành công']);
    }

    // posts
    public function listPosts()
    {
        $lstArticle = Article::where('status', '!=', -1)
            ->orderby('created_at', 'desc')
            ->paginate(20);
        return view('admin.posts.listPosts', compact('lstArticle'));
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
    //

}
