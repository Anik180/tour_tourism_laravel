<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Gallery;
use DB;
use Image;
class GallerController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $gallery = Gallery::all();
        return view('admin.gallery.index',compact('gallery'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $gallery=DB::table('galleries')->get();
        return view('admin.gallery.create',compact('gallery'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    $validatedData = $request->validate([
        'title' => 'required',
        'image' => 'required',
     ]);

           $data=array();
           $data['title']=$request->title;
           $image=$request->image;
           if($image){
            $image_one=uniqid().'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(600,400)->save('public/uploads/'.$image_one);
            $data['image']='public/uploads/'.$image_one;
            DB::table('galleries')->insert($data);
         $notification=array(
          'messege'=>'Successfully Save',
           'alert-type'=>'success'
             );
            return Redirect()->back()->with($notification);
           }else{
            return Redirect()->back();
           }

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
      $gallery=DB::table("galleries")->where('id',$id)->first();
      return view('admin.gallery.edit',compact('gallery'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
        'title' => 'required',
        'image' => 'required',
     ]);

           $data=array();
           $data['title']=$request->title;
         
           $oldimage=$request->old_image;
           $image=$request->image;
           if($image){
            $image_one=uniqid().'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(600,400)->save('public/uploads/'.$image_one);
            $data['image']='public/uploads/'.$image_one;
            DB::table('galleries')->where('id',$id)->update($data);
            unlink($oldimage);
         $notification=array(
          'messege'=>'Successfully update',
           'alert-type'=>'success'
             );
            return Redirect()->route('gallery.index')->with($notification);
           }
            $data['image']=$oldimage;
             DB::table('gallery')->where('id',$id)->update($data);
            
            $notification=array(
            'messege'=>'Successfully update',
            'alert-type'=>'success'
             );
            return Redirect()->route('gallery.index')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
            $gallery=DB::table("galleries")->where('id',$id)->first();
           unlink($gallery->image);
           DB::table("galleries")->where('id',$id)->delete();
           $notification=array(
          'messege'=>'Successfully Delete',
           'alert-type'=>'success'
             );
            return Redirect()->back()->with($notification);
    }
}
