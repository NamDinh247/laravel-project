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
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Mockery\Exception;

class AdminController extends Controller
{
    //
    public function home()
    {
        return view('admin.dashboard');
    }

    public function login()
    {
        return view('admin.login_admin');
    }

    public function postLogin(Request $request)
    {
        $login1 = [
            'email' => $request->username,
            'password' => $request->password
        ];
        $login2 = [
            'phone' => $request->username,
            'password' => $request->password
        ];
        if (Auth::attempt($login1, true) || Auth::attempt($login2, true)) {
            $user = Auth::user();

            if ($user->status == 1) {
                // login success
                return redirect('/admin/home');
            } else {
                // login fail
                Auth::logout();
                return redirect()->back()->with(['error_message' => 'Tài khoản không hoạt động']);
            }
        } else {
            $userByKey = User::where('email', $request->username)
                ->orWhere('phone', $request->username)
                ->where('status', [1, 2])
                ->first();
            if ($userByKey && $userByKey->id) {
                // wrong pass
                return redirect()->back()->with(['error_message' => 'Sai mật khẩu']);
            }
            return redirect()->back()->with(['error_message' => 'Đăng nhập thất bại']);
        }
    }

    public function getAdminLogout()
    {
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
        $data = array();
        $data['keyword'] = '';
        $categories = Category::query();
        if ($request->has('keyword') && strlen($request->get('keyword')) > 0) {
            $data['keyword'] = $request->get('keyword');
            $categories = $categories->where('name', 'like', '%' . $request->get('keyword') . '%')
                ->orWhere('note', 'like', '%' . $request->get('keyword') . '%');
        }

        $data['categories'] = $categories->where('status', '=', 1)
            ->orderby('created_at', 'desc')
            ->paginate(20)
            ->appends($request->only('keyword'));
        return view('admin.category.listCategory', compact('data'));
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
    public function accountManagement(Request $request)
    {
        $data = array();
        $data['keyword'] = '';
        $data['user_status'] = 0;
        $lstUserAdmin = User::query();
        if ($request->has('keyword') && strlen($request->get('keyword')) > 0) {
            $data['keyword'] = $request->get('keyword');
            $lstUserAdmin = $lstUserAdmin->where('phone', 'like', '%' . $request->get('keyword') . '%');
        }
        if ($request->has('user_status') && $request->get('user_status') != 0) {
            $data['user_status'] = $request->get('user_status');
            $lstUserAdmin = $lstUserAdmin->where('status', '=', $request->get('user_status'));
        }
        if ($request->has('start') && strlen($request->get('start')) > 0 && $request->has('end') && strlen($request->get('end')) > 0) {
            $data['start'] = $request->get('start');
            $data['end'] = $request->get('end');
            $from = date($request->get('start') . ' 00:00:00');
            $to = date($request->get('end') . ' 23:59:00');
            $lstUserAdmin = $lstUserAdmin->whereBetween('created_at', [$from, $to]);
        }
        $lstUserAdmin = $lstUserAdmin->whereIn('role', [1,2])
            ->where('status', '!=', -1)
            ->orderby('created_at', 'desc')
            ->paginate(15)
            ->appends($request->only('keyword'))
            ->appends($request->only('start'))
            ->appends($request->only('end'))
            ->appends($request->only('user_status'));

        return view('admin.account.account', compact('lstUserAdmin', 'data'));
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
            return redirect()->back()->with(['error_message' => 'Cập nhật tài khoản không thành công']);
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
            return redirect('/admin/account')->with(['error_message' => 'Tạo mới tài không thành công']);
        }
    }

