<?php

namespace App\Http\Controllers\Back;

use App\Models\Back\Blog;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Back\Admin;
use App\Models\Back\BlogCategory;
use App\Models\Back\BlogComment;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\File;
use Yajra\DataTables\Facades\DataTables;

class BlogController extends Controller
{
    public function index()
    {
        return view('back.blogs.index');
    }

    public function create()
    {
        $categories = BlogCategory::where('status', 1)->get();
        $admins = Admin::where('status', 1)->get();
        return view('back.blogs.add', compact('categories', 'admins'));
    }

    public function store(Request $request)
    {
        $this->validate($request , [
            'title' => 'required',
            'category' => 'required',
            'description' => 'required',
            'image'=> 'mimes:jpeg,jpg,png,gif',
        ],[
            'title.required' => 'عنوان المقال مطلوبة',
            'category.required' => 'تصنيف المقال مطلوبة',
            'description.required' => 'وصف المقال مطلوبة',
            'image.mimes' => 'يجب أن يكون الملف عبارة عن صورة من نوع : jpeg ، jpg ، png ، gif',
        ]);

        if(request('image') == ""){
            $name = "df_image.png";
        }else{
            $file = request('image');
            $name = time() . '.' .$file->getClientOriginalExtension();
            $path = public_path('back/images/blogs');
            $file->move($path , $name);
        }

        $data = [
            'title' => request('title'),
            'description' => request('description'),
            'date' => request('date') == null ? date('Y-m-d h:i') : request('date'),
            'image' => $name,
            'author' => request('author') == null ? auth()->user()->id : request('author'),
            'category' => request('category'),
            'status' => request('status')
        ];

        Blog::create($data);

        return redirect()->to('admin/blogs');
    }

    public function show($id)
    {
        $find = Blog::where('id' , $id)->first();
        return view('back.blogs.show', compact('find'));
    }

    public function edit($id)
    {
        $find = Blog::where('id' , $id)->first();
        $categories = BlogCategory::where('status', 1)->get();
        $admins = Admin::where('status', 1)->get();
        $blog_comments = BlogComment::orderBy('id', 'DESC')->where('blog', $id)->get();
        $blog_comments_length = BlogComment::where('blog', $id)->count();

        return view('back.blogs.edit', compact('categories', 'admins', 'find', 'blog_comments', 'blog_comments_length'));
    }

    public function update(Request $request, $id)
    {
        $find = Blog::where('id', $id)->first();
        
        $this->validate($request , [
            'title' => 'required',
            'category' => 'required',
            'description' => 'required',
            'image'=> 'mimes:jpeg,jpg,png,gif',
        ],[
            'title.required' => 'عنوان المقال مطلوبة',
            'category.required' => 'تصنيف المقال مطلوبة',
            'description.required' => 'وصف المقال مطلوبة',
            'image.mimes' => 'يجب أن يكون الملف عبارة عن صورة من نوع : jpeg ، jpg ، png ، gif',
        ]);

        if(request('image') == ""){
            $name = request("image_hidden");
        }else{
            $file = request('image');
            $name = time() . '.' .$file->getClientOriginalExtension();
            $path = public_path('back/images/blogs');
            $file->move($path , $name);
            
            if(request("image_hidden") != "df_image.png"){
                File::delete(public_path('back/images/blogs/'.$find['image']));
            }
        }

        $data = [
            'title' => request('title'),
            'description' => request('description'),
            'date' => request('date') == null ? date('Y-m-d h:i') : request('date'),
            'image' => $name,
            'author' => request('author') == null ? auth()->user()->id : request('author'),
            'category' => request('category'),
            'status' => request('status')
        ];

        $find->update($data);

        return redirect()->to('admin/blogs');
    }

    public function destroy($id, Request $request)
    {
        $find = Blog::where('id', $id)->first();
        $find->delete();
        BlogComment::where('blog', $id)->delete();

        if($find['image'] != "df_image.png"){
            File::delete(public_path('back/images/blogs/'.$find['image']));
        }
    }

    public function destroy_selected(Request $request)
    {
        $find = Blog::whereIn("id" , request("delete_selected"))->get();
        Blog::whereIn("id" , request("delete_selected"))->delete();

        foreach($find as $images){
            if($images->image != "df_image.png"){
                File::delete(public_path('back/images/blogs/'.$images->image));
            }
        }
    }









