<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Image;
use App\Partner;
class PartnerController extends Controller
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
        $partner = Partner::all();
        return view('admin.partner.index',compact('partner'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $partner=DB::table('partners')->get();
        return view('admin.partner.create',compact('partner'));
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
        'image' => 'required',
     ]);

           $data=array();

           $image=$request->image;
           if($image){
            $image_one=uniqid().'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(55,55)->save('public/uploads/'.$image_one);
            $data['image']='public/uploads/'.$image_one;
            DB::table('partners')->insert($data);
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
      $partner=DB::table('partners')->where('id',$id)->first();
      return view('admin.partner.edit',compact('partner'));
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
        'image' => 'required',
     ]);

           $data=array();
         
           $oldimage=$request->old_image;
           $image=$request->image;
           if($image){
            $image_one=uniqid().'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(55,55)->save('public/uploads/'.$image_one);
            $data['image']='public/uploads/'.$image_one;
            DB::table('partners')->where('id',$id)->update($data);
            unlink($oldimage);
         $notification=array(
          'messege'=>'Successfully update',
           'alert-type'=>'success'
             );
            return Redirect()->route('partners.index')->with($notification);
           }
            $data['image']=$oldimage;
             DB::table('partners')->where('id',$id)->update($data);
            
            $notification=array(
            'messege'=>'Successfully update',
            'alert-type'=>'success'
             );
            return Redirect()->route('partners.index')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
            $partners=DB::table("partners")->where('id',$id)->first();
           unlink($partners->image);
           DB::table("partners")->where('id',$id)->delete();
           $notification=array(
          'messege'=>'Successfully Delete',
           'alert-type'=>'success'
             );
            return Redirect()->back()->with($notification);
    }
}
