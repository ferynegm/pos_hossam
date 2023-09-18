<?php

namespace App\Http\Controllers\Back;

use App\Models\Back\PrivacyPolicy;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PrivacyPolicyController extends Controller
{
    public function show()
    {
        $find = PrivacyPolicy::latest()->first();
        return view('back.privacy_policy.show', compact('find'));
    }

    public function edit()
    {
        $find = PrivacyPolicy::latest()->first();
        return view('back.privacy_policy.edit', compact('find'));
    }

    public function update(Request $request)
    {
        $find = PrivacyPolicy::latest()->first();
        
        $this->validate($request , [
            'description' => 'required',
        ],[
            'description.required' => 'الوصف مطلوب',
        ]);

        $find->update([
            'description' => request('description'),
        ]);

        return redirect()->to('admin/privacy_policy');
    }
}
