<aside class="main-sidebar sidebar-dark-teal elevation-4" id="aside-nav-left">
    <a href="index3.html" class="brand-link navbar-teal">
        <img src="/img/favicon-32x32.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8;background-color: #fff;">
        <span class="brand-text font-weight-dark">Recycling</span>
    </a>
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
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a href="#" class="nav-link active" onclick="activeFilter(this)">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>Doanh thu</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/admin/account" class="nav-link" onclick="activeFilter(this)">
                        <i class="nav-icon fa fa-users"></i>
                        <p>Tài khoản</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link" onclick="activeFilter(this)">
                        <i class="nav-icon fa fa-list"></i>
                        <p>Danh mục</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link" onclick="activeFilter(this)">
                        <i class="nav-icon fa fa-tags"></i>
                        <p>Sản phẩm</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link" onclick="activeFilter(this)">
                        <i class="nav-icon fa fa-file"></i>
                        <p>Đơn hàng</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" onclick="activeFilter(this)">
                        <i class="nav-icon fa fa-comments"></i>
                        <p>Bài viết</p>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</aside>
