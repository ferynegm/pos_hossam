<?php

namespace App\Http\Controllers\Back;

use DB;
use Illuminate\Support\Facades\Hash;
use Session;
use Carbon\Carbon;
use App\Models\User;
use App\Models\Back\AboutAcadmy;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Yajra\DataTables\Facades\DataTables;
use Intervention\Image\Facades\Image;

class AboutAcadmyController extends Controller
{
    public function index()
    {
        return view('back.about_acadmy.index');
    }

    public function create()
    {
        return view('back.about_acadmy.add');
    }

    public function store(Request $request)
    {
        $this->validate($request , [
            'title' => 'required|unique:about_acadmies,title',
            'description' => 'required',
            // 'media'=> 'array',
            // 'media'=> 'image|mimes:jpeg,jpg,png,gif',
            // 'media_videos.*'=> 'mimes:video/avi,video/mpeg,video/quicktime',
        ],[
            'title.required' => 'العنوان مطلوب',
            'title.unique' => 'العنوان مستخدم من قبل',
            'description.required' => 'الوصف مطلوب',
        ]);

        if(request('media') == null && request('media_videos') == null){
            AboutAcadmy::create([
                'title' => request('title'),
                'description' => request('description'),
                'media' => null,
                'media_videos' => null,
                'status' => request('status')
            ]);
        }elseif(request('media') == null){
            $videos = [];
            foreach(request('media_videos') as $file_video){
                $name_video = rand(1,1000) . '.' .$file_video->getClientOriginalName();
                $path_video = public_path('back/images/about_acadmy');
                $file_video->move($path_video , $name_video);
                $videos[] = $name_video;
            }

            AboutAcadmy::create([
                'title' => request('title'),
                'description' => request('description'),
                'media' => null,
                'media_videos' => implode('|', $videos),
                'status' => request('status')
            ]);
        }elseif(request('media_videos') == null){
            $images = [];
            foreach(request('media') as $file){
                $name = rand(1,1000) . '.' .$file->getClientOriginalName();
                $path = public_path('back/images/about_acadmy');
                $file->move($path , $name);
                $images[] = $name;
            }

            AboutAcadmy::create([
                'title' => request('title'),
                'description' => request('description'),
                'media' => implode('|', $images),
                'media_videos' => null,
                'status' => request('status')
            ]);
        }else{
            $images = [];
            foreach(request('media') as $file){
                $name = rand(1,1000) . '.' .$file->getClientOriginalName();
                $path = public_path('back/images/about_acadmy');
                $file->move($path , $name);
                $images[] = $name;
            }

            $videos = [];
            foreach(request('media_videos') as $file_video){
                $name_video = rand(1,1000) . '.' .$file_video->getClientOriginalName();
                $path_video = public_path('back/images/about_acadmy');
                $file_video->move($path_video , $name_video);
                $videos[] = $name_video;
            }

            AboutAcadmy::insert([
                'title' => request('title'),
                'description' => request('description'),
                'media' => implode('|', $images),
                'media_videos' => implode('|', $videos),
                'status' => request('status')
            ]);
        }

        return redirect()->to('admin/about_acadmy');
    }

    public function show($id)
    {
        $find = AboutAcadmy::where('id' , $id)->first();
        $images_explode = explode('|', $find['media']);
        $videos_explode = explode('|', $find['media_videos']);
        return view('back.about_acadmy.show', compact('find', 'images_explode', 'videos_explode'));
    }

    public function edit($id)
    {
        $find = AboutAcadmy::where('id' , $id)->first();
        return view('back.about_acadmy.edit', compact('find'));
    }

