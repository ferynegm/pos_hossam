<?php

namespace App\Http\Controllers\Back;

use App\Models\Back\RolesPermissions;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Session;
use Hash;
use DB;

class RolesPermissionsController extends Controller
{
    public function index()
    {
        // $all_roles_permissions = RolesPermissions::all();
        // , compact('all_roles_permissions')
        return view('back.roles_permissions.index');

    }

    public function create()
    {
        // $find = RolesPermissions::orderBy('id', 'DESC')->first();
        // $regions = Region::orderBy('id', 'ASC')->where('status', 1)->get();
        // , compact('find', 'regions')
        return view('back.roles_permissions.add');
    }

    public function store(Request $request)
    {
        $this->validate($request , [
            'role_name' => 'required|unique:roles_permissions,role_name',
        ],[
            'role_name.required' => 'الإسم مطلوب',
            'role_name.unique' => 'الإسم مكرر',
        ]);

        $data = [
            'role_name' => request('role_name'),
            'admins_create' => request('admins_create') === null ? 0 : 1,
            'admins_update' => request('admins_update') === null ? 0 : 1,
            'admins_view' => request('admins_view') === null ? 0 : 1,
            'admins_delete' => request('admins_delete') === null ? 0 : 1,
            'admins_change_password' => request('admins_change_password') === null ? 0 : 1,
            'teachers_create' => request('teachers_create') === null ? 0 : 1,
            'teachers_update' => request('teachers_update') === null ? 0 : 1,
            'teachers_view' => request('teachers_view') === null ? 0 : 1,
            'teachers_delete' => request('teachers_delete') === null ? 0 : 1,
            'teacher_feedback_create' => request('teacher_feedback_create') === null ? 0 : 1,
            'teacher_feedback_update' => request('teacher_feedback_update') === null ? 0 : 1,
            'teacher_feedback_view' => request('teacher_feedback_view') === null ? 0 : 1,
            'teacher_feedback_delete' => request('teacher_feedback_delete') === null ? 0 : 1,
            'about_acadmy_create' => request('about_acadmy_create') === null ? 0 : 1,
            'about_acadmy_update' => request('about_acadmy_update') === null ? 0 : 1,
            'about_acadmy_view' => request('about_acadmy_view') === null ? 0 : 1,
            'about_acadmy_delete' => request('about_acadmy_delete') === null ? 0 : 1,
            'table_prices_create' => request('table_prices_create') === null ? 0 : 1,
            'table_prices_update' => request('table_prices_update') === null ? 0 : 1,
            'table_prices_view' => request('table_prices_view') === null ? 0 : 1,
            'table_prices_delete' => request('table_prices_delete') === null ? 0 : 1,
            'blog_category_create' => request('blog_category_create') === null ? 0 : 1,
            'blog_category_update' => request('blog_category_update') === null ? 0 : 1,
            'blog_category_view' => request('blog_category_view') === null ? 0 : 1,
            'blog_category_delete' => request('blog_category_delete') === null ? 0 : 1,
            'blog_create' => request('blog_create') === null ? 0 : 1,
            'blog_update' => request('blog_update') === null ? 0 : 1,
            'blog_view' => request('blog_view') === null ? 0 : 1,
            'blog_comment' => request('blog_comment') === null ? 0 : 1,
            'blog_delete' => request('blog_delete') === null ? 0 : 1,
            'langs_course_create' => request('langs_course_create') === null ? 0 : 1,
            'langs_course_update' => request('langs_course_update') === null ? 0 : 1,
            'langs_course_view' => request('langs_course_view') === null ? 0 : 1,
            'langs_course_delete' => request('langs_course_delete') === null ? 0 : 1,
            'courses_create' => request('courses_create') === null ? 0 : 1,
            'courses_update' => request('courses_update') === null ? 0 : 1,
            'courses_view' => request('courses_view') === null ? 0 : 1,
            'courses_delete' => request('courses_delete') === null ? 0 : 1,
            'facebook_reviews_create' => request('facebook_reviews_create') === null ? 0 : 1,
            'facebook_reviews_view' => request('facebook_reviews_view') === null ? 0 : 1,
            'facebook_reviews_delete' => request('facebook_reviews_delete') === null ? 0 : 1,
            'faq_create' => request('faq_create') === null ? 0 : 1,
            'faq_update' => request('faq_update') === null ? 0 : 1,
            'faq_view' => request('faq_view') === null ? 0 : 1,
            'faq_delete' => request('faq_delete') === null ? 0 : 1,
            'privacy_policy_update' => request('privacy_policy_update') === null ? 0 : 1,
            'privacy_policy_view' => request('privacy_policy_view') === null ? 0 : 1,
            'policy_to_parent_update' => request('policy_to_parent_update') === null ? 0 : 1,
            'policy_to_parent_view' => request('policy_to_parent_view') === null ? 0 : 1,
            'policy_to_teacher_update' => request('policy_to_teacher_update') === null ? 0 : 1,
            'policy_to_teacher_view' => request('policy_to_teacher_view') === null ? 0 : 1,
            'settings_update' => request('settings_update') === null ? 0 : 1,
            'settings_view' => request('settings_view') === null ? 0 : 1,
            'settings_delete' => request('settings_delete') === null ? 0 : 1,
            'permissions_create' => request('permissions_create') === null ? 0 : 1,
            'permissions_update' => request('permissions_update') === null ? 0 : 1,
            'permissions_view' => request('permissions_view') === null ? 0 : 1,
            'permissions_delete' => request('permissions_delete') === null ? 0 : 1,
        ];

        RolesPermissions::create($data);
        
        return redirect()->to('admin/roles_permissions');
    }

