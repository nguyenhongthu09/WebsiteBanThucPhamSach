@extends('admin')
@section('admin_content')
<style>
    .slide-inner.bg-height {
        display: none;
    }

    .top-nav.clearfix {
        display: none;
    }

    aside {
        display: none;
    }

    header.header.fixed-top.clearfix {
        display: none;
    }

    section#main-content {
        margin-left: 0rem;
    }

    section#main-content {
        background: white;
    }

    section.wrapper {
        margin-top: 0px;
    }

    .col-md-6 {
        height: 500px;
    }

    .blog-item {
        background: white;
        padding-left: 20px;
        height: 500px;
    }
</style>
<div class="container">
    <div class="row">

        <div class="col-sm-12">
            <div class="shop-menu pull-right">
                <ul class="nav navbar-nav">

                    <li><a href="#"><i class="fa fa-star"></i> Yêu thích</a></li>
                    <?php
                    $customer_id = Session::get('customer_id');
                    $shipping_id = Session::get('shipping_id');
                    if ($customer_id != NULL && $shipping_id == NULL) {
                    ?>
                        <li><a href="{{URL::to('/checkout')}}"><i class="fa fa-crosshairs"></i> Thanh toán</a></li>

                    <?php
                    } elseif ($customer_id != NULL && $shipping_id != NULL) {
                    ?>
                        <li><a href="{{URL::to('/payment')}}"><i class="fa fa-crosshairs"></i> Thanh toán</a></li>
                    <?php
                    } else {
                    ?>
                        <li><a href="{{URL::to('/dang-nhap')}}"><i class="fa fa-crosshairs"></i> Thanh toán</a></li>
                    <?php
                    }
                    ?>


                    <li><a href="{{URL::to('/gio-hang')}}"><i class="fa fa-shopping-cart"></i> Giỏ hàng</a></li>
                    <?php
                    $customer_id = Session::get('customer_id');
                    if ($customer_id != NULL) {
                    ?>
                        <li><a href="{{URL::to('/logout-checkout')}}"><i class="fa fa-lock"></i> Đăng xuất</a></li>

                    <?php
                    } else {
                    ?>
                        <li><a href="{{URL::to('/dang-nhap')}}"><i class="fa fa-lock"></i> Đăng nhập</a></li>
                    <?php
                    }
                    ?>

                </ul>
            </div>
        </div>
    </div>
</div>
<div class="container m-auto">
    <div class="col-sm-7">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        </div>
        <div class="mainmenu pull-left" style="float: left;">
            <ul class="nav navbar-nav collapse navbar-collapse ">
                <li><a href="{{URL::to('/trang-chu')}}" style="margin-bottom: 20px;">Trang chủ</a></li>
                <li class="dropdown"><a href="#">Sản phẩm<i class="fa fa-angle-down"></i></a>
                <li class="dropdown"><a href="{{URL::to('/show-blog')}}">Bài Viết</a>
                <li><a href="{{URL::to('/gio-hang')}}">Giỏ hàng</a></li>
                <li><a href="{{URL::to('/lienhe')}}">Liên hệ</a></li>

            </ul>
        </div>

    </div>
</div>
<div class="blog-area blog-column-2 section-space-y-axis-100 bg-white">
    <div class="container m-auto">
        <div class="row">
            @foreach($all_blog as $key => $blog)
            <div class="col-md-6">
                <div class="blog-item">
                    <div class="blog-img img-zoom-effect">
                        <a href="{{URL::to('/chi-tiet/'.$blog->blog_name)}}">
                            <img style="height: 300px;" class="img-full" src="{{URL::to('public/uploads/blog/'.$blog->blog_image)}}" alt="Blog Image">
                        </a>
                    </div>
                    <div class="blog-content" style="height: 350px;">
                        <div class="blog-meta text-dim-gray pb-3">
                            <ul>
                                <li class="date"><i class="fa fa-calendar-o me-2"></i>{{$blog->created_at}}</li>
                                <li>
                                    <span class="comments me-3">
                                        <a href="javascript:void(0)">2 Comments</a>
                                    </span>
                                    <span class="link-share">
                                        <a href="javascript:void(0)">Share</a>
                                    </span>
                                </li>
                            </ul>
                        </div>
                        <h5 class="title mb-4">
                            <a style="font-size: 20px" href="blog-detail-left-sidebar.html">{{$blog->blog_name}}</a>
                        </h5>
                        <p class="short-desc mb-5">{{$blog->blog_title}}</p>
                        <div class="button-wrap">
                            <a class="btn btn-custom-size lg-size btn-dark rounded-0" href="{{URL::to('/chi-tiet/'.$blog->blog_name)}}">Mua Ngay</a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach

        </div>
    </div>
</div>
<footer id="footer"><!--Footer-->

    <div class="footer-widget">
        <div class="container">
            <div class="row">
                <div class="col-sm-2">
                    <div class="single-widget">
                        <h2>DỊCH VỤ</h2>
                        <ul class="nav nav-pills nav-stacked">
                            <li><a href="#">Hỗ trợ trực tuyến</a></li>
                            <li><a href="#">Liên hệ chúng tôi</a></li>
                            <li><a href="#">Tình trạng đặt hàng</a></li>
                            <li><a href="#">Thay đổi địa điểm</a></li>
                            <li><a href="#">Câu hỏi thường gặp</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-2">
                    <div class="single-widget">
                        <h2>DANH MỤC</h2>
                        <ul class="nav nav-pills nav-stacked">
                            <li><a href="#">Trang Chủ</a></li>
                            <li><a href="#">Sản Phẩm</a></li>
                            <li><a href="#">Bài Viết</a></li>
                            <li><a href="#">Giỏ Hàng</a></li>
                            <li><a href="#">Liên Hệ</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-2">
                    <div class="single-widget">
                        <h2>KHÁCH HÀNG</h2>
                        <ul class="nav nav-pills nav-stacked">
                            <li><a href="#">Đăng Ký</a></li>
                            <li><a href="#">Đăng Nhập</a></li>
                            <li><a href="#">Giỏ Hàng</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-5 col-sm-offset-1">
                    <div class="single-widget">
                        <h2>Liên Hệ</h2>
                        <form action="#" class="searchform">
                            <input type="text" placeholder="Your email address" />
                            <button type="submit" class="btn btn-default"><i class="fa fa-arrow-circle-o-right"></i></button>
                            <p>Nhận các bản cập nhật mới nhất từ trang web <br />của chúng tôi và được cập nhật bản thân của bạn ...</p>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>

</footer><!--/Footer-->
@endsection