    public function update(Request $request, $id)
    {
        $find = AboutAcadmy::where('id', $id)->first();
        
        $this->validate($request , [
            'title' => 'required|unique:about_acadmies,title, '.$id,
            'description' => 'required',
            // 'media'=> 'array',
            // 'media'=> 'image|mimes:jpeg,jpg,png,gif',
            // 'media_videos.*'=> 'mimes:video/avi,video/mpeg,video/quicktime',
        ],[
            'title.required' => 'العنوان مطلوب',
            'title.unique' => 'العنوان مستخدم من قبل',
            'description.required' => 'الوصف مطلوب',
        ]);

        if(request('media') == null && request('media_videos') == null){
            $find->update([
                'title' => request('title'),
                'description' => request('description'),
                'media' => request('media_hidden'),
                'media_videos' => request('media_videos_hidden'),
                'status' => request('status')
            ]);
        }elseif(request('media') == null){
            $videos = [];
            foreach(request('media_videos') as $file_video){
                $name_video = rand(1,1000) . '.' .$file_video->getClientOriginalName();
                $path_video = public_path('back/images/about_acadmy');
                $file_video->move($path_video , $name_video);
                $videos[] = $name_video;
            }

            $videos_explode = explode('|', $find['media_videos']);

            foreach($videos_explode as $vid){
                File::delete(public_path('back/images/about_acadmy/'.$vid));
            }
            
            $find->update([
                'title' => request('title'),
                'description' => request('description'),
                'media' => request('media_hidden'),
                'media_videos' => implode('|', $videos),
                'status' => request('status')
            ]);
        }elseif(request('media_videos') == null){
            $images = [];
            foreach(request('media') as $file){
                $name = rand(1,1000) . '.' .$file->getClientOriginalName();
                $path = public_path('back/images/about_acadmy');
                $file->move($path , $name);
                $images[] = $name;
            }

            $images_explode = explode('|', $find['media']);

            foreach($images_explode as $img){
                File::delete(public_path('back/images/about_acadmy/'.$img));
            }

            $find->update([
                'title' => request('title'),
                'description' => request('description'),
                'media' => implode('|', $images),
                'media_videos' => request('media_videos_hidden'),
                'status' => request('status')
            ]);
        }else{
            $images = [];
            foreach(request('media') as $file){
                $name = rand(1,1000) . '.' .$file->getClientOriginalName();
                $path = public_path('back/images/about_acadmy');
                $file->move($path , $name);
                $images[] = $name;
            }

            $videos = [];
            foreach(request('media_videos') as $file_video){
                $name_video = rand(1,1000) . '.' .$file_video->getClientOriginalName();
                $path_video = public_path('back/images/about_acadmy');
                $file_video->move($path_video , $name_video);
                $videos[] = $name_video;
            }

            $images_explode = explode('|', $find['media']);
            $videos_explode = explode('|', $find['media_videos']);

            foreach($images_explode as $img){
                File::delete(public_path('back/images/about_acadmy/'.$img));
            }

            foreach($videos_explode as $vid){
                File::delete(public_path('back/images/about_acadmy/'.$vid));
            }
            
            $find->update([
                'title' => request('title'),
                'description' => request('description'),
                'media' => implode('|', $images),
                'media_videos' => implode('|', $videos),
                'status' => request('status')
            ]);
        }

        return redirect()->to('admin/about_acadmy');
    }

    public function destroy($id, Request $request)
    {
        $find = AboutAcadmy::where('id', $id)->first();
        $images_explode = explode('|', $find['media']);
        $videos_explode = explode('|', $find['media_videos']);

        foreach($images_explode as $img){
            File::delete(public_path('back/images/about_acadmy/'.$img));
        }

        foreach($videos_explode as $vid){
            File::delete(public_path('back/images/about_acadmy/'.$vid));
        }

        $find->delete();

    }

    public function delete_media($id, $media)
    {
        $find = AboutAcadmy::where('id', $id)->first();
        // ->where('media', 'like', '%'.$media.'%')

        $images_explode = explode('|', $find['media']);
        $videos_explode = explode('|', $find['media_videos']);

        foreach($images_explode as $img){
            File::delete(public_path('back/images/about_acadmy/'.$img));
        }

        foreach($videos_explode as $vid){
            File::delete(public_path('back/images/about_acadmy/'.$vid));
        }

        $find->delete();

    }







    ///////////////////////////////////////////////  datatable_about_acadmy  /////////////////////////////////////////////////////////
    /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    public function datatable_about_acadmy()
    {
        $all = AboutAcadmy::all();
        return DataTables::of($all)
        ->addColumn('title', function($res){
            return "
                <p style='color:#24ABF2;margin: 0px 5px;font-weight: bold;font-size: 15px;'>"
                    .$res->title.
                "</p>
            ";
        })
        // ->addColumn('description', function($res){
        //     return "
        //         <p style='margin: 0px 5px;font-weight: bold;font-size: 15px;'>"
        //             .implode(' ', array_slice(explode(' ', $res->description), 0, 15)).
        //         "</p>
        //     ";
        // })
        ->addColumn('status', function($res){
            if($res->status == 1){
                return "<i class='far fa-check-circle' style='font-size:18px;color: #54ca68;margin: 3px 5px'></i>";
            }else{
                return "<i class='far fa-times-circle' style='font-size:18px;color: #f97a80;margin: 3px 5px'></i>";
            }
        })
        ->addColumn('action', function($res){
            $buttons = '<a href="'.url('admin/about_acadmy/edit/'.$res->id).'" class="btn btn-outline-success btn-sm">
                <i class="fas fa-pencil-alt"></i>
            </a>';
            
            $buttons .= '<a class="btn btn-outline-info btn-sm" href="'.url('admin/about_acadmy/show/'.$res->id).'" style="margin: 0px 5px 0px 0px;">
                <i class="fas fa-eye"></i>
            </a>';

            $buttons .= '<a class="btn btn-outline-danger btn-sm delete" loop_id="'.$res->id.'">
                <i class="fas fa-trash-alt"></i>
            </a>';
                        
            return $buttons;
        })
        ->rawColumns(['title', 'status', 'action'])
        ->make(true);
    }
}
