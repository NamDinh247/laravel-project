<?php

namespace App\Http\Controllers\Frontend;

use App\Article;
use App\Category;
use App\Http\Controllers\Controller;
use App\Http\Requests\SaveLogin;
use App\Http\Requests\SaveRegister;
use App\Http\Requests\SaveShopRegister;
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
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{
    public function getHomePage()
    {
        $lst_article = Article::where('status', '!=', -1)
            ->orderby('created_at', 'desc')
            ->get();
        $lst_shops = Shop::where('status', 1)
            ->take(5)
            ->orderby('created_at', 'asc')
            ->get();
        return view('frontend.contentHome', compact('lst_article', 'lst_shops'));
    }

    # Region login, register
    public function postRegister(SaveRegister $request)
    {
        try {
            $email = strtolower($request->email);
            if (User::where('email', $email)->where('status', '!=', -1)->first() &&
                User::where('phone', $request->phone)->where('status', '!=', -1)->first()
            ) {
                // email + phone exist
                return 306;
            } elseif (User::where('email', $email)->where('status', '!=', -1)->first()) {
                // email exist
                return 301;
            } elseif (User::where('phone', $request->phone)->where('status', '!=', -1)->first()) {
                // phone exist
                return 302;
            } else {
                $request->validated();
                $user = new User();
                $user->email = $email;
                $user->password = bcrypt($request->password);
                $user->full_name = $request->full_name;
                $user->phone = $request->phone;
                $user->role = 3;
                $user->status = 1;
                $user->save();
                // register success
                $data = array(
                    'username'=> $user->full_name,
                    'email'=> $user->email,
                );
                Mail::send('mail.register', $data, function($message) use ($user) {
                    $message->to($user->email, $user->full_name)
                        ->subject('Đăng kí tài khoản thành công');
                    $message->from('noreply.greenshop@gmail.com', 'Support Green Shop');
                });

                return 200;
            }
        } catch (\Exception $ex) {
            return 500;
        }

    }

    public function getLogin()
    {
        if (Auth::check())
            return redirect()->route('homePage');
        else
            return view('frontend.login');
    }

    public function postLogin(Request $request)
    {
//        $request->validated();
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
                return 200;
            } elseif ($user->status == 2) {
                // user pending
                Auth::logout();
                return 201;
            } elseif ($user->status == 3) {
                // user lock
                Auth::logout();
                return 202;
            } else {
                // login fail
                Auth::logout();
                return 203;
            }
        } else {
            $userByKey = User::where('email', $request->username)
                ->orWhere('phone', $request->username)
                ->where('status', [1, 2])
                ->first();
            if ($userByKey && $userByKey->id) {
                // wrong pass
                return 207;
            }
            return 203;
        }
    }

    public function getLogout()
    {
        Auth::logout();
        Session::remove('shoppingCart');
        return redirect()->route('homePage');
    }

    public function postShopRegister(SaveShopRegister $request)
    {
        try {
            $email = strtolower($request->email);
            if (Shop::where('email', $email)->where('status', '!=', -1)->first() &&
                Shop::where('phone', $request->phone)->where('status', '!=', -1)->first()
            ) {
                // email + phone exist
                return 306;
            } elseif (Shop::where('email', $email)->where('status', '!=', -1)->first()) {
                // email exist
                return 301;
            } elseif (Shop::where('phone', $request->phone)->where('status', '!=', -1)->first()) {
                // phone exist
                return 302;
            } else {
                $request->validated();
                $shop = new Shop();
                $shop->account_id = Auth::user()->id;
                $shop->name = $request->name;
                $shop->email = $email;
                $shop->address = $request->address;
                $shop->phone = $request->phone;
                $shop->status = 2; // pending
                $shop->save();
                // register shop success
                $data = array(
                    'username'=> $shop->name,
                    'email'=> $shop->email,
                );
                Mail::send('mail.register_shop', $data, function($message) use ($shop) {
                    $message->to($shop->email, $shop->name)
                        ->subject('Đăng kí shop thành công');
                    $message->from('noreply.greenshop@gmail.com', 'Support Green Shop');
                });
                return 200;
            }
        } catch (\Exception $ex) {
            return 500;
        }
    }
    # End region login, register

    # Region user shop
    public function getListShop(Request $request)
    {
        $data = array();
        $data['keyword'] = '';
        $lstShop = Shop::query();
        if ($request->has('keyword') && strlen($request->get('keyword')) > 0) {
            $data['keyword'] = $request->keyword;
            $lstShop = $lstShop->where('name', 'like', '%' . $request->keyword . '%');
        }

        $data['lstShop'] = $lstShop->where('status', '=', 1)
            ->orderby('created_at', 'desc')
            ->paginate(10)
            ->appends($request->only('keyword'));
        return view('frontend.shop.list', compact('data'));
    }

    public function getDetailShop($id)
    {
        $shop = Shop::where('id', $id)->where('status', 1)->first();
        if ($shop == null) {
            return abort(404);
        }
        $lstProduct = Product::where('shop_id', $shop->id)
            ->where('status', 1)
            ->orderby('created_at', 'desc')
            ->get();
        $lstArticle = Article::where('shop_id', $shop->id)
            ->where('status', 1)
            ->orderby('created_at', 'desc')
            ->get();
        return view('frontend.shop.detail',
            compact('shop', 'lstProduct', 'lstArticle'));
    }

    #End region user shop

    # User product
    public function getListProduct()
    {
        $products = Product::where('status', '=', 1)
            ->orderby('created_at', 'desc')
            ->get();
        $prd_today = Product::where('category_id', '=', 4)
            ->get();
//        $prd_today = Product::where('created_at', '<=', Carbon::now())
//            ->where('created_at', '>=', Carbon::now()->subDay(7))
//            ->get();
        $categories = Category::where('status', '=', 1)->get();
        // no filter
        return view('frontend.product.list')
            ->with('categories', $categories)
            ->with('products', $products)
            ->with('prd_today', $prd_today);
    }

    public function getListProductByCate($id)
    {
        try {
            $data = array();
            $data['keyword'] = '';
            $data['min_price'] = '';
            $data['max_price'] = '';
            $data['lst_product'] = Product::where('category_id', $id)
                ->where('status', '!=', -1)
                ->orderby('created_at', 'desc')
                ->paginate(15);
            return view('frontend.product.list_by_cate', compact('data'));
        } catch (\Exception $ex) {
            return abort(404);
        }
    }

    public function getListProductResearch(Request $request)
    {
        try {
            $data = array();
            $data['keyword'] = '';
            $data['min_price'] = '';
            $data['max_price'] = '';
            $lst_product = Product::query();
            if ($request->has('keyword') && strlen($request->get('keyword')) > 0) {
                $data['keyword'] = $request->keyword;
                $lst_product = $lst_product->where('name', 'like', '%' . $request->keyword . '%');
            }

            if ($request->has('min_price') && strlen($request->get('min_price')) > 0
                && $request->has('max_price') && strlen($request->get('max_price')) > 0) {
                $data['min_price'] = $request->min_price;
                $data['max_price'] = $request->max_price;
                $lst_product = $lst_product->where('price', '<=', $request->max_price)
                    ->where('price', '>=', $request->min_price);
            }

            $data['lst_product'] = $lst_product->whereNotIn('status', [-1])
                ->orderby('created_at', 'desc')
                ->paginate(15)
                ->appends($request->only('keyword'))
                ->appends($request->only('min_price'))
                ->appends($request->only('max_price'));
            return view('frontend.product.list_by_cate',
                compact('data'));
        } catch (\Exception $ex) {
            return view('errors.404');
        }
    }

    public function getDetailProduct($id)
    {
        try {
            $product = Product::where('id', '=', $id)
                ->where('status', '=', 1)
                ->first();
            if ($product == null) {
                return view('errors.404');
            }
            $list_product = Product::where('category_id', 2)->get();
            return view('frontend.product.detail',
                compact('product', 'list_product'));
        } catch (\Exception $ex) {
            return false;
        }
    }
    #End user product

    # Shopping cart
    public function getShoppingCart()
    {
        try {
            $shoppingCart = Session::get('shoppingCart');
            $total_quantity = 0;
            $total_price = 0;
            $total_payment = 0;
            $shop_id = null;
            if (isset($shoppingCart) && count($shoppingCart) > 0) {
                foreach ($shoppingCart as $item) {
                    $total_quantity += $item['quantity'];
                    $total_price += $item['quantity'] * $item['productPrice'];
                    $total_payment += $item['quantity'] * $item['productPrice'] - $item['productPrice'] * ($item['productSaleOff'] / 100);
                    $shop_id = $item['shop_id'];
                }
            }
            $list_product = Product::where('category_id', 2)
                ->orderby('created_at', 'desc')
                ->get();
            return view('frontend.shopping_cart',
                compact('shoppingCart', 'total_quantity', 'total_price', 'total_payment', 'shop_id', 'list_product'));
        } catch (\Exception $ex) {
            return abort(404);
        }
    }

    public function getAddShoppingCart(Request $request)
    {
        try {
            $productId = $request->get('productId');
            $quantity = $request->get('quantity');
            // kiểm tra sản phẩm theo id truyền lên.
            $product = Product::where('id', $productId)
                ->where('status', '=', 1)
                ->first();
            if ($product == null) {
                // nếu không tồn tại sản phẩm đưa về trang lỗi ko tìm thấy.
                return abort(404);
            }

            // lấy thông tin giỏ hàng từ trong session.
            $shoppingCart = Session::get('shoppingCart');
            // nếu session ko có thông tin giỏ hàng
            if ($shoppingCart == null) {
                // thì tạo mới giỏ hàng là một mảng các key và value
                $shoppingCart = array(); // key và value
            }
            // kiểm xem sản phẩm có trong giỏ hàng hay không.
            $cartItem = null;
            if (array_key_exists($product->id, $shoppingCart)) {
                $cartItem = $shoppingCart[$product->id];
            }
            if ($cartItem == null) {
                // nếu không, tạo mới một cart item.
                $cartItem = array(
                    'productId' => $product->id,
                    'productName' => $product->name,
                    'productPrice' => $product->price,
                    'quantity' => $quantity,
                    'productSaleOff' => $product->sale_off,
                    'prd_detail' => $product,
                    'shop_id' => $product->shop_id,
                );
            } else {
                // nếu có, cộng số lượng sản phẩm thêm 1.
                $cartItem['quantity'] += $quantity;
            }
            // đưa sản phẩm vào giỏ hàng với key chính là id của sản phẩm.
            $shoppingCart[$product->id] = $cartItem;
            if ($cartItem['quantity'] <= 0) {
                unset($shoppingCart[$product->id]);
            }
            Session::put('shoppingCart', $shoppingCart);
            return redirect('/shopping_cart/show');
        } catch (\Exception $ex) {
            return abort(404);
        }
    }

    public function getRemoveShoppingCart(Request $request)
    {
        $productId = $request->get('productId');
        // lấy thông tin giỏ hàng từ trong session.
        $shoppingCart = Session::get('shoppingCart');
        // nếu session ko có thông tin giỏ hàng
        if ($shoppingCart != null) {
            if (array_key_exists($productId, $shoppingCart)) {
                unset($shoppingCart[$productId]);
            }
        }
        Session::put('shoppingCart', $shoppingCart);
        return redirect('/shopping_cart/show');
    }

    public function submit(Request $request)
    {
        try {
            if (!Auth::check()) {
                return 301;
            }
            $user = Auth::user();
            // lấy thông tin giỏ hàng từ trong session.
            $shoppingCart = Session::get('shoppingCart');
            // nếu session ko có thông tin giỏ hàng
            if ($shoppingCart == null) {
                // thì tạo mới giỏ hàng là một mảng các key và value
                $shoppingCart = array(); // key và value
            }
            $order = new Order();
            $order->account_id = $user->id;
            $order->shop_id = $request->shop_id;
            $order->od_total_price = $request->od_total_price;
            $order->ship_name = $request->shipName;
            $order->ship_address = $request->shipAddress;
            $order->ship_phone = $request->shipPhone;
            $order->ship_email = $request->shipEmail;
            $order->ship_fee = $request->ship_fee;
            $order->od_note = $request->note;
            $order->od_status = 1;

            $orderDetails = array();
            foreach ($shoppingCart as $key => $cartItem) {
                $productId = $cartItem['productId'];
                // check status
                $product = Product::find($productId);
                if ($product == null) {
                    continue;
                }
                $quantity = $cartItem['quantity'];
                $orderDetail = new Order_detail();
                $orderDetail->product_id = $productId;
                $orderDetail->od_quantity = $quantity;
                $orderDetail->od_unit_price = $product->price;
                $orderDetail->prd_sale_off = $product->sale_off;
                array_push($orderDetails, $orderDetail);
            }
            DB::transaction(function () use ($order, $orderDetails) {
                $order->save(); // có id của order.
                $order->od_code = $this->genOrderCode($order->id);
                $order->save();
                foreach ($orderDetails as $orderDetail) {
                    $orderDetail->od_id = $order->id;
                    $orderDetail->save();
                }
            });
            $data = array(
                'username'=> $order->ship_name,
                'email'=> $order->ship_email,
                'od_code' => $order->od_code,
            );
            Mail::send('mail.order', $data, function($message) use ($order) {
                $message->to($order->ship_email, $order->ship_name)
                    ->subject('Đặt hàng thành công thành công');
                $message->from('noreply.greenshop@gmail.com', 'Support Green Shop');
            });
            Session::remove('shoppingCart');
            return 200;
        } catch (\Exception $ex) {
            return 500;
        }
    }

    public function genOrderCode($id)
    {
        $dateCreate = Carbon::now();
        $numOrder = Order::whereMonth('created_at', Carbon::now()->month)
            ->whereYear('created_at', Carbon::now()->year)
            ->where('id', '<=', $id)->count();
        return 'DH' . $dateCreate->format('ymd') . $numOrder;
    }

    public function genProductCode($id)
    {
        $dateCreate = Carbon::now();
        $numProduct = Product::whereMonth('created_at', Carbon::now()->month)
            ->whereYear('created_at', Carbon::now()->year)
            ->where('id', '<=', $id)->count();
        return 'SP' . $dateCreate->format('ymd') . $numProduct;
    }
    # End shopping cart

    # Region profile
    public function getListOrderUser()
    {
        $user = Auth::user();
        $lstOrder = Order::where('account_id', $user->id)->paginate(10);
        return view('frontend.shop.order', compact('lstOrder'));
    }

    public function getDetailOrderUser(Request $request)
    {
        try {
            $user = Auth::user();
            $order = Order::where('id', $request->id)
                ->where('account_id', $user->id)
                ->whereNotIn('od_status', [-1])
                ->first();
            if ($order == null) {
                return abort(404);
            }

            $total_sale_off = 0;
            $order_detail = Order_detail::where('od_id', $order->id)->get();
            foreach ($order_detail as $item) {
                $total_sale_off += $item->od_quantity * $item->od_unit_price * ($item->prd_sale_off / 100);
            }

            return view('frontend.shop.order_detail', compact('order', 'order_detail', 'total_sale_off'));
        } catch (\Exception $ex) {
            return abort(404);
        }
    }

    public function getProfileInfo()
    {
        $user = Auth::user();
        return view('frontend.shop.user', compact('user'));
    }

    public function postProfileInfo(Request $request)
    {
        try {
            $user = Auth::user();
            $user->full_name = $request->full_name;
            $user->phone = $request->phone;
            $user->email = $request->email;
            $user->address = $request->address;
            $user->save();
            return redirect()->back()->with(['success_message' => 'Cập nhật hồ sơ thành công']);
        } catch (\Exception $ex) {
            return redirect()->back()->with(['error_message' => 'Cập nhật hồ sơ không thành công']);
        }
    }

    public function getUserChangePass()
    {
        return view('frontend.shop.password');
    }

    public function postUserChangePass(Request $request)
    {
        try {
            $user = Auth::user();
            $old_password = Hash::check($request->oldPass, $user->password);
            if ($old_password) {
                if ($request->new_password == $request->confirm_password) {
                    $user->password = bcrypt($request->new_password);
                    $user->save();
                    return redirect()->back()->with(['success_message' => 'Đổi mật khẩu thành công']);
                } else {
                    return redirect()->back()->with(['error_message' => 'Xác nhận mật khẩu không khớp']);
                }
            } else {
                return redirect()->back()->with(['error_message' => 'Sai mật khẩu']);
            }
        } catch (\Exception $ex) {
            return redirect()->back()->with(['error_message' => 'Có lỗi xảy ra vui lòng thử lại']);
        }
    }
    # End region profile

    # Shop
    public function checkActiveShop()
    {
        try {
            $user = Auth::user();
            $shop = Shop::where('account_id', $user->id)->first();
            if ($shop->status == 1) {
                // shop active
                return 200;
            } elseif ($shop->status == 2) {
                // shop pending
                return 201;
            } elseif ($shop->status == 3) {
                // shop lock
                return 202;
            } elseif ($shop->status == -1) {
                // shop delete
                return 203;
            } else {
                // fail
                return 500;
            }
        } catch (\Exception $ex) {
            return 500;
        }
    }

    public function getListOrder(Request $request)
    {
        try {
            $user = Auth::user();
            $shop = Shop::where('account_id', $user->id)->where('status', '=', 1)->first();
            if ($shop == null) {
                return view('errors.404');
            }

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
                $lstOrder = $lstOrder->where('shop_id', $shop->id)
                    ->whereBetween('created_at', [$from, $to])
                    ->paginate(20)
                    ->appends($request->only('start'))
                    ->appends($request->only('end'));
                $totalOrderFinish = Order::where('shop_id', $shop->id)
                    ->whereBetween('created_at', [$from, $to])
                    ->where('od_status', 5)->count();
                $totalRevenueOrderFinish = Order::where('shop_id', $shop->id)
                    ->whereBetween('created_at', [$from, $to])
                    ->where('od_status', 5)->sum('od_total_price');
                $totalOrderCancel = Order::where('shop_id', $shop->id)
                    ->whereBetween('created_at', [$from, $to])
                    ->where('od_status', 6)->count();
                $totalOrderProcess = Order::where('shop_id', $shop->id)
                    ->whereBetween('created_at', [$from, $to])
                    ->whereIn('od_status', [1,2,3,4])->count();
                $dataOrder = array();
                $dataOrder['totalOrderFinish'] = $totalOrderFinish;
                $dataOrder['totalOrderCancel'] = $totalOrderCancel;
                $dataOrder['totalOrderProcess'] = $totalOrderProcess;
                $dataOrder['totalRevenueOrderFinish'] = $totalRevenueOrderFinish;
                $data['dataOrder'] = $dataOrder;
                $data['lstOrder'] = $lstOrder;
                return view('frontend.shop.manager.list_order', compact('data'));
            }
            $data['lstOrder'] = $lstOrder->where('shop_id', $shop->id)
                ->where('od_status', '!=', -1)
                ->orderby('id', 'desc')
                ->paginate(10)
                ->appends($request->only('keyword'))
                ->appends($request->only('od_status'));
            return view('frontend.shop.manager.list_order', compact('data'));
        } catch (\Exception $ex) {
            return abort(404);
        }
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

            return view('frontend.shop.manager.order_detail',
                compact('order', 'order_detail', 'order_status', 'total_sale_off'));
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
                return view('errors.404');
            }
            $order->od_status = $request->get('order_status');
            $order->save();

            $data = array(
                'username'=> $order->ship_name,
                'order_code'=> $order->od_code,
                'order_status_name'=> $order->orderStatus->stt_name,
                'transaction' => 'as');
            Mail::send('mail.send', $data, function($message) use ($order) {
                $message->to($order->ship_email, $order->ship_name)
                    ->subject('Cập nhật trạng thái đơn hàng');
                $message->from('noreply.greenshop@gmail.com', 'Support Green Shop');
            });

            return redirect()->back()->with(['success_message' => 'Cập nhật đơn hàng thành công']);
        } catch (\Exception $ex) {
            return redirect()->back()->with(['error_message' => 'Cập nhật đơn hàng không thành công']);
        }
    }

    public function getListProductShop(Request $request)
    {
        try {
            $user = Auth::user();
            $shop = Shop::where('account_id', $user->id)
                ->where('status', '!=', -1)
                ->first();
            $lstCate = Category::where('status', 1)->get();

            $data = array();
            $data['keyword'] = '';
            $data['category_id'] = 0;
            $data['sale_off'] = '';
            $data['min_price'] = '';
            $data['max_price'] = '';
            $lstProduct = Product::query();
            if ($request->has('category_id') && $request->get('category_id') != 0) {
                $data['category_id'] = $request->get('category_id');
                $lstProduct = $lstProduct->where('category_id', '=', $request->get('category_id'));
            }
            if ($request->has('keyword') && strlen($request->get('keyword')) > 0) {
                $data['keyword'] = $request->get('keyword');
                $lstProduct = $lstProduct->where('name', 'like', '%' . $request->get('keyword') . '%');
            }
            if ($request->has('sale_off') && strlen($request->get('sale_off')) > 0) {
                $data['sale_off'] = $request->get('sale_off');
                $lstProduct = $lstProduct->where('sale_off', '=', $request->get('sale_off'));
            }
            if ($request->has('start') && strlen($request->get('start')) > 0 && $request->has('end') && strlen($request->get('end')) > 0) {
                $data['start'] = $request->get('start');
                $data['end'] = $request->get('end');
                $from = date($request->get('start') . ' 00:00:00');
                $to = date($request->get('end') . ' 23:59:00');
                $lstProduct = $lstProduct->whereBetween('created_at', [$from, $to]);
            }

            if ($request->has('min_price') && strlen($request->get('min_price')) > 0 && $request->has('max_price') && strlen($request->get('max_price')) > 0) {
                $data['min_price'] = $request->get('min_price');
                $data['max_price'] = $request->get('max_price');
                $lstProduct = $lstProduct->whereBetween('price', [$request->get('min_price'), $request->get('max_price')]);
            }
            $data['lstProduct'] = $lstProduct->where('shop_id', $shop->id)
                ->orderby('created_at', 'desc')
                ->where('status', '!=', -1)
                ->paginate(10)
                ->appends($request->only('keyword'))
                ->appends($request->only('sale_off'))
                ->appends($request->only('category_id'))
                ->appends($request->only('end'))
                ->appends($request->only('start'));

//            $lstProduct = Product::where('shop_id', $shop->id)
//                ->where('status', '!=', -1)
//                ->orderby('created_at', 'desc')
//                ->paginate(10);

            return view('frontend.shop.manager.list_product', compact('data', 'lstCate'));
        } catch (\Exception $ex) {
            return abort(404);
        }
    }

    public function getDetailProductShop($id)
    {
        $product = Product::where('id', $id)->where('status', '!=', -1)->first();
        if ($product == null) {
            return abort(404);
        }
        $lstCate = Category::where('status', 1)->get();
        return view('frontend.shop.manager.detail_product', compact('product', 'lstCate'));
    }

    public function postEditProductShop(Request $request)
    {
        try {
            $product = Product::where('id', $request->id)->where('status', 1)->first();
            $product->name = $request->name;
            $product->price = $request->price;
            $product->sale_off = $request->sale_off;
            $product->description = $request->description;
            $product->save();
            return redirect()->back()->with(['success_message' => 'Cập nhật sản phẩm thành công']);
        } catch (\Exception $ex) {
            return redirect()->back()->with(['error_message' => 'Cập nhật sản phẩm không thành công']);
        }
    }

    public function getCreateProductShop()
    {
        $lstCate = Category::where('status', 1)->get();
        return view('frontend.shop.manager.create_product', compact('lstCate'));
    }

    public function postCreateProductShop(Request $request)
    {
        try {
            $user = Auth::user();
            $shop = Shop::where('account_id', $user->id)
                ->where('status', '!=', -1)
                ->first();
            $product = new Product();
            $product->category_id = $request->category_id;
            $product->shop_id = $shop->id;
            $product->name = $request->name;
            $product->price = $request->price;
            // upload image
            $thumbnails = $request->get('thumbnails');
            foreach ($thumbnails as $thumbnail) {
                $product->thumbnail .= $thumbnail . ',';
            }
            $product->description = $request->description;
            $product->sale_off = $request->sale_off;
            $product->save();
            $product->prd_code = $this->genProductCode($product->id);
            $product->save();
            return redirect('/shop/products/list')->with(['success_message' => 'Tạo mới sản phẩm thành công']);
        } catch (\Exception $ex) {
            return redirect('/shop/products/list')->with(['error_message' => 'Tạo mới sản phẩm không thành công']);
        }
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

    public function getProfileShop()
    {
        try {
            $user = Auth::user();
            $shop = Shop::where('account_id', $user->id)
                ->where('status', '!=', -1)
                ->first();
            if ($shop == null) {
                return abort(404);
            }
            return view('frontend.shop.manager.shop_profile', compact('shop'));
        } catch (\Exception $ex) {
            return abort(404);
        }
    }

    public function postProfileShop(Request $request)
    {
        try {
            $user = Auth::user();
            $shop = Shop::where('account_id', $user->id)
                ->where('status', '!=', -1)
                ->first();
            if ($shop == null) {
                return abort(404);
            }
            $shop->name = $request->name;
            $shop->phone = $request->phone;
            $shop->email = $request->email;
            $shop->address = $request->address;
            $shop->district = $request->district;
            $shop->city = $request->city;
            $shop->save();
            return redirect()->back()->with(['success_message' => 'Cập nhật hồ sơ thành công']);
        } catch (\Exception $ex) {
            return redirect()->back()->with(['error_message' => 'Cập nhật hồ sơ không thành công']);
        }
    }

    public function getListArticle()
    {
        try {
            $user = Auth::user();
            $shop = Shop::where('account_id', $user->id)
                ->where('status', '!=', -1)
                ->first();
            if ($shop == null) {
                return abort(404);
            }
            $lst_article = Article::where('shop_id', $shop->id)
                ->where('status', '!=', -1)
                ->orderby('created_at', 'desc')
                ->get();
            $lst_product = Product::where('shop_id', $shop->id)
                ->where('status', 1)
                ->orderby('created_at', 'desc')
                ->get();
            return view('frontend.shop.manager.list_article',
                compact('lst_article', 'shop', 'lst_product'));
        } catch (\Exception $ex) {
            return abort(404);
        }
    }

    public function postCreateArticle(Request $request)
    {
        try {
            $user = Auth::user();
            $shop = Shop::where('account_id', $user->id)
                ->where('status', '!=', -1)
                ->first();
            if ($shop == null) {
                return abort(404);
            }
            $article = new Article();
            $article->shop_id = $shop->id;
            $article->product_id = $request->product_id;
            $article->title = $request->title;
            $article->type = 1;
            $article->status = 1;
            $article->save();
            return redirect()->back()->with(['success_message' => 'Thêm bài viết thành công']);
        } catch (\Exception $ex) {
            return redirect()->back()->with(['error_message' => 'Thêm bài viết không thành công']);
        }
    }

    public function getRevenueShop()
    {
        return view('frontend.shop.manager.revenue');
    }
    # End shop
}
