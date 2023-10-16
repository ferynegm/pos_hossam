<?php

use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;

// Start Auth Route
// Route::group(['prefix' => 'admin',  'namespace' => 'App\Http\Controllers\Back'], function(){
//     Route::get('/login', function(){
//         return view('back.auth.login');
//     });
    
//     Route::post('login_post' , 'HomeController@login_post');
// });


// Route::group(['prefix' => 'admin/forget_password'], function(){
//     Route::get('/', function(){
//         return view('back.auth.forget_password');
//     });
// });

// clear_cache
Route::get('admin/clear_cache', function() {
    Artisan::call('cache:clear');
    return "cleared cache";
});

// 404
Route::fallback(function () {
    return view("back.404");
});

// , 'middleware' => 'checkLogin'
Route::group(['prefix' => 'admin', 'namespace' => 'App\Http\Controllers\Back'], function(){

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
   
    // roles_permissions Routes
    // Route::group(['prefix' => 'roles_permissions'] , function (){
    //     Route::get('/' , 'RolesPermissionsController@index');
    //     Route::get('create' , 'RolesPermissionsController@create');
    //     Route::post('/store' , 'RolesPermissionsController@store');
    //     Route::get('/edit/{id}' , 'RolesPermissionsController@edit');
    //     Route::post('/update/{id}' , 'RolesPermissionsController@update');
    //     Route::get('/destroy/{id}' , 'RolesPermissionsController@destroy');

    //     Route::get('datatable_roles_permissions' , 'RolesPermissionsController@datatable_roles_permissions');
    // });

    // settings Routes
    // Route::group(['prefix' => 'settings'] , function (){
    //     Route::get('/' , 'SettingController@index');
    //     Route::get('/show/{id}' , 'SettingController@show');
    //     Route::get('/edit/{id}' , 'SettingController@edit');
    //     Route::post('/update/{id}' , 'SettingController@update');
    //     Route::get('datatable_settings' , 'SettingController@datatable_settings');
    // });
});

