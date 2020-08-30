<?php

namespace App\Http\Controllers\Frontend;

use App\Article;
use App\Category;
use App\Http\Controllers\Controller;
use App\Order;
use App\Order_detail;
use App\Product;
use App\Shop;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{
    public function getHomePage()
    {
        return view('frontend.contentHome');
    }
//    public function getHomePage()
//    {
//        $articles = Article::where('status', '=', 1)
//            ->orderby('created_at', 'desc')
//            ->paginate(10);
//        // return view('frontend.article.list', compact('articles'));
//        return view('frontend.contentHome', compact('articles'));
//    }
//
//    public function getRegister()
//    {
//        return view('frontend.register');
//    }
//
//    public function postRegister(Request $request)
//    {
//        // register user
//        // none validate data
//        return 'Post register user';
//    }
//
    public function getLogin()
    {
        return view('frontend.sign.signIn');
    }

    public function postLogin(Request $request)
    {
        // login user
        // none validate data
        return 'Login user';
    }

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

    public function getDetailProduct($id)
    {
        try {
            $product = Product::where('id', '=', $id)
                ->where('status', '=', 1)
                ->first();
            if ($product == null) {
                return false;
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
        if (isset($shoppingCart)) {
            return view('frontend.shopping_cart')->with('shoppingCart', $shoppingCart);
        }
        return view('frontend.shopping_cart');
    }

    public function getAddShoppingCart(Request $request)
    {
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
                'prd_detail' => $product,
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
        return redirect('/shopping-cart/show');
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
        return redirect('/shopping-cart/show');
    }

    public function submit(Request $request)
    {
        $shipName = $request->get('shipName');
        $shipAddress = $request->get('shipAddress');
        $shipPhone = $request->get('shipPhone');
        $shipEmail = $request->get('shipEmail');
        $note = $request->get('note');
        $total_order = 0;
        // lấy thông tin giỏ hàng từ trong session.
        $shoppingCart = Session::get('shoppingCart');
        // nếu session ko có thông tin giỏ hàng
        if ($shoppingCart == null) {
            // thì tạo mới giỏ hàng là một mảng các key và value
            $shoppingCart = array(); // key và value
        }
        $order = new Order();
        $order->account_id = 1;
        $order->shop_id = 1;
        $order->od_code = 'OD001';
        $order->od_total_price = $total_order;
        $order->ship_name = $shipName;
        $order->ship_address = $shipAddress;
        $order->ship_phone = $shipPhone;
        $order->ship_email = $shipEmail;
        $order->ship_fee = 0;
        $order->note = $note;

        $orderDetails = array();
        foreach ($shoppingCart as $key => $cartItem){
            $productId = $cartItem['productId'];
            $product = Product::find($productId);
            if($product == null){
                continue;
            }
            $quantity = $cartItem['quantity'];
            $orderDetail = new Order_detail();
            $orderDetail->product_id = $productId;
            // $orderDetail->order_id = ? chờ lưu đơn hàng mới có.
            $orderDetail->quantity = $quantity;
            $orderDetail->unit_price = $product->price;
            $order->total_money += $orderDetail->unit_price * $orderDetail->quantity;
            array_push($orderDetails, $orderDetail);
        }
        DB::transaction(function() use ($order, $orderDetails) {
            $order->save(); // có id của order.
            foreach ($orderDetails as $orderDetail){
                $orderDetail->order_id = $order->id;
                $orderDetail->save();
            }
        });
        Session::remove('shoppingCart');
        return 'Order success!';
    }

    public function postCreateOrder(Request $request)
    {
        // create order
        return 'Create order';
    }
    # End shopping cart

    # Shop
    public function getShopRegister()
    {
        return view('frontend.shop.register');
    }

    public function postShopRegister(Request $request)
    {
        // none validate data
        try {
            $shop = new Shop();
            $shop->account_id = $request->get('account_id');
            $shop->name = $request->get('name');
            $shop->logo = $request->get('logo');
            $shop->address = $request->get('address');
            $shop->email = $request->get('email');
            $shop->phone = $request->get('phone');
            $shop->save();
            // notice success by PHP or notice by ajax or redirect page register success
            return 'Shop register success';
        } catch (\Exception $ex) {
            return false;
        }
    }

    public function getListOrder()
    {
        try {
//            $lstOrder = Order::whereNotIn('status', [-1])
//                ->orderby('created_at', 'desc')
//                ->paginate(10);
//            return view('frontend.shop.list', compact('lstOrder'));
            return view('frontend.shop.list');
        } catch (\Exception $ex) {
            return false;
        }
    }

    public function getDetailOrder($id)
    {
        try {
            $odDetail = Order::where('id', '=', $id)
                ->where('status', '=', 1)
                ->first();
            return view('frontend.shop.order_detail', compact('odDetail'));
        } catch (\Exception $ex) {
            return false;
        }
    }

    public function postChangeStatus(Request $request)
    {
        try {
            $odId = $request->get('od_id');
            $order = Order::where('id', '=', $odId)
                ->whereNotIn('status', '=', -1)
                ->first();
            $order->status = $request->get('status');
            $order->save();
            return view('frontend.shop.order_detail',
                compact('msg', 'Cập nhật trạng thái đơn hàng thành công!'));
        } catch (\Exception $ex) {
            return view('frontend.shop.order_detail',
                compact('msg', 'Cập nhật trạng thái đơn hàng không thành công!'));
        }
    }

//#Region Shop Order
//    public function getShopOrdersList(){
//        return view('frontend.shop.list');
//    }
//
//    public function getShopDetailOrders(){
//        return view('frontend.shop.detail');
//    }
//
//#End Region Shop Order
//// sign in
//    public function getSignIn(){
//        return view('frontend.sign.signIn');
//    }
    #End shop
    // detail shop
    public function getDetailShop(){
        return view('frontend.shop.manager.home_manager');
    }
}
