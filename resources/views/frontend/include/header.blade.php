<header id="header" class="bg-white" >
    <div class="container-fluid">
        <div class="row row-header" style="box-shadow: 0 1px 5px -2px #888;">
            <div class="col-md-4 col-logo">
                <div class="logo-search row">
                    <div class="logo col-md-3">
                        <a href="/">
                            <img src="/img/logoRecycling.png" class="" alt="logo recycling">
                        </a>
                    </div>
                    <div class="search col-md-9 my-2" hidden>
                        <div class="input-group" >
                            <input type="text" class="form-control" placeholder="Tìm kiếm" aria-label="Recipient's username" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <span class="input-group-text" id="basic-addon2"><i class="fa fa-search"></i></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-1 d-none"></div>
            <div class="col-md-5">
                <ul class="menu-header ml-5 clearfix">
                    <li class="item-menu float-left mr-4 active"><a href="/" title="Trang chủ"><i class="fa fa-home"></i></a></li>
                    <li class="item-menu float-left mr-4"><a href="/shop/list" title="Cửa hàng"><i class="fa fa-archive"></i></a></li>
                    <li class="item-menu float-left mr-4"><a href="/product/list" title="Sản phẩm"><i class="fa fa-tag"></i></a></li>
                </ul>
            </div>
            <div class="col-md-3 clearfix pr-4">
                <div class="float-right">
                    <div class="avatar_header clearfix">
                        <div class="float-left shopping_cart mr-2" style="border-radius: 50%;margin-top: 13px; border: 1px solid #28a745;">
                            <a class="position-relative" href="/shopping_cart/show" >
                                <i class="fa fa-shopping-cart" style="padding: 8px;font-size: 13px;color: #28a745"></i>
                                <span class="badge badge-warning navbar-badge">0</span>
                            </a>
                        </div>
                        {{-- notify --}}
                        <div class="float-left shopping_cart mr-2 dropdown" style="border-radius: 50%;margin-top: 13px; border: 1px solid #28a745;">
                            <a class="position-relative" data-toggle="dropdown" id="dropdownNotify">
                                <i class="fa fa-bell" style="padding: 8px;font-size: 13px;color: #28a745"></i>
                                <span class="badge badge-danger navbar-badge">3</span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right" aria-labelledby="dropdownNotify">
                                <a href="#" class="dropdown-item">
                                    <!-- Message Start -->
                                    <div class="media">
                                        <img src="/img/avatar_2x.png" alt="User Avatar" class="img-size-50 mr-3 img-circle">
                                        <div class="media-body">
                                            <h3 class="dropdown-item-title">
                                                Hiện Bình Định
                                                <span class="float-right text-sm text-success"><i class="fas fa-check"></i></span>
                                            </h3>
                                            <p class="text-sm">Đặng ký cửa hàng thành công</p>
                                            <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 7 ngày trước</p>
                                        </div>
                                    </div>
                                    <!-- Message End -->
                                </a>
                                <div class="dropdown-divider"></div>
                                <a href="#" class="dropdown-item">
                                    <!-- Message Start -->
                                    <div class="media">
                                        <img src="/img/avatar_2x.png" alt="User Avatar" class="img-size-50 img-circle mr-3">
                                        <div class="media-body">
                                            <h3 class="dropdown-item-title">
                                                John Pierce
                                                <span class="float-right text-sm text-muted"><i class="fas fa-star"></i></span>
                                            </h3>
                                            <p class="text-sm">I got your message bro</p>
                                            <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                                        </div>
                                    </div>
                                    <!-- Message End -->
                                </a>
                                <div class="dropdown-divider"></div>
                                <a href="#" class="dropdown-item">
                                    <!-- Message Start -->
                                    <div class="media">
                                        <img src="/img/avatar_2x.png" alt="User Avatar" class="img-size-50 img-circle mr-3">
                                        <div class="media-body">
                                            <h3 class="dropdown-item-title">
                                                Đơn hàng M457
                                                <span class="float-right text-sm text-info"><i class="fas fa-truck"></i></span>
                                            </h3>
                                            <p class="text-sm">Sản phẩm tranh treo tường gỗ đang được giao cho khách hàng <span class="font-weight-bold">Hiện Bình Định</span></p>
                                            <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 1 giờ trước</p>
                                        </div>
                                    </div>
                                    <!-- Message End -->
                                </a>
                                <div class="dropdown-divider"></div>
                                <a href="#" class="dropdown-item dropdown-footer">Tất cả thông báo</a>
                            </div>
                        </div>
                        @if(\Illuminate\Support\Facades\Auth::check())
                            <div class="float-left" style="padding-top: 5px;">
                                <button type="button btn-account" class="btn dropdown-toggle" data-toggle="dropdown">
                                    <img class="float-left rounded-circle mr-2" style="width: 28px; height: 28px;border: 1px solid #20c997;" src="/img/avatar_2x.png" alt="avatar">
                                    <a class="float-left name_user_header p-0" style="margin-top: 3px;">
                                        {!! \Illuminate\Support\Facades\Auth::user()->full_name !!}
                                    </a>
                                </button>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <a class="dropdown-item" href="/profile/info"><i class="fa fa-user"></i>&nbsp; Hồ sơ</a>
                                    <a class="dropdown-item" href="/profile/order/list"><i class="fa fa-file" aria-hidden="true"></i>&nbsp; Quản lý đơn hàng</a>
                                    @if(\Illuminate\Support\Facades\Auth::user()->shop)
                                        <a href="/shop/order/list" id="btn-channel-shop" class="dropdown-item"><i class="fa fa-font-awesome" aria-hidden="true"></i>&nbsp; Kênh bán hàng</a>
                                    @else
                                        <a class="dropdown-item" id="form-signup-shop"><i class="fa fa-font-awesome" aria-hidden="true"></i>&nbsp; Đăng kí bán hàng</a>
                                    @endif

                                    <a class="dropdown-item" href="/logout"><i class="fa fa-sign-out" aria-hidden="true"></i>&nbsp; Đăng xuất</a>
                                </div>
                            </div>
                        @else
                            <div class="btn-sign float-left d-block mr-3" style="padding-top: 13px;">
                                <button class="btn btn-sm btn-outline-success" id="signIn">Đăng nhập</button>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
