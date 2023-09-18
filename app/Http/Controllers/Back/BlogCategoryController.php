<?php

namespace App\Http\Controllers\Back;

use App\Models\Back\BlogCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;

class BlogCategoryController extends Controller
{
    public function index()
    {
        return view('back.blog_category.index');
    }

    public function create()
    {
        return view('back.blog_category.add');
    }

    public function store(Request $request)
    {
        $this->validate($request , [
            'name' => 'required|unique:blog_categories,name'
        ],[
            'name.required' => 'الإسم مطلوب',
            'name.unique' => 'الإسم مستخدم من قبل',
        ]);

        $data = [
            'name' => request('name'),
            'status' => request('status')
        ];

        BlogCategory::create($data);
    }

    public function edit($id)
    {
        $find = BlogCategory::where('id' , $id)->first();
        return view('back.blog_category.edit', compact('find'));
    }

    public function update(Request $request, $id)
    {
        $find = BlogCategory::where('id', $id)->first();
        
        $this->validate($request , [
            'name' => 'required|unique:blog_categories,name,'.$id,
        ],[
            'name.required' => 'الإسم مطلوب',
            'name.unique' => 'الإسم مستخدم من قبل',
        ]);

        $data = [
            'name' => request('name'),
            'status' => request('status')
        ];

        $find->update($data);
    }

    public function destroy($id, Request $request)
    {
        BlogCategory::where('id', $id)->delete();
    }

    public function destroy_selected(Request $request)
    {
        BlogCategory::whereIn("id" , request("delete_selected"))->delete();
    }









    ///////////////////////////////////////////////  datatable_blog_category  /////////////////////////////////////////////////////////
    /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    public function datatable_blog_category()
    {
        $all = BlogCategory::all();
        return DataTables::of($all)
        ->addColumn('name', function($res){
            return $res->name;
        })
        ->addColumn('status', function($res){
            if($res->status == 1){
                return "<i class='far fa-check-circle' style='font-size:18px;color: #54ca68;margin: 3px 5px'></i>";
            }else{
                return "<i class='far fa-times-circle' style='font-size:18px;color: #f97a80;margin: 3px 5px'></i>";
            }
        })
        ->addColumn('action', function($res){
            $buttons = '<a class="btn btn-outline-success btn-sm edit bt_modal" title="Edit" act="'.url('admin/blog_category/edit/'.$res->id).'"  data-bs-toggle="offcanvas" data-bs-target="#offcanvasWithBothOptions" aria-controls="offcanvasWithBothOptions">
                <i class="fas fa-pencil-alt"></i>
            </a>';
            
            $buttons .= '<a class="btn btn-outline-danger btn-sm delete" loop_id="'.$res->id.'">
                <i class="fas fa-trash-alt"></i>
            </a>';
                        
            return $buttons;
        })
        ->rawColumns(['name', 'status', 'action'])
        ->make(true);
    }
}
