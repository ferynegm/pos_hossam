<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Back\AboutAcadmy;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function index()
    {
        $all_abouts = AboutAcadmy::where('status', 1)->get();
        $first_about = AboutAcadmy::where('status', 1)->first();
        return view('front.about.index', compact('all_abouts', 'first_about'));
    }
}