    ///////////////////////////////////////////////  datatable_blogs  /////////////////////////////////////////////////////////
    /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    public function datatable_blogs()
    {
        $all = Blog::all();
        return DataTables::of($all)
        // ->addColumn('id', function($res){
        //     return '<form class"form_delete_selected">
        //                 <div class="form-check font-size-16">
        //                     <input class="form-check-input" type="checkbox" id="" name="delete_selected[]" value="'.$res->id.'">
        //                     <label class="form-check-label" for=""></label>
        //                 </div>
        //             </form>';
        // })
        ->addColumn('image', function($res){
            $image ='
                <a class="spotlight" href="'.url('back/images/blogs/'.$res->image).'">
                    <img src="'.url('back/images/blogs/'.$res->image).'" style="width: 50px;height: 50px;border-radius: 50%;margin: 10px auto;display: block;">
                </a>
            ';
            return $image;
        })
        ->addColumn('title', function($res){
            $comment_length = BlogComment::where('blog', $res->id)->count();
            return "
                <p style='margin: 0px 5px;font-size: 15px;'>"
                    .implode(' ', array_slice(explode(' ', $res->title), 0, 8)).
                "</p>

                <p style='margin-top: 10px;color: #F79327;'>
                    <i class='fa fa-comment-alt'></i>
                    <span style='margin: 10px 10px;font-size: 15px;font-weight: bold;'>".$comment_length."</span>
                </p>
            ";
        })
        ->addColumn('description', function($res){
            return "
                <p style='margin: 0px 5px;font-size: 15px;'>"
                    .implode(' ', array_slice(explode(' ', $res->description), 0, 15)).
                "</p>
            ";
        })
        ->addColumn('date', function($res){
            return "
                <div style='padding:2px;'>
                    <i class='fas fa-calendar'></i>
                    <span style='margin: 0px 5px;'>"
                        .Carbon::parse($res->date)->format('Y-m-d').
                    "</span>
                    <br />
                    <i class='fas fa-clock'></i>
                    <span style='margin: 0px 5px;color: red;'>"
                        .Carbon::parse($res->date)->format('h:i a').
                    "</span>
                </div>
            ";
        })
        ->addColumn('author', function($res){
            return "
                <div style='padding:2px;'>
                    <i class='fa fa-user'></i>
                    <span style='margin: 0px 5px;color: blue;font-weight: bold;'>"
                        .$res->author_name['name'].
                    "</span>
                </div>
            ";
        })
        ->addColumn('category', function($res){
            return "
                <div style='padding:2px;'>
                    <span style='margin: 0px 5px;color: #FF2171;font-weight: bold;'>"
                        .$res->category_name['name'].
                    "</span>
                </div>
            ";
        })
        ->addColumn('status', function($res){
            if($res->status == 1){
                return "<i class='far fa-check-circle' style='font-size:18px;color: #54ca68;margin: 3px 5px'></i>";
            }else{
                return "<i class='far fa-times-circle' style='font-size:18px;color: #f97a80;margin: 3px 5px'></i>";
            }
        })
        ->addColumn('action', function($res){
            $buttons = '<a href="'.url('admin/blogs/edit/'.$res->id).'" class="btn btn-outline-success btn-sm" title="Edit">
                <i class="fas fa-pencil-alt"></i>
            </a>';
            
            // $buttons .= '<a href="'.url('admin/blogs/show/'.$res->id).'" class="btn btn-outline-info btn-sm" style="margin: 0px 5px 0px 0px;">
            //     <i class="fas fa-eye"></i>
            // </a>';

            $buttons .= '<a class="btn btn-outline-danger btn-sm delete" loop_id="'.$res->id.'">
                <i class="fas fa-trash-alt"></i>
            </a>';
                    
            $buttons .= '<a act="'.url('admin/blog_comment/create/'.$res->id).'" class="btn btn-primary btn-sm rounded-circle bt_modal" title="comment" data-bs-toggle="offcanvas" data-bs-target="#offcanvasWithBothOptions" aria-controls="offcanvasWithBothOptions">
                <i class="fas fa-comment"></i>
            </a>';

            return $buttons;
        })
        ->rawColumns(['image', 'title', 'description', 'date', 'author', 'category', 'status', 'action'])
        ->make(true);
    }
}