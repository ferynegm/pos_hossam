<?php

namespace App\Models\Back;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RolesPermissions extends Model
{
    protected $table = 'roles_permissions';

    protected $fillable = [
        'role_name', 'admins_create', 'admins_update', 'admins_view', 'admins_delete', 'teachers_create', 'teachers_update', 'teachers_view', 'teachers_delete', 'teacher_feedback_create', 'teacher_feedback_update', 'teacher_feedback_view', 'teacher_feedback_delete', 'about_acadmy_create', 'about_acadmy_update', 'about_acadmy_view', 'about_acadmy_delete', 'table_prices_create', 'table_prices_update', 'table_prices_view', 'table_prices_delete', 'blog_category_create', 'blog_category_update', 'blog_category_view', 'blog_category_delete', 'blog_create', 'blog_update', 'blog_view', 'blog_comment', 'blog_delete', 'langs_course_create', 'langs_course_update', 'langs_course_view', 'langs_course_delete', 'courses_create', 'courses_update', 'courses_view', 'courses_delete', 'facebook_reviews_create', 'facebook_reviews_view', 'facebook_reviews_delete', 'faq_create', 'faq_update', 'faq_view', 'faq_delete', 'privacy_policy_update', 'privacy_policy_view', 'policy_to_parent_update', 'policy_to_parent_view', 'policy_to_teacher_update', 'policy_to_teacher_view', 'settings_update', 'settings_view', 'settings_delete', 'permissions_create', 'permissions_update', 'permissions_view', 'permissions_delete', 'admins_change_password'
    ];
}
