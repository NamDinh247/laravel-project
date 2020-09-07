@extends('frontend.layout')

@section('title', 'Trang chủ')

@section('header-script')
    <link rel="stylesheet" href="/css/frontend/content_home.css">
@endsection

@section('content')
    <input type="hidden" value="0" id="userLogin">
@stop
@section('main-script')
    <script src="/js/frontend/home.js"></script>
    {{--    <script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v8.0&appId=680469619206748&autoLogAppEvents=1" nonce="tTMwqKi2"></script>--}}
    <script>
        var height = $(window).height() - 70;
        $('.menu_categories_home').css({'height': (height - 273)  + 'px', 'overflow-x': 'hidden'});
        $('#content_posts_home').css({'height': (height + 7)  + 'px', 'overflow-x': 'hidden'});
    </script>
@stop

