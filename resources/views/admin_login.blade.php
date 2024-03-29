<!--
=========================================================
* Material Dashboard 2 - v3.0.4
=========================================================

* Product Page: https://www.creative-tim.com/product/material-dashboard
* Copyright 2022 Creative Tim (https://www.creative-tim.com)
* Licensed under MIT (https://www.creative-tim.com/license)
* Coded by Creative Tim

=========================================================

* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
-->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="../assets/img/favicon.png">
    <title>
        Material Dashboard 2 by Creative Tim
    </title>
    <!--     Fonts and icons     -->
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />
    <!-- Nucleo Icons -->
    <link href="public/backendlogin/css/nucleo-icons.css" rel="stylesheet" />
    <link href="public/backendlogin/css/nucleo-svg.css" rel="stylesheet" />
    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <!-- Material Icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
    <!-- CSS Files -->
    <link id="pagestyle" href="public/backendlogin/css/material-dashboard.css?v=3.0.4" rel="stylesheet" />
</head>
<style>
    input.ggg {
        width: 100%;
        height: 40px;
        margin-bottom: 15px;
        border: 2px solid #EC407A;
        padding-left: 15px;
        border-radius: 5px;
    }

    input[type="submit"] {
        background: #EC407A;
        border: none;
        height: 40px;
        width: 100%;
        color: white;
        /* margin: auto; */
        border-radius: 10px;
        font-weight: bold;
        font-size: 18px;
		font-family: 'Times New Roman', Times, serif;
    }
	span {
    font-family: 'Font Awesome 5 Brands';
}
input.ggg {
    font-family: auto;
}
a {
    font-family: 'Font Awesome 5 Brands';
}
</style>
<body class="bg-gray-200">
<div class="container position-sticky z-index-sticky top-0">
    <div class="row">
        <div class="col-12">
            <!-- Navbar -->
            <!-- End Navbar -->
        </div>
    </div>
</div>
<main class="main-content  mt-0">
    <div class="page-header align-items-start min-vh-100" style="background-image: url('https://images.unsplash.com/photo-1497294815431-9365093b7331?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1950&q=80');">
        <span class="mask bg-gradient-dark opacity-6"></span>
        <div class="container my-auto">
            <div class="row">
                <div class="col-lg-4 col-md-8 col-12 mx-auto">
                    <div class="card z-index-0 fadeIn3 fadeInBottom">
                        <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                            <div class="bg-gradient-primary shadow-primary border-radius-lg py-3 pe-1">
                                <h4 class="text-white font-weight-bolder text-center mt-2 mb-0">ADMIN</h4>
                                <div class="row mt-3">
                                    <div class="col-2 text-center ms-auto">
                                        <a class="btn btn-link px-3" href="javascript:;">
                                            <i class="fa fa-facebook text-white text-lg"></i>
                                        </a>
                                    </div>
                                    <div class="col-2 text-center px-1">
                                        <a class="btn btn-link px-3" href="javascript:;">
                                            <i class="fa fa-github text-white text-lg"></i>
                                        </a>
                                    </div>
                                    <div class="col-2 text-center me-auto">
                                        <a class="btn btn-link px-3" href="javascript:;">
                                            <i class="fa fa-google text-white text-lg"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <?php
                            $message = Session::get('message');
                            if($message){
                                echo '<span class="text-alert" style="color:red;">'.$message.'</span>';
                                Session::put('message',null);
                            }
                            ?>
                            <form action="{{URL::to('/admin-dashboard')}}" method="post">
                                {{ csrf_field() }}
                                @foreach($errors->all() as $val)
                                    <ul>
                                        <li>{{$val}}</li>
                                    </ul>
                                @endforeach
                                <input type="text"  style="" class="ggg" name="admin_email" placeholder="Điền email" >
                                <input type="password" class="ggg" name="admin_password" placeholder="Điền password" >

                                <span style="color: #0b0b0b"><input type="checkbox" style="margin-right: 5px;font-family: 'Times New Roman', Times, serif;"/>Nhớ đăng nhập</span>
                                <h6><a href="#" style="color: #EC407A;font-size: 14px">Quên mật khẩu</a></h6>
                                <div class="clearfix"></div>
                                <input type="submit" value="Đăng nhập" name="login">

                                {{-- <div class="g-recaptcha" data-sitekey="{{env('CAPTCHA_KEY')}}"></div>
                                <br/>
                                @if($errors->has('g-recaptcha-response'))
                                <span class="invalid-feedback" style="display:block">
                                    <strong>{{$errors->first('g-recaptcha-response')}}</strong>
                                </span>
                                @endif --}}

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<!--   Core JS Files   -->
<script src="public/backendlogin/js/core/popper.min.js"></script>
<script src="public/backendlogin/js/core/bootstrap.min.js"></script>
<script src="public/backendlogin/js/plugins/perfect-scrollbar.min.js"></script>
<script src="public/backendlogin/js/plugins/smooth-scrollbar.min.js"></script>
<script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
        var options = {
            damping: '0.5'
        }
        Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
</script>
<!-- Github buttons -->
<script async defer src="https://buttons.github.io/buttons.js"></script>
<!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
<script src="public/backendlogin/js/material-dashboard.min.js?v=3.0.4"></script>
</body>

</html>
