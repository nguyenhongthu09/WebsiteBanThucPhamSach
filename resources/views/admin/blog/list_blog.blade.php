@extends('admin_layout')
@section('admin_content')
    <style>
        span.text-alert.text-red\; {
            color: white;
            font-family: "Times New Roman";
            font-weight: initial;
        }
        h6.text-white.text-capitalize.ps-3 {
    text-align: center;
    background: #ff087a;
    color: white;
    font-size: 20px;
    padding-top: 10px;
    padding-bottom: 10px;
    padding-left: 30px;
    padding-right: 30px;
    border-radius: 10px;
}
span.text-alert.text-red\; {
    background: red;
    padding: 10px;
    border-radius: 10px;
    color: white;
}
    </style>

    <!-- End Navbar -->
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card my-4">
                    <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                        <div style="height: 70px" class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">

                            <h6 style="float: left; margin-right: 20px" class="text-white text-capitalize ps-3">Danh Sách Bài Viết</h6>
                            <?php

                            $message = Session::get('message');
                            if ($message) {
                                echo '<span class="text-alert text-red;">' . $message . '</span>';
                                Session::put('message', null);
                            }
                            ?>
                        </div>
                    </div>
                    <div class="card-body px-0 pb-2">
                        <div class="table-responsive p-0">
                            <table class="table align-items-center mb-0">
                                <thead>
                                <tr>
                                    <th style="color: black"
                                        class="">Tên slide
                                    </th>
                                    <th style="color: black"
                                        class="">Hình ảnh
                                    </th>

                                    <th style="color: black"
                                        class="">Trạng
                                        thái
                                    </th>
                                    <th style="color: black" class="text-secondary opacity-7"></th>

                                </tr>
                                </thead>
                                <tbody>
                                @foreach($all_blog as $key => $blog)
                                    <tr>
                                        <td style="text-align: center;color: black">{{ $blog->blog_name }}</td>
                                        <td><img src="public/uploads/blog/{{ $blog->blog_image }}" height="250"
                                                 width="400"></td>
                                        <td style="text-align: center">

                                            <a onclick="return confirm('Bạn có chắc là muốn xóa slide này ko?')"
                                               href="{{URL::to('/delete-blog/'.$blog->blog_id)}}"
                                               class="active styling-edit" ui-toggle-class="">
                                                <i class="fa fa-times text-danger text"></i>
                                            </a>

                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