    // list account user
    public function listAccountUser(Request $request)
    {
        $data = array();
        $data['keyword'] = '';
        $data['user_status'] = 0;
        $lstUser = User::query();
        if ($request->has('keyword') && strlen($request->get('keyword')) > 0) {
            $data['keyword'] = $request->get('keyword');
            $lstUser = $lstUser->where('phone', 'like', '%' . $request->get('keyword') . '%');
        }
        if ($request->has('user_status') && $request->get('user_status') != 0) {
            $data['user_status'] = $request->get('user_status');
            $lstUser = $lstUser->where('status', '=', $request->get('user_status'));
        }
        if ($request->has('start') && strlen($request->get('start')) > 0 && $request->has('end') && strlen($request->get('end')) > 0) {
            $data['start'] = $request->get('start');
            $data['end'] = $request->get('end');
            $from = date($request->get('start') . ' 00:00:00');
            $to = date($request->get('end') . ' 23:59:00');
            $lstUser = $lstUser->whereBetween('created_at', [$from, $to]);
        }
        $lstUser = $lstUser->whereIn('role', [3, 4])
            ->where('status', '!=', -1)
            ->orderby('created_at', 'desc')
            ->paginate(15)
            ->appends($request->only('keyword'))
            ->appends($request->only('start'))
            ->appends($request->only('end'))
            ->appends($request->only('user_status'));

        return view('admin.account.listUser', compact('lstUser', 'data'));
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
    public function listAccountShop(Request $request)
    {
        $data = array();
        $data['keyword'] = '';
        $data['user_status'] = 0;
        $lstShop = Shop::query();
        if ($request->has('keyword') && strlen($request->get('keyword')) > 0) {
            $data['keyword'] = $request->get('keyword');
            $lstShop = $lstShop->where('name', 'like', '%' . $request->get('keyword') . '%')
                ->orWhere('email', 'like', '%' . $request->get('keyword') . '%')
                ->orWhere('phone', 'like', '%' . $request->get('keyword') . '%');
        }
        if ($request->has('user_status') && $request->get('user_status') != 0) {
            $data['user_status'] = $request->get('user_status');
            $lstShop = $lstShop->where('status', '=', $request->get('user_status'));
        }
        if ($request->has('start') && strlen($request->get('start')) > 0 && $request->has('end') && strlen($request->get('end')) > 0) {
            $data['start'] = $request->get('start');
            $data['end'] = $request->get('end');
            $from = date($request->get('start') . ' 00:00:00');
            $to = date($request->get('end') . ' 23:59:00');
            $lstShop = $lstShop->whereBetween('created_at', [$from, $to]);
        }
        $lstShop = $lstShop->where('status', '!=', -1)
            ->orderby('created_at', 'desc')
            ->paginate(15)
            ->appends($request->only('keyword'))
            ->appends($request->only('start'))
            ->appends($request->only('end'))
            ->appends($request->only('user_status'));

        return view('admin.account.listShop', compact('lstShop', 'data'));
    }

    public function getChangeStatusShop(Request $request)
    {
        try {
            $shop = Shop::where('id', $request->id)->where('status', '!=', -1)->first();
            if ($shop == null) {
                return abort(404);
            }
            $user = User::where('id', $shop->account_id)->where('status', '!=', -1)->first();
            if ($user == null) {
                return abort(404);
            }
            $shop->status = $request->status;
            $user->role = 4;
            DB::transaction(function () use ($user, $shop) {
                $user->save();
                $shop->save();
            });
            return redirect('/admin/account/shop')
                ->with(['success_message' => 'Kích hoạt tài khoản thành công']);
        } catch (\Exception $ex) {
            return redirect('/admin/account/shop')->with(['error_message' => 'Kích hoạt tài khoản không thành công']);
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
            return abort(404);
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
            return redirect()->back()->with(['error_message' => 'Cập nhật tài khoản không thành công']);
        }
    }

    // product
    public function listProduct(Request $request)
    {
        $data = array();
        $data['keyword'] = '';
        $data['category_id'] = 0;
        $data['sale_off'] = '';
        $data['min_price'] = '';
        $data['max_price'] = '';
        $lstCate = Category::where('status', 1)->get();
        $products = Product::query();

        if ($request->has('keyword') && strlen($request->get('keyword')) > 0) {
            $data['keyword'] = $request->get('keyword');
            $products = $products->where('name', 'like', '%' . $request->get('keyword') . '%')
                ->orWhere('prd_code', 'like', '%' . $request->get('keyword') . '%');
        }
        if ($request->has('sale_off') && strlen($request->get('sale_off')) > 0) {
            $data['sale_off'] = $request->get('sale_off');
            $products = $products->where('sale_off', '=', $request->get('sale_off'));
        }

        if ($request->has('category_id') && $request->get('category_id') != 0) {
            $data['category_id'] = $request->get('category_id');
            $products = $products->where('category_id', '=', $request->get('category_id'));
        }

        if ($request->has('start') && strlen($request->get('start')) > 0 && $request->has('end') && strlen($request->get('end')) > 0) {
            $data['start'] = $request->get('start');
            $data['end'] = $request->get('end');
            $from = date($request->get('start') . ' 00:00:00');
            $to = date($request->get('end') . ' 23:59:00');
            $products = $products->whereBetween('created_at', [$from, $to]);
        }
        if ($request->has('min_price') && strlen($request->get('min_price')) > 0 && $request->has('max_price') && strlen($request->get('max_price')) > 0) {
            $data['min_price'] = $request->get('min_price');
            $data['max_price'] = $request->get('max_price');
            $products = $products->whereBetween('price', [$request->get('min_price'), $request->get('max_price')]);
        }

        $data['products'] = $products->where('status', '=', 1)
            ->orderby('created_at', 'desc')
            ->paginate(20)
            ->appends($request->only('keyword'))
            ->appends($request->only('start'))
            ->appends($request->only('end'))
            ->appends($request->only('product_status'))
            ->appends($request->only('category_id'));
        return view('admin.products.listProduct', compact('data', 'lstCate'));
    }

    public function newProduct()
    {
        $listCate = Category::where('status', '=', 1)->get();
        $lstShop = Shop::where('status', '!=', -1)->get();
        return view('admin.products.newProduct', compact('listCate', 'lstShop'));
    }

    public function postNewProduct(Request $request)
    {
        try {
            $product = new Product();
            $thumbnails = $request->get('thumbnails');

            $product->name = $request->name;
            $product->price = $request->price;
            $product->category_id = $request->category_id;
            $product->shop_id = $request->shop_id;
            $product->sale_off = $request->sale_off;
            $product->description = $request->description;
            foreach ($thumbnails as $thumbnail) {
                $product->thumbnail .= $thumbnail . ',';
            }
            $product->save();
            $product->prd_code = $this->genProductCode($product->id);
            $product->save();

            return redirect('/admin/product')->with(['success_message' => 'Tạo mới sản phẩm thành công!']);
        } catch (Exception $ex) {
            return abort(404);
        }
    }

    public function genProductCode($id)
    {
        $dateCreate = Carbon::now();
        $numProduct = Product::whereMonth('created_at', Carbon::now()->month)
            ->whereYear('created_at', Carbon::now()->year)
            ->where('id', '<=', $id)->count();
        return 'SP' . $dateCreate->format('ymd') . $numProduct;
    }

    public function detailProduct($id)
    {
        $product = Product::where('id', $id)
            ->where('status', '=', 1)->first();
        $lstCate = Category::where('status', '=', 1)->get();
        $lstShop = Shop::where('status', '!=', -1)->get();
        return view('admin.products.detailProduct', compact('product', 'lstCate', 'lstShop'));
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

    #Delete Product
    public function deleteProduct(Request $request)
    {
        try {
            $product = Product::where('id', '=', $request->get('id'))
                ->where('status', '=', 1)
                ->first();
            $product->status = -1;
            $product->save();
            return true;
        } catch (Exception $ex) {
            return false;
        }
    }

    public function deleteAllProduct(Request $request)
    {
        try {
            $ids = $request->get('ids');
            foreach ($ids as $id) {
                $product = Product::where('id', '=', $id)->where('status', '=', 1)->first();
                $product->status = -1;
                $product->save();
            }
            return true;
        } catch (Exception $ex) {
            return false;
        }
    }

    // orders
    public function getListOrder(Request $request)
    {
        try {
            $data = array();
            $data['keyword'] = '';
            $data['od_status'] = 0;
            $lstOrderStats = Order_status::all();
            $data['lstOrderStats'] = $lstOrderStats;
            $lstOrder = Order::query();
            if ($request->has('od_status') && $request->get('od_status') != 0) {
                $data['od_status'] = $request->get('od_status');
                $lstOrder = $lstOrder->where('od_status', '=', $request->get('od_status'));
            }
            if ($request->has('keyword') && strlen($request->get('keyword')) > 0) {
                $data['keyword'] = $request->get('keyword');
                $lstOrder = $lstOrder->where('od_code', 'like', '%' . $request->get('keyword') . '%');
            }
            if ($request->has('start') && strlen($request->get('start')) > 0 && $request->has('end') && strlen($request->get('end')) > 0) {
                $data['start'] = $request->get('start');
                $data['end'] = $request->get('end');
                $from = date($request->get('start') . ' 00:00:00');
                $to = date($request->get('end') . ' 23:59:00');
                $lstOrder = $lstOrder->whereBetween('created_at', [$from, $to])->paginate(20)
                    ->appends($request->only('start'))
                    ->appends($request->only('end'));
                $totalOrderFinish = Order::whereBetween('created_at', [$from, $to])
                    ->where('od_status', 5)->count();
                $totalRevenueOrderFinish = Order::whereBetween('created_at', [$from, $to])
                    ->where('od_status', 5)->sum('od_total_price');
                $totalOrderCancel = Order::whereBetween('created_at', [$from, $to])
                    ->where('od_status', 6)->count();
                $totalOrderProcess = Order::whereBetween('created_at', [$from, $to])
                    ->whereIn('od_status', [1,2,3,4])->count();
                $dataOrder = array();
                $dataOrder['totalOrderFinish'] = $totalOrderFinish;
                $dataOrder['totalOrderCancel'] = $totalOrderCancel;
                $dataOrder['totalOrderProcess'] = $totalOrderProcess;
                $dataOrder['totalRevenueOrderFinish'] = $totalRevenueOrderFinish;
                $data['dataOrder'] = $dataOrder;
                $data['lstOrder'] = $lstOrder;
                return view('admin.orders.listOrders', compact('data'));
            }
            $data['lstOrder'] = $lstOrder->whereNotIn('od_status', [-1])
                ->orderby('id', 'desc')
                ->paginate(20)
                ->appends($request->only('keyword'))
                ->appends($request->only('od_status'));
            return view('admin.orders.listOrders', compact('data'));
        } catch (\Exception $ex) {
            return abort(404);
        }
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
                return abort(404);
            }

            $total_sale_off = 0;
            $order_detail = Order_detail::where('od_id', $order->id)->get();
            foreach ($order_detail as $item) {
                $total_sale_off += $item->od_quantity * $item->od_unit_price * ($item->prd_sale_off / 100);
            }
            return view('admin.orders.detailOrders',
                compact('order', 'order_status', 'order_detail', 'total_sale_off'));
        } catch (\Exception $ex) {
            return abort(404);
        }
    }

    public function postChangeOrder(Request $request)
    {
        try {
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
        } catch (\Exception $ex) {
            return redirect()->back()->with(['error_message' => 'Cập nhật đơn hàng không thành công']);
        }
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
        return view('admin.dashboard');
    }
    //

}
