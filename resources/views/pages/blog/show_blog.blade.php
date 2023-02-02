@extends('layout')
@section('content')
    <style>
        .slide-inner.bg-height {
            display: none;}
    </style>
    <div class="blog-area blog-column-2 section-space-y-axis-100">
        <div class="container">
            <div class="row">
                @foreach($all_blog as $key => $blog)
                <div class="col-md-6">
                    <div class="blog-item">
                        <div class="blog-img img-zoom-effect">
                            <a  href="{{URL::to('/chi-tiet/'.$blog->blog_name)}}">
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
@endsection
