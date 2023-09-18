<?php

namespace App\Http\Controllers\Back;

use DB;
use Illuminate\Support\Facades\Hash;
use Session;
use Carbon\Carbon;
use App\Models\User;
use App\Models\Back\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Back\RolesPermissions;
use Illuminate\Support\Facades\File;
use Yajra\DataTables\Facades\DataTables;
use Intervention\Image\Facades\Image;

class AdminController extends Controller
{
    public function index()
    {
        $all_admins = Admin::all();
        return view('back.admins.index', compact('all_admins'));
    }

    public function create()
    {
        $permissions = RolesPermissions::all();
        return view('back.admins.add', compact('permissions'));
    }

    public function store(Request $request)
    {
        $this->validate($request , [
            'name' => 'required',
            'email' => 'required|unique:users,email',
            'user_name' => 'required|unique:users,user_name',
            'phone' => 'required|unique:users,user_phone',
            'password' => 'required|min:6',
            'confirmed_password' => 'required|min:6|same:password',
        ],[
            'name.required' => 'الإسم مطلوب',
            'email.required' => 'البريد الإلكتروني مطلوب',
            'email.unique' => 'البريد الإلكتروني مستخدم من قبل',
            'user_name.required' => 'إسم المستخدم مطلوب',
            'user_name.unique' => 'إسم المستخدم مستخدم من قبل',
            'phone.required' => 'رقم التلفون مطلوب',
            'phone.unique' => 'رقم التلفون مستخدم من قبل',
            'password.required' => 'الرقم السري مطلوب',
            'password.min' => 'الرقم السري يجب أن لايقل عن 6 ارقام او حروف او رموز',
            'confirmed_password.required' => 'تأكيد الرقم السري مطلوب',
            'confirmed_password.min' => 'تأكيد الرقم السري يجب أن لايقل عن 6 ارقام او حروف او رموز',
            'confirmed_password.same' => 'تأكيد الرقم السري يجب أن يكون نفس الرقم السري',
        ]);

        if(request('image') == ""){
            $name = "df_image.png";
        }else{
            $file = request('image');
            $name = time() . '.' .$file->getClientOriginalExtension();
            $path = public_path('back/images/admins');
            $file->move($path , $name);
        }

        $user_id = User::insertGetId([
            'name' => request('name'),
            'user_name' => request("user_name"),
            'user_phone' => request("phone"),
            'user_role' => request('user_role'),
            'email' => request('email') == null ? null : request('email'),
            'password' => Hash::make(request('password')),
            'user_lang' => 1,
            'user_theme' => 1,
            'created_at' => Carbon::now(),
            'last_login_time' => null,
        ]);

        $data = [
            'name' => $user_id,
            'address' => request('address'),
            'nat_id' => request('nat_id'),
            'birth_date' => request('birth_date'),
            'image' => $name,
            'note' => request('note'),
            'gender' => request('gender'),
            'status' => request('status')
        ];

        Admin::create($data);
    }

    public function show($id)
    {
        $find = Admin::where('name' , $id)->first();
        return view('back.admins.show', compact('find'));
    }

    public function edit($id)
    {
        $find = Admin::where('name' , $id)->first();
        $permissions = RolesPermissions::all();
        return view('back.admins.edit', compact('find', 'permissions'));
    }

    public function update(Request $request, $id)
    {
        $find = Admin::where('name', $id)->first();
        
        $this->validate($request , [
            'name' => 'required',
            'email' => 'required|unique:users,email,'.$id,
            'user_name' => 'required|unique:users,user_name,'.$id,
            'phone' => 'required|unique:users,user_phone,'.$id,
        ],[
            'name.required' => 'الإسم مطلوب',
            'email.required' => 'البريد الإلكتروني مطلوب',
            'email.unique' => 'البريد الإلكتروني مستخدم من قبل',
            'user_name.required' => 'إسم المستخدم مطلوب',
            'user_name.unique' => 'إسم المستخدم مستخدم من قبل',
            'phone.required' => 'رقم التلفون مطلوب',
            'phone.unique' => 'رقم التلفون مستخدم من قبل',
            'password.required' => 'الرقم السري مطلوب',
            'password.min' => 'الرقم السري يجب أن لايقل عن 6 ارقام او حروف او رموز',
            'confirmed_password.required' => 'تأكيد الرقم السري مطلوب',
            'confirmed_password.min' => 'تأكيد الرقم السري يجب أن لايقل عن 6 ارقام او حروف او رموز',
            'confirmed_password.same' => 'تأكيد الرقم السري يجب أن يكون نفس الرقم السري',
        ]);

        if(request('image') == ""){
            $name = request("image_hidden");
        }else{
            $file = request('image');
            $name = time() . '.' .$file->getClientOriginalExtension();
            $path = public_path('back/images/admins');
            $file->move($path , $name);
            
            if(request("image_hidden") != "df_image.png"){
                File::delete(public_path('back/images/admins/'.$find['image']));
            }
        }


        User::where('id', $id)->update([
            'name' => request('name'),
            'user_name' => request("user_name"),
            'user_phone' => request("phone"),
            'email' => request('email') == null ? null : request('email'),
            'updated_at' => Carbon::now(),
            'last_login_time' => null,
            'user_role' => request('user_role'),
        ]);

        $data = [
            'address' => request('address'),
            'nat_id' => request('nat_id'),
            'birth_date' => request('birth_date'),
            'image' => $name,
            'note' => request('note'),
            'gender' => request('gender'),
            'status' => request('status')
        ];

        $find->update($data);
    }

