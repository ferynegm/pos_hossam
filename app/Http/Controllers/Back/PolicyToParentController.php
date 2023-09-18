<?php

namespace App\Http\Controllers\Back;

use App\Models\Back\PolicyToParent;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PolicyToParentController extends Controller
{
    public function show()
    {
        $find = PolicyToParent::latest()->first();
        return view('back.policy_to_parent.show', compact('find'));
    }

    public function edit()
    {
        $find = PolicyToParent::latest()->first();
        return view('back.policy_to_parent.edit', compact('find'));
    }

    public function update(Request $request)
    {
        $find = PolicyToParent::latest()->first();
        
        $this->validate($request , [
            'description' => 'required',
        ],[
            'description.required' => 'الوصف مطلوب',
        ]);

        $find->update([
            'description' => request('description'),
        ]);

        return redirect()->to('admin/policy_to_parent');
    }
}
