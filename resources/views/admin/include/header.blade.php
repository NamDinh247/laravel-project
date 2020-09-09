<nav class="main-header navbar navbar-expand navbar-dark navbar-teal">
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item" style="padding-top: 5px;">
            <a class="text-white">Quản lý website</a>
        </li>
    </ul>
    <ul class="navbar-nav ml-auto">
        <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                @if(\Illuminate\Support\Facades\Auth::check())
                    @if(\Illuminate\Support\Facades\Auth::user()->avatar == null ||
                        strlen(\Illuminate\Support\Facades\Auth::user()->avatar) == 0)
                        <img src="/Admin/dist/img/avatar.png" class="user-image" alt="Admin">
                    @else
                        <img src="{!! \Illuminate\Support\Facades\Auth::user()->small_photo !!}" class="img-circle" alt="Admin">
                    @endif
                @endif
                <span class="text-white">
                    @if (\Illuminate\Support\Facades\Auth::check())
                        {!! \Illuminate\Support\Facades\Auth::user()->full_name !!}
                    @endif
                </span>
            </a>
            <ul class="dropdown-menu">
                <li class="user-header">
                    @if(\Illuminate\Support\Facades\Auth::check())
                        @if(\Illuminate\Support\Facades\Auth::user()->avatar == null ||
                            strlen(\Illuminate\Support\Facades\Auth::user()->avatar) == 0)
                            <img src="/Admin/dist/img/avatar.png" class="img-circle" alt="Admin">
                        @else
                            <img src="{!! \Illuminate\Support\Facades\Auth::user()->small_photo !!}" class="img-circle" alt="Admin">
                        @endif
                    @endif
                    <p>
                        <span style="text-transform: uppercase">
                            @if(\Illuminate\Support\Facades\Auth::check())
                                {!! \Illuminate\Support\Facades\Auth::user()->full_name !!}
                            @endif
                        </span>
                        - quản trị
                    </p>
                </li>
                <li class="user-footer" style="background-color: #6c757d;">
                    <div class="float-left">
                        <a href="#" class="btn btn-outline-light">Hồ sơ</a>
                    </div>
                    <div class="float-right">
                        <a href="/admin/logout" class="btn btn-outline-light">Đăng xuất</a>
                    </div>
                </li>
            </ul>
        </li>
    </ul>
</nav>
