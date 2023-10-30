<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Gallery;
use Intervention\Image\Facades\Image;
use RealRashid\SweetAlert\Facades\Alert;
use File;
class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all();
        return view('dashboard.posts.index',compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $posts = Post::all();
        return view('dashboard.posts.add',compact('posts'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|image|max:2048',
        ]);
        $post = Post::create($request->except('image','_token'));
        if($request->image){
            $file = $request->file('image');
            $filename = date('dmY').$file->getClientOriginalName();
            $file = Image::make($file->getRealPath());
            if($file->height() > $file->width()) {
                $file->resize(500,null, function ($constraint) {
                    $constraint->aspectRatio();
                });
            } else {
                $file->resize(null,500, function ($constraint) {
                    $constraint->aspectRatio();
                });
            }
            $file->save(public_path('images/uploads/posts/'.$filename));
            $path = 'images/uploads/posts/'.$filename;
            $post->update(['image'=>$path]);

            $find = Post::all()->last();
            if($request->galleries){
                //---------------Upload Multi images------------------//
                $multiImages = $request->file('galleries');
                foreach($multiImages as $multiImage){
                    $filename = date('dmY').$multiImage->getClientOriginalName();
                    $multiImage = Image::make($multiImage->getRealPath());
                    $gallery = new Gallery;
                    $gallery->post_id = $find->id;
                    $gallery->images = $filename;
                    $gallery->save();
                    if($multiImage->height() > $multiImage->width()) {
                        $multiImage->resize(500,null, function ($constraint) {
                            $constraint->aspectRatio();
                        });
                    } else {
                        $multiImage->resize(null,500, function ($constraint) {
                            $constraint->aspectRatio();
                        });
                    }
                    $multiImage->save(public_path('images/uploads/gallery/'.$filename));
                }
            }
            $notification=array(
                'message' => 'Successfully Posted',
                'alert-type' => 'success' 
            );
            Alert::success('Post added successfully');
            return redirect()->route('posts');
        }else {
            Alert::error('Something is wrong, please try again!');
            $notification=array(
                'message' => 'Something is wrong, please try again',
                'alert-type' => 'error' 
            );
            return redirect()->route('posts')->with($notification);
        } 
        // if($request->image){
        //     $image = $request->file('image');
        //     $customName = rand().".".$image->getClientOriginalExtension();
        //     $location = public_path("images/uploads/posts/".$customName);
        //     Image::make($image)->save($location);

        //     $multiImages = $request->file('galleries');
        //     foreach($multiImages as $multiImage){
        //         $galleryCustomImageName = rand().".".$multiImage->getClientOriginalExtension();
        //         $location1 = public_path("images/uploads/gallery/".$galleryCustomImageName);
        //         Image::make($multiImage)->save($location1);
        //     }
        // }

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
        $posts = Post::where('id',$id)->get();
        $galleries = Gallery::where('post_id',$id)->get();
        // dd($posts);
        return view('dashboard.posts.edit',compact('posts','galleries'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $id)
    {
        $data = [
            'image' => 'required|image:mimes:jpg,png,jpeg,webp,gif,svg|max:2048',
        ];

        foreach(config('app.languages') as $key =>$lang){
            $data[$key.'*.title'] = 'required|string';
        }

        $data = $id->update($request->all());
        
        if($request->file('image')){
            $file = $request->file('image');
            $filename = date('dmY').$file->getClientOriginalName();
            $file->move(public_path('images/uploads/posts/'),$filename);
            $path = 'images/uploads/posts/'.$filename;
            $id->update(['image'=>$path]);
        } 
        if($data){
            Alert::success('Post updated successfully');
            // $notification=array(
            //     'message' => 'Successfully Posted',
            //     'alert-type' => 'success' 
            // );
            return redirect()->route('posts');
        }else {
            Alert::error('Something is wrong, please try again!');
            // $notification=array(
            //     'message' => 'Something is wrong, please try again',
            //     'alert-type' => 'error' 
            // );
            return redirect()->route('posts');
        } 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $imagePath = Post::select('image')->where('id', $id)->first();
        $filePath = $imagePath->image;
        $galleries = Gallery::where('post_id',$id)->get();
        foreach($galleries as $gallery){
            if(File::exists('images/uploads/gallery/'.$gallery->images)){
                File::delete('images/uploads/gallery/'.$gallery->images);
            }
        }
        if (file_exists($filePath)) {

            unlink($filePath);
            Post::where('id', $id)->delete();
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
            Post::where('id', $id)->delete();
            return back()->with($notification);
        }
        // if($posts){
        //     $notification=array(
        //         'message' => 'Successfully Deleted',
        //         'alert-type' => 'success' 
        //     );
        //     return back()->with($notification);
        // }else {
        //     $notification=array(
        //         'message' => 'Something is wrong, please try again',
        //         'alert-type' => 'error' 
        //     );
        //     return redirect()->route('posts')->with($notification);
        // } 
        // $posts = Post::findOrFail($id);
        // $image_path = public_path('images/uploads/posts/').$posts->image;
        // $posts = Gallery::findOrFail($id);
        // if(File::exists('images/uploads/gallery/'.$posts->images)){
        //     File::delete('images/uploads/gallery/'.$posts->images);
        // }
        // if (file_exists($image_path)) {

        //     unlink($image_path);
        //     $notification=array(
        //         'message' => 'Successfully Deleted',
        //         'alert-type' => 'success' 
        //     );
        // Post::where('id', $id)->delete();
        // $posts->delete();

        // return redirect()->route('posts')->with($notification);
        // }else{
        //     $notification=array(
        //         'message' => 'Something is wrong, please try again',
        //         'alert-type' => 'error' 
        //     );

        //  Post::where('id', $id)->delete();
        //  return redirect()->route('posts')->with($notification);
        // }
    }

    public function galleryDelete($id)
    {
        $posts = Gallery::find($id);
        if(File::exists('images/uploads/gallery/'.$posts->images)){
            File::delete('images/uploads/gallery/'.$posts->images);
        }
        $posts->delete();
        if($posts){
            $notification=array(
                'message' => 'Successfully Deleted',
                'alert-type' => 'success' 
            );
            return back()->with($notification);
        }else {
            $notification=array(
                'message' => 'Something is wrong, please try again',
                'alert-type' => 'error' 
            );
            return back()->with($notification);
        }
    }
}
