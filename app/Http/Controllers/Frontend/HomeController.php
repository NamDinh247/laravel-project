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
//    public function getLogin()
//    {
//        return view('frontend.login');
//    }
//
//    public function postLogin(Request $request)
//    {
//        // login user
//        // none validate data
//        return 'Login user';
//    }

    public function getListShop()
    {
//        $shops = Shop::where('status', '=', 1)
//            ->orderby('created_at', 'desc')
//            ->paginate(10);
//        return view('frontend.shop.list', compact('shops'));
        return view('frontend.shop.list');
    }

    public function getListProduct()
    {
        $listProvince = [
            "An Giang",
            "Bà Rịa – Vũng Tàu",
            "Bắc Giang",
            "Bắc Kạn",
            "Bạc Liêu",
            "Bắc Ninh",
            "Bến Tre",
            "Bình Định",
            "Bình Dương",
            "Bình Phước",
            "Bình Thuận",
            "Cà Mau",
            "Cần Thơ",
            "Cao Bằng",
            "Đà Nẵng",
            "Đắk Lắk",
            "Đắk Nông",
            "Điện Biên",
            "Đồng Nai",
            "Đồng Tháp",
            "Gia Lai",
            "Hà Giang",
            "Hà Nam",
            "Hà Nội",
            "Hà Tĩnh",
            "Hải Dương",
            "Hải Phòng",
            "Hậu Giang",
            "Hòa Bình",
            "Hưng Yên",
            "Khánh Hòa",
            "Kiên Giang",
            "Kon Tum",
            "Lai Châu",
            "Lâm Đồng",
            "Lạng Sơn",
            "Lào Cai",
            "Long An",
            "Nam Định",
            "Nghệ An",
            "Ninh Bình",
            "Ninh Thuận",
            "Phú Thọ",
            "Phú Yên",
            "Quảng Bình",
            "Quảng Nam",
            "Quảng Ngãi",
            "Quảng Ninh",
            "Quảng Trị",
            "Sóc Trăng",
            "Sơn La",
            "Tây Ninh",
            "Thái Bình",
            "Thái Nguyên",
            "Thanh Hóa",
            "Thừa Thiên Huế",
            "Tiền Giang",
            "Thành phố Hồ Chí Minh",
            "Trà Vinh",
            "Tuyên Quang",
            "Vĩnh Long",
            "Vĩnh Phúc",
            "Yên Bái",
        ];
//        $products = Product::where('status', '=', 1)
//            ->orderby('created_at', 'desc')
//            ->paginate(15);
        // no filter
//        return view('frontend.product.list', compact('products'));
        return view('frontend.product.list')->with('listProvince', $listProvince);
    }

    public function getDetailProduct()
    {
//        try {
//            $product = Product::where('id', '=', $id)
//                ->where('status', '=', 1)
//                ->first();
//            return view('frontend.product.detail', compact('product'));
            return view('frontend.product.detail');
//        } catch (\Exception $ex) {
//            return false;
//        }
    }

    // shopping cart
    public function getShoppingCart()
    {
        return view('frontend.shopping_cart');
    }

//    public function postCreateOrder(Request $request)
//    {
//        // create order
//        return 'Create order';
//    }
//
//    public function getShopRegister()
//    {
//        return view('frontend.shop.register');
//    }
//
//    public function postShopRegister(Request $request)
//    {
//        // none validate data
//        try {
//            $shop = new Shop();
//            $shop->account_id = $request->get('account_id');
//            $shop->name = $request->get('name');
//            $shop->logo = $request->get('logo');
//            $shop->address = $request->get('address');
//            $shop->email = $request->get('email');
//            $shop->phone = $request->get('phone');
//            $shop->save();
//            // notice success by PHP or notice by ajax or redirect page register success
//            return 'Shop register success';
//        } catch (\Exception $ex) {
//            return false;
//        }
//    }
//
//    public function getListOrder()
//    {
//        try {
//            $lstOrder = Order::whereNotIn('status', '=', -1)
//                ->orderby('created_at', 'desc')
//                ->paginate(10);
//            return view('frontend.shop.order_list', compact('lstOrder'));
//        } catch (\Exception $ex) {
//            return false;
//        }
//    }
//
//    public function getDetailOrder($id)
//    {
//        try {
//            $odDetail = Order::where('id', '=', $id)
//                ->where('status', '=', 1)
//                ->first();
//            return view('frontend.shop.order_detail', compact('odDetail'));
//        } catch (\Exception $ex) {
//            return false;
//        }
//    }
//
//    public function postChangeStatus(Request $request)
//    {
//        try {
//            $odId = $request->get('od_id');
//            $order = Order::where('id', '=', $odId)
//                ->whereNotIn('status', '=', -1)
//                ->first();
//            $order->status = $request->get('status');
//            $order->save();
//            return view('frontend.shop.order_detail',
//                compact('msg', 'Cập nhật trạng thái đơn hàng thành công!'));
//        } catch (\Exception $ex) {
//            return view('frontend.shop.order_detail',
//                compact('msg', 'Cập nhật trạng thái đơn hàng không thành công!'));
//        }
//    }

#Region Shop Order
    public function getShopOrdersList(){
        return view('frontend.shop.list');
    }

    public function getShopDetailOrders(){
        return view('frontend.shop.detail');
    }

#End Region Shop Order
// sign in
    public function getSignIn(){
        return view('frontend.sign.signIn');
    }
}
