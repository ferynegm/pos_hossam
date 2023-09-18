<?php

namespace App\Http\Controllers\Back;

use DB;
use Illuminate\Support\Facades\Hash;
use Session;
use App\Models\Back\Teacher;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Yajra\DataTables\Facades\DataTables;

class TeacherController extends Controller
{
    public function index()
    {
        return view('back.teacher.index');
    }

    public function create()
    {
        return view('back.teacher.add');
    }

    public function store(Request $request)
    {
        $this->validate($request , [
            'name' => 'required|unique:teachers,name',
            'job' => 'required',
        ],[
            'name.required' => 'الإسم مطلوب',
            'name.unique' => 'الإسم مستخدم من قبل',
            'job.required' => 'إسم الوظيفة مطلوب',
        ]);

        $last_group_id = Teacher::orderBy('group_id' , 'DESC')->first();
        $group_id = 1;

        if(request('image') == ""){
            $name = "df_image.png";
        }else{
            $file = request('image');
            $name = rand(1,1000) . '.' .$file->getClientOriginalName();
            $path = public_path('back/images/teachers');
            $file->move($path , $name);
        }

        for($i = 0; $i < count(request('video_link')); $i++){   
            $data[] = [
                'group_id' => $last_group_id == '' ? $group_id : $last_group_id['group_id']+1,
                'name' => request('name'),
                'job' => request('job'),
                'video_link' => request('video_link')[$i],
                'video_desc' => request('video_desc')[$i],
                'image' => $name,
                'description' => request('description'),
                'status' => request('status'),
                'gender' => request('gender'),
            ];
        }

        Teacher::insert($data);

        return redirect()->to('admin/teacher');
    }

    public function show($id)
    {
        $find = Teacher::where('id' , $id)->first();
        $videos_explode = explode('|', $find['samples']);
        return view('back.teacher.show', compact('find', 'videos_explode'));
    }

    public function edit($id)
    {
        $find = Teacher::where('group_id' , $id)->first();
        $find_all = Teacher::where('group_id' , $id)->get();
        return view('back.teacher.edit', compact('find', 'find_all'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request , [
            'name' => 'required',
            'job' => 'required',
        ],[
            'name.required' => 'الإسم مطلوب',
            'name.unique' => 'الإسم مستخدم من قبل',
            'job.required' => 'إسم الوظيفة مطلوب',
        ]);

        if(request('image') == ""){
            $name = request('image_hidden');
        }else{
            $file = request('image');
            $name = rand(1,1000) . '.' .$file->getClientOriginalName();
            $path = public_path('back/images/teachers');
            $file->move($path , $name);
        }

        if(request('video_link') != null){
            $remove_group_id = Teacher::where('group_id' , $id)->delete();
            for($i = 0; $i < count(request('video_link')); $i++){   
                $data[] = [
                    'group_id' => $id,
                    'name' => request('name'),
                    'job' => request('job'),
                    'video_link' => request('video_link')[$i],
                    'video_desc' => request('video_desc')[$i],
                    'image' => $name,
                    'description' => request('description'),
                    'status' => request('status'),
                    'gender' => request('gender'),
                ];
            }
                Teacher::insert($data);
                return redirect()->to('admin/teacher');
        }else{
            Teacher::where('group_id', $id)->update([
                // 'group_id' => $id,
                'name' => request('name'),
                'job' => request('job'),
                'video_link' => null,
                'video_desc' => null,
                'image' => $name,
                'description' => request('description'),
                'status' => request('status'),
                'gender' => request('gender'),
            ]);

            return redirect()->to('admin/teacher');
        }
    }

    public function destroy($id, Request $request)
    {
        $find = Teacher::where('group_id', $id)->first();

        File::delete(public_path('back/images/teachers/'.$find['image']));
        $find->delete();

    }







    ///////////////////////////////////////////////  datatable_teacher  /////////////////////////////////////////////////////////
    /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    public function datatable_teacher()
    {
        $all = Teacher::groupBy('group_id')->get();
        return DataTables::of($all)
        ->addColumn('image', function($res){
            if($res->image != 'df_image.png') {
                return '
                    <a class="spotlight" href="'.url('back/images/teachers/'.$res->image).'">
                        <img src="'.url('back/images/teachers/'.$res->image).'" style="width: 50px;height: 50px;border-radius: 50%;margin: 10px auto;display: block;">
                    </a>
                ';
            }elseif($res->gender == 1){
                return '
                    <a class="spotlight" href="'.url('back/images/teachers/male.png').'">
                        <img src="'.url('back/images/teachers/male.png').'" style="width: 50px;height: 50px;border-radius: 50%;margin: 10px auto;display: block;">
                    </a>
                ';
            }elseif($res->gender == 0){
                return '
                    <a class="spotlight" href="'.url('back/images/teachers/female.png').'">
                        <img src="'.url('back/images/teachers/female.png').'" style="width: 50px;height: 50px;border-radius: 50%;margin: 10px auto;display: block;">
                    </a>
                ';
            }
        })
        ->addColumn('name', function($res){
            return "
                <p style='color:#24ABF2;margin: 0px 5px;font-weight: bold;font-size: 15px;'>"
                    .$res->name.
                "</p>
            ";
        })
        ->addColumn('description', function($res){
            return $res->job;
        })
        ->addColumn('gender', function($res){
            $gender = $res->gender == 1 ? '<i class="fa fa-male" style="font-size:18px;color: #54ca68;"></i>'  : '<i class="fa fa-female" style="font-size:18px;color: #f97a80;"></i>';
            return $gender;
        })
        ->addColumn('status', function($res){
            if($res->status == 1){
                return "<i class='far fa-check-circle' style='font-size:18px;color: #54ca68;margin: 3px 5px'></i>";
            }else{
                return "<i class='far fa-times-circle' style='font-size:18px;color: #f97a80;margin: 3px 5px'></i>";
            }
        })
        ->addColumn('action', function($res){
            $buttons = '<a href="'.url('admin/teacher/edit/'.$res->group_id).'" class="btn btn-outline-success btn-sm">
                <i class="fas fa-pencil-alt"></i>
            </a>';
            
            // $buttons .= '<a class="btn btn-outline-info btn-sm" href="'.url('admin/teacher/show/'.$res->group_id).'" style="margin: 0px 5px 0px 0px;">
            //     <i class="fas fa-eye"></i>
            // </a>';

            $buttons .= '<a class="btn btn-outline-danger btn-sm delete" loop_id="'.$res->group_id.'">
                <i class="fas fa-trash-alt"></i>
            </a>';
                        
            return $buttons;
        })
        ->rawColumns(['image', 'name', 'job', 'gender', 'status', 'action'])
        ->make(true);
    }
}
