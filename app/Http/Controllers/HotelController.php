<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Hotel_booking;
use DB;
use Image;
class HotelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $hotel_booking = Hotel_booking::all();
        return view('admin.hotel.index',compact('hotel_booking'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $hotel_booking=DB::table('hotel_bookings')->get();
        return view('admin.hotel.create',compact('hotel_booking'));
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
        'detail' => 'required',
     ]);

           $data=array();
           $data['title']=$request->title;
           $data['slug']=strtolower($request->title);
           $data['detail']=$request->detail;

           $image=$request->image;
           if($image){
            $image_one=uniqid().'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(300,221)->save('public/uploads/'.$image_one);
            $data['image']='public/uploads/'.$image_one;
            DB::table('hotel_bookings')->insert($data);
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
      $hotel_booking=DB::table("hotel_bookings")->where('id',$id)->first();
      return view('admin.hotel.edit',compact('hotel_booking'));
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
        'detail' => 'required',
     ]);

           $data=array();
           $data['title']=$request->title;
           $data['slug']=strtolower($request->title);
           $data['detail']=$request->detail;
         
           $oldimage=$request->old_image;
           $image=$request->image;
           if($image){
            $image_one=uniqid().'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(300,221)->save('public/uploads/'.$image_one);
            $data['image']='public/uploads/'.$image_one;
            DB::table('hotel_bookings')->where('id',$id)->update($data);
            unlink($oldimage);
         $notification=array(
          'messege'=>'Successfully update',
           'alert-type'=>'success'
             );
            return Redirect()->route('hotel-booking.index')->with($notification);
           }
            $data['image']=$oldimage;
             DB::table('hotel_bookings')->where('id',$id)->update($data);
            
            $notification=array(
            'messege'=>'Successfully update',
            'alert-type'=>'success'
             );
            return Redirect()->route('hotel-booking.index')->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
          $hotel=DB::table("hotel_bookings")->where('id',$id)->first();
           unlink($hotel->image);
           DB::table("hotel_bookings")->where('id',$id)->delete();
           $notification=array(
          'messege'=>'Successfully Delete',
           'alert-type'=>'success'
             );
            return Redirect()->back()->with($notification);
    }
}
