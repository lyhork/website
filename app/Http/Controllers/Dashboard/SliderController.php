<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Slider;
use Illuminate\Support\Facades\DB;
use Intervention\Image\Facades\Image;
use File;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sliders = Slider::all();
        return view('dashboard.slider.index',compact('sliders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $sliders = Slider::all();
        return view('dashboard.slider.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $slider = Slider::create($request->except('image','_token'));
        if($request->file('image')){
            $file = $request->file('image');
            $filename = date('dmY').$file->getClientOriginalName();
            $file = Image::make($file->getRealPath());
            $file->resize(2048, 738, function ($constraint) {
                $constraint->upsize();
            });
            $file->save(public_path('images/uploads/sliders/'.$filename));
            $path = 'images/uploads/sliders/'.$filename;
            $slider->update(['image'=>$path]);
        } 
        return redirect()->route('sliders');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $sliders = Slider::where('id',$id)->get();
        return view('dashboard.slider.edit',compact('sliders'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Slider $id)
    {
        $data = [
            'image' => 'required|image:mimes:jpg,png,jpeg,webp,gif,svg|max:2048',
        ];

        foreach(config('app.languages') as $key =>$lang){
            $data[$key.'*.title'] = 'required|string';
        }

        $id->update($request->all());
        

        if($request->file('image')){
            $file = $request->file('image');
            $filename = date('dmY').$file->getClientOriginalName();
            $file->move(public_path('images/uploads/sliders'),$filename);
            $path = 'images/uploads/sliders'.$filename;
            $id->update(['image'=>$path]);
        } 
        return redirect()->route('sliders');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $imagePath = Slider::select('image')->where('id', $id)->first();
        $filePath = $imagePath->image;
        if (file_exists($filePath)) {

            unlink($filePath);
            Slider::where('id', $id)->delete();
            $notification=array(
                'message' => 'Successfully Deleted',
                'alert-type' => 'success' 
            );
            return back()->with($notification);
        }else{
            $notification=array(
                'message' => 'Something is wrong, please try again',
                'alert-type' => 'error' 
            );
            Slider::where('id', $id)->delete();
            return back()->with($notification);
        }
    }
        

    public function updateStatus($id)
    {
        $slider = Slider::find($id); 
        if($slider){
            if($slider->status){
                $slider->status = 0;
            }
            else{
                $slider->status = 1;
            }
        $slider->save(); 
        }
        return back();
    }
        
}