    public function edit($id)
    {
        $find = RolesPermissions::where('id', $id)->first();
        return view('back.roles_permissions.edit', compact('find'));
    }

    public function update(Request $request, $id)
    {
        $find = RolesPermissions::findOrFail($id);

        $this->validate($request , [
            'role_name' => 'required|unique:roles_permissions,role_name,'.$id,
        ],[
            'role_name.required' => 'الإسم مطلوب',
            'role_name.unique' => 'الإسم مكرر',
        ]);


        $data = [
            'role_name' => request('role_name'),
            'admins_create' => request('admins_create') === null ? 0 : 1,
            'admins_update' => request('admins_update') === null ? 0 : 1,
            'admins_view' => request('admins_view') === null ? 0 : 1,
            'admins_delete' => request('admins_delete') === null ? 0 : 1,
            'admins_change_password' => request('admins_change_password') === null ? 0 : 1,
            'teachers_create' => request('teachers_create') === null ? 0 : 1,
            'teachers_update' => request('teachers_update') === null ? 0 : 1,
            'teachers_view' => request('teachers_view') === null ? 0 : 1,
            'teachers_delete' => request('teachers_delete') === null ? 0 : 1,
            'teacher_feedback_create' => request('teacher_feedback_create') === null ? 0 : 1,
            'teacher_feedback_update' => request('teacher_feedback_update') === null ? 0 : 1,
            'teacher_feedback_view' => request('teacher_feedback_view') === null ? 0 : 1,
            'teacher_feedback_delete' => request('teacher_feedback_delete') === null ? 0 : 1,
            'about_acadmy_create' => request('about_acadmy_create') === null ? 0 : 1,
            'about_acadmy_update' => request('about_acadmy_update') === null ? 0 : 1,
            'about_acadmy_view' => request('about_acadmy_view') === null ? 0 : 1,
            'about_acadmy_delete' => request('about_acadmy_delete') === null ? 0 : 1,
            'table_prices_create' => request('table_prices_create') === null ? 0 : 1,
            'table_prices_update' => request('table_prices_update') === null ? 0 : 1,
            'table_prices_view' => request('table_prices_view') === null ? 0 : 1,
            'table_prices_delete' => request('table_prices_delete') === null ? 0 : 1,
            'blog_category_create' => request('blog_category_create') === null ? 0 : 1,
            'blog_category_update' => request('blog_category_update') === null ? 0 : 1,
            'blog_category_view' => request('blog_category_view') === null ? 0 : 1,
            'blog_category_delete' => request('blog_category_delete') === null ? 0 : 1,
            'blog_create' => request('blog_create') === null ? 0 : 1,
            'blog_update' => request('blog_update') === null ? 0 : 1,
            'blog_view' => request('blog_view') === null ? 0 : 1,
            'blog_comment' => request('blog_comment') === null ? 0 : 1,
            'blog_delete' => request('blog_delete') === null ? 0 : 1,
            'langs_course_create' => request('langs_course_create') === null ? 0 : 1,
            'langs_course_update' => request('langs_course_update') === null ? 0 : 1,
            'langs_course_view' => request('langs_course_view') === null ? 0 : 1,
            'langs_course_delete' => request('langs_course_delete') === null ? 0 : 1,
            'courses_create' => request('courses_create') === null ? 0 : 1,
            'courses_update' => request('courses_update') === null ? 0 : 1,
            'courses_view' => request('courses_view') === null ? 0 : 1,
            'courses_delete' => request('courses_delete') === null ? 0 : 1,
            'facebook_reviews_create' => request('facebook_reviews_create') === null ? 0 : 1,
            'facebook_reviews_view' => request('facebook_reviews_view') === null ? 0 : 1,
            'facebook_reviews_delete' => request('facebook_reviews_delete') === null ? 0 : 1,
            'faq_create' => request('faq_create') === null ? 0 : 1,
            'faq_update' => request('faq_update') === null ? 0 : 1,
            'faq_view' => request('faq_view') === null ? 0 : 1,
            'faq_delete' => request('faq_delete') === null ? 0 : 1,
            'privacy_policy_update' => request('privacy_policy_update') === null ? 0 : 1,
            'privacy_policy_view' => request('privacy_policy_view') === null ? 0 : 1,
            'policy_to_parent_update' => request('policy_to_parent_update') === null ? 0 : 1,
            'policy_to_parent_view' => request('policy_to_parent_view') === null ? 0 : 1,
            'policy_to_teacher_update' => request('policy_to_teacher_update') === null ? 0 : 1,
            'policy_to_teacher_view' => request('policy_to_teacher_view') === null ? 0 : 1,
            'settings_update' => request('settings_update') === null ? 0 : 1,
            'settings_view' => request('settings_view') === null ? 0 : 1,
            'settings_delete' => request('settings_delete') === null ? 0 : 1,
            'permissions_create' => request('permissions_create') === null ? 0 : 1,
            'permissions_update' => request('permissions_update') === null ? 0 : 1,
            'permissions_view' => request('permissions_view') === null ? 0 : 1,
            'permissions_delete' => request('permissions_delete') === null ? 0 : 1,
        ];
        
        $find->update($data);
        // return redirect()->to('admin/roles_permissions');
        return redirect()->back();
    }

