<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Image;
use App\About;
class CeoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
    	$ceo=DB::table('ceos')->first();
    	return view('admin.about.ceo',compact('ceo'));
    }

    public function update(Request $request,$id)
    {
 
       $oldimage=$request->image;
        $data=array();
        $data['massage']=$request->massage; 
        $image=$request->file('image');
            if($image){
            $image_one=uniqid().'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(262,121)->save('public/uploads/'.$image_one);
            $data['image']='public/uploads/'.$image_one;
            DB::table('ceos')->where('id',$id)->update($data);
            unlink($oldimage);
         $notification=array(
          'messege'=>'Successfully update',
           'alert-type'=>'success'
             );
            return Redirect()->back()->with($notification);
           }else{
              $brand=DB::table('ceos')->where('id',$id)->update($data);
                 $notification=array(
                     'messege'=>'Update without image!',
                     'alert-type'=>'success'
                      );
                return Redirect()->back()->with($notification); 
            }
    }

    public function aboutindex()
    {
        $about=DB::table('abouts')->first();
        return view('admin.about.about',compact('about'));
    }

    public function aboutupdate(Request $request,$id)
    {

      $data=array();
      $data['about']=$request->about;
      DB::table('abouts')->where('id',$id)->update($data);
      $notification=array(
          'messege'=>'Successfully update',
           'alert-type'=>'success'
             );
   return Redirect()->back()->with($notification);
    }
}
