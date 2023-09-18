<?php

namespace App\Http\Controllers\Back;

use App\Models\Back\FeedbackAboutTeacher;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Back\Teacher;
use Illuminate\Support\Facades\File;
use Yajra\DataTables\Facades\DataTables;

class FeedbackAboutTeacherController extends Controller
{
    public function index()
    {
        $all_teacher_feedback = FeedbackAboutTeacher::all();
        return view('back.teacher_feedback.index', compact('all_teacher_feedback'));
    }

    public function create()
    {
        $all_teacher = Teacher::groupBy('group_id')->where('status', 1)->orderBy('id', 'DESC')->get();
        return view('back.teacher_feedback.add', compact('all_teacher'));
    }

    public function store(Request $request)
    {
        // dd(request('teacher'));
        $this->validate($request , [
            'teacher' => 'required',
            'image' => 'required|mimes:jpeg,png,jpg,gif',
        ],[
            'teacher.required' => 'قيمة المدرس مطلوبة',
            'image.required' => 'قيمة الصورة مطلوبة',
            'image.mimes' => 'يجب أن يكون الملف عبارة عن صورة من نوع : jpeg, png, jpg, gif',
        ]);

        $file = request('image');
        $name = time() . '.' .$file->getClientOriginalExtension();
        $path = public_path('back/images/teacher_feedback');
        $file->move($path , $name);

        $data = [
            'teacher' => request('teacher'),
            'image' => $name,
        ];

        FeedbackAboutTeacher::create($data);
    }

    public function show($id)
    {
        $find = FeedbackAboutTeacher::where('teacher' , $id)->get();
        $teacher_name = FeedbackAboutTeacher::where('teacher' , $id)->first();
        $count = FeedbackAboutTeacher::where('teacher' , $id)->count();
        return view('back.teacher_feedback.show', compact('find', 'teacher_name', 'count'));
    }

    public function edit($id)
    {
        $find = FeedbackAboutTeacher::where('id' , $id)->first();
        $all_teacher = Teacher::all();

        return view('back.teacher_feedback.edit', compact('find', 'all_teacher'));
    }

    public function update(Request $request, $id)
    {
        $find = FeedbackAboutTeacher::where('id', $id)->first();
        
        $this->validate($request , [
            'teacher' => 'required',
            'image' => 'mimes:jpeg,png,jpg,gif',
        ],[
            'teacher.required' => 'قيمة المدرس مطلوبة',
            'image.mimes' => 'يجب أن يكون الملف عبارة عن صورة من نوع : jpeg, png, jpg, gif',
        ]);

        if(request('image') == ""){
            $name = request("image_hidden");
        }else{
            $file = request('image');
            $name = time() . '.' .$file->getClientOriginalExtension();
            $path = public_path('back/images/teacher_feedback');
            $file->move($path , $name);
            
            File::delete(public_path('back/images/teacher_feedback/'.$find['image']));
        }

        $data = [
            'teacher' => request('teacher'),
            'image' => $name,
        ];

        $find->update($data);
    }

    public function destroy($id)
    {
        $find = FeedbackAboutTeacher::where('id', $id)->first();
        $find->delete();
        File::delete(public_path('back/images/teacher_feedback/'.$find['image']));
    }

    public function destroy_all_feedback_to_teacher($id)
    {
        $find = FeedbackAboutTeacher::where('teacher', $id)->get();
        FeedbackAboutTeacher::where('teacher', $id)->delete();

        foreach($find as $image){
            File::delete(public_path('back/images/teacher_feedback/'.$image['image']));
        }
    }






    ///////////////////////////////////////////////  datatable_teacher_feedback  /////////////////////////////////////////////////////////
    /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    public function datatable_teacher_feedback()
    {
        $all = FeedbackAboutTeacher::all();
        return DataTables::of($all)
        ->addColumn('teacher', function($res){
            return "
                <a style='margin: 0px 5px;font-weight: bold;font-size: 15px;' href='".url('admin/teacher_feedback/show/'.$res->teacher)."'>"
                    .$res->teacher_name['name'].
                "</a>
            ";
        })
        ->addColumn('image', function($res){
            $image ='
                <a class="spotlight" href="'.url('back/images/teacher_feedback/'.$res->image).'">
                    <img src="'.url('back/images/teacher_feedback/'.$res->image).'" style="width: 50px;height: 50px;border-radius: 50%;margin: 10px auto;display: block;">
                </a>
            ';
            return $image;
        })
        ->addColumn('action', function($res){
            $buttons = '<a class="btn btn-outline-success btn-sm edit bt_modal" title="Edit" act="'.url('admin/teacher_feedback/edit/'.$res->id).'" data-bs-toggle="offcanvas" data-bs-target="#offcanvasWithBothOptions" aria-controls="offcanvasWithBothOptions">
                <i class="fas fa-pencil-alt"></i>
            </a>';
            
            $buttons .= '<a class="btn btn-outline-danger btn-sm delete" loop_id="'.$res->id.'">
                <i class="fas fa-trash-alt"></i>
            </a>';
            
            return $buttons;
        })
        ->rawColumns(['teacher', 'image', 'action'])
        ->make(true);
    }

}