    public function destroy($id, Request $request)
    {
        Admin::where('name', $id)->delete();
        User::findOrFail($id)->delete();
    }

    public function destroy_selected(Request $request)
    {
        Admin::whereIn("name" , request("delete_selected"))->delete();
        User::whereIn("id" , request("delete_selected"))->delete();
    }









    ///////////////////////////////////////////////  datatable_admins  /////////////////////////////////////////////////////////
    /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    public function datatable_admins()
    {
        $all = Admin::all();
        return DataTables::of($all)
        ->addColumn('image', function($res){
            $image ='
                <a class="spotlight" href="'.url('back/images/admins/'.$res->image).'">
                    <img src="'.url('back/images/admins/'.$res->image).'" style="width: 50px;height: 50px;border-radius: 50%;margin: 10px auto;display: block;">
                </a>
            ';
            return $image;
        })
        ->addColumn('user', function($res){
            $role_name = RolesPermissions::where('id', $res->admin_name['user_role'])->first();
            if($res->admin_name['user_role'] !== null){
                return "
                    <div style='padding:2px;'>
                        <i class='fa fa-user'></i>
                        <a style='color:#24ABF2;margin: 0px 5px;font-weight: bold;font-size: 15px;'>"
                            .$res->admin_name['name'].
                        "</a>
                    </div>
                    
                    <div style='padding:2px;'>
                        <i class='fa fa-map-marker-alt'></i>
                        <span style='margin: 0px 5px;'>"
                            .$res->address.
                        "</span>
                    </div>
    
                    <div style='padding:2px;'>
                        <i class='fa fa-user-secret'></i>
                        <span style='color: gray;margin: 0px 5px 0px;'>تراخيص: </span>
                        <span style='margin: 0px 5px;color:red;font-weight: bold;'>"
                            .$role_name['role_name'].
                        "</span>
                    </div>
                        
                ";
            }else{
                return "
                    <div style='padding:2px;'>
                        <i class='fa fa-user'></i>
                        <a style='color:#24ABF2;margin: 0px 5px;font-weight: bold;font-size: 15px;'>"
                            .$res->admin_name['name'].
                        "</a>
                    </div>
                    
                    <div style='padding:2px;'>
                        <i class='fa fa-map-marker-alt'></i>
                        <span style='margin: 0px 5px;'>"
                            .$res->address.
                        "</span>
                    </div>
    
                    <div style='padding:2px;'>
                        <i class='fa fa-user-secret'></i>
                        <span style='color: gray;margin: 0px 5px 0px;'>تراخيص: </span>
                        <span style='margin: 0px 5px;color:red;font-weight: bold;'>---</span>
                    </div>
                        
                ";
            }
        })
        ->addColumn('contact', function($res){
            return "
                <div style='padding:2px;'>
                    <i class='fa fa-phone'></i>
                    <span style='margin: 0px 5px;'>"
                        .$res->admin_name['user_phone'].
                    "</span>
                </div>

                <div style='padding:2px;'>
                    <i class='fa fa-envelope'></i>
                    <span style='margin: 0px 5px;'>"
                        .$res->admin_name['email'].
                    "</span>
                </div>
            ";
        })
        ->addColumn('last_login_time', function($res){
            if($res->admin_name['last_login_time'] == null){
                return "
                    <div style='padding:2px;'>
                        <i class='fas fa-clock'></i>
                    </div>
                ";
            }else{
                return "
                    <div style='padding:2px;'>
                        <i class='fas fa-clock'></i>
                        <span style='margin: 0px 5px;'>"
                            .Carbon::parse($res->admin_name['last_login_time'])->format('d-m-Y').
                        "</span>
                        <span style='margin: 0px 5px;color: red;'>"
                            .Carbon::parse($res->admin_name['last_login_time'])->format('h:i:s a').
                        "</span>
                    </div>
                ";
            }
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
            if($res->id == 1){
                $buttons = '<a class="btn btn-outline-success btn-sm edit bt_modal" title="Edit" act="'.url('admin/admins/edit/'.$res->name).'"  data-bs-toggle="offcanvas" data-bs-target="#offcanvasWithBothOptions" aria-controls="offcanvasWithBothOptions">
                    <i class="fas fa-pencil-alt"></i>
                </a>';
                
                $buttons .= '<a class="btn btn-outline-info btn-sm show bt_modal" act="'.url('admin/admins/show/'.$res->name).'"  data-bs-toggle="offcanvas" data-bs-target="#offcanvasWithBothOptions" aria-controls="offcanvasWithBothOptions">
                    <i class="fas fa-eye"></i>
                </a>';

                $buttons .= '<a class="btn btn-outline-dark btn-sm bt_modal" style="margin-right: 6px;" act="'.url('admin/admins/change_password/'.$res->name).'"  data-bs-toggle="offcanvas" data-bs-target="#offcanvasWithBothOptions" aria-controls="offcanvasWithBothOptions">
                    <i class="fas fa-key"></i>
                </a>';

                // $buttons .= '<a class="btn btn-outline-danger btn-sm delete" loop_id="'.$res->name.'">
                //     <i class="fas fa-trash-alt"></i>
                // </a>';
                
                // $buttons .= '<a class="btn btn-outline-dark btn-sm bt_modal" act="'.url('admin/admins/change_password/'.$res->name).'"  data-bs-toggle="offcanvas" data-bs-target="#offcanvasWithBothOptions" aria-controls="offcanvasWithBothOptions">
                //     <i class="fas fa-key"></i>
                // </a>';
                return $buttons;
            }else{
                $buttons = '<a class="btn btn-outline-success btn-sm edit bt_modal" title="Edit" act="'.url('admin/admins/edit/'.$res->name).'"  data-bs-toggle="offcanvas" data-bs-target="#offcanvasWithBothOptions" aria-controls="offcanvasWithBothOptions">
                    <i class="fas fa-pencil-alt"></i>
                </a>';
                
                $buttons .= '<a class="btn btn-outline-info btn-sm show bt_modal" act="'.url('admin/admins/show/'.$res->name).'"  data-bs-toggle="offcanvas" data-bs-target="#offcanvasWithBothOptions" aria-controls="offcanvasWithBothOptions">
                    <i class="fas fa-eye"></i>
                </a>';
    
                $buttons .= '<a class="btn btn-outline-danger btn-sm delete" loop_id="'.$res->name.'">
                    <i class="fas fa-trash-alt"></i>
                </a>';
                
                $buttons .= '<a class="btn btn-outline-dark btn-sm bt_modal" act="'.url('admin/admins/change_password/'.$res->name).'"  data-bs-toggle="offcanvas" data-bs-target="#offcanvasWithBothOptions" aria-controls="offcanvasWithBothOptions">
                    <i class="fas fa-key"></i>
                </a>';
                return $buttons;
            }
        })
        ->rawColumns(['image', 'user', 'contact', 'last_login_time', 'branche', 'gender', 'status', 'action'])
        ->make(true);
    }


    // start change password 
    public function change_password($id)
    {
        $find = User::where('id' , $id)->first();
        return view('back.admins.change_password', compact('find'));
    }

    public function change_password_post(Request $request, $id)
    {
        $find = User::where('id' , $id)->first();

        $this->validate($request , [
            // 'email' => 'required|unique:users,email, '.$id,
            'old_password' => 'required',
            'new_password' => 'required|min:5',
            'confirmed_password' => 'required|min:5|same:new_password',
        ]);

        if (Hash::check(request('old_password'), $find['password'])) {
            $data = [
                'password' => Hash::make(request('new_password')),
            ];

            $find->update($data);
        }else{
            dd('false');
        }
    }
    // end change password 
}
