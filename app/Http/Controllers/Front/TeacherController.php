<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Back\FeedbackAboutTeacher;
use Illuminate\Http\Request;
use App\Models\Back\Teacher;

class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     public function index()
    {
        $all_teachers = Teacher::groupBy('group_id')->where('status', 1)->orderBy('id', 'DESC')->paginate(9);
        
        return view('front.teachers.index', compact('all_teachers'));
    }

    public function teacher_details($id)
    {
        $teacher_details = Teacher::where('group_id', $id)->first();
        if($teacher_details == null){
            return view("front.404");
        }else{
            $teacher_samples = Teacher::where('group_id', $id)->get();
            $related_teacher = Teacher::groupBy('group_id')->where('group_id', '!=' , $id)->where('job', $teacher_details['job'])->where('status', 1)->orderBy('id', 'DESC')->take(8)->get();
            $teacher_feedback = FeedbackAboutTeacher::where('teacher', $id)->orderBy('id', 'DESC')->get();
            
            return view('front.teachers.teacher_details', compact('teacher_details', 'related_teacher', 'teacher_feedback', 'teacher_samples'));
        }
    }

}
