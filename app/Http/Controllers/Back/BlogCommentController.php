<?php

namespace App\Http\Controllers\Back;


use App\Models\Back\Blog;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Back\Admin;
use App\Models\Back\BlogCategory;
use App\Models\Back\BlogComment;
use Illuminate\Support\Carbon;

class BlogCommentController extends Controller
{
    public function create($id)
    {
        $find = Blog::where('id', $id)->first();
        $author = Admin::where('status', 1)->get();
        return view('back.blog_comment.add', compact('find', 'author'));
    }

    public function store(Request $request, $id)
    {
        $this->validate($request , [
            'comment' => 'required',
            'author' => 'required',
        ],[
            'comment.required' => 'التعليق مطلوب',
            'author.required' => 'كاتب التعليق مطلوب',
        ]);

        $data = [
            'blog' => $id,
            'comment' => request('comment'),
            'author' => request('author'),
            'status' => request('status')
        ];

        BlogComment::create($data);
    }

    public function show($id)
    {
        $find = BlogComment::where('id' , $id)->first();
        return view('back.blog_comment.show', compact('find'));
    }

    public function edit($id)
    {
        $find = BlogComment::where('id', $id)->first();
        $author = Admin::where('status', 1)->get();

        return view('back.blog_comment.edit', compact('author', 'find'));
    }

    public function update(Request $request, $id)
    {
        $find = BlogComment::where('id', $id)->first();
        
        $this->validate($request , [
            'comment' => 'required',
            'author' => 'required',
        ],[
            'comment.required' => 'التعليق مطلوب',
            'author.required' => 'كاتب التعليق مطلوب',
        ]);

        $data = [
            'comment' => request('comment'),
            'author' => request('author'),
            'status' => request('status')
        ];

        $find->update($data);

    }

    public function destroy($id)
    {
        BlogComment::where('id', $id)->delete();
    }

    public function destroy_all_comment($id)
    {
        BlogComment::where("blog" , $id)->delete();
    }
}