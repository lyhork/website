<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Setting;
 

class SettingController extends Controller
{

    public function update(Request $request,Setting $settings) {
        
        $data = [
            'logo' => 'required|image:mimes:jpg,png,jpeg,webp,gif,svg|max:2048',
        ];

        foreach(config('app.languages') as $key =>$lang){
            $data[$key.'*.title'] = 'required|string';
            $data[$key.'*.content'] = 'required|string';
        }

        $settings->update($request->except('image','_token'));
        $validatedData = $request->validate($data);

        if($request->file('logo')){
            $file = $request->file('logo');
            $filename = date('dmY').$file->getClientOriginalName();
            $file->move(public_path('images'),$filename);
            $path = 'images/'.$filename;
            $settings->update(['logo'=>$path]);
        } 
        return redirect()->route('dashboard.settings');
    }
}
