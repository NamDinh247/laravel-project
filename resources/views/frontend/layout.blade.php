<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" type="image/png" href="/img/favicon.ico"/>
    <link rel="stylesheet" href="/Admin/plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="/Admin/plugins/fontawesome-free/css/v4-shims.css">
    <link rel="stylesheet" href="/Admin/plugins/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/frontend/style.css">
    <script src="/Admin/plugins/jquery/jquery.min.js"></script>
    <script src="/Admin/plugins/bootstrap/js/bootstrap.min.js"></script>
    <title>
        @yield('title')
    </title>
    @yield('header-script')
</head>
<div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v8.0&appId=680469619206748&autoLogAppEvents=1" nonce="tTMwqKi2"></script>
<body>
    @include('frontend.include.header')
    <main class="container-fluid" style="margin-top: 57px;">
        @yield('content')
    </main>

    @yield('modal')
    <div class="modal fade bd-example-modal-xl" id="modal-signIn">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-body p-0">
                    <div class="row">
                        <div class="col-md-5 p-0">
                            <div class="box-img-signin">
                                <img src="">
                            </div>
                        </div>
                        <div class="col-md-7 p-0">
                            <div class="signin-and-signup" style="border: 15px solid #f5f4f4;">
                                <ul class="nav nav-tabs">
                                    <li><a href="#signin">Đăng nhập</a></li>
                                    <li><a href="#sinup">Đăng ký</a></li>
                                </ul>
                                <div class="tab-content">
                                    <div id="home" class="tab-pane fade in active">
                                        <h3>HOME</h3>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                                    </div>
                                    <div id="menu1" class="tab-pane fade">
                                        <h3>Menu 1</h3>
                                        <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                                    </div>
                                    <div id="menu2" class="tab-pane fade">
                                        <h3>Menu 2</h3>
                                        <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam.</p>
                                    </div>
                                    <div id="menu3" class="tab-pane fade">
                                        <h3>Menu 3</h3>
                                        <p>Eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</p>
                                    </div>
                                </div>
                                <form>
                                    <div class="form-group row">
                                        <label for="email" class="col-sm-2 col-form-label">Email</label>
                                        <div class="col-sm-10">
                                            <input type="email" class="form-control" id="email" placeholder="Nhập email">
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://widget.cloudinary.com/v2.0/global/all.js" type="text/javascript"></script>
    <script src="https://cdn.ckeditor.com/ckeditor5/20.0.0/classic/ckeditor.js"></script>
    <script>
        $(document).ready(function () {
            $('#signIn').click(function (event) {
                console.log(123131)
                $('#modal-signIn').modal('show');
            })
        })
    </script>

    @yield('main-script')
</body>
</html>
