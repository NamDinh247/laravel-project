<aside class="main-sidebar sidebar-dark-teal elevation-4" id="aside-nav-left">
    <a href="index3.html" class="brand-link navbar-teal">
        <img src="/img/favicon-32x32.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8;background-color: #fff;">
        <span class="brand-text font-weight-dark">Recycling</span>
    </a>
    <div class="sidebar">
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                @if(\Illuminate\Support\Facades\Auth::check())
                    @if(\Illuminate\Support\Facades\Auth::user()->avatar == null ||
                        strlen(\Illuminate\Support\Facades\Auth::user()->avatar) == 0)
                        <img src="/Admin/dist/img/avatar.png" class="img-circle elevation-2" alt="User Image">
                    @else
                        <img src="{!! \Illuminate\Support\Facades\Auth::user()->small_photo !!}" class="img-circle" alt="Admin">
                    @endif
                @endif
            </div>
            <div class="info">
                @if(\Illuminate\Support\Facades\Auth::check())
                    <a href="#" class="d-block">
                        {!! \Illuminate\Support\Facades\Auth::user()->full_name !!}
                    </a>
                @endif
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul id="menu_filter" class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a href="/admin/dashboard" class="nav-link dashboard_filter active">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>Doanh thu</p>
                    </a>
                </li>
                <li class="nav-item has-treeview">
                    <a class="nav-link user_filter" style="color: #c2c7d0;">
                        <i class="nav-icon fas fa-users"></i>
                        <p>
                            Tài khoản
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="/admin/account" class="nav-link user_admin_filter">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Quản trị</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/admin/account/user" class="nav-link user_sb_filter">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Người dùng</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/admin/account/shop" class="nav-link user_shop_filter">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Cửa hàng</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item">
                    <a href="/admin/category" class="nav-link category_filter">
                        <i class="nav-icon fa fa-list"></i>
                        <p>Danh mục</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/admin/product" class="nav-link product_filter">
                        <i class="nav-icon fa fa-tags"></i>
                        <p>Sản phẩm</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/admin/orders/list" class="nav-link orders_filter">
                        <i class="nav-icon fa fa-file"></i>
                        <p>Đơn hàng</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/admin/posts" class="nav-link posts_filter">
                        <i class="nav-icon fa fa-comments"></i>
                        <p>Bài viết</p>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</aside>
