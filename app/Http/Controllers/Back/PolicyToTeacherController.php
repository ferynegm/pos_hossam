<?php

namespace App\Http\Controllers\Back;

use App\Models\Back\PolicyToTeacher;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PolicyToTeacherController extends Controller
{
    public function show()
    {
        $find = PolicyToTeacher::latest()->first();
        return view('back.policy_to_teacher.show', compact('find'));
    }

    public function edit()
    {
        $find = PolicyToTeacher::latest()->first();
        return view('back.policy_to_teacher.edit', compact('find'));
    }

    public function update(Request $request)
    {
        $find = PolicyToTeacher::latest()->first();
        
        $this->validate($request , [
            'description' => 'required',
        ],[
            'description.required' => 'الوصف مطلوب',
        ]);

        $find->update([
            'description' => request('description'),
        ]);

        return redirect()->to('admin/policy_to_teacher');
    }
}
