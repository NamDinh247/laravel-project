<div class="aside_left pl-3">
    <ul class="menu_left">
        @if(\Illuminate\Support\Facades\Auth::check())
            <li class="item_menu_left pl-2 py-2 clearfix">
                <img class="rounded-circle float-left mr-2" src="/img/avatar_2x.png" alt="avatar left">
                <span class="float-left item_menu_title pt-1">
                    {!! \Illuminate\Support\Facades\Auth::user()->full_name !!}
                </span>
            </li>
        @endif
        <li class="item_menu_left pl-2 py-2 clearfix">
            <a href="/shops/list">
                <i class="fa fa-archive float-left"></i>
                <span class="float-left">Cửa hàng</span>
            </a>
        </li>
        <li class="item_menu_left pl-2 py-2 clearfix">
            <a href="/product/list">
                <i class="fa fa-tag float-left"></i>
                <span class="float-left">Sản phẩm</span>
            </a>
        </li>
        <li class="item_menu_left pl-2 py-2 clearfix">
            <a href="/">
                <i class="fa fa-youtube-play float-left"></i>
                <span class="float-left">Video</span>
            </a>
        </li>
        <li class="item_menu_left pl-2 py-2 clearfix">
            <a href="/product/list">
                <i class="fa fa-credit-card-alt float-left"></i>
                <span class="float-left">Giảm giá</span>
            </a>
        </li>
    </ul>

    <hr class="my-3"/>

    <h5 class="pb-2" style="color: #65676b;font-size: 16px !important;">Hạng mục</h5>
    <ul class="menu_left menu_categories_home">
        <?php $lstCate = \App\Category::where('status', '!=', -1)->get(); ?>
        @foreach($lstCate as $cate)
            <li class="item_menu_left pl-2 py-2 clearfix">
                <a href="/product/cate/{!! $cate->id !!}" style="color: #444;">
                    @switch($cate->id)
                        @case(1)
                            <i class="fa fa-cubes float-left"></i>
                            @break
                        @case(2)
                            <i class="fa fa-tree float-left"></i>
                            @break
                        @case(3)
                            <i class="fa fa-futbol-o float-left"></i>
                            @break
                        @case(4)
                            <i class="fa fa-glass float-left"></i>
                            @break
                        @case(5)
                            <i class="fa fa-window-minimize float-left"></i>
                            @break
                        @default
                            <i class="fa fa-window-minimize float-left"></i>
                            @break
                        @endswitch
                    <span class="float-left item_menu_title">{!! $cate->name !!}</span>
                </a>
            </li>
        @endforeach
    </ul>
</div>
