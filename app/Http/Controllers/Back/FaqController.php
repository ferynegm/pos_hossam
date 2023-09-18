<?php

namespace App\Http\Controllers\Back;

use App\Models\Back\Faq;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;

class FaqController extends Controller
{
    public function index()
    {
        return view('back.faq.index');
    }

    public function create()
    {
        $latest_order = Faq::orderBy('order', 'DESC')->first();
        return view('back.faq.add', compact('latest_order'));
    }

    public function store(Request $request)
    {
        $this->validate($request , [
            'order' => 'required',
            'title' => 'required',
            'description' => 'required',
        ],[
            'order.required' => 'رقم الترتيب مطلوب',
            'title.required' => 'العنوان مطلوب',
            'description.required' => 'الوصف مطلوب',
        ]);

        $data = [
            'order' => request('order'),
            'title' => request('title'),
            'description' => request('description')
        ];

        Faq::create($data);
    }

    public function edit($id)
    {
        $find = Faq::where('id' , $id)->first();
        return view('back.faq.edit', compact('find'));
    }

    public function update(Request $request, $id)
    {
        $find = Faq::where('id', $id)->first();
        
        $this->validate($request , [
            'order' => 'required',
            'title' => 'required',
            'description' => 'required',
        ],[
            'order.required' => 'رقم الترتيب مطلوب',
            'title.required' => 'العنوان مطلوب',
            'description.required' => 'الوصف مطلوب',
        ]);

        $data = [
            'order' => request('order'),
            'title' => request('title'),
            'description' => request('description')
        ];

        $find->update($data);
    }

    public function destroy($id)
    {
        Faq::where('id', $id)->delete();
    }







    ///////////////////////////////////////////////  datatable_faq  /////////////////////////////////////////////////////////
    /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    public function datatable_faq()
    {
        $all = Faq::orderBy('order', 'ASC')->get();
        return DataTables::of($all)
        ->addColumn('order', function($res){
            return "<div style='font-weight: bold;font-size: 17px;text-align: center;'>".$res->order."</div>";
        })
        ->addColumn('review', function($res){
            return "<div style='width: 100%;text-align: center;'>".$res->review."</div>";
        })
        ->addColumn('action', function($res){                            
            $buttons = '<a class="btn btn-outline-success btn-sm edit bt_modal" title="Edit" act="'.url('admin/faq/edit/'.$res->id).'"  data-bs-toggle="offcanvas" data-bs-target="#offcanvasWithBothOptions" aria-controls="offcanvasWithBothOptions">
                <i class="fas fa-pencil-alt"></i>
            </a>';

            $buttons .= '<a class="btn btn-outline-danger btn-sm delete" loop_id="'.$res->id.'">
                <i class="fas fa-trash-alt"></i>
            </a>';

            return $buttons;
        })
        ->rawColumns(['order', 'review', 'action'])
        ->make(true);
    }

}
