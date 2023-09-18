<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Back\Blog;
use App\Models\Back\BlogCategory;
use App\Models\Back\BlogComment;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index()
    {
        $all_blogs = Blog::where('status', 1)->orderBy('id', 'DESC')->paginate(8);
        $blog_categories = BlogCategory::orderBy('id', 'DESC')->get();
        $blogs_most_commented = BlogComment::groupBy('blog')
                                ->selectRaw('count(*) as blog')
                                ->get();
        // dd($blogs_most_commented);
        return view('front.blog.index', compact('all_blogs', 'blog_categories'));
    }

    public function blog_details($id)
    {
        $blog_details = Blog::where('id', $id)->first();
        if($blog_details == null){
            return view("front.404");
        }else{
            $related_blogs = Blog::where('id', '!=' , $id)->where('category', $blog_details['category'])->orderBy('id', 'DESC')->take(5)->get();
            $blog_comments = BlogComment::where('blog', $id)->where('status', 1)->orderBy('id', 'DESC')->get();
            return view('front.blog.blog_details', compact('blog_details', 'related_blogs', 'blog_comments'));
        }

    }

    public function blogs_by_category($id)
    {
        $blogs_by_category = Blog::where('category', $id)->where('status', 1)->orderBy('id', 'DESC')->get();
        $category_name = BlogCategory::where('id', $id)->first();
        return view('front.blog.blogs_by_category', compact('blogs_by_category', 'category_name'));
    }

    public function blogs_by_author($id)
    {
        $blogs_by_author = Blog::where('author', $id)->where('status', 1)->orderBy('id', 'DESC')->get();
        return view('front.blog.blogs_by_author', compact('blogs_by_author'));
    }


}
