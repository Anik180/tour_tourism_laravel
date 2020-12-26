<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Image;
class SliderController extends Controller
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
        $slider=DB::table('sliders')
        ->get();
       return view('admin.slider.index',compact('slider')); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $slider=DB::table('sliders')->get();
        return view('admin.slider.create',compact('slider'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
     //    $validatedData = $request->validate([
     //    'title' => 'required',
     //    'package_details' => 'required',
     // ]);

           $data=array();
           $data['title']=$request->title;
           $image=$request->slider;
           if($image){
            $image_one=uniqid().'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(1519,532)->save('public/uploads/'.$image_one);
            $data['slider']='public/uploads/'.$image_one;
            DB::table('sliders')->insert($data);
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
      $slider=DB::table("sliders")->where('id',$id)->first();
      return view('admin.slider.edit',compact('slider'));
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

        $oldimage=$request->old_slider;
        $data=array();
        $data['title']=$request->title; 
        $image=$request->file('slider');
            if($image){
            $image_one=uniqid().'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(1519,532)->save('public/uploads/'.$image_one);
            $data['slider']='public/uploads/'.$image_one;
            DB::table('sliders')->where('id',$id)->update($data);
            unlink($oldimage);
         $notification=array(
          'messege'=>'Successfully update',
           'alert-type'=>'success'
             );
            return Redirect()->back()->with($notification);
           }else{
              $brand=DB::table('sliders')->where('id',$id)->update($data);
                 $notification=array(
                     'messege'=>'Successfully Update!',
                     'alert-type'=>'success'
                      );
                return Redirect()->back()->with($notification); 
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
          $slider=DB::table("sliders")->where('id',$id)->first();
           unlink($slider->slider);
           DB::table("sliders")->where('id',$id)->delete();
           $notification=array(
          'messege'=>'Successfully Delete',
           'alert-type'=>'success'
             );
            return Redirect()->back()->with($notification);
    }
}
