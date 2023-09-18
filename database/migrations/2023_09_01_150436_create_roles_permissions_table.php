<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRolesPermissionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('roles_permissions', function (Blueprint $table) {
            $table->id();
            $table->string("role_name");
            $table->boolean("admins_create")->default(0);
            $table->boolean("admins_update")->default(0);
            $table->boolean("admins_view")->default(0);
            $table->boolean("admins_delete")->default(0);
            $table->boolean("teachers_create")->default(0);
            $table->boolean("teachers_update")->default(0);
            $table->boolean("teachers_view")->default(0);
            $table->boolean("teachers_delete")->default(0);
            $table->boolean("teacher_feedback_create")->default(0);
            $table->boolean("teacher_feedback_update")->default(0);
            $table->boolean("teacher_feedback_view")->default(0);
            $table->boolean("teacher_feedback_delete")->default(0);
            $table->boolean("about_acadmy_create")->default(0);
            $table->boolean("about_acadmy_update")->default(0);
            $table->boolean("about_acadmy_view")->default(0);
            $table->boolean("about_acadmy_delete")->default(0);
            $table->boolean("table_prices_create")->default(0);
            $table->boolean("table_prices_update")->default(0);
            $table->boolean("table_prices_view")->default(0);
            $table->boolean("table_prices_delete")->default(0);
            $table->boolean("blog_category_create")->default(0);
            $table->boolean("blog_category_update")->default(0);
            $table->boolean("blog_category_view")->default(0);
            $table->boolean("blog_category_delete")->default(0);
            $table->boolean("blog_create")->default(0);
            $table->boolean("blog_update")->default(0);
            $table->boolean("blog_view")->default(0);
            $table->boolean("blog_comment")->default(0);
            $table->boolean("blog_delete")->default(0);
            $table->boolean("langs_course_create")->default(0);
            $table->boolean("langs_course_update")->default(0);
            $table->boolean("langs_course_view")->default(0);
            $table->boolean("langs_course_delete")->default(0);
            $table->boolean("courses_create")->default(0);
            $table->boolean("courses_update")->default(0);
            $table->boolean("courses_view")->default(0);
            $table->boolean("courses_delete")->default(0);
            $table->boolean("facebook_reviews_create")->default(0);
            $table->boolean("facebook_reviews_view")->default(0);
            $table->boolean("facebook_reviews_delete")->default(0);
            $table->boolean("faq_create")->default(0);
            $table->boolean("faq_update")->default(0);
            $table->boolean("faq_view")->default(0);
            $table->boolean("faq_delete")->default(0);
            $table->boolean("privacy_policy_update")->default(0);
            $table->boolean("privacy_policy_view")->default(0);
            $table->boolean("policy_to_parent_update")->default(0);
            $table->boolean("policy_to_parent_view")->default(0);
            $table->boolean("policy_to_teacher_update")->default(0);
            $table->boolean("policy_to_teacher_view")->default(0);

            $table->boolean("settings_update")->default(0);
            $table->boolean("settings_view")->default(0);
            $table->boolean("settings_delete")->default(0);

            $table->boolean("permissions_create")->default(0);
            $table->boolean("permissions_update")->default(0);
            $table->boolean("permissions_view")->default(0);
            $table->boolean("permissions_delete")->default(0);


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('roles_permissions');
    }
}
