<?php

use Illuminate\Support\Facades\Route;

Route::fallback(function () {
    return view("front.404");
});


Route::group(['prefix' => '/', 'namespace' => 'App\Http\Controllers\Front'], function(){
    Route::get('/', 'HomeController@index');

    Route::get('/contact', 'HomeController@contact');

    Route::get('/maintenance', function(){
        return view("front.maintenance");
    });
      

    // about Routes
    Route::group(['prefix' => 'about'] , function (){
        Route::get('/' , 'AboutController@index');
    });

    // faq Routes
    // Route::get('faqs' , function (){
    //     $faqs = App\Models\Back\Faq::orderBy('order', 'ASC')->get();
    //     return view('front.faq.index', compact('faqs'));
    // });

    // testimonials Routes
    Route::get('testimonials' , function (){
        $testimonials = App\Models\Back\FacebookReviews::orderBy('id', 'ASC')->get();
        return view('front.testimonials.index', compact('testimonials'));
    });

    // blog Routes
    Route::group(['prefix' => 'blog'] , function (){
        Route::get('/' , 'BlogController@index');
        Route::get('/{id}' , 'BlogController@blog_details');
        Route::get('/category/{id}' , 'BlogController@blogs_by_category');
        Route::get('/author/{id}' , 'BlogController@blogs_by_author');
    });

    // courses Routes
    Route::group(['prefix' => 'courses'] , function (){
        Route::get('/' , 'CoursesController@index');
        Route::get('/{id}' , 'CoursesController@course_details');
        
        Route::get('lang-filter/{id}' , 'CoursesController@courses_by_lang_filter');
        Route::get('age-filter/{id}' , 'CoursesController@courses_by_age_filter');
        Route::get('stage-filter/{id}' , 'CoursesController@courses_by_stage_filter');
        Route::get('teachers/{id}' , 'CoursesController@courses_by_teachers');



        Route::get('/category/{id}' , 'CoursesController@courses_by_category');
        Route::get('/author/{id}' , 'CoursesController@courses_by_author');
    });

    // teachers Routes
    Route::group(['prefix' => 'teachers'] , function (){
        Route::get('/' , 'TeacherController@index');
        Route::get('/{id}' , 'TeacherController@teacher_details');
    });

    // table_prices Routes
    Route::group(['prefix' => 'table_prices'] , function (){
        Route::group(['prefix' => 'term'] , function (){
            Route::get('/' , 'TablePricesController@index');
            
            // primary_stage
            Route::get('/primary_stage' , 'TablePricesController@primary_stage');
            Route::get('/primary_stage/1' , 'TablePricesController@primary_stage_one');
            Route::get('/primary_stage/2' , 'TablePricesController@primary_stage_two');
            Route::get('/primary_stage/3' , 'TablePricesController@primary_stage_three');
            Route::get('/primary_stage/4' , 'TablePricesController@primary_stage_four');
            Route::get('/primary_stage/5' , 'TablePricesController@primary_stage_five');
            Route::get('/primary_stage/6' , 'TablePricesController@primary_stage_six');
            
            // middle_stage
            Route::get('/middle_stage' , 'TablePricesController@middle_stage');
            Route::get('/middle_stage/1' , 'TablePricesController@middle_stage_one');
            Route::get('/middle_stage/2' , 'TablePricesController@middle_stage_two');
            Route::get('/middle_stage/3' , 'TablePricesController@middle_stage_three');
            
            // high_stage
            Route::get('/high_stage' , 'TablePricesController@high_stage');
            Route::get('/high_stage/1' , 'TablePricesController@high_stage_one');
            Route::get('/high_stage/2' , 'TablePricesController@high_stage_two');
            Route::get('/high_stage/3' , 'TablePricesController@high_stage_three');
        });
    });

    // privacy-policy Routes
    Route::group(['prefix' => 'privacy-policy'] , function (){
        Route::get('/' , function(){
            $find = App\Models\Back\PrivacyPolicy::first();
            return view('front.privacy.privacy_policy', compact('find'));
        });
    });

    // policy-to-parent Routes
    Route::group(['prefix' => 'policy-to-parent'] , function (){
        Route::get('/' , function(){
            $find = App\Models\Back\PolicyToParent::first();
            return view('front.privacy.policy_to_parent', compact('find'));
        });
    });

    // teachers-terms Routes
    Route::group(['prefix' => 'teachers-terms'] , function (){
        Route::get('/' , function(){
            $find = App\Models\Back\PolicyToTeacher::first();
            return view('front.privacy.policy_to_teacher', compact('find'));
        });
    });

});

