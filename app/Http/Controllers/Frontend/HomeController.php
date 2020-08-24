<?php

namespace App\Http\Controllers\Frontend;

use App\Article;
use App\Http\Controllers\Controller;
use App\Order;
use App\Product;
use App\Shop;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function getHomePage()
    {
        $articles = Article::where('status', '=', 1)
            ->orderby('created_at', 'desc')
            ->paginate(10);
        // return view('frontend.article.list', compact('articles'));
        return view('frontend.contentHome', compact('articles'));
    }

    public function getRegister()
    {
        return view('frontend.register');
    }

    public function postRegister(Request $request)
    {
        // register user
        // none validate data
        return 'Post register user';
    }

    public function getLogin()
    {
        return view('frontend.login');
    }

    public function postLogin(Request $request)
    {
        // login user
        // none validate data
        return 'Login user';
    }

    public function getListShop()
    {
        $shops = Shop::where('status', '=', 1)
            ->orderby('created_at', 'desc')
            ->paginate(10);
        return view('frontend.shop.list', compact('shops'));
    }

    public function getListProduct()
    {
        $products = Product::where('status', '=', 1)
            ->orderby('created_at', 'desc')
            ->paginate(15);
        // no filter
        return view('frontend.product.list', compact('products'));
    }

    public function getDetailProduct($id)
    {
        try {
            $product = Product::where('id', '=', $id)
                ->where('status', '=', 1)
                ->first();
            return view('frontend.product.detail', compact('product'));
        } catch (\Exception $ex) {
            return false;
        }
    }

    // shopping cart
    public function getShoppingCart()
    {
        return view('frontend.shopping_cart');
    }

    public function postCreateOrder(Request $request)
    {
        // create order
        return 'Create order';
    }

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
            $lstOrder = Order::whereNotIn('status', '=', -1)
                ->orderby('created_at', 'desc')
                ->paginate(10);
            return view('frontend.shop.order_list', compact('lstOrder'));
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
}