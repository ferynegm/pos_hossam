<?php

namespace App\Http\Controllers\Back;

use App\Models\Back\Courses;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Back\CourseLangs;
use App\Models\Back\Teacher;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\File;
use Yajra\DataTables\Facades\DataTables;

class CoursesController extends Controller
{
    public function index()
    {
        return view('back.courses.index');
    }

    public function create()
    {
        $teachers = Teacher::groupBy('group_id')->where('status', 1)->orderBy('id', 'DESC')->get();
        $course_langs = CourseLangs::all();
        return view('back.courses.add', compact('teachers', 'course_langs'));
    }

    public function store(Request $request)
    {
        $this->validate($request , [
            'name' => 'required',
            'description' => 'required',
            'content' => 'required',
            'details' => 'required',
            'sidebar' => 'required',
            'image'=> 'mimes:jpeg,jpg,png,gif',
            'video'=> 'mimes:mp4,mov,ogg | max:200000',
        ],[
            'name.required' => 'اسم الدورة مطلوب',
            'description.required' => 'وصف الدورة مطلوب',
            'content.required' => 'محتوي الدورة مطلوب',
            'details.required' => 'تفاصيل الدورة مطلوب',
            'sidebar.required' => 'محتوي القسم الجانبي للدورة مطلوب',
            'image.mimes' => 'يجب أن يكون الملف عبارة عن صورة من نوع : jpeg ، jpg ، png ، gif',
            'video.mimes' => 'يجب أن يكون الملف عبارة عن فديو من نوع : mp4 ، mov ، ogg',
            'video.max' => 'حجم الفديو كبير',
        ]);

        if(request('image') == ""){
            $name_image = "df_image.png";
        }else{
            $file = request('image');
            $name_image = time() . '.' .$file->getClientOriginalExtension();
            $path = public_path('back/images/courses');
            $file->move($path , $name_image);
        }

        if(request('video') == ""){
            $name_video = null;
        }else{
            $file = request('video');
            $name_video = rand(1,1000) . '.' .$file->getClientOriginalName();
            $path = public_path('back/images/courses');
            $file->move($path , $name_video);
        }

        Courses::create([
            'name' => request('name'),
            'description' => request('description'),
            'teacher' => request('teacher'),
            'whatsapp_teacher' => request('whatsapp_teacher'),
            'image' => $name_image,
            'video' => $name_video,
            'content' => request('content'),
            'details' => request('details'),
            'sidebar' => request('sidebar'),
            'langs_filter' => request('langs_filter') == null ? null : implode('|', request('langs_filter')),
            'ages_filter' => request('ages_filter') == null ? null : implode('|', request('ages_filter')),
            'stages_filter' => request('stages_filter') == null ? null : implode('|', request('stages_filter')),
            'status' => request('status')
        ]);

        return redirect()->to('admin/courses');
    }

    public function show($id)
    {
        $find = Courses::where('id' , $id)->first();
        return view('back.courses.show', compact('find'));
    }

    public function edit($id)
    {
        $find = Courses::where('id' , $id)->first();
        $teachers = Teacher::groupBy('group_id')->where('status', 1)->orderBy('id', 'DESC')->get();
        $course_langs = CourseLangs::all();
        $langs_explode = explode('|', $find['langs_filter']);
        $ages_explode = explode('|', $find['ages_filter']);
        $stages_explode = explode('|', $find['stages_filter']);
        
        return view('back.courses.edit', compact('teachers', 'find', 'course_langs', 'langs_explode', 'ages_explode', 'stages_explode'));
    }

    public function update(Request $request, $id)
    {
        $find = Courses::where('id', $id)->first();
        
        $this->validate($request , [
            'name' => 'required',
            'description' => 'required',
            'content' => 'required',
            'details' => 'required',
            'sidebar' => 'required',
            'image'=> 'mimes:jpeg,jpg,png,gif',
            'video'=> 'mimes:mp4,mov,ogg | max:200000',
        ],[
            'name.required' => 'اسم الدورة مطلوب',
            'description.required' => 'وصف الدورة مطلوب',
            'content.required' => 'محتوي الدورة مطلوب',
            'details.required' => 'تفاصيل الدورة مطلوب',
            'sidebar.required' => 'محتوي القسم الجانبي للدورة مطلوب',
            'image.mimes' => 'يجب أن يكون الملف عبارة عن صورة من نوع : jpeg ، jpg ، png ، gif',
            'video.mimes' => 'يجب أن يكون الملف عبارة عن فديو من نوع : mp4 ، mov ، ogg',
            'video.max' => 'حجم الفديو كبير',
        ]);

        if(request('image') == ""){
            $name_image = request("image_hidden");
        }else{
            $file = request('image');
            $name_image = time() . '.' .$file->getClientOriginalExtension();
            $path = public_path('back/images/courses');
            $file->move($path , $name_image);

            if(request("image_hidden") != "df_image.png"){
                File::delete(public_path('back/images/courses/'.$find['image']));
            }
        }

        if(request('video') == ""){
            $name_video = request("video_hidden");
        }else{
            $file = request('video');
            $name_video = rand(1,1000) . '.' .$file->getClientOriginalName();
            $path = public_path('back/images/courses');
            $file->move($path , $name_video);

            File::delete(public_path('back/images/courses/'.$find['video']));
        }

        $find->update([
            'name' => request('name'),
            'description' => request('description'),
            'teacher' => request('teacher'),
            'whatsapp_teacher' => request('whatsapp_teacher'),
            'image' => $name_image,
            'video' => $name_video,
            'content' => request('content'),
            'details' => request('details'),
            'sidebar' => request('sidebar'),
            'langs_filter' => request('langs_filter') == null ? null : implode('|', request('langs_filter')),
            'ages_filter' => request('ages_filter') == null ? null : implode('|', request('ages_filter')),
            'stages_filter' => request('stages_filter') == null ? null : implode('|', request('stages_filter')),
            'status' => request('status')
        ]);

        return redirect()->to('admin/courses');
    }

