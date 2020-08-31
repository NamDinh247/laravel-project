<?php

namespace App\Http\Controllers\Frontend;

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
use Illuminate\Support\Facades\Session;
use phpDocumentor\Reflection\Types\Array_;

class HomeController extends Controller
{
    public function getHomePage()
    {
        $lst_article = Article::where('status', '!=', -1)
            ->orderby('created_at', 'desc')
            ->get();
        return view('frontend.contentHome', compact('lst_article'));
    }

    # Region login, register
    public function postRegister(Request $request)
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
                $user = new User();
                $user->email = $email;
                $user->password = bcrypt($request->password);
                $user->full_name = $request->full_name;
                $user->phone = $request->phone;
                $user->role = 3;
                $user->status = 1;
                $user->save();
                // register success
                return 200;
            }
        } catch (\Exception $ex) {
            return 500;
        }
    }

    public function getLogin()
    {
        return view('frontend.sign.signIn');
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
                ->where('status', [1,2])
                ->first();
            if ($userByKey && $userByKey->id) {
                // wrong pass
                return 207;
            }
            return 204;
        }
    }

    public function getLogout()
    {
        Auth::logout();
        return redirect()->route('homePage');
    }

    public function postShopRegister(Request $request)
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
                $shop = new Shop();
                $shop->account_id = Auth::user()->id;
                $shop->name = $request->name;
                $shop->email = $email;
                $shop->address = $request->address;
                $shop->phone = $request->phone;
                $shop->status = 2; // pending
                $shop->save();
                // register shop success
                return 200;
            }
        } catch (\Exception $ex) {
            return 500;
        }
    }
    # End region login, register

    public function getListShop()
    {
//        $shops = Shop::where('status', '=', 1)
//            ->orderby('created_at', 'desc')
//            ->paginate(10);
//        return view('frontend.shop.list', compact('shops'));
        return view('frontend.shop.list');
    }

    # User product
    public function getListProduct()
    {
        $products = Product::where('status', '=', 1)
            ->orderby('created_at', 'desc')
            ->get();
        $prd_today = Product::where('category_id', '=', 1)
            ->get();
        $categories = Category::where('status', '=', 1)->get();
        // no filter
        return view('frontend.product.list')
            ->with('categories', $categories)
            ->with('products', $products)
            ->with('prd_today', $prd_today);
    }

    public function getListProductResearch(Request $request)
    {
        try {
            $data = array();
            $data['keyword'] = '';
            $lst_product = Product::query();
            if ($request->has('keyword') && strlen($request->get('keyword')) > 0) {
                $data['keyword'] = $request->keyword;
                $lst_product = $lst_product->where('name', 'like', '%' . $request->keyword . '%');
            }

            $data['lst_product'] = $lst_product->whereNotIn('status', [-1])
                ->orderby('created_at', 'desc')
                ->paginate(15);
            return view('frontend.product.list_by_cate', compact('data'));
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
            return view('frontend.product.detail', compact('product'));
        } catch (\Exception $ex) {
            return false;
        }
    }
    #End user product

    # Shopping cart
    public function getShoppingCart()
    {
        $shoppingCart = Session::get('shoppingCart');
        $total_quantity = 0;
        $total_price = 0;
        $total_payment = 0;
        $shop_id = null;
        if (isset($shoppingCart) && count($shoppingCart) > 0) {
            foreach ($shoppingCart as $item) {
                $total_quantity += $item['quantity'];
                $total_price += $item['quantity'] * $item['productPrice'];
                $total_payment += $item['quantity'] * $item['productPrice'] - $item['productPrice'] * ($item['productSaleOff']/100);
                $shop_id = $item['shop_id'];
            }
        }
        return view('frontend.shopping_cart',
            compact('shoppingCart', 'total_quantity', 'total_price', 'total_payment', 'shop_id'));
    }

    public function getAddShoppingCart(Request $request)
    {
        try {
            $productId = $request->get('productId');
            $quantity = $request->get('quantity');
            // kiểm tra sản phẩm theo id truyền lên.
            $product = Product::find($productId);
            if ($product == null) {
                // nếu không tồn tại sản phẩm đưa về trang lỗi ko tìm thấy.
                return false;
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
            if($cartItem['quantity'] <= 0){
                unset($shoppingCart[$product->id]);
            }
            Session::put('shoppingCart', $shoppingCart);
            return redirect('/shopping_cart/show');
        } catch (\Exception $ex) {
            return false;
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

    public static function generateOrderCode($n) {
        $generator = "1357902468";
        $result = "";
        for ($i = 1; $i <= $n; $i++) {
            $result .= substr($generator, (rand()%(strlen($generator))), 1);
        }
        return $result;
    }

    public function submit(Request $request)
    {
        try {
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
            $order->od_code = self::generateOrderCode(8);
            $order->od_total_price = $request->od_total_price;
            $order->ship_name = $request->shipName;
            $order->ship_address = $request->shipAddress;
            $order->ship_phone = $request->shipPhone;
            $order->ship_email = $request->shipEmail;
            $order->ship_fee = $request->ship_fee;
            $order->od_note = $request->note;
            $order->od_status = 1;

            $orderDetails = array();
            foreach ($shoppingCart as $key => $cartItem){
                $productId = $cartItem['productId'];
                // check status
                $product = Product::find($productId);
                if($product == null){
                    continue;
                }
                $quantity = $cartItem['quantity'];
                $orderDetail = new Order_detail();
                $orderDetail->product_id = $productId;
                $orderDetail->od_quantity = $quantity;
                $orderDetail->od_unit_price = $product->price;
//            $orderDetail->prd_sale_off = $product->sale_off;
                array_push($orderDetails, $orderDetail);
            }
            DB::transaction(function() use ($order, $orderDetails) {
                $order->save(); // có id của order.
                foreach ($orderDetails as $orderDetail){
                    $orderDetail->od_id = $order->id;
                    $orderDetail->save();
                }
            });
            Session::remove('shoppingCart');
            return true;
        } catch (\Exception $ex) {
            return false;
        }
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
        $user = Auth::user();
        $order = Order::where('id', $request->id)
            ->where('account_id', $user->id)
            ->whereNotIn('od_status', [-1])
            ->first();
        if ($order == null) {
            return view('errors.404');
        }
        $order_detail = Order_detail::where('od_id', $order->id)->get();
        return view('frontend.shop.order_detail', compact('order', 'order_detail'));
    }

    public function getProfileInfo()
    {
        $user = Auth::user();
        return view('frontend.shop.user', compact('user'));
    }

    public function getUserChangePass()
    {
        return view('frontend.shop.password');
    }

    public function postUserChangePass(Request $request)
    {
        return 'Change password';
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

    public function getListOrder()
    {
        try {
            $user = Auth::user();
            $shop = Shop::where('account_id', $user->id)->first();
            if ($shop == null) {
                return view('errors.404');
            }

            $lstOrder = Order::where('shop_id', $shop->id)
                ->whereNotIn('od_status', [-1, 1])
                ->orderby('created_at', 'desc')
                ->paginate(10);
            return view('frontend.shop.manager.list_order', compact('lstOrder'));
        } catch (\Exception $ex) {
            return view('errors.404');
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
                return view('errors.404');
            }
            $order_detail = Order_detail::where('od_id', $order->id)->get();

            return view('frontend.shop.manager.order_detail',
                compact('order', 'order_detail', 'order_status'));
        } catch (\Exception $ex) {
            return view('errors.404');
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
            return redirect()->back()->with(['msg' => 'Cập nhật đơn hàng thành công']);
        } catch (\Exception $ex) {
            return redirect()->back()->with(['msg' => 'Cập nhật đơn hàng không thành công']);
        }
    }

    public function getListArticle()
    {
        $user = Auth::user();
        $shop = Shop::where('account_id', $user->id)
            ->where('status', '!=', -1)
            ->first();
        if ($shop == null) {
            return view('errors.404');
        }
        $lst_article = Article::where('shop_id', $shop->id)
            ->where('status', '!=', -1)->get();
        return view('frontend.shop.manager.list_article', compact('lst_article'));
    }
    # End shop

    // detail shop
    public function getDetailShop(){
        return view('frontend.shop.manager.home_manager');
    }
}
