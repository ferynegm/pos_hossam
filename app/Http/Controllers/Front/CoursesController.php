<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Back\Courses;
use App\Models\Back\CourseLangs;
use App\Models\Back\Teacher;
use Illuminate\Http\Request;

class CoursesController extends Controller
{
    public function index()
    {
        $all_courses = Courses::where('status', 1)->orderBy('id', 'DESC')->paginate(12);
        $courses_langs = CourseLangs::orderBy('id', 'DESC')->get();

        return view('front.courses.index', compact('all_courses', 'courses_langs'));
    }

    public function course_details($id)
    {
        $course_details = Courses::where('id', $id)->first();
        if($course_details == null){
            return view("front.404");
        }else{
            $langs_explode = explode('|', $course_details['langs_filter']);
            $ages_explode = explode('|', $course_details['ages_filter']);
            $stages_explode = explode('|', $course_details['stages_filter']);
            
            $related_courses = Courses::where('langs_filter', $course_details['langs_filter'])
                                        ->where('ages_filter', $course_details['ages_filter'])    
                                        ->where('stages_filter', $course_details['stages_filter'])    
                                        ->where('id', '!=', $id)
                                        ->take(5)
                                        ->get();
    
            return view('front.courses.course_details', compact('course_details', 'langs_explode', 'ages_explode', 'stages_explode', 'related_courses'));
        }

    }
    
    // courses_by_lang_filter
    public function courses_by_lang_filter($id)
    {
        $courses_by_lang_filter = Courses::orderBy('id', 'DESC')->where('langs_filter', 'like', '%'.$id.'%')
                                    ->paginate(6);
        $courses_langs = CourseLangs::orderBy('id', 'DESC')->get();
        $course_by_lang_filter_name = $id;

        return view('front.courses.courses_by_lang_filter', compact('courses_by_lang_filter', 'courses_langs', 'course_by_lang_filter_name'));
    }

    // courses_by_age_filter
    public function courses_by_age_filter($id)
    {
        $courses_by_age_filter = Courses::orderBy('id', 'DESC')->where('ages_filter', 'like', '%'.$id.'%')
                                    ->paginate(6);
        $courses_langs = CourseLangs::orderBy('id', 'DESC')->get();
        $course_by_age_filter_name = $id;

        return view('front.courses.courses_by_age_filter', compact('courses_by_age_filter', 'courses_langs', 'course_by_age_filter_name'));
    }

    // courses_by_stage_filter
    public function courses_by_stage_filter($id)
    {
        $courses_by_stage_filter = Courses::orderBy('id', 'DESC')->where('stages_filter', 'like', '%'.$id.'%')
                                    ->paginate(6);
        $courses_langs = CourseLangs::orderBy('id', 'DESC')->get();
        $course_by_stage_filter_name = $id;

        return view('front.courses.courses_by_stage_filter', compact('courses_by_stage_filter', 'courses_langs', 'course_by_stage_filter_name'));
    }

    // courses_by_teachers
    public function courses_by_teachers($id)
    {
        $courses_by_teachers = Courses::orderBy('id', 'DESC')->where('teacher', $id)
                                    ->paginate(6);
        $courses_langs = CourseLangs::orderBy('id', 'DESC')->get();
        $course_by_teachers_name = Teacher::groupBy('group_id')->where('group_id', $id)->first();

        return view('front.courses.courses_by_teachers', compact('courses_by_teachers', 'courses_langs', 'course_by_teachers_name'));
    }



}
