<aside class="main-sidebar sidebar-light-primary elevation-4" id="aside-nav-left">
    <div class="sidebar">
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{asset('Admin/dist/img/avatar.png')}}" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">ADMIN</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column nav-compact nav-legacy" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-header">Danh mục</li>
                <li class="nav-item">
                    <a href="#" class="nav-link active" onclick="activeFilter(this)">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>Bảng điều khiển</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link" onclick="activeFilter(this)">
                        <i class="nav-icon fa fa-users"></i>
                        <p>Quản lý người dùng</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link" onclick="activeFilter(this)">
                        <i class="nav-icon fa fa-rss"></i>
                        <p>Quản lý tin tức</p>
                    </a>
                </li>
                <li class="nav-item">
{{--                    <a href="{!! route('cate.list') !!}" class="nav-link" onclick="activeFilter(this)">--}}
                        <i class="nav-icon fa fa-tags"></i>
                        <p>Quản lý danh mục</p>
                    </a>
                </li>
                <li class="nav-item">
{{--                    <a href="{!! route('product.list') !!}" class="nav-link" onclick="activeFilter(this)">--}}
                        <i class="nav-icon fa fa-list"></i>
                        <p>Quản lý sản phẩm</p>
                    </a>
                </li>
                <li class="nav-item">
{{--                    <a href="{!! route('order.list') !!}" class="nav-link" onclick="activeFilter(this)">--}}
                        <i class="nav-icon fa fa-file"></i>
                        <p>Đơn hàng</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" onclick="activeFilter(this)">
                        <i class="nav-icon fa fa-comments"></i>
                        <p>Phản hồi khách hàng</p>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</aside>