    public function destroy($id)
    {
        $find = Courses::where('id', $id)->first();
        if($find['image'] != "df_image.png"){
            File::delete(public_path('back/images/courses/'.$find['image']));
        }
        File::delete(public_path('back/images/courses/'.$find['video']));
        
        $find->delete();
    }

    public function delete_video($id)
    {
        $find = Courses::where('id', $id)->first();
        File::delete(public_path('back/images/courses/'.$find['video']));
        $find->update([
            'video' => null
        ]);

        return redirect()->back();
    }


    ///////////////////////////////////////////////  datatable_courses  /////////////////////////////////////////////////////////
    /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    public function datatable_courses()
    {
        $all = Courses::all();
        return DataTables::of($all)
        ->addColumn('name', function($res){
            return "
                <div style='padding:10px;font-weight: bold;'>".$res->name."</div>
            ";
        })
        ->addColumn('teacher', function($res){
            return "
                <div style='padding:2px;'>
                    <i class='fa fa-user'></i>
                    <span style='margin: 0px 5px;color: blue;font-weight: bold;'>"
                        .$res->teacher_name['name'].
                    "</span>
                </div>
            ";
        })
        ->addColumn('action', function($res){
            $buttons = '<a href="'.url('admin/courses/edit/'.$res->id).'" class="btn btn-outline-success btn-sm" title="Edit">
                <i class="fas fa-pencil-alt"></i>
            </a>';
            

            $buttons .= '<a class="btn btn-outline-danger btn-sm delete" loop_id="'.$res->id.'">
                <i class="fas fa-trash-alt"></i>
            </a>';

            return $buttons;
        })
        ->rawColumns(['name', 'teacher', 'action'])
        ->make(true);
    }













    
    ///////////////////////////////////////////////  langs  /////////////////////////////////////////////////////////
    /////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    public function create_langs()
    {
        return view('back.courses.langs_add');
    }

    public function store_langs(Request $request)
    {
        $this->validate($request , [
            'lang' => 'required',
        ],[
            'lang.required' => 'تصنيف اللغة مطلوب',
        ]);

        $data = [
            'lang' => request('lang'),
        ];

        CourseLangs::create($data);
    }

    public function edit_langs($id)
    {
        $find = CourseLangs::where('id' , $id)->first();
        return view('back.courses.langs_edit', compact('find'));
    }
    
    public function update_langs(Request $request, $id)
    {
        $find = CourseLangs::where('id', $id)->first();
        
        $this->validate($request , [
            'lang' => 'required',
        ],[
            'lang.required' => 'تصنيف اللغة مطلوب',
        ]);

        $data = [
            'lang' => request('lang'),
        ];

        $find->update($data);
    }

    
    public function destroy_langs($id)
    {
        // Courses::where('langs_filter', 'like', '%'.$id.'%')->get()
        CourseLangs::where('id', $id)->delete();
    }

    public function datatable_langs()
    {
        $all = CourseLangs::all();
        return DataTables::of($all)
        ->addColumn('lang', function($res){
            return $res->lang;
        })
        ->addColumn('action', function($res){
            $buttons = '<a class="btn btn-outline-success btn-sm edit bt_modal" title="Edit" act="'.url('admin/courses/langs/edit/'.$res->id).'"  data-bs-toggle="offcanvas" data-bs-target="#offcanvasWithBothOptions" aria-controls="offcanvasWithBothOptions">
                    <i class="fas fa-pencil-alt"></i>
            </a>';
            

            $buttons .= '<a class="btn btn-outline-danger btn-sm delete_langs" loop_id="'.$res->id.'">
                <i class="fas fa-trash-alt"></i>
            </a>';

            return $buttons;
        })
        ->rawColumns(['name', 'teacher', 'action'])
        ->make(true);
    }
}