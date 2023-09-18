<?php

namespace App\Http\Controllers\Back;

use App\Models\Back\FacebookReviews;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Yajra\DataTables\Facades\DataTables;

class FacebookReviewsController extends Controller
{
    public function index()
    {
        return view('back.facebook_review.index');
    }

    public function create()
    {
        return view('back.facebook_review.add');
    }

    public function store(Request $request)
    {
        $this->validate($request , [
            'review' => 'required',
        ],[
            'review.required' => 'الريفيو مطلوب',
        ]);

        $file = request('review');
        $name = rand(1,5000).'.'.$file->getClientOriginalExtension();
        $path = public_path('back/images/facebook_reviews');
        $file->move($path , $name);

        $data = [
            'review' => $name,
        ];

        FacebookReviews::create($data);
    }

    public function destroy($id)
    {
        $find = FacebookReviews::where('id', $id)->first();
        $find->delete();
        File::delete(public_path('back/images/facebook_reviews/'.$find['review']));
    }







    ///////////////////////////////////////////////  datatable_facebook_review  /////////////////////////////////////////////////////////
    /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    public function datatable_facebook_review()
    {
        $all = FacebookReviews::all();
        return DataTables::of($all)
        ->addColumn('id', function($res){
            return $res->id;
        })
        ->addColumn('review', function($res){
            $review ='
                <a class="spotlight" href="'.url('back/images/facebook_reviews/'.$res->review).'">
                    <img src="'.url('back/images/facebook_reviews/'.$res->review).'" style="width: 50px;height: 50px;border-radius: 50%;margin: 10px auto;display: block;">
                </a>
            ';
            return $review;
        })
        ->addColumn('action', function($res){                            

            $buttons = '<a class="btn btn-outline-danger btn-sm delete" loop_id="'.$res->id.'">
                <i class="fas fa-trash-alt"></i>
            </a>';

            return $buttons;
        })
        ->rawColumns(['id', 'review', 'action'])
        ->make(true);
    }

}
