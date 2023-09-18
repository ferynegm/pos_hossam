<?php

use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;

// Start Auth Route
Route::group(['prefix' => 'admin',  'namespace' => 'App\Http\Controllers\Back'], function(){
    Route::get('/login', function(){
        return view('back.auth.login');
    });
    
    Route::post('login_post' , 'HomeController@login_post');
});


Route::group(['prefix' => 'admin/forget_password'], function(){
    Route::get('/', function(){
        return view('back.auth.forget_password');
    });
});

Route::get('admin/clear_cache', function() {
    Artisan::call('cache:clear');
    return "cleared cache";
});

Route::group(['prefix' => 'admin', 'namespace' => 'App\Http\Controllers\Back', 'middleware' => 'checkLogin'], function(){

    Route::get('logout' , 'HomeController@logout');

    Route::group(['prefix' => '/pos'], function(){
        Route::get('/', function(){
            return view('back/products/pos');
        });
    });

    //////////////////////////////////////////////////////////////////////////////// 
    // Admin Home Page 
    Route::group(['prefix' => '/'], function(){
        Route::get('/', 'HomeController@index');
    });
            
    // roles_permissions Routes
    Route::group(['prefix' => 'roles_permissions'] , function (){
        Route::get('/' , 'RolesPermissionsController@index');
        Route::get('create' , 'RolesPermissionsController@create');
        Route::post('/store' , 'RolesPermissionsController@store');
        Route::get('/edit/{id}' , 'RolesPermissionsController@edit');
        Route::post('/update/{id}' , 'RolesPermissionsController@update');
        Route::get('/destroy/{id}' , 'RolesPermissionsController@destroy');

        Route::get('datatable_roles_permissions' , 'RolesPermissionsController@datatable_roles_permissions');
    });

    // admins Routes
    Route::group(['prefix' => 'admins'] , function (){
        
        Route::get('/' , 'AdminController@index');
        Route::get('create' , 'AdminController@create');
        Route::post('/store' , 'AdminController@store');
        Route::get('/edit/{id}' , 'AdminController@edit');
        Route::get('/show/{id}' , 'AdminController@show');
        Route::get('/change_password/{id}' , 'AdminController@change_password');
        Route::post('/change_password/{id}' , 'AdminController@change_password_post');
        Route::post('/update/{id}' , 'AdminController@update');
        Route::get('/destroy/{id}' , 'AdminController@destroy');
        Route::get('/destroy_selected' , 'AdminController@destroy_selected');
        Route::get('datatable_admins' , 'AdminController@datatable_admins');
    });

    // about_acadmy Routes
    Route::group(['prefix' => 'about_acadmy'] , function (){
        Route::get('/' , 'AboutAcadmyController@index');
        Route::get('create' , 'AboutAcadmyController@create');
        Route::post('/store' , 'AboutAcadmyController@store');
        Route::get('/edit/{id}' , 'AboutAcadmyController@edit');
        Route::get('/show/{id}' , 'AboutAcadmyController@show');
        Route::post('/update/{id}' , 'AboutAcadmyController@update');
        Route::get('/destroy/{id}' , 'AboutAcadmyController@destroy');
        Route::get('/delete_media/{id}/{media}' , 'AboutAcadmyController@delete_media');
        Route::get('datatable_about_acadmy' , 'AboutAcadmyController@datatable_about_acadmy');
    });

    // teacher Routes
    Route::group(['prefix' => 'teacher'] , function (){
        Route::get('/' , 'TeacherController@index');
        Route::get('create' , 'TeacherController@create');
        Route::post('/store' , 'TeacherController@store');
        Route::get('/edit/{id}' , 'TeacherController@edit');
        Route::get('/show/{id}' , 'TeacherController@show');
        Route::post('/update/{id}' , 'TeacherController@update');
        Route::get('/destroy/{id}' , 'TeacherController@destroy');
        Route::get('datatable_teacher' , 'TeacherController@datatable_teacher');
    });

    // facebook_review Routes
    Route::group(['prefix' => 'facebook_review'] , function (){
        Route::get('/' , 'FacebookReviewsController@index');
        Route::get('create' , 'FacebookReviewsController@create');
        Route::post('/store' , 'FacebookReviewsController@store');
        Route::get('/destroy/{id}' , 'FacebookReviewsController@destroy');
        Route::get('datatable_facebook_review' , 'FacebookReviewsController@datatable_facebook_review');
    });

    // faq Routes
    Route::group(['prefix' => 'faq'] , function (){
        Route::get('/' , 'FaqController@index');
        Route::get('create' , 'FaqController@create');
        Route::post('/store' , 'FaqController@store');
        Route::get('/edit/{id}' , 'FaqController@edit');
        Route::post('/update/{id}' , 'FaqController@update');
        Route::get('/destroy/{id}' , 'FaqController@destroy');
        Route::get('datatable_faq' , 'FaqController@datatable_faq');
    });

    // courses Routes
    Route::group(['prefix' => 'courses'] , function (){
        Route::get('/' , 'CoursesController@index');
        Route::get('create' , 'CoursesController@create');
        Route::post('/store' , 'CoursesController@store');
        Route::get('/edit/{id}' , 'CoursesController@edit');
        Route::get('/show/{id}' , 'CoursesController@show');
        Route::post('/update/{id}' , 'CoursesController@update');
        Route::get('/destroy/{id}' , 'CoursesController@destroy');
        Route::get('/delete_video/{id}' , 'CoursesController@delete_video');
        Route::get('datatable_courses' , 'CoursesController@datatable_courses');
        // langs
        Route::get('langs/create' , 'CoursesController@create_langs');
        Route::post('langs/store' , 'CoursesController@store_langs');
        Route::get('langs/edit/{id}' , 'CoursesController@edit_langs');
        Route::post('langs/update/{id}' , 'CoursesController@update_langs');
        Route::get('langs/destroy/{id}' , 'CoursesController@destroy_langs');
        Route::get('datatable_langs' , 'CoursesController@datatable_langs');
    });

    // privacy_policy Routes
    Route::group(['prefix' => 'privacy_policy'] , function (){
        Route::get('/' , 'PrivacyPolicyController@show');
        Route::get('/edit' , 'PrivacyPolicyController@edit');
        Route::post('/update' , 'PrivacyPolicyController@update');
    });

    // policy_to_parent Routes
    Route::group(['prefix' => 'policy_to_parent'] , function (){
        Route::get('/' , 'PolicyToParentController@show');
        Route::get('/edit' , 'PolicyToParentController@edit');
        Route::post('/update' , 'PolicyToParentController@update');
    });

    // policy_to_teacher Routes
    Route::group(['prefix' => 'policy_to_teacher'] , function (){
        Route::get('/' , 'PolicyToTeacherController@show');
        Route::get('/edit' , 'PolicyToTeacherController@edit');
        Route::post('/update' , 'PolicyToTeacherController@update');
    });

    // teacher_feedback Routes
    Route::group(['prefix' => 'teacher_feedback'] , function (){
        Route::get('/' , 'FeedbackAboutTeacherController@index');
        Route::get('create' , 'FeedbackAboutTeacherController@create');
        Route::post('/store' , 'FeedbackAboutTeacherController@store');
        Route::get('/edit/{id}' , 'FeedbackAboutTeacherController@edit');
        Route::get('/show/{id}' , 'FeedbackAboutTeacherController@show');
        Route::post('/update/{id}' , 'FeedbackAboutTeacherController@update');
        Route::get('/destroy/{id}' , 'FeedbackAboutTeacherController@destroy');
        Route::get('/destroy_all_feedback_to_teacher/{id}' , 'FeedbackAboutTeacherController@destroy_all_feedback_to_teacher');
        Route::get('datatable_teacher_feedback' , 'FeedbackAboutTeacherController@datatable_teacher_feedback');
    });

    // blog_category Routes
    Route::group(['prefix' => 'blog_category'] , function (){
        Route::get('/' , 'BlogCategoryController@index');
        Route::get('create' , 'BlogCategoryController@create');
        Route::post('/store' , 'BlogCategoryController@store');
        Route::get('/edit/{id}' , 'BlogCategoryController@edit');
        Route::post('/update/{id}' , 'BlogCategoryController@update');
        Route::get('/destroy/{id}' , 'BlogCategoryController@destroy');
        Route::get('/destroy_selected' , 'BlogCategoryController@destroy_selected');
        Route::get('datatable_blog_category' , 'BlogCategoryController@datatable_blog_category');
    });

    // blogs Routes
    Route::group(['prefix' => 'blogs'] , function (){
        Route::get('/' , 'BlogController@index');
        Route::get('create' , 'BlogController@create');
        Route::post('/store' , 'BlogController@store');
        Route::get('/edit/{id}' , 'BlogController@edit');
        Route::get('/show/{id}' , 'BlogController@show');
        Route::post('/update/{id}' , 'BlogController@update');
        Route::get('/destroy/{id}' , 'BlogController@destroy');
        Route::get('/destroy_selected' , 'BlogController@destroy_selected');
        
        Route::get('datatable_blogs' , 'BlogController@datatable_blogs');
    });

    // blog_comment Routes
    Route::group(['prefix' => 'blog_comment'] , function (){
        Route::get('/' , 'BlogCommentController@index');
        Route::get('create/{id}' , 'BlogCommentController@create');
        Route::post('/store/{id}' , 'BlogCommentController@store');
        Route::get('/edit/{id}' , 'BlogCommentController@edit');
        Route::get('/show/{id}' , 'BlogCommentController@show');
        Route::post('/update/{id}' , 'BlogCommentController@update');
        Route::get('/destroy/{id}' , 'BlogCommentController@destroy');
        Route::get('/destroy_all_comment/{id}' , 'BlogCommentController@destroy_all_comment');
        
        Route::get('datatable_blog_comment' , 'BlogCommentController@datatable_blog_comment');
    });

    // table_prices Routes
    Route::group(['prefix' => 'table_prices'] , function (){
        Route::get('/' , 'TablePriceController@index');
        Route::get('create' , 'TablePriceController@create');
        Route::post('/store' , 'TablePriceController@store');
        Route::get('/edit/{id}' , 'TablePriceController@edit');
        Route::get('/show/{id}' , 'TablePriceController@show');
        Route::post('/update/{id}' , 'TablePriceController@update');
        Route::get('/destroy/{id}' , 'TablePriceController@destroy');
        Route::get('/destroy_selected' , 'TablePriceController@destroy_selected');
        
        Route::get('datatable_table_prices' , 'TablePriceController@datatable_table_prices');
    });
   
    // settings Routes
    Route::group(['prefix' => 'settings'] , function (){
        Route::get('/' , 'SettingController@index');
        Route::get('/show/{id}' , 'SettingController@show');
        Route::get('/edit/{id}' , 'SettingController@edit');
        Route::post('/update/{id}' , 'SettingController@update');
        Route::get('datatable_settings' , 'SettingController@datatable_settings');
    });

    // xxx Routes
    Route::group(['prefix' => 'xxx'] , function (){
        Route::get('/' , 'xxxController@index');
        Route::get('create' , 'xxxController@create');
        Route::post('/store' , 'xxxController@store');
        Route::get('/edit/{id}' , 'xxxController@edit');
        Route::post('/update/{id}' , 'xxxController@update');
        Route::get('/destroy/{id}' , 'xxxController@destroy');
        Route::get('/destroy_selected' , 'xxxController@destroy_selected');

        Route::get('datatable_xxx' , 'xxxController@datatable_xxx');
    });
});

