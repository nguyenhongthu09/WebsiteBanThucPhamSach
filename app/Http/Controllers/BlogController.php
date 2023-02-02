<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Slider;
use App\Blog;
use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use DB;

class BlogController extends Controller
{
    public function AuthLogin(){
        $admin_id = Session::get('admin_id');
        if($admin_id){
            return Redirect::to('dashboard');
        }else{
            return Redirect::to('admin')->send();
        }
    }
    public function show_blog(){
        // return view('pages.Blog.show_blog');
        $cate_product = DB::table('tbl_category_product')->where('category_status','0')->orderby('category_id','desc')->get();
        $brand_product = DB::table('tbl_brand')->where('brand_status','0')->orderby('brand_id','desc')->get();
        $slider = Slider::orderBy('slider_id','DESC')->where('slider_status','1')->take(4)->get();
        $all_blog = DB::table('tbl_blog')->orderby(DB::raw('RAND()'))->paginate(8);
        return view('pages.blog.show_blog')->with('all_blog',$all_blog)->with('category',$cate_product)->with('brand',$brand_product)->with('slider',$slider);
    }
    public function manage_blog(){
        $all_blog= Blog::orderBy('blog_id','DESC')->paginate(2);
        return view('admin.blog.list_blog')->with(compact('all_blog'));
    }
    public function add_blog(){
        return view('admin.blog.add_blog');
    }
    public function save_blog(Request $request){

        $this->AuthLogin();

        $data = $request->all();
        $get_image = request('blog_image');

        if($get_image){
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.',$get_name_image));
            $new_image =  $name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();
            $get_image->move('public/uploads/blog', $new_image);

            $blog = new Blog();
            $blog->blog_name = $data['blog_name'];
            $blog->blog_image = $new_image;
            $blog->blog_desc = $data['blog_desc'];
            $blog->blog_title = $data['blog_title'];
            $blog->save();
            Session::put('message','Thêm Blog thành công');
            return Redirect::to('manage-blog');
        }else{
            Session::put('message','Làm ơn thêm hình ảnh');
            return Redirect::to('add-blog');
        }
    }
        public function delete_blog(Request $request, $blog_id){
            $blog = Blog::find($blog_id);
            $blog->delete();
            Session::put('message','Xóa slider thành công');
            return redirect()->back();

        }

    public function unactive_slide($blog_id){
        $this->AuthLogin();
        DB::table('tbl_blog')->where('blog_id',blog_id)->update(['slider_status'=>0]);
        Session::put('message','Không kích hoạt Blog thành công');
        return Redirect::to('manage-blog');

    }
    public function active_slide($slide_id){
        $this->AuthLogin();
        DB::table('tbl_blog')->where('blog_id',blog_id)->update(['slider_status'=>1]);
        Session::put('message','Kích hoạt Blog thành công');
        return Redirect::to('manage-blog');

    }
}
