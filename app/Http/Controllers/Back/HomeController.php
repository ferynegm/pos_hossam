<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use App\Models\Back\Admin;
use App\Models\Back\Blog;
use App\Models\Back\Courses;
use App\Models\Back\Faq;
use App\Models\Back\Teacher;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index(){
        $courses = Courses::orderBy('id', 'DESC')->take(5)->get();
        $blogs = Blog::orderBy('id', 'DESC')->take(5)->get();

        $admins_count = Admin::count();
        $teachers_count = Teacher::count();
        $blogs_count = Blog::count();
        $courses_count = Courses::count();
        $faqs_count = Faq::count();
        return view('back.welcome', compact('courses', 'blogs', 'admins_count', 'teachers_count', 'blogs_count', 'courses_count', 'faqs_count'));
    }
    
    public function login_post(Request $request)
    {
        $request->validate([
            "email" => "required",
            "password" => "required",
        ],[
            'email.required' => 'البريد الإلكتروني مطلوب',
            'password.required' => 'الرقم السري مطلوب',
        ]);

        if(Auth::attempt(['email' => request('email') , 'password' => request('password')])){

            User::where('email', request('email'))->update([
                'last_login_time' => date('Y-m-d H:i'),
            ]);

            return redirect('admin')->with("success_login", "");
        }else{
            session()->put('error_email_or_password', 'من فضلك تأكد من البريد الإلكتروني و الرقم السري');
            return redirect()->back();
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect('admin/login');
    }
}