    public function destroy($id, Request $request)
    {
        RolesPermissions::findOrFail($id)->delete();
    }







    ///////////////////////////////////////////////  datatable_roles_permissions  /////////////////////////////////////////////////////////
    /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    public function datatable_roles_permissions()
    {
        $all = RolesPermissions::all();
        return DataTables::of($all)
        ->addColumn('id', function($res){
            return "<span style='font-weight: bold;'>".$res->id."</span>";
        })
        ->addColumn('name_en', function($res){
            return "<span style='font-weight: bold;'>".$res->role_name."</span>";
        })
        ->addColumn('action', function($res){
            if($res->id == 1){
                $buttons = '<a href="'.url('admin/roles_permissions/edit/'.$res->id).'" class="btn btn-outline-success btn-sm" title="Edit">
                    <i class="fas fa-pencil-alt"></i>
                </a>';
                    
                return $buttons;
            
            }else{
            
                $buttons = '<a href="'.url('admin/roles_permissions/edit/'.$res->id).'" class="btn btn-outline-success btn-sm" title="Edit">
                    <i class="fas fa-pencil-alt"></i>
                </a>';
                
                $buttons .= '<a type="button" class="btn btn-outline-danger btn-sm delete" loop_id="'.$res->id.'"><i class="fas fa-trash-alt font-size-16"></i></a>';
    
                return $buttons;
            }

        })
        ->rawColumns(['id', 'code', 'name_en', 'mobile', 'region', 'manager', 'status', 'action'])
        ->make(true);
    }

}
